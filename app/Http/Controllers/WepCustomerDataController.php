<?php

namespace App\Http\Controllers;

use App\Models\WepCustomerData;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreWepCustomerDataRequest;
use Illuminate\Http\Request;
class WepCustomerDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWepCustomerDataRequest $request)
    {
        $validated = $request->validated();
        $customerdata = new WepCustomerData();
        $customerdata->name = $request->name;
        $customerdata->email = $request->email;
        $customerdata->mobile = $request->mobile;
        $customerdata->model = $request->model;
        $customerdata->serial = $request->serial;
        $customerdata->retailer = $request->retailer;
        $customerdata->shop = $request->shop;
        $customerdata->purchase_date =$request->purchase_date;
        $customerdata->invoice = $request->invoice;
        $this->storeImage($request,$customerdata);
        $customerdata->status = 'Pending';
        $user = Auth::user();
        $customerdata->user_id = $user->id;
        $customerdata->save();
        $user['wep_status'] = 'Pending for Approval';
        $user['wepCustomerData_id'] = $customerdata->id;
        $user['is_wep_applied'] = true;
        $user->update();
        return redirect()->route('customer.dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WepCustomerData  $wepCustomerData
     * @return \Illuminate\Http\Response
     */
    public function show(WepCustomerData $wepCustomerData)
    {
        if($wepCustomerData->user_id !=Auth::id() && Auth::user()->role_id > 2){
            return redirect()->back();
        }
        // $pending = WepCustomerData::where('status','Pending')->get();
        $totalpending = '';
        $user = Auth::user();
        $ucid = 'WEP-'.''.strtotime($user->created_at).$user->id; 
        return view('backend.customer.profile',compact(['wepCustomerData','user','ucid','totalpending']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WepCustomerData  $wepCustomerData
     * @return \Illuminate\Http\Response
     */
    public function edit(WepCustomerData $wepCustomerData)
    {
        return view('backend.customer.edit',compact(['wepCustomerData']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WepCustomerData  $wepCustomerData
     * @return \Illuminate\Http\Response
     */
    public function update(StoreWepCustomerDataRequest $request, WepCustomerData $wepCustomerData)
    {
        $validated = $request->validated();
        $wepCustomerData->user_id = Auth::user()->id;
        $wepCustomerData->name = $request->name;
        $wepCustomerData->email = $request->email;
        $wepCustomerData->mobile = $request->mobile;
        $wepCustomerData->model = $request->model;
        $wepCustomerData->serial = $request->serial;
        $wepCustomerData->retailer = $request->retailer;
        $wepCustomerData->shop = $request->shop;
        $wepCustomerData->purchase_date = $request->purchase_date;
        $wepCustomerData->invoice = $request->invoice;
        $this->storeImage($request,$wepCustomerData);
        $wepCustomerData->update();
        return redirect()->route('customer.dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WepCustomerData  $wepCustomerData
     * @return \Illuminate\Http\Response
     */
    public function destroy(WepCustomerData $wepCustomerData)
    {
        $deleted_user = User::where('wepCustomerData_id',$wepCustomerData->id)->first();
        $deleted_user->wep_status = "None";
        $deleted_user->date_of_approval = null;
        $deleted_user->is_wep_approved = false;
        $deleted_user->is_wep_applied = false;
        $deleted_user->save();
        $wepCustomerData->delete();
        return redirect()->route('superadmin.dashboard');
    }
    public function storeImage($request,$customerdata){
        //store image in app/storage and get the location
        $img_invoice_location = $request->img_invoice->storeAs('User_Images/invoice',$request->input('name').$request->input('mobile').'_invoice.'.$request->img_invoice->extension());
        //send it to database
        $customerdata->img_invoice = $img_invoice_location;
    }
    // public function profile(WepCustomerData $wepCustomerData){
    //     dd($wepCustomerData);
    //     $user = $user = Auth::user();
    //     return view('backend.customer.profile',compact(['wepCustomerData','user']));
    // }
    public function approve(WepCustomerData $wepCustomerData){
       $approved_user = User::where('wepCustomerData_id',$wepCustomerData->id)->first(); 
       $approved_user->wep_status = "Approved";
       $approved_user->date_of_approval = $wepCustomerData->purchase_date;
       $approved_user->is_wep_approved = true;
       $approved_user->save();
       $wepCustomerData->status = "Approved";
       $wepCustomerData->update();
       return redirect()->route('superadmin.dashboard');
    }
    public function getcard(WepCustomerData $wepCustomerData){
        if($wepCustomerData->user_id !=Auth::id()){
            return redirect()->back();
        }
        $warrantyHolder = User::where('wepCustomerData_id',$wepCustomerData->id)->first();
        return view('backend.customer.warrantycard',compact(['wepCustomerData','warrantyHolder']));
    }
}
