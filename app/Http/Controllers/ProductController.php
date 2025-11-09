<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    private function sampleProducts()
    {
        return [
            [
                'id' => 1,
                'name' => 'Auriculares Inalámbricos Pro',
                'description' => 'Cancelación de ruido, batería 24h, estuche de carga USB-C.',
                'price' => 399.99,
                'brand' => 'SoundMax',
                'image' => 'https://via.placeholder.com/600x600.png?text=Auriculares+Pro'
            ],
            [
                'id' => 2,
                'name' => 'Smartwatch Serie X',
                'description' => 'Monitor de ritmo cardíaco, GPS, resistencia al agua 5ATM.',
                'price' => 899.00,
                'brand' => 'TimeTech',
                'image' => 'https://via.placeholder.com/600x600.png?text=Smartwatch+Serie+X'
            ],
            [
                'id' => 3,
                'name' => 'Laptop Ultra 14"',
                'description' => 'Intel i7, 16GB RAM, 512GB SSD, pantalla 2K.',
                'price' => 4599.00,
                'brand' => 'CompuStar',
                'image' => 'https://via.placeholder.com/600x600.png?text=Laptop+Ultra+14'
            ],
        ];
    }

    public function index()
    {
        // Listar productos reales desde la BD para la página pública
        $products = Product::with(['category','brand'])->orderBy('id', 'desc')->paginate(12);
        return view('index', compact('products'));
    }

    // Form de creación: obtiene la lista de categorías y marcas
    public function getLists()
    {
        $brands = Brand::all();
        $categories = Category::all();

        return view('admin.product.create', [
            'brands' => $brands,
            'categories' => $categories,
        ]);
    }

    // Listado de productos
    public function getProducts()
    {
        $products = Product::with(['category','brand'])->orderBy('id', 'desc')->paginate(10);
        return view('admin.product.table', compact('products'));
    }

    // Crear nuevo producto
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:50',
            'productBrand' => 'required|exists:brand,id',
            'productCategory' => 'required|exists:category,id'
        ]);

        $product = new Product();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->brand_id = $request->input('productBrand');
        $product->category_id = $request->input('productCategory');

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('products', 'public');
            $product->image_path = $path;
        }

        $product->save();

        return redirect()->route('admin.product.index')->with('status', 'Producto creado correctamente.');
    }

    // Editar producto (form)
    public function edit(Product $product)
    {
        $brands = Brand::all();
        $categories = Category::all();
        return view('admin.product.edit', compact('product','brands','categories'));
    }

    // Actualizar producto
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:50',
            'productBrand' => 'required|exists:brand,id',
            'productCategory' => 'required|exists:category,id',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->brand_id = $request->input('productBrand');
        $product->category_id = $request->input('productCategory');

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($product->image_path && Storage::disk('public')->exists($product->image_path)) {
                Storage::disk('public')->delete($product->image_path);
            }
            $path = $request->file('image')->store('products', 'public');
            $product->image_path = $path;
        }

        $product->save();

        return redirect()->route('admin.product.index')->with('status', 'Producto actualizado correctamente.');
    }

    // Eliminar producto
    public function destroy(Product $product)
    {
        // Delete image file if exists
        if ($product->image_path && Storage::disk('public')->exists($product->image_path)) {
            Storage::disk('public')->delete($product->image_path);
        }
        $product->delete();
        return redirect()->route('admin.product.index')->with('status', 'Producto eliminado correctamente.');
    }

    public function getProduct($idProducto, $category = 'General')
    {
        $product = Product::with(['category','brand'])->find($idProducto);
        if (!$product) {
            return redirect()->route('product.index')
                ->with('status', 'Producto no encontrado.');
        }
        return view('show', compact('product', 'category'));
    }
}
