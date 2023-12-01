<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class LaundryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = [
            'title' => 'Danh sách',
            'active' => 'product',
            'method' => 'POST',
            'action' => route('laundry.store'),
        ];
        return view('client.service.laundry', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        // $data = [
        //     'method' => 'POST',
        //     'action' => route('laundry.store'),
        // ];
        // return view('client.service.laundry', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // dd($request);
        Service::insert([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'weight' => $request->weight,
            'cost' => $request->cost,
            'note' => $request->note ?? 'NA',
        ]);
        return redirect()->route('laundry.index')->with([
            'type' => 'info',
            'msg' => 'Service request successful!',
            'text' => 'We will contact you in a few minutes.'
        ]);
        // if ($request->button == 1) {
        //     return redirect()->route('laundry.index')->with(['type' => 'success', 'msg' => 'Add product suecess']);
        // } else {
        //     return redirect()->route('laundry.create')->with(['type' => 'danger', 'msg' => 'Add product failed']);
        // }
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