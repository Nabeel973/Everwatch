<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function city_index(){
      return view('admin.settings.city.index');
    }

    public function city_create(){
        return view('admin.settings.city.create');
    }

}