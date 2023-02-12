<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $items = session()->get('cart');
        $totalPrice = 0;

        if ($items) {
            foreach ($items as $item) {
                $totalPrice += $item['price'] * $item['quantity'];
            }
        }

        return view('cart', [
            'items' => $items,
            'totalPrice' => $totalPrice,
        ]);
    }
    public function addToCart(Request $request)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$request->id])) {
            $cart[$request->id]['quantity'] += $request->quantity ? (int) $request->quantity : 1;
        } else {
            $cart[$request->id] = [
                "item_id" => $request->item_id,
                "name" => $request->name,
                "type" => $request->type,
                "image" => $request->image,
                "price" => $request->price,
                "quantity" => $request->quantity ? (int) $request->quantity : 1,
            ];
        }

        session()->put('cart', $cart);
        session()->flash('success', 'Berhasil menambahkan barang ke keranjang!');

    }

    public function update(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Berhasil mengubah barang di keranjang!');
        }
    }

    public function remove(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Barang berhasil di hapus!');
        }
    }

    public function clear()
    {
        session()->forget('cart');
        return redirect()->back()->with('success', 'Keranjang berhasil dibersihkan!');
    }
}
