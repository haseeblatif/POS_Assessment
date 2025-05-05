@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-sm p-4">
        <h4 class="mb-4">Add New Customer</h4>
        <form action="{{ route('customers.store') }}" method="POST">
            @csrf
            @include('customers.form')
            <div class="text-end">
                <button type="submit" class="btn btn-primary">Save Customer</button>
            </div>
        </form>
    </div>
</div>
@endsection
