<h5 class="text-info">Edit Stok</h5>
<form action="{{ route('products.update.stock', $product) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group row">
        <label for="color" class="col-form-label col-4">Warna</label>
        <div class="col-lg-8">
            <input type="text" class="form-control" name="color" id="color" readonly value="{{ request()->get('edit') }}">
        </div>
    </div>
    <div class="form-group row">
        <label for="size_xs" class="col-form-label col-4">Qty Size XS</label>
        <div class="col-8">
            <input type="text" class="form-control" name="size[xs]" id="size_xs" value="{{ $edit['XS'][0]['qty'] }}">
        </div>
        <label for="size_xs_hold" class="col-form-label col-4">Hold XS</label>
        <div class="col-8">
            <input type="text" class="form-control" name="hold[xs]" id="size_xs_hold" value="{{ $edit['XS'][0]['qty_hold'] }}">
        </div>
    </div>
    <hr>
    <div class="mt-3 form-group row">
        <label for="size_s" class="col-form-label col-4">Qty Size S</label>
        <div class="col-8">
            <input type="text" class="form-control" name="size[s]" id="size_s" value="{{ $edit['S'][0]['qty'] }}">
        </div>
        <label for="size_s_hold" class="col-form-label col-4">Hold S</label>
        <div class="col-8">
            <input type="text" class="form-control" name="hold[s]" id="size_s_hold" value="{{ $edit['S'][0]['qty_hold'] }}">
        </div>
    </div>
    <hr>
    <div class="mt-3 form-group row">
        <label for="size_m" class="col-form-label col-4">Qty Size M</label>
        <div class="col-8">
            <input type="text" class="form-control" name="size[m]" id="size_m" value="{{ $edit['M'][0]['qty'] }}">
        </div>
        <label for="size_m_hold" class="col-form-label col-4">Hold M</label>
        <div class="col-8">
            <input type="text" class="form-control" name="hold[m]" id="size_m_hold" value="{{ $edit['S'][0]['qty_hold'] }}">
        </div>
    </div>
    <hr>
    <div class="mt-3 form-group row">
        <label for="size_l" class="col-form-label col-4">Qty Size L</label>
        <div class="col-8">
            <input type="text" class="form-control" name="size[l]" id="size_l" value="{{ $edit['L'][0]['qty'] }}">
        </div>
        <label for="size_l_hold" class="col-form-label col-4">Hold L</label>
        <div class="col-8">
            <input type="text" class="form-control" name="hold[l]" id="size_l_hold" value="{{ $edit['L'][0]['qty_hold'] }}">
        </div>
    </div>
    <hr>
    <div class="mt-3 form-group row">
        <label for="size_xl" class="col-form-label col-4">Qty Size XL</label>
        <div class="col-8">
            <input type="text" class="form-control" name="size[xl]" id="size_xl" value="{{ $edit['XL'][0]['qty'] }}">
        </div>
        <label for="size_xl_hold" class="col-form-label col-4">Hold XL</label>
        <div class="col-8">
            <input type="text" class="form-control" name="hold[xl]" id="size_xl_hold" value="{{ $edit['XL'][0]['qty_hold'] }}">
        </div>
    </div>
    <button type="submit" class="btn btn-info">Submit</button>
    <a href="{{ url('products/'.$product->id) }}" role="button" class="btn btn-link float-right">Kembali ke Tambah Stok</a>
</form>
