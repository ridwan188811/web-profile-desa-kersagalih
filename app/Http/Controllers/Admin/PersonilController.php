<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Personil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PersonilController extends Controller
{
    public function index(Request $request)
    {
        $query = Personil::query();

        if ($request->has('category') && $request->category != '') {
            $query->where('category', $request->category);
        }

        $personils = $query->orderBy('order', 'asc')->get();
        $categories = Personil::select('category')->distinct()->pluck('category');
        $bagans = \App\Models\Setting::where('key', 'like', 'bagan_%')->get()->pluck('value', 'key')->toArray();

        return view('admin.personils.index', compact('personils', 'categories', 'bagans'));
    }

    public function create()
    {
        $categories = Personil::select('category')->distinct()->pluck('category');
        return view('admin.personils.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required',
            'position' => 'required|string|max:255',
            'period' => 'nullable|string|max:100',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'order' => 'integer|min:0',
        ]);

        $data = $request->all();
        


        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('personils', 'public');
            $data['image'] = $imagePath;
        }

        Personil::create($data);

        return redirect()->route('admin.personils.index')->with('success', 'Data personil berhasil ditambahkan!');
    }

    public function edit(Personil $personil)
    {
        $categories = Personil::select('category')->distinct()->pluck('category');
        return view('admin.personils.edit', compact('personil', 'categories'));
    }

    public function update(Request $request, Personil $personil)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required',
            'position' => 'required|string|max:255',
            'period' => 'nullable|string|max:100',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'order' => 'integer|min:0',
        ]);

        $data = $request->all();
        
        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            if ($personil->image && Storage::disk('public')->exists($personil->image)) {
                Storage::disk('public')->delete($personil->image);
            }
            $imagePath = $request->file('image')->store('personils', 'public');
            $data['image'] = $imagePath;
        }

        $personil->update($data);

        return redirect()->route('admin.personils.index')->with('success', 'Data personil berhasil diperbarui!');
    }

    public function destroy(Personil $personil)
    {
        if ($personil->image && Storage::disk('public')->exists($personil->image)) {
            Storage::disk('public')->delete($personil->image);
        }
        $personil->delete();

        return redirect()->route('admin.personils.index')->with('success', 'Data personil berhasil dihapus!');
    }

    public function uploadBagan(Request $request)
    {
        $request->validate([
            'bagan_category' => 'required|string',
            'bagan_image' => 'required|image|mimes:jpeg,png,jpg,webp|max:5120',
        ]);

        $category = Str::slug($request->bagan_category);
        $fileName = 'struktur-' . $category . '.' . $request->file('bagan_image')->getClientOriginalExtension();
        
        // Save to public/structures directory
        $path = $request->file('bagan_image')->storeAs('structures', $fileName, 'public');

        \App\Models\Setting::updateOrCreate(
            ['key' => 'bagan_' . $category],
            ['value' => $path]
        );

        return redirect()->route('admin.personils.index')->with('success', 'Gambar bagan struktur ' . $request->bagan_category . ' berhasil diunggah!');
    }

    public function deleteBagan($category)
    {
        $setting = \App\Models\Setting::where('key', 'bagan_' . $category)->first();
        if ($setting) {
            if (Storage::disk('public')->exists($setting->value)) {
                Storage::disk('public')->delete($setting->value);
            }
            $setting->delete();
            return redirect()->route('admin.personils.index')->with('success', 'Gambar bagan struktur berhasil dihapus!');
        }
        return redirect()->route('admin.personils.index')->with('error', 'Gambar bagan tidak ditemukan.');
    }
}
