<?php

namespace App\Actions\Fortify;

use App\Models\User;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Stevebauman\Location\Facades\Location;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {

         
        //  Validator::make($input, [
        //     'name' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //     'agree'=> ['required'],
        //     'password' => $this->passwordRules(),
        // ])->validate();


        $validator = Validator::make($input, [
            'register_name' => ['required', 'string', 'max:255'],
            'register_email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'register_password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $validator->setAttributeNames([
            'register_name' => 'name',
            'register_email' => 'email',
            'register_password' => 'password',
        ])->validate();

        return User::create([
            'name'     => $input['register_name'],
            'email'    => $input['register_email'],
            'password' => Hash::make($input['register_password']),
            'role'     => $input['role'],
            'ip'       => Location::get(request()->ip())->countryName,
        ]);
    }
}
