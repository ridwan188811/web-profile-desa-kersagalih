<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Potensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PotensiController extends Controller
{
    public function index()
    {
        $potensis = Potensi::latest()->get();
        return view('admin.potensis.index', compact('potensis'));
    }

    public function create()
    {
        return view('admin.potensis.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('potensis', 'public');
        }

        Potensi::create($data);

        return redirect()->route('admin.potensis.index')->with('success', 'Data potensi desa berhasil ditambahkan!');
    }

    public function edit(Potensi $potensi)
    {
        return view('admin.potensis.edit', compact('potensi'));
    }

    public function update(Request $request, Potensi $potensi)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            if ($potensi->image && Storage::disk('public')->exists($potensi->image)) {
                Storage::disk('public')->delete($potensi->image);
            }
            $data['image'] = $request->file('image')->store('potensis', 'public');
        }

        $potensi->update($data);

        return redirect()->route('admin.potensis.index')->with('success', 'Data potensi desa berhasil diperbarui!');
    }

    public function destroy(Potensi $potensi)
    {
        if ($potensi->image && Storage::disk('public')->exists($potensi->image)) {
            Storage::disk('public')->delete($potensi->image);
        }
        $potensi->delete();

        return redirect()->route('admin.potensis.index')->with('success', 'Data potensi desa berhasil dihapus!');
    }
}
