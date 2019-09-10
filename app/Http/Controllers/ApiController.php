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
        $id = Auth::id();
        $wallet = (new User(['id' => $id]))->wallet;
        var_dump($wallet);
        die();
        return response()->json($wallet);
    }
    public function getProductsInfo()
    {
        $products = ProductModel::all();
        return response()->json($products);
    }
}
