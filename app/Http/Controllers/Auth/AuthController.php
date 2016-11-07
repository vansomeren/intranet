<?php

namespace App\Http\Controllers\Auth;


use App\User;

use Validator;

use App\Http\Controllers\Controller;

use Illuminate\Foundation\Auth\ThrottlesLogins;

use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

use Illuminate\Http\Request;

use DB;

use Mail;


/**
 * Class AuthController
 * @package App\Http\Controllers\Auth
 */
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

    protected function validator(array $data)

    {

        return Validator::make($data, [

            'name' => 'required|max:255',

            'email' => 'required|email|max:255|unique:users',

            'password' => 'required|min:6|confirmed',

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

            'email' => $data['email'],

            'password' => bcrypt($data['password']),

        ]);

    }


    /**

     * Create a new user instance after a valid registration.

     *

     * @param  array  $data

     * @return User

     */

    protected function login(Request $request)

    {

        $this->validate($request, [

            'email' => 'required|email',

            'password' => 'required',

        ]);


        if (auth()->attempt(array('email' => $request->input('email'), 'password' => $request->input('password'))))

        {

            if(auth()->user()->is_activated == '0'){

                $this->logout();

                return back()->with('warning',"First please activate your account.");

            }

            return redirect()->to('announcements');

        }else{

            return back()->with('error','your username and password are wrong.');

        }

    }


    /**

     * Register new user

     *

     * @param  array  $data

     * @return User

     */

    public function register(Request $request)

    {

        $input = $request->all();

        $validator = $this->validator($input);


        if ($validator->passes()) {

            $user = $this->create($input)->toArray();

            $user['link'] = str_random(50);

            DB::table('user_activations')->insert(['user_id'=>$user['id'],'token'=>$user['link']]);





            Mail::send('auth.emails.activation', $user, function($message) use ($user) {

                $message->to($user['email']);

                $message->subject('Site - Activation Code');

            });




            return redirect()->to('login')

                ->with('success',"We sent activation code. Please check your mail.");

        }


        return back()->with('errors',$validator->errors());

    }


    /**

     * Check for user Activation Code

     *

     * @param  array  $data

     * @return User

     */

    public function userActivation($token)

    {

        $check = DB::table('user_activations')->where('token',$token)->first();


        if(!is_null($check)){

            $user = User::find($check->user_id);


            if($user->is_activated == 1){

                return redirect()->to('login')

                    ->with('success',"user are already active.");

            }


            $user->update(['is_activated' => 1])->where(['id'=>$user['id']]);

            DB::table('user_activations')->where('token',$token)->delete();


            return redirect()->to('login')

                ->with('success',"user active successfully.");

        }


        return redirect()->to('login')

            ->with('warning',"your token is invalid.");

    }

}
