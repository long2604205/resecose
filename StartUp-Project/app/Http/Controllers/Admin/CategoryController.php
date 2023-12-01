<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $total = Category::whereIn('status', [1, 2])->count();

        //
        $list = Category::where(function ($query) {
            $query->where('status', 1);
        })->get();
        $data = [
            'title' => 'List of Category',
            'list' => $list,
            'total' => $total,
        ];
        return view('admin.category.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $data = [
            'pagename' => 'ADD NEW CATEGORY',
            'method' => 'POST',
            'action' => route('category.store'),
        ];
        return view('admin.category.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        Category::insert([
            'name' => $request->name,
            'status' => $request->status,
        ]);
        if ($request->button == 1) {
            return redirect()->route('category.index');
        } else {
            return redirect()->route('category.create')->with(['type' => 'danger', 'msg' => 'Add category failed']);
        }
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
        $item = Category::where('id', $id)->first();
        if (!$item) {
            return redirect()->route('category.index');
        }
        $data = [
            'pagename' => 'EDIT CATEGORY - ' . $item->name,
            'method' => 'PUT',
            'action' => route('category.update', $item->id),
            'items' => $item,
        ];
        return view('admin.category.form', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $item = Category::where('id', $id)->first();
        if (!$item) {
            return redirect()->route('product.index');
        }
        Category::where('id', $id)->update([
            'name' => $request->name,
            'status' => $request->status,
        ]);
        if ($request->button == 1) {
            return redirect()->route('category.index');
        } else {
            return redirect()->route('category.index')->with(['type' => 'danger', 'msg' => 'Update category failed']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Category::where('id', $id)->update([
            'status' => 0,
        ]);
        return redirect()->route('category.index');
    }
}