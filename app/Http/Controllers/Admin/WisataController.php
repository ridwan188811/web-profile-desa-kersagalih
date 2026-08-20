<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Wisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WisataController extends Controller
{
    public function index()
    {
        $wisatas = Wisata::latest()->get();
        return view('admin.wisata.index', compact('wisatas'));
    }

    public function create()
    {
        return view('admin.wisata.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('wisata', 'public');
        }

        Wisata::create($data);

        return redirect()->route('admin.wisata.index')->with('success', 'Data wisata desa berhasil ditambahkan!');
    }

    public function edit(Wisata $wisata)
    {
        return view('admin.wisata.edit', compact('wisata'));
    }

    public function update(Request $request, Wisata $wisata)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            if ($wisata->image && Storage::disk('public')->exists($wisata->image)) {
                Storage::disk('public')->delete($wisata->image);
            }
            $data['image'] = $request->file('image')->store('wisata', 'public');
        }

        $wisata->update($data);

        return redirect()->route('admin.wisata.index')->with('success', 'Data wisata desa berhasil diperbarui!');
    }

    public function destroy(Wisata $wisata)
    {
        if ($wisata->image && Storage::disk('public')->exists($wisata->image)) {
            Storage::disk('public')->delete($wisata->image);
        }
        $wisata->delete();

        return redirect()->route('admin.wisata.index')->with('success', 'Data wisata desa berhasil dihapus!');
    }
}
