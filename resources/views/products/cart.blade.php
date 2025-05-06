<div class="card mt-5">
    <div class="card-header"><strong>Cart</strong></div>
    <div class="card-body">
        @if(session('cart') && count(session('cart')) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Qty</th>
                        <th>Subtotal</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0; @endphp
                    @foreach(session('cart') as $item)
                        @php $subtotal = $item['price'] * $item['quantity']; $total += $subtotal; @endphp
                        <tr>
                            <td>{{ $item['name'] }}</td>
                            <td>{{ $item['quantity'] }}</td>
                            <td>${{ number_format($subtotal, 2) }}</td>
                            <td>
                                <form action="{{ route('cart.remove', $item['id']) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">Remove</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="text-end">
                <p><strong>Tax (10%):</strong> ${{ number_format($total * 0.10, 2) }}</p>
                <p><strong>Total:</strong> ${{ number_format($total * 1.10, 2) }}</p>
                <form action="{{ route('sales.checkout') }}" method="POST">
                    @csrf
                    <button class="btn btn-primary">Checkout</button>
                </form>
            </div>
        @else
            <p>Your cart is empty.</p>
        @endif
    </div>
</div>
