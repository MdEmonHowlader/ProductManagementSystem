<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request){
        $query = Product::query();
        if($request->has('sort')){
            $query->orderBy($request->sort, $request->direction ?? 'asc');
    
        }
        if($request->has('search')){
            $query->where('product_id', 'like', "%{$request->search}%")->orWhere('description','like', "%{$request->search}%");

        }
        $products =$query->paginate(10);
        return view('products.index', compact('products'));

    }
    public function create() {
        return view('products.create');
    }
    public function store(Request $request) {
        $validated = $request->validate([
            'product_id' => 'required|unique:products',
            'name' => 'required',
            'price' => 'required|numeric',
            'stock' => 'nullable|integer',
            'image' => 'nullable|string',
        ]);
        Product::create($validated);
        return redirect('/products')->with('success', 'Product created successfully.');
    }

    public function show($id) {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }
    public function edit($id) {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }
    public function update(Request $request, $id) {
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'product_id' => 'required|unique:products,product_id,' . $product->id,
            'name' => 'required',
            'price' => 'required|numeric',
            'stock' => 'nullable|integer',
            'image' => 'nullable|string',
        ]);

        $product->update($validated);
        return redirect('/products')->with('success', 'Product updated successfully.');
    }

    public function destroy($id) {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect('/products')->with('success', 'Product deleted successfully.');
    }

}

