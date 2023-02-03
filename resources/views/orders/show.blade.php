<x-app-layout>
    @push('styles')
        <link href="{{ asset('assets/plugins/dropify/css/dropify.min.css') }}" rel="stylesheet" />
    @endpush
    <!-- diagonal hero -->
    <section class="-contrast-lower/50">

        <div class="w-[calc(100%_-_2.5rem)] lg:w-[calc(100%_-_4rem)] mx-auto max-w-lg md:max-w-3xl py-20 lg:py-32">
            <!-- orders.blade.php -->
            <div class="flex justify-between">
                <h1 class="mb-4 text-2xl font-bold">Pesanan <br>#{{ $order->uuid }}</h1>
                <div>
                    @if ($order->order_status == $orderEnums::PENDING)
                        <span class="p-2 mx-3 text-xs text-white bg-primary-lighter">
                            {{ ucfirst($orderEnums::PENDING->value) }}
                        </span>
                    @elseif($order->order_status == $orderEnums::PROCESSING)
                        <span class="p-2 mx-3 text-xs text-white bg-warning-dark">
                            {{ ucfirst($orderEnums::PROCESSING->value) }}
                        </span>
                    @elseif($order->order_status == $orderEnums::COURIER)
                        <span class="p-2 mx-3 text-xs text-white bg-success-lighter">
                            {{ ucfirst($orderEnums::COURIER->value) }}
                        </span>
                    @elseif($order->order_status == $orderEnums::SHIPPING)
                        <span class="p-2 mx-3 text-xs text-white bg-success-lighter">
                            {{ ucfirst($orderEnums::SHIPPING->value) }}
                        </span>
                    @elseif($order->order_status == $orderEnums::DELIVERED)
                        <span class="p-2 mx-3 text-xs text-white bg-success-dark">
                            {{ ucfirst($orderEnums::DELIVERED->value) }}
                        </span>
                    @elseif($order->order_status == $orderEnums::COMPLETED)
                        <span class="p-2 mx-3 text-xs text-white bg-success-darker">
                            {{ ucfirst($orderEnums::COMPLETED->value) }}
                        </span>
                    @elseif($order->order_status == $orderEnums::CANCELED)
                        <span class="p-2 mx-3 text-xs text-white bg-accent-dark">
                            {{ ucfirst($orderEnums::CANCELED->value) }}
                        </span>
                    @endif

                    @if ($order->payment_status == $paymentEnums::PENDING)
                        <span class="p-2 mx-3 text-xs text-white bg-accent-dark">
                            {{ ucfirst($paymentEnums::PENDING->value) }}
                        </span>
                    @elseif($order->payment_status == $paymentEnums::UPLOADED)
                        <span class="p-2 mx-3 text-xs text-white bg-success-light">
                            {{ ucfirst($paymentEnums::UPLOADED->value) }}
                        </span>
                    @elseif($order->payment_status == $paymentEnums::VERIFIED)
                        <span class="p-2 mx-3 text-xs text-white bg-success-dark">
                            {{ ucfirst($paymentEnums::VERIFIED->value) }}
                        </span>
                    @elseif($order->payment_status == $paymentEnums::FAILED)
                        <span class="p-2 mx-3 text-xs text-white bg-accent-darker">
                            {{ ucfirst($paymentEnums::FAILED->value) }}
                        </span>
                    @endif
                </div>

            </div>
            <p class="mx-3 text-gray-600">Dipesan pada {{ $order->created_at->format('d M Y') }}</p>
            <div class="flex flex-wrap -mx-2">
                @foreach ($order->products as $product)
                    <div class="w-full px-2 mb-4 md:w-1/2 lg:w-1/3">
                        <div class="flex bg-white rounded shadow-lg">
                            <div class="w-full p-4">
                                <div class="flex justify-between">
                                    <h2 class="text-xl font-bold">{{ $product->name }}</h2>
                                </div>

                                <p class="mx-3 text-gray-600">Harga:
                                    {{ 'Rp. ' . number_format($product->price, 0, ',', '.') }}
                                </p>
                            </div>
                            <img src="{{ $product->image() }}" class="flex-shrink-0 object-cover rounded-lg"
                                style="max-width: 25%; max-height: 25%;" alt="Image">
                        </div>
                    </div>
                @endforeach
                @foreach ($order->services as $service)
                    <div class="w-full px-2 mb-4 md:w-1/2 lg:w-1/3">
                        <div class="flex bg-white rounded shadow-lg">
                            <div class="w-full p-4">
                                <div class="flex justify-between">
                                    <h2 class="text-xl font-bold">{{ $service->name }}</h2>
                                </div>

                                <p class="mx-3 text-gray-600">
                                    Kuantitas: {{ $service->pivot->quantity }}</p>
                                </p>

                                <p class="mx-3 text-gray-600">Harga:
                                    {{ 'Rp. ' . number_format($service->price * $service->pivot->quantity, 0, ',', '.') }}
                                </p>
                            </div>
                            <img src="{{ $service->image() }}" class="flex-shrink-0 object-cover rounded-lg"
                                style="max-width: 25%; max-height: 25%;" alt="Image">
                        </div>
                    </div>
                @endforeach
                <h2 class="mt-3 mb-3 text-lg font-bold lg:mb-0">Total belanja: Rp.
                    {{ 'Rp. ' . number_format($order->total_price, 0, ',', '.') }}</h2>
                @if ($order->payment_status == $paymentEnums::PENDING && $order->order_status != $orderEnums::CANCELED)
                    <p class="mt-3">
                        Silahkan melakukan pembayaran sebelum {{ $order->created_at->addDays(1)->format('d M Y') }} ke
                        rekening berikut :
                    <ul>
                        <li>
                            <p>
                                BCA 1234567890 a/n PT. Kedai Kita
                            </p>
                        </li>
                        <li>
                            <p>
                                BNI 1234567890 a/n PT. Kedai Kita
                            </p>
                        </li>
                        <li>
                            <p>
                                Mandiri 1234567890 a/n PT. Kedai Kita
                            </p>
                        </li>
                    </ul>

                    </p>
                @endif

                @if (
                    $order->payment_status != $paymentEnums::PENDING &&
                        $order->payment_status != $paymentEnums::FAILED &&
                        $order->order_status == $orderEnums::CANCELED)
                    <a class="mt-3" style="color: rgb(185 28 28 / var(--tw-text-opacity));"
                        href="{{ route('client.about-us.index') }}">
                        *Untuk Refund mohon hubungi nomor Whatapp yang tersedia di halaman Tentang Kami
                    </a>
                @endif
                <div class="flex flex-col items-center justify-between mt-10 lg:flex-row">
                    <div class="mt-3 lg:mt-0">
                        <a class="px-4 py-2 my-3 text-white rounded btn btn--subtle lg:mr-0"
                            href="{{ route('client.orders.index') }}">
                            Kembali
                        </a>

                        @if ($order->order_status == $orderEnums::PENDING)
                            <a class="px-4 py-2 my-3 text-white rounded btn btn--accent lg:ml-3"
                                href="{{ route('client.orders.change-status', $order) }}">
                                Batalkan
                            </a>
                        @elseif($order->order_status == $orderEnums::CANCELED)
                            <a class="px-4 py-2 my-3 text-white rounded btn btn--primary lg:ml-3"
                                href="{{ route('client.orders.change-status', $order) }}">
                                Pesan Kembali
                            </a>
                        @elseif($order->order_status == $orderEnums::DELIVERED)
                            <a class="px-4 py-2 my-3 text-white rounded btn btn--primary lg:ml-3"
                                href="{{ route('client.orders.change-status', $order) }}">
                                Selesaikan Pesanan
                            </a>
                        @endif

                        <button class="px-4 py-2 my-3 text-white rounded btn btn--primary lg:ml-3"
                            aria-controls="modal-bukti">
                            {{ $order->evidence_of_payment == null ? 'Upload Bukti Pembayaran' : 'Update Bukti Pembayaran' }}
                        </button>
                        @if ($order->payment_status != $paymentEnums::PENDING)
                            <a href="{{ Storage::url($order->evidence_of_payment) }}" download>
                                <button class="px-4 py-2 my-3 rounded btn btn--primary lg:ml-3">
                                    <svg class="w-4 h-4 mr-2 fill-current" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z" />
                                    </svg>
                                    Download
                                </button>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div id="modal-bukti"
            class="flex items-center justify-center p-5 modal modal--animate-scale bg-black/90 lg:p-8 js-modal">
            <div class="w-full max-w-xl max-h-full overflow-auto rounded shadow-lg modal__content bg-floor inner-glow"
                role="alertdialog" aria-labelledby="modal-title-1" aria-describedby="modal-description-1">
                <header class="flex items-center justify-between px-5 py-3 bg-contrast-lower/50 lg:py-5 lg:px-8">
                    <h1 id="modal-title-1" class="text-lg truncate lg:text-2xl">Upload Bukti Pembayaran
                    </h1>

                    <button class="modal__close-btn modal__close-btn--inner lg:hidden js-modal__close js-tab-focus">
                        <svg class="icon w-[16px] h-[16px]" viewBox="0 0 16 16">
                            <title>Tutup Menu</title>
                            <g stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                stroke-linejoin="round" stroke-miterlimit="10">
                                <line x1="13.5" y1="2.5" x2="2.5" y2="13.5">
                                </line>
                                <line x1="2.5" y1="2.5" x2="13.5" y2="13.5">
                                </line>
                            </g>
                        </svg>
                    </button>
                </header>

                <form action="{{ route('client.orders.upload.payment-proof', $order) }}" method="post"
                    enctype="multipart/form-data">
                    <div class="px-5 py-3 lg:py-5 lg:px-8">
                        @csrf
                        @method('PATCH')
                        <div class="mb-3">
                            <label for="evidence_of_payment" class="form-label">Gambar</label>
                            <input name="evidence_of_payment" type="file" id="evidence_of_payment"
                                accept=".png,.jpg,.webp" />
                        </div>
                    </div>

                    <footer class="p-5 lg:p-8">
                        <div class="flex justify-end gap-2 lg:gap-3">
                            <button type="button" class="btn btn--subtle js-modal__close">Kembali</button>
                            <button type="submit" class="btn btn--primary">Upload</button>
                        </div>
                </form>
                </footer>
            </div>

            <button class="hidden modal__close-btn modal__close-btn--outer lg:flex js-modal__close js-tab-focus">
                <svg class="icon w-[24px] h-[24px]" viewBox="0 0 24 24">
                    <title>Tutup Menu</title>
                    <g fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <line x1="3" y1="3" x2="21" y2="21" />
                        <line x1="21" y1="3" x2="3" y2="21" />
                    </g>
                </svg>
            </button>
        </div>
    </section>
    @push('scripts')
        <script src="{{ asset('assets/plugins/dropify/js/dropify.min.js') }}"></script>

        <script>
            $(function() {
                $('#evidence_of_payment').dropify();
            });
        </script>
    @endpush
</x-app-layout>
