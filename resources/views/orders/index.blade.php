<x-app-layout>
    <!-- diagonal hero -->
    <section class="-contrast-lower/50">
        <div class="w-[calc(100%_-_2.5rem)] lg:w-[calc(100%_-_4rem)] mx-auto max-w-lg md:max-w-3xl py-20 lg:py-32">
            <!-- orders.blade.php -->
            <h1 class="text-2xl font-bold mb-4">Pesanan</h1>
            <div class="flex flex-wrap mx-3">
                @foreach ($orders as $order)
                    <div class="w-full md:w-1/2 lg:w-1/3 px-2 mb-4">
                        <div class="bg-white rounded shadow-lg">
                            <div class="p-4">
                                <div class="flex justify-between">
                                    <h2 class="text-xl font-bold">Pesanan #{{ $order->uuid }}</h2>

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
                            </div>

                            <p class="text-gray-600 mx-3">Dipesan pada {{ $order->created_at->format('d M Y') }}</p>
                            <p class="text-gray-600 mx-3">Total Belanja:
                                {{ 'Rp. ' . number_format($order->total_price, 0, ',', '.') }}
                            </p>
                            <a href="{{ route('client.orders.show', $order) }}"
                                class="btn btn--primary mt-4 mx-3 my-3">Lihat Pesanan</a>
                        </div>
                    </div>
                @endforeach
            </div>
            {{ $orders->links('vendor.pagination.custom') }}


        </div>
    </section>
</x-app-layout>
