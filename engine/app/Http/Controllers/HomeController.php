<?php

namespace App\Http\Controllers;

use App\Charts\ProductsBarChart;
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
            ->whereYear('created_at', date('Y'))->get();

        // Jumlah produk terjual
        $data['products_sold'] = 0;
        foreach ($purchasesInThisPeriod as $purchases) {
            $data['products_sold'] += $purchases->details->sum('qty');
        }
        // END: Jumlah produk terjual

        $productsSoldInThisPeriod = $bestsellers = $dates = $dataset =  $period = [];

        // START: Top 5 Bestselling Products
        $details = Purchase_detail::whereHas('sale', function ($purchase) {
            $purchase->where('status', '!=', 'BELUM LUNAS');
        })->whereYear('created_at', date('Y'))
            ->whereMonth('created_at', date('m'))->get()->sortBy(function ($detail) {
                return $detail->stock->product->code;
            });

        foreach ($details as $detail) {
            $productsSoldInThisPeriod[] = [
                'stock' => $detail->stock,
                'qty' => $detail->qty
            ];
        }

        foreach ($productsSoldInThisPeriod as $key => $value) {
            if ($key > 0 && $bestsellers[count($bestsellers) - 1]['stock'] == $value['stock']) {
                $bestsellers[count($bestsellers) - 1]['qty'] += $value['qty'];
            } else {
                $bestsellers[] = $value;
            }
        }

        usort($bestsellers, function ($item1, $item2) {
            return $item2['qty'] <=> $item1['qty'];
        });

        $bestsellers = array_slice($bestsellers, 0, 5);
        $data['bestselling_products'] = $bestsellers;
        // END: Top 5 Bestselling Products

        // START: Transaction & Revenue Charts
        if (request()->get('period') == 'monthly') {
            $comparison = Carbon::now()->subYear();
            $periods = CarbonPeriod::create($comparison, '1 month', Carbon::now());

            foreach ($periods as $date) {
                $period[] = [
                    'text' => $date->format('M Y'),
                    'year'  => $date->format('Y'),
                    'month'  => $date->format('m'),
                ];
            }
        } else {
            $comparison = Carbon::now()->startOfMonth();
            $period = CarbonPeriod::create($comparison, Carbon::now());
        }

        $data['transactionsChart'] = new TransactionsChart;

        if (request()->get('chart') == 'jumlah-transaksi') {
            foreach ($period as $date) {
                if (request()->get('period') == 'monthly') {
                    $dates[] = $date['text'];

                    $dataset[] = Purchase::whereYear('created_at', $date['year'])
                        ->whereMonth('created_at', $date['month'])
                        ->where('status', '!=', 'BELUM LUNAS')
                        ->count();
                } else {
                    $dates[] = $date->toFormattedDateString();

                    $dataset[] = Purchase::whereDate('created_at', $date)
                        ->where('status', '!=', 'BELUM LUNAS')
                        ->count();
                }
            }

            $data['transactionsChart']->labels($dates);
            $data['transactionsChart']->dataset('Jumlah Transaksi', 'line', $dataset)
                ->color('#B388FF')
                ->backgroundColor('#D1C4E9');
        } else {
            foreach ($period as $date) {
                if (request()->get('period') == 'monthly') {
                    $dates[] = $date['text'];

                    $dataset[] = Purchase::whereYear('created_at', $date['year'])
                        ->whereMonth('created_at', $date['month'])
                        ->where('status', '!=', 'BELUM LUNAS')
                        ->sum('total');
                } else {
                    $dates[] = $date->toFormattedDateString();

                    $dataset[] = Purchase::whereDate('created_at', $date)
                        ->where('status', '!=', 'BELUM LUNAS')
                        ->sum('total');
                }
            }

            $data['transactionsChart']->labels($dates);
            $data['transactionsChart']->dataset('Total revenue', 'line', $dataset)
                ->color('#B388FF')
                ->backgroundColor('#D1C4E9');
        }
        // END: Transaction & Revenue Charts

        // Bestseller Chart
        $bestSellerLabels = [];

        $bestSellerDataset = [];

        foreach ($bestsellers as $bestseller) {
            $bestSellerLabels[] = $bestseller['stock']->product->code . ' | ' . $bestseller['stock']->size;
            $bestSellerDataset[] = $bestseller['qty'];
        }

        $data['productsBarChart'] = new ProductsBarChart;
        $data['productsBarChart']->labels($bestSellerLabels);
        $data['productsBarChart']->dataset('Jumlah produk terjual', 'bar', $bestSellerDataset)
            ->color('#B388FF')
            ->backgroundColor('#D1C4E9');

        return view('home', [
            'data' => $data,
            'purchases' => $purchasesInThisPeriod,
            'restocks' => Stock::where('qty_hold', '>', 0)->get()
        ]);
    }
}
