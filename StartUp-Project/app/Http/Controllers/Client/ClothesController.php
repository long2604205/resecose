<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Fix;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;



class ClothesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'method' => 'POST',
            'action' => route('fix-clothes.store'),
        ];
        return view('client.service.clothes', $data);
        // if ($request->hasFile('image')) {
        //     $image = $request->file('image');
        //     $imageName = time() . '_' . $image->getClientOriginalName();
        //     $image->move(public_path('uploads'), $imageName);
        // }
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

        $images = array();
        // if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {
            $filename = time() . '_' . $image->getClientOriginalName();
            $path = $image->storeAs('public/uploads', $filename);
            $url = Storage::url($path);
            $images[] = $url;
            // }
        }

        Fix::insert([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'clothes' => $request->clothes,
            'type' => $request->type_fix,
            'note' => $request->note ?? 'NA',
            'images' => json_encode($images),


        ]);
        return redirect()->route('fix-clothes.index')->with([
            'type' => 'info',
            'msg' => 'Service request successful!',
            'text' => 'We will contact you in a few minutes.'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $fix = Fix::findOrFail($id);

        // Decode the JSON data
        $images = json_decode($fix->images);

        foreach ($images as $image) {
            echo '<img src="' . asset($image) . '" />';
        }
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
