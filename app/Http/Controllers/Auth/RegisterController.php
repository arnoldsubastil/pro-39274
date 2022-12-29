<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;
use Illuminate\Http\Request;

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
        // $this->middleware('guest');
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
            'name' => ['required', 'string', 'max:255'],
            'firstName' => ['required', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:255'],
            'contact_no' => ['required', 'string', 'max:50'],
            'deliveryAddress' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'firstName' => $data['firstName'],
            'lastName' => $data['lastName'],
            'contact_no' => $data['contact_no'],
            'deliveryAddress' => $data['deliveryAddress'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    
    protected function updateAccount(Request $data)
    {
        User::where('id', Auth::user()->id)
        ->update([
            'name' => $data['name'],
            'firstName' => $data['firstName'],
            'lastName' => $data['lastName'],
            'contact_no' => $data['contact_no'],
            'deliveryAddress' => $data['deliveryAddress'],
            'email' => $data['email']
        ]);
        return view('orders.profileupdated');
    }

    protected function getprofile()
    {
        $profile = DB::table('users')
            ->select('name', 'firstName', 'lastName', 'contact_no', 'deliveryAddress', 'email')
            ->where('id', Auth::user()->id)
            ->get();
        
            return view('auth.update', [
                'profile'=>$profile[0]
            ]);
    }
}
