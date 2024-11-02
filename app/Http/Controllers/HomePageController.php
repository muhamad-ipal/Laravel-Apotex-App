<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $medicines = Medicine::all();
        
        $categories = [
            ['label' => 'Tablet', 'img' => 'tablet.jpg'],
            ['label' => 'kapsul', 'img' => 'kapsul.jpg'],
            ['label' => 'sirup', 'img' => 'sirup.jpg'],
            ['label' => 'serbuk', 'img' => 'serbuk.jpg'],
            ['label' => 'gel', 'img' => 'gel.jpg'],
        ];

        return view('homePage.index', compact('categories', 'medicines'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
