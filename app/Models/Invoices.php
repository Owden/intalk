<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * Class Invoices
 * @package App\Models
 * @property Integer $id
 * @property Integer $customer_id
 * @property Carbon $date_of_purchase
 */
class Invoices extends Model
{
    use HasFactory;

    public function customer() {
        return $this->hasOne(Customers::class,"id","customer_id");
    }

    public function invoice_item() {
        return $this->hasMany(InvoiceItems::class,"invoice_id");
    }
}
