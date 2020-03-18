<?php

namespace App\Http\Controllers;

use App\Stock;
use App\Purchase;
use Carbon\Carbon;
use App\Charts\TransactionsChart;
use Carbon\CarbonPeriod;

class HomeController extends Controller
{
    public function index()
    {
        $purchasesInThisPeriod = Purchase::with('details.stock.product')
            ->whereMonth('created_at', date('m'))
            ->where('status', 'FINISH');

        $d['current_date'] = Carbon::now();

        $d['sales_count'] = $purchasesInThisPeriod->count();

        $d['revenue'] = $purchasesInThisPeriod->sum('total');

        $d['products_sold'] = 0;
        $productsSoldInThisPeriod = [];
        $display = [];
        $count = 0;

        foreach ($purchasesInThisPeriod->get() as $purchases) {
            $d['products_sold'] += $purchases->details->sum('qty');
            foreach ($purchases->details as $details) {
                $productsSoldInThisPeriod[] = [
                    'product' => $details->stock,
                    'qty' => $details->qty
                ];
            }
        }

        foreach ($productsSoldInThisPeriod as $id => $value) {
            if ($id > 0 && $display[count($display) - 1]['product'] == $value['product']) {
                $display[count($display) - 1]['qty'] += $value['qty'];
            } else {
                $display[] = $value;
            }
        }

        usort($display, function ($item1, $item2) use ($count) {
            while ($count <= 5) {
                $count++;
                return $item2['qty'] <=> $item1['qty'];
            }
        });

        $d['bestselling_products'] = $display;

        $d['needs_restock'] = Stock::where('qty', '<=', 0)->count();

        /**
         * ==========================================================================
         * Transaction Chart
         * ==========================================================================
         */
        $period = CarbonPeriod::create(Carbon::now()->startOfMonth(), Carbon::now());

        $dates = [];
        $dataset = [];
        foreach ($period as $date) {
            $dates[] = $date->toFormattedDateString();
            $dataset[] = Purchase::whereDate('created_at', '=', $date)
                ->where('status', 'FINISH')
                ->sum('total');
        }

        $d['transactionsChart'] = new TransactionsChart;
        $d['transactionsChart']->labels($dates);
        $d['transactionsChart']->dataset('Transaksi per hari', 'line', $dataset);

        return view('home', $d);
    }
}
