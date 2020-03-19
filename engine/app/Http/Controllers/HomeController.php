<?php

namespace App\Http\Controllers;

use App\Stock;
use App\Purchase;
use Carbon\Carbon;
use App\Charts\TransactionsChart;
use App\Purchase_detail;
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

        $details = Purchase_detail::whereHas('sale', function ($q) {
            $q->where('status', 'FINISH');
        })->whereMonth('created_at', date('m'))->get()->sortBy(function ($useritem, $key) {
            return $useritem->stock->product->code;
        });


        foreach ($details as $detail) {
            $productsSoldInThisPeriod[] = [
                'stock' => $detail->stock,
                'qty' => $detail->qty
            ];
        }

        foreach ($purchasesInThisPeriod->get() as $purchases) {
            $d['products_sold'] += $purchases->details->sum('qty');
        }

        foreach ($productsSoldInThisPeriod as $key => $value) {
            if ($key > 0 && $display[count($display) - 1]['stock'] == $value['stock']) {
                $display[count($display) - 1]['qty'] += $value['qty'];
            } else {
                $display[] = $value;
            }
        }

        usort($display, function ($item1, $item2) use ($count) {
            if ($count <= 5) {
                $count++;
                return $item2['qty'] <=> $item1['qty'];
            }
        });

        $d['bestselling_products'] = array_slice($display, 0, 5);

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
