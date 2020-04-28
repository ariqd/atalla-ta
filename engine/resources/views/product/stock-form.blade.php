<h5>Tambah Stok</h5>
<form action="{{ route('stocks.store') }}" method="POST">
    @csrf
    <input type="hidden" name="product_id" value="{{ $product->id }}">
    <div class="form-group row">
        <label for="color" class="col-form-label col-3">Warna</label>
        <div class="col-9">
            <input type="text" class="form-control" name="color" id="color" placeholder="Nama Warna" value="{{ old('color') }}">
        </div>
    </div>
    <div class="form-group row">
        <label for="size_xs" class="col-form-label col-3">Qty XS</label>
        <div class="col-3">
            <input type="text" class="form-control" name="size[xs]" id="size_xs" placeholder="XS" value="{{ old('size.xs') }}">
        </div>
    </div>
    <div class="form-group row">
        <label for="size_s" class="col-form-label col-3">Qty S</label>
        <div class="col-3">
            <input type="text" class="form-control" name="size[s]" id="size_s" placeholder="S" value="{{ old('size.s') }}">
        </div>
    </div>
    <div class="form-group row">
        <label for="size_m" class="col-form-label col-3">Qty M</label>
        <div class="col-3">
            <input type="text" class="form-control" name="size[m]" id="size_m" placeholder="M" value="{{ old('size.m') }}">
        </div>
    </div>
    <div class="form-group row">
        <label for="size_L" class="col-form-label col-3">Qty L</label>
        <div class="col-3">
            <input type="text" class="form-control" name="size[l]" id="size_L" placeholder="L" value="{{ old('size.l') }}">
        </div>
    </div>
    <div class="form-group row">
        <label for="size_xl" class="col-form-label col-3">Qty XL</label>
        <div class="col-3">
            <input type="text" class="form-control" name="size[xl]" id="size_xl" placeholder="XL" value="{{ old('size.xl') }}">
        </div>
    </div>
    <button type="submit" class="btn btn-info">Submit</button>
</form>
