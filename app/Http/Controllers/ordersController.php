<?php

namespace App\Http\Controllers;

use App\Models\order_items;
use App\Models\orders;
use Illuminate\Http\Request;

class ordersController extends Controller
{
    public function  insert(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'order_date'  => 'required|date',
                'customer_name'  => 'nullable',
                'customer_id'  => 'nullable',
                'customer_phone'  => 'nullable',
                'customer_adress'  => 'nullable',
                'sub_total'  => 'required',
                'order_vat'  => 'required',
                'grand_total'  => 'required',
                'order_description'  => 'nullable',
                'delivery_charges'  => 'nullable',

                'product_id'  => 'required',
                'product_tax'  => 'required',
                'product_quantity'  => 'required',
                'product_rate'  => 'required',
                'product_total'  => 'required',
            ]);

            $userId   = session("user_det")['user_id'];
            $orders  = orders::create([
                'user_id' =>  $userId,
                'order_date' => $validatedData['order_date'],
                'customer_name' => $validatedData['customer_name'],
                'customer_id' => 0,
                'customer_phone' => $validatedData['customer_phone'],
                'customer_adress' => $validatedData['customer_adress'],
                'sub_total' => $validatedData['sub_total'],
                'order_vat' => $validatedData['order_vat'],
                'discount' => $validatedData['order_vat'],
                'grand_total' => $validatedData['grand_total'],
                'order_description' => $request['order_description'],
                'order_traking' => $request['order_traking'],
                'order_note' => $request['order_note'],
                'payment_type' => $request['payment_type'],
                'order_status' => $request['order_status'],
                'delivery_charges' => $validatedData['delivery_charges'],

            ]);
            foreach ($request['product_id'] as $j => $product) {
                $order_items  = order_items::create([
                    'order_id' => $orders->id,
                    'product_id' => $validatedData['product_id'][$j],
                    'product_rate' => $validatedData['product_rate'][$j],
                    'product_quantity' => $validatedData['product_quantity'][$j],
                    'product_tax' => $validatedData['product_tax'][$j],
                    'product_total' => $validatedData['product_total'][$j],

                ]);
                $order_items->save();
            };
            return response()->json(['success' => true, 'message' => 'Order add successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
}
