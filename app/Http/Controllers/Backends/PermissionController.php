<?php

namespace App\Http\Controllers\Backends;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Validator;

class PermissionController extends Controller
{
    public function index(){
        if(profile()->id != 1){
            return redirect()->route('admin.no_permission');
        }
        $permissions = DB::table('permissions')
                    ->paginate(5);
        return view('backends.permissions.index', compact('permissions'));
    }
    public function create(){
        if(profile()->id != 1){
            return redirect()->route('admin.no_permission');
        }
        return view('backends.permissions.create');
    }
    public function store(Request $r){
        if(profile()->id != 1){
            return redirect()->route('admin.no_permission');
        }
        $validator = Validator::make($r->all(), [
            'name' => 'required',
            'key' => 'required',
        ]);

        if($validator->fails()){
            return redirect()->back()->with('errors', $validator->errors()->all());
        }

        $key = $r->key;
        $name = $r->name;
        $i = DB::table('permissions')->insertGetId([
            'name' => $name,
            'key' => $key
        ]);

        if($i){
            return redirect()->route('admin.permission')->with('success',__('Insert successfully'));
        } else {
            return redirect()->route('admin.permission')->with('error',__('Insert Fail'));
        }
    }
    public function edit($permission_id){
        if(profile()->id != 1){
            return redirect()->route('admin.no_permission');
        }
        $permission = DB::table('permissions')->find($permission_id);

        return view('backends.permissions.edit', compact('permission'));
    }
    public function update(Request $r, $permission_id){
        if(profile()->id != 1){
            return redirect()->route('admin.no_permission');
        }
        $validator = Validator::make($r->all(), [
            'name' => 'required',
            'key' => 'required',
        ]);

        if($validator->fails()){
            return redirect()->back()->with('errors', $validator->errors()->all());
        }

        $data = [
            'name' => $r->name,
            'key' => $r->key,
        ];

        $u = DB::table('permissions')->where('id', $permission_id)->update($data);

        if($u){
            return redirect()->route('admin.permission')->with('success',__('Update Successfully'));
        }
        return redirect()->route('admin.permission')->with('error',__('Update Unsuccessfully'));
    }
    public function delete($permission_id){
        if(profile()->id != 1){
            return redirect()->route('admin.no_permission');
        }
        $d = DB::table('permissions')->where('id',$permission_id)->delete();
        if($d){
            return redirect()->route('admin.permission')->with('success',__('Delete Successfully'));
        }
        return redirect()->route('admin.permission')->with('error',__('Delete Unsuccessfully'));
    }
}
