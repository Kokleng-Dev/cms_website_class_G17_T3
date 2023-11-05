<?php

function checkPermission($permission,$action){
    $role_id = session()->get('user')->role_id;
    $role_permission =DB::table('role_permissions')
            ->join('permissions','permissions.id','role_permissions.permission_id')
            ->where('role_id',$role_id)
            ->where('permissions.key',$permission)
            ->select('view','create','edit','delete')
            ->first();

    if(!$role_permission){
        return false;
    }

    if($action == 'view'){
        return $role_permission->view ? true : false;
    } else if ($action == 'create'){
        return $role_permission->create ? true : false;
    } else if ($action == 'edit'){
        return $role_permission->edit ? true : false;
    } else {
        return $role_permission->delete ? true : false;
    }

    return false;
}

function profile(){
    $user = session()->get('user');
    return DB::table('users')->find($user->id);
}

function company(){
    return DB::table('companies')->find(1);
}