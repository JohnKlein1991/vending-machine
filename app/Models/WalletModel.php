<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WalletModel extends Model
{
    protected $table = 'wallets';

    private $userInitialValues = [
        'one_rub' => 10,
        'two_rub' => 30,
        'five_rub' => 20,
        'ten_rub' => 15,
    ];
    private $vmInitialValues = [
        'one_rub' => 100,
        'two_rub' => 100,
        'five_rub' => 100,
        'ten_rub' => 100,
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'one_rub', 'two_rub', 'five_rub', 'ten_rub'
    ];

    public function insertCoin($value)
    {
        $this->$value--;
        $this->save();
    }
    public function countChange($sum)
    {
        $result = [];
        $arr = $this->getCoinsArray();
        foreach ($arr as $title => $value){
            $x = (int) floor($sum/$value);
            if($x <= $this->$title) {
                $sum = $sum - $x * $value;
                $result[$title] = $x;
            } else {
                $sum = $sum - $this->$title * $value;
                $result[$title] = $this->$title;
            }
            if($sum == 0) break;
        }
        if($sum == 0) {
            return $result;
        } else {
            return false;
        }
    }
    public function putMoneyOnWallet($change)
    {
        foreach ($change as $title => $count){
            $this->$title += $count;
        }
        $this->save();
    }

    public function writeOffMoney($change)
    {
        foreach ($change as $title => $count){
            $this->$title -= $count;
        }
        $this->save();
    }
    public function returnToInitialValues($isVMWallet = false)
    {
        if ($isVMWallet){
            $vmWallet = self::where('user_id', '=',0)->first();
            foreach ($this->vmInitialValues as $title => $count){
                $vmWallet->$title = $count;
            }
            $vmWallet->save();
        } else {
            foreach ($this->userInitialValues as $title => $count){
                $this->$title = $count;
            }
            $this->save();
        }
    }

    private function getCoinsArray()
    {
        return [
            'ten_rub' => 10,
            'five_rub' => 5,
            'two_rub' => 2,
            'one_rub' => 1,
        ];
    }
}
