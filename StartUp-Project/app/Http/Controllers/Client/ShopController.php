<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $category = Category::where(function ($query) {
            $query->where('status', 1);
        })->get();
        $supplier = Supplier::where(function ($query) {
            $query->where('status', 1);
        })->get();
        $list = Product::where(function ($query) {
            $query->where('status', 1);
        })->paginate(9);
        $data = [
            'list' => $list,
            'category' => $category,
            'branding' => $supplier,
        ];
        return view('client.product.list', $data);
    }

    public function clothes()
    {
        //
        $shopclothes = Product::where([
            'status' => 1
        ])->whereNotIn('category_id', [11])->limit(9)->get();
        dd($shopclothes);

        $category = Category::where(function ($query) {
            $query->where('status', 1);
        })->get();
        $data = [
            'list' => $shopclothes,
            'category' => $category,
        ];
        return view('client.product.list', $data);
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
    public function show(string $catename)
    {
        //
        $category = Category::where(function ($query) {
            $query->where('status', 1);
        })->get();
        $supplier = Supplier::where(function ($query) {
            $query->where('status', 1);
        })->get();


        // $id = Category::where([
        //     'name' => $catename
        // ])->get('id');

        $catedata =  DB::table('categories')
            ->select('*')
            ->where('name', '=', $catename)
            ->get();

        $ids = $catedata->pluck('id');

        $id = $ids->first();

        $list = Product::where([
            'category_id' => $id,
            'status' => 1
        ])->paginate(9);


        // $list = Product::where(function ($query) {
        //     $query->where('status', 1);
        // })->paginate(1);


        $data = [
            'list' => $list,
            'category' => $category,
            'branding' => $supplier,
        ];
        return view('client.product.show', $data);
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
    ///
    public function shows(string $catename)
    {
        //
        $category = Category::where(function ($query) {
            $query->where('status', 1);
        })->get();
        $supplier = Supplier::where(function ($query) {
            $query->where('status', 1);
        })->get();


        // $id = Category::where([
        //     'name' => $catename
        // ])->get('id');

        $catedata =  DB::table('categories')
            ->select('*')
            ->where('name', '=', $catename)
            ->get();

        $ids = $catedata->pluck('id');

        $id = $ids->first();

        $list = Product::where([
            'category_id' => $id,
            'status' => 1
        ])->paginate(9);


        // $list = Product::where(function ($query) {
        //     $query->where('status', 1);
        // })->paginate(1);


        $data = [
            'list' => $list,
            'category' => $category,
            'branding' => $supplier,
        ];
        return view('client.product.show', $data);
    }
}
