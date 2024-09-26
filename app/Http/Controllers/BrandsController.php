<?php

namespace App\Http\Controllers;

use App\Models\Brands;
use Illuminate\Http\Request;

class BrandsController extends Controller
{
    public function index()
    {
        $brands = Brands::WhereNot('status', "deleted")->get();
        return view('brands', compact("brands"));
    }

    public function insert(Request $request)
    {
        try {
            $validatedData = $request->validate([
                "name" => "required",

            ]);
            $check_brand = Brands::where('name', $validatedData['name'])->first();
            if ($check_brand) {
                if ($check_brand->status == "deleted") {
                    $check_brand->status = "active";

                    if ($request->hasFile('image')) {
                        $image = $request->file('image');
                        $imageName = time() . '.' . $image->getClientOriginalExtension();
                        $image->storeAs('public/brands_images', $imageName);
                        $check_brand->image = 'storage/brands_images/' . $imageName;
                    }
                    $check_brand->update();
                    return response()->json(['success' => true, 'message' => "Brand add successfully"], 201);
                } else {
                    return response()->json(['success' => false, 'message' => "Brand Already Exist"], 404);
                }
            } else {
                $brand = new Brands;
                $brand->name = $validatedData['name'];
                $brand->status = "active";
                $brand->image = "null";
                if ($request->hasFile('image')) {
                    $image = $request->file('image');
                    $imageName = time() . '.' . $image->getClientOriginalExtension();
                    $image->storeAs('public/brands_images', $imageName);
                    $brand->image = 'storage/brands_images/' . $imageName;
                }
                $brand->save();
                return response()->json(['success' => true, 'message' => "Brand add successfully"], 201);
            }
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    public function delete($id)
    {
        // $brands  = Brands::find($id);
        // $brands->delete();
        $brand = Brands::find($id);
        $brand->status = "deleted";
        $brand->update();
        return redirect('../brands');
    }

    public function updateBrand(Request $request, $id)
    {

        try {
            $validatedData = $request->validate([
                'name' => 'required|unique:brands,name,' . $id,

            ]);
            $brand = Brands::find($id);
            $brand->name = $validatedData['name'];
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/brands_images', $imageName);
                $brand->image = 'storage/brands_images/' . $imageName;
            }
            $brand->update($request->except('image'));
            return response()->json(['success' => true, 'message' => "Data add successfully", 'brand' =>   $brand->name], 201);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    public function brandEditData($id)
    {
        $brandData = Brands::find($id);

        return response()->json(['success' => true, 'message' => "Data get successfully", 'data' => $brandData], 200);
    }
}
