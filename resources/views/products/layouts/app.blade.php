<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title >Product Management</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light " style="background-color: rgb(69, 124, 234) !important" >
        <a class="navbar-brand" href="{{ route('products.index') }}" >Product Management</a>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>
</body>
</html>
