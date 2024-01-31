<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tab;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreTabRequest;
use App\Http\Requests\UpdateTabRequest;
use App\Http\Middleware\CheckRole;


class TabController extends Controller
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
        return view('tabs.index', [
            'tabs' => Tab::latest()->paginate(4)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        return view('tabs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTabRequest $request) : RedirectResponse
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
        Tab::create($validatedData);
        return redirect()->route('tabs.index')->withSuccess('Tab has been added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tab $tab) : View
    {
        return view('tabs.show', [
            'tab' => $tab
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tab $tab) : View
    {
        return view('tabs.edit', [
            'tab' => $tab
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTabRequest $request, Tab $tab) : RedirectResponse
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
        $tab->update($validatedData);
        return redirect()->back()->withSuccess('Tab has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tab $tab) : RedirectResponse
    {
        $tab->delete();
        return redirect()->route('tabs.index')->withSuccess('Tab has been deleted.');
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $tab = Tab::where('title', 'like', '%' . $search . '%')->paginate();

        return view('tabs.index', ['tabs' => $tab]);
    }
}
