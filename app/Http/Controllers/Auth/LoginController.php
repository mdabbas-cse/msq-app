<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;
use Mail;
use Hash;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    protected function redirectTo()
    {
        if (Auth()->user()->role === 1) {
            return route('admin.dashboard');
        } elseif (Auth()->user()->role === 2) {
            return route('user.dashboard');
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * @Override login method
     */
    public function login(Request $request)
    {
        $input = $request->all();
        $this->validate(
            $request,
            [
                'email' => 'required|email',
                'password' => 'required'
            ]
        );

        if (Auth()->attempt(['email' => $input['email'], 'password' => $input['password']])) {
            if (Auth()->user()->role === 1) {
                return redirect()
                    ->route('admin.dashboard');
            } elseif (Auth()->user()->role === 2) {
                return redirect()
                    ->route('user.dashboard');
            }
        } else {
            return redirect()
                ->route('login')
                ->with('error', 'Email or Password are wrong!');
        }
    }

    public function loginForm()
    {
        return view('login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function showForgetPasswordForm()
    {
        return view('forgetPasswordForm');
    }

    public function submitForgetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);
        $mail = New Mailer();

        $mail->send('email.forgetPassword', ['token' => $token], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Reset Password');
        });

        return back()->with('message', 'We have e-mailed your password reset link!');
    }
}
