<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductsController extends Controller
{
    private $categories = [
        'Gamis',
        'Blus',
        'Rompi'
    ];

    public function index()
    {
        $data['products'] = Product::latest()->get();

        return view('product.index', $data);
    }

    public function create()
    {
        $data['categories'] = $this->categories;

        return view('product.form', $data);
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

        Product::create($data);

        return redirect()->back()->with('info', 'Produk baru berhasil ditambahkan!');
    }

    public function edit(Product $product)
    {
        $data['product'] = $product;
        $data['categories'] = $this->categories;

        return view('product.form', $data);
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->all();

        Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'code' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric'],
            'category' => ['required'],
        ])->validate();

        $product->update($data);

        return redirect()->back()->with('info', 'Produk berhasil di-update!');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->back()->with('info', 'Produk berhasil dihapus!');
    }
}
