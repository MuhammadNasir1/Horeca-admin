<?php

namespace App\Http\Controllers;

use App\Models\Brands;
use App\Models\category;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\URL;
use Maatwebsite\Excel\Facades\Excel;

class productController extends Controller
{
    public  function insert(Request $request)
    {
        try {
            $validateData = $request->validate([
                'name' => 'required',
                'code' => 'required',
                'category' => 'required',
                'sub_category' => 'required',
                'product_tags' => 'nullable',
                'rate' => 'required|numeric',
                'product_tags' => 'required',
                'tax' => 'nullable',
                'quantity' => 'required',
                'quantity_alert' => 'nullable',
                'status' => 'required',
                'product_image' => 'nullable|image',
                'description' => 'nullable',
                'product_unit' => 'required',
                'unit_quantity' => 'required',
                'brand' => 'required',
                'purchase_price' => 'required',
                'unit_price' => 'required',
                'Unit_Pieces' => 'required',
            ]);


            $product = product::create([
                'name' => $validateData['name'],
                'code' => $validateData['code'],
                'category' => $validateData['category'],
                'sub_category' => $validateData['sub_category'],
                'tags' => $validateData['product_tags'],
                'rate' => $validateData['rate'],
                'tax' => $validateData['tax'],
                'quantity' => $validateData['quantity'],
                'quantity_alert' => $validateData['quantity_alert'],
                'status' => $validateData['status'],
                'description' => $validateData['description'],
                'product_unit' => $validateData['product_unit'],
                'unit_quantity' => $validateData['unit_quantity'],
                'brand' => $validateData['brand'],
                'purchase_price' => $validateData['purchase_price'],
                'unit_price' => $validateData['unit_price'],
                'Unit_Pieces' => $validateData['Unit_Pieces'],

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
        $categories = category::where('status', "active")->get();
        $Subcategories =  product::select('sub_category')->distinct()->get();
        $brands = Brands::all();
        return view('product',  ['products' => $products, 'categories' => $categories, 'Subcategories' => $Subcategories, "brands" => $brands]);
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

            $categories = category::where('status', "active")->get();
            return response()->json(['success'  => true, 'message' => "produnct get successfully", 'products' => $products,  'categories' => $categories],  200);
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

    // public function  importExcelData(Request $request)
    // {
    //     $validateData =  $request->validate([
    //         'excel_file' => 'required|mimes:xlsx,xls',
    //     ]);

    //     $file = $request->file('excel_file');
    //     $data = Excel::toArray([], $file);
    //     foreach ($data[0] as $row) {
    //         product::create([
    //             'name' => $row[0],
    //             'code' => $row[1],
    //             'category' => $row[2],
    //             'sub_category' => $row[3],
    //             'tags' => $row[4],
    //             'rate' => $row[5],
    //             'tax' => $row[6],
    //             'quantity' => $row[7],
    //             'quantity_alert' => $row[8],
    //             'status' => $row[9],
    //             'image' => null,
    //             'description' => $row[10],
    //             // Add more columns as needed
    //         ]);
    //     }

    //     return redirect()->back();
    // }

    public function importExcelData(Request $request)
    {
        try {

            // Validate the uploaded file
            $validateData = $request->validate([
                'excel_file' => 'required|mimes:xlsx,xls',
            ]);

            // Get the uploaded file
            $file = $request->file('excel_file');

            // Convert the Excel data to an array
            $data = Excel::toArray([], $file);

            // Start the loop from the second row to skip the header
            foreach (array_slice($data[0], 1) as $row) {
                // Create a new product record
                product::create([
                    'name' => $row[0],
                    'code' => $row[1],
                    'tags' => $row[2],
                    'brand' => $row[3],
                    'category' => $row[4],
                    'sub_category' => $row[5],
                    'purchase_price' => $row[6],
                    'rate' => $row[7],
                    'tax' => $row[8],
                    'quantity' => $row[9],
                    'quantity_alert' => $row[10],
                    'product_unit' => $row[11],
                    'unit_quantity' => $row[12],
                    'image' => $row[13],
                    'status' => $row[14],
                    'description' => $row[15],
                    'unit_price' => $row[16],
                ]);
            }

            // Redirect back to the previous page
            return redirect()->back();
        } catch (\Exception $e) {

            return redirect()->back();
        }
    }



    public function ProductUpdataData($product_id)
    {
        try {
            $product = product::find($product_id);
            if (!$product) {
                return response()->json(['success'  => false, 'message' => "Product not found"],  500);
            }
            return response()->json(['success'  => true, 'message' => "product get successfully", 'product' => $product],  200);
        } catch (\Exception $e) {
            return response()->json(['success'  => false, 'message' => $e->getMessage()],  500);
        }
    }

    public function categories()
    {
        $categories = category::all();
        return view('category',   ['categories' => $categories]);
    }


    // add category

    public function insertCategory(Request $request)
    {
        try {
            $validateData = $request->validate([
                'name' => 'required',
                'category_img' => 'nullable|image',
                'status' => 'required',
                'tax' => 'required',

            ]);
            $Category =  category::create([
                'name' => $validateData['name'],
                'status' => $validateData['status'],
                'tax' => $validateData['tax'],
                'image' => '',
            ]);

            if ($request->hasFile('category_img')) {
                $category_image = $request->file('category_img');
                $name = time() . '.' . $category_image->getClientOriginalExtension();
                $category_image->storeAs('public/category_image', $name);
                $Category->image = 'storage/category_image/' . $name;
            }
            $Category->save();
            return response()->json(['success' => true, 'message' => "Category Add Successfully",  'category' =>  $Category]);
        } catch (\Exception $e) {
            return response()->json(['success' => true, 'message' => $e->getMessage()]);
        }
    }

    public function deleteCategory($id)
    {
        $category = category::find($id);
        $category->delete();
        if (!empty($category->image)) {
            $file_path = public_path($category->image);
            if (file_exists($file_path)) {
                unlink($file_path);
            }
        }
        return redirect('category');
    }


    public function updateCategory(Request $request, $id)
    {

        try {

            $category = category::find($id);
            if (!$category) {
                return response()->json(['success' => false, 'category' => 'category not found'], 500);
            }
            if ($request->hasFile('category_img')) {
                $category_image = $request->file('category_img');
                $name = time() . '.' . $category_image->getClientOriginalExtension();
                $category_image->storeAs('public/category_image', $name);
                $category->image = 'storage/category_image/' . $name;
            }

            $category->update($request->except('category_img'));
            return response()->json(['success' => true, 'message' => "Category Update Successfully", 'category' => $category]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }
    public function UpdataProduct(Request $request, $product_id)
    {

        try {

            $product = product::find($product_id);
            if (!$product) {
                return response()->json(['success' => false, 'category' => 'category not found'], 500);
            }
            if ($request->hasFile('product_image')) {
                $product_image = $request->file('product_image');
                $name = time() . '.' . $product_image->getClientOriginalExtension();
                $product_image->storeAs('public/product_image', $name);
                $product->image = 'storage/product_image/' . $name;
            }

            $product->update($request->except('product_image'));
            return response()->json(['success' => true, 'message' => "Product Update Successfully"]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }


    // get categories api
    public function  getAllCategories()
    {
        try {
            $categories = category::where('status', 'active')->get();
            return response()->json(['success' => true, 'message' => "Categories get successfully", "categories" =>  $categories], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
    // get Product api
    public function  getAllProducts(Request  $request)
    {
        try {
            if ($request->has('category')) {

                $category = $request->input('category');
                $products = Product::where('category', $category)->orWhere('sub_category', $category)->where('status', 'active')->get();
            } else {
                $products = Product::where('status', 'active')->get();
            }
            $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';

            $host = $_SERVER['HTTP_HOST'];
            $baseUrl = $protocol . $host . '/';
            foreach ($products as $product) {
                // if ($product->image !== null) {
                //     $product->image = $baseUrl . $product->image;
                // }
                if ($product->image !== null) {
                    // Check if $product->image starts with "storage/"
                    if (
                        strpos($product->image, 'storage/') === 0
                    ) {
                        // If it starts with "storage/", keep it as is
                        // You may need to adjust this condition based on your actual folder structure
                        $product->image = $baseUrl .  $product->image; // Assuming it's a relative path
                    } else {
                        // If it doesn't start with "storage/", prepend the base URL
                        $product->image = $product->image;
                    }
                }
            }
            return response()->json(['success' => true, 'message' => "Products get successfully", "products" =>  $products], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    public function updateCategoryData($id)

    {
        $categories = category::all();
        $categoryData = category::find($id);
        return view('category',   compact('categories', 'categoryData'));
    }
}
