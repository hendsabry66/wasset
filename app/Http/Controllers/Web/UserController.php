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



    public function profile()
    {
        $user = auth()->user();
        return view('web.profile', compact('user'));
    }

    public function edit_user($user_id)
    {
        $user = $this->userRepository->find($user_id);
        return view('web.edit_user', compact('user'));
    }

    public function update_user(Request  $request, $user_id)
    {
        $validate =$request->validate(
            [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email,'.$user_id,
            ]
        );
        $user = $this->userRepository->find($user_id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        if(isset($request->password)){
            $user->password = bcrypt($request->password);
        }

        $user->save();
        Flash::success('User updated successfully.');
        return redirect('/profile');
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
        return view('web.user_profile', compact('user','ads'));
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

