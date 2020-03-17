<?php

namespace App\Http\Controllers;

use App\Purchase;
use App\Stock;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function _construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $purchasesInThisPeriod = Purchase::with('details.stock.product')
            ->whereMonth('created_at', date('m'))
            ->where('status', 'LUNAS');
        $d['current_date'] = Carbon::now();
        $d['sales_count'] = $purchasesInThisPeriod->count();
        $d['revenue'] = $purchasesInThisPeriod->sum('total');
        $d['products_sold'] = 0;
        $d['bestselling_products'] = [];
        foreach ($purchasesInThisPeriod->get() as $purchases) {
            $d['products_sold'] += $purchases->details->sum('qty');
        }
        $d['needs_restock'] = Stock::where('qty', '<=', 0)->count();

        return view('home', $d);
    }
}
