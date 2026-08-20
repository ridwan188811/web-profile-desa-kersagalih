<x-layout>
    
    <div class="bg-slate-50 py-12 md:py-20">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-4xl">
            
            <!-- Breadcrumb -->
            <nav class="flex items-center gap-2 text-sm font-medium text-slate-500 mb-8" aria-label="Breadcrumb">
                <a href="{{ route('beranda') }}" class="hover:text-[#1e3a8a] transition-colors">Beranda</a>
                <svg class="w-4 h-4 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                <a href="{{ route('kabar') }}" class="hover:text-[#1e3a8a] transition-colors">Kabar Desa</a>
                <svg class="w-4 h-4 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                <span class="text-slate-800 line-clamp-1" aria-current="page">{{ $post->title }}</span>
            </nav>

            <article class="bg-white rounded-3xl border border-slate-200 overflow-hidden shadow-sm">
                
                @if($post->image)
                    <div class="w-full aspect-[21/9] relative bg-slate-100 overflow-hidden">
                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-full h-full object-cover">
                    </div>
                @endif

                <div class="p-8 md:p-12">
                    
                    <div class="flex flex-wrap items-center gap-4 mb-6">
                        <span class="bg-yellow-400 text-[#1e3a8a] text-xs font-bold px-3 py-1.5 rounded-full uppercase tracking-wider">
                            {{ $post->category->name ?? 'Informasi' }}
                        </span>
                        
                        <div class="flex items-center gap-4 text-sm font-medium text-slate-500">
                            <div class="flex items-center gap-1.5">
                                <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                {{ $post->created_at->format('d M Y') }}
                            </div>
                            <div class="flex items-center gap-1.5">
                                <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                Oleh {{ $post->user->name ?? 'Admin Desa' }}
                            </div>
                        </div>
                    </div>

                    <h1 class="text-3xl md:text-4xl lg:text-5xl font-extrabold text-slate-900 mb-10 leading-tight">
                        {{ $post->title }}
                    </h1>

                    <div class="prose prose-lg prose-slate max-w-none prose-headings:font-bold prose-a:text-[#1e3a8a] hover:prose-a:text-blue-800 prose-img:rounded-2xl">
                        {!! $post->content !!}
                    </div>
                    
                </div>
            </article>

            <!-- Bagikan -->
            <div class="mt-10 flex flex-col sm:flex-row items-center justify-between gap-6 border-t border-slate-200 pt-8">
                <a href="{{ route('kabar') }}" class="inline-flex items-center gap-2 text-slate-600 hover:text-[#1e3a8a] font-medium transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Kembali ke Daftar Berita
                </a>
                
                <div class="flex items-center gap-3">
                    <span class="text-sm font-bold text-slate-500">Bagikan:</span>
                    <a href="https://wa.me/?text={{ urlencode($post->title . ' - ' . route('kabar.show', $post->slug)) }}" target="_blank" class="w-10 h-10 rounded-full bg-green-100 text-green-600 flex items-center justify-center hover:bg-green-600 hover:text-white transition-colors" title="Bagikan ke WhatsApp">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M12 2C6.48 2 2 6.48 2 12c0 2.17.69 4.18 1.87 5.82L3 21l3.23-.85A9.953 9.953 0 0012 22c5.52 0 10-4.48 10-10S17.52 2 12 2zm.02 18.02a7.95 7.95 0 01-4.06-1.11l-.29-.17-2.3.6.61-2.25-.19-.3A7.973 7.973 0 014 12.02c0-4.41 3.59-8 8-8s8 3.59 8 8-3.59 8-8 8zm4.33-5.74c-.24-.12-1.4-.69-1.61-.77-.22-.08-.38-.12-.54.12-.16.24-.61.77-.75.93-.14.16-.29.2-.53.08a6.38 6.38 0 01-1.88-1.16 7.02 7.02 0 01-1.3-1.62c-.14-.24-.01-.37.11-.49.11-.11.24-.28.36-.42.12-.14.16-.24.24-.4.08-.16.04-.3-.02-.42-.06-.12-.54-1.3-.74-1.78-.2-.48-.4-.41-.54-.42h-.46c-.16 0-.42.06-.64.3-.22.24-.85.83-.85 2.03 0 1.2.87 2.36.99 2.52.12.16 1.72 2.62 4.16 3.67 1.4.6 1.95.65 2.67.55.57-.08 1.4-.57 1.6-1.12.2-.55.2-.1.14-.12z" clip-rule="evenodd"></path></svg>
                    </a>
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('kabar.show', $post->slug)) }}" target="_blank" class="w-10 h-10 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center hover:bg-blue-600 hover:text-white transition-colors" title="Bagikan ke Facebook">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"></path></svg>
                    </a>
                </div>
            </div>

        </div>
    </div>
</x-layout>
