<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class MutatorController extends Controller
{
    //

    public function set_user_details()
    {
            $user_details = [
                'name' => 'Demo Setter',
                'email' => 'demo127@gmail.com',
                'password' => 'demo12@gmail.com',
            ];        

            $result = User::setUserDetailsAttribute($user_details);
            dd($result);
    }

    public function update_user_details()
    {
        $user_details = [
            // 'name' => 'Demo Setter',
            'email' => 'demo127@gmail.com',
            'password' => '',
        ];

        $result = User::setUserDetailsUpdateAttribute($user_details);
        dd($result);
    }
}
