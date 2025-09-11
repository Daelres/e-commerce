<?php

namespace App\Http\Controllers;

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
        return view('create');
    }

    public function store(Request $request)
    {
        // No guardar en BD por ahora. Solo simular validación y mostrar mensaje.
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'price' => 'required|numeric|min:0',
            'brand' => 'required|string|max:255',
            'image' => 'nullable|url',
        ]);

        return back()->with('status', 'Producto recibido (no guardado).');
    }

    public function getProduct($idProducto, $category = 'General')
    {
        $products = $this->sampleProducts();
        $product = collect($products)->firstWhere('id', (int)$idProducto);
        if (!$product) {
            abort(404);
        }
        return view('show', compact('product', 'category'));
    }
}
