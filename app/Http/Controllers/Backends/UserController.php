<?php

namespace App\Http\Controllers\Backends;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Hash;
use File;

class UserController extends Controller
{
    public function index(){

        $users = DB::table('users')
                    ->join('roles','roles.id','users.role_id')
                    ->where('users.id','!=', profile()->id == 1 ? '' : 1)
                    ->select('users.*','roles.name as role_name')
                    ->paginate(5);
        return view('backends.users.index', compact('users'));
    }
    public function create(){
        $roles = DB::table('roles')->get();
        return view('backends.users.create', compact('roles'));
    }
    public function store(Request $r){
        $s = DB::table("users")->insertGetId([
            'name' => $r->name,
            'email' => $r->email,
            'role_id' => $r->role_id,
            'photo' => $r->photo ? $r->file('photo')->store('users','custom') : '',
            'password' => Hash::make($r->password)
        ]);


        if($s){
            return redirect()->route('admin.user')->with('success',__('Insert Successfully'));
        }
        return redirect()->route('admin.user')->with('error',__('Insert Unsuccessfully'));
    }
    public function edit($user_id){
        $user = DB::table('users')->find($user_id);
        $roles = DB::table('roles')->get();

        return view('backends.users.edit', compact('user','roles'));
    }
    public function update(Request $r, $user_id){
        $old = DB::table('users')->find($user_id);

        $data = [
            'name' => $r->name,
            'email' => $r->email,
            'photo' => $r->photo ? $r->file('photo')->store('users','custom') : '',
            'role_id' => $r->role_id,
        ];

        if($r->password){
            $data['password'] = Hash::make($r->password);
        }
        $u = DB::table('users')->where('id', $user_id)->update($data);

        if($u){
            if($old->photo){
                File::delete($old->photo);
            }
            return redirect()->route('admin.user')->with('success',__('Update Successfully'));
        }
        return redirect()->route('admin.user')->with('error',__('Update Unsuccessfully'));
    }
    public function delete($user_id){
        
        $d = DB::table('users')->where('id',$user_id)->delete();
        if($d){
            return redirect()->route('admin.user')->with('success',__('Delete Successfully'));
        }
        return redirect()->route('admin.user')->with('error',__('Delete Unsuccessfully'));
    }
}
