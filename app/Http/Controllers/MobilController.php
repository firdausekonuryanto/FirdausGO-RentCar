<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use Illuminate\Http\Request;

class MobilController extends Controller
{
    public function index()
    {
        $mobils = Mobil::all();
        $title = 'Halaman Pemesanan Mobil';
             return view('mobils.index', compact('mobils','title'));
    }

    public function create()
    {
        $title = 'Halaman Simpan Mobil';
        return view('mobils.create', compact('title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'merek' => 'required',
            'model' => 'required',
            'no_plat' => 'required',
            'tarif' => 'required',
        ]);

        Mobil::create($request->all());

        return redirect()->route('mobils.index')
            ->with('success', 'Mobil created successfully.');
    }

    public function show(Mobil $mobil)
    {
        return view('mobils.show', compact('mobil'));
    }

    // public function edit(Mobil $mobil)
    // {
    //     return view('mobils.edit', compact('mobil'));
    // }

    public function edit($id)
{
    $mobil = Mobil::find($id);
    $title = 'Halaman Simpan Mobil';
    return view('mobils.edit', compact('mobil','title'));
}


    public function update(Request $request, Mobil $mobil)
    {
        $request->validate([
            'merek' => 'required',
            'model' => 'required',
            'no_plat' => 'required',
            'tarif' => 'required',
        ]);

        $mobil->update($request->all());

        return redirect()->route('mobils.index')
            ->with('success', 'Mobil updated successfully.');
    }

    public function destroy(Mobil $mobil)
    {
        $mobil->delete();

        return redirect()->route('mobils.index')
            ->with('success', 'Mobil deleted successfully.');
    }
}