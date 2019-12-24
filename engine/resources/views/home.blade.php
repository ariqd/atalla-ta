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
                            {{-- <div class="tb-icon tb-icon-color1 tb-radious50 tb-flex">
                                <i class="material-icons-outlined">supervisor_account</i>
                            </div> --}}
                            <div class="tb-iconbox-text">
                                <h3 class="tb-iconbox-heading">10</h3>
                                <div class="tb-iconbox-sub-heading">Pembelian bulan ini</div>
                                <div class="tb-height-b25 tb-height-lg-b25"></div>
                                <hr />
                                {{-- <div class="tb-progress-lavel tb-style1 tb-success-color">
                                    <i class="material-icons-outlined">arrow_drop_up</i>5.5%
                                </div> --}}
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
                            {{-- <div class="tb-icon tb-icon-color2 tb-radious50 tb-flex">
                                <i class="material-icons-outlined">store</i>
                            </div> --}}
                            <div class="tb-iconbox-text">
                                <h3 class="tb-iconbox-heading">6.2k</h3>
                                <div class="tb-iconbox-sub-heading">Revenue</div>
                                <div class="tb-height-b25 tb-height-lg-b25"></div>
                                <hr />
                                {{-- <div class="tb-progress-lavel tb-style1 tb-style1 tb-success-color">
                                    <i class="material-icons-outlined">arrow_drop_up</i>5.5%
                                </div> --}}
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
                            {{-- <div class="tb-icon tb-icon-color3 tb-radious50 tb-flex">
                                <i class="material-icons-outlined">flag</i>
                            </div> --}}
                            <div class="tb-iconbox-text">
                                <h3 class="tb-iconbox-heading">300</h3>
                                <div class="tb-iconbox-sub-heading">Produk Terjual</div>
                                <div class="tb-height-b25 tb-height-lg-b25"></div>
                                <hr />
                                {{-- <div class="tb-progress-lavel tb-style1 tb-danger-color">
                                    <i class="material-icons-outlined">arrow_drop_down</i>5.5%
                                </div> --}}
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
                            {{-- <div class="tb-icon tb-icon-color4 tb-radious50 tb-flex">
                                <i class="material-icons-outlined">cloud</i>
                            </div> --}}
                            <div class="tb-iconbox-text">
                                <h3 class="tb-iconbox-heading">3</h3>
                                <div class="tb-iconbox-sub-heading">Produk perlu di restock</div>
                                <div class="tb-height-b25 tb-height-lg-b25"></div>
                                <hr />
                                {{-- <div class="tb-progress-lavel tb-style1 tb-success-color">
                                    <i class="material-icons-outlined">arrow_drop_up</i>5.5%
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- .col -->
        </div>
        <!-- .row -->
    </div>
    <!-- .container-fluid -->
    @include('layouts.footer')
</div>
@endsection
