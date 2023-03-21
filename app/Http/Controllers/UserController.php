<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
class UserController extends Controller
{
    //

    public function allusers(){
$users=User::all();
return view('Admin.pages.users',compact('users'));
    }


    public function Addusers(){

return view('Admin.pages.addusers');
    }


    public function storeusers(Request $request){
        $this->validate($request,[
            'name' =>'required|min:3',
            'pw' =>'required|min:3',
            'email' =>'required|email'
        ]);


        User::create(
            [

                'name'=> $request->name,
                'password'=>hash::make($request->pw),
                'email'=>$request->email





            ]
            );
            Alert::success('User added successfully',"You have added one user");

 return redirect()->back();




    }

    public function deleteuser($id){

        $user=User::find($id);
 $user->delete();
 return redirect()->back();
    }


}
