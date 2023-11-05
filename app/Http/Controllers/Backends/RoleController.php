<?php

namespace App\Http\Controllers\Backends;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class RoleController extends Controller
{
    public function index(){

        $roles = DB::table('roles')
                    ->where('id','!=', profile()->role_id == 1 ? '' : 1)
                    ->paginate(5);
        return view('backends.roles.index', compact('roles'));
    }
    public function create(){
        return view('backends.roles.create');
    }
    public function store(Request $r){
        $s = DB::table("roles")->insertGetId([
            'name' => $r->name,
            'note' => $r->note
        ]);

        if($s){
            return redirect()->route('admin.role')->with('success',__('Insert Successfully'));
        }
        return redirect()->route('admin.role')->with('error',__('Insert Unsuccessfully'));
    }
    public function edit($user_id){
        $role = DB::table('roles')->find($user_id);

        return view('backends.roles.edit', compact('role'));
    }
    public function update(Request $r, $user_id){
        $data = [
            'name' => $r->name,
            'note' => $r->note,
        ];

        $u = DB::table('roles')->where('id', $user_id)->update($data);

        if($u){
            return redirect()->route('admin.role')->with('success',__('Update Successfully'));
        }
        return redirect()->route('admin.role')->with('error',__('Update Unsuccessfully'));
    }
    public function delete($user_id){
        
        $d = DB::table('roles')->where('id',$user_id)->delete();
        if($d){
            return redirect()->route('admin.role')->with('success',__('Delete Successfully'));
        }
        return redirect()->route('admin.role')->with('error',__('Delete Unsuccessfully'));
    }
}
