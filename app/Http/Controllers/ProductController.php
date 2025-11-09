<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

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
        $products = $this->sampleProducts();
        return view('index', compact('products'));
    }

    public function create()
    {
        $brands = Brand::all();
        $categories = Category::all();

        return view('admin.product.create', [
            'brands' => $brands,
            'categories' => $categories,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:50',
            'productBrand' => 'required|exists:brands,id',
            'productCategory' => 'required|exists:categories,id',
        ]);


        $product = new Product();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->brand_id = $request->input('productBrand');
        $product->category_id = $request->input('productCategory');

        $product->save();

        return back()->with('status', 'Producto recibido.');
    }

    public function getProduct($idProducto, $category = 'General')
    {
        $products = $this->sampleProducts();
        $product = collect($products)->firstWhere('id', (int)$idProducto);
        if (!$product) {
            return redirect()->route('product.index')
                ->with('status', 'Producto no encontrado.');
        }
        return view('show', compact('product', 'category'));
    }
}
