<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserContact extends Model
{
  protected $fillable = ['add_name','add_designation','add_phone','add_email'];
}
