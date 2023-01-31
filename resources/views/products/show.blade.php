<x-app-layout>

    <section
        class="product w-[calc(100%_-_2.5rem)] lg:w-[calc(100%_-_4rem)] mx-auto max-w-lg md:max-w-3xl lg:max-w-5xl xl:max-w-7xl py-20">
        <div class="mb-3 lg:mb-5">
            <nav class="breadcrumbs text-sm lg:text-base" aria-label="Breadcrumbs">
                <ol class="flex flex-wrap gap-1.5 lg:gap-2">
                    <li class="breadcrumbs__item">
                        <a href="{{ route('client.products.index') }}" class="text-inherit">Servis</a>
                        <span class="text-contrast-low ml-1.5 lg:ml-2" aria-hidden="true">/</span>
                    </li>

                    <li class="breadcrumbs__item" aria-current="page">{{ $product->name }}</li>
                </ol>
            </nav>
        </div>

        <div class="grid grid-cols-12 gap-5 lg:gap-8">
            <div class="col-span-12 lg:col-span-6 xl:col-span-7">
                <figure class="image-zoom js-image-zoom ">
                    <img class="image-zoom__preview js-image-zoom__preview" src="{{ $product->image() }}"
                        alt="Preview image description">
                    <figcaption class="sr-only">{{ $product->name }}</figcaption>
                </figure>
            </div>

            <div class="col-span-12 lg:col-span-6 xl:col-span-5">
                <div class="mb-2 lg:mb-3">
                    <h1>{{ $product->name }}</h1>
                </div>

                <div class="text-component text-space-y-md my-5 lg:my-8">
                    <p>{{ $product->description }}</p>
                    <p class="text-lg lg:text-2xl"><ins class="no-underline">Rp. {{ $product->price }}</ins></p>
                </div>

                <div class="mb-5 lg:mb-8">

                </div>

                <div class="flex gap-2 lg:gap-3">
                    <label class="form-label sr-only" for="quantity">Kuantitas:</label>

                    <div class="number-input number-input--v1 js-number-input ">
                        <input class="form-control js-number-input__value" type="number" name="quantity" id="quantity"
                            min="0" max="10" step="1" value="1">
                    </div>

                    <button class="btn btn--primary grow">Tambah ke keranjang</button>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
