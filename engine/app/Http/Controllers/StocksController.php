<?php

namespace App\Http\Controllers;

use App\Product;
use App\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StocksController extends Controller
{
    public function index()
    {
        $data['stocks'] = Stock::latest()->get();

        return view('stock.index', $data);
    }

    public function create()
    {
        $data['products'] = Product::latest()->get();
        $data['sizes'] = ['XS', 'S', 'M', 'L', 'XL'];
        $data['colors'] = ['Merah', 'Kuning', 'Hijau', 'Biru', 'Coklat', 'Hitam', 'Putih'];

        return view('stock.form', $data);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        unset($data['_token']);

        $check = Stock::where([
            'product_id' => $data['product_id'],
            'size' => $data['size'],
            'color' => $data['color'],
        ])->first();

        if (!$check) {
            Validator::make($data, [
                'product_id' => ['required'],
                'size' => ['required'],
                'color' => ['required'],
                'qty' => ['required'],
            ])->validate();

            Stock::create($data);
        } else {
            $check->qty += $data['qty'];
            $check->save();
        }

        return redirect()->back()->with('info', 'Stok Produk baru berhasil ditambahkan!');
    }

    public function edit(Stock $stock)
    {
        $data['products'] = Product::latest()->get();
        $data['sizes'] = ['XS', 'S', 'M', 'L', 'XL'];
        $data['colors'] = ['Merah', 'Kuning', 'Hijau', 'Biru', 'Coklat', 'Hitam', 'Putih'];
        $data['stock'] = $stock;

        return view('stock.form', $data);
    }

    public function update(Request $request, Stock $stock)
    {
        $data = $request->all();

        Validator::make($data, [
            'product_id' => ['required'],
            'size' => ['required'],
            'color' => ['required'],
            'qty' => ['required'],
        ])->validate();

        $stock->update($data);

        return redirect()->back()->with('info', 'Stok Produk berhasil di-update!');
    }

    public function destroy(Stock $stock)
    {
        $stock->delete();

        return redirect()->back()->with('info', 'Stok Produk berhasil dihapus!');
    }
}
