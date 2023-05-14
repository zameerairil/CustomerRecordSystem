<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use App\Models\Customer;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Artisan;
use Hash;

class AdminController extends Controller
{
    //Function Login Process
    public function login(Request $request)
    {
        $admin = Admin::where('email', $request->email)->first();
        if ($admin) {
            $pass= Hash::check($request->password, $admin->password);
            if ($pass) {
               
                $adid = session()->get('adid');
             
              
                    $adid =$admin->id;
                    session()->put('adid',$adid);
                   
               
                $adnm = session()->get('adnm');
             

                    $adnm =$admin->username;
                    session()->put('adnm',$adnm);



                 return redirect()->route('admin.home');
                
            } else {
                return redirect()->route('index')
                ->with('failpass','WRONG PASSWORD');
            }
        }
        else {
            return redirect()->route('index')
            ->with('failemail','EMAIL DOES NOT EXITS');
        }
    }

    public function adminhome()
    {
        $users = Customer::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
                            ->whereYear('created_at',date('Y'))
                            ->groupBy('month')
                            ->orderBy('month')
                            ->get();
        $labels = [];
        $data = [];
        $colors = ['#FF6384','#36A2EB','#FFCE56','#8BC34A','#FF5722','#009688','#795548','#9C27B0','#2196F3','FF9800','#CDDC39','#607D8B'];

        for($i=1; $i < 13; $i++){
            $month = date('F',mktime(0,0,0,$i,1));
            $count = 0;

            foreach($users as $user){
                if($user->month==$i){
                    $count = $user->count;
                    break;
                }
            }

            array_push($labels,$month);
            array_push($data, $count);
        }

        $datasets = [
            [
                'label' => 'Pelanggan',
                'data' => $data,
                'bacgroundColor' => $colors
            ]
            ];

            return view('admin.dashboard',compact('datasets','labels'));
    }

    public function logout()
    {
        session()->forget('adid');
        session()->forget('adnm');
        return view('index');
    }
    
    public function customerkereta()
    {
        $customer = Customer::where('category','1')->get();
        return view('admin.tablekereta', compact('customer'));
    }

    public function customermotosikal()
    {
        $customer = Customer::where('category','2')->get();
        return view('admin.tablemotosikal', compact('customer'));
    }

    public function tambahdata()
    {
        return view('admin.tambahdata');
    }

    public function tamattempoh()
    {
        Artisan::call('email:send');
        return redirect()->route('admin.dataexpired')
                        ->with('success','Emel Telah Dihantar');
        //add other stuff like a success view
    }

    public function dataexpired()
    {
        $customer = Customer::where('expiry','<',Carbon::now())->get();
        return view('admin.tableexpired', compact('customer')); 
    }
}
