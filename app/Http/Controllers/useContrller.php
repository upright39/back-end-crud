<?php

namespace App\Http\Controllers;

use App\Models\Myuser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class useContrller extends Controller
{
    //
    function register(Request $req)
    {
        $user = new Myuser();
        $user->name = $req->input('name');
        $user->email = $req->input('email');
        $user->password = Hash::make($req->input('password'));
        $user->save();
        return $user;
    }


    function Login(Request $req)
    {

        $user = Myuser::where('email', $req->email)->first();

        if (!$user || !Hash::check($req->password, $user->password)) {

            return ['error' => 'password or email mismatiched'];
        }

        return $user;
    }
}