<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data, array $condition)
    {
      return Validator::make($data, $condition);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
      return User::create([
        'username' => $data['username'],
        'password' => bcrypt($data['password']),
        'email' => $data['email'],
        'nom' => $data['nom'],
        'prenom' => $data['prenom'],
        'type' => isset($data['type']) ? $data['type'] : 'simple',
        'is_active' => isset($data['is_active']) ? true : false,
      ]);
    }

    public function showLogin() {
        return view('auth.login');
    }

    public function doLogin(Request $request) {
      $condition = [
        'username' => 'required|max:255',
        'password' => 'required|min:6',
      ];
      $validator = $this->validator($request->all(), $condition);
      // if the validator fails, redirect back to the form
      if ($validator->fails()) {
        return redirect('login')
          ->withErrors($validator)
          ->withInput($request->except('password'));
      } else {
        // create our user data for the authentication
        $userdata = array(
            'username'     => $request->get('username'),
            'password'  => $request->get('password')
        );

        // attempt to do the login
        if (Auth::attempt($userdata)) {
          // validation successful!
          return redirect('/');
        } else {
          // validation not successful, send back to form
          return redirect('login')
            ->withErrors(['fail' => 'Username or Password are incorrect'])
            ->withInput($request->except('password'));
        }
      }
      return view('auth.login');
    }

    public function showRegistration() {
      return view('auth.register');
    }

    public function doRegistration(Request $request) {
      $condition = [
        'nom' => 'required|min:2|max:255',
        'prenom' => 'required|min:2|max:255',
        'username' => 'required|min:6|max:255|unique:users',
        'password' => 'required|min:6|confirmed',
        'email' => 'required|email|min:6|max:255|unique:users',
      ];
      $this->create($request->all(), $condition);
      return redirect('/login');
    }
}
