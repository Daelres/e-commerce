<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create(){
        return view('admin.category.create');
    }

    public function store(Request $request){
       // dd($request->all());

        Category::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return "Se guardo exitosamente";
    }
}
