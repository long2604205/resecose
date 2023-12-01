<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // $collection = Product::all(); // Lấy danh sách các bản ghi từ database và trả về một Collection
        // $total = $collection->count(); // Đếm số phần tử trong Collection
        $total = Product::whereIn('status', [1, 2])->count();


        $list = Product::where(function ($query) {
            $query->where('status', '>=', 1)
                ->orwhere('status', 2);
        })->get();
        $data = [
            'list' => $list,
            'title' => 'List of Product',
            'total' => $total,
        ];
        return view('admin.product.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $category = Category::where(function ($query) {
            $query->where('status', 1);
        })->get();
        $supplier = Supplier::where(function ($query) {
            $query->where('status', 1);
        })->get();
        $data = [
            'pagename' => 'ADD NEW PRODUCT',
            'method' => 'POST',
            'action' => route('product.store'),
            'list' => $category,
            'brand' => $supplier,
        ];
        return view('admin.product.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // dd($request);
        Product::insert([
            'name' => $request->name,
            'alias' => $request->alias,
            'price' => $request->price,
            'qty' => $request->qty,
            'size' => $request->size,
            'category_id' => $request->category,
            'supplier_id' => '1',
            'status' => $request->status,
            'description' => $request->description,
            'content' => $request->content,
            'image' => $request->image,
        ]);
        if ($request->button == 1) {
            return redirect()->route('product.index');
        } else {
            return redirect()->route('product.create')->with(['type' => 'danger', 'msg' => 'Add product failed']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $detail = Product::where('id', $id)->first();
        if (!$detail) {
            return redirect()->route('product.index');
        }
        $img = Image::where('product_id', $id)->get();
        $data = [
            'pagename' => 'Product Detail',
            'detail' => $detail,
            'img' => $img,
        ];
        return view('admin.product.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $item = Product::where('id', $id)->first();
        if (!$item) {
            return redirect()->route('product.index');
        }
        $category = Category::where(function ($query) {
            $query->where('status', 1);
        })->get();
        $supplier = Supplier::where(function ($query) {
            $query->where('status', 1);
        })->get();
        $data = [
            'pagename' => 'EDIT PRODUCT - ' . $item->name,
            'method' => 'PUT',
            'action' => route('product.update', $item->id),
            'items' => $item,
            'list' => $category,
            'brand' => $supplier,
        ];
        return view('admin.product.form', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        // dd($request->image);
        $item = Product::where('id', $id)->first();
        if (!$item) {
            return redirect()->route('product.index');
        }
        Product::where('id', $id)->update([
            'name' => $request->name,
            'alias' => $request->alias,
            'price' => $request->price,
            'qty' => $request->qty,
            'size' => $request->size,
            'category_id' => $request->category,
            'supplier_id' => $request->supplier,
            'status' => $request->status,
            'description' => $request->description,
            'content' => $request->content,
            'image' => $request->image,
        ]);
        if ($request->button == 1) {
            return redirect()->route('product.index');
        } else {
            return redirect()->route('product.index')->with(['type' => 'danger', 'msg' => 'Update product failed']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Product::where('id', $id)->update([
            'status' => 0,
        ]);
        return redirect()->route('product.index');
    }
    /**
     * Add images for Product
     */
    public function createImage(string $id)
    {
        //
        $detail = Product::where('id', $id)->first();
        if (!$detail) {
            return redirect()->route('product.index');
        }
        $img = Image::where('product_id', $id)->get();
        $data = [
            'pagename' => 'Add Product Image',
            'detail' => $detail,
            'img' => $img,
            'method' => 'POST',
            'action' => route('product.storeImage'),
        ];
        return view('admin.product.image', $data);
    }
    public function storeImage(Request $request)
    {
        //
        // dd($request);
        Image::insert([
            'product_id' => $request->product_id,
            'img' => $request->image,
        ]);
        return redirect()->route('product.createImage', $request->product_id);
    }
    /**
     * Remove Product's Image
     */
    public function remove(string $id)
    {
        //
        $detail = Image::where('id', $id)->get();
        foreach ($detail as $value) {
            $pro = $value->product_id;
            Image::where('id', $id)->delete();
            return redirect()->route('product.createImage', $pro);
        }
    }
}
