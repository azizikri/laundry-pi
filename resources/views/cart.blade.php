<x-app-layout>
    <!-- diagonal hero -->
    <section class="bg-contrast-lower/50">
        <div class="w-[calc(100%_-_2.5rem)] lg:w-[calc(100%_-_4rem)] mx-auto max-w-lg md:max-w-3xl py-20 lg:py-32">
            <h1 class="text-2xl font-bold mb-5">Shopping Cart</h1>
            <table class="table-auto w-full">
                <thead>
                    <tr>
                        <th class="px-4 py-2">Produk</th>
                        <th class="px-4 py-2">Jenis</th>
                        <th class="px-4 py-2">Kuantitas</th>
                        <th class="px-4 py-2">Harga</th>
                        <th class="px-4 py-2">Total Harga</th>
                        <th class="px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if (session()->has('cart'))
                        @forelse ($items as $id => $item)
                            <tr>
                                <td class="border px-4 py-2">{{ $item['name'] }}</td>
                                <td class="border px-4 py-2">{{ $item['type'] }}</td>
                                <td class="border px-4 py-2">{{ $item['quantity'] }}</td>
                                <td class="border px-4 py-2">Rp. {{ $item['price'] }}</td>
                                <td class="border px-4 py-2">Rp. {{ $item['price'] * $item['quantity'] }}</td>
                                <td class="border px-4 py-2">
                                    <button type="submit" class="btn btn--accent remove-item-cart"
                                        data-id="{{ $id }}">Hapus</button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="border text-center p-5">Tidak ada produk di keranjang</td>
                            </tr>
                        @endforelse
                    @else
                        <tr>
                            <td colspan="6" class="border text-center p-5">Tidak ada produk di keranjang</td>
                        </tr>
                    @endif
                </tbody>
            </table>


            <div class="mt-5 flex justify-between items-center">
                <h2 class="text-lg font-bold">Total: Rp. {{ $totalPrice }}
                </h2>
                <div class="">
                    <a class="btn btn--subtle text-white py-2 px-4 rounded" href="{{ route('client.products.index') }}">
                        Lanjutkan Belanja
                    </a>
                    <a href="{{ route('client.cart.clear') }}">
                        <button class="btn btn--accent text-white py-2 px-4 rounded">Clear</button>
                    </a>
                    <button class="btn btn--primary text-white py-2 px-4 rounded">Checkout</button>
                </div>
            </div>
        </div>
    </section>

    @push('scripts')
        <script src="{{ asset('assets/js/jquery.js') }}"></script>
        <script>
            function removeItemCart(e) {
                e.preventDefault();

                let id = $(this).data('id');

                $.ajax({
                    type: 'POST',
                    url: "{{ route('client.cart.remove') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id": id,
                    },
                    success: function(data) {
                        location.reload();
                    },
                });
            }

            $(document).ready(function() {
                $('.remove-item-cart').click(removeItemCart);
            });
        </script>
    @endpush
</x-app-layout>
