<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
        return view('admin.users.create');
    }
}
