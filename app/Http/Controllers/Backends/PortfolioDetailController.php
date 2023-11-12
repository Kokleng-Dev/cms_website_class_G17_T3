<?php

namespace App\Http\Controllers\Backends;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use File;

class PortfolioDetailController extends Controller
{
    public function index(Request $r, $portfolio_id){
        $datas = DB::table('portfolio_section_details')->where('portfolio_section_id',$portfolio_id)->paginate(5);
        return view('backends._portfolios.details.index', compact('datas','portfolio_id'));
    }
    public function create($portfolio_id){
        return view('backends._portfolios.details.create', compact('portfolio_id'));
    }
    public function store(Request $r, $portfolio_id){
        $data = $r->except('_token');
        $data['portfolio_section_id'] = $portfolio_id;
        $data['photo'] = $r->has('photo') ? $r->file('photo')->store("portfolio_section_details",'custom') : '';

        $s = DB::table("portfolio_section_details")->insertGetId($data);

        if($s){
            return redirect()->route('admin._portfolio.detail',$portfolio_id)->with('success',__('Insert Successfully'));
        }
        return redirect()->route('admin._portfolio.detail',$portfolio_id)->with('error',__('Insert Unsuccessfully'));
    }
    public function edit($portfolio_detail_id){
        $data = DB::table('portfolio_section_details')->find($portfolio_detail_id);

        return view('backends._portfolios.details.edit', compact('data'));
    }
    public function update(Request $r, $id){
        $old = DB::table('portfolio_section_details')->find($id);
        $data = $r->except('_token');
        $data['photo'] = $r->has('photo') ? $r->file('photo')->store("portfolio_section_details",'custom') : $old->photo;

        $u = DB::table('portfolio_section_details')->where('id', $id)->update($data);

        if($u){
            if($old->photo && $r->has('photo')){
                File::delete($old->photo);
            }
            return redirect()->route('admin._portfolio.detail', $old->portfolio_section_id)->with('success',__('Update Successfully'));
        }
        return redirect()->route('admin._portfolio.detail', $old->portfolio_section_id)->with('error',__('Update Unsuccessfully'));
    }
    public function delete($id){
        $detail = DB::table('portfolio_section_details')->find($id);
        $d = DB::table('portfolio_section_details')->where('id',$id)->delete();
        if($d){
            return redirect()->route('admin._portfolio.detail', $detail->portfolio_section_id)->with('success',__('Delete Successfully'));
        }
        return redirect()->route('admin._portfolio.detail', $detail->portfolio_section_id)->with('error',__('Delete Unsuccessfully'));
    }
}
