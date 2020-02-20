@extends('layouts.admint')

@section('content')
<div class="tb-content tb-style1">
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
                                <h3 class="tb-iconbox-heading">{{ $sales_count }}</h3>
                                <div class="tb-iconbox-sub-heading">Penjualan bulan ini</div>
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
                                <h3 class="tb-iconbox-heading">Rp {{ number_format($revenue, 0, ',', '.') }}</h3>
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
                                <h3 class="tb-iconbox-heading">{{ $products_sold }}</h3>
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
                                <h3 class="tb-iconbox-heading">{{ $needs_restock }}</h3>
                                <div class="tb-iconbox-sub-heading">Produk perlu di restock</div>
                                <div class="tb-height-b25 tb-height-lg-b25"></div>
                                <hr />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--  --}}
</div>
@endsection
