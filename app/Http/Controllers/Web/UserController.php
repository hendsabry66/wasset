<?php
namespace App\Http\Controllers\web;

use App\Models\Rating;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Repositories\UserRepository;
use App\Repositories\AdRepository;

use Flash;
use Response;
use Image;

class UserController extends AppBaseController{
    private $userRepository , $adRepository;

    public function __construct( UserRepository $userRepo , AdRepository $adRepo){
        $this->userRepository = $userRepo;
        $this->adRepository = $adRepo;
    }



    public function myProfile()
    {
        $user = auth()->user();
        return view('web.user.profile', compact('user'));
    }

    public function editProfile()
    {
        $user = auth()->user();
        return view('web.user.editProfile', compact('user'));
    }


    public function postEditProfile(Request  $request)
    {
        $validate =$request->validate(
            [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email,'.auth()->user()->id,
            ]
        );
        $user = auth()->user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        if(isset($request->password)){
            $user->password = bcrypt($request->password);
        }
        if($request->hasFile('image')){
            $image = $request->file('image');
            $img = Image::make($request->file('image'));
            $imgPath = 'uploads/users/';
            $imgName =time().$image->getClientOriginalName();
            $img =  $img->save($imgPath.$imgName);
            $user->image = $imgName;
        }

        $user->save();

        return redirect('editProfile')->with('success', __('web.updated_successfully'));

    }

    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }

    public function userProfile($id)
    {
        $user = $this->userRepository->find($id);
        $ads = $this->adRepository->getAdsByUser($id);
        return view('web.user.user_profile', compact('user','ads'));
    }

    public function rateUser(Request $request)
    {
        $rating  = new Rating;
        $rating->user_id = auth()->user()->id;
        $rating->rated_user_id = $request->rated_user_id;
        $rating->rating = $request->rating;
        $rating->save();
        return redirect()->back();
    }

}

