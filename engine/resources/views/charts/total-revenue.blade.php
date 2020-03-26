<div class="row">
    <div class="col-6">
        <div class="d-flex">
            <p>
                <a href="{{ url('/') }}" class="{{ request()->get('period') == '' ? 'active' : '' }}">Per Hari</a>
            </p>
            <p class="ml-3">
                <a href="{{ url('/?period=monthly') }}" class="{{ request()->get('period') == 'monthly' ? 'active' : '' }}">Per Bulan</a>
            </p>
        </div>
    </div>
</div>
<div class="w-100">
    {!! $transactionsChart->container() !!}
</div>
