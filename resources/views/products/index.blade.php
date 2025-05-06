@extends('layouts.app')

@section('content')
<div class="container-fluid row">
    {{-- Product List --}}
    <div class="col-md-8">
        <h3>Product List</h3>
        <div class="row">
            @foreach($products as $product)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">Price: ${{ number_format($product->price, 2) }}</p>
                            <p class="card-text">Stock: {{ $product->quantity }}</p>
                            <form action="{{ route('cart.add', $product) }}" method="POST">
                                @csrf
                                <button class="btn btn-success btn-sm w-100">Add to Cart</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- Cart Summary --}}
    <div class="col-md-4">
        <h3>Cart</h3>
        <div class="card">
            <div class="card-body">
                @php
                    $cart = session('cart', []);
                    $subtotal = 0;
                @endphp

                @if(count($cart))
                    <ul class="list-group mb-3">
                        @foreach($cart as $item)
                            @php
                                $itemTotal = $item['price'] * $item['quantity'];
                                $subtotal += $itemTotal;
                            @endphp
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <strong>{{ $item['name'] }}</strong><br>
                                    Qty: {{ $item['quantity'] }}<br>
                                    ${{ number_format($item['price'], 2) }} each
                                </div>
                                <form action="{{ route('cart.remove', $item['id']) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">×</button>
                                </form>
                            </li>
                        @endforeach
                    </ul>

                    <p><strong>Subtotal:</strong> ${{ number_format($subtotal, 2) }}</p>
                    <p><strong>Tax (10%):</strong> ${{ number_format($subtotal * 0.1, 2) }}</p>
                    <p><strong>Total:</strong> ${{ number_format($subtotal * 1.1, 2) }}</p>

                    <form action="{{ route('sales.checkout') }}" method="POST">
                        @csrf
                        <button class="btn btn-primary w-100">Checkout</button>
                    </form>
                @else
                    <p>Your cart is empty.</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
