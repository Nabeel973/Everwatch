<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\MessageBag;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin', ['except' => ['logout']]);
    }

    public function showLoginForm()
    {
        return view('auth.admin.login');
    }

    public function login(Request $request)
    {
        $errors = new MessageBag; // initiate MessageBag

        // Validate the form data
         $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        // Attempt to log the user in
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            // if successful, then redirect to their intended location
            $admin = Auth::guard('admin');
            $image_path = $admin->user()->image();
            $city_id = $admin->user()->city_id;
            session(['img_path' => $image_path,'city_id' => $city_id]);

            return redirect()->intended(route('admin.dashboard'));
        }
        // if unsuccessful, then redirect back to the login with the form data
       // return redirect()->back()->withInput($request->only('email', 'remember'));

//        $errors = new MessageBag(['password' => ['Email and/or password invalid.']]);
        $errors = new MessageBag(['password' => ['Email or password is invalid.']]); // if Auth::attempt fails (wrong credentials) create a new message bag instance.

        return redirect()->back()->withErrors($errors)->withInput($request->only('email', 'remember'));
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/admin');
    }
}
