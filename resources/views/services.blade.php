<x-app-layout>
    <section class="relative z-1 py-12 lg:py-20">
        <div
            class="w-[calc(100%_-_2.5rem)] lg:w-[calc(100%_-_4rem)] mx-auto max-w-lg md:max-w-3xl lg:max-w-5xl xl:max-w-7xl">
            <div class="text-component text-center mb-12 lg:mb-20">
                <h1>Servis Kami</h1>
                <p class="text-contrast-medium">Dipilih sesuai kebutuhan bray...</p>
            </div>

            <div class="p-table p-table--has-switch js-p-table--has-switch">
                <div class="flex justify-center mb-5 lg:mb-8">

                    <div class="grid grid-cols-12 gap-3 lg:gap-5">
                        @forelse ($services as $service)
                            <div class="p-table__item col-span-12 lg:col-span-4">
                                <div class="mb-1.5 lg:mb-2">
                                    <h4 class="p-table__title">{{ $service->name }}</h4>
                                </div>

                                <div class="p-table__price-wrapper mb-3 lg:mb-5">
                                    <div class="p-table__price p-table__price">
                                        <figure class="prod-card__img ">
                                            <img src="{{ $service->image() }}" alt="Product preview image">
                                          </figure>
                                    </div>
                                </div>

                                <ul class="p-table__features mb-5 lg:mb-8">
                                    <li>
                                        <p>
                                            {{ $service->description }}
                                        </p>
                                    </li>
                                </ul>

                                <div class="mt-auto"><a href="#0" class="btn btn--primary btn--md w-full">Rp. {{ $service->price }}</a></div>

                            </div>
                        @empty
                            <h1>Tidak Tersedia, mohon bersabar...</h1>
                        @endforelse
                    </div>
                </div>
            </div>
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

