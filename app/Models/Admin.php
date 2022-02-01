<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Storage;

class Admin extends Authenticatable
{
    protected $guard = 'admin';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'address', 'password','cnic','phone','city_id','role_id','image_path'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function image(){
        if($this->img_path == null)
        {
            return "/images/blank-profile-picture.png";
        }
        else
        {
            //return "/images/". $this->id .'/' . $this->img_path;
            return Storage::url($this->img_path);
        }

    }

}
