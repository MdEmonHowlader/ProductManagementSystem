<!-- resources/views/products/show.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">Product Details</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Product ID: {{ $product->product_id }}</h5>
            <p class="card-text"><strong>Name:</strong> {{ $product->name }}</p>
            <p class="card-text"><strong>Description:</strong> {{ $product->description }}</p>
            <p class="card-text"><strong>Price:</strong> ${{ $product->price }}</p>
            <p class="card-text"><strong>Stock:</strong> {{ $product->stock }}</p>
            <a href="{{ url('/products') }}" class="btn btn-primary mt-3">Back to Product List</a>
        </div>
    </div>
</div>
</body>
</html>
