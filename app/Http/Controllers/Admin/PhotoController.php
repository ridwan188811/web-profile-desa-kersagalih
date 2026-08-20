<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    public function store(Request $request, Album $album)
    {
        $request->validate([
            'images' => 'required|array',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'caption' => 'nullable|string|max:255',
        ]);

        foreach ($request->file('images') as $image) {
            $imagePath = $image->store('photos', 'public');
            
            $album->photos()->create([
                'image_path' => $imagePath,
                'caption' => $request->caption,
            ]);
        }

        return redirect()->route('admin.albums.show', $album->id)->with('success', count($request->file('images')) . ' Foto berhasil diunggah ke album!');
    }

    public function destroy(Album $album, Photo $photo)
    {
        // Validasi tambahan memastikan foto memang milik album ini
        if ($photo->album_id == $album->id) {
            if ($photo->image_path && Storage::disk('public')->exists($photo->image_path)) {
                Storage::disk('public')->delete($photo->image_path);
            }
            $photo->delete();
            return redirect()->route('admin.albums.show', $album->id)->with('success', 'Foto berhasil dihapus dari album!');
        }

        return redirect()->route('admin.albums.show', $album->id)->with('error', 'Gagal menghapus foto.');
    }
}
