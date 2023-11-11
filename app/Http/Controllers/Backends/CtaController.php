<?php

namespace App\Http\Controllers\Backends;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use File;

class CtaController extends Controller
{
    public function about(Request $r){
        $datas = DB::table('cta_sections')
                ->paginate(5);
        return view('backends._ctas.index', compact('datas'));
    }
    public function create(){
        return view('backends._ctas.create');
    }
    public function store(Request $r){
        $data = $r->except('_token');
        $data['photo'] = $r->has('photo') ? $r->file('photo')->store('ctas','custom') : '';

        $s = DB::table("cta_sections")->insertGetId($data);

        if($s){
            return redirect()->route('admin._cta')->with('success',__('Insert Successfully'));
        }
        return redirect()->route('admin._cta')->with('error',__('Insert Unsuccessfully'));
    }
    public function edit($cta_id){
        $data = DB::table('cta_sections')->find($cta_id);

        return view('backends._ctas.edit', compact('data'));
    }
    public function update(Request $r, $cta_id){
        $old = DB::table('cta_sections')->find($cta_id);

        $data = $r->except('_token');
        $data['photo'] = $r->has('photo') ? $r->file('photo')->store('ctas','custom') : $old->photo;

        $u = DB::table('cta_sections')->where('id', $cta_id)->update($data);

        if($u){
            if($r->has('photo') && $old->photo){
                File::delete($old->photo);
            }
            return redirect()->route('admin._cta')->with('success',__('Update Successfully'));
        }
        return redirect()->route('admin._cta')->with('error',__('Update Unsuccessfully'));
    }
    public function delete($cta_id){
        
        $d = DB::table('cta_sections')->where('id',$cta_id)->delete();
        if($d){
            return redirect()->route('admin._cta')->with('success',__('Delete Successfully'));
        }
        return redirect()->route('admin._cta')->with('error',__('Delete Unsuccessfully'));
    }
}
