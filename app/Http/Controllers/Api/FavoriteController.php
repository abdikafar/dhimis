<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use App\Models\Favorite;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    // GET /api/favorites?uid=xxx  -> the discounts this user favorited
    public function index(Request $request)
    {
        $uid = $request->query('uid');

        if (! $uid) {
            return response()->json(['message' => 'uid is required'], 422);
        }

        $discounts = Favorite::where('firebase_uid', $uid)
            ->with('discount')
            ->get()
            ->map(fn (Favorite $f) => $f->discount)
            ->filter()
            ->map(fn (Discount $d) => $this->toApi($d))
            ->values();

        return response()->json($discounts);
    }

    // POST /api/favorites  { uid, discountId }  -> add a favorite
    public function store(Request $request)
    {
        $data = $request->validate([
            'uid' => 'required|string',
            'discountId' => 'required|integer|exists:discounts,id',
        ]);

        // firstOrCreate keeps it idempotent (no duplicate rows).
        Favorite::firstOrCreate([
            'firebase_uid' => $data['uid'],
            'discount_id' => $data['discountId'],
        ]);

        return response()->json(['message' => 'added'], 201);
    }

    // DELETE /api/favorites  { uid, discountId }  -> remove a favorite
    public function destroy(Request $request)
    {
        $data = $request->validate([
            'uid' => 'required|string',
            'discountId' => 'required|integer',
        ]);

        Favorite::where('firebase_uid', $data['uid'])
            ->where('discount_id', $data['discountId'])
            ->delete();

        return response()->json(['message' => 'removed']);
    }

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
