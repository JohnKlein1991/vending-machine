<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TempSumInVmModel extends Model
{
    protected $table = 'temp_sum_in_vm';

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
        $this->$value++;
        $this->save();
    }
    public function getSum()
    {
        $sum = $this->one_rub + $this->two_rub*2 + $this->five_rub*5 + $this->ten_rub*10;
        return $sum;
    }
    public function getCoins()
    {
        $result = [
            'one_rub' => $this->one_rub,
            'two_rub' => $this->two_rub,
            'five_rub' => $this->five_rub,
            'ten_rub' => $this->ten_rub,
        ];
        return $result;
    }
    public function zeroTempMoney()
    {
        $this->one_rub = 0;
        $this->two_rub = 0;
        $this->five_rub = 0;
        $this->ten_rub = 0;
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
    public function writeOffMoney($change)
    {
        foreach ($change as $title => $count){
            $this->$title -= $count;
        }
        $this->save();
    }
    public function putMoneyOnWallet($coins)
    {
        foreach ($coins as $title => $count){
            $this->$title += $count;
        }
        $this->save();
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
