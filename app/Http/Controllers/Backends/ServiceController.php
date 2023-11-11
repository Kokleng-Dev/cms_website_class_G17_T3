<?php

namespace App\Http\Controllers\Backends;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use File;

class ServiceController extends Controller
{
    public function about(Request $r){
        $datas = DB::table('service_sections')
                ->paginate(5);
        return view('backends._services.index', compact('datas'));
    }
    public function create(){
        return view('backends._services.create');
    }
    public function store(Request $r){
        $s = DB::table("service_sections")->insertGetId($r->except('_token'));

        if($s){
            return redirect()->route('admin._service')->with('success',__('Insert Successfully'));
        }
        return redirect()->route('admin._service')->with('error',__('Insert Unsuccessfully'));
    }
    public function edit($service_id){
        $data = DB::table('service_sections')->find($service_id);

        return view('backends._services.edit', compact('data'));
    }
    public function update(Request $r, $service_id){
        $u = DB::table('service_sections')->where('id', $service_id)->update($r->except('_token'));

        if($u){
            return redirect()->route('admin._service')->with('success',__('Update Successfully'));
        }
        return redirect()->route('admin._service')->with('error',__('Update Unsuccessfully'));
    }
    public function delete($service_id){
        
        $d = DB::table('service_sections')->where('id',$service_id)->delete();
        if($d){
            return redirect()->route('admin._service')->with('success',__('Delete Successfully'));
        }
        return redirect()->route('admin._service')->with('error',__('Delete Unsuccessfully'));
    }
}
