<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Fix;
use Illuminate\Http\Request;

class ClothesServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $total = Fix::whereIn('status', [1, 2])->count();
        //
        $list = Fix::where(function ($query) {
            $query->where('status', 1);
        })->get();
        $data = [
            'title' => 'List of Fix Clothes Order',
            'list' => $list,
            'total' => $total,
        ];
        return view('admin.fix-clothes.list', $data);
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
        $detail = Fix::where('id', $id)->first();
        if (!$detail) {
            return redirect()->route('fix-clothes-service.index');
        }
        //
        $fix = Fix::findOrFail($id);
        // Decode the JSON data
        $images = json_decode($fix->images);

        // foreach ($images as $image) {
        //     echo '<img src="' . asset($image) . '" />';
        // }
        $data = [
            'pagename' => 'Fix Clothe Detail',
            'detail' => $detail,
            'image' => $images
        ];
        return view('admin.fix-clothes.detail', $data);
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
        Fix::where('id', $id)->update([
            'status' => 0,
        ]);
        return redirect()->route('fix-clothes-service.index');
    }
}
