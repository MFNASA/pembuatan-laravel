<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class categoriesController extends Controller
{
    public function index()
{
    $categories = Category::all(); // ambil semua kategori
    return view('categories.index', compact('categories'));
}


    // Di CategoriesController.php
public function create()
{
    return view('dashboard.categories.create'); // huruf kecil semua
}


    public function store(Request $request)
    {
        // Validasi dan simpan kategori ke database
        // Contoh:
        // $request->validate([
        //     'name' => 'required|string|max:255',
        // ]);
        // Category::create($request->all());

        return redirect()->route('categories.index')->with('success', 'Kategori berhasil ditambahkan!');
    }
}
