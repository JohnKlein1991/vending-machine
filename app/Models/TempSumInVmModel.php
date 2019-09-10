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
}
