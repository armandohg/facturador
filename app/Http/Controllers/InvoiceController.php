<?php

namespace App\Http\Controllers;

use App\Http\Resources\InvoiceResource;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = auth()->user()->invoices;
        return response([
            'invoices' => InvoiceResource::collection($invoices),
            'message' => 'Successful'
        ]);
    }

    public function store(Request $request)
    {

        $data = $request->all();

        $validator = Validator::make($data, [
            'issuer_company' => 'required', // TODO
            'issuer_full_name' => 'required', // TODO
            'issuer_website' => 'required', // TODO
            'issuer_address' => 'required', // TODO
            'issuer_city' => 'required', // TODO
            'issuer_zip' => 'required', // TODO
            'issuer_country' => 'required', // TODO
            'issuer_phone' => 'required', // TODO
            'issuer_email' => 'required', // TODO
            'client_company' => 'required', // TODO
            'client_full_name' => 'required', // TODO
            'client_address' => 'required', // TODO
            'client_city' => 'required', // TODO
            'client_zip' => 'required', // TODO
            'client_country' => 'required', // TODO
            'subtotal' => 'required', // TODO
            'tax' => 'required', // TODO
            'discount' => 'required', // TODO
            'total' => 'required', // TODO
            'notes' => 'required', // TODO
        ]);

        if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'Factura inválida']);
        }

        $invoice = Invoice::create([...$data, 'user_id' => auth()->user()->id]);

        return response(['invoice' => new InvoiceResource($invoice), 'message' => 'Success']);
    }

    public function show(Invoice $invoice)
    {
        return response(['invoice' => new InvoiceResource($invoice), 'message' => 'Success']);

    }

    public function update(Request $request, Invoice $invoice)
    {
        $invoice->update($request->all());

        return response(['invoice' => new InvoiceResource($invoice), 'message' => 'Success']);
    }

    public function destroy(Invoice $invoice)
    {
        $invoice->delete();

        return response(['message' => 'Factura eliminada.']);
    }
}
