<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Order;
use App\Models\Courier;
use App\Models\Product;
use App\Models\Service;
use App\Enum\Order\OrderStatus;
use App\Enum\Order\PaymentStatus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        $orderEnums = OrderStatus::class;
        $paymentEnums = PaymentStatus::class;
        $userCount = User::count();
        $productCount = Product::count();
        $serviceCount = Service::count();
        $totalOrderCount = Order::count();
        $orderCompletedCount = Order::where('order_status', OrderStatus::COMPLETED)->count();
        $pendingOrders = Order::where('order_status', OrderStatus::PENDING)->orderBy('created_at', 'desc')->get();


        return view('admin.dashboard', [
            'userCount' => $userCount,
            'productCount' => $productCount,
            'serviceCount' => $serviceCount,
            'totalOrderCount' => $totalOrderCount,
            'orderCompletedCount' => $orderCompletedCount,
            'pendingOrders' => $pendingOrders,
            'orderEnums' => $orderEnums,
            'paymentEnums' => $paymentEnums
        ]);
    }
}
