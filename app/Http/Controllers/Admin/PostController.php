<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('category', 'user')->latest()->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::where('is_custom', false)->get();
        return view('admin.posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required',
            'custom_category_name' => 'required_if:category_id,custom|max:100',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:draft,published',
        ]);

        $categoryId = $request->category_id;
        if ($categoryId === 'custom') {
            $category = Category::firstOrCreate(
                ['name' => $request->custom_category_name],
                ['slug' => Str::slug($request->custom_category_name), 'is_custom' => true]
            );
            $categoryId = $category->id;
        } else {
            $request->validate(['category_id' => 'exists:categories,id']);
        }

        $data = $request->except(['image', 'custom_category_name']);
        $data['category_id'] = $categoryId;
        $data['slug'] = Str::slug($request->title);
        $data['user_id'] = Auth::id() ?? 1; // Fallback to 1 if not logged in (for testing)

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('posts', 'public');
            $data['image'] = $imagePath;
        }

        Post::create($data);

        return redirect()->route('admin.posts.index')->with('success', 'Berita berhasil ditambahkan!');
    }

    public function edit(Post $post)
    {
        $categories = Category::where('is_custom', false)->get();
        return view('admin.posts.edit', compact('post', 'categories'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required',
            'custom_category_name' => 'required_if:category_id,custom|max:100',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:draft,published',
        ]);

        $categoryId = $request->category_id;
        if ($categoryId === 'custom') {
            $category = Category::firstOrCreate(
                ['name' => $request->custom_category_name],
                ['slug' => Str::slug($request->custom_category_name), 'is_custom' => true]
            );
            $categoryId = $category->id;
        } else {
            $request->validate(['category_id' => 'exists:categories,id']);
        }

        $data = $request->except(['image', 'custom_category_name']);
        $data['category_id'] = $categoryId;
        $data['slug'] = Str::slug($request->title);

        if ($request->hasFile('image')) {
            // Delete old image
            if ($post->image && Storage::disk('public')->exists($post->image)) {
                Storage::disk('public')->delete($post->image);
            }
            $imagePath = $request->file('image')->store('posts', 'public');
            $data['image'] = $imagePath;
        }

        $post->update($data);

        return redirect()->route('admin.posts.index')->with('success', 'Berita berhasil diperbarui!');
    }

    public function destroy(Post $post)
    {
        if ($post->image && Storage::disk('public')->exists($post->image)) {
            Storage::disk('public')->delete($post->image);
        }
        
        $post->delete();

        return redirect()->route('admin.posts.index')->with('success', 'Berita berhasil dihapus!');
    }
}
