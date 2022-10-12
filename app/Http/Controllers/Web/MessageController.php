<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Conversation;
use App\Models\Message;
use App\Models\User;

class MessageController extends Controller
{
    //get message form
    public function getSendMessage($user_id){
        $user = User::find($user_id);
        return view('web.messages.sendMessage',compact('user'));
    }

    //save message
    public function sendMessage(Request $request){
        $request->validate([
              'message' => 'required',
        ]);

        if ($request->reciver_id == auth()->user()->id)
        {
            return  redirect()->back()->with('error', __('web.You_can_not_send_message_to_yourself'));
        }


        $conversation = Conversation::whereIn('sender_id', [auth()->user()->id, $request->reciver_id])
            ->whereIn('reciver_id', [$request->reciver_id, auth()->user()->id])
            ->first(); // Get conversation data

        if (!$conversation) {
            $conversation = Conversation::firstOrcreate([
                'sender_id' => auth()->user()->id,
                'reciver_id' => $request->reciver_id,
            ]);

        }

        $message = Message::create([
            'message' => $request->message,
            'user_id' => auth()->user()->id,
            'conversation_id' => $conversation->id,
        ]);
        return redirect()->back()->with('success', __('web.messageSentSuccessfully'));

    }

    //get user in conversation
    private function reciverUser($id){
        return User::where('id',$id)->select('id','name')->first();
    }

    //get all conversations
    public function conversations(Request $request){
         $conversations = Conversation::with('latest_message')
            ->join('messages', 'conversations.id', '=', 'messages.conversation_id')
            ->where('sender_id',auth()->user()->id)
            ->orWhere('reciver_id',auth()->user()->id)
            ->select('conversations.id','conversations.reciver_id','conversations.sender_id')
            ->groupBy('conversations.id')
            ->orderBy('messages.created_at', 'desc')
            ->get();

        foreach($conversations as $conversation){

            if($conversation->sender_id != auth()->user()->id){
                $conversation->user = $this->reciverUser($conversation->sender_id);

            }elseif($conversation->reciver_id != auth()->user()->id){
                $conversation->user = $this->reciverUser($conversation->reciver_id);
            }
        }


        return view('web.messages.conversations',compact('conversations'));

    }
    //get conversation messages
    public function conversation($conversion_id,Request $request){
        $conversation = Conversation::find($conversion_id);
        $messages =$conversation->messages()
            ->orderBy('created_at','desc')
            ->select('id','message','user_id','created_at')
            ->get();


        Message::where('conversation_id',$conversion_id)->update(['is_seen' => 1]);
        return view('web.messages.messages',compact('messages','conversation'));

    }
    //delete conversation
    public function deleteConversation($id){
        Conversation::find($id)->delete();
        return  redirect()->back()->with('success', __('web.conversationDeletedSuccessfully'));
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

    public function deleteMessage($id){
        Message::find($id)->delete();
        return  $this->successMessage(200,'deleted');
    }



}
