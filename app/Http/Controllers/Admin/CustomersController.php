<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\User;
use App\UserContact;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CustomersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index(){
        $cities = City::where('status',1)->get();
        return view('admin.users.index',compact('cities'));
    }

    public function user_list(){
        $user = User::join('user_contacts as uc','uc.user_id','=','users.id')
            ->join('cities as c','c.id','=','users.city_id')
            ->select('users.id','users.name as user_name','users.email as user_email','users.phone as user_phone','users.country','users.address','c.name as city','users.company_name as company','users.status_id');

        $datatable = DataTables::of($user)
            ->editColumn('status_id',function ($user){
                if($user->status_id == 1){
                    return 'Active';
                }
                else{
                    return 'Not Active';
                }
            })
            ->addColumn('details',function($user){
                $details = UserContact::where('user_id',$user->id)->count();
                return  '<button type="button" class="btn btn-sm btn-outline-info align-middle">'.$details.'</button>';

            })
            ->addColumn('action',function($user){
                $dropdown = "";

                $dropdown .= '
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actions</button>
                            <div class="dropdown-menu dropdown-menu-sm">';


                $dropdown .= '<button type="button" class="dropdown-item edit_branch" data-target-id=' . $user->id . ' rel="#" data-toggle="modal" data-target="#"><div class="row no-gutters align-items-center"><div class="col-2"><i class="ft-plus-circle"></i></div><div class="col-9 offset-1">Edit</div></button>';


                $dropdown .= '</div>
                        </div>
                    ';


                return $dropdown;
            })
            ->rawColumns(['details','action'])
        ;
        return $datatable->make(true);

    }

    public function create(){
        $cities = City::where('status',1)->get();
        return view('admin.users.create',compact('cities'));
    }

    public function submit(Request $request){

      if($request->password != $request->pwd_confirmation){
          return redirect()->back()->with('error','Password Does not match');
      }
      else{
          $user = new User();
          $user->name = $request->user_name;
          $user->password = bcrypt($request->password);
          $user->company_name = $request->company;
          $user->city_id = $request->city_id;
          $user->address = $request->address;
          $user->country = $request->country;
          $user->phone = $request->phone;
          $user->email = $request->email;
          $user->status_id = $request->status_id;
          $user->save();

          foreach($request->addmore as $data){

              $contact_info = new UserContact();
              $contact_info->user_id = $user->id;
              $contact_info->name = $data['add_name'];
              $contact_info->designation = $data['add_designation'];
              $contact_info->phone = $data['add_phone'];
              $contact_info->email = $data['add_email'];
              $contact_info->save();
          }

      }
      return redirect()->route('admin.customers.index')->with('success','User Added Successfully');
    }

    public function customer_details(Request $request){

    }
}
