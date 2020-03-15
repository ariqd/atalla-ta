<?php

namespace App\Http\Controllers;

use App\Counter;
use App\Customer;
use App\Helpers\Rajaongkir;
use App\Purchase;
use App\Purchase_detail;
use App\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SalesController extends Controller
{
    private $couriers = [
        'jne' => 'JNE',
        'pos' => 'Pos Indonesia',
        'tiki' => 'TIKI',
        // 'Lainnya' => 'Lainnya'
    ];

    public function index()
    {
        $data['sales'] = Purchase::latest()->get();

        return view('sales.index', $data);
    }

    public function create()
    {
        $data['stocks'] = Stock::with('product')->latest()->get();

        $data['customers'] = Customer::latest()->get()->except(1);

        $counter = Counter::where("name", "=", "SO")->first();

        $data['no_so'] = "SO" . date("ymd") . str_pad(Auth::id(), 2, 0, STR_PAD_LEFT) . str_pad($counter->counter, 5, 0, STR_PAD_LEFT);

        $data['couriers'] = $this->couriers;

        return view('sales.form', $data);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $purchase = Purchase::create([
            'customer_id' => $data['customer_id'],
            'sales_id' => Auth::id(),
            'purchase_no' => $data['purchase_no'],
            'courier_name' => $data['courier_name'],
            'courier_service_name' => $data['courier_service_name'],
            'courier_fee' => $data['courier_fee'],
            'discount' => $data['discount'],
            'status' => 0,
            'weight' => $data['weight'],
            'total' => $data['total'],
        ]);

        if ($purchase) {
            $counter = Counter::where("name", "=", "SO")->first();
            $counter->counter += 1;
            $counter->save();

            foreach ($data['item'] as $value) {
                Purchase_detail::create([
                    'purchase_id' => $purchase->id,
                    'inventory_id' => $value['id'],
                    'qty' => $value['qty'],
                    'status' => 0,
                    'subtotal' => $value['subtotal']
                ]);
            }

            return redirect()->back()->with('info', 'Nota penjualan toko berhasil ditambahkan!');
        } else {
            return redirect()->back()->with('error', 'Nota penjualan toko gagal ditambahkan!');
        }
    }

    public function edit($id)
    {
        $data['sale'] = Purchase::with('details.stock.product')->find($id);

        $data['stocks'] = Stock::with('product')->latest()->get();

        $data['customers'] = Customer::latest()->get()->except(1);

        $data['couriers'] = $this->couriers;

        return view('sales.form', $data);
    }

    public function update(Request $request, $id)
    {
        $purchase = Purchase::with('details')->find($id);

        $purchase->fill($request->only([
            'courier_name',
            'courier_service_name',
            'courier_fee',
            'discount'
        ]))->save();

        return redirect()->back()->with('info', 'Nota penjualan toko berhasil diupdate!');
    }

    public function search($id)
    {
        $data['stock'] = Stock::with('product')->find($id);

        return response()->json($data, 200);
    }

    public function searchCustomer($id)
    {
        $data['customer'] = Customer::find($id);

        return response()->json($data, 200);
    }

    public function cost(Request $request)
    {
        $input = $request->all();

        $postFields = [
            'origin' => 23, // Kota Bandung
            'destination' => $input['destination'],
            'weight' => $input['weight'],
            'courier' => $input['courier'],
        ];

        $rajaongkir = new Rajaongkir;
        $cost = $rajaongkir->post('cost', $postFields);
        $data = json_decode($cost->getBody());

        return response()->json($data, 200);
    }

    public function makeLunas($id)
    {
        $sale = Purchase::find($id);
        $sale->status = 'LUNAS';
        $sale->save();

        foreach ($sale->details as $detail) {
            $stock = Stock::find($detail->inventory_id);
            $stock->qty -= $detail->qty;

            if ($stock->qty < 0) {
                $hold = abs($stock->qty - 0);

                $stock->qty_hold += $hold;
                $stock->qty = 0;

                $detail->status = 2;
                $detail->save();
            }

            $stock->save();
        }

        return redirect()->back()->with('info', 'Status Nota penjualan berhasil diubah!');
    }
}
