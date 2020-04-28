<div class="row">
    <div class="col-6">
        <div class="d-flex">
            <p>
                <a href="{{ url('/?m='.request()->get('m').'&y='.request()->get('y')) }}" class="{{ request()->get('chart') == '' ? 'active' : '' }}">Total Revenue</a>
            </p>
            <p class="ml-3">
                <a href="{{ url('/?chart=jumlah-transaksi&m='.request()->get('m').'&y='.request()->get('y')) }}" class="{{ request()->get('chart') == 'jumlah-transaksi' ? 'active' : '' }}">Jumlah Transaksi</a>
            </p>
        </div>
    </div>
    <div class="col-6">
        <div class="d-flex justify-content-end">
            <p>
                <a href="{{ url('?m='.request()->get('m').'&y='.request()->get('y')) }}" class="{{ request()->get('period') == '' ? 'active' : '' }}">Per Hari</a>
            </p>
            <p class="ml-3">
                <a href="{{ url('/?period=monthly&m='.request()->get('m').'&y='.request()->get('y')) }}" class="{{ request()->get('period') == 'monthly' ? 'active' : '' }}">Per Bulan</a>
            </p>
        </div>
    </div>
</div>
<div class="w-100">
    {!! $data['transactionsChart']->container() !!}
</div>
