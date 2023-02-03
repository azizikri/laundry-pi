<footer class="main-footer relative z-1 pt-12 lg:pt-20 border-t border-contrast-lower">
    <div class="w-[calc(100%_-_2.5rem)] lg:w-[calc(100%_-_4rem)] mx-auto max-w-7xl">
        <div class="grid grid-cols-12 gap-y-8 lg:gap-12">
            <div class="col-span-12 xl:col-span-3 xl:order-2 xl:text-right">
                <a class="main-footer__logo" href="{{ route('client.index') }}">
                    <h1 class="text-shadow-sm leading-tight lg:leading-tight" style="font-size: 2rem;">
                        <em>shoesclean.co</em>
                    </h1>
                </a>
            </div>

            <nav class="col-span-12 xl:col-span-9 xl:order-1">
                <ul class="grid grid-cols-12 gap-y-8 sm:gap-8 lg:gap-12">
                    <li class="col-span-12 sm:col-span-6 lg:col-span-3">
                        <h4 class="mb-3 lg:mb-5">Halaman</h4>
                        <ul class="grid grid-cols-12 gap-2 lg:gap-3">
                            <li class="col-span-12"><a href="{{ route('client.services.index') }}"
                                    class="main-footer__link">Servis</a></li>
                            <li class="col-span-12"><a href="{{ route('client.products.index') }}"
                                    class="main-footer__link">Produk</a></li>
                            <li class="col-span-12"><a href="{{ route('client.about-us.index') }}"
                                    class="main-footer__link">Tentang Kami</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>

        <div
            class="flex flex-col border-t border-contrast-lower py-2 lg:py-3 mt-8 lg:mt-12 lg:flex-row lg:justify-between lg:items-center">
            <div class="mb-3 lg:mb-0">
                <div class="text-sm lg:text-xs text-contrast-medium flex flex-wrap gap-2 lg:gap-3">
                    <span>&copy; shoesclean.co</span>
                </div>
            </div>
        </div>
    </div>
</footer>
