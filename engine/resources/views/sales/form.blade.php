@extends('layouts.admint')

@push('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/css/datatables.min.css" />
<style>
    .no-underline,
    .no-underline:hover {
        text-decoration: none !important;
    }

</style>
@endpush

@push('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
<script src="{{ asset('assets') }}/js/datatables.min.js"></script>
<script>
    $(document).ready(function () {
        $('#weight').prop('readonly', true);
        $(window).keydown(function (event) {
            if (event.keyCode == 13) {
                event.preventDefault();
                return false;
            }
        });

        setButtonState();

        $('.select2').select2();

        $('#customers').select2({
            placeholder: '- Pilih customer -',
            allowClear: true
        });

        $('#couriers').select2({
            placeholder: '- Pilih layanan -',
            allowClear: true
        });

        $('#customers').change(function () {
            if ($(this).val() != 0) {
                $('#weight').prop('readonly', false);
                $('#ongkir').removeClass('invisible');

                if (count > 0) {
                    $('#couriers').prop('disabled', false);
                }

                $.ajax({
                    url: "{!! url('sales/search-customer') !!}/" + $(this).val(),
                    method: "get",
                    beforeSend: function () {
                        $('.loading').show();
                    },
                    success: function (response) {
                        $('.loading').hide();
                        if (response.customer.status === 'Distributor') {
                            $("#discount").val(40);
                        } else {
                            $("#discount").val(30);
                        }
                        $("#destination").val(response.customer.city_id);
                        countTotal();
                    }
                });

            } else {
                $('#ongkir').addClass('invisible');
                $('#couriers').prop('disabled', true);
                $('#weight').prop('readonly', true);
                $("#discount").val(0);
            }
        });

        $('#couriers').change(function () {
            calculateCost();
        });

        $('#services').change(function () {
            var ongkir = $(this).val();
            $('#courier_fee-text').html('Rp ' + number_format(ongkir, 0, ',', '.'));
            countTotal();
        });

        $('#search').change(function () {
            $.ajax({
                url: "{!! url('sales/search') !!}/" + $("#search").val(),
                method: "get",
                beforeSend: function () {
                    $('.loading').show();
                },
                success: function (response) {
                    $('.loading').hide();
                    if (document.getElementById('item-id-' + response.stock.id) == null) {
                        var table = document.getElementById("tbody");
                        var row = table.insertRow();
                        row.setAttribute('id', 'item-id-' + response.stock.id);
                        var text_color = 'text-muted';

                        if (response.stock.qty == 0)
                            text_color = 'text-danger';

                        var cell0 = row.insertCell(0);
                        var cell1 = row.insertCell(1);
                        var cell2 = row.insertCell(2);
                        var cell3 = row.insertCell(3);
                        var cell4 = row.insertCell(4);
                        cell0.setAttribute('style', 'width: 30%;');
                        cell1.setAttribute('style', 'width: 10%;');
                        cell2.setAttribute('style', 'width: 25%;');
                        cell3.setAttribute('style', 'width: 25%;');
                        cell4.setAttribute('style', 'width: 10%;');

                        cell0.innerHTML =
                            '<b>' + response.stock.product.code + '</b><br/>' +
                            response.stock.product.name + '<br/>' +
                            response.stock.color + ' - ' +
                            response.stock.size + '<br/> ' +
                            '<input type="hidden" name="item[' + count + '][id]" value="' +
                            response.stock.id + '">';
                        cell1.innerHTML =
                            '<input type="number" class="form-control w-75" value="1" name="item[' +
                            count +
                            '][qty]" id="qty-' + response.stock.id +
                            '" oninput="countSubtotal(' +
                            response.stock.id + ')" placeholder="' + response.stock.qty +
                            '"> ' +
                            '<small id="helpQty" class="' + text_color +
                            '"> Stok saat ini = ' +
                            response.stock.qty + ' pcs</small><br/>' +
                            '<small id="helpQty" class="text-muted"> Hold qty = ' +
                            response.stock.qty_hold + ' pcs</small>';
                        cell2.innerHTML =
                            '<input type="number" class="form-control" oninput="countSubtotal(' +
                            response.stock.id + ')" name="item[' + count +
                            '][price]" value="' +
                            response.stock.product.price + '" id="price-' + response.stock
                            .id + '">';
                        cell3.innerHTML =
                            '<input type="number" class="form-control subtotal" id="subtotal-' +
                            response.stock.id + '" name="item[' + count +
                            '][subtotal]" value="' +
                            response.stock.product.price + '" required readonly/>';
                        cell4.innerHTML =
                            '<div class="text-center"><a style="cursor:pointer" onclick="voidItem(' +
                            response.stock.id +
                            ')"><i class="fa fa-trash text-danger"></i></a></div>';

                        count++;
                        setButtonState();
                        countTotal();
                        if (count > 0 && $('#customers').val() != 0) {
                            $('#couriers').prop('disabled', false);
                        }
                    } else {
                        alert('Produk ini sudah ada di Keranjang Belanja');
                    }
                }
            });
        });
    });

    var count = 0;

    function setButtonState() {
        if (count <= 0) {
            $('#btnPay').attr('disabled', 'disabled');
        } else {
            $('#btnPay').removeAttr('disabled');
        }
    }

    function voidItem(id) {
        count--;
        setButtonState();
        $("#item-id-" + id).remove();
        if (count > 0 && $('#customers').val() == 0) {
            $('#couriers').prop('disabled', true);
        }
    }

    function countSubtotal(id) {
        var actual_price = parseFloat($('#price-' + id).val()) || 0;
        var qty = parseFloat($("#qty-" + id).val()) || 0;

        if ($("#qty-" + id).val() === "" || qty == 0) {
            alert('Qty tidak boleh 0 atau kosong!');
            $('#btnPay').attr('disabled', 'disabled');
        } else {
            $('#btnPay').removeAttr('disabled');
        }

        var subtotal = parseFloat((actual_price * qty) || 0);

        $("#subtotal-" + id).val(subtotal);
        countTotal();
    }

    function calculateCost() {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: "{!! url('sales/cost') !!}",
            method: "post",
            data: {
                _token: CSRF_TOKEN,
                courier: $('#couriers').val(),
                weight: $('#weight').val(),
                destination: $('#destination').val(),
            },
            beforeSend: function () {
                $('.loading').show();
            },
            success: function (response) {
                $('.loading').hide();
                var costs = response.rajaongkir.results[0].costs;
                $('#services').prop('disabled', false);
                $("#services").select2({
                    placeholder: '- Pilih layanan',
                    allowClear: true,
                    data: $.map(costs, function (item) {
                        return {
                            text: item.service + ' - ' + item.description,
                            id: item.cost[0].value
                        }
                    })
                });
            },
            error: function (xhr) {
                $('#ajax-errors').html('');
                $.each(xhr.responseJSON.errors, function (key, value) {
                    $('#ajax-errors').append('<div class="alert alert-danger">' + value + '</div');
                });
            },

        });
    }

    function countTotal() {
        console.log('tot');
        var all_subtotals_length = $('.subtotal').length;
        var grand_subtotal = 0;

        for (i = 0; i < all_subtotals_length; i++) {
            grand_subtotal = grand_subtotal + (parseFloat($('.subtotal:eq(' + i + ')').val() || 0));
        }

        var discount = parseFloat($("#discount").val() || 0);
        var discount_nominal = discount / 100 * grand_subtotal;
        var ongkir = parseFloat($("#services").val() || 0);
        var grand_total = (grand_subtotal - discount_nominal) + ongkir;

        $("#grand-total-span").html(number_format(grand_total, 0, ',', '.'));
        $("#grand-total-input").val(grand_total);
    }

    function number_format(number, decimals, decPoint, thousandsSep) {
        number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
        var n = !isFinite(+number) ? 0 : +number;
        var prec = !isFinite(+decimals) ? 0 : Math.abs(decimals);
        var sep = (typeof thousandsSep === 'undefined') ? ',' : thousandsSep;
        var dec = (typeof decPoint === 'undefined') ? '.' : decPoint;
        var s = '';

        var toFixedFix = function (n, prec) {
            var k = Math.pow(10, prec);
            return '' + (Math.round(n * k) / k)
                .toFixed(prec)
        };

        s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
        if (s[0].length > 3) {
            s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep)
        }
        if ((s[1] || '').length < prec) {
            s[1] = s[1] || '';
            s[1] += new Array(prec - s[1].length + 1).join('0')
        }

        return s.join(dec)
    }

</script>
@endpush

@section('content')
<div class="tb-content tb-style1">
    <div class="tb-padd-lr-30 tb-uikits-heading mb-3 mt-2">
        <h2 class="tb-uikits-title">
            {{ @$sale ? 'Detail / Edit Nota Penjualan' : 'Nota Penjualan' }}
            <small class="text-muted"># {{ @$sale ? $sale->purchase_no : $no_so }}</small>
        </h2>
        <a href="{{ route('sales.index') }}" class="btn btn-outline-info btn-sm">Kembali ke list Nota Penjualan</a>
    </div>
    <div class="container-fluid">
        @include('layouts.feedback')
        @if (@$sale && @$sale->status == 0)
        <div class="row mb-3">
            <div class="col-12">
                <div class="tb-alert tb-danger">
                    <div class="d-flex justify-content-between">
                        <div class="py-1">
                            <i class="fa fa-exclamation-circle"></i> Customer belum melunasi pembelian.
                        </div>
                        <div>
                            <a href="{{ url('sales/lunas/'.@$sale->id) }}"
                                class="btn btn-info btn-sm m-0 no-underline"><i class="fa fa-check"></i> LUNAS</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        <div class="row">
            <div class="col-12">
                <form action="{{ @$sale ? route('sales.update', $sale) : route('sales.store') }}" method="POST">
                    @csrf
                    {{ @$sale ? method_field('PUT') : '' }}
                    <div class="row">
                        <div class="col-8">
                            @if (@!$sale)
                            <div class="form-group row">
                                <label for="search" class="col-sm-3 col-form-label">Cari Kode Produk:</label>
                                <div class="col-sm-9">
                                    <select class="form-control select2" name="search" id="search">
                                        <option value="0" selected disabled>- Pilih Produk -</option>
                                        @foreach ($stocks as $stock)
                                        <option value="{{ $stock->id }}">
                                            {{ $stock->product->code }} {{ $stock->product->name }} --
                                            {{ $stock->color }} -- {{ $stock->size }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @endif
                            <div class="tb-card tb-style1">
                                <div class="tb-data-table tb-lock-table tb-style1">
                                    <table class="table stripe row-border order-column no-footer table-hover"
                                        aria-describedby="tb-no-locked_info" id="table">
                                        <thead>
                                            <tr>
                                                <th class="sorting_asc" tabindex="0" aria-controls="tb-no-locked"
                                                    aria-label="Nama: activate to sort column descending"
                                                    style="width: 30%">Produk</th>
                                                <th class="sorting" tabindex="0" aria-controls="tb-no-locked"
                                                    aria-label="Kategori: activate to sort column ascending"
                                                    style="width: 10%">Qty (pcs)
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="tb-no-locked"
                                                    aria-label="Harga: activate to sort column ascending"
                                                    style="width: 25%">Harga (Rp)
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="tb-no-locked"
                                                    aria-label="Total: activate to sort column ascending"
                                                    style="width: 25%">Total (Rp)
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="tb-no-locked"
                                                    aria-label="Action: activate to sort column ascending"
                                                    style="width: 10%"></th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbody">
                                            @if (@$sale)
                                            @foreach ($sale->details as $key => $detail)
                                            <tr id="item-id-{{ $detail->id }}">
                                                <td style="width: 30%">
                                                    <b>{{ $detail->stock->product->code }}</b> <br>
                                                    {{ $detail->stock->product->name }} <br>
                                                    {{ $detail->stock->color }} - {{ $detail->stock->size }}
                                                    <input type="hidden" name="item[{{ $key }}][id]"
                                                        value="{{ $detail->id }}">
                                                </td>
                                                <td style="width: 10%">
                                                    <input type="number" class="form-control" id="qty-{{ $detail->id }}"
                                                        value="{{ $detail->qty }}" name="item[{{ $key }}][qty]"
                                                        oninput="countSubtotal({{ $detail->id }})">
                                                </td>
                                                <td style="width: 25%">
                                                    <input type="number" class="form-control"
                                                        id="price-{{ $detail->id }}"
                                                        value="{{ $detail->stock->product->price }}"
                                                        name="item[{{ $key }}][price]"
                                                        oninput="countSubtotal({{ $detail->id }})">
                                                </td>
                                                <td style="width: 25%">
                                                    <input type="number" class="form-control subtotal"
                                                        id="subtotal-{{ $detail->id }}" value="{{ $detail->subtotal }}"
                                                        name="item[{{ $key }}][subtotal]" readonly>
                                                </td>
                                                <td style="width: 10%">
                                                    {{-- <input type="number" class="form-control" 
                                                        id="qty-{{ $detail->id }}"
                                                    value="{{ $detail->qty }}"
                                                    name="item[{{ $key }}][qty]"
                                                    oninput="countSubtotal({{ $detail->id }})"> --}}
                                                </td>
                                            </tr>
                                            @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="customers">Customer</label>
                                <select class="form-control" name="customer_id" id="customers"
                                    {{ @$sale ? 'readonly' : '' }}>
                                    <option></option>
                                    @foreach ($customers as $customer)
                                    <option value="{{ $customer->id }}"
                                        {{ @$sale->customer_id == $customer->id ? 'selected' : '' }}>
                                        {{ $customer->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="discount">Diskon (%)</label>
                                <input type="number" class="form-control" id="discount" name="discount" min="0"
                                    value="{{ @$sale ? $sale->discount : 0 }}" oninput="countTotal()">
                            </div>
                            <div class="form-group">
                                <label for="couriers">Kurir</label>
                                <select class="form-control" name="courier_name" id="couriers">
                                    <option></option>
                                    @foreach ($couriers as $key => $courier)
                                    <option value="{{ $key }}" {{ @$sale->courier_name == $key ? 'selected' : '' }}>
                                        {{ $courier }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="services">Layanan</label>
                                @if (@!$sale)
                                <select name="service" id="services" class="form-control services w-100" disabled>
                                    <option></option>
                                </select>
                                @else
                                <h5>{{ @$sale->courier_name }}</h5>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="weight">Berat (gram)</label>
                                <input type="text" class="form-control" id="weight" name="weight"
                                    value="{{ @$sale ? $sale->weight : 1 }}" oninput="calculateCost()">
                            </div>
                            <div class="row {{ @!$sale ? 'invisible' : '' }}" id="ongkir">
                                <div class="col-6">
                                    <p class="">Ongkos Kirim:</p>
                                </div>
                                <div class="col-6">
                                    <input type="hidden" id="destination" name="destination">
                                    <input type="hidden" class="form-control" id="courier_fee" name="courier_fee"
                                        value="{{ @$sale ? $sale->courier_fee : 0 }}">
                                    <p class="float-right" id="courier_fee-text">Rp
                                        {{ @$sale ? number_format($sale->courier_fee, 0, ',', '.') : '' }}</p>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-2">
                                    <h5>Total:</h5>
                                </div>
                                <div class="col-10">
                                    <h5 class="float-right">Rp <span
                                            id="grand-total-span">{{ @$sale ? number_format($sale->total, 0, ',', '.') : '-' }}</span>
                                    </h5>
                                    <input type="hidden" id="grand-total-input" name="total">
                                </div>
                            </div>
                            <input type="hidden" value="{{ @$sale ? $sale->purchase_no : $no_so }}" name="purchase_no">
                            <button type="submit" id="btnPay" class="btn btn-info btn-block">Simpan</button>
                            @if (@$sale)
                            @if ($sale->status == 0)
                            <a href="#" class="btn btn-block btn-warning"><i class="fa fa-check"></i> Ubah Status
                                Pembelian ke Lunas </a>
                            @endif
                            <a href="#" class="btn btn-block btn-success">Cetak Nota Penjualan</a>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection
