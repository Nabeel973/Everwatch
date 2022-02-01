<?php

namespace App\Http\Controllers\Admin;


use App\Branch;
use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function city_index(){
      return view('admin.settings.city.index');
    }

    public function city_list(){

        $city =  City::select(['id','name','status','details']);
        return Datatables::of($city)
            ->editColumn('status',function($city){
              if($city->status == 1){
                  return 'Enabled';
              }
              else{
                  return 'Disabled';
              }
            })
            ->addColumn('action',function($city){
                $dropdown = "";

                    $dropdown .= '
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actions</button>
                            <div class="dropdown-menu dropdown-menu-sm">';

               /* if ($city->status == 1) {
                    $dropdown .= '<button type="button" class="dropdown-item deactivate" data-target-id=' . $city->id . ' rel="routeInactive"><div class="row no-gutters align-items-center"><div class="col-2"><i class="ft-plus-circle"></i></div><div class="col-9 offset-1">Disable</div></button>';
                } else {
                    $dropdown .= '<button type="button" class="dropdown-item deactivate" data-target-id=' . $city->id . ' rel="routeActive"><div class="row no-gutters align-items-center"><div class="col-2"><i class="ft-plus-circle"></i></div><div class="col-9 offset-1">Enable</div></button>';
                }*/

                $dropdown .= '<button type="button" class="dropdown-item edit_city" data-target-id=' . $city->id . ' rel="#" data-toggle="modal" data-target="#"><div class="row no-gutters align-items-center"><div class="col-2"><i class="ft-plus-circle"></i></div><div class="col-9 offset-1">Edit</div></button>';


                    $dropdown .= '</div>
                        </div>
                    ';


                return $dropdown;
            })
            ->make(true);
    }

    public function city_store(Request $request){
        if($request->has('city_name')){
            $city = new City();
            $city->name = $request->city_name;
            $city->status = $request->status;
            $city->code = $request->city_code;
            if($request->city_details != null){
                $city->details = $request->city_details;
            }
            $city->save();
            return redirect()->back()->with('success','City ' . $city->name .' Created');
        }
        else{
            return redirect()->back()->with('error','City cannot be created');
        }
    }

    public function city_update(Request $request,$id){

        $city = City::find($id);
        $city->name = $request->edit_city_name;
        $city->code = $request->edit_city_code;
        $city->status = $request->edit_status;
        $city->details = $request->edit_city_details;
        $city->save();
        return redirect()->back()->with('success','City ' . $city->name .' Updated');
    }

    public function city_edit(Request $request)
    {
        $id = $request->city_id;

        if ($id) {
            $city = City::find($id);
            $name = $city->name;
            $code = $city->code;
            $status = $city->status;
            $details = $city->details;
            return response()->json(['name' => $name,'code' => $code,'status' => $status, 'details' => $details]);
        }
    }


    //Branches

    public function branch_index(){
        $cities = City::where('status',1)->select('id','name')->get();
        return view('admin.settings.city.branch.index',compact('cities'));
    }

    public function branch_list(){

        $branch = Branch::join('cities as c','c.id','=','branches.city_id')
            ->select(['branches.id as id','branches.name','branches.status','branches.details','c.name as city'])
        ->where('c.status',1);

        return Datatables::of($branch)
            ->editColumn('status',function($branch){
                if($branch->status == 1){
                    return 'Enabled';
                }
                else{
                    return 'Disabled';
                }
            })
            ->addColumn('action',function($branch){
                $dropdown = "";

                $dropdown .= '
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actions</button>
                            <div class="dropdown-menu dropdown-menu-sm">';


                $dropdown .= '<button type="button" class="dropdown-item edit_branch" data-target-id=' . $branch->id . ' rel="#" data-toggle="modal" data-target="#"><div class="row no-gutters align-items-center"><div class="col-2"><i class="ft-plus-circle"></i></div><div class="col-9 offset-1">Edit</div></button>';


                $dropdown .= '</div>
                        </div>
                    ';


                return $dropdown;
            })
            ->make(true);
    }

    public function branch_store(Request $request){
        if($request->has('branch_name')){
            $branch = new Branch();
            $branch->city_id = $request->city_id;
            $branch->name = $request->branch_name;
            $branch->status = $request->status;
            $branch->code = $request->branch_code;
            if($request->branch_details != null){
                $branch->details = $request->branch_details;
            }
            $branch->save();
            return redirect()->back()->with('success','Branch ' . $branch->name .' Created');
        }
        else{
            return redirect()->back()->with('error','Branch cannot be created');
        }
    }

    public function branch_update(Request $request,$id){

        $branch = Branch::find($id);
        $branch->name = $request->edit_branch_name;
        $branch->code = $request->edit_branch_code;
        $branch->status = $request->edit_status;
        $branch->details = $request->edit_branch_details;
        $branch->save();
        return redirect()->back()->with('success','Branch ' . $branch->name .' Updated');
    }

    public function branch_edit(Request $request)
    {
        $id = $request->branch_id;

        if ($id) {
            $branch = Branch::find($id);
            $city = $branch->city_id;
            $name = $branch->name;
            $code = $branch->code;
            $status = $branch->status;
            $details = $branch->details;
            return response()->json(['city' => $city,'name' => $name,'code' => $code,'status' => $status, 'details' => $details]);
        }
    }


}
