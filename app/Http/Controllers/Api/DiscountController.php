<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Discount;

class DiscountController extends Controller
{
    // GET /api/discounts  -> list every discount
    public function index()
    {
        $discounts = Discount::orderByDesc('percent_off')->get();

        return response()->json(
            $discounts->map(fn (Discount $d) => $this->toApi($d))
        );
    }

    // GET /api/discounts/{id}  -> one discount
    public function show(Discount $discount)
    {
        return response()->json($this->toApi($discount));
    }

    // Shape a row the way the app expects (camelCase keys).
    private function toApi(Discount $d): array
    {
        return [
            'id' => $d->id,
            'store' => $d->store,
            'item' => $d->item,
            'category' => $d->category,
            'imageUrl' => $d->image_url,
            'price' => (float) $d->price,
            'percentOff' => (int) $d->percent_off,
            'finalPrice' => $d->final_price,
        ];
    }
}
