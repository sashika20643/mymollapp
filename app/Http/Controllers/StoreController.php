<?php

namespace App\Http\Controllers;
use App\Models\stores;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Http\Request;

class StoreController extends Controller
{

    public function allstores(){
        $stores=stores::all();
        return view('Admin.pages.stores',compact('stores'));
            }


    public function addstore(){

        return view('Admin.pages.addstore');

    }

    public function storestore(Request $request){
        $this->validate($request,[
            'name' =>'required|min:3',
            'rate' =>'required'
        ]);


        stores::create(
            [

                'name'=> $request->name,
                'rate'=>$request->rate





            ]
            );
            Alert::success('User added successfully',"You have added one user");

 return redirect()->back();




    }


    public function deletestore($id){

        $store=stores::find($id);
 $store->delete();
 return redirect()->back();
    }


    public function setrate(Request $request){
        $store=stores::find($request->id);
        $store->rate=$request->rate;
        $store->save();
        return redirect()->back();



    }
}
