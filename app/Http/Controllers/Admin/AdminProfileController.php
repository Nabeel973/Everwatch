<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function edit($id){
        $admin = Admin::find($id);
        return view('admin.settings.profile',compact('admin'));
    }

    public function update(Request $request){
        $date = Carbon::now()->format('Y_m_d');
        $request->validate([
            'admin_name' => 'required|string',
            'email' => 'required|email',
            'password'=>'required|min:6|string',
            'image'=>'image|mimes:jpeg,png,gif,jpg|max:2048',
        ]);

         if($request->password != $request->confirm_password){
             return redirect()->back()->with('error','Password does not match');
         }

         $admin = Admin::find($request->admin_id);
         $admin->name =  $request->admin_name;
         $admin->email =  $request->email;
         $admin->password =  bcrypt($request->password);
         $admin->save();

        if($request->has('image')){

            if($admin->img_path != NULL) {
                Storage::disk('public')->delete('images/' . $admin->id . '/' . $admin->img_path);
            }
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = 'pic_' . $admin->id  . '.'. $file->getClientOriginalExtension();
                Storage::disk('public')->putFileAs('images/'. $admin->id, $file, $filename);
                $admin->img_path = 'images/'. $admin->id .'/' . $filename;
                $admin->save();
            }
        }

         return redirect()->back()->with('success','Account updated');

    }
}
