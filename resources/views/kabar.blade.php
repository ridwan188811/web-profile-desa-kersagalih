<x-layout>
    <!-- Hero Section -->
    <section class="relative pt-32 pb-20 lg:pt-48 lg:pb-32 overflow-hidden bg-[#1e3a8a]">
        <div class="absolute inset-0">
            <div class="absolute inset-0 bg-gradient-to-r from-[#1e3a8a] to-[#1e3a8a]/80 mix-blend-multiply z-10"></div>
            <img src="https://images.unsplash.com/photo-1585938389612-a552a28d6914?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80" alt="Kabar Desa" class="w-full h-full object-cover opacity-60">
        </div>
        <div class="container relative z-20 mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-white mb-6 tracking-tight">
                Kabar <span class="text-yellow-400">Desa</span>
            </h1>
            <p class="text-xl text-blue-100 max-w-2xl mx-auto leading-relaxed">
                Pusat informasi, pengumuman, dan berita terkini seputar kegiatan masyarakat dan pemerintahan Desa Kersagalih.
            </p>
        </div>
    </section>

    <section class="py-16 md:py-24 bg-slate-50">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            
            @if($posts->isEmpty())
                <div class="text-center py-20">
                    <div class="w-24 h-24 bg-slate-200 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-12 h-12 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2.5 2.5 0 00-2.5-2.5H14"></path></svg>
                    </div>
                    <h3 class="text-2xl font-bold text-slate-800 mb-2">Belum Ada Kabar Terbaru</h3>
                    <p class="text-slate-500">Saat ini belum ada berita atau pengumuman yang dipublikasikan oleh pemerintah desa.</p>
                </div>
            @else
                
                <!-- Grid Berita -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($posts as $post)
                        <article class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 border border-slate-100 flex flex-col group">
                            <a href="{{ route('kabar.show', $post->slug) }}" class="block relative aspect-video overflow-hidden">
                                @if($post->image)
                                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                @else
                                    <div class="w-full h-full bg-slate-100 flex items-center justify-center group-hover:scale-105 transition-transform duration-500">
                                        <svg class="w-12 h-12 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    </div>
                                @endif
                                <div class="absolute top-4 left-4">
                                    <span class="bg-yellow-400 text-[#1e3a8a] text-xs font-bold px-3 py-1.5 rounded-full shadow-md">
                                        {{ $post->category->name ?? 'Informasi' }}
                                    </span>
                                </div>
                            </a>
                            <div class="p-6 flex-1 flex flex-col">
                                <div class="flex items-center gap-4 text-xs font-medium text-slate-500 mb-4">
                                    <div class="flex items-center gap-1.5">
                                        <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                        {{ $post->created_at->format('d M Y') }}
                                    </div>
                                    <div class="flex items-center gap-1.5">
                                        <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                        {{ $post->user->name ?? 'Admin Desa' }}
                                    </div>
                                </div>
                                <h3 class="text-xl font-bold text-slate-800 mb-3 leading-tight group-hover:text-[#1e3a8a] transition-colors">
                                    <a href="{{ route('kabar.show', $post->slug) }}" class="line-clamp-2">{{ $post->title }}</a>
                                </h3>
                                <p class="text-slate-600 line-clamp-3 mb-6 flex-1">
                                    {{ strip_tags($post->content) }}
                                </p>
                                <div class="mt-auto pt-4 border-t border-slate-100 flex items-center justify-between">
                                    <a href="{{ route('kabar.show', $post->slug) }}" class="text-[#1e3a8a] font-bold text-sm inline-flex items-center gap-1 hover:text-blue-800 transition-colors group/link">
                                        Baca Selengkapnya
                                        <svg class="w-4 h-4 transform group-hover/link:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                                    </a>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>

                <!-- Pagination -->
                @if($posts->hasPages())
                    <div class="mt-12 flex justify-center">
                        {{ $posts->links() }}
                    </div>
                @endif
                
            @endif
        </div>
    </section>
</x-layout>
