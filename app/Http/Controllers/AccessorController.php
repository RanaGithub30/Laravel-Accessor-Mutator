<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AccessorController extends Controller
{
    /*
         Accessor Example
    */

    public function short_name_accessor()
    {
            $user_details = User::find(3);
            $short_name = $user_details->getShortNameAttribute($user_details->name);
            dd($short_name);
    }

    public function user_view_accessor()
    {
            $user_details = User::getUserAttribute();
            dd($user_details);
    }

    public function user_dynamic_pagination_accessor()
    {
           $user_per_page = 2;
           dd(User::getDynamicUserListsAttribute($user_per_page));
    }
    
}
