<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    //
    public function checkout()
    {
        $count = count(session('cart') ?? []);
        if ($count == 0)
            return redirect()->route('cart.index');
        $data = [
            'list' => session('cart')
        ];
        return view('client.order.form', $data);
    }
    //
    public function checkoutPost(Request $request)
    {
        // dd($request);
        $cart = collect(array_values(session('cart')));
        $count = count(session('cart'));
        if ($count == 0)
            return redirect()->route('cart.index');
        // $order = Order::create();
        $order = new Order();

        $order->code = Str::random(10);
        $order->order_date = now();
        $order->total_amount = $cart->sum(function ($i) {
            return $i['buyqty'] * $i['price'];
        });
        $order->order_notes = $request->notes ?? 'N/A';
        $order->name = $request->name;
        $order->address = $request->address;
        $order->city = $request->city;
        $order->phone = $request->phone;
        $order->email = $request->email;

        if ($order->save()) {
            //them chi tiet
            foreach ($cart as $item) {
                OrderItem::insert([
                    'product_id' => $item['id'],
                    'order_id' => $order->id,
                    'qty' => $item['buyqty'],
                    'price' => $item['price']
                ]);
                //trừ kho
                Product::where('id', $item['id'])->update([
                    'qty' => \DB::raw('qty-' . $item['buyqty'])
                ]);
            };
            //xoa session cart
            session(['cart' => []]);
            //xong roi gui mail
            return redirect()->route('checkout.alert')->with(['ordered' => $order]);
        }
        return redirect()->back()->with(['type' => 'danger', 'msg' => 'Check Out failed']);



        $data = [
            'list' => session('cart')
        ];
        return view('client.order.form', $data);
    }
    public function alert()
    {
        $order = session('ordered');
        if (!$order)
            return redirect()->route('cart.index');
        $data = [
            'order' => $order
        ];
        //dd(session('cart'));
        return view('client.order.alert', $data);
    }
}
