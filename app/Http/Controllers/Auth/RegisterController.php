<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = '/email/verify';

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:10'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'sports1' => ['string', 'nullable'],
            'sports_years1' => ['integer', 'nullable'],
            'sports2' => ['string', 'nullable'],
            'sports_years2' => ['integer', 'nullable'],
            'sports3' => ['string', 'nullable'],
            'sports_years3' => ['integer', 'nullable'],
            'age' => ['integer', 'nullable'],
            'sex' => ['string', 'nullable'],
            'area' => ['string', 'nullable'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'sports1' => $data['sports1'],
            'sports_years1' => $data['sports_years1'],
            'sports2' => $data['sports2'],
            'sports_years2' => $data['sports_years2'],
            'sports3' => $data['sports3'],
            'sports_years3' => $data['sports_years3'],
            'age' => $data['age'],
            'sex' => $data['sex'],
            'area' => $data['area'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
