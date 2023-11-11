<?php

namespace App\Http\Controllers\Backends;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use File;

class AboutController extends Controller
{
    public function about(Request $r){
        $abouts = DB::table('about_sections')
                ->paginate(5);
        return view('backends._abouts.index', compact('abouts'));
    }
    public function create(){
        return view('backends._abouts.create');
    }
    public function store(Request $r){

        $data = [
            'title_1' => $r->title_1,
            'titel_2' => $r->title_2,
            'is_public' => $r->is_public,
            'note' => $r->note
        ];

        if($r->has('photo')){
            $data['photo'] = $r->file('photo')->store('_abouts','custom');
        }

        $s = DB::table("about_sections")->insertGetId($data);

        if($s){
            return redirect()->route('admin._about')->with('success',__('Insert Successfully'));
        }
        return redirect()->route('admin._about')->with('error',__('Insert Unsuccessfully'));
    }
    public function edit($about_id){
        $data = DB::table('about_sections')->find($about_id);

        return view('backends._abouts.edit', compact('data'));
    }
    public function update(Request $r, $about_id){
        $old = DB::table('about_sections')->find($about_id);

        $data = [
            'title_1' => $r->title_1,
            'titel_2' => $r->title_2,
            'is_public' => $r->is_public,
            'photo' => $r->has('photo') ? $r->file('photo')->store('_abouts','custom') : $old->photo,
            'note' => $r->note
        ];

        $u = DB::table('about_sections')->where('id', $about_id)->update($data);

        if($u){
            if($old->photo && $r->has('logo')){
                File::delete($old->photo);
            }
            return redirect()->route('admin._about')->with('success',__('Update Successfully'));
        }
        return redirect()->route('admin._about')->with('error',__('Update Unsuccessfully'));
    }
    public function delete($about_id){
        
        $d = DB::table('about_sections')->where('id',$about_id)->delete();
        if($d){
            return redirect()->route('admin._about')->with('success',__('Delete Successfully'));
        }
        return redirect()->route('admin._about')->with('error',__('Delete Unsuccessfully'));
    }
}
