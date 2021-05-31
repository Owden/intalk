<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Deliveries
 * @package App\Models
 * @property Integer $id
 * @property Integer $supplier_id
 * @property Integer $delivered_good
 * @property String $amount
 * @property Carbon $time_of_delivery
 * @property Integer $price
 */
class Deliveries extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $fillable = [
        'supplier_id',
        'delivered_good',
        'amount',
        'time_of_delivery',
        'price'
    ];

    public function supplier() {
        return $this->hasOne(Suppliers::class,"id", "supplier_id");
    }

    public function delivered_good_details() {
        return $this->hasOne(GoodsAndServices::class,"id", "delivered_good");
    }
}
