<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $total = Order::whereIn('status', [1, 2])->count();
        //
        $list = Order::where(function ($query) {
            $query->where('status', 1);
        })->get();
        $data = [
            'title' => 'List of Order',
            'list' => $list,
            'total' => $total,
        ];
        return view('admin.order.list', $data);
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
        // $order = OrderItem::find($id);
        // $order = OrderItem::where('status', [1, 2])->count();
        $orders = OrderItem::where('order_id', $id)
            ->whereIn('status', [1, 2])
            ->get();
        // dd($order);
        $detail = Order::where('id', $id)->first();
        if (!$detail) {
            return redirect()->route('order-list.index');
        }
        $data = [
            'pagename' => 'Order Detail',
            'detail' => $detail,
            'order' => $orders,
        ];
        return view('admin.order.detail', $data);
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
        Order::where('id', $id)->update([
            'status' => 0,
        ]);
        OrderItem::where('order_id', $id)->update([
            'status' => 0,
        ]);
        return redirect()->route('order-list.index');
    }
}
