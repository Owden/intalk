<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Suppliers
 * @package App\Models
 * @property Integer $id
 * @property String $company_name
 * @property String $contact
 * @property String $address
 * @property String $email_address
 * @property String $phone_number
 */
class Suppliers extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $fillable = [
        'company_name',
        'contact',
        'address',
        'email_address',
        'phone_number'
    ];
}
