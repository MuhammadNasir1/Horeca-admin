<?php

namespace App\Http\Controllers;

use App\Models\order_items;
use App\Models\orders;
use App\Models\product;
use App\Models\User;
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
            return redirect('invoice/' . $orders->id);
            // return response()->json(['success' => true, 'message' => 'Order add successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
    public function  addUpdatedOrder(Request $request, $order_id)
    {
        try {
            $order = orders::find($order_id);
            $orderItems  = order_items::where('order_id', $order_id)->get();

            foreach ($orderItems as $item) {
                $item->delete();
            }
            $order->delete();
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
            return redirect('invoice/' . $orders->id);
            // return response()->json(['success' => true, 'message' => 'Order add successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    public function getOrderData($order_id)
    {
        $orderItems = [];
        $order  =  orders::find($order_id);
        $order_items  =  order_items::where('order_id', $order_id)->get();
        $orderItems =  $order_items;
        $productIds = $orderItems->pluck('product_id');
        $products = product::whereIn('id', $productIds)->get();

        $routeName = request()->route()->getName();
        $viewName = '';
        if ($routeName === 'invoice') {
            $viewName = 'Invoices.customer_invoice';
        } elseif ($routeName === 'gatepass') {
            $viewName = 'Invoices.gatepass';
        }
        return view($viewName, ['order' =>  $order, 'orderItems' => $order_items, 'products' => $products]);
    }

    // view orders

    public function orders()
    {

        $orders = orders::all();
        return view('orders', ['orders' => $orders]);
    }

    public function delete($order_id)
    {

        $order = orders::find($order_id);
        $orderItems = order_items::where('order_id', $order_id)->get();

        $order->delete();

        foreach ($orderItems as $orderItem) {
            $orderItem->delete();
        }

        return redirect('orders');
    }


    //  get order report data
    public function reportData(Request $request)
    {
        try {
            $from = $request->input('from_date');
            $to = $request->input('to_date');
            $interval = $request->input('interval');
            if ($from && $to) {
                // If both from_date and to_date are provided, ignore interval
                $reports = orders::whereBetween('order_date', [$from, $to])->get();
            } elseif ($interval) {
                // If interval is provided, generate report based on the interval
                switch ($interval) {
                    case 'today':
                        $from = date('Y-m-d');
                        $to = date('Y-m-d');
                        break;
                    case 'last_week':
                        // Setting start of the week
                        $from = date('Y-m-d', strtotime('last Monday'));
                        // Setting end of the week
                        $to = date('Y-m-d');
                        break;
                    case 'last_month':
                        // Setting start of the month
                        $from = date('Y-m-01', strtotime('-1 month'));
                        // Setting end of the month
                        $to = date('Y-m-d');
                        break;
                    default:
                        // Handle unsupported interval
                        return response()->json(['success' => false, 'message' => 'Unsupported interval'], 400);
                }
                $reports = orders::whereBetween('order_date', [$from, $to])->get();
            } else {

                return view('report',  ['reports' =>  []]);
            }

            $reports = orders::whereBetween('order_date', [$from, $to])->get();
            return view('report',  ['reports' => $reports]);
            // return response()->json(['success' => true, 'message' => "Report Get Successfully" , 'reports' => $reports], 200);
        } catch (\Exception $th) {
            return response()->json(['success' => false, 'message' => $th->getMessage()], 500);
        }
    }


    ///
    public  function EditOrder($order)
    {
        $order = orders::where('id', $order)->first();
        $orderItems = order_items::where('order_id', $order->id)->get();
        $products = [];

        foreach ($orderItems as $orderItem) {
            $product = product::where('id', $orderItem->product_id)->first();
            $products[] = $product;
        }

        return view('editOrder', ["order" => $order, 'orderItems' => $orderItems, 'products' => $products]);
    }

    public function Addorders(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'user_id'  => 'required',
                'order_date'  => 'required|date',
                'customer_id'  => 'required',
                'customer_name'  => 'required',
                'customer_phone'  => 'required',
                'customer_adress'  => 'required',
                'product_id'  => 'required',
                'product_quantity'  => 'required',
                'grand_total'  => 'required',
                'sub_total'  => 'required',
                'payment_type'  => 'required',
                'order_description'  => 'nullable',
                'order_note'  => 'nullable',
                'delivery_charges'  => 'nullable',
            ]);

            $orders  = orders::create([
                'user_id' =>  $validatedData['user_id'],
                'order_date' => $validatedData['order_date'],
                'customer_id' => $validatedData['customer_id'],
                'customer_name' => $validatedData['customer_name'],
                'customer_phone' => $validatedData['customer_phone'],
                'customer_adress' => $validatedData['customer_adress'],
                'sub_total' => $validatedData['sub_total'],
                'discount' => $request['discount'],
                'grand_total' => $validatedData['grand_total'],
                'order_description' => $request['order_description'],
                'order_traking' => true,
                'order_note' => $request['order_note'],
                'payment_type' => $validatedData['payment_type'],
                'order_status' => "pending",
                'delivery_charges' => $request['delivery_charges'],

            ]);
            foreach ($validatedData['product_id'] as $j => $productId) {
                $product = product::find($productId);
                if ($product) {
                    $productTotal = $product->rate * $validatedData['product_quantity'][$j];
                    $order_item = order_items::create([
                        'order_id' => $orders->id,
                        'product_id' => $product->id,
                        'product_rate' => $product->rate,
                        'product_quantity' => $validatedData['product_quantity'][$j],
                        'product_tax' => $product->tax,
                        'product_total' => $productTotal,
                    ]);
                    $order_item->save();
                } else {
                    return response()->json([
                        'success' => false,
                        'message' => "Product with ID $productId not found."
                    ], 404);
                }
            };
            return response()->json(['success' => true, 'message' => 'Order add successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }


    public function getorderHistory($user_id)
    {
        try {
            $Orders = orders::where('customer_id', $user_id)->get();
            if (!$Orders) {
                return response()->json(['success' => false, 'message' => "Order not found"], 500);
            }

            return response()->json(['success' => true, 'message' => "Order get successfull", 'orders' => $Orders], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
}
