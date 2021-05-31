<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function display() {
        /** @var Customers $customers */
        $customers = Customers::all();

    }
}
