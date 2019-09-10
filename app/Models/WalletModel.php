<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WalletModel extends Model
{
    protected $table = 'wallets';

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
}
