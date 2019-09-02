<?php

namespace Wave\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Wave\Notifications\VerifyEmail;
use Illuminate\Support\Facades\Notification;
use Carbon\Carbon;

class RegisterController extends \App\Http\Controllers\Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        if(setting('auth.username_in_registration') && setting('auth.username_in_registration') == 'yes'){
            return Validator::make($data, [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'username' => 'required|string|max:20|unique:users',
                'password' => 'required|string|min:6|confirmed'
            ]);
        }

        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $role = \TCG\Voyager\Models\Role::where('name', '=', config('voyager.user.default_role'))->first();

        $verification_code = NULL;
        $verified = 1;

        if(setting('auth.verify_email', false)){
            $verification_code = str_random(30);
            $verified = 0;
        }


        if(setting('auth.username_in_registration') && setting('auth.username_in_registration') == 'yes'){
            $user = User::create([
                'name' => $data['name'],
                'username' => $data['username'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
                'role_id' => $role->id,
                'verification_code' => $verification_code,
                'verified' => $verified,
                'trial_ends_at' => now()->addDays(setting('billing.trial_days', 14)),
            ]);

            if(setting('auth.verify_email', false)){
                $this->sendVerificationEmail($user);
            }

            return $user;
        }

        $username = str_slug($data['name']);
        $username_original = $username;
        $counter = 1;

        while(User::where('username', '=', $username)->first()){
            $username = $username_original . (string)$counter;
            $counter += 1;
        }

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'username' => $username,
            'password' => bcrypt($data['password']),
            'role_id' => $role->id,
            'verification_code' => $verification_code,
            'verified' => $verified,
            'trial_ends_at' => now()->addDays(setting('billing.trial_days', 14))
        ]);

        if(setting('auth.verify_email', false)){
            $this->sendVerificationEmail($user);
        }

        return $user;
    }

    private function sendVerificationEmail($user){
        Notification::route('mail', $user->email)->notify(new VerifyEmail($user));
    }

    public function showRegistrationForm()
    {
        return view('theme::auth.register');
    }

    public function verify(Request $request, $verification_code){
        $user = User::where('verification_code', '=', $verification_code)->first();

        $user->verification_code = NULL;
        $user->verified = 1;
        $user->email_verified_at = Carbon::now();
        $user->save();

        return redirect()->route('login')->with(['message' => 'Successfully verified your email. You can now login.', 'message_type' => 'success']);
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        if(setting('auth.verify_email')){
            // send email verification
            return redirect()->route('login')->with(['message' => 'Thanks for signing up! Please check your email to verify your account.', 'message_type' => 'success']);
        } else {
            $this->guard()->login($user);

            return $this->registered($request, $user)
                        ?: redirect($this->redirectPath())->with(['message' => 'Thanks for signing up!', 'message_type' => 'success']);
        }
    }
}
