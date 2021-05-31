<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use App\Models\GoodsAndServices;
use App\Models\InvoiceItems;
use App\Models\Invoices;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class InvoicesController extends Controller
{
    public function viewInvoice($id) {
        return view(
            'invoice',
            [
                "invoice" => Invoices::all()
                    ->where("id", "=", $id)
                    ->first()
            ]
        );
    }

    public function editInvoice($id) {
        $invoice = Invoices::all()
            ->where("id", "=", $id)
            ->first();

        $existingInvoiceItems = [];
        foreach (InvoiceItems::all('*')->where("invoice_id", "=", $invoice->id)
                 as $existingItem) {
            $existingInvoiceItems[] = $existingItem["item_id"];
        }

        $possibleGoodsAndServices = GoodsAndServices::all()
            ->where("amount", ">", "0")
            ->whereNotIn("id", $existingInvoiceItems);

        return view(
            'update_invoice',
            [
                "invoice" => $invoice,
                "goods_and_services" => $possibleGoodsAndServices
            ]
        );
    }

    public function updateInvoice(Request $request, $id) {
        $goodOrService = GoodsAndServices::find($request->post()["item_id"]);

        $invoiceItem = new InvoiceItems();

        $invoiceItem->invoice_id = $id;
        $invoiceItem->item_id = $goodOrService->id;
        $invoiceItem->amount = $request->post()["amount"];
        $invoiceItem->price = $goodOrService->price;

        try {
            $invoiceItem->save();
        } catch (QueryException $exception){
            return redirect()->route(
                "edit_invoice",
                $id
            )->with(
                'error',
                'Nincs ennyi termék a készleten!'
            );
        }

        return redirect()->route("edit_invoice", $id)
            ->with('status', 'A termék sikeresen hozzáadta a számlához!');
    }

    public function addInvoice() {
        return view(
            "add_invoice",
            [
                "customers" => Customers::all(),
            ]);
    }

    public function createInvoice(Request $request) {
        $invoice = new Invoices();

        $invoice->customer_id = $request->post()['customer_id'];
        $invoice->date_of_purchase = Carbon::now();

        $invoice->save();

        return redirect()->route("view_invoice", $invoice->id);
    }
}
