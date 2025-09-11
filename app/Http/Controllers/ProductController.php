<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    function index(){
        return view('index');
    }

    function create(){
        return view('create');
    }

    function getProduct($idProducto, $category = "General"){
        return view('show', compact('idProducto', 'category'));
    }
}
