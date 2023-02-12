@extends('admin.layouts.master')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Pemesanan</a></li>
            <li class="breadcrumb-item">{{ $order->uuid }}</li>
            <li class="breadcrumb-item active" aria-current="page">Detail</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="container-fluid d-flex justify-content-between">
                        <div class="col-lg-6 ps-0">
                            <p class="mt-1 mb-1"><b>Pesanan #{{ $order->uuid }}</b></p>
                            <div class="d-flex">
                                {{-- <p class="mt-1 mb-1 mx-2"><b>{{ $order->payment_status }}</b></p>
                                <p class="mt-1 mb-1 mx-2"><b>{{ $order->order_status }}</b></p> --}}
                                {{-- <span class="badge bg-success text-white mx-2">
                                    {{ $order->order_status }}
                                </span>
                                <span class="badge bg-success text-white mx-2">
                                    {{ $order->payment_status }}
                                </span> --}}
                                @if ($order->order_status == $orderEnums::PENDING)
                                    <span class="badge bg-secondary text-white mx-2">
                                        {{ ucfirst($orderEnums::PENDING->value) }}
                                    </span>
                                @elseif($order->order_status == $orderEnums::PROCESSING)
                                    <span class="badge bg-info text-white mx-2">
                                        {{ ucfirst($orderEnums::PROCESSING->value) }}
                                    </span>
                                @elseif($order->order_status == $orderEnums::COURIER)
                                    <span class="badge bg-warning text-white mx-2">
                                        {{ ucfirst($orderEnums::COURIER->value) }}
                                    </span>
                                @elseif($order->order_status == $orderEnums::SHIPPING)
                                    <span class="badge bg-warning text-white mx-2">
                                        {{ ucfirst($orderEnums::SHIPPING->value) }}
                                    </span>
                                @elseif($order->order_status == $orderEnums::DELIVERED)
                                    <span class="badge bg-success text-white mx-2">
                                        {{ ucfirst($orderEnums::DELIVERED->value) }}
                                    </span>
                                @elseif($order->order_status == $orderEnums::COMPLETED)
                                    <span class="badge bg-success text-white mx-2">
                                        {{ ucfirst($orderEnums::COMPLETED->value) }}
                                    </span>
                                @elseif($order->order_status == $orderEnums::CANCELED)
                                    <span class="badge bg-danger text-white mx-2">
                                        {{ ucfirst($orderEnums::CANCELED->value) }}
                                    </span>
                                @endif

                                @if ($order->payment_status == $paymentEnums::PENDING)
                                    <span class="badge bg-secondary text-white mx-2">
                                        {{ ucfirst($paymentEnums::PENDING->value) }}
                                    </span>
                                @elseif($order->payment_status == $paymentEnums::UPLOADED)
                                    <span class="badge bg-success text-white mx-2">
                                        {{ ucfirst($paymentEnums::UPLOADED->value) }}
                                    </span>
                                @elseif($order->payment_status == $paymentEnums::VERIFIED)
                                    <span class="badge bg-success text-white mx-2">
                                        {{ ucfirst($paymentEnums::VERIFIED->value) }}
                                    </span>
                                @elseif($order->payment_status == $paymentEnums::FAILED)
                                    <span class="badge bg-danger text-white mx-2">
                                        {{ ucfirst($paymentEnums::FAILED->value) }}
                                    </span>
                                @endif
                            </div>
                            <br><br>
                            <h5 class="mt-5 mb-2 text-muted">Dikirim ke :</h5>
                            <p>{{ $order->reciever_name }},<br> {{ $order->reciever_address }},<br>
                                {{ $order->reciever_phone }}.</p>
                        </div>
                        <div class="col-lg-3 pe-0">
                            <div class="mt-4 mb-2"></div>
                            <div class="mb-5 pb-4"></div>
                            <p class="text-end mb-1">Total Belanja</p>
                            <h4 class="text-end fw-normal">
                                {{ 'Rp. ' . number_format($order->total_price, 0, ',', '.') }}
                            </h4>
                            <h6 class="mb-0 mt-3 text-end fw-normal mb-2">
                                <span class="text-muted">
                                    Tanggal Pemesanan :
                                </span>
                                {{ $order->created_at->format('d M Y') }}
                            </h6>
                            <h6 class="text-end fw-normal"><span class="text-muted">Due Date :</span> 12th Jul 2020</h6>
                        </div>
                    </div>
                    <div class="container-fluid mt-5 d-flex justify-content-center w-100">
                        <div class="table-responsive w-100">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Kode</th>
                                        <th>Nama Barang</th>
                                        <th class="text-end">Kuantitas</th>
                                        <th class="text-end">Harga</th>
                                        <th class="text-end">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order->products as $item)
                                        <tr class="text-end">
                                            <td class="text-start">{{ $item->slug }}</td>
                                            <td class="text-start">{{ $item->name }}</td>
                                            <td>{{ $item->pivot->quantity }}</td>
                                            <td>
                                                {{ 'Rp. ' . number_format($item->price, 0, ',', '.') }}
                                            </td>
                                            <td>
                                                {{ 'Rp. ' . number_format($item->price * $item->pivot->quantity, 0, ',', '.') }}
                                            </td>
                                        </tr>
                                    @endforeach
                                    @foreach ($order->services as $item)
                                        <tr class="text-end">
                                            <td class="text-start">{{ $item->slug }}</td>
                                            <td class="text-start">{{ $item->name }}</td>
                                            <td>{{ $item->pivot->quantity }}</td>
                                            <td>
                                                {{ 'Rp. ' . number_format($item->price, 0, ',', '.') }}
                                            </td>
                                            <td>
                                                {{ 'Rp. ' . number_format($item->price * $item->pivot->quantity, 0, ',', '.') }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="container-fluid mt-5 w-100">
                        <div class="row">
                            <div class="col-md-6 ms-auto">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td class="text-bold-800">
                                                    Total Belanja
                                                    <small class="text-danger">*jika total harga tidak sesuai dengan data table maka ada data yang dihapus!</small>
                                                </td>
                                                <td class="text-bold-800 text-end">
                                                    {{ 'Rp. ' . number_format($order->total_price, 0, ',', '.') }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Bukti Pembayaran</td>
                                                <td class="text-danger text-end">
                                                    @if ($order->evidence_of_payment != null)
                                                        <a href="{{ Storage::url($order->evidence_of_payment) }}"
                                                            target="_blank">
                                                            <button type="button"
                                                                class="btn btn-sm btn-primary btn-icon-text">
                                                                <i class="btn-icon-prepend" data-feather="download"></i>
                                                                Download
                                                            </button>
                                                        </a>
                                                    @else
                                                        <button type="button" class="btn btn-sm btn-danger btn-icon-text">
                                                            <i class="btn-icon-prepend" data-feather="x"></i>
                                                            Tidak ada
                                                        </button>
                                                    @endif
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid w-100">
                        <h5>Ubah Status Pemesanan</h5>
                        <form id="change-order-status-{{ $order->uuid }}"
                            action="{{ route('admin.orders.change-order-status', $order) }}" method="post">
                            @csrf
                            @method('patch')
                            <select class="form-select form-select-sm mb-3" name="order_status"
                                onchange="
                                if(confirm('Apakah anda yakin ingin mengubah status pemesanan ini?')) {
                                    event.preventDefault();
                                    document.getElementById('change-order-status-{{ $order->uuid }}').submit();
                                } else {
                                    event.preventDefault();
                                }
                            ">
                                @foreach ($orderEnums::cases() as $enum)
                                    @if ($order->services()->count() < 1 && $enum == $orderEnums::COURIER)
                                        @continue
                                    @endif
                                    <option value="{{ $enum }}"
                                        {{ $order->order_status == $enum ? 'selected' : '' }}>
                                        {{ $enum }}</option>
                                @endforeach
                            </select>
                        </form>
                        <h5>Ubah Status Pembayaran</h5>
                        <form id="change-payment-status-{{ $order->uuid }}"
                            action="{{ route('admin.orders.change-payment-status', $order) }}" method="post">
                            @csrf
                            @method('patch')
                            <select class="form-select form-select-sm mb-3" name="payment_status"
                                onchange="
                                                    if(confirm('Apakah anda yakin ingin mengubah status pembayaran ini?')) {
                                                        event.preventDefault();
                                                        document.getElementById('change-payment-status-{{ $order->uuid }}').submit();
                                                    } else {
                                                        event.preventDefault();
                                                    }
                                                ">
                                @foreach ($paymentEnums::cases() as $enum)
                                    <option value="{{ $enum }}"
                                        {{ $order->payment_status == $enum ? 'selected' : '' }}>
                                        {{ $enum }}</option>
                                @endforeach
                            </select>
                        </form>
                        <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
