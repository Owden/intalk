<?php

namespace App\Http\Controllers;

use App\Models\GoodsAndServices;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class GoodsAndServicesController extends Controller
{
    public function viewGood($id) {
        return view(
            'good',
            [
                "good" => GoodsAndServices::all()
                    ->where("type","=","G")
                    ->where("id", "=", $id)
                    ->first()
            ]
        );
    }

    public function editGood($id) {
        return view(
            'update_good',
            [
                "good" => GoodsAndServices::all()
                    ->where("type","=","G")
                    ->where("id", "=", $id)
                    ->first()
            ]
        );
    }

    public function updateGood(Request $request, $id) {
        /* @var GoodsAndServices $good */
        $good = GoodsAndServices::find($id);

        $good->name = $request->post()["name"];
        $good->price = $request->post()["price"];
        $good->amount = $request->post()["amount"];

        $good->save();

        return redirect()->route("view_good", $id);
    }

    public function addGood() {
        return view(
            "add_good"
        );
    }

    public function createGood(Request $request) {
        $data = $request->post();

        unset($data['_token']);

        $good = new GoodsAndServices($data);
        $good->type = "G";

        $good->save();

        return redirect()->route("view_good", $good->id);
    }

    public function deleteGood(Request $request, $id) {
        /* @var GoodsAndServices $good */
        $good = GoodsAndServices::find($id);

        try {
            $good->delete();
        } catch (QueryException $exception) {
            return redirect()->route(
                "view_good",
                ["id" => $good->id]
            )->with('error', 'A termék nem törölhető, mert már egy számla része!');
        }

        return redirect()->route("list_goods")
            ->with('status', 'A termék sikeresen törlésre került!');
    }

    public function viewService($id) {
        return view(
            'service',
            [
                "service" => GoodsAndServices::all()
                    ->where("type","=","S")
                    ->where("id", "=", $id)
                    ->first()
            ]
        );
    }

    public function editService($id) {
        return view(
            'update_service',
            [
                "service" => GoodsAndServices::all()
                    ->where("type","=","S")
                    ->where("id", "=", $id)
                    ->first()
            ]
        );
    }

    public function updateService(Request $request, $id) {
        /* @var GoodsAndServices $service */
        $service = GoodsAndServices::find($id);

        $service->name = $request->post()["name"];
        $service->price = $request->post()["price"];

        $service->save();

        return redirect()->route("view_service", $id);
    }

    public function addService() {
        return view(
            "add_service"
        );
    }

    public function createService(Request $request) {
        $data = $request->post();

        unset($data['_token']);

        $service = new GoodsAndServices($data);
        $service->type = "S";
        $service->amount = 1;

        $service->save();

        return redirect()->route("view_service", $service->id);
    }

    public function deleteService(Request $request, $id) {
        /* @var GoodsAndServices $service */
        $service = GoodsAndServices::find($id);

        try {
            $service->delete();
        } catch (QueryException $exception) {
            return redirect()->route(
                "view_service",
                ["id" => $service->id]
            )->with('error', 'A szolgáltatás nem törölhető, mert már egy számla része!');
        }

        return redirect()->route("list_services")
            ->with('status', 'A szolgáltatás sikeresen törlésre került!');
    }
}
