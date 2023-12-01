<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Product::where([
            'status' => 1,
        ])->whereNotIn('category_id', [11])->limit(8)->get();
        // $listhand = Product::where(function ($query) {
        //     $query->where('status', 1)
        //         ->andWhere('category_id', 11);
        // })->get();
        $shopclothes = Product::where([
            'status' => 1
        ])->whereNotIn('category_id', [11])->get();
        ///
        $listhand = Product::where([
            'status' => 1,
            'category_id' => 11,
        ])->limit(8)->get();
        $data = [
            'list' => $list,
            'listhand' => $listhand,
            'shophand' => 'Handmade',
            'shopclothes' => $shopclothes,
        ];
        return view('client.home.home', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('client.home.about');
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