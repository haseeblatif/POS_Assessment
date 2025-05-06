<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sale;
use App\Models\Sales;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::latest()->where('quantity', '>', 0)->paginate(10);
        return view('products.index', compact('products'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'sku' => 'required|unique:products',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
        ]);

        Product::create($request->all());
        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }
    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {

        return view('products.show', compact('product'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'sku' => 'required|unique:products,sku,' . $product->id,
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
        ]);

        $product->update($request->all());
        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
    public function addToCart(Request $request, Product $product)
{
    $cart = session()->get('cart', []);

    if (isset($cart[$product->id])) {
        $cart[$product->id]['quantity']++;
    } else {
        $cart[$product->id] = [
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => 1
        ];
    }

    session()->put('cart', $cart);
    return back()->with('success', 'Product added to cart.');
}
public function removeFromCart($id)
{
    $cart = session()->get('cart', []);
    unset($cart[$id]);
    session()->put('cart', $cart);

    return back()->with('success', 'Product removed from cart.');
}

// SaleController.php
public function checkout()
{
    $cart = session('cart', []);

    if (empty($cart)) {
        return back()->with('error', 'Cart is empty.');
    }

    $subtotal = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);
    $tax = $subtotal * 0.10;
    $total = $subtotal + $tax;

    $sale = Sale::create([
        'user_id' => auth()->id(),
        'subtotal' => $subtotal,
        'tax' => $tax,
        'total' => $total,
    ]);

    foreach ($cart as $item) {
        $sale->items()->create([
            'product_id' => $item['id'],
            'quantity' => $item['quantity'],
            'price' => $item['price'],
        ]);

        Product::where('id', $item['id'])->decrement('quantity', $item['quantity']);
    }

    session()->forget('cart');
    return back()->with('success', 'Checkout successful.');
}

}
