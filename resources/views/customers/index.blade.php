@extends('layouts.app')

@section('content')
<div class="card p-4">
    <div class="d-flex justify-content-between mb-3">
        <form class="d-flex" method="GET" action="{{ route('customers.index') }}">
            <input type="text" name="search" class="form-control me-2" placeholder="Search name or phone" value="{{ request('search') }}">
            <button style="margin-right: 5px;" class="btn btn-outline-secondary me-2" type="submit">Search</button>
<a href="{{ route('customers.index') }}" class="btn btn-outline-secondary">Reset</a>


        </form>
        <a href="{{ route('customers.create') }}" class="btn btn-primary">+ Add Customer</a>
    </div>

    @if ($customers->count())
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Address</th>
                <th class="text-end">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $customer)
                <tr>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->phone }}</td>
                    <td>{{ $customer->email ?? '-' }}</td>
                    <td>{{ $customer->address ?? '-' }}</td>
                    <td class="text-end">
                        <a href="{{ route('customers.edit', $customer) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('customers.destroy', $customer) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Delete customer?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $customers->links() }}
@elseif (request('search'))
    <div class="alert alert-warning">
        No customers found matching "{{ request('search') }}".
    </div>
@endif


</div>
@endsection
