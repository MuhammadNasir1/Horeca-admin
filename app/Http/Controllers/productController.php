<?php

namespace App\Http\Controllers;

use App\Models\Brands;
use App\Models\category;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\URL;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\Calculation\Category as CalculationCategory;
use Illuminate\Support\Facades\Validator;


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
                'unit_quantity' => 'nullable',
                'brand' => 'required',
                'purchase_price' => 'required',
                'unit_price' => 'required',
                'unit_Pieces' => 'required',
                'package_quantity' => 'nullable',
            ]);


            $product = product::create([
                'name' => $validateData['name'],
                'code' => $validateData['code'],
                'category' => $validateData['category'],
                'sub_category' => $validateData['sub_category'],
                'tags' => $validateData['product_tags'],
                'rate' =>  str_replace(',', '.', $validateData['rate']),
                'tax' => $validateData['tax'],
                'quantity' => $validateData['quantity'],
                'quantity_alert' => $validateData['quantity_alert'],
                'status' => $validateData['status'],
                'description' => $validateData['description'],
                'product_unit' => $validateData['product_unit'],
                'unit_quantity' =>
                $request['unit_quantity'] ?? "null",
                'brand' => $validateData['brand'],
                'purchase_price' => str_replace(',', '.', $validateData['purchase_price']),
                'unit_price' => str_replace(',', '.', $validateData['unit_price']),
                'unit_Pieces' => $validateData['unit_Pieces'],
                'package_quantity' => $validateData['package_quantity'],

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

    // public function importExcelData(Request $request)
    // {
    //     try {

    //         // Validate the uploaded file
    //         $validateData = $request->validate([
    //             'excel_file' => 'required|mimes:xlsx,xls',
    //         ]);

    //         // Get the uploaded file
    //         $file = $request->file('excel_file');

    //         // Convert the Excel data to an array
    //         $data = Excel::toArray([], $file);

    //         // Start the loop from the second row to skip the header
    //         foreach (array_slice($data[0], 1) as $row) {
    //             // Create a new product record
    //             product::create([
    //                 'name' => $row[0],
    //                 'code' => $row[1],
    //                 'tags' => $row[2],
    //                 'brand' => $row[3],
    //                 'category' => $row[4],
    //                 'sub_category' => $row[5],
    //                 'purchase_price' =>
    //                 str_replace(',', '.', $row[6]),
    //                 'rate' =>
    //                 str_replace(',', '.', $row[7]),
    //                 'tax' => $row[8],
    //                 'quantity' => $row[9],
    //                 'quantity_alert' => $row[10],
    //                 'product_unit' => $row[11],
    //                 'unit_quantity' => $row[12],
    //                 'image' => $row[13],
    //                 'status' => $row[14],
    //                 'description' => $row[15],
    //                 'unit_price' => str_replace(',', '.', $row[16]),
    //                 'Unit_Pieces' => $row[17],
    //                 'package_quantity' =>
    //                 $row[18],
    //             ]);
    //             $checkCategory = Category::where('name', $row[4])->first();
    //             if (!$checkCategory) {
    //                 category::create([
    //                     'name' => $row[4],
    //                     'tax' => $row[8],
    //                     'status' => "active",
    //                     'image' => "",
    //                 ]);
    //             }
    //             $checkBrand = Brands::where('name', $row[3])->first();
    //             if (!$checkBrand) {
    //                 Brands::create([
    //                     'name' => $row[3],
    //                     'image' => 'null',

    //                 ]);
    //             }
    //         }

    //         // Redirect back to the previous page
    //         return redirect()->back();
    //     } catch (\Exception $e) {

    //         return redirect()->back();
    //         // return response()->json($e->getMessage());
    //     }
    // }

    public function importExcelData(Request $request)
    {

        $validateData = $request->validate([
            'excel_file' => 'required|mimes:xlsx,xls',
        ]);

        // Get the uploaded file
        $file = $request->file('excel_file');

        // Convert the Excel data to an array and filter out empty rows
        $data = Excel::toArray([], $file);

        // Filter out rows that are either completely empty or all null
        $filteredData = array_filter($data[0], function ($row) {
            // Use array_filter to remove any rows where all fields are null/empty
            return array_filter($row); // This will return true if the row contains any non-empty value
        });

        // Initialize an array to store validation errors
        $validationErrors = [];

        // Start the loop from the second row to skip the header
        foreach (array_slice($filteredData, 1) as $key => $row) {
            // Define validation rules for each row
            $validator = Validator::make([
                'name' => $row[0],
                'code' => $row[1],
                'tags' => $row[2],
                'brand' => $row[3],
                'category' => $row[4],
                'sub_category' => $row[5],
                'purchase_price' => str_replace(',', '.', $row[6]),
                'rate' => str_replace(',', '.', $row[7]),
                'tax' => $row[8],
                'quantity' => $row[9],
                'quantity_alert' => $row[10],
                'product_unit' => $row[11],
                'unit_quantity' => $row[12],
                'image' => $row[13],
                'status' => $row[14],
                'description' => $row[15],
                'unit_price' => str_replace(',', '.', $row[16]),
                'unit_pieces' => $row[17],
                'package_quantity' => $row[18],
            ], [
                'name' => 'required',
                'brand' => 'required',
                'code' => 'required',
                'sub_category' => 'required',
                'purchase_price' => 'required|numeric',
                'rate' => 'required|numeric',
                'tax' => 'nullable|numeric',
                'quantity' => 'required|integer',
                'quantity_alert' => 'nullable|integer',
                'product_unit' => 'required',
                'unit_quantity' => 'required|numeric',
                'image' => 'nullable', // Add image validation if required
                'status' => 'required',
                'description' => 'nullable|string',
                'unit_price' => 'required|numeric',
                'unit_pieces' => 'nullable|integer',
                'package_quantity' => 'nullable|integer',
            ]);

            // If validation fails, collect errors for this row
            if ($validator->fails()) {
                $validationErrors[] = [
                    'row' => $key + 2, // Add 2 to account for skipping the header row
                    'errors' => array_combine(
                        array_map(function ($key) {
                            return str_replace('_', ' ', $key); // Replace underscores with spaces
                        }, array_keys($validator->errors()->toArray())),
                        array_values($validator->errors()->toArray())
                    )
                ];
            }
        }

        // Check if there are any validation errors and return them
        if (!empty($validationErrors)) {
            return response()->json([
                'data' => $filteredData,
                'errors' => $validationErrors,
            ], 200);
        }

        // If no validation errors, save each row to the database
        foreach (array_slice($data[0], 1) as $row) {
            if (array_filter($row)) {
                product::create([
                    'name' => $row[0],
                    'code' => $row[1],
                    'tags' => $row[2],
                    'brand' => $row[3],
                    'category' => $row[4],
                    'sub_category' => $row[5],
                    'purchase_price' => str_replace(',', '.', $row[6]),
                    'rate' => str_replace(',', '.', $row[7]),
                    'tax' => $row[8],
                    'quantity' => $row[9],
                    'quantity_alert' => $row[10],
                    'product_unit' => $row[11],
                    'unit_quantity' => $row[12],
                    'image' => $row[13],
                    'status' => $row[14],
                    'description' => $row[15],
                    'unit_price' => str_replace(',', '.', $row[16]),
                    'unit_Pieces' => $row[17],
                    'package_quantity' => $row[18],
                ]);

                $checkCategory = Category::where('name', $row[4])->first();
                if (!$checkCategory) {
                    category::create([
                        'name' => $row[4],
                        'tax' => $row[8],
                        'status' => "active",
                        'image' => "",
                    ]);
                }
                $checkBrand = Brands::where('name', $row[3])->first();
                if (!$checkBrand) {
                    Brands::create([
                        'name' => $row[3],
                        'image' => 'null',

                    ]);
                }
            }
        }


        // Redirect back to the previous page
        // return redirect()->back();
        return response()->json(['success' => true,  'message' => 'All rows were successfully imported.'], 200);
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
        $categories = category::wherenot('status', "deleted")->get();
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

            $check_category = category::where('name', $validateData['name'])->first();
            if ($check_category) {
                if ($check_category->status == "deleted") {
                    $check_category->status = "active";
                    if ($request->hasFile('image')) {
                        $category_image = $request->file('image');
                        $name = time() . '.' . $category_image->getClientOriginalExtension();
                        $category_image->storeAs('public/category_image', $name);
                        $check_category->image = 'storage/category_image/' . $name;
                    }
                    if ($request->has('tax')) {
                        $check_category->tax = $validateData['tax'];
                    }
                    if ($request->has('status')) {
                        $check_category->status = $validateData['status'];
                    }

                    $check_category->update();
                    return response()->json(['success' => true, 'message' => "Category Add Successfully", "category" => $check_category], 200);
                } else {
                    return response()->json(['success' => false, 'message' => "Category Already Exist"], 404);
                }
            } else {
                $Category =  category::create([
                    'name' => $validateData['name'],
                    'status' => $validateData['status'],
                    'tax' => $validateData['tax'],
                    'image' => '',
                ]);

                if ($request->hasFile('image')) {
                    $category_image = $request->file('image');
                    $name = time() . '.' . $category_image->getClientOriginalExtension();
                    $category_image->storeAs('public/category_image', $name);
                    $Category->image = 'storage/category_image/' . $name;
                }
                $Category->save();
                return response()->json(['success' => true, 'message' => "Category Add Successfully",  "category" => $Category], 200);
            }
        } catch (\Exception $e) {
            return response()->json(['success' => true, 'message' => $e->getMessage()], 404);
        }
    }

    public function deleteCategory($id)
    {
        $category = category::find($id);
        $category->status = "deleted";
        $category->update();
        // $category->delete();
        // if (!empty($category->image)) {
        //     $file_path = public_path($category->image);
        //     if (file_exists($file_path)) {
        //         unlink($file_path);
        //     }
        // }
        return redirect('category');
    }


    public function updateCategory(Request $request, $id)
    {

        try {

            $validatedData = $request->validate([
                'name' => 'required|unique:category,name,' . $id,

            ]);

            $category = category::find($id);
            if (!$category) {
                return response()->json(['success' => false, 'category' => 'category not found'], 422);
            }
            $category->name = $validatedData['name'];
            if ($request->hasFile('image')) {
                $category_image = $request->file('image');
                $name = time() . '.' . $category_image->getClientOriginalExtension();
                $category_image->storeAs('public/category_image', $name);
                $category->image = 'storage/category_image/' . $name;
            }

            $category->update($request->except('image'));
            return response()->json(['success' => true, 'message' => "Category Update Successfully", 'category' => $category]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 400);
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
            return response()->json(['success' => true, 'message' => "Product Update Successfully"], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 404);
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

                $category = category::where('name', $product->category)->first();
                if ($category && $category->image) {
                    $product->category_image = $category->image;
                } else {
                    $product->category_image = 'null';
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


    public function getProductData($id)
    {
        $products = product::all();
        $categories = category::where('status', "active")->WhereNot('status', 'deleted')->get();
        $Subcategories =  product::select('sub_category')->distinct()->get();
        $brands = Brands::WhereNot('status', 'deleted')->get();

        $updateproduct = product::find($id);


        return view('product',  ['products' => $products, 'categories' => $categories, 'Subcategories' => $Subcategories, "brands" => $brands, "updateproduct" => $updateproduct]);
    }

    public function categoryEditData($id)
    {
        $categoryData = category::find($id);
        return response()->json(['success' => true, 'message' => "data get successfully", "data" =>  $categoryData], 200);
    }


    public function subcategoriesFilter(Request $request)
    {
        try {
            // $Subcategories =  product::select('sub_category')->distinct()->get();
            $subcategories = product::where('category', $request['categoryName'])->whereNotNull('sub_category')->distinct('sub_category')->pluck('sub_category');

            return response()->json(['success' => true, 'message' => "Subcategories get successfully", "Subcategories" =>  $subcategories], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
}
