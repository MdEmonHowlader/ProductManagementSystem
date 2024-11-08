
@extends('products.layouts.app')

@section('content')
<div class="container">
    <h1>Product List</h1>

    <!-- Search Form -->
    <div class="mb-3">
        <a href="{{ url('/products/create') }}" class="btn btn-success">Add New Product</a>
    </div>
    <form action="{{ route('products.index') }}" method="GET" class="form-inline mb-4">
        <input type="text" name="search" class="form-control mr-2" placeholder="Search by ID or Description" value="{{ request('search') }}">
        <button type="submit" class="btn btn-primary">Search</button>
    </form>

    <!-- Sorting Links -->
    <div class="mb-3">
        <a href="{{ route('products.index', ['sort' => 'name']) }}" class="btn btn-link">
            <span class="border border-5">Sort by Name</span></a>
        <a href="{{ route('products.index', ['sort' => 'price']) }}" class="btn btn-link"><span class="border border-5">Sort by Price</span></a>
    </div>

    <!-- Products Table -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Product ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->product_id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>${{ number_format($product->price, 2) }}</td>
                <td>{{ $product->stock }}</td>
                <td>
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" width="50" height="50">
                    @else
                        <span>No Image</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination Links -->
    <div class="d-flex justify-content-center">
        {{ $products->links() }}
    </div>
</div>
@endsection
