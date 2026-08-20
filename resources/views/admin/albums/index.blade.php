<x-admin-layout>
    
    <div class="flex flex-col sm:flex-row sm:items-center justify-between mb-8 gap-4">
        <div>
            <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-800 tracking-tight">Galeri Foto</h1>
            <p class="text-slate-500 mt-1">Kelola album dan foto dokumentasi kegiatan desa.</p>
        </div>
        <a href="{{ route('admin.albums.create') }}" class="inline-flex items-center justify-center gap-2 bg-[#1e3a8a] hover:bg-blue-800 text-white font-bold px-6 py-3 rounded-xl transition-all shadow-md hover:shadow-lg hover:-translate-y-0.5">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            Buat Album Baru
        </a>
    </div>

    @if($albums->isEmpty())
        <!-- Empty State -->
        <div class="bg-white rounded-2xl border border-slate-200 p-12 text-center flex flex-col items-center justify-center">
            <div class="w-20 h-20 bg-slate-100 rounded-full flex items-center justify-center mb-4">
                <svg class="w-10 h-10 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
            </div>
            <h3 class="text-xl font-bold text-slate-800 mb-2">Belum Ada Album Foto</h3>
            <p class="text-slate-500 max-w-md mx-auto mb-6">Dokumentasikan kegiatan desa dengan membuat album terlebih dahulu, setelah itu Anda bisa mengunggah foto ke dalamnya.</p>
            <a href="{{ route('admin.albums.create') }}" class="px-6 py-3 bg-blue-50 text-[#1e3a8a] font-bold rounded-xl hover:bg-blue-100 transition-colors">
                Mulai Buat Album
            </a>
        </div>
    @else
        <!-- Grid Album -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach($albums as $album)
                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden group hover:shadow-lg transition-shadow relative flex flex-col">
                    
                    <!-- Status Badge -->
                    <div class="absolute top-3 right-3 z-10">
                        @if($album->is_active)
                            <span class="bg-emerald-500/90 backdrop-blur-sm text-white px-2.5 py-1 rounded-full text-xs font-bold shadow-sm">
                                Ditampilkan
                            </span>
                        @else
                            <span class="bg-slate-500/90 backdrop-blur-sm text-white px-2.5 py-1 rounded-full text-xs font-bold shadow-sm">
                                Disembunyikan
                            </span>
                        @endif
                    </div>

                    <!-- Cover Image -->
                    <a href="{{ route('admin.albums.show', $album->id) }}" class="block aspect-video bg-slate-100 relative overflow-hidden">
                        @if($album->cover_image)
                            <img src="{{ asset('storage/' . $album->cover_image) }}" alt="{{ $album->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        @else
                            <div class="w-full h-full flex items-center justify-center">
                                <svg class="w-10 h-10 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            </div>
                        @endif
                        
                        <!-- Overlay Hitam Transparan -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-4">
                            <span class="text-white font-bold text-sm flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                Buka & Kelola Foto
                            </span>
                        </div>
                    </a>

                    <!-- Info Album -->
                    <div class="p-4 flex-1 flex flex-col">
                        <div class="flex items-start justify-between gap-2 mb-2">
                            <h3 class="font-bold text-slate-800 text-lg leading-tight line-clamp-2">
                                <a href="{{ route('admin.albums.show', $album->id) }}" class="hover:text-[#1e3a8a] transition-colors">
                                    {{ $album->title }}
                                </a>
                            </h3>
                            <span class="flex items-center gap-1 bg-blue-50 text-[#1e3a8a] px-2 py-0.5 rounded text-xs font-bold shrink-0">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                {{ $album->photos_count }}
                            </span>
                        </div>
                        <p class="text-sm text-slate-500 line-clamp-2 mb-4 flex-1">{{ $album->description ?: 'Tidak ada deskripsi' }}</p>
                        
                        <!-- Action Buttons -->
                        <div class="flex items-center justify-between border-t border-slate-100 pt-3 mt-auto">
                            <span class="text-xs text-slate-400 font-medium">{{ $album->created_at->format('d M Y') }}</span>
                            <div class="flex items-center gap-1">
                                <a href="{{ route('admin.albums.edit', $album->id) }}" class="p-1.5 text-blue-600 hover:bg-blue-50 rounded transition-colors" title="Edit Album">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                                </a>
                                
                                <form action="{{ route('admin.albums.destroy', $album->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Peringatan: Menghapus album ini akan menghapus semua foto di dalamnya secara permanen. Lanjutkan?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-1.5 text-red-600 hover:bg-red-50 rounded transition-colors" title="Hapus Album">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</x-admin-layout>
