<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\User;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index(){

        return view('admin.users.index');
    }

    public function list(){
        //
    }

    public function create(){
        $cities = City::where('status',1)->get();
        return view('admin.users.create',compact('cities'));
    }

    public function submit(Request $request){
       dd($request);
    }
}
