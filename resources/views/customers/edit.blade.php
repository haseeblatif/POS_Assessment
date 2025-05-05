@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-sm p-4">
        <h4 class="mb-4">Edit Customer</h4>
        <form action="{{ route('customers.update', $customer) }}" method="POST">
            @csrf
            @method('PUT')
            @include('customers.form', ['customer' => $customer])
            <div class="text-end">
                <button type="submit" class="btn btn-success">Update Customer</button>
            </div>
        </form>
    </div>
</div>
@endsection
