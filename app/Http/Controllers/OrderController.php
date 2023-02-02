<?php

namespace App\Http\Controllers;

use App\Enum\Order\OrderStatus;
use App\Enum\Order\PaymentStatus;
use App\Http\Requests\Order\UpdateOrderRequest;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class OrderController extends Controller
{
    public function index()
    {
        $orderEnums = OrderStatus::class;
        $paymentEnums = PaymentStatus::class;
        $orders = User::findOrFail(auth()->id())->orders()->latest()->paginate(10);

        return view('orders.index', [
            'orders' => $orders,
            'orderEnums' => $orderEnums,
            'paymentEnums' => $paymentEnums,
        ]);
    }

    public function changeOrderStatus(Order $order)
    {
        $this->authorize('owner', $order);

        $order->order_status === OrderStatus::CANCELED ? $order->order_status = OrderStatus::PENDING : $order->order_status = OrderStatus::CANCELED;

        $order->save();
        return redirect()->back()->with('success', 'Status Pesanan berhasil diubah!');

    }

    public function store()
    {
        $cart = session()->get('cart');
        if ($cart == null) {
            return back()->with('error', 'Tidak ada item di keranjang!');
        }

        if (auth()->user()->phone == null || auth()->user()->full_address == null) {
            return redirect()->route('client.profile.edit')->with('error', 'Tolong isi Nomor Telepon dan Alamat terlebih dahulu!');
        }
        $totalPrice = array_sum(array_column($cart, 'price'));
        $order = Order::create([
            'total_price' => $totalPrice,
            'user_id' => auth()->id(),
            'reciever_name' => auth()->user()->name,
            'reciever_phone' => auth()->user()->phone,
            'reciever_address' => auth()->user()->full_address,
        ]);

        foreach ($cart as $item) {
            $order->{$item['type'] === 'Servis' ? 'services' : 'products'}()->attach($item['item_id'], [
                'quantity' => (int) $item['quantity'],
            ]);
        }

        session()->forget('cart');

        return redirect()->route('client.orders.show', $order)->with('success', 'Pesanan berhasil dibuat!');
    }

    public function show(Order $order)
    {
        $this->authorize('owner', $order);

        $orderEnums = OrderStatus::class;
        $paymentEnums = PaymentStatus::class;

        return view('orders.show', [
            'order' => $order,
            'orderEnums' => $orderEnums,
            'paymentEnums' => $paymentEnums,
        ]);
    }

    public function uploadPaymentProof(Order $order, UpdateOrderRequest $request)
    {
        $this->authorize('owner', $order);

        if ($order->evidence_of_payment !== null) {
            Storage::delete($order->evidence_of_payment);
        }

        $data = $request->validated();
        $data['evidence_of_payment'] = $request->file('evidence_of_payment')->store('orders/evidence_of_payment');
        $data['payment_status'] = PaymentStatus::UPLOADED;

        $order->update($data);

        return back()->with('success', 'Bukti pembayaran berhasil diupload!');
    }
}
