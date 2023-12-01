<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index()
    {
        $data = [
            'title' => 'Danh sách',
            'active' => 'product'
        ];
        return view('client.product.index', $data);
    }
    public function detail(string $alias, $id)
    {
        $detail = Product::where(['status' => 1, 'alias' => $alias, 'id' => $id])->first();
        // if (!$detail) {
        //     return redirect()->route('pro.index');
        // }
        $img = Image::where('product_id', $id)->get();
        $list = Product::where([
            'status' => 1
        ])->limit(4)->get();
        $data = [
            'pagename' => 'Product Detail',
            'detail' => $detail,
            'img' => $img,
            'product' => $list,
        ];
        return view('client.product.detail', $data);
    }
}