<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /*
            Accessors
            -----------------------------------------------
    */

    /*
          Accessor to find short name from initials of first & last name
          we can use this accessor in anywhere as per required
    */

    public function getShortNameAttribute($value)
    {
            $fullname = $value;
            $exploded_name = explode(' ', $fullname);
            $first_initial = $exploded_name[0][0];
            $last_initial = $exploded_name[1][0];
            $short_name = $first_initial.$last_initial;
            return $short_name;
    }

    /*
           Accessor to format created_at date in human understanding form
    */

    public function getUserAttribute()
    {
            $value = User::orderBy('id', 'desc')->get();
            return $value;
    }

    /*
          Accessor to get Dynamic Pagination of User Lists
    */

    public function getDynamicUserListsAttribute($limit)
    {
        if($limit > 0){
            $dynamic_user_lists = User::orderBy('id', 'desc')->paginate($limit);
        }

        else{
            $dynamic_user_lists = "No Recored Found";
        }
        
        return $dynamic_user_lists;
    }



    /*
               Mutators
               -----------------------------------------------------
    */


   /*
           Mutator to set User details
   */

   public function setUserDetailsAttribute($values)
   {
          $name = (isset($values['name'])) ? ($values['name']) : ('');
          $email = (isset($values['email'])) ? ($values['email']) : (''); 
          $password = (isset($values['password'])) ? ($values['password']) : ('');
          
          $create = User::create([
                 'name' => $name,
                 'email' => $email,
                 'password' => bcrypt($password),
          ]);

          $stataus = "Successfully Saved";
          return $stataus;
   }

   
   /*
           Mutator to update User details
   */

   public function setUserDetailsUpdateAttribute($values)
   {

         $user_details = User::whereEmail($values['email'])->first();

        ///

        $name = (isset($values['name'])) ? ($values['name']) : ( $user_details->name );
        $email = (isset($values['email'])) ? ($values['email']) : ($user_details->email); 
        $password = (isset($values['password']) || $values['password'] != '') ? ($values['password']) : ($email);

        $update = User::whereId($user_details->id)->update([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password),
        ]);

        $stataus = "Successfully Updated";
        return $stataus;
   
   }

}