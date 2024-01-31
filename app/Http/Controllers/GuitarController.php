<?php

namespace App\Http\Controllers;

use App\Models\Guitar;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreGuitarRequest;
use App\Http\Requests\UpdateGuitarRequest;

class GuitarController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin')->only(['create', 'store', 'edit', 'update', 'destroy']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        return view('guitars.index', [
            'guitars' => Guitar::latest()->paginate(6)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('guitars.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGuitarRequest $request) : RedirectResponse
    {
        $validatedData = $request->validated();

        // Cek apakah ada file yang diunggah
        if ($request->hasFile('images')) {
            $filename = round(microtime(true)) . '-' . str_replace(' ', '-', $request->file('images')->getClientOriginalName());
            
            // Pindahkan file ke direktori yang ditentukan
            $request->file('images')->move(public_path('images'), $filename);

            // Simpan nama file ke dalam data yang akan disimpan ke database
            $validatedData['images'] = $filename;
        }
        Guitar::create($validatedData);
        return redirect()->route('guitars.index')->withSuccess('Guitar has been added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Guitar $guitar) : View
    {
        return view('guitars.show', [
            'guitar' => $guitar
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Guitar $guitar) : View
    {
        return view('guitars.edit', [
            'guitar' => $guitar
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGuitarRequest $request, Guitar $guitar) : RedirectResponse
    {
        $validatedData = $request->validated();

        // Cek apakah ada file yang diunggah
        if ($request->hasFile('images')) {
            $filename = round(microtime(true)) . '-' . str_replace(' ', '-', $request->file('images')->getClientOriginalName());
            
            // Pindahkan file ke direktori yang ditentukan
            $request->file('images')->move(public_path('images'), $filename);

            // Simpan nama file ke dalam data yang akan disimpan ke database
            $validatedData['images'] = $filename;
        }
        $guitar->update($validatedData);
        return redirect()->back()->withSuccess('Guitar has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Guitar $guitar) : RedirectResponse
    {
        $guitar->delete();
        return redirect()->route('guitars.index')->withSuccess('Guitar has been deleted.');
    }
}
