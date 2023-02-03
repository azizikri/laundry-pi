<header class="f-header relative js-f-header">
    <div class="f-header__mobile-content w-[calc(100%_-_2.5rem)] lg:w-[calc(100%_-_4rem)] mx-auto max-w-7xl">
        <a href="{{ route('client.index') }}" class="f-header__logo">
            <h1 class="text-shadow-sm leading-tight lg:leading-tight" style="font-size: 2rem;">
                <em>shoesclean.co</em>
            </h1>
        </a>

        <button class="reset anim-menu-btn js-anim-menu-btn f-header__nav-control js-tab-focus" aria-label="Toggle menu">
            <i class="anim-menu-btn__icon anim-menu-btn__icon--close" aria-hidden="true"></i>
        </button>
    </div>

    <div class="f-header__nav" role="navigation">
        <div
            class="f-header__nav-grid lg:justify-between w-[calc(100%_-_2.5rem)] lg:w-[calc(100%_-_4rem)] mx-auto max-w-7xl">
            <div class="f-header__nav-logo-wrapper grow basis-0">
                <a href="{{ route('client.index') }}" class="f-header__logo">
                    <h1 class="text-shadow-sm leading-tight lg:leading-tight" style="font-size: 2rem;">
                        <em>shoesclean.co</em>
                    </h1>
                </a>
            </div>

            <ul class="f-header__list grow basis-0 lg:justify-center">
                <li class="f-header__item"><a href="{{ route('client.index') }}" class="f-header__link">Home</a></li>
                <li class="f-header__item"><a href="{{ route('client.services.index') }}"
                        class="f-header__link">Servis</a></li>
                <li class="f-header__item"><a href="{{ route('client.products.index') }}"
                        class="f-header__link">Produk</a></li>
                <li class="f-header__item"><a href="{{ route('client.about-us.index') }}" class="f-header__link">Tentang
                        Kami</a></li>
                </li>
            </ul>

            <ul class="f-header__list grow basis-0 lg:justify-end">
                @guest
                    <li class="f-header__item">
                        <a href="{{ route('client.login') }}" class="f-header__link" aria-label="Login">
                            Login
                        </a>
                    </li>

                    <li class="f-header__item">
                        <a href="{{ route('client.register') }}" class="f-header__link" aria-label="Register">
                            Register
                        </a>
                    </li>
                @endguest
                @auth
                    {{-- make header item with cart icon --}}
                    <li class="f-header__item">
                        <a href="{{ route('client.cart.index') }}" class="f-header__link" aria-label="Cart">
                            <svg height="1em" width="1em" version="1.1" id="_x32_"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                viewBox="0 0 512 512" xml:space="preserve">
                                <style type="text/css">
                                    .st0 {
                                        fill: #000000;
                                    }
                                </style>
                                <g>
                                    <path class="st0"
                                        d="
                                        M507.316,126.733L138.349,97.498l-5.612-31.861c-5.154-29.076-28.294-51.611-57.524-55.942L9.677,0 L4.684,33.717l65.544,9.72c14.676,2.165,26.342,13.504,28.919,28.134l52.95,300.107c4.969,28.168,29.431,48.69,58.044,48.698 h229.728l6.828-34.102H210.142c-12.049,0.017-22.373-8.662-24.454-20.522l-7.42-41.992h283.58L507.316,126.733z" />
                                    <path class="st0"
                                        d="M223.148,438.658c-20.253,0-36.667,16.426-36.667,36.678c0,20.254,16.414,36.663,36.667,36.663 c20.258,0,36.675-16.409,36.675-36.663C259.823,455.084,243.405,438.658,223.148,438.658z" />
                                    <path class="st0"
                                        d="M386.068,438.658c-20.257,0-36.666,16.426-36.666,36.678c0,20.254,16.409,36.663,36.666,36.663 c20.258,0,36.68-16.409,36.68-36.663C422.748,455.084,406.327,438.658,386.068,438.658z" />
                                </g>
                            </svg>

                            <span class="cart-count text-xs font-medium ml-2 text-white rounded-full px-2">
                                {{ session()->has('cart') ? count(session()->get('cart')) : 0 }}
                            </span>
                        </a>
                    </li>

                    <li class="f-header__item">
                        <a href="#" class="f-header__link">
                            <span>{{ auth()->user()->name }}</span>
                            <svg class="f-header__dropdown-icon icon" aria-hidden="true" viewBox="0 0 12 12">
                                <path
                                    d="M9.943,4.269A.5.5,0,0,0,9.5,4h-7a.5.5,0,0,0-.41.787l3.5,5a.5.5,0,0,0,.82,0l3.5-5A.5.5,0,0,0,9.943,4.269Z" />
                            </svg>
                        </a>

                        <ul class="f-header__dropdown">
                            <li>
                                <a href="{{ route('client.profile.edit') }}"
                                    class="f-header__dropdown-link leading-tight">Profile</a>
                            </li>
                            <li>
                                <a href="{{ route('client.orders.index') }}" class="f-header__dropdown-link leading-tight">
                                    Pesanan
                                </a>
                            </li>

                            <li>
                                <form id="logout-form" action="{{ route('client.logout') }}" method="POST">
                                    @csrf
                                    <a href="{{ route('client.logout') }}"
                                        onclick="event.preventDefault();
                                                this.closest('form').submit();"
                                        class="f-header__dropdown-link leading-tight">Logout</a>
                                </form>
                            </li>


                        </ul>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</header>
