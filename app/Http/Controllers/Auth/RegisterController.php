<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Patient;



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
    protected $redirectTo = RouteServiceProvider::HOME;

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
     * Show the register page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

     public function showRegistrationForm()
     {
 
         $data = [
             'page_name' => 'register',
         ];
 
         return view('auth.register', compact('data'));
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
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'size:11', 'unique:users'],
            'profile' => ['required', 'image','mimes:jpg,png,jpeg,gif,svg','max:2048'],
            'password' => ['required', 'string', 'min:8'],
        ]);
     }
 
     /**
      * Create a new user instance after a valid registration.
      *
      * @param  array  $data
      * @return \App\Models\User
      */
     protected function createUser(array $data)
     {
         return User::create([
             'first_name' => $data['first_name'],
             'last_name' => $data['last_name'],
             'gender' => $data['gender'],
             'email' => $data['email'],
             'phone' => $data['phone'],
             'profile' => $data['profile'],
             'password' => Hash::make($data['password']),
         ]);
     }
  
     /**
      * Create a new patient instance after a valid registration.
      *
      * @param  array  $data
      * @return \App\Models\Patient
      */
     protected function createPatient(int $user_id)
     {
         return Patient::create([
             'user_id' => $user_id,
         ]);
     }
 
    /**
     * recieve submitted data.
    *
    * @param  array  $data
    * @return \App\Models\User
    */
    protected function register(Request $request)
    {
        // dd($request->all());
        
        $validatedData = $this->validator(
            $request->all()
        )->safe()->except(['_token']);
                
        $fileName = $validatedData['email'] . '_' . time() . '.' . $validatedData['profile']->extension();
        $validatedData['profile']->storeAs('storage/images/users', $fileName);
        $validatedData['profile'] = $fileName;

        $validatedData['usertype'] = 'patient';
        $user = $this->createUser($validatedData);
        
        $patient = $this->createPatient($user->id);

        return redirect( route('login') )->with('success', 'Registration Successful! Please Login.');
    }

}
