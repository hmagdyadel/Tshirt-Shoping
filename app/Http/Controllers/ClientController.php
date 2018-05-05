<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;
use Auth;

class ClientController extends Controller
{
    public function signup()
    {
        return view('user.signup');
    }

    public function postsignup(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:4',
            'email' => 'email|required|unique:clients',
            'password' => 'required|min:4',
            'phone' => 'required|min:11',
            'address' => 'required|min:5'
        ]);
        $client = new Client();
        $client->name = $request->name;
        $client->email = $request->email;
        $client->password = bcrypt($request->password);
        $client->phone = $request->phone;
        $client->address = $request->address;
        $client->save();
        Auth::login($client);

        return redirect()->route('user.profile');
    }

    public function signin()
    {
        return view('user.signin');
    }

    public function postsignin(Request $request)
    {
        $this->validate($request, [
            'email' => 'email|required',
            'password' => 'required|min:4'
        ]);
        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            return view('user.profile');
        }
        return redirect()->back();
    }
    public function getprofile(){
        return view ('user.profile');

    }
    public function logout(){
        Auth::logout();
        return redirect()->back();
    }
}
