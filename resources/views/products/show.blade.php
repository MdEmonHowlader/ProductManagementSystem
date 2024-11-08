
@extends('products.layouts.app')

@section('content')
<div class="container">
    <h1>Product Details</h1>

    <div class="card">
        <div class="card-header">{{ $product->name }}</div>
        <div class="card-body">
            <p><strong>Product ID:</strong> {{ $product->product_id }}</p>
            <p><strong>Description:</strong> {{ $product->description }}</p>
            <p><strong>Price:</strong> ${{ number_format($product->price, 2) }}</p>
            <p><strong>Stock:</strong> {{ $product->stock }}</p>
            @if($product->image)
            <p><strong>Image:</strong></p>
            <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" width="200">
            @endif
        </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Back to List</a>
    </div>
</div>
@endsection
