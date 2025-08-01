<?php

namespace App\Http\Controllers;

use App\Models\KategoriItem;
use Illuminate\Http\Request;

class KategoriItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = KategoriItem::with('masterItems');
        if (request()->filled('kode')) {
            $query->where('kode', 'like', '%' . request('kode') . '%');
        }
        if (request()->filled('nama')) {
            $query->where('nama', 'like', '%' . request('nama') . '%');
        }
        $kategoris = $query->orderBy('id', 'desc')->paginate(10)->appends(request()->all());
        return view('kategori_items.index', compact('kategoris'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = new KategoriItem();
        $method = 'new';
        return view('kategori_items.form', compact('kategori', 'method'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|unique:kategori_items,kode',
            'nama' => 'required',
        ]);
        KategoriItem::create($request->only('kode', 'nama'));
        return redirect()->route('kategori-items.index')->with('success', 'Kategori berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kategori = KategoriItem::with('masterItems')->findOrFail($id);
        return view('kategori_items.show', compact('kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategori = KategoriItem::findOrFail($id);
        $method = 'edit';
        return view('kategori_items.form', compact('kategori', 'method'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kategori = KategoriItem::findOrFail($id);
        $request->validate([
            'kode' => 'required|unique:kategori_items,kode,' . $kategori->id,
            'nama' => 'required',
        ]);
        $kategori->update($request->only('kode', 'nama'));
        return redirect()->route('kategori-items.index')->with('success', 'Kategori berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kategori = KategoriItem::findOrFail($id);
        $kategori->delete();
        return redirect()->route('kategori-items.index')->with('success', 'Kategori berhasil dihapus');
    }
}
