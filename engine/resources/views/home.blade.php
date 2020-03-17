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
                                <h4>{{ $sales_count }}</h4>
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
                        <h5>Produk Terlaris</h5>

                        <div class="form-row py-1">
                            <div class="col-1">
                                <p><strong>1</strong></p>
                            </div>
                            <div class="col-8">
                                <p class="mb-0"><strong>Nama Produk</strong></p>
                                <p>GA-121</p>
                            </div>
                            <div class="col-3 text-right">
                                <p class="mb-0 font-weight-bold">121</p>
                                <p>pcs</p>
                            </div>
                        </div>

                        <div class="form-row py-1">
                            <div class="col-1">
                                <p><strong>2</strong></p>
                            </div>
                            <div class="col-8">
                                <p class="mb-0"><strong>Nama Produk</strong></p>
                                <p>GA-121</p>
                            </div>
                            <div class="col-3 text-right">
                                <p class="mb-0 font-weight-bold">121</p>
                                <p>pcs</p>
                            </div>
                        </div>

                        <div class="form-row py-2">
                            <div class="col-1">
                                <strong>1</strong>
                            </div>
                            <div class="col-8">
                                <h5 class="mb-0">Nama Produk</h5>
                                <p>GA-121</p>
                            </div>
                            <div class="col-3 text-right">
                                <h5 class="mb-0">121</h5>
                                <p>pcs</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h5>Grafik Transaksi per Hari</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
