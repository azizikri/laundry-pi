<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Enum\Order\OrderStatus;
use App\Enum\Order\PaymentStatus;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Support\Facades\Storage;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::orderBy('created_at', 'desc')->get();
        return view('admin.orders.index', [
            'orders' => $orders,
        ]);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $orderEnums = OrderStatus::class;
        $paymentEnums = PaymentStatus::class;

        return view('admin.orders.show', [
            'order' => $order,
            'orderEnums' => $orderEnums,
            'paymentEnums' => $paymentEnums,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function changeOrderStatus(Request $request, Order $order)
    {
        $request->validate([
            'order_status' => ['required',  new Enum(OrderStatus::class)],
        ]);

        $order->update([
            'order_status' => $request->order_status,
        ]);

        return redirect()->back()->with('success', 'Status Pesanan berhasil diubah!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function changePaymentStatus(Request $request, Order $order)
    {
        $request->validate([
            'payment_status' => ['required',  new Enum(PaymentStatus::class)],
        ]);

        $order->update([
            'payment_status' => $request->payment_status,
        ]);

        return redirect()->back()->with('success', 'Status Pesanan berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();

        if ($order->evidence_of_payment) {
            Storage::delete($order->evidence_of_payment);
        }
        return redirect()->route('admin.orders.index')->with('success', 'Pesanan berhasil dihapus!');
    }
}
