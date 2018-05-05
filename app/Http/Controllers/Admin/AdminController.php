<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $users=User::all();
        return view('Admin.show',compact('users'));
    }
    public function addadmin(){
        return view('Admin.add');
    }
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
    public function destroy(User $user){
        if(count($user)<=1){
            echo "Can not delete because there is only one admin";
        }
        else
        {
            $user->delete();
        }
        return redirect()->route('admin.index');
    }
    public function newEmail(Request $request){
        $user=Auth::user();
        $newEmail=$request->email;
        $currentPassword=$request->currentPassword;
        if(Hash::check($currentPassword,$user->password)){
            $objuser=User::find(Auth::user()->id);
            $objuser->email=$newEmail;
            $objuser->save();
            return redirect()->route('admin.index')->with('message','change Email successfully');
        }
        else
        {
            return redirect()->route('admin.index')->with('error ','change Email failed');;
        }
    }
    public function newPassword(Request $request){
        $user=Auth::user();
        $newpass=$request->newPassword;
        $currentPassword=$request->currentPassword;
        $repass=$request->repassword;

        if(Hash::check($currentPassword,$user->password)){
            $objuser=User::find(Auth::user()->id);
            $objuser->password=Hash::make($newpass);
            $objuser->save();
            return redirect()->route('admin.index')->with('message','change password successfully');
        }
        else
        {
            return redirect()->route('admin.index')->with('error ','change password failed');;
        }
    }
}
