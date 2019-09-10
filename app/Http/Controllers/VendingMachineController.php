<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VendingMachineController extends Controller
{
    public function index()
    {
        if (Auth::check()){
            return view('vending-machine.index');
        } else {
            return redirect()->route('login');
//            return view('auth.login');
        }
    }
}
