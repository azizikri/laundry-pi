<x-app-layout>
    <!-- diagonal hero -->
    <section class="-contrast-lower/50">
        <div class="w-[calc(100%_-_2.5rem)] lg:w-[calc(100%_-_4rem)] mx-auto max-w-lg md:max-w-3xl py-20 lg:py-32">
            <div class="-white rounded-lg shadow-lg overflow-hidden">
                <div class="p-5">
                    <h3 class="text-lg font-medium">Keranjang Belanja</h3>
                </div>
                <div class="w-full overflow-x-scroll">
                    <table class="w-full text-left table-collapse">
                        <thead>
                            <tr>
                                <th class="text-sm font-medium p-3 -gray-100 text-gray-600">Produk</th>
                                <th class="text-sm font-medium p-3 -gray-100 text-gray-600">Jenis</th>
                                <th class="text-sm font-medium p-3 -gray-100 text-gray-600">Kuantitas</th>
                                <th class="text-sm font-medium p-3 -gray-100 text-gray-600">Harga</th>
                                <th class="text-sm font-medium p-3 -gray-100 text-gray-600">Total Harga</th>
                                <th class="text-sm font-medium p-3 -gray-100 text-gray-600">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="-white">
                            @if (session()->has('cart'))
                                @forelse ($items as $id => $item)
                                    <tr>
                                        <td class="p-3 border-t border-gray-300 text-sm font-medium">
                                            {{ $item['name'] }}
                                        </td>
                                        <td class="p-3 border-t border-gray-300 text-sm font-medium">
                                            {{ $item['type'] }}
                                        </td>
                                        <td class="p-3 border-t border-gray-300 text-sm font-medium">
                                            <input type="number"
                                                class="form-input w-20 text-center quantity cart_update" min="1"
                                                value="{{ $item['quantity'] }}"
                                                onchange="updateCart('{{ $id }}', this.value)">
                                        </td>
                                        <td class="p-3 border-t border-gray-300 text-sm font-medium">
                                            {{ 'Rp. ' . number_format($item['price'], 0, ',', '.') }}
                                        </td>
                                        <td class="p-3 border-t border-gray-300 text-sm font-medium">
                                            {{ 'Rp. ' . number_format($item['price'] * $item['quantity'], 0, ',', '.') }}
                                        </td>
                                        <td class="p-3 border-t border-gray-300 text-sm font-medium">
                                            <button type="submit"
                                                class="btn btn--accent text-white rounded p-2 remove-item-cart"
                                                data-id="{{ $id }}">Hapus</button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="p-5 text-center border-t border-gray-300">
                                            Tidak ada produk di keranjang
                                        </td>
                                    </tr>
                                @endforelse
                            @else
                                <tr>
                                    <td colspan="6" class="p-5 text-center border-t border-gray-300">
                                        Tidak ada produk dikeranjang
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="mt-3">

                <h2 class="text-lg font-bold mb-3 lg:mb-0">
                    Total: {{ 'Rp. ' . number_format($totalPrice, 0, ',', '.') }}
                </h2>
            </div>
            <div class="mt-5 flex flex-col lg:flex-row justify-end items-center">
                <div class="mt-3 lg:mt-0">
                    <a class="btn btn--subtle text-white py-2 px-4 rounded mr-3 my-3"
                        href="{{ route('client.products.index') }}">Kembali</a>
                    <a class="btn btn--accent text-white py-2 px-4 rounded mr-3 my-3"
                        href="{{ route('client.cart.clear') }}">Kosongkan</a>
                    {{-- make go to order page button --}}
                    <a class="btn btn--primary-light text-white py-2 px-4 rounded mr-3 my-3"
                    href="{{ route('client.orders.index') }}">Pesanan Anda</a>
                    <button class="btn btn--primary text-white py-2 px-4 rounded my-3"
                        onclick="
                        event.preventDefault();
                        document.getElementById('checkout').submit();
                    ">Checkout</button>
                    <form id="checkout" action="{{ route('client.orders.store') }}" method="post">
                        @csrf
                    </form>
                </div>
            </div>

        </div>
    </section>

    @push('scripts')
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
                        // warp showswal with location reload
                        location.reload();
                    },
                });
            }

            function updateCart(id, quantity) {
                $.ajax({
                    url: "{{ route('client.cart.update') }}",
                    type: 'patch',
                    data: {
                        id: id,
                        quantity: quantity,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        location.reload();
                    }
                });
            }

            $(document).ready(function() {
                $('.remove-item-cart').click(removeItemCart);
            });
        </script>
    @endpush
</x-app-layout>
