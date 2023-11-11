<?php

namespace App\Http\Controllers\Backends;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use File;

class ClientController extends Controller
{
    public function about(Request $r){
        $datas = DB::table('client_sections')
                ->paginate(5);
        return view('backends._clients.index', compact('datas'));
    }
    public function create(){
        return view('backends._clients.create');
    }
    public function store(Request $r){

        $data = [
            'website' => $r->website,
            'name' => $r->name,
            'logo' => $r->has('logo') ? $r->file('logo')->store('_clients','custom') : '',
            'is_public' => $r->is_public,
        ];

        $s = DB::table("client_sections")->insertGetId($data);

        if($s){
            return redirect()->route('admin._client')->with('success',__('Insert Successfully'));
        }
        return redirect()->route('admin._client')->with('error',__('Insert Unsuccessfully'));
    }
    public function edit($about_id){
        $data = DB::table('client_sections')->find($about_id);

        return view('backends._clients.edit', compact('data'));
    }
    public function update(Request $r, $about_id){
        $old = DB::table('client_sections')->find($about_id);

        $data = [
            'website' => $r->website,
            'name' => $r->name,
            'logo' => $r->has('logo') ? $r->file('logo')->store('_clients','custom') : $old->logo,
            'is_public' => $r->is_public,
        ];

        $u = DB::table('client_sections')->where('id', $about_id)->update($data);

        if($u){
            if($old->logo && $r->has('logo')){
                File::delete($old->logo);
            }
            return redirect()->route('admin._client')->with('success',__('Update Successfully'));
        }
        return redirect()->route('admin._client')->with('error',__('Update Unsuccessfully'));
    }
    public function delete($about_id){
        
        $d = DB::table('client_sections')->where('id',$about_id)->delete();
        if($d){
            return redirect()->route('admin._client')->with('success',__('Delete Successfully'));
        }
        return redirect()->route('admin._client')->with('error',__('Delete Unsuccessfully'));
    }
}
