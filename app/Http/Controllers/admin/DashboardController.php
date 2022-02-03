<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\WepCustomerData;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        $user = $user = Auth::user();
        $WepCustomerData = WepCustomerData::all();
        $pending = WepCustomerData::where('status','Pending')->get();
        $totalpending = $pending->count();
         
        return view('backend.admin.index',compact(['user','WepCustomerData','totalpending']));
    }
    public function pending(){
        $pending = WepCustomerData::where('status','Pending')->get();
        $totalpending = $pending->count();
        return view('backend.admin.pending',compact(['pending','totalpending']));
    }
}
