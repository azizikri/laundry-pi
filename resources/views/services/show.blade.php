<x-app-layout>

    <section
        class="product w-[calc(100%_-_2.5rem)] lg:w-[calc(100%_-_4rem)] mx-auto max-w-lg md:max-w-3xl lg:max-w-5xl xl:max-w-7xl py-20">
        <div class="mb-3 lg:mb-5">
            <nav class="breadcrumbs text-sm lg:text-base" aria-label="Breadcrumbs">
                <ol class="flex flex-wrap gap-1.5 lg:gap-2">
                    <li class="breadcrumbs__item">
                        <a href="{{ route('client.services.index') }}" class="text-inherit">Servis</a>
                        <span class="text-contrast-low ml-1.5 lg:ml-2" aria-hidden="true">/</span>
                    </li>

                    <li class="breadcrumbs__item" aria-current="page">{{ $service->name }}</li>
                </ol>
            </nav>
        </div>

        <div class="grid grid-cols-12 gap-5 lg:gap-8">
            <div class="col-span-12 lg:col-span-6 xl:col-span-7">
                <figure class="image-zoom js-image-zoom ">
                    <img class="image-zoom__preview js-image-zoom__preview" src="{{ $service->image() }}"
                        alt="Preview image description">
                    <figcaption class="sr-only">{{ $service->name }}</figcaption>
                </figure>
            </div>

            <div class="col-span-12 lg:col-span-6 xl:col-span-5">
                <div class="mb-2 lg:mb-3">
                    <h1>{{ $service->name }}</h1>
                </div>

                <div class="text-component text-space-y-md my-5 lg:my-8">
                    <p>{{ $service->description }}</p>
                    <p class="text-lg lg:text-2xl"><ins class="no-underline">{{ 'Rp. ' . number_format($service->price, 0, ',', '.') }}</ins></p>
                </div>

                <div class="mb-5 lg:mb-8">

                </div>

                <div class="flex flex-col md:flex-row gap-2 lg:gap-3">
                    <label class="form-label sr-only" for="quantity">Kuantitas:</label>

                    <input class="form-control js-number-input__value" type="number" name="quantity" id="quantity"
                        min="0" max="10" step="1" value="1">
                    @guest
                        <a href="{{ route('client.login') }}" class="btn btn--primary grow">Tambah ke keranjang</a>
                    @endguest
                    @auth
                        <button class="btn btn--primary grow cart-add" type="submit" data-id="{{ $service->slug }}"
                            data-itemid="{{ $service->id }}" data-name="{{ $service->name }}"
                            data-image="{{ $service->image }}" data-price="{{ $service->price }}">Tambah ke
                            keranjang</button>
                    @endauth
                </div>
            </div>
        </div>
    </section>

    @push('scripts')
        <script>
            function addToCart(e) {
                e.preventDefault();

                let id = $(this).data('id');
                let item_id = $(this).data('itemid');
                let name = $(this).data('name');
                let type = 'Servis';
                let image = $(this).data('image');
                let price = $(this).data('price');
                let quantity = $('#quantity').val();

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
                        "price": price,
                        "quantity": quantity,
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
