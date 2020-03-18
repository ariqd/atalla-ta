@extends('layouts.admint')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/css/datatables.min.css" />
@endpush

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="{{ asset('assets') }}/js/datatables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.btnDelete').on('click', function (e) {
                e.preventDefault();
                var parent = $(this).parent();

                Swal.fire({
                        title: "Apa anda yakin?",
                        text: "Data akan terhapus secara permanen!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then(function (willDelete) {
                        if (willDelete) {
                            parent.find('.formDelete').submit();
                        }
                    });
            });
        });

    </script>
@endpush

@section('content')
<div class="tb-content tb-style1">
    <div class="tb-padd-lr-30 tb-uikits-heading mb-3 mt-2">
        <h2 class="tb-uikits-title">Semua Nota Penjualan</h2>
    </div>
    <div class="container-fluid">
        @include('layouts.feedback')
        <div class="row">
            <div class="col-12">
                <div class="tb-card tb-style1">
                    <div class="tb-card-heading"></div>
                    <div class="tb-data-table tb-lock-table tb-style1">
                        <table id="tb-no-locked" class="table row-border order-column dataTable no-footer table-hover" role="grid" aria-describedby="tb-no-locked_info">
                            <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="tb-no-locked" aria-label="No: activate to sort column descending">No</th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="tb-no-locked" aria-label="Tgl Transaksi: activate to sort column descending">
                                        Tgl Transaksi
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="tb-no-locked" aria-label="No. SO: activate to sort column ascending">No. SO</th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="tb-no-locked" aria-label="Customer: activate to sort column descending">Customer</th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="tb-no-locked" aria-label="Tipe: activate to sort column descending">Tipe</th>
                                    <th class="sorting" tabindex="0" aria-controls="tb-no-locked" aria-label="Status: activate to sort column ascending">Status</th>
                                    <th class="sorting" tabindex="0" aria-controls="tb-no-locked" aria-label="Action: activate to sort column ascending">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sales as $sale)
                                    <tr role="row">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $sale->created_at->toDayDateTimeString() }}</td>
                                        <td>{{ $sale->purchase_no }}</td>
                                        <td>{{ $sale->customer->name }}</td>
                                        <td>

                                            @if($sale->customer_id == 1)
                                                Retail
                                            @else
                                                {{ $sale->customer->status }}
                                            @endif
                                        </td>
                                        <td>
                                            @if($sale->status == 'BELUM LUNAS')
                                                <span class="tb-badge tb-box-colo4">BELUM LUNAS</span>
                                            @elseif($sale->status == 'LUNAS')
                                                <span class="tb-badge tb-box-colo3">LUNAS</span>
                                            @elseif($sale->status == 'DIKIRIM')
                                                <span class="tb-badge tb-box-colo2">DIKIRIM</span>
                                            @elseif($sale->status == 'FINISH')
                                                <span class="tb-badge tb-box-colo1">FINISH</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($sale->customer_id == 1)
                                                <a href="{{ route('sales-toko.edit', $sale) }}" class="text-info mr-3">
                                                    Detail / Edit
                                                </a>
                                            @else
                                                @if($sale->status != 'FINISH')
                                                    <a href="{{ route('sales.edit', $sale) }}" class="text-primary mr-3">Ubah Status</a>
                                                @else
                                                    <a href="{{ route('sales.edit', $sale) }}" class="text-info mr-3">
                                                        Detail / Edit
                                                    </a>
                                                @endif
                                            @endif
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
</div>
@endsection
