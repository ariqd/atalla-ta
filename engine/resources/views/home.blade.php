@extends('layouts.admint')

@push('css')
    <style>
        a.active {
            color: #5856d6;
            font-weight: bold;
        }

    </style>
@endpush

@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
    {!! $transactionsChart->script() !!}
    {!! $productsBarChart->script() !!}
@endpush

@section('content')
<div class="tb-content tb-style1 pb-5">
    <div class="tb-height-b30 tb-height-lg-b30"></div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="tb-sectin-heading tb-style1">
                    <div class="tb-sectin-heading-left">
                        <h2 class="tb-section-title">Dashboard</h2>
                    </div>
                </div>
                <div class="tb-height-b10 tb-height-lg-b10"></div>
                <hr />
            </div>
        </div>
        <div class="tb-height-b30 tb-height-lg-b30"></div>
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="tb-card tb-style1 text-center">
                    <div class="tb-card-body">
                        <div class="tb-height-b30 tb-height-lg-b30"></div>
                        <div class="tb-iconbox tb-style1">
                            <div class="tb-iconbox-text">
                                <h4>{{ $sales_count }}</h4>
                                <div class="tb-iconbox-sub-heading">Transaksi finish bulan ini</div>
                                <div class="tb-height-b25 tb-height-lg-b25"></div>
                                <hr />
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- .col -->
            <div class="col-lg-3 col-sm-6">
                <div class="tb-card tb-style1 text-center">
                    <div class="tb-card-body">
                        <div class="tb-height-b30 tb-height-lg-b30"></div>
                        <div class="tb-iconbox tb-style1">
                            <div class="tb-iconbox-text">
                                <h4>Rp {{ number_format($revenue, 0, ',', '.') }}</h4>
                                <div class="tb-iconbox-sub-heading">Revenue</div>
                                <div class="tb-height-b25 tb-height-lg-b25"></div>
                                <hr />
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- .col -->
            <div class="col-lg-3 col-sm-6">
                <div class="tb-card tb-style1 text-center">
                    <div class="tb-card-body">
                        <div class="tb-height-b30 tb-height-lg-b30"></div>
                        <div class="tb-iconbox tb-style1">
                            <div class="tb-iconbox-text">
                                <h4>{{ $products_sold }}</h4>
                                <div class="tb-iconbox-sub-heading">Produk Terjual</div>
                                <div class="tb-height-b25 tb-height-lg-b25"></div>
                                <hr />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- .col -->
            <div class="col-lg-3 col-sm-6">
                <div class="tb-card tb-style1 text-center">
                    <div class="tb-card-body">
                        <div class="tb-height-b30 tb-height-lg-b30"></div>
                        <div class="tb-iconbox tb-style1">
                            <div class="tb-iconbox-text">
                                <h4>{{ $needs_restock }}</h4>
                                <div class="tb-iconbox-sub-heading">Produk perlu di restock</div>
                                <div class="tb-height-b25 tb-height-lg-b25"></div>
                                <hr />
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            {{-- <div class="col-6"> --}}
                            {{-- <p><strong>Grafik</strong></p> --}}
                            {{-- </div> --}}
                            <div class="col-6">
                                <div class="d-flex">
                                    <p>
                                        <a href="{{ url('/') }}" class="{{ request()->get('chart') == '' ? 'active' : '' }}">Total Revenue</a>
                                    </p>
                                    <p class="ml-3">
                                        <a href="{{ url('/?chart=jumlah-transaksi') }}" class="{{ request()->get('chart') == 'jumlah-transaksi' ? 'active' : '' }}">Jumlah Transaksi</a>
                                    </p>
                                    {{-- <p class="ml-3">
                                        <a href="{{ url('/?chart=produk-terjual') }}" class="{{ request()->get('chart') == 'produk-terjual' ? 'active' : '' }}">Produk Terjual</a>
                                    </p> --}}
                                </div>
                            </div>
                        </div>
                        @if(request()->get('chart') == 'jumlah-transaksi')
                            @include('charts.jumlah-transaksi')
                        @else
                            @include('charts.total-revenue')
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6">
                <p><strong>Produk Terlaris</strong></p>
                <div class="card">
                    <div class="card-body">
                        @foreach($bestselling_products as $value)
                            <div class="form-row">
                                <div class="col-1">
                                    <p><strong>{{ $loop->iteration }}</strong></p>
                                </div>
                                <div class="col-7">
                                    <p class="mb-0"><strong>{{ $value['stock']->product->name }}</strong></p>
                                    <p>{{ $value['stock']->product->code }} | {{ $value['stock']->size }}</p>
                                </div>
                                <div class="col-4 text-right">
                                    <p class="mb-0 font-weight-bold">{{ $value['qty'] }}</p>
                                    <p>pcs</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-lg-9 col-md-12">
                <div class="card">
                    <div class="card-body">
                        {!! $productsBarChart->container() !!}
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
