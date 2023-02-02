<x-app-layout>
    @push('styles')
        <link href="{{ asset('assets/dropify/css/dropify.min.css') }}" rel="stylesheet" />
    @endpush
    <!-- diagonal hero -->
    <section class="-contrast-lower/50">

        <div class="w-[calc(100%_-_2.5rem)] lg:w-[calc(100%_-_4rem)] mx-auto max-w-lg md:max-w-3xl py-20 lg:py-32">
            <!-- orders.blade.php -->
            <div class="flex justify-between">
                <h1 class="text-2xl font-bold mb-4">Pesanan #{{ $order->uuid }}</h1>
                <div>
                    @if ($order->order_status == $orderEnums::PENDING)
                        <span class="mx-3 bg-primary-lighter text-white p-2 text-xs">
                            {{ ucfirst($orderEnums::PENDING->value) }}
                        </span>
                    @elseif($order->order_status == $orderEnums::PROCESSING)
                        <span class="mx-3 bg-warning-dark text-white p-2 text-xs">
                            {{ ucfirst($orderEnums::PROCESSING->value) }}
                        </span>
                    @elseif($order->order_status == $orderEnums::COURIER)
                        <span class="mx-3 bg-success-lighter text-white p-2 text-xs">
                            {{ ucfirst($orderEnums::COURIER->value) }}
                        </span>
                    @elseif($order->order_status == $orderEnums::SHIPPING)
                        <span class="mx-3 bg-success-lighter text-white p-2 text-xs">
                            {{ ucfirst($orderEnums::SHIPPING->value) }}
                        </span>
                    @elseif($order->order_status == $orderEnums::DELIVERED)
                        <span class="mx-3 bg-success-dark text-white p-2 text-xs">
                            {{ ucfirst($orderEnums::DELIVERED->value) }}
                        </span>
                    @elseif($order->order_status == $orderEnums::COMPLETED)
                        <span class="mx-3 bg-success-darker text-white p-2 text-xs">
                            {{ ucfirst($orderEnums::COMPLETED->value) }}
                        </span>
                    @elseif($order->order_status == $orderEnums::CANCELED)
                        <span class="mx-3 bg-accent-dark text-white p-2 text-xs">
                            {{ ucfirst($orderEnums::CANCELED->value) }}
                        </span>
                    @endif

                    @if ($order->payment_status == $paymentEnums::PENDING)
                        <span class="mx-3 bg-accent-dark text-white p-2 text-xs">
                            {{ ucfirst($paymentEnums::PENDING->value) }}
                        </span>
                    @elseif($order->payment_status == $paymentEnums::UPLOADED)
                        <span class="mx-3 bg-success-light text-white p-2 text-xs">
                            {{ ucfirst($paymentEnums::UPLOADED->value) }}
                        </span>
                    @elseif($order->payment_status == $paymentEnums::VERIFIED)
                        <span class="mx-3 bg-success-dark text-white p-2 text-xs">
                            {{ ucfirst($paymentEnums::VERIFIED->value) }}
                        </span>
                    @elseif($order->payment_status == $paymentEnums::FAILED)
                        <span class="mx-3 bg-accent-darker text-white p-2 text-xs">
                            {{ ucfirst($paymentEnums::FAILED->value) }}
                        </span>
                    @endif
                </div>

            </div>
            <p class="text-gray-600 mx-3">Dipesan pada {{ $order->created_at->format('d M Y') }}</p>
            <div class="flex flex-wrap -mx-2">
                @foreach ($order->products as $product)
                    <div class="w-full md:w-1/2 lg:w-1/3 px-2 mb-4">
                        <div class="bg-white rounded shadow-lg flex">
                            <div class="p-4 w-full">
                                <div class="flex justify-between">
                                    <h2 class="text-xl font-bold">{{ $product->name }}</h2>
                                </div>

                                <p class="text-gray-600 mx-3">Harga:
                                    {{ 'Rp. ' . number_format($product->price, 0, ',', '.') }}
                                </p>
                            </div>
                            <img src="{{ $service->image() }}" class="flex-shrink-0 object-cover rounded-lg"
                                style="max-width: 25%; max-height: 25%;" alt="Image">
                        </div>
                    </div>
                @endforeach
                @foreach ($order->services as $service)
                    <div class="w-full md:w-1/2 lg:w-1/3 px-2 mb-4">
                        <div class="bg-white rounded shadow-lg flex">
                            <div class="p-4 w-full">
                                <div class="flex justify-between">
                                    <h2 class="text-xl font-bold">{{ $service->name }}</h2>
                                </div>

                                <p class="text-gray-600 mx-3">Harga:
                                    {{ 'Rp. ' . number_format($service->price, 0, ',', '.') }}
                                </p>
                            </div>
                            <img src="{{ $service->image() }}" class="flex-shrink-0 object-cover rounded-lg"
                                style="max-width: 25%; max-height: 25%;" alt="Image">
                        </div>
                    </div>
                @endforeach
                <h2 class="text-lg font-bold mb-3 mt-3 lg:mb-0">Total belanja: Rp.
                    {{ 'Rp. ' . number_format($order->total_price, 0, ',', '.') }}</h2>
                @if ($order->payment_status == $paymentEnums::PENDING)
                    <p class="text-gray-600 mx-3">Silahkan melakukan pembayaran sebelum
                        {{ $order->created_at->addDays(1)->format('d M Y') }}</p>
                @endif
                <div class="mt-10 flex flex-col lg:flex-row justify-between items-center">
                    <div class="mt-3 lg:mt-0">
                        <a class="btn btn--subtle text-white py-2 px-4 rounded mr-3 my-3"
                            href="{{ route('client.orders.index') }}">Kembali</a>
                        <a class="btn btn--{{ $order->order_status == $orderEnums::PENDING ? 'accent' : 'primary' }} text-white py-2 px-4 rounded mr-3 my-3"
                            href="{{ route('client.orders.change-status', $order) }}">{{ $order->order_status == $orderEnums::PENDING ? 'Batalkan' : 'Pesan Kembali' }}</a>

                        <button class="btn btn--primary text-white py-2 px-4 rounded my-3"
                            aria-controls="modal-bukti">{{ $order->evidence_of_payment == null ? 'Upload Bukti Pembayaran' : 'Update Bukti Pembayaran' }}</button>
                        <a href="{{ Storage::url($order->evidence_of_payment) }}" download>
                            <button
                                class="btn btn--primary py-2 px-4 rounded my-3">
                                <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z" />
                                </svg>
                                Download
                            </button>
                        </a>


                        <div id="modal-bukti"
                            class="modal modal--animate-scale flex justify-center items-center bg-black/90 p-5 lg:p-8 js-modal">
                            <div class="modal__content w-full max-w-xl max-h-full overflow-auto bg-floor rounded inner-glow shadow-lg"
                                role="alertdialog" aria-labelledby="modal-title-1"
                                aria-describedby="modal-description-1">
                                <header
                                    class="bg-contrast-lower/50 py-3 lg:py-5 px-5 lg:px-8 flex items-center justify-between">
                                    <h1 id="modal-title-1" class="truncate text-lg lg:text-2xl">Upload Bukti Pembayaran
                                    </h1>

                                    <button
                                        class="modal__close-btn modal__close-btn--inner lg:hidden js-modal__close js-tab-focus">
                                        <svg class="icon w-[16px] h-[16px]" viewBox="0 0 16 16">
                                            <title>Tutup Menu</title>
                                            <g stroke-width="2" stroke="currentColor" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10">
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
                                    <div class="py-3 lg:py-5 px-5 lg:px-8">
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
                                            <button type="button"
                                                class="btn btn--subtle js-modal__close">Kembali</button>
                                            <button type="submit" class="btn btn--primary">Upload</button>
                                        </div>
                                </form>
                                </footer>
                            </div>

                            <button
                                class="modal__close-btn modal__close-btn--outer hidden lg:flex js-modal__close js-tab-focus">
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


                    </div>
                </div>
            </div>
        </div>

    </section>
    @push('scripts')
        <script src="{{ asset('assets/js/jquery.js') }}"></script>
        <script src="{{ asset('assets/dropify/js/dropify.min.js') }}"></script>

        <script>
            $(function() {
                $('#evidence_of_payment').dropify();
            });
        </script>
    @endpush
</x-app-layout>
