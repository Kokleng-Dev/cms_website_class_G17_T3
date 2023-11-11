<?php

namespace App\Http\Controllers\Backends;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use File;

class PortfolioController extends Controller
{
    public function about(Request $r){
        $datas = DB::table('portfolio_sections')
                ->paginate(5);
        return view('backends._portfolios.index', compact('datas'));
    }
    public function create(){
        return view('backends._portfolios.create');
    }
    public function store(Request $r){
        $data = $r->except('_token');

        $s = DB::table("portfolio_sections")->insertGetId($data);

        if($s){
            return redirect()->route('admin._portfolio')->with('success',__('Insert Successfully'));
        }
        return redirect()->route('admin._portfolio')->with('error',__('Insert Unsuccessfully'));
    }
    public function edit($portfolio_id){
        $data = DB::table('portfolio_sections')->find($portfolio_id);

        return view('backends._portfolios.edit', compact('data'));
    }
    public function update(Request $r, $portfolio_id){
        $data = $r->except('_token');

        $u = DB::table('portfolio_sections')->where('id', $portfolio_id)->update($data);

        if($u){
            return redirect()->route('admin._portfolio')->with('success',__('Update Successfully'));
        }
        return redirect()->route('admin._portfolio')->with('error',__('Update Unsuccessfully'));
    }
    public function delete($portfolio_id){
        
        $d = DB::table('portfolio_sections')->where('id',$portfolio_id)->delete();
        if($d){
            return redirect()->route('admin._portfolio')->with('success',__('Delete Successfully'));
        }
        return redirect()->route('admin._portfolio')->with('error',__('Delete Unsuccessfully'));
    }
}
