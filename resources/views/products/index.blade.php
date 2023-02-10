<x-app-layout>
    <section class="relative z-1 py-12 lg:py-20">
        <div
            class="w-[calc(100%_-_2.5rem)] lg:w-[calc(100%_-_4rem)] mx-auto max-w-lg md:max-w-3xl lg:max-w-5xl xl:max-w-7xl">
            <div class="text-component text-center mb-12 lg:mb-20">
                <h1>Produk</h1>
            </div>

            <div class="p-table p-table--has-switch js-p-table--has-switch">
                <div class="flex justify-center mb-5 lg:mb-8">

                    <div class="grid grid-cols-12 gap-3 lg:gap-5">
                        @forelse ($products as $product)
                            <div class="p-table__item col-span-12 lg:col-span-4">
                                <div class="mb-1.5 lg:mb-2">
                                </div>

                                <div class="p-table__price-wrapper mb-3 lg:mb-5">
                                    <div class="p-table__price p-table__price">
                                        <a class="prod-card__img-link"
                                            href="{{ route('client.products.show', $product) }}"
                                            aria-label="Description of the link">
                                            <figure class="prod-card__img ">
                                                <img src="{{ $product->image() }}" alt="Product preview image" style="min-height: 17.2em; max-height: 17.2em">
                                            </figure>
                                        </a>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <ul class="p-table__features mb-5 lg:mb-8">
                                        <li>
                                            <h4 class="p-table__title">{{ $product->name }}</h4>
                                            <div class="my-3">
                                            </div>
                                            <p class="font-bold">
                                                {{ 'Rp. ' . number_format($product->price, 0, ',', '.') }}
                                            </p>
                                        </li>
                                    </ul>

                                    <div class="mt-auto">
                                        @guest
                                            <div class="flex justify-start mt-3 lg:mt-5">
                                                <a href="{{ route('client.login') }}" class="btn btn--primary btn--md w-full">
                                                    Tambah ke keranjang
                                                </a>
                                            </div>
                                        @endguest
                                        @auth
                                            <div class="flex justify-start mt-3 lg:mt-5">
                                                <button class="btn btn--primary btn--md w-full cart-add" type="submit"
                                                    data-id="{{ $product->slug }}" data-itemid="{{ $product->id }}"
                                                    data-name="{{ $product->name }}" data-image="{{ $product->image }}"
                                                    data-price="{{ $product->price }}">Tambah ke keranjang</button>
                                            </div>
                                        @endauth
                                    </div>
                                </div>
                            </div>
                        @empty
                            <h1 class="text-center">Tidak Tersedia, mohon bersabar...</h1>
                        @endforelse

                    </div>

                </div>
            </div>
            {{ $products->links('vendor.pagination.custom') }}
    </section>
    <!-- text feature -->
    <section class="relative z-1 pt-20 lg:pt-32" data-theme="secondary">
        <div
            class="w-[calc(100%_-_2.5rem)] lg:w-[calc(100%_-_4rem)] mx-auto max-w-lg md:max-w-3xl lg:max-w-5xl xl:max-w-7xl relative z-2">
            <div class="grid grid-cols-12 gap-5 lg:gap-8">

                <div class="col-span-12 lg:col-span-4">
                    <h1 class="leading-tight">Kamu tidak ada waktu untuk membersihkan sepatumu?</h1>
                </div>

                <div class="col-span-12 lg:col-span-8">
                    <div class="lg:pl-8">
                        <div class="text-component">
                            <p>Disini kita menyediakan servis atau jasa membersihkan sepatu, disini sepatu akan di
                                handle dengan baik oleh expert dari perusahaan kita.</p>
                            <p>Kamu bisa memesan servis kita dengan memenencet tombol dibawah untuk
                                menavigasi ke halaman servis.</p>
                        </div>

                        <div class="flex justify-end mt-3 lg:mt-5"><a class="btn btn--subtle" href="{{ route('client.services.index') }}">Pelajari
                                lebih lanjut</a></div>
                    </div>
                </div>
                <div class="py-12">
                </div>
            </div>
        </div>

        <figure class="bg-decoration z-1" aria-hidden="true">
            <svg class="bg-decoration__svg text-contrast-higher opacity-40" viewBox="0 0 1920 450" fill="none">
                <rect opacity="0.5" x="610.131" y="-440" width="128" height="836.003"
                    transform="rotate(46.8712 610.131 -440)" fill="url(#bg-decoration-v1-fx-5-linear-1)" />
                <rect opacity="0.5" x="1899.13" y="-262" width="128" height="836.003"
                    transform="rotate(46.8712 1899.13 -262)" fill="url(#bg-decoration-v1-fx-5-linear-2)" />
                <rect opacity="0.5" x="2076.13" y="-321" width="128" height="836.003"
                    transform="rotate(46.8712 2076.13 -321)" fill="url(#bg-decoration-v1-fx-5-linear-3)" />
                <rect opacity="0.5" x="1294.5" y="40.3308" width="128" height="836.003"
                    transform="rotate(-132.518 1294.5 40.3308)" fill="url(#bg-decoration-v1-fx-5-linear-4)" />
                <rect opacity="0.5" x="1866.13" y="-453" width="128" height="836.003"
                    transform="rotate(46.8712 1866.13 -453)" fill="url(#bg-decoration-v1-fx-5-linear-5)" />
                <rect opacity="0.5" x="800.131" y="-418" width="128" height="836.003"
                    transform="rotate(46.8712 800.131 -418)" fill="url(#bg-decoration-v1-fx-5-linear-5)" />
                <rect opacity="0.5" x="436.448" y="-251" width="76.1734" height="340.424"
                    transform="rotate(46.8712 436.448 -251)" fill="url(#bg-decoration-v1-fx-5-linear-7)" />
                <defs>
                    <linearGradient id="bg-decoration-v1-fx-5-linear-1" x1="674.131" y1="-440" x2="674.131"
                        y2="396.003" gradientUnits="userSpaceOnUse">
                        <stop stop-color="currentColor" />
                        <stop offset="1" stop-color="currentColor" stop-opacity="0" />
                    </linearGradient>
                    <linearGradient id="bg-decoration-v1-fx-5-linear-2" x1="1963.13" y1="-262" x2="1963.13"
                        y2="574.003" gradientUnits="userSpaceOnUse">
                        <stop stop-color="currentColor" />
                        <stop offset="1" stop-color="currentColor" stop-opacity="0" />
                    </linearGradient>
                    <linearGradient id="bg-decoration-v1-fx-5-linear-3" x1="2140.13" y1="-321" x2="2140.13"
                        y2="515.003" gradientUnits="userSpaceOnUse">
                        <stop stop-color="currentColor" />
                        <stop offset="1" stop-color="currentColor" stop-opacity="0" />
                    </linearGradient>
                    <linearGradient id="bg-decoration-v1-fx-5-linear-4" x1="1358.5" y1="40.3308" x2="1358.5"
                        y2="876.334" gradientUnits="userSpaceOnUse">
                        <stop stop-color="currentColor" />
                        <stop offset="1" stop-color="currentColor" stop-opacity="0" />
                    </linearGradient>
                    <linearGradient id="bg-decoration-v1-fx-5-linear-5" x1="1930.13" y1="-453" x2="1930.13"
                        y2="383.003" gradientUnits="userSpaceOnUse">
                        <stop stop-color="currentColor" />
                        <stop offset="1" stop-color="currentColor" stop-opacity="0" />
                    </linearGradient>
                    <linearGradient id="bg-decoration-v1-fx-5-linear-5" x1="864.131" y1="-418" x2="864.131"
                        y2="418.003" gradientUnits="userSpaceOnUse">
                        <stop stop-color="currentColor" />
                        <stop offset="1" stop-color="currentColor" stop-opacity="0" />
                    </linearGradient>
                    <linearGradient id="bg-decoration-v1-fx-5-linear-7" x1="474.534" y1="-251" x2="474.534"
                        y2="89.4236" gradientUnits="userSpaceOnUse">
                        <stop stop-color="currentColor" stop-opacity="0" />
                        <stop offset="1" stop-color="currentColor" />
                    </linearGradient>
                </defs>
            </svg>
        </figure>
    </section>

    @push('scripts')
        <script>
            function addToCart(e) {
                e.preventDefault();

                let id = $(this).data('id');
                let item_id = $(this).data('itemid');
                let name = $(this).data('name');
                let type = 'Produk';
                let image = $(this).data('image');
                let price = $(this).data('price');

                $.ajax({
                    type: 'POST',
                    url: "{{ route('client.cart.add') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id": id,
                        "item_id": item_id,
                        "name": name,
                        "type": type,
                        "image": image,
                        "price": price
                    },
                    success: function(data) {
                        location.reload();
                    },
                });
            }

            $(document).ready(function() {
                $('.cart-add').click(addToCart);
            });
        </script>
    @endpush
</x-app-layout>
