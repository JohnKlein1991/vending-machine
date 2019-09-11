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
    public function getMoney()
    {
        $sum = Auth::user()->tempSum->getSum();
        $vmWallet = WalletModel::where('user_id', '=',0)->first();
        $change = $vmWallet->countChange($sum);
        if($change){
            Auth::user()->wallet->putMoneyOnWallet($change);
            $vmWallet->writeOffMoney($change);
            $tempCoins = Auth::user()->tempSum->getCoins();
            Auth::user()->tempSum->zeroTempMoney();
            $vmWallet->putMoneyOnWallet($tempCoins);
        }
    }

    public function buyProduct(Request $request)
    {
        $productTitle = $request->product;
        $product = ProductModel::where('title', '=', $productTitle)->first();
        if(!$product) return;
        $vmWallet = WalletModel::where('user_id', '=',0)->first();
        $tempWallet = Auth::user()->tempSum;
        if($product){
            //
            $cost = $product->cost;
            $tempSum = $tempWallet->getSum();
            $restSum = $tempSum - $cost;
            if($restSum < 0) {
                return response(['no_money' => true]);
            }

            $tempCoins = $tempWallet->getCoins();
            $tempWallet->zeroTempMoney();
            $vmWallet->putMoneyOnWallet($tempCoins);

            $restCoins = $vmWallet->countChange($restSum);
            $vmWallet->writeOffMoney($restCoins);
            $tempWallet->putMoneyOnWallet($restCoins);

            $product->removeItem();
        }
    }
    public function returnToInitialValues()
    {
        $tempWallet = Auth::user()->tempSum;
        $userWallet = Auth::user()->wallet;
        $products = new ProductModel();

        $userWallet->returnToInitialValues();
        $userWallet->returnToInitialValues(true);
        $tempWallet->zeroTempMoney();
        $products->returnToInitialValues();
    }
}
