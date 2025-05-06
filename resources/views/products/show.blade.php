@extends('layouts.app')

@section('content')
<style>
    .product-container {
        max-width: 900px;
        margin: 40px auto;
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        overflow: hidden;
        display: flex;
        flex-wrap: wrap;
    }

    .product-image {
        flex: 1 1 300px;
        background: #f8f8f8;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
    }

    .product-image img {
        max-width: 100%;
        max-height: 350px;
        object-fit: contain;
    }

    .product-details {
        flex: 1 1 400px;
        padding: 30px;
    }

    .product-title {
        font-size: 32px;
        margin-bottom: 10px;
        color: #333;
    }

    .product-sku {
        font-size: 14px;
        color: #777;
        margin-bottom: 20px;
    }

    .product-section {
        margin-bottom: 20px;
    }

    .product-section h2 {
        font-size: 18px;
        color: #444;
        margin-bottom: 6px;
    }

    .product-section p {
        font-size: 16px;
        color: #555;
    }

    .product-price {
        color: #1f9d55;
        font-size: 20px;
        font-weight: bold;
    }

    .back-button {
        display: inline-block;
        background-color: #2563eb;
        color: #fff;
        padding: 10px 20px;
        border-radius: 6px;
        text-decoration: none;
        font-size: 14px;
        margin-top: 20px;
    }

    .back-button:hover {
        background-color: #1d4ed8;
    }

    @media (max-width: 768px) {
        .product-container {
            flex-direction: column;
        }

        .product-image,
        .product-details {
            flex: 1 1 100%;
        }
    }
</style>
@if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
<div class="product-container">
   

    <div class="product-details">
        <h1 class="product-title">{{ $product->name }}</h1>
        <p class="product-sku">SKU: {{ $product->sku }}</p>

        <div class="product-section">
            <h2>Price</h2>
            <p class="product-price">${{ number_format($product->price, 2) }}</p>
        </div>

        <div class="product-section">
            <h2>Quantity</h2>
            <p>{{ $product->quantity }}</p>
        </div>
        <form action="{{ route('cart.add', $product) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="quantity">Quantity</label>
                    <input type="number" name="quantity" class="form-control" min="1" max="{{ $product->quantity }}" value="1" required>
                </div>
                <button class="btn btn-success mt-3">Add to Cart</button>
            </form>
        <a href="{{ route('products.index') }}" class="back-button">← Back to Products</a>
    </div>
</div>
@endsection
