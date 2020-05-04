@extends('layouts.admint')

@push('css')
    <style>
        .link-hover:hover {
            /* color: #5E35B1 !important; */
            background-color: #EDE7F6;
        }

    </style>
    {{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" /> --}}
@endpush

@push('js')
    {{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/cleave.js@1.5.7/dist/cleave.min.js"></script> --}}

    <script>
        $(document).ready(function () {
            // $('.select2').select2();
        });

    </script>
@endpush

@section('content')
<div class="tb-content tb-style1">
    <div class="tb-padd-lr-30 tb-uikits-heading mb-3 mt-2">
        <h2 class="tb-uikits-title">Stok {{ $product->code }} {{ $product->name }}</h2>
        <a href="{{ url('products') }}" class="btn btn-secondary btn-sm">Kembali</a>
    </div>
    <div class="container-fluid">
        @include('layouts.feedback')
        <div class="row">
            <div class="col-4">
                @if(request()->get('edit'))
                    @include('product.stock-edit')
                @else
                    @include('product.stock-form')
                @endif
            </div>
            <div class="col-8">
                @forelse($colors as $color)
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-2">
                                    <h5>{{ $color['color'] }}</h5>
                                    <a href="{{ url('products/'.$product->id.'?edit='.$color['color']) }}" class="text-info">Edit</a>
                                </div>
                                @foreach($sizes as $size)
                                    @php
                                        $qty = $product->stocks()->where([
                                        'color' => $color,
                                        'size' => $size
                                        ])->first()->qty;

                                        $qty_hold = $product->stocks()->where([
                                        'color' => $color,
                                        'size' => $size
                                        ])->first()->qty_hold;                                        

                                        $safety = $product->stocks()->where([
                                        'color' => $color,
                                        'size' => $size
                                        ])->first()->safety;
                                    @endphp
                                    <div class="col-2 text-center">
                                        <div>
                                            <h5 class="{{ $qty < $qty_hold ? 'text-danger' : ($qty <= $safety ? 'text-warning' : '') }}">
                                                {{ $size }}
                                            </h5>
                                            <p class="mb-0">
                                                <span title="Qty" class="{{ $qty < $qty_hold ? 'text-danger' : ($qty <= $safety ? 'text-warning' : 'text-success') }}">{{ $qty }}</span> 
                                                | <span title="Safety Stock">{{ $safety }}</span>
                                                | <span title="Hold Qty">{{ $qty_hold }}</span>
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="card">
                        <div class="card-body">
                            <p class="text-center text-muted">Produk ini belum memiliki Stok</p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
