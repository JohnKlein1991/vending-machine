<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class VendingMachineController extends Controller
{
    public function index()
    {
        if (Auth::check()){
            $token = Auth::user()->api_token;
            setcookie('api_token', $token);
            return view('vending-machine.index');
        } else {
            return redirect()->route('login');
        }
    }
}
