<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class GoodsAndServices
 * @package App\Models
 * @property Integer $id
 * @property String $type
 * @property String $name
 * @property Integer $price
 * @property Integer $amount
 */
class GoodsAndServices extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $fillable = [
        'name',
        'price',
        'amount'
    ];
}
