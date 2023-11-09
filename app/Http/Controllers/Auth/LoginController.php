<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\Users\UserRepository as User;
use Illuminate\Http\Request;
use Auth;
use Hash;
use Crypt;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(User $users)
    {
        $this->middleware('guest')->except('logout');
        $this->users = $users;
    }

    public function signInForm()
    {
        return view('pages.auth.sign-in');
    }

    public function submitSignIn(Request $request)
    {
        $email = $request->input('email');

        $user = $this->users->getByEmail($email);
        if (!$user) {
            return redirect($this->redirectTo)->with(['error' => 'Data tidak dapat ditemukan']);
        }

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            if ($user->role) {
                session(['permissions' => json_decode($user->role->permissions)]);
            }
            return redirect('/dashboard');
        } else {
            return redirect($this->redirectTo)->with(['error' => 'Kombinasi email dan password salah']);
        }
    }

    public function logout()
    {
        Auth::logout();
        session()->flush();
        return redirect($this->redirectTo);
    }
}
