<?php

namespace App\Http\Controllers\Backends;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PortfolioDetailController extends Controller
{
    public function index(Request $r, $portfolio_id){

        return view('backends._portfolios.details.index');
    }
}
