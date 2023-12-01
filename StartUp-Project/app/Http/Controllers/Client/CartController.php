<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //
    public function index()
    {
        $data = [
            'title' => 'G',
            'active' => 'home',
            'list' => session('cart')
        ];
        //dd(session('cart'));
        return view('client.cart.index', $data);
    }
    //
    public function addtocart(string $id)
    {
        //dd($id);
        $item = Product::where(['status' => 1, 'id' => $id])->first();
        if (!$item)
            return redirect()->back()->with(['type' => 'danger', 'msg' => 'Product not found.']);
        //kiem tra so luong
        //dd($item->qty);
        if (!$item->qty)
            return redirect()->back()->with(['type' => 'danger', 'msg' => 'Out of stock']);
        $cart = session('cart');
        if (isset($cart[$id])) {
            if ($item->qty >=  ($cart[$id]['buyqty'] + 1)) {
                $cart[$id]['buyqty'] += 1;
            } else
                return redirect()->back()->with(['type' => 'danger', 'msg' => 'The product is no longer enough']);
        } else {
            $cart[$id] = [
                'id' => $id,
                'image' => $item->image,
                'name' => $item->name,
                'price' => $item->price,
                'qty' => $item->qty,
                'buyqty' => 1
            ];
        }
        //ghi vao gio hàng session
        session(['cart' => $cart]);
        return redirect()->back()->with(['type' => 'success', 'msg' => 'Add to cart successfully']);
    }
    //
    public function removeitem($id)
    {
        //dd($id);
        $item = Product::where(['status' => 1, 'id' => $id])->first();
        if (!$item)
            return redirect()->back()->with(['type' => 'danger', 'msg' => 'Product not found']);
        //kiem tra so luong
        //dd($item->qty);
        if (!$item->qty)
            return redirect()->back()->with(['type' => 'danger', 'msg' => 'Out of stock']);
        $cart = session('cart');
        if (isset($cart[$id])) {
            unset($cart[$id]);
        }
        //ghi vao gio hàng session
        session(['cart' => $cart]);
        return redirect()->back()->with(['type' => 'success', 'msg' => 'Remove successfully']);
    }
    //
    public function update(Request $request)
    {
        if (!is_array($request->qty) || !$request->qty)
            return redirect()->back()->with(['type' => 'danger', 'msg' => 'Data errors']);
        $cart = session('cart');
        //kiem tra so luong
        $msg = '';
        foreach ($request->qty as $id => $qty) {
            if (isset($cart[$id]) && $cart[$id]['qty'] >= $qty) {
                $cart[$id]['buyqty'] = $qty;
            } else {
                $msg .= $cart[$id]['name'] . ' Data errors or the product is no longer enough<br>';
            }
        }
        //ghi vao gio hàng session
        session(['cart' => $cart]);
        return redirect()->back()->with(['type' => $msg ? 'danger' : 'success', 'msg' => !$msg ? 'Update successfully' : $msg]);
    }
}
