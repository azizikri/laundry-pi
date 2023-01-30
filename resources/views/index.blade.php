<x-app-layout>
    <!-- diagonal hero -->
    <section class="bg-contrast-lower/50"
        style="background-image: url('{{ asset('img/hero-diagonal-img-1.jpg') }}');" data-theme="dark">
        <div class="w-[calc(100%_-_2.5rem)] lg:w-[calc(100%_-_4rem)] mx-auto max-w-lg md:max-w-3xl py-20 lg:py-32">
            <div class="text-center">
                <div class="text-sm lg:text-base opacity-90 mb-1.5 lg:mb-2">Welcome</div>

                <div class="text-component mb-3 lg:mb-5">
                    <h1 class="text-shadow-sm text-4xl leading-tight lg:text-6xl lg:leading-tight">
                        <em>{{ config('app.name', 'Laravel') }}</em>
                    </h1>
                    <p>Hanya dengan beberapa klik, Anda dapat menjadwalkan pengambilan dan pengiriman, melacak pesanan Anda, dan menikmati pakaian segar dan bersih yang dikirim langsung ke rumah Anda.</p>
                </div>

                <div class="flex flex-wrap justify-center items-center gap-3 lg:gap-5">
                    <a class="btn btn--primary" href="{{ route('client.login') }}">Ayo kita mulai!</a>

                    {{-- <a class="link-fx-1 text-contrast-higher" href="https://codyhouse.co/template/virgo">
                        <span>Learn more</span>
                        <svg class="icon" viewBox="0 0 32 32" aria-hidden="true">
                            <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="16" cy="16" r="15.5" />
                                <line x1="10" y1="18" x2="16" y2="12" />
                                <line x1="16" y1="12" x2="22" y2="18" />
                            </g>
                        </svg>
                    </a> --}}
                </div>
            </div>
        </div>
    </section>

    <!-- bi-color feature -->
    <section class="feature-v10 ">
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
                            <p class="mt-auto"><a href="#0" class="feature-v10__link"><i
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
                            <p class="mt-auto"><a href="#0" class="feature-v10__link"><i
                                        class="not-italic">Pesan Sekarang</i></a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- devices -->
    {{-- <section class="relative z-1 py-12 lg:py-20" data-theme="dark">
        <div
            class="w-[calc(100%_-_2.5rem)] lg:w-[calc(100%_-_4rem)] mx-auto max-w-lg md:max-w-3xl lg:max-w-5xl xl:max-w-7xl relative z-2">
            <div class="grid grid-cols-12 gap-y-8 lg:gap-12 items-center">
                <div class="col-span-12 lg:col-span-5">
                    <div class="text-component">
                        <p class="text-sm lg:text-base text-contrast-medium">How it works</p>
                        <h1>Lorem ipsum</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa, rem neque doloribus impedit
                            explicabo.</p>
                    </div>

                    <div class="mt-3 lg:mt-5">
                        <div class="flex flex-wrap gap-3 lg:gap-5 items-center">
                            <a class="btn btn--primary" href="#0">Download</a>
                        </div>
                    </div>
                </div>

                <div class="col-span-12 lg:col-span-7">
                    <div class="device-group-3">

                        <div class="dev-phone dev-phone--top-light" aria-label="Image description">
                            <div class="dev-phone__body">
                                <div class="dev-phone__media">
                                    <div class="dev-phone__notch"></div>
                                    <svg viewBox="0 0 750 1334">
                                        <rect width="750" height="1334" class="fill-contrast-lower" />
                                        <path d="M130 850.633L436.4 544.233L620.24 850.633H130Z"
                                            class="fill-contrast-medium" />
                                        <path
                                            d="M192.328 606.56C226.172 606.56 253.608 579.124 253.608 545.28C253.608 511.436 226.172 484 192.328 484C158.484 484 131.048 511.436 131.048 545.28C131.048 579.124 158.484 606.56 192.328 606.56Z"
                                            class="fill-contrast-medium" />
                                    </svg>
                                </div>
                            </div>
                            <div class="dev-phone__shadow"></div>
                        </div>

                        <div class="dev-desktop " aria-label="Image description">
                            <div class="dev-desktop__body">
                                <div class="dev-desktop__media">
                                    <svg viewBox="0 0 1920 1200">
                                        <rect width="1920" height="1200" class="fill-contrast-lower" />
                                        <path d="M639.76 839.094L1039.91 438.944L1280 839.094H639.76Z"
                                            class="fill-contrast-medium" />
                                        <path
                                            d="M721.158 520.342C765.357 520.342 801.188 484.511 801.188 440.312C801.188 396.113 765.357 360.282 721.158 360.282C676.959 360.282 641.128 396.113 641.128 440.312C641.128 484.511 676.959 520.342 721.158 520.342Z"
                                            class="fill-contrast-medium" />
                                    </svg>
                                </div>
                            </div>
                            <div class="dev-desktop__base">
                                <div class="dev-desktop__base-top"></div>
                                <div class="dev-desktop__base-bottom"></div>
                                <div class="dev-desktop__shadow"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <figure class="bg-decoration z-1 -scale-x-100 -scale-y-100" aria-hidden="true">
            <svg class="bg-decoration__svg text-contrast-low" viewBox="0 0 1920 450" fill="none">
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

    <!-- CTA -->
    {{-- <section class="relative z-1 pt-12 lg:pt-20">
        <div
            class="w-[calc(100%_-_2.5rem)] lg:w-[calc(100%_-_4rem)] mx-auto max-w-lg md:max-w-3xl lg:max-w-5xl xl:max-w-7xl">
            <h1 class="sr-only">Join us</h1>

            <div class="text-2xl sm:text-3xl lg:text-5xl leading-tight sm:leading-tight lg:leading-tight font-bold">
                <p class="text-contrast-higher font-secondary">Be better,</p>
                <p class="mb-1.5 lg:mb-2 text-contrast-higher font-secondary">Be stronger.</p>

                <a class="td-text-block font-secondary" href="#0" aria-label="Join our club">
                    <span class="td-text-block__wrapper">
                        <em class="not-italic td-text-block__front-text">Join Our Club &rarr;</em>
                        <em class="not-italic td-text-block__final-text">Join Our Club &rarr;</em>
                    </span>
                </a>
            </div>
        </div>
    </section> --}}

    <!-- list -->
    {{-- <section class="my-12 lg:my-20">
        <div class="w-[calc(100%_-_2.5rem)] lg:w-[calc(100%_-_4rem)] mx-auto max-w-3xl">
            <ol class="list-v2 list-v2--ol">
                <li>
                    <div class="mb-2 lg:mb-3">
                        <h4 class="list-v2__title font-sans">
                            <div class="list-v2__bullet"></div>CSS Framework
                        </h4>
                    </div>

                    <div class="list-v2__content">
                        <div class="text-component">
                            <p class="text-contrast-medium">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Optio voluptatum rerum repudiandae nobis quae, autem minima eius doloribus recusandae
                                minus?</p>
                        </div>
                    </div>
                </li>

                <li>
                    <div class="mb-2 lg:mb-3">
                        <h4 class="list-v2__title font-sans">
                            <div class="list-v2__bullet"></div>Components
                        </h4>
                    </div>

                    <div class="list-v2__content">
                        <div class="text-component">
                            <p class="text-contrast-medium">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                Expedita eum tempora maxime, praesentium veritatis consectetur quia laudantium pariatur.
                            </p>
                            <p class="text-contrast-medium">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Sapiente unde explicabo natus consequuntur laborum dolores, asperiores sint, eveniet
                                deserunt porro illum aut ab earum non ducimus, cumque nam qui minima itaque ipsam ad
                                esse. Atque architecto molestiae assumenda inventore dignissimos.</p>
                        </div>
                    </div>
                </li>

                <li>
                    <div class="mb-2 lg:mb-3">
                        <h4 class="list-v2__title font-sans">
                            <div class="list-v2__bullet"></div>Global Editors
                        </h4>
                    </div>

                    <div class="list-v2__content">
                        <div class="text-component">
                            <p class="text-contrast-medium">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Deserunt natus totam deleniti corporis cupiditate non aperiam adipisci quasi repellendus
                                possimus.</p>
                        </div>
                    </div>
                </li>
            </ol>
        </div>
    </section> --}}

    <!-- sticky hero -->
    {{-- <section class="sticky-hero sticky-hero--scale mb-12 lg:mb-20 js-sticky-hero">
        <div class="sticky-hero__media" style="background-image: url('{{ asset('img/sticky-hero-img-1.jpg') }}');"
            aria-hidden="true"></div>

        <div class="sticky-hero__content bg-transparent" data-theme="dark">
            <div class="w-[calc(100%_-_2.5rem)] lg:w-[calc(100%_-_4rem)] mx-auto max-w-3xl text-component">
                <h1>Lorem ipsum dolor sit amet, consectetur adipisicing elit</h1>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolor expedita sequi nostrum quibusdam
                    possimus, vero aliquam ut debitis illum optio alias veniam error voluptatum.</p>
            </div>
        </div>
    </section>

    <section class="mb-12 lg:mb-20">
        <div class="w-[calc(100%_-_2.5rem)] lg:w-[calc(100%_-_4rem)] mx-auto max-w-3xl">
            <article class="text-component article">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum odit ea aliquid reiciendis eum quo
                    eligendi sapiente molestiae recusandae autem dolore cupiditate dicta enim illo, dolorem accusamus
                    doloremque.</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore illum eos accusantium atque
                    aspernatur repellat rem illo earum nihil. Earum eligendi error tenetur ullam id dolores fugiat
                    necessitatibus placeat. Omnis, ad! Ipsam consequuntur officiis iusto praesentium voluptatibus nulla
                    quidem dolores! Debitis laudantium libero maiores porro velit distinctio neque earum architecto
                    tenetur, doloremque sit ad dolores consequatur corrupti quae culpa? Officia!</p>
            </article>
        </div>
    </section> --}}

    <!-- newsletter -->
    {{-- <section class="newsletter py-20 lg:py-32 text-center" data-theme="soft">
        <div class="w-[calc(100%_-_2.5rem)] lg:w-[calc(100%_-_4rem)] mx-auto max-w-xl relative z-2">
            <div class="text-component mb-5 lg:mb-8">
                <h2>Join <em>our</em> Newsletter</h2>
                <p>Get our monthly recap with the latest news.</p>
            </div>

            <form class="flex gap-1.5 lg:gap-2">
                <div class="sm:grow min-w-0">
                    <input class="form-control w-full h-full" aria-label="Email" type="email"
                        placeholder="Email address">
                </div>

                <div class="sm:grow-0">
                    <button class="btn btn--primary w-full h-full">Subscribe</button>
                </div>
            </form>

            <div class="mt-2 lg:mt-3">
                <small class="text-xs text-contrast-medium">By subscribing you agree to our <a
                        class="text-contrast-high" href="#0">privacy policy</a>.</small>
            </div>
        </div>

        <figure class="bg-decoration z-1" aria-hidden="true">
            <svg class="bg-decoration__svg text-contrast-higher opacity-70" viewBox="0 0 1920 450" fill="none">
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
    </section> --}}
</x-app-layout>
