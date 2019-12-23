@extends('layouts.admint')

@push('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/css/datatables.min.css" />
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
                    success: function (response) {
                        if (response.customer.status === 'Distributor') {
                            $("#discount").val(40);
                        } else {
                            $("#discount").val(30);
                        }
                        $("#destination").val(response.customer.city_id);
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
                success: function (response) {
                    if (document.getElementById('item-id-' + response.stock.id) == null) {
                        var table = document.getElementById("tbody");
                        var row = table.insertRow();
                        row.setAttribute('id', 'item-id-' + response.stock.id);

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
                            '<input type="number" class="form-control" value="1" name="item[' +
                            count +
                            '][qty]" id="qty-' + response.stock.id +
                            '" oninput="countSubtotal(' +
                            response.stock.id + ')" placeholder="' + response.stock.qty +
                            '"> ' +
                            '<small id="helpQty" class="form-text text-muted"> Stok saat ini = ' +
                            response.stock.qty + ' pcs</small>';
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
            success: function (response) {
                console.dir(response);
                var costs = response.rajaongkir.results[0].costs;
                $('#services').prop('disabled', false);
                // $("#services").empty().trigger('change');
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
                    $('#ajax-errors').append('<div class="alert alert-danger">' + value +
                        '</div');
                });
            },

        });
    }

    function countTotal() {
        var all_subtotals_length = $('.subtotal').length;
        var grand_subtotal = 0;

        for (i = 0; i < all_subtotals_length; i++) {
            grand_subtotal = grand_subtotal + (parseFloat($('.subtotal:eq(' + i + ')').val() || 0));
        }
        console.log(grand_subtotal);
        var discount = parseFloat($("#discount").val() || 0);
        var discount_nominal = discount / 100 * grand_subtotal;

        var ongkir = parseFloat($("#services").val() || 0);

        var grand_total = (grand_subtotal - discount) + ongkir;
        // this.varGrand = grand_total;
        // $("#subtotal").val(grand_subtotal);
        $("#grand-total-span").html(number_format(grand_total, 0, ',', '.'));
        // $("#grand-total-span-input").val(grand_subtotal);
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
            {{ @$sale ? 'Edit Nota Penjualan: '.$sale->name : 'Nota Penjualan' }}
            <small class="text-muted"># {{ @$sale ? $sale->purchase_no : $no_so }}</small>
        </h2>
        <a href="{{ route('sales.index') }}" class="btn btn-outline-info btn-sm">Kembali ke list Nota Penjualan</a>
    </div>
    <div class="container-fluid">
        @include('layouts.feedback')
        <div id="ajax-errors"></div>
        <div class="row">
            <div class="col-12">
                <form action="{{ @$sale ? route('sales.update', $sale) : route('sales.store') }}" method="POST">
                    @csrf
                    {{ @$sale ? method_field('PUT') : '' }}
                    <div class="row">
                        <div class="col-8">
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
                            <div class="tb-card tb-style1">
                                <div class="tb-data-table tb-lock-table tb-style1">
                                    <table class="table stripe row-border order-column no-footer table-hover"
                                        aria-describedby="tb-no-locked_info" id="table">
                                        <thead>
                                            <tr>
                                                <th class="sorting_asc" tabindex="0" aria-controls="tb-no-locked"
                                                    aria-label="Nama: activate to sort column descending"
                                                    style="width: 40%">Produk</th>
                                                <th class="sorting" tabindex="0" aria-controls="tb-no-locked"
                                                    aria-label="Kategori: activate to sort column ascending"
                                                    style="width: 10%">Qty (pcs)
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="tb-no-locked"
                                                    aria-label="Harga: activate to sort column ascending"
                                                    style="width: 20%">Harga (Rp)
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="tb-no-locked"
                                                    aria-label="Total: activate to sort column ascending"
                                                    style="width: 20%">Total (Rp)
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="tb-no-locked"
                                                    aria-label="Action: activate to sort column ascending"
                                                    style="width: 10%"></th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbody"></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="customers">Customer</label>
                                <select class="form-control" name="customer_id" id="customers">
                                    <option></option>
                                    {{-- <option value="0" selected>Beli di Toko</option>
                                    <option disabled>─────────────────</option> --}}
                                    @foreach ($customers as $customer)
                                    <option value="{{ $customer->id }}"
                                        {{ @$sale->customer_id == $customer ? 'selected' : '' }}>
                                        {{ $customer->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="discount">Diskon (%)</label>
                                <input type="text" class="form-control" id="discount" name="discount"
                                    value="{{ @$sale ? $sale->discount : 0 }}">
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
                                <select name="service" id="services" class="form-control services w-100" disabled>
                                    <option></option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="weight">Berat (gram)</label>
                                <input type="text" class="form-control" id="weight" name="weight"
                                    value="{{ @$sale ? $sale->weight : 1 }}" oninput="calculateCost()">
                            </div>
                            <div class="row invisible" id="ongkir">
                                <div class="col-6">
                                    <p class="">Ongkos Kirim:</p>
                                </div>
                                <div class="col-6">
                                    <input type="hidden" id="destination" name="destination">
                                    <input type="hidden" class="form-control" id="courier_fee" name="courier_fee"
                                        value="{{ @$sale ? $sale->courier_fee : 0 }}">
                                    <p class="float-right" id="courier_fee-text">Rp -</p>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-2">
                                    <h5>Total:</h5>
                                </div>
                                <div class="col-10">
                                    <h5 class="float-right" id="grand-total-span">Rp 1.000.000.000</h5>
                                    <input type="hidden" id="grand-total-input" name="grand-total-input">
                                </div>
                            </div>
                            <button type="submit" id="btnPay" class="btn btn-info btn-block">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('layouts.footer')
</div>
@endsection
