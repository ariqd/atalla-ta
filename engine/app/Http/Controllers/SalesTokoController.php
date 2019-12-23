<?php

namespace App\Http\Controllers;

use App\Stock;
use App\Counter;
use App\Customer;
use App\Helpers\Rajaongkir;
use App\Purchase;
use App\Purchase_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SalesTokoController extends Controller
{
    public function create()
    {
        $data['stocks'] = Stock::with('product')->latest()->get();
        $data['customers'] = Customer::latest()->get();
        $counter = Counter::where("name", "=", "SO")->first();
        $data['no_so'] = "SO" . date("ymd") . str_pad(Auth::id(), 2, 0, STR_PAD_LEFT) . str_pad($counter->counter, 5, 0, STR_PAD_LEFT);
        $data['couriers'] = [
            'jne' => 'JNE',
            'pos' => 'Pos Indonesia',
            'tiki' => 'TIKI',
            'Lainnya' => 'Lainnya'
        ];

        return view('sales-toko.form', $data);
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $data = $request->all();

        $purchase = Purchase::create([
            'customer_id' => $data['customer_id'],
            'sales_id' => Auth::id(),
            'purchase_no' => $data['purchase_no'],
            'courier_name' => '-',
            'courier_fee' => 0,
            'discount' => $data['discount'],
            'status' => 0,
            'total' => $data['total']
        ]);

        if ($purchase) {
            foreach ($data['item'] as $key => $value) {
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
        // $data['courier'] = request()->get('courier');
        // $data['weight'] = request()->get('weight');

        return response()->json($data, 200);
    }
}
