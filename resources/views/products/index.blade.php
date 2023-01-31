<x-app-layout>
    <section class="relative z-1 py-12 lg:py-20">
        <div
            class="w-[calc(100%_-_2.5rem)] lg:w-[calc(100%_-_4rem)] mx-auto max-w-lg md:max-w-3xl lg:max-w-5xl xl:max-w-7xl">
            <div class="text-component text-center mb-12 lg:mb-20">
                <h1>Produk</h1>
                <p class="text-contrast-medium">Dipilih sesuai kebutuhan bray...</p>
            </div>

            <div class="p-table p-table--has-switch js-p-table--has-switch">
                <div class="flex justify-center mb-5 lg:mb-8">

                    <div class="grid grid-cols-12 gap-3 lg:gap-5">
                        @forelse ($products as $product)
                        <div class="p-table__item col-span-12 lg:col-span-4">
                            <div class="mb-1.5 lg:mb-2">
                                <h4 class="p-table__title">{{ $product->name }}</h4>
                            </div>

                            <div class="p-table__price-wrapper mb-3 lg:mb-5">
                                <div class="p-table__price p-table__price">
                                    <a class="prod-card__img-link" href="#0"
                                        aria-label="Description of the link">
                                        <figure class="prod-card__img ">
                                            <img src="{{ $product->image() }}"
                                                alt="Product preview image">
                                        </figure>
                                    </a>
                                </div>
                            </div>

                            <ul class="p-table__features mb-5 lg:mb-8">
                                <li>
                                    <p>
                                        Rp.{{ $product->price }} <br>
                                        {{ $product->description }}
                                    </p>
                                </li>
                            </ul>

                            <div class="mt-auto"><a href="#0" class="btn btn--primary btn--md w-full">Tambahkan
                                    ke keranjang</a></div>

                        </div>
                        @empty
                            <h1>Tidak Tersedia, mohon bersabar...</h1>
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

                        <div class="flex justify-end mt-3 lg:mt-5"><a class="btn btn--subtle" href="#0">Pelajari
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
    {{--
    <section class="relative z-1 py-20 lg:py-32" data-theme="soft">
        <div
            class="w-[calc(100%_-_2.5rem)] lg:w-[calc(100%_-_4rem)] mx-auto max-w-lg md:max-w-3xl lg:max-w-5xl xl:max-w-7xl relative z-2">
            <div class="mb-12 lg:mb-20">
                <h1 class="text-center">Questions &amp; Answers</h1>
            </div>

            <ol class="text-points grid grid-cols-12 gap-y-8 lg:gap-12">
                <li class="text-points__item col-span-12 lg:col-span-6">
                    <div class="text-component leading-normal text-space-y-md">
                        <h3 class="text-points__title">How can I download the invoice for my purchase?</h3>
                        <p class="text-contrast-medium">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    </div>
                </li>

                <li class="text-points__item col-span-12 lg:col-span-6">
                    <div class="text-component leading-normal text-space-y-md">
                        <h3 class="text-points__title">How many devices can I use?</h3>
                        <p class="text-contrast-medium">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea quia
                            iure quaerat possimus quasi? Enim, provident!</p>
                    </div>
                </li>

                <li class="text-points__item col-span-12 lg:col-span-6">
                    <div class="text-component leading-normal text-space-y-md">
                        <h3 class="text-points__title">What is the license of your resources?</h3>
                        <p class="text-contrast-medium">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            Cupiditate explicabo est magnam nobis ea maiores soluta, repellendus iure temporibus fugiat.
                        </p>
                    </div>
                </li>

                <li class="text-points__item col-span-12 lg:col-span-6">
                    <div class="text-component leading-normal text-space-y-md">
                        <h3 class="text-points__title">Do you have an affiliation system?</h3>
                        <p class="text-contrast-medium">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi
                            sunt illo a eveniet quod voluptatum nesciunt doloremque sapiente inventore, impedit, rem
                            sint.</p>
                    </div>
                </li>

                <li class="text-points__item col-span-12 lg:col-span-6">
                    <div class="text-component leading-normal text-space-y-md">
                        <h3 class="text-points__title">Can I suggest new app features?</h3>
                        <p class="text-contrast-medium">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Mollitia quibusdam libero quasi pariatur rerum explicabo. Suscipit libero voluptates
                            repellendus dolorem sequi, quibusdam molestiae aliquid, soluta dignissimos mollitia
                            asperiores.</p>
                    </div>
                </li>

                <li class="text-points__item col-span-12 lg:col-span-6">
                    <div class="text-component leading-normal text-space-y-md">
                        <h3 class="text-points__title">Can I suggest new app features?</h3>
                        <p class="text-contrast-medium">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis,
                            exercitationem rem. Nulla aut amet error vero nemo dignissimos tempore magnam, adipisci
                            veniam, iusto asperiores ducimus, iure totam voluptatum cumque est quia delectus.</p>
                    </div>
                </li>
            </ol>
        </div>

        <figure class="bg-decoration z-1" aria-hidden="true">
            <svg class="bg-decoration__svg text-contrast-lower" viewBox="0 0 1920 450" fill="none">
                <rect opacity="0.5" x="1952.45" y="45.1172" width="175.38" height="1451.58"
                    transform="rotate(99.6416 1952.45 45.1172)" fill="url(#bg-decoration-v1-fx-6-linear-1)" />
                <circle opacity="0.5" r="38" transform="matrix(-1 0 0 1 1583 171)"
                    fill="url(#bg-decoration-v1-fx-6-radial-1)" />
                <path opacity="0.5" d="M1338 187L1679.53 -0.113281L1416.47 -78.0066L1338 187Z"
                    fill="url(#bg-decoration-v1-fx-6-linear-2)" />
                <path opacity="0.5" d="M1683.59 291L1612.88 413.475L1709.47 387.593L1683.59 291Z"
                    fill="url(#bg-decoration-v1-fx-6-linear-3)" />
                <defs>
                    <linearGradient id="bg-decoration-v1-fx-6-linear-1" x1="2040.14" y1="45.1172" x2="2040.14"
                        y2="1496.7" gradientUnits="userSpaceOnUse">
                        <stop stop-color="currentColor" stop-opacity="0" />
                        <stop offset="1" stop-color="currentColor" />
                    </linearGradient>
                    <radialGradient id="bg-decoration-v1-fx-6-radial-1" cx="0" cy="0" r="1"
                        gradientUnits="userSpaceOnUse" gradientTransform="scale(38)">
                        <stop stop-color="hsl(var(--color-primary))" stop-opacity="0" />
                        <stop offset="1" stop-color="hsl(var(--color-primary))" />
                    </radialGradient>
                    <linearGradient id="bg-decoration-v1-fx-6-linear-2" x1="1640.29" y1="132.39" x2="1377.23"
                        y2="54.4967" gradientUnits="userSpaceOnUse">
                        <stop stop-color="currentColor" />
                        <stop offset="1" stop-color="currentColor" stop-opacity="0" />
                    </linearGradient>
                    <linearGradient id="bg-decoration-v1-fx-6-linear-3" x1="1599.94" y1="365.178" x2="1696.53"
                        y2="339.296" gradientUnits="userSpaceOnUse">
                        <stop stop-color="currentColor" />
                        <stop offset="1" stop-color="currentColor" stop-opacity="0" />
                    </linearGradient>
                </defs>
            </svg>
        </figure>
    </section> --}}
</x-app-layout>
