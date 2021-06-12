<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    public function getFullName()
    {
        $f_name=$this->f_name;
        $l_name=$this->l_name;
        return $f_name.'-'.$l_name;
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class,'users_roles','user_id','role_id');
    }
     
    public function hasAnyRole($roles)
    {
        if(is_array($roles))
        {
            foreach($roles as $role)
            {
                if($this->hasRole($role))
                {
                    return true;
                }
            }
        }
        else
        {
            
            if($this->hasRole($roles))
            {
                return true;
            }
        }
    }

    public function hasRole($role)
    {
          if($this->roles()->where('name',$role)->first())
            {
                return true;
            }
            return false;
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','avatar','provider_id',
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

    public function orders()
    {
        return $this->hasMany([Order::class]);
    }
}
