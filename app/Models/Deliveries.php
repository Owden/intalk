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

    public function supplier() {
        return $this->hasOne(Suppliers::class,"supplier_id");
    }
    public function delivered_good() {
        return $this->hasOne(GoodsAndServices::class,"delivered_good");
    }

}
