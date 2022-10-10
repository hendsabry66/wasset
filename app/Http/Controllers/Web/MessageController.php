<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function conversations(Request $request){
        $conversions = Conversation::with('latest_message')
            ->join('messages', 'conversations.id', '=', 'messages.conversation_id')
            ->where('sender_id',auth()->user()->id)
            ->orWhere('reciver_id',auth()->user()->id)
            //->selectRaw("conversations.id,conversations.reciver_id,conversations.sender_id, (SELECT MAX(created_at) from messages WHERE messages.conversation_id=conversations.id) as latest_message_on")
            //
            ->select('conversations.id','conversations.reciver_id','conversations.sender_id')
            ->groupBy('conversations.id')
            ->orderBy('messages.created_at', 'desc')
            ->limit($request->limit)
            ->offset($request->offset)
            ->get();

        foreach($conversions as $conversion){

            if($conversion->sender_id != auth()->user()->id){
                $conversion->user = $this->reciverUser($conversion->sender_id);

            }elseif($conversion->reciver_id != auth()->user()->id){
                $conversion->user = $this->reciverUser($conversion->reciver_id);
            }
        }

        return $this->data(200,$conversions);

    }
    private function reciverUser($id){
        return User::where('id',$id)->select('id','username','image')->first();
    }

    public function conversation($conversion_id,Request $request){
        $conv = Conversation::find($conversion_id);
        $conversion =$conv->messages()
            ->orderBy('created_at','desc')
            ->limit($request->limit)
            ->offset($request->offset)
            ->select('id','message','image','type','user_id','created_at')
            ->get();


        Message::where('conversation_id',$conversion_id)->update(['is_seen' => 1]);
        return $this->data(200,$conversion);

    }
    public function checkConversation(Request $request){

        $conversation = Conversation::whereIn('sender_id', [Auth::id(), $request->user_id])
            ->whereIn('reciver_id', [$request->user_id, Auth::id()])
            ->first();
        if (!$conversation) {
            $conversation = Conversation::firstOrcreate([
                'sender_id' => Auth::id(),
                'reciver_id' => $request->user_id,
            ]);

        }
        if(!empty($request->ad_id)){

            $message = Message::create([
                'message' => '',
                'user_id' => Auth::id(),
                'conversation_id' => $conversation->id,
                'type'=>'ad',
                'ad_id'=>$request->ad_id
            ]);
            $tokens = User::where('id', $request->user_id)->value('device_token');
            $fcm_message = 'رسالة جديدة من ';
            $fcm_message .= auth()->user()->username;



            $user = User::find($request->user_id);
            $data = $message->load('ad')->load(array('user'=>function($query){
                $query->select('id','username','image');
            }));

            sendNotification($user->device_token,$fcm_message,"Message",Carbon::now()->toDateTimeString(),$data);


            $message_note = [

                'data'=>$data,
                'title'=>$fcm_message,
                'type'=>'Message'
            ];
            Notification::send($user, new MessageNotification($message_note));
        }

        $conversion = Conversation::find($conversation->id)
            ->messages()
            ->orderBy('created_at','desc')
            ->limit($request->limit)
            ->offset($request->offset)
            ->select('id','message','image','type','user_id','created_at','ad_id')
            ->get();



        Message::where('conversation_id',$conversation->id)->update(['is_seen' => 1]);

        return $this->data(200,$conversion);


    }
    public function readMessage($id){
        Message::find($id)->update(['is_seen'=>1]);
        return  $this->successMessage(200,'uptaded');
    }
    public function saveMessage(Request $request){
        $request->validate([
            'reciver_id' => 'required',
            //  'message' => 'required',
        ]);

        if ($request->reciver_id == Auth::id())
        {
            return  $this->errorMessage(400,__('api.not_found'));
        }


        $conversation = Conversation::whereIn('sender_id', [Auth::id(), $request->reciver_id])
            ->whereIn('reciver_id', [$request->reciver_id, Auth::id()])
            ->first(); // Get conversation data

        if (!$conversation) {
            $conversation = Conversation::firstOrcreate([
                'sender_id' => Auth::id(),
                'reciver_id' => $request->reciver_id,
            ]);

        }
        if($request->has('image')){

            $fileName = rand().time().'.'.$request->image->getClientOriginalExtension();
            $img = Image::make($request->image->getRealPath());
            $img->save(public_path('uploads/'.$fileName));
            $img->resize(150, 150, function($constraint){
                $constraint->aspectRatio();
            })->save(public_path('messages/'.$fileName));

            $message = Message::create([
                'image' => $fileName,
                'user_id' => Auth::id(),
                'conversation_id' => $conversation->id,
                'type'=>'image'
            ]);

        }elseif(!empty($request->latitude) && !empty($request->langitude)){
            $message = Message::create([
                'message' => $request->latitude.','.$request->langitude,
                'user_id' => Auth::id(),
                'conversation_id' => $conversation->id,
                'type'=>'location'
            ]);
        }else{

            $message = Message::create([
                'message' => $request->message,
                'user_id' => Auth::id(),
                'conversation_id' => $conversation->id,
                'type'=>'text'
            ]);
        }



        $tokens = User::where('id', $request->reciver_id)->value('device_token');
        $fcm_message = 'رسالة جديدة من ';
        $fcm_message .= auth()->user()->username;



        $user = User::find($request->reciver_id);
        $data = $message->load(array('user'=>function($query){
            $query->select('id','username','image');
        }));

        sendNotification($user->device_token,$fcm_message,"Message",Carbon::now()->toDateTimeString(),$data);


        $message_note = [

            'data'=>$data,
            'title'=>$fcm_message,
            'type'=>'Message'
        ];
        Notification::send($user, new MessageNotification($message_note));

        return $this->data(200,$data);
    }
    public function deleteMessage($id){
        Message::find($id)->delete();
        return  $this->successMessage(200,'deleted');
    }

    public function deleteConversation($id){
        Conversation::find($id)->delete();
        return  $this->successMessage(200,'deleted');
    }

}
