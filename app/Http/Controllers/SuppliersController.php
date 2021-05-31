<?php

namespace App\Http\Controllers;

use App\Models\Suppliers;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class SuppliersController extends Controller
{
    public function viewSupplier($id) {
        return view(
            'supplier',
            [
                "supplier" => Suppliers::all()
                    ->where("id", "=", $id)
                    ->first()
            ]
        );
    }

    public function editSupplier($id) {
        return view(
            'update_supplier',
            [
                "supplier" => Suppliers::all()
                    ->where("id", "=", $id)
                    ->first()
            ]
        );
    }

    public function updateSupplier(Request $request, $id) {
        /* @var Suppliers $supplier */
        $supplier = Suppliers::find($id);

        unset($request->post()["_token"]);

        $supplier->update($request->post());

        $supplier->save();

        return redirect()->route("view_supplier", $id);
    }

    public function addSupplier() {
        return view(
            "add_supplier"
        );
    }

    public function createSupplier(Request $request) {
        $data = $request->post();

        unset($data['_token']);

        $supplier = new Suppliers($data);

        $supplier->save();

        return redirect()->route("view_supplier", $supplier->id);
    }

    public function deleteSupplier(Request $request, $id) {
        /* @var Suppliers $supplier */
        $supplier = Suppliers::find($id);

        try {
            $supplier->delete();
        } catch (QueryException $exception) {
            return redirect()->route(
                "view_supplier",
                ["id" => $supplier->id]
            )->with('error', 'A beszállító nem törölhető, mert már egy beszállítás része!');
        }

        return redirect()->route("list_suppliers")
            ->with('status', 'A beszállító sikeresen törlésre került!');
    }
}
