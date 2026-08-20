<x-admin-layout>
    
    <div class="flex flex-col sm:flex-row sm:items-center justify-between mb-8 gap-4">
        <div>
            <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-800 tracking-tight">Kabar Desa</h1>
            <p class="text-slate-500 mt-1">Kelola berita, pengumuman, dan kegiatan desa di sini.</p>
        </div>
        <a href="{{ route('admin.posts.create') }}" class="inline-flex items-center justify-center gap-2 bg-[#1e3a8a] hover:bg-blue-800 text-white font-bold px-6 py-3 rounded-xl transition-all shadow-md hover:shadow-lg hover:-translate-y-0.5">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            Tulis Berita Baru
        </a>
    </div>

    <!-- Tabel Daftar Berita -->
    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-200 text-slate-500 text-xs uppercase tracking-wider">
                        <th class="p-4 font-bold w-16 text-center">No</th>
                        <th class="p-4 font-bold">Judul Berita</th>
                        <th class="p-4 font-bold hidden md:table-cell">Kategori</th>
                        <th class="p-4 font-bold text-center">Status</th>
                        <th class="p-4 font-bold hidden sm:table-cell">Tanggal</th>
                        <th class="p-4 font-bold text-center w-32">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($posts as $index => $post)
                        <tr class="hover:bg-slate-50 transition-colors">
                            <td class="p-4 text-center text-slate-500 font-medium">
                                {{ $posts->firstItem() + $index }}
                            </td>
                            <td class="p-4">
                                <div class="flex items-center gap-3">
                                    @if($post->image)
                                        <img src="{{ asset('storage/' . $post->image) }}" class="w-12 h-12 rounded-lg object-cover border border-slate-200 shrink-0 hidden sm:block" alt="Cover">
                                    @else
                                        <div class="w-12 h-12 rounded-lg bg-slate-100 flex items-center justify-center border border-slate-200 shrink-0 hidden sm:flex">
                                            <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                        </div>
                                    @endif
                                    <div>
                                        <a href="{{ route('kabar.show', $post->slug) }}" target="_blank" class="font-bold text-slate-800 hover:text-[#1e3a8a] transition-colors line-clamp-1" title="Lihat di web publik">
                                            {{ $post->title }}
                                        </a>
                                        <p class="text-xs text-slate-500 mt-1 md:hidden">{{ $post->category->name ?? 'Tanpa Kategori' }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="p-4 hidden md:table-cell">
                                <span class="bg-blue-50 text-blue-600 px-3 py-1 rounded-full text-xs font-semibold whitespace-nowrap">
                                    {{ $post->category->name ?? 'Tanpa Kategori' }}
                                </span>
                            </td>
                            <td class="p-4 text-center">
                                @if($post->status === 'published')
                                    <span class="inline-flex items-center gap-1.5 bg-emerald-50 text-emerald-600 px-3 py-1 rounded-full text-xs font-bold border border-emerald-100">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                        Published
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1.5 bg-yellow-50 text-yellow-600 px-3 py-1 rounded-full text-xs font-bold border border-yellow-100">
                                        <span class="w-1.5 h-1.5 rounded-full bg-yellow-500"></span>
                                        Draft
                                    </span>
                                @endif
                            </td>
                            <td class="p-4 hidden sm:table-cell text-sm text-slate-600">
                                {{ $post->created_at->format('d M Y') }}
                            </td>
                            <td class="p-4">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="{{ route('admin.posts.edit', $post->id) }}" class="p-2 text-blue-600 bg-blue-50 hover:bg-blue-100 rounded-lg transition-colors" title="Edit">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                                    </a>
                                    
                                    <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus berita ini secara permanen?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 text-red-600 bg-red-50 hover:bg-red-100 rounded-lg transition-colors" title="Hapus">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="p-12 text-center text-slate-500">
                                <div class="w-16 h-16 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <svg class="w-8 h-8 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                </div>
                                <h3 class="text-lg font-bold text-slate-700 mb-1">Belum Ada Berita</h3>
                                <p>Anda belum menerbitkan berita apapun. Silakan buat yang pertama!</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($posts->hasPages())
            <div class="p-4 border-t border-slate-200 bg-slate-50">
                {{ $posts->links() }}
            </div>
        @endif
    </div>
</x-admin-layout>
