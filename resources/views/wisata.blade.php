<x-layout>
    <!-- Hero Section -->
    <section class="relative pt-32 pb-20 lg:pt-48 lg:pb-32 overflow-hidden bg-[#1e3a8a]">
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1592982537447-7440770cbfc9?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80" alt="wisata Desa" class="w-full h-full object-cover opacity-20 mix-blend-luminosity">
            <div class="absolute inset-0 bg-gradient-to-t from-[#0f1f4d] to-transparent"></div>
        </div>
        <div class="relative max-w-7xl mx-auto px-4 md:px-8 text-center" x-data="{ shown: false }" x-intersect.once="shown = true">
            <h1 :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'" class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-white mb-6 drop-shadow-lg transition-all duration-1000 ease-out capitalize">
                Wisata Desa
            </h1>
            <p :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'" class="text-lg md:text-xl text-blue-100 max-w-2xl mx-auto mb-8 font-light transition-all duration-1000 delay-100 ease-out">
                Jelajahi keindahan alam, budaya, dan pesona destinasi wisata unggulan di Desa Kersagalih.
            </p>
        </div>
    </section>

    <div class="bg-slate-50 relative pb-24">
        <!-- wisata & Aset -->
        <section class="max-w-7xl mx-auto px-4 md:px-8 relative z-10 -mt-16">
            <div class="bg-white rounded-3xl shadow-xl p-8 md:p-12 border border-slate-100">
                <div class="text-center mb-12">
                    <span class="text-[#1e3a8a] font-bold tracking-wider uppercase text-sm mb-2 block">Destinasi & Pariwisata</span>
                    <h2 class="text-3xl md:text-4xl font-extrabold text-slate-800">Wisata Desa Kersagalih</h2>
                </div>

                <!-- Grid wisata -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" x-data="{ shown: false }" x-intersect.once="shown = true">
                    @forelse($wisatas as $index => $wisata)
                        <div :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'" class="bg-slate-50 rounded-2xl shadow-md border border-slate-200 overflow-hidden transition-all duration-700 ease-out group hover:shadow-xl" style="transition-delay: {{ $index * 100 }}ms">
                            <div class="relative aspect-[4/3] overflow-hidden bg-slate-200">
                                @if($wisata->image)
                                    <img src="{{ asset('storage/' . $wisata->image) }}" alt="{{ $wisata->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                                @else
                                    <div class="w-full h-full flex items-center justify-center bg-blue-100 text-blue-300">
                                        <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    </div>
                                @endif
                                
                                @if($wisata->location)
                                <div class="absolute top-4 right-4 bg-white/90 backdrop-blur text-[#1e3a8a] text-xs font-bold px-3 py-1.5 rounded-full shadow-sm flex items-center gap-1.5">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                    {{ $wisata->location }}
                                </div>
                                @endif
                            </div>
                            
                            <div class="p-6">
                                <h3 class="font-bold text-xl text-slate-800 mb-3 group-hover:text-blue-600 transition-colors">{{ $wisata->title }}</h3>
                                <div class="text-slate-600 text-sm leading-relaxed prose prose-sm max-w-none">
                                    {!! $wisata->description !!}
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full py-12 text-center text-slate-500 bg-slate-50 rounded-2xl border border-slate-200">
                            <svg class="w-16 h-16 text-slate-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <h3 class="text-lg font-bold text-slate-700 mb-1">Katalog Kosong</h3>
                            <p>Data wisata belum dimasukkan.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>
    </div>
</x-layout>
