<?php

namespace App\Http\Controllers;

use App\Models\parents;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use  Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\OtpMail;
use App\Models\order_items;
use App\Models\orders;
use App\Models\product;
use App\Models\students;
use App\Models\teacher;
use App\Models\teacher_rec;
use App\Models\training;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class userController extends Controller
{


    public function language_change(Request $request)
    {
        App::setLocale($request->lang);
        session()->put('locale', $request->lang);
        return redirect()->back();
    }
    // dashboard  Users Couny
    public function customers()
    {
        $customers =  User::where('role', 'customer')->get();
        return view('customers', ['customers'  => $customers]);
    }

    public function  addCustomer(Request $request)
    {
        try {
            $validateData = $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'phone_no' => 'required',
                'address' => 'required',
                'user_id' => 'required'
            ]);
            $customer =  User::create([
                'user_id' => $validateData['user_id'],
                'name' => $validateData['name'],
                'email' => $validateData['email'],
                'password' => Hash::make(12345678),
                'phone' => $validateData['phone_no'],
                'role' => "customer",
                'address' => $validateData['address'],
            ]);

            return response()->json(['success' => true, 'message' => "Customer Add Successfully"]);
        } catch (\Exception $e) {
            return response()->json(['success' => true, 'message' => $e->getMessage()]);
        }
    }

    public function delCustomer($user_id)
    {
        $user = User::find($user_id);
        $user->delete();
        return redirect('customers');
    }
    public function CustomerUpdateData($user_id)
    {
        try {

            $customer = User::find($user_id);
            return response()->json(['success' => true,  'message' => "Data  Get Successfully", 'customer' => $customer]);
        } catch (\Exception $e) {
            return response()->json(['success' => false,  'message' => $e->getMessage()]);
        }
    }
    public function CustomerUpdate(Request $request, $user_id)
    {
        try {

            $customer = User::find($user_id);

            $validatedData = $request->validate([
                'name' => 'nullable',
                'email' => 'nullable',
                'phone_no' => 'nullable',
                'address' => 'nullable',
            ]);

            $customer->name = $validatedData['name'];
            $customer->phone = $validatedData['phone_no'];
            $customer->email = $validatedData['email'];
            $customer->address = $validatedData['address'];
            $customer->update();
            return response()->json(['success' => true,  'message' => "Data  Get Successfully", 'customer' => $customer]);
        } catch (\Exception $e) {
            return response()->json(['success' => false,  'message' => $e->getMessage()]);
        }
    }

    public function getCustomer()
    {

        try {
            $customers =  User::where('role', "customer");
            return response()->json(['success' => true,  'message' => "Customer get successfully ", 'customers' => $customers]);
        } catch (\Exception $e) {
            return response()->json(['success' => false,  'message' => $e->getMessage()]);
        }
    }


    public function Dashboard()
    {
        $totalOrders = orders::count();
        $totalProduct = product::count();
        $totalUser = User::count();
        $pendingOrders = orders::where('order_status', 'pending')->count();
        $confirmedOrders = orders::where('order_status', 'confirmed')->count();
        $topProducts = order_items::select('product_id', DB::raw('count(*) as total'))
            ->groupBy('product_id')
            ->orderBy('total', 'desc')
            ->take(5)
            ->get();
        $productIds = $topProducts->pluck('product_id');
        $products = Product::whereIn('id', $productIds)->get();

        // get previous  month orders
        // Get the current date
        $currentDate = Carbon::now();

        // Get the date 4 months ago
        $fourMonthsAgo = $currentDate->copy()->subMonths(4)->startOfMonth();

        // Get orders from the start of the month 4 months ago to the end of the current month
        $orders = orders::whereBetween('created_at', [$fourMonthsAgo, $currentDate->endOfMonth()])
            ->selectRaw('DATE_FORMAT(created_at, "%Y-%m") as month, COUNT(*) as order_count')
            ->groupBy('month')
            ->orderBy('month', 'desc')
            ->get();

        // Prepare the results to include month names
        $results = $orders->map(function ($order) {
            return [
                'month' => Carbon::createFromFormat('Y-m', $order->month)->format('F Y'),
                'order_count' => $order->order_count,
            ];
        });

        return view('dashboard', compact('totalOrders', 'totalProduct', 'totalUser', 'pendingOrders', 'confirmedOrders', 'products'), ['orderData' => $results]);
    }
    public  function getGraphData()
    {
        try {
            $totalOrders = orders::count();
            $pendingOrders = orders::where('order_status', 'pending')->count();
            $confirmedOrders = orders::where('order_status', 'confirmed')->count();
            $shippedOrders = orders::where('order_status', 'shipped')->count();
            $cancelOrders = orders::where('order_status', 'cancel')->count();
            $totalSale = 2000;
            $OrderData   = [
                $totalSale,
                $totalOrders,
                $confirmedOrders,
                $shippedOrders,
                $pendingOrders,
                $cancelOrders
            ];

            return response()->json(['success' => true,  'message' => "Data get successfully ", 'OrderData' => $OrderData]);
        } catch (\Exception $e) {
            return response()->json(['success' => false,  'message' => $e->getMessage()]);
        }
    }
}
