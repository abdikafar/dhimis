<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // List all products.
    public function index()
    {
        $discounts = Discount::latest()->get();

        return view('portal.index', ['discounts' => $discounts]);
    }

    // Show the "new product" form.
    public function create()
    {
        return view('portal.form', ['discount' => new Discount()]);
    }

    // Save a new product.
    public function store(Request $request)
    {
        Discount::create($this->validated($request));

        return redirect()->route('portal.index')->with('status', 'Product added.');
    }

    // Show the "edit product" form.
    public function edit(Discount $discount)
    {
        return view('portal.form', ['discount' => $discount]);
    }

    // Save changes to a product.
    public function update(Request $request, Discount $discount)
    {
        $discount->update($this->validated($request));

        return redirect()->route('portal.index')->with('status', 'Product updated.');
    }

    // Delete a product.
    public function destroy(Discount $discount)
    {
        $discount->delete();

        return redirect()->route('portal.index')->with('status', 'Product deleted.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'store' => 'required|string|max:255',
            'item' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'percent_off' => 'required|integer|min:0|max:100',
            'category' => 'nullable|string|max:255',
            'image_url' => 'nullable|url|max:255',
        ]);
    }
}
