<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use App\Notifications\CustomWelcome;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Bank;
use App\Category;
use Auth;
use Redirect;

class RegisterController extends Controller
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

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:190',
            'email' => 'required|email|max:190|unique:users',
            'password' => 'required|min:6|confirmed',
            'phone' => 'required|numeric|min:10',
            'accountno' => 'required|min:9',
            'username' => 'required|min:4|unique:users',

        ]);
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
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'phone' => $data['phone'],
            'bank' => $data['bank'],
            'accountno' => $data['accountno'],
            'referrer_id' => $data['referrer']
        ]);
    }


    /**
     * Register function for auth.
     *
     * @param  Request  $request
     */
     public function register(Request $request)
     {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            return redirect('/register')->withErrors($validator)->withInput();
        }

        $data = User::where('email', $request->input('email'))->first();
     	if($data != null){
     		return redirect('/register')
     		->with('error-status', 'User with email already exists')->withInput();
         }
         $data = User::where('username', $request->input('username'))->first();
     	if($data != null){
     		return redirect('/register')
     		->with('error-status', 'Userername already taken please choose another!')->withInput();
         }

//          if($request->input('coupon') != ""){
//                $u = User::where('username', $request->input('referrer'))->first();
//                $string = ($u->coupon);
//                $string_new = $request->input('coupon');
//                $firstCharacter = $string[0];
//                $secondCharacter = $string_new[0];
//             if (ctype_alpha($firstCharacter) && !ctype_alpha($secondCharacter))
//           return redirect('/register')
//           ->with('error-status','Wrong Cycle! you must be on thesame cycle with your referrer')->withInput();
//           if (($firstCharacter == 2) && ($secondCharacter != 2))
//           return redirect('/register')
//           ->with('error-status','Wrong Cycle! you must be on thesame cycle with your referrer')->withInput();
//   }

//          $data = User::where('coupon', $request->input('coupon'))->first();
//      	if($data != null){
//      		return redirect('/register')
//      		->with('error-status', 'Coupon code Has already been used!')->withInput();
//      	}
            if($request->input('referrer') != ""){
                        $u = User::where('username', $request->input('referrer'))->first();
                        if($u == null)
                            return redirect('/register')->with('error-status', 'Referrer no longer exists or Might have been deleted from the database')->withInput();
                    //         if($u->referred_count() == 2)
                    //        return redirect('/register')->with('error-status', 'Number of Direct downlines for specified upline completed! please use another referrer')->withInput();
                    //     else $request['referrer'] = $u->id;
                     }
                    else{
                        $request['referrer'] = 0;
                    }

     	$user = $this->create($request->all());
        /*try{
            $user->notify(new CustomWelcome);
        }catch(\Exception $e){
            //Do Nothing for now
        }*/

     	//Auth::loginUsingId($user->id);
         //return redirect()->intended($this->redirectPath());
         
        return redirect('/login')->with('success-status', 'Registration Successful!, You can now login to your account.');
     }


    public function showRegistrationForm(Request $request)
    {
         $referrer = null;
        if($request->has('ref')){
        	$referrer = User::where('username', $request->input('ref'))->first();
        	//$referrer = $user != null ? $user->email : '';
        }
        return view('auth.register', ['referrer' => $referrer]);
    }
}
