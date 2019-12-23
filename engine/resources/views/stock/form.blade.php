@extends('layouts.admint')

@push('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@push('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function () {
        $('.select2').select2();
    });

</script>
@endpush

@section('content')
<div class="tb-content tb-style1">
    <div class="tb-padd-lr-30 tb-uikits-heading mb-3 mt-2">
        <h2 class="tb-uikits-title">
            {{ @$stock ? 'Edit Stok: ' . $stock->product->code . ' - ' . $stock->color : 'Tambah Stok' }} </h2>
        <a href="{{ url('stocks') }}" class="btn btn-danger btn-sm">Kembali</a>
    </div>
    <div class="container-fluid">
        @include('layouts.feedback')
        <div class="row">
            <div class="col-12">
                <form action="{{ @$stock ? route('stocks.update', $stock) : route('stocks.store') }}" method="POST">
                    @csrf
                    {{ @$stock ? method_field('PUT') : '' }}
                    <div class="form-group">
                        <label for="products">Produk</label>
                        <select class="form-control select2" name="product_id" id="products">
                            <option value="" selected disabled>- Pilih Produk -</option>
                            @foreach ($products as $product)
                            <option value="{{ $product->id }}"
                                {{ @$stock->product_id == $product->id ? 'selected' : '' }}>
                                {{ $product->code }} - {{ $product->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="sizes">Size</label>
                        <select class="form-control select2" name="size" id="sizes">
                            <option value="" selected disabled>- Pilih Size -</option>
                            @foreach ($sizes as $size)
                            <option value="{{ $size }}" {{ @$stock->size == $size ? 'selected' : '' }}>
                                {{ $size }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="color">Warna</label>
                        <select class="form-control select2" name="color" id="color">
                            <option value="" selected disabled>- Pilih Warna -</option>
                            @foreach ($colors as $color)
                            <option value="{{ $color }}" {{ @$stock->color == $color ? 'selected' : '' }}>
                                {{ $color }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="qty">Jumlah</label>
                        <input type="number" class="form-control" id="qty" name="qty" placeholder="Jumlah produk"
                            autofocus value="{{ @$stock ? $stock->qty : '' }}" min="1">
                    </div>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </form>
            </div>
        </div>
    </div>
    @include('layouts.footer')
</div>
@endsection
