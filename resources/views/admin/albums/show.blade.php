<x-admin-layout>
    
    <div class="flex flex-col md:flex-row md:items-start justify-between gap-6 mb-8">
        <div class="flex items-start gap-4">
            <a href="{{ route('admin.albums.index') }}" class="p-2 mt-1 bg-white border border-slate-200 rounded-xl hover:bg-slate-50 transition-colors text-slate-500 hover:text-[#1e3a8a] shrink-0">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            </a>
            <div>
                <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-800 tracking-tight">{{ $album->title }}</h1>
                <p class="text-slate-500 mt-1 max-w-2xl">{{ $album->description ?: 'Tidak ada deskripsi' }}</p>
                <div class="mt-3 flex items-center gap-3">
                    <span class="bg-blue-50 text-[#1e3a8a] px-3 py-1 rounded-lg text-sm font-bold">
                        Total: {{ $photos->count() }} Foto
                    </span>
                    @if($album->is_active)
                        <span class="bg-emerald-50 text-emerald-600 px-3 py-1 rounded-lg text-sm font-bold flex items-center gap-1.5">
                            <span class="w-2 h-2 rounded-full bg-emerald-500"></span> Publik
                        </span>
                    @else
                        <span class="bg-slate-100 text-slate-600 px-3 py-1 rounded-lg text-sm font-bold flex items-center gap-1.5">
                            <span class="w-2 h-2 rounded-full bg-slate-400"></span> Tersembunyi
                        </span>
                    @endif
                </div>
            </div>
        </div>
        <a href="{{ route('admin.albums.edit', $album->id) }}" class="inline-flex items-center justify-center gap-2 bg-white border border-slate-300 hover:bg-slate-50 text-slate-700 font-bold px-5 py-2.5 rounded-xl transition-colors shadow-sm shrink-0">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
            Edit Album
        </a>
    </div>

    @if ($errors->any())
        <div class="bg-red-50 text-red-600 px-4 py-3 rounded-xl text-sm mb-6 border border-red-100">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form Upload Foto -->
    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 sm:p-8 mb-8" x-data="{ filesCount: 0 }">
        <h2 class="text-lg font-bold text-slate-800 mb-4 flex items-center gap-2">
            <svg class="w-5 h-5 text-[#1e3a8a]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>
            Tambah Foto ke Album
        </h2>
        
        <form action="{{ route('admin.photos.store', $album->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-end">
                <!-- Area File Input -->
                <div class="w-full relative">
                    <label class="block text-sm font-bold text-slate-700 mb-2">Pilih Foto (Bisa lebih dari satu sekaligus) <span class="text-red-500">*</span></label>
                    <div class="relative w-full">
                        <input type="file" name="images[]" id="images" multiple required accept="image/jpeg,image/png,image/jpg" 
                            class="block w-full text-sm text-slate-500 file:mr-4 file:py-3 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-[#1e3a8a] hover:file:bg-blue-100 transition-all border border-slate-200 rounded-xl bg-slate-50 cursor-pointer"
                            @change="filesCount = $event.target.files.length">
                    </div>
                    <p class="text-xs text-slate-500 mt-2">Pilih beberapa file sekaligus dengan menahan tombol Ctrl (Windows) atau Command (Mac).</p>
                </div>

                <!-- Caption Bersama & Tombol -->
                <div class="w-full space-y-4">
                    <div>
                        <label for="caption" class="block text-sm font-bold text-slate-700 mb-2">Keterangan Foto (Opsional)</label>
                        <input type="text" name="caption" id="caption" class="block w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 focus:ring-2 focus:ring-[#1e3a8a] transition-all" placeholder="Misal: Suasana lomba tarik tambang">
                        <p class="text-xs text-slate-500 mt-1">Jika mengunggah banyak foto, keterangan ini akan diterapkan ke semua foto tersebut.</p>
                    </div>
                    
                    <button type="submit" class="w-full px-6 py-3 bg-[#1e3a8a] text-white font-bold rounded-xl hover:bg-blue-800 transition-colors shadow-md flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>
                        <span x-show="filesCount === 0">Mulai Unggah Foto</span>
                        <span x-show="filesCount > 0" x-cloak>Unggah <span x-text="filesCount"></span> Foto Terpilih</span>
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- Koleksi Foto -->
    <div>
        <h2 class="text-xl font-extrabold text-slate-800 mb-4">Koleksi Foto ({{ $photos->count() }})</h2>
        
        @if($photos->isEmpty())
            <div class="bg-slate-50 rounded-2xl border border-slate-200 border-dashed p-12 text-center">
                <svg class="w-12 h-12 text-slate-300 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                <p class="text-slate-500 font-medium">Belum ada foto di album ini.</p>
                <p class="text-sm text-slate-400 mt-1">Silakan gunakan form di atas untuk mulai mengunggah.</p>
            </div>
        @else
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4">
                @foreach($photos as $photo)
                    <div class="bg-white rounded-xl border border-slate-200 overflow-hidden group relative">
                        <a href="{{ asset('storage/' . $photo->image_path) }}" target="_blank" class="block aspect-square bg-slate-100 overflow-hidden">
                            <img src="{{ asset('storage/' . $photo->image_path) }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        </a>
                        
                        @if($photo->caption)
                            <div class="absolute bottom-0 inset-x-0 bg-gradient-to-t from-black/80 to-transparent p-3 pt-8">
                                <p class="text-white text-xs font-medium line-clamp-2 leading-tight">{{ $photo->caption }}</p>
                            </div>
                        @endif

                        <!-- Tombol Hapus -->
                        <form action="{{ route('admin.photos.destroy', [$album->id, $photo->id]) }}" method="POST" class="absolute top-2 right-2 opacity-0 group-hover:opacity-100 transition-opacity" onsubmit="return confirm('Hapus foto ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="w-8 h-8 bg-red-600 text-white rounded-lg flex items-center justify-center hover:bg-red-700 shadow-md" title="Hapus Foto">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                            </button>
                        </form>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

</x-admin-layout>
