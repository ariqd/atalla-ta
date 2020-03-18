@extends('layouts.admint')

@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
    {!! $transactionsChart->script() !!}
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
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="mb-3">Produk Terlaris</h5>
                        @foreach($bestselling_products as $value)
                            <div class="form-row">
                                <div class="col-1">
                                    <p><strong>{{ $loop->iteration }}</strong></p>
                                </div>
                                <div class="col-8">
                                    <p class="mb-0"><strong>{{ $value['product']->product->name }}</strong></p>
                                    <p>{{ $value['product']->product->code }}</p>
                                </div>
                                <div class="col-3 text-right">
                                    <p class="mb-0 font-weight-bold">{{ $value['qty'] }}</p>
                                    <p>pcs</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-lg-9 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        {{-- <h5>Transaksi per Hari</h5> --}}
                        <div class="w-100">
                            {!! $transactionsChart->container() !!}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
