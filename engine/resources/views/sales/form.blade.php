@extends('layouts.admint')

@push('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
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
    <script src="https://cdn.jsdelivr.net/npm/cleave.js@1.5.7/dist/cleave.min.js"></script>

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
                $('#courier_service_name').val($('#services option:selected').text());
                $('#courier_fee-text').html('Rp ' + number_format(ongkir, '.', ',', 0));
                $('#courier_fee-text').html('Rp ' + number_format(ongkir, '.', ',', 0));
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
                        if (document.getElementById('item-id-' + response.stock.id) == null) {
                            var table = document.getElementById("tbody");
                            var row = table.insertRow();
                            row.setAttribute('id', 'item-id-' + response.stock.id);

                            var cell0 = row.insertCell(0);
                            var cell1 = row.insertCell(1);
                            var cell2 = row.insertCell(2);
                            var cell3 = row.insertCell(3);
                            var cell4 = row.insertCell(4);
                            cell0.setAttribute('style',
                                'vertical-align:middle;width: 30%;');
                            cell1.setAttribute('style',
                                'text-align:right;vertical-align:middle;width: 10%;');
                            cell2.setAttribute('style',
                                'text-align:right;vertical-align:middle;width: 25%;');
                            cell3.setAttribute('style',
                                'text-align:right;vertical-align:middle;width: 25%;');
                            cell4.setAttribute('style',
                                'text-align:right;vertical-align:middle;width: 10%;');

                            cell0.innerHTML =
                                '<b>' + response.stock.product.code + '</b><br/>' +
                                response.stock.product.name + ' ' +
                                response.stock.color + ' | ' +
                                response.stock.size + '<br/> ' +
                                '<input type="hidden" name="item[' + count + '][id]" value="' +
                                response.stock.id + '">';
                            cell1.innerHTML =
                                '<div class="input-group">' +
                                '<input type="number" class="form-control" value="1" name="item[' +
                                count + '][qty]" id="qty-' + response.stock.id +
                                '" oninput="countSubtotal(' + response.stock.id +
                                ')" placeholder="' + response.stock.qty +
                                '"/> <div class="input-group-append"><span class="input-group-text">pcs</span></div></div>';
                            cell2.innerHTML = '<span class="my-2" id="price-text-' +
                                response.stock.id + '">Rp' + number_format(response.stock
                                    .product.price, '.', ',', 0) + '</span>' +
                                '<input type="hidden" name="item[' + count +
                                '][price]" value="' + response.stock.product.price +
                                '" id="price-' + response.stock.id + '">';
                            cell3.innerHTML =
                                '<input type="hidden" class="subtotal" id="subtotal-' +
                                response.stock.id + '" name="item[' + count +
                                '][subtotal]" value="' + response.stock.product.price +
                                '"/>' + '<span class="my-2" id="subtotal-text-' +
                                response.stock.id + '">Rp' + number_format(response.stock
                                    .product
                                    .price, '.', ',', 0) + '</span>';
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
                            var num = +$("#qty-" + response.stock.id).val() + 1;
                            $("#qty-" + response.stock.id).val(num);
                            countSubtotal(response.stock.id);
                        }
                    },
                    complete: function () {
                        $('.loading').hide();
                        // $('.input-number').cleave({
                        //     numeral: true,
                        //     delimiter: '.',
                        //     numeralDecimalMark: ',',
                        //     numeralThousandsGroupStyle: 'thousand',
                        //     prefix: 'Rp',
                        // });
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
                    $('#services').empty();
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
                                // text: item.service + ' - ' + item.description,
                                text: item.service,
                                id: item.cost[0].value
                            }
                        })
                    });
                },
                complete: function () {
                    $('#services').val(1).trigger('change.select2');
                },
                error: function (xhr) {
                    $('#ajax-errors').html('');
                    $.each(xhr.responseJSON.errors, function (key, value) {
                        $('#ajax-errors').append('<div class="alert alert-danger">' + value + '</div');
                    });
                },
            });
        }

        function countSubtotal(id) {
            var actual_price = parseFloat($("#price-" + id).val()) || 0;
            var qty = parseFloat($("#qty-" + id).val()) || 0;

            if ($("#qty-" + id).val() === "" || qty == 0) {
                alert('Qty tidak boleh 0 atau kosong!');
                $('#btnPay').attr('disabled', 'disabled');
            } else {
                $('#btnPay').removeAttr('disabled');
            }

            var subtotal = parseFloat((actual_price * qty) || 0);

            $("#subtotal-text-" + id).text('Rp' + number_format(subtotal, '.', ',', 0));
            $("#subtotal-" + id).val(subtotal);
            countTotal();
        }

        function countTotal() {
            var all_subtotals_length = $('.subtotal').length;
            var grand_subtotal = 0;

            for (i = 0; i < all_subtotals_length; i++) {
                grand_subtotal = grand_subtotal + (parseFloat($('.subtotal:eq(' + i + ')').val() || 0));
            }

            var discount = parseFloat($("#discount").val() || 0);
            var discount_nominal = discount / 100 * grand_subtotal;
            var grand_total = (grand_subtotal - discount_nominal);

            $("#grand-total-span").text(number_format(grand_total, '.', ',', 0));
            $("#grand-total-input").val(grand_total);
        }

        function number_format(number, thousandsSep, decPoint, decimals) {
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
<div class="tb-content tb-style1 pb-5">
    <div class="tb-padd-lr-30 tb-uikits-heading mb-3 mt-2">
        <h2 class="tb-uikits-title">
            {{ @$sale ? 'Detail / Edit Nota Penjualan' : 'Nota Penjualan' }}
            <small class="text-muted"># {{ @$sale ? $sale->purchase_no : $no_so }}</small>
        </h2>
        <a href="{{ route('sales.index') }}" class="btn btn-outline-info btn-sm">Kembali ke list Nota Penjualan</a>
    </div>
    <div class="container-fluid">
        @include('layouts.feedback')
        @if(@$sale && @$sale->status != 'LUNAS')
            <div class="row mb-3">
                <div class="col-12">
                    <div class="tb-alert">
                        <div class="d-flex justify-content-between">
                            <div class="py-1">
                                <i class="fa fa-exclamation-circle"></i> Customer belum melunasi pembelian.
                            </div>
                            <div>
                                <a href="{{ url('sales/lunas/'.@$sale->id) }}" class="btn btn-primary btn-sm m-0 no-underline"><i class="fa fa-check"></i> LUNAS</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col-12">
                <form action="{{ @$sale ? route('sales.update', $sale->id) : route('sales.store') }}" method="POST">
                    @csrf
                    {{ @$sale ? method_field('PUT') : '' }}
                    <div class="row">
                        <div class="col-8">
                            @if(@!$sale)
                                <div class="form-group row">
                                    <label for="search" class="col-sm-3 col-form-label">Cari Kode Produk:</label>
                                    <div class="col-sm-9">
                                        <select class="form-control select2" name="search" id="search">
                                            <option value="0" selected disabled>- Pilih Produk -</option>
                                            @foreach($stocks as $stock)
                                                <option value="{{ $stock->id }}">
                                                    {{ $stock->product->code }} {{ $stock->product->name }}
                                                    {{ $stock->color }} | {{ $stock->size }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            @endif
                            <div class="tb-card tb-style1">
                                <div class="tb-data-table tb-lock-table tb-style1">
                                    <table class="table stripe row-border order-column no-footer table-hover" aria-describedby="tb-no-locked_info" id="table">
                                        <thead>
                                            <tr>
                                                <th class="sorting_asc" tabindex="0" aria-controls="tb-no-locked" aria-label="Nama: activate to sort column descending" style="width: 25%">
                                                    Produk
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="tb-no-locked" aria-label="Kategori: activate to sort column ascending" style="text-align:right;width: 25%">
                                                    Qty
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="tb-no-locked" aria-label="Harga: activate to sort column ascending" style="text-align:right;width: 20%">
                                                    Harga
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="tb-no-locked" aria-label="Total: activate to sort column ascending" style="text-align:right;width: 25%">
                                                    Total
                                                </th>
                                                @if(!@$sale)
                                                    <th class="sorting" tabindex="0" aria-controls="tb-no-locked" aria-label="Action: activate to sort column ascending" style="text-align:right;width: 5%"></th>
                                                @endif
                                            </tr>
                                        </thead>
                                        <tbody id="tbody">
                                            @if(@$sale)
                                                @foreach($sale->details as $key => $detail)
                                                    <tr id="item-id-{{ $detail->id }}">
                                                        <td class="align-middle" style="width: 25%">
                                                            <b>{{ $detail->stock->product->code }}</b> <br>
                                                            {{ $detail->stock->product->name }}
                                                            {{ $detail->stock->color }} | {{ $detail->stock->size }}
                                                            <input type="hidden" name="item[{{ $key }}][id]" value="{{ $detail->id }}">
                                                        </td>
                                                        <td class="align-middle text-right" style="width: 25%">
                                                            @if(!@$sale)
                                                                <div class="input-group">
                                                                    <input type="number" class="form-control" id="qty-{{ $detail->id }}" value="{{ $detail->qty }}" name="item[{{ $key }}][qty]" oninput="countSubtotal({{ $detail->id }})">
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text">pcs</span>
                                                                    </div>
                                                                </div>
                                                            @else
                                                                <span class="text-right">
                                                                    <strong>{{ $detail->qty }} pcs</strong>
                                                                </span>
                                                            @endif
                                                        </td>
                                                        <td class="align-middle text-right" style="width: 20%">
                                                            Rp{{ number_format($detail->stock->product->price, 0, ',', '.') }}
                                                            <input type="hidden" id="price-{{ $detail->id }}" value="{{ $detail->stock->product->price }}" name="item[{{ $key }}][price]" oninput="countSubtotal({{ $detail->id }})">
                                                        </td>
                                                        <td class="align-middle text-right" style="width: 25%">
                                                            <span id="subtotal-text-{{ $detail->id }}">Rp{{ number_format($detail->subtotal, 0, ',', '.') }}</span>
                                                            <input type="hidden" class="form-control subtotal" id="subtotal-{{ $detail->id }}" value="{{ $detail->subtotal }}" name="item[{{ $key }}][subtotal]" readonly>
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
                            @if(@$sale->status == 'LUNAS')
                                <div class="row align-items-center">
                                    <div class="col-4">
                                        <label for="customers">Customer</label>
                                    </div>
                                    <div class="col-8 text-right">
                                        <strong>{{ $sale->customer->name }}</strong><br>
                                        {{ $sale->customer->status }} <br>
                                        @if(@$sale->discount)
                                            Diskon {{ @$sale->discount }}%
                                        @endif
                                    </div>
                                </div>
                            @else
                                <div class="form-group">
                                    <label for="customers">Customer</label>
                                    <select class="form-control" name="customer_id" id="customers" {{ @$sale ? 'disabled' : '' }}>
                                        <option></option>
                                        @foreach($customers as $customer)
                                            <option value="{{ $customer->id }}" {{ @$sale->customer_id == $customer->id ? 'selected' : '' }}>
                                                {{ $customer->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="discount">Diskon (%)</label>
                                    <input type="number" class="form-control" id="discount" name="discount" min="0" value="{{ @$sale ? $sale->discount : 0 }}" oninput="countTotal()">
                                </div>
                            @endif
                            @if(@$sale)
                                {{-- If edit, show text --}}
                                <div class="d-flex align-items-center justify-content-between mt-4">
                                    <div class="">
                                        <span>Kurir</span>
                                    </div>
                                    <div class=" text-right">
                                        <strong>{{ strtoupper($sale->courier_name) }}</strong>
                                        <p> {{ $sale->courier_service_name }} | {{ $sale->weight }} gram</p>
                                    </div>
                                </div>
                                @if(@$sale->status != 'LUNAS')
                                    {{-- If edit and status belum lunas --}}
                                    <div class="card border-warning mb-3">
                                        <div class="card-body p-2">
                                            <p class="font-weight-bold"><i class="fa fa-info-circle"></i> Edit Kurir</p>
                                            <div class="form-group">
                                                <label for="couriers">Kurir</label>
                                                <select class="form-control" name="courier_name" id="couriers">
                                                    <option></option>
                                                    @foreach($couriers as $key => $courier)
                                                        <option value="{{ $key }}">
                                                            {{ $courier }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="services">Layanan</label>
                                                <select name="courier_fee" id="services" class="form-control services w-100" disabled>
                                                    <option></option>
                                                </select>
                                            </div>
                                            <input type="hidden" name="courier_service_name" id="courier_service_name">
                                            <div class="form-group">
                                                <label for="weight">Berat (gram)</label>
                                                <input type="text" class="form-control" id="weight" name="weight" value="{{ @$sale ? $sale->weight : 1 }}" oninput="calculateCost()">
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @else
                                {{-- If create --}}
                                <div class="form-group">
                                    <label for="couriers">Kurir</label>
                                    <select class="form-control" name="courier_name" id="couriers">
                                        <option></option>
                                        @foreach($couriers as $key => $courier)
                                            <option value="{{ $key }}">
                                                {{ $courier }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="services">Layanan</label>
                                    <select name="courier_fee" id="services" class="form-control services w-100" disabled>
                                        <option></option>
                                    </select>
                                </div>
                                <input type="hidden" name="courier_service_name" id="courier_service_name">
                                <div class="form-group">
                                    <label for="weight">Berat (gram)</label>
                                    <input type="text" class="form-control" id="weight" name="weight" value="{{ @$sale ? $sale->weight : 1 }}" oninput="calculateCost()">
                                </div>
                            @endif
                            <div class="row {{ @!$sale ? 'invisible' : '' }} mt-4" id="ongkir">
                                <div class="col-6">
                                    <p class="">Ongkos Kirim:</p>
                                </div>
                                <div class="col-6">
                                    <input type="hidden" id="destination" name="destination" value="{{ @$sale ? @$sale->customer->city_id : 0 }}">
                                    {{-- <input type="hidden" class="form-control" id="courier_fee" name="courier_fee" value="{{ @$sale ? $sale->courier_fee : 0 }}"> --}}
                                    <p class="float-right" id="courier_fee-text">
                                        Rp {{ @$sale ? number_format($sale->courier_fee, 0, ',', '.') : '' }}
                                    </p>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-2">
                                    <h5>Total:</h5>
                                </div>
                                <div class="col-10">
                                    <h5 class="float-right"> Rp
                                        <span id="grand-total-span">{{ @$sale ? number_format($sale->total, 0, ',', '.') : '-' }}</span>
                                    </h5>
                                    <input type="hidden" id="grand-total-input" name="total">
                                </div>
                            </div>
                            <input type="hidden" value="{{ @$sale ? $sale->purchase_no : $no_so }}" name="purchase_no">
                            @if(@$sale)
                                @if($sale->status != 'LUNAS')
                                    <a href="#" class="btn btn-block btn-primary my-2">
                                        <i class="fa fa-check"></i> Ubah Status Pembelian ke Lunas
                                    </a>
                                    <button type="submit" class="btn btn-info btn-block my-2">Edit Nota Penjualan</button>
                                @endif
                                <a role="button" href="#" class="btn btn-block btn-success my-2">Cetak Nota Penjualan</a>
                            @else
                                <button type="submit" id="btnPay" class="btn btn-info btn-block my-2">Simpan</button>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
