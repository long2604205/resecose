<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class LaundryServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $total = Service::whereIn('status', [1, 2])->count();
        //
        $list = Service::where(function ($query) {
            $query->where('status', 1);
        })->get();
        $data = [
            'title' => 'List of Laundry Order',
            'list' => $list,
            'total' => $total,
        ];
        return view('admin.laundry.list', $data);
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
        //
        Service::where('id', $id)->update([
            'status' => 0,
        ]);
        return redirect()->route('laundry-service.index');
    }
}
