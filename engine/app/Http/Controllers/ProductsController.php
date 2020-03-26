<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductsController extends Controller
{
    private $categories = [
        'Hijab',
        'Gamis',
        'Blus',
        'Rompi',
        'Rok'
    ];

    public function index()
    {
        $data['products'] = Product::latest()->get();
        $data['categories'] = $this->categories;

        if (@$_GET['product_id']) {
            $product = Product::find(@$_GET['product_id']);
            if ($product)
                $data['product'] = $product;
        }

        return view('product.index', $data);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        unset($data['_token']);

        Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'code' => ['required', 'string', 'max:255'],
            'price' => ['required'],
            'category' => ['required'],
        ])->validate();

        $data['price'] = $this->toNumber($data['price']);

        $product = Product::firstOrCreate($data);

        if ($product) {
            return redirect('products')->with('error', `$product->code $product->name berhasil di update!`);
        } else {
            return redirect('products')->with('info', 'Produk baru berhasil ditambahkan!');
        }
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->all();

        Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'code' => ['required', 'string', 'max:255'],
            'price' => ['required'],
            'category' => ['required'],
        ])->validate();

        $data['price'] = $this->toNumber($data['price']);

        $product->update($data);

        return redirect('products')->with('info', 'Produk berhasil di-update!');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect('products')->with('info', 'Produk berhasil dihapus!');
    }
}
