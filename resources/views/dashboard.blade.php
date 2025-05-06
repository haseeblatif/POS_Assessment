<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="container py-5">
    <div class="row">

        <!-- Product Count Card -->
        <div class="col-md-6 mb-4">
            <div class="card" style="width: 100%;">
                <img class="card-img-top" src="{{ asset('images/products.jpg') }}" alt="Products">
                <div class="card-body">
                    <h5 class="card-title">Total Products</h5>
                    <p class="card-text display-6">{{ $productCount }}</p>
                    <a href="{{ route('products.index') }}" class="btn btn-primary">View Product List</a>
                </div>
            </div>
        </div>

        <!-- Customer Count Card -->
        <div class="col-md-6 mb-4">
            <div class="card" style="width: 100%;">
                <img class="card-img-top" src="{{ asset('images/customers.jpg') }}" alt="Customers">
                <div class="card-body">
                    <h5 class="card-title">Total Customers</h5>
                    <p class="card-text display-6">{{ $customerCount }}</p>
                    <a href="{{ route('customers.index') }}" class="btn btn-success">View Customer List</a>
                </div>
            </div>
        </div>

    </div>
</div>


</x-app-layout>
