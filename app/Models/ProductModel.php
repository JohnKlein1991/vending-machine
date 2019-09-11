<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'remains'
    ];

    private $initialValues = [
        'juice' => 15,
        'coffee' => 20,
        'latte' => 20,
        'tea' => 10,
    ];

    public function removeItem()
    {
        if($this->remains == 0) return;
        $this->remains--;
        $this->save();
    }
    public function returnToInitialValues()
    {
        $products = self::all();
        foreach ($products as $product){
            $product->remains = $this->initialValues[$product->title];
            $product->save();
        }
    }
}
