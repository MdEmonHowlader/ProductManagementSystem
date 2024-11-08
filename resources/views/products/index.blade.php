<!-- resources/views/products/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">Product List</h1>

    <!-- Search Form -->
    <form action="{{ url('/products') }}" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Search by product ID or description" value="{{ request('search') }}">
            <button class="btn btn-primary" type="submit">Search</button>
        </div>
    </form>

    <!-- Sorting Links -->
    <div class="mb-3">
        <a href="{{ url('/products?sort=name&direction=asc') }}" class="btn btn-link">Sort by Name (Asc)</a>
        <a href="{{ url('/products?sort=name&direction=desc') }}" class="btn btn-link">Sort by Name (Desc)</a>
        <a href="{{ url('/products?sort=price&direction=asc') }}" class="btn btn-link">Sort by Price (Asc)</a>
        <a href="{{ url('/products?sort=price&direction=desc') }}" class="btn btn-link">Sort by Price (Desc)</a>
    </div>

    <!-- Product Table -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Product ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->product_id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>${{ $product->price }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>
                        <a href="{{ url('/products/' . $product->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ url('/products/' . $product->id . '/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ url('/products/' . $product->id) }}" method="POST" class="d-inline">
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
</body>
</html>
