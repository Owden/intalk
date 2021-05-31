<?php

namespace App\Http\Controllers;

use App\Models\Deliveries;
use App\Models\GoodsAndServices;
use App\Models\Suppliers;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class DeliveriesController extends Controller
{
    public function addDelivery() {
        return view(
            "add_delivery",
            [
                "suppliers" => Suppliers::all(),
                "goods" => GoodsAndServices::all()->where("type", "=", "G"),
            ]
        );
    }

    public function createDelivery(Request $request) {
        $data = $request->post();

        unset($data['_token']);

        $delivery = new Deliveries($data);
        $delivery->time_of_delivery = Carbon::now();

        try {
            $delivery->save();
        } catch (QueryException $exception){
            return redirect()->route(
                "list_deliveries"
            )->with(
                'error',
                'A termék bevételezése nem volt sikeres, mert nem tudunk ennyi terméket visszaszolgáltatni!'
            );
        }

        return redirect()->route("list_deliveries")
            ->with('status', 'A termék sikeresen bevételezésre került!');
    }
}
