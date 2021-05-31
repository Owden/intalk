<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * Class InvoiceItems
 * @package App\Models
 * @property Integer $id
 * @property Integer $invoice_id
 * @property Integer $item_id
 * @property Integer $amount
 * @property Integer $price
 */
class InvoiceItems extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function item() {
        return $this->hasOne(GoodsAndServices::class,"id", "item_id");
    }

    public function invoice() {
        return $this->hasOne(Invoices::class,"invoice_id", "id");
    }
}
