<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Validated;

class productController extends Controller
{
    public  function insert(Request $request)
    {
        try {
            $validateData = $request->validate([
                'product_name' => 'required',
                'product_code' => 'required',
                'category' => 'required',
                'sub_category' => 'required',
                'product_tags' => 'required',
                'rate' => 'required',
                'product_tags' => 'required',
                'tax' => 'required',
                'quantity_alert' => 'required',
                'status' => 'required',
                'product_image' => 'nullable|image',
                'description' => 'required',
            ]);


            $product = product::create([
                'name' => $validateData['product_name'],
                'code' => $validateData['product_code'],
                'category' => $validateData['category'],
                'sub_category' => $validateData['sub_category'],
                'tags' => $validateData['product_tags'],
                'rate' => $validateData['rate'],
                'tax' => $validateData['tax'],
                'quantity_alert' => $validateData['quantity_alert'],
                'status' => $validateData['status'],
                'description' => $validateData['description'],

            ]);
            if ($request->hasFile('product_image')) {
                $product_image = $request->file('product_image');
                $name = time() . '.' . $product_image->getClientOriginalExtension();
                $product_image->storeAs('public/product_image', $name);
                $product->image = 'storage/product_image/' . $name;
            }
            $product->save();

            return response()->json(['success'  => true, 'message' => "data add success full"],  200);
        } catch (\Exception $e) {
            return response()->json(['success'  => false, 'message' => $e->getMessage()],  500);
        }
    }
}
