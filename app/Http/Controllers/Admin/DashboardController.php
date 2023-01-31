<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Order;
use App\Models\Service;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Courier;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        $userCount = User::count();
        $productCount = Product::count();
        $serviceCount = Service::count();
        $courierCount = Courier::count();
        $totalOrderCount = Order::count();
        $orderCompletedCount = Order::where('status', 'completed')->count();


        return view('admin.dashboard', [
            'userCount' => $userCount,
            'productCount' => $productCount,
            'serviceCount' => $serviceCount,
            'courierCount' => $courierCount,
            'totalOrderCount' => $totalOrderCount,
            'orderCompletedCount' => $orderCompletedCount,
        ]);
    }
}
