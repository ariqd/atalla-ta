<?php

use Illuminate\Database\Seeder;

class PurchasesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Purchase::class, 200)->create()->each(function ($purchase) {
            $details = factory(\App\Purchase_detail::class, 3)->make();

            foreach ($details as $detail) {
                $purchase->total += $detail->subtotal;
            }

            $purchase->save();

            $purchase->details()->saveMany($details);
        });
    }
}
