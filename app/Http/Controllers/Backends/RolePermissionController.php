<?php

namespace App\Http\Controllers\Backends;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class RolePermissionController extends Controller
{
    public function index($role_id){
        $role_permissions = DB::table('permissions')
                    ->leftJoin(DB::raw("(Select * from role_permissions where role_id = $role_id) as rolePer"),'rolePer.permission_id','permissions.id')
                    ->select(
                        'rolePer.*',
                        'permissions.name as name',
                        'permissions.id as permission_id'
                    )
                    ->get();
        $role_id = $role_id;
        return view('backends.role_permissions.index', compact('role_permissions','role_id'));
    }
    public function action(Request $r, $role_id){
        $role_permissions = $r->role_permission;
        foreach ($role_permissions as $index => $role_permission) {
            $role_permission = (object) $role_permission;
            if(!$role_permission->role_permission_id){ // if null
                DB::table('role_permissions')->insertGetId([
                    'role_id' => $role_id,
                    'permission_id' => $role_permission->permission_id,
                    'view' => property_exists($role_permission,'view') ? property_exists($role_permission,'view') : 0,
                    'create' => property_exists($role_permission,'create') ? property_exists($role_permission,'create') : 0,
                    'edit' =>  property_exists($role_permission,'edit') ? property_exists($role_permission,'edit') : 0,
                    'delete' => property_exists($role_permission,'delete')? property_exists($role_permission,'delete'): 0,
                ]);
            } else {
                DB::table("role_permissions")->where('id',$role_permission->role_permission_id)->update([
                    'view' => property_exists($role_permission,'view') ? property_exists($role_permission,'view') : 0,
                    'create' => property_exists($role_permission,'create') ? property_exists($role_permission,'create') : 0,
                    'edit' => property_exists($role_permission,'edit') ? property_exists($role_permission,'edit') : 0,
                    'delete' => property_exists($role_permission,'delete')? property_exists($role_permission,'delete'): 0,
                ]);
            }
        }

        return redirect()->back()->with('success',__('Update Successfully !!!'));
    }
}
