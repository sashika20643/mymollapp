<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orders;
use RealRashid\SweetAlert\Facades\Alert;

class OrderController extends Controller
{
    //

    public function allorders(){
        $orders=Orders::all();
return view('Admin.pages.orders',compact('orders'));
    }


    public function changestate($id){
        $order=Orders::find($id);
       if($order->State=='pending'){
        $order->State='Complete';
       }
       else{
        $order->State='pending';
       }
        $order->save();
        return redirect()->back();

    }
}
