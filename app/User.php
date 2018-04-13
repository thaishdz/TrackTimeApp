<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\VerifyEmail;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email','username','password','token'
    ];

    // public $timestamps = false;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    // Functions 

    // Returns true if the user is verified.

    public function verified(){

        return $this->token === null;
    }

    // Send the user a verification email

    public function sendVerificationEmail(){

        $this->notify(new VerifyEmail($this));
    }

    public function roles()
    {
        return $this
            ->belongsToMany('App\Role');
           // ->withTimestamps();
    }

    public function authorizeRoles($roles){

        if ($this->hasAnyRole($roles)) {
            return true;
        }
        abort(401, 'Authoritation not valid');
    }

    public function hasAnyRole($roles){
        if (is_array($roles)) {
            foreach ($roles as $role) {
                if ($this->hasRole($role)) {
                    return true;
                }
            }
        } else {
            if ($this->hasRole($roles)) {
                return true;
            }
        }
        return false;
    }
    public function hasRole($role){
        if ($this->roles()->where('name', $role)->first()) {
            return true;
        }
        return false;
    }

    
}
