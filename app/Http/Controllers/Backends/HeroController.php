<?php

namespace App\Http\Controllers\Backends;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use File;

class HeroController extends Controller
{
    public function about(Request $r){
        $datas = DB::table('hero_sections')
                ->paginate(5);
        return view('backends._heros.index', compact('datas'));
    }
    public function create(){
        return view('backends._heros.create');
    }
    public function store(Request $r){
        $data = $r->except('_token');

        $s = DB::table("hero_sections")->insertGetId($data);

        if($s){
            return redirect()->route('admin._hero')->with('success',__('Insert Successfully'));
        }
        return redirect()->route('admin._hero')->with('error',__('Insert Unsuccessfully'));
    }
    public function edit($cta_id){
        $data = DB::table('hero_sections')->find($cta_id);

        return view('backends._heros.edit', compact('data'));
    }
    public function update(Request $r, $cta_id){

        $data = $r->except('_token');

        $u = DB::table('hero_sections')->where('id', $cta_id)->update($data);

        if($u){

            return redirect()->route('admin._hero')->with('success',__('Update Successfully'));
        }
        return redirect()->route('admin._hero')->with('error',__('Update Unsuccessfully'));
    }
    public function delete($cta_id){
        
        $d = DB::table('hero_sections')->where('id',$cta_id)->delete();
        if($d){
            return redirect()->route('admin._hero')->with('success',__('Delete Successfully'));
        }
        return redirect()->route('admin._hero')->with('error',__('Delete Unsuccessfully'));
    }
}
