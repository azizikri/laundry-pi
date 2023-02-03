@extends('admin.layouts.master')

@push('plugin-styles')
    <link href="{{ asset('admin/assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Pemesanan</a></li>
            <li class="breadcrumb-item active" aria-current="page">Indeks</li>
        </ol>
    </nav>

    <div class="row">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <h6 class="card-title my-3">Pemesanan</h6>
                    </div>
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>Pesanan</th>
                                    <th>Bukti Pembayaran</th>
                                    <th>Status Pemesanan</th>
                                    <th>Status Pembayaran</th>
                                    <th>Total Harga</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ str()->of($order->uuid)->limit(10) }}</td>
                                        <td>
                                            @if ($order->evidence_of_payment != null)
                                                <a href="{{ Storage::url($order->evidence_of_payment) }}" target="_blank">
                                                    <button type="button" class="btn btn-sm btn-primary btn-icon-text">
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
                                        <td>
                                            <form id="change-order-status-{{ $order->uuid }}"
                                                action="{{ route('admin.orders.change-order-status', $order) }}"
                                                method="post">
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
                                                        @if ($order->services()->count() < 1 && $enum == $orderEnums::COURIER )
                                                            @continue
                                                        @endif
                                                        <option value="{{ $enum }}"
                                                            {{ $order->order_status == $enum ? 'selected' : '' }}>
                                                            {{ $enum }}</option>
                                                    @endforeach
                                                </select>
                                            </form>
                                        </td>

                                        <td>
                                            <form id="change-payment-status-{{ $order->uuid }}"
                                                action="{{ route('admin.orders.change-payment-status', $order) }}"
                                                method="post">
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
                                        </td>

                                        <td>{{ 'Rp. ' . number_format($order->total_price, 0, ',', '.') }}</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <a href="{{ route('admin.orders.show', $order) }}">
                                                    <button type="button"
                                                        class="btn btn-sm btn-primary btn-icon-text mx-3">
                                                        <i class="btn-icon-prepend" data-feather="eye"></i>
                                                        Lihat Detail
                                                    </button>
                                                </a>
                                                <button type="button" class="mr-2 btn btn-sm btn-danger btn-icon-text"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#deleteModal{{ $order->id }}">
                                                    <i class=" btn-icon-prepend" data-feather="trash"></i>
                                                    Hapus
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('plugin-scripts')
    <script src="{{ asset('admin/assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/datatables-net-bs5/dataTables.bootstrap5.js') }}"></script>
@endpush

@push('custom-scripts')
    <script src="{{ asset('admin/assets/js/data-table.js') }}"></script>
@endpush
@foreach ($orders as $order)
    <div class="modal fade" id="deleteModal{{ $order->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus "{{ $order->uuid }}" ?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                </div>
                <div class="modal-body">
                    Yakin ingin menghapus Pemesanan "{{ $order->uuid }}" ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                    <form id="delete-order-{{ $order->id }}"
                        action="{{ route('admin.orders.destroy', $order) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger btn-icon-text">
                            <i class="btn-icon-prepend" data-feather="trash"></i>
                            Hapus Pemesanan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
