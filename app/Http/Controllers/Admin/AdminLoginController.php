<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AdminLoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/admin/dashboard';
    protected function guard()
    {
        return Auth::guard('admin');
    }
    //
    public function showLoginForm(){
        return view('admin.admin_login');
    }

    public function login(Request $request)
    {
        $email = $request->input('email');

        $password = $request->input('password');
        //return $request;

        if ($this->guard()->attempt(['email' => $email, 'password' => $password])) {
            // Authentication passed...
            return redirect()->intended(route('admin.dashboard'));
        }

        //return redirect()->back();

        return $this->sendFailedLoginResponse($request);

        //return redirect(route('admin.dashboard'));
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        $errors = [$this->username() => trans('Invalid Username or Password')];

        if ($request->expectsJson()) {
            return response()->json($errors, 422);
        }

        return redirect()->back()
            ->withInput($request->only($this->username(), 'remember'))
            ->withErrors($errors);
    }


    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->flush();

        $request->session()->regenerate();

        return redirect(route('admin.login'));

    }
}
