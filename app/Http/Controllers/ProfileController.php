<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Profile;

class ProfileController extends Controller
{

    public function __construct(){
        $this->middleware('auth')->only('showProfile', 'editProfile', 'updateProfile', 'destroyUser');
    }

    public function showProfile(){
        $user = User::where('id', Auth::id())->first();

        // dd($user);

        return view('pages.profile_page.profile', compact('user'));
    }

    public function editProfile(){
        $user = User::where('id', Auth::id())->first();

        return view('pages.profile_page.editProfile', compact('user'));
    }

    public function updateProfile(Request $request){

        $request->validate([
            'fullname' => 'required',
            'age' => 'required',
            'address' => 'required',
            'username' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        $profile = Profile::where('user_id', Auth::id())
                        ->update([
                            "fullname" => $request["fullname"],
                            "age" => $request["age"],
                            "address" => $request["address"],
                        ]);

        $user = User::where('id', Auth::id())
                        ->update([
                            "username" => $request["username"],
                            "email" => $request["email"],
                            "password" => $request["password"]
                        ]);
        
        return redirect('/profile')->with('success', 'Profile berhasil diupdate!');
    }

    public function destroyUser(){
        $tempID = Auth::id();
        Auth::logout();

        $user = User::where('id', $tempID)->delete();

        return redirect('/')->with('success', 'Profile berhasil dihapus!');
    }

}
