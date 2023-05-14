<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use DB;

class CustomerController extends Controller
{
    public function submit(Request $request)
    {
        $cust = new Customer();
        $cust->name = $request->input('name');
        $cust->contact = $request->input('contact');
        $cust->email = $request->input('email');
        $cust->noplate = $request->input('noplate');
        $cust->category = $request->input('category');
        $cust->insutype = $request->input('insutype');
        if($request->input('insutype')=="Kurnia")
        {
            $cust->commrate="2";
        }
        elseif($request->input('insutype')=="Etiqa")
        {
            $cust->commrate="2.5";
        }
        elseif($request->input('insutype')=="Allianz")
        {
            $cust->commrate="3";
        }
        elseif($request->input('insutype')=="Liberity")
        {
            $cust->commrate="3.2";
        }
        $cust->expiry = $request->input('expiry');
        $cust->save();
        if($request->input('category')=="1")
        {
            return redirect()->route('admin.customerkereta')
                        ->with('success','Customer updated successfully.');
        }
        elseif($request->input('category')=="2")
        {
            return redirect()->route('admin.customermotosikal')
                        ->with('success','Customer updated successfully.');
        }
    }

    public function keretadelete(Customer $customer)
    {
        $customer->delete();
  
        return redirect()->route('admin.customerkereta')
                        ->with('success','Customer deleted');
    }

    public function motodelete(Customer $customer)
    {
        $customer->delete();
  
        return redirect()->route('admin.customermotosikal')
                        ->with('success','Customer deleted');
    }

    public function editcustomer($id)
    {
        $customer = Customer::find($id);
        $customer = Customer::where('id',$id)->select('customer.*')->first();
        return view('admin.editcustomer',compact('customer'));
    }

    public function updatecustomer(Request $request,$id)
    {
        $cust=Customer::find($id);

        $cust->name = $request->input('name');
        $cust->contact = $request->input('contact');
        $cust->email = $request->input('email');
        $cust->noplate = $request->input('noplate');
        $cust->category = $request->input('category');
        $cust->insutype = $request->input('insutype');
        if($request->input('insutype')=="Kurnia")
        {
            $cust->commrate="2";
        }
        elseif($request->input('insutype')=="Etiqa")
        {
            $cust->commrate="2.5";
        }
        elseif($request->input('insutype')=="Allianz")
        {
            $cust->commrate="3";
        }
        elseif($request->input('insutype')=="Liberity")
        {
            $cust->commrate="3.2";
        }
        $cust->expiry = $request->input('expiry');
        $cust->updated_at = \Carbon\Carbon::now("Asia/Kuala_Lumpur");
        $cust->save();
        if($request->input('category')=="1")
        {
            return redirect()->route('admin.customerkereta')
                        ->with('success','Customer updated successfully.');
        }
        elseif($request->input('category')=="2")
        {
            return redirect()->route('admin.customermotosikal')
                        ->with('success','Customer updated successfully.');
        }
        
    }
    
    public static function etiqa()
    {
        $id="Etiqa";
        $etiqa = DB::table('customer')
        ->where('insutype',$id)
        ->count();
        return $etiqa;
    }

    public static function allianz()
    {
        $id="Allianz";
        $allianz = DB::table('customer')
        ->where('insutype',$id)
        ->count();
        return $allianz;
    }

    public static function liberity()
    {
        $id="Liberity";
        $liberity = DB::table('customer')
        ->where('insutype',$id)
        ->count();
        return $liberity;
    }

    public static function kurnia()
    {
        $id="Kurnia";
        $kurnia = DB::table('customer')
        ->where('insutype',$id)
        ->count();
        return $kurnia;
    }

    public static function semua()
    {
        $semua = DB::table('customer')->count();
        return $semua;
    }
}
