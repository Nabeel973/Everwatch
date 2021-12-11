<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\City;
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

    public function city_store(Request $request){

        $city = City::create(['name' => $request->city_name,'status' => 1]);
        return redirect()->back()->with('success',$city->name .' Created');
    }

}
