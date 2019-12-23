@extends('layouts.admint')

@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/css/datatables.min.css" />
@endpush

@push('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="{{ asset('assets') }}/js/datatables.min.js"></script>
<script>
    $(document).ready(function () {
        $('.btnDelete').on('click', function (e) {
            e.preventDefault();
            var parent = $(this).parent();

            Swal.fire({
                    title: "Apa anda yakin?",
                    text: "Data akan terhapus secara permanen!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then(function (willDelete) {
                    if (willDelete) {
                        parent.find('.formDelete').submit();
                    }
                });
        });
    });

</script>
@endpush

@section('content')
<div class="tb-content tb-style1">
    <div class="tb-padd-lr-30 tb-uikits-heading mb-3 mt-2">
        <h2 class="tb-uikits-title">Sales</h2>
        <a href="{{ route('sales.create') }}" class="btn btn-success btn-sm">Tambah</a>
    </div>
    <div class="container-fluid">
        @include('layouts.feedback')
        <div class="row">
            <div class="col-12">
            </div>
        </div>
    </div>
</div>
@endsection