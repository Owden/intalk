<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Type\Integer;

/**
 * Class Customers
 * @package App\Models
 * @property Integer $id
 * @property String $name
 * @property String $address
 * @property String $email_address
 * @property String $phone_number
 */
class Customers extends Model
{
    use HasFactory;
}
