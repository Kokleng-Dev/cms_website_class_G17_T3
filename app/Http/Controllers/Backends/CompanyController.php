<?php

namespace App\Http\Controllers\Backends;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use File;
class CompanyController extends Controller
{
    public function index(){

        $companies = DB::table('companies')
                    ->paginate(5);
        return view('backends.companies.index', compact('companies'));
    }
    public function create(){
        return view('backends.companies.create');
    }
    public function store(Request $r){
        $s = DB::table("companies")->insertGetId([
            'name' => $r->name,
            'phone' => $r->phone,
            'email' => $r->email,
            'address' => $r->address,
            'google_map' => $r->google_map,
            'twitter' => $r->twitter,
            'facebook' => $r->facebook,
            'instagram' => $r->instagram,
            'skype' => $r->skype,
            'linkedin' => $r->linkedin,
            'location' => $r->location,
        ]);

        if($s){
            return redirect()->route('admin.company')->with('success',__('Insert Successfully'));
        }
        return redirect()->route('admin.company')->with('error',__('Insert Unsuccessfully'));
    }
    public function edit($company_id){
        $company = DB::table('companies')->find($company_id);

        return view('backends.companies.edit', compact('company'));
    }
    public function update(Request $r, $company_id){
        $data = [
            'name' => $r->name,
            'phone' => $r->phone,
            'email' => $r->email,
            'address' => $r->address,
            'google_map' => $r->google_map,
            'twitter' => $r->twitter,
            'facebook' => $r->facebook,
            'instagram' => $r->instagram,
            'skype' => $r->skype,
            'linkedin' => $r->linkedin,
            'location' => $r->location,
        ];

        if($r->logo){
            $data['logo'] = $r->file('logo')->store('company','custom');
        }

        $old = DB::table('companies')->find($company_id);

        $u = DB::table('companies')->where('id', $company_id)->update($data);

        if($u){
            if($old->logo){
                File::delete($old->logo);
            }
            return redirect()->route('admin.company')->with('success',__('Update Successfully'));
        }
        return redirect()->route('admin.company')->with('error',__('Update Unsuccessfully'));
    }
}
