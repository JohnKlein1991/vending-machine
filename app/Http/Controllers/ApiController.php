<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use App\Models\WalletModel;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    public function getVMCoins()
    {
        $vmWallet = WalletModel::where('user_id', '=',0)->first();
        return response()->json($vmWallet);
    }
    public function getUserCoins()
    {
        $wallet = Auth::user()->wallet;
        return response()->json($wallet);
    }
    public function getProductsInfo()
    {
        $products = ProductModel::all();
        return response()->json($products);
    }
    public function getVMTempSum()
    {
        $tempSum = Auth::user()->tempSum;
        return response()->json($tempSum);
    }

    public function insertCoin(Request $request)
    {
        $value = $request->value;
        if(!(Auth::user()->wallet->$value)) return;
        Auth::user()->wallet->insertCoin($value);
        Auth::user()->tempSum->insertCoin($value);
    }
}
