<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function viewCustomer($id) {
        return view(
            'customer',
            [
                "customer" => Customers::all()
                    ->where("id", "=", $id)
                    ->first()
            ]
        );
    }

    public function editCustomer($id) {
        return view(
            'update_customer',
            [
                "customer" => Customers::all()
                    ->where("id", "=", $id)
                    ->first()
            ]
        );
    }

    public function updateCustomer(Request $request, $id) {
        /* @var Customers $customer */
        $customer = Customers::find($id);

        unset($request->post()["_token"]);

        $customer->update($request->post());

        $customer->save();

        return redirect()->route("view_customer", $id);
    }

    public function addCustomer() {
        return view(
            "add_customer"
        );
    }

    public function createCustomer(Request $request) {
        $data = $request->post();

        unset($data['_token']);

        $customer = new Customers($data);

        $customer->save();

        return redirect()->route("view_customer", $customer->id);
    }

    public function deleteCustomer(Request $request, $id) {
        /* @var Customers $customer */
        $customer = Customers::find($id);

        try {
            $customer->delete();
        } catch (QueryException $exception) {
            return redirect()->route(
                "view_customer",
                ["id" => $customer->id]
            )->with('error', 'A vevő nem törölhető, mert már egy számla része!');
        }

        return redirect()->route("list_customers")
            ->with('status', 'A vevő sikeresen törlésre került!');
    }
}
