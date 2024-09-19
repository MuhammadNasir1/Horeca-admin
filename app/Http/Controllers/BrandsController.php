<?php

namespace App\Http\Controllers;

use App\Models\Brands;
use Illuminate\Http\Request;

class BrandsController extends Controller
{
    public function index()
    {
        $brands = Brands::all();
        return view('brands', compact("brands"));
    }

    public function insert(Request $request)
    {
        try {
            $validatedData = $request->validate([
                "name" => "required|unique:brands,name",

            ]);
            $brand = new Brands;
            $brand->name = $validatedData['name'];
            $brand->image = "null";
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/brands_images', $imageName);
                $brand->image = 'storage/brands_images/' . $imageName;
            }
            $brand->save();
            return response()->json(['success' => true, 'message' => "Data add successfully", 'brand' =>   $brand->name], 201);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    public function delete($id)
    {
        $brands  = Brands::find($id);
        $brands->delete();
        return redirect('../brands');
    }

    public function updateBrand(Request $request, $id)
    {

        try {
            $validatedData = $request->validate([
                "name" => "required",

            ]);
            $brand = Brands::find($id);
            $brand->name = $validatedData['name'];
            $brand->image = "null";
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/brands_images', $imageName);
                $brand->image = 'storage/brands_images/' . $imageName;
            }
            $brand->update();
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
