<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Validated;
use Maatwebsite\Excel\Facades\Excel;

class productController extends Controller
{
    public  function insert(Request $request)
    {
        try {
            $validateData = $request->validate([
                'product_name' => 'required',
                'product_code' => 'required',
                'category' => 'required',
                'sub_category' => 'nullable',
                'product_tags' => 'nullable',
                'rate' => 'required',
                'product_tags' => 'required',
                'tax' => 'nullable',
                'quantity' => 'required',
                'quantity_alert' => 'nullable',
                'status' => 'required',
                'product_image' => 'nullable|image',
                'description' => 'nullable',
            ]);


            $product = product::create([
                'name' => $validateData['product_name'],
                'code' => $validateData['product_code'],
                'category' => $validateData['category'],
                'sub_category' => $validateData['sub_category'],
                'tags' => $validateData['product_tags'],
                'rate' => $validateData['rate'],
                'tax' => $validateData['tax'],
                'quantity' => $validateData['quantity'],
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

            return response()->json(['success'  => true, 'message' => "produnct add successfully"],  200);
        } catch (\Exception $e) {
            return response()->json(['success'  => false, 'message' => $e->getMessage()],  500);
        }
    }

    public function productData()
    {
        $products = product::all();
        return view('product',  ['products' => $products]);
    }

    public function delete($id)
    {

        $products = product::find($id);
        $products->delete();
        return redirect('../product');
    }

    function getProducts()
    {
        try {
            $products = product::all();
            return response()->json(['success'  => true, 'message' => "produnct get successfully", 'products' => $products],  200);
        } catch (\Exception $e) {
            return response()->json(['success'  => false, 'message' => $e->getMessage()],  500);
        }
    }
    function SingleproductData($product_id)
    {
        try {
            $products = product::Where('id', $product_id)->get();
            return response()->json(['success'  => true, 'message' => "produnct get successfully", 'products' => $products],  200);
        } catch (\Exception $e) {
            return response()->json(['success'  => false, 'message' => $e->getMessage()],  500);
        }
    }

    public function  importExcelData(Request $request)
    {
        $validateData =  $request->validate([
            'excel_file' => 'required|mimes:xlsx,xls',
        ]);

        $file = $request->file('excel_file');
        $data = Excel::toArray([], $file);
        foreach ($data[0] as $row) {
            product::create([
                'name' => $row[0],
                'code' => $row[1],
                'category' => $row[2],
                'sub_category' => $row[3],
                'tags' => $row[4],
                'rate' => $row[5],
                'tax' => $row[6],
                'quantity' => $row[7],
                'quantity_alert' => $row[8],
                'status' => $row[9],
                'image' => null,
                'description' => $row[10],
                // Add more columns as needed
            ]);
        }
    }
}
