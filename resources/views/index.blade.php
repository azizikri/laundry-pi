<x-app-layout>
    <!-- diagonal hero -->
    <section class="bg-contrast-lower/50"
        style="background-image: url('{{ asset('img/hero-diagonal-img-1.jpg') }}');" data-theme="dark">
        <div class="w-[calc(100%_-_2.5rem)] lg:w-[calc(100%_-_4rem)] mx-auto max-w-lg md:max-w-3xl py-20 lg:py-32">
            <div class="text-center">
                <div class="text-sm lg:text-base opacity-90 mb-1.5 lg:mb-2">Welcome</div>

                <div class="text-component mb-3 lg:mb-5">
                    <h1 class="text-shadow-sm text-4xl leading-tight lg:text-6xl lg:leading-tight">
                        <em>shoesclean.co</em>
                    </h1>
                    <p>Hanya dengan beberapa klik, Anda dapat menjadwalkan pengambilan dan pengiriman, dan menikmati sepatu segar dan bersih yang dikirim langsung ke rumah Anda.</p>
                </div>

                <div class="flex flex-wrap justify-center items-center gap-3 lg:gap-5">
                    <a class="btn btn--primary" href="{{ auth()->check() ? '#item' : route('client.login') }}">Ayo kita mulai!</a>
                </div>
            </div>
        </div>
    </section>

    <!-- bi-color feature -->
    <section class="feature-v10" id="item">
        <div class="py-12 lg:py-20 lg:pt-32 lg:pb-0" data-theme="secondary">
            <div
                class="w-[calc(100%_-_2.5rem)] lg:w-[calc(100%_-_4rem)] mx-auto max-w-lg md:max-w-3xl lg:max-w-5xl xl:max-w-7xl">
                <div class="grid grid-cols-12">
                    <figure class="col-span-12 lg:col-span-6 reveal-fx reveal-fx--clip-x">
                        <img class="block w-full object-cover" src="{{ asset('img/landing-page1.jpg') }}"
                            alt="Image description">
                    </figure>

                    <div class="bg-contrast-lower/50 col-span-12 lg:col-span-6">
                        <div class="text-component text-space-y-md h-full flex flex-col p-5 lg:p-8">
                            <h2>Produk</h2>
                            <p class="mt-auto"><a href="{{ route('client.products.index') }}" class="feature-v10__link"><i
                                        class="not-italic">Belanja Sekarang</i></a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-floor py-12 lg:py-20 lg:pb-32 lg:pt-0" data-theme="secondary">
            <div
                class="w-[calc(100%_-_2.5rem)] lg:w-[calc(100%_-_4rem)] mx-auto max-w-lg md:max-w-3xl lg:max-w-5xl xl:max-w-7xl">
                <div class="grid grid-cols-12">
                    <figure class="col-span-12 lg:col-span-6 lg:order-2 reveal-fx reveal-fx--clip-x">
                        <img class="block w-full object-cover" src="{{ asset('img/landing-page3.webp') }}"
                            alt="Image description">
                    </figure>

                    <div class="bg-floor-dark col-span-12 lg:col-span-6 lg:order-1">
                        <div class="text-component text-space-y-md h-full flex flex-col p-5 lg:p-8">
                            <h2>Servis Cuci Sepatu</h2>
                            <p class="mt-auto"><a href="{{ route('client.services.index') }}" class="feature-v10__link"><i
                                        class="not-italic">Pesan Sekarang</i></a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
