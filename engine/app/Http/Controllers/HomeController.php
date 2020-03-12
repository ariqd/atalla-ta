<?php

namespace App\Http\Controllers;

use App\Purchase;
use App\Stock;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $d['current_date'] = Carbon::now();
        $purchasesInThisPeriod = Purchase::with('details')->whereMonth('created_at', date('m'))->where('status', 1);
        $d['sales_count'] = $purchasesInThisPeriod->count();
        $d['revenue'] = $purchasesInThisPeriod->sum('total');

        $products_sold = 0;
        foreach ($purchasesInThisPeriod->get() as $purchases) {
            $products_sold += $purchases->details->sum('qty');
        }

        $d['products_sold'] = $products_sold;
        $d['needs_restock'] = Stock::where('qty', '<=', 0)->count();

        return view('home', $d);
    }
}
