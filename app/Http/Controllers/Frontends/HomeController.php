<?php

namespace App\Http\Controllers\Frontends;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    public function index(){
        $data['abouts'] = DB::table('about_sections')->where('is_public',1)->get();
        $data['clients'] = DB::table('client_sections') ->where('is_public',1)->get();
        $data['services'] = DB::table('service_sections')->where('is_public',1)->get();
        $data['ctas'] = DB::table('cta_sections')->where('is_public',1)->first();
        $data['portfolios'] = DB::table('portfolio_sections')->where('is_public',1)->get();
        $data['company'] = DB::table('companies')->find(1);
        return view('frontends.homes.index', $data);
    }
}
