<x-layout>
    <!-- Hero Section -->
    <section class="relative pt-32 pb-20 lg:pt-48 lg:pb-32 overflow-hidden bg-[#1e3a8a]">
        <div class="absolute inset-0">
            <!-- Background pattern/image -->
            <img src="https://images.unsplash.com/photo-1595842588324-4f815033c467?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80" alt="Infrastruktur" class="w-full h-full object-cover opacity-20 mix-blend-luminosity">
            <div class="absolute inset-0 bg-gradient-to-t from-[#0f1f4d] to-transparent"></div>
        </div>
        <div class="relative max-w-7xl mx-auto px-4 md:px-8 text-center" x-data="{ shown: false }" x-intersect.once="shown = true">
            <span :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'" class="transition-all duration-1000 ease-out text-yellow-300 font-bold tracking-widest uppercase text-sm mb-4 block">
                Infrastruktur & Fasilitas
            </span>
            <h1 :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'" class="transition-all duration-1000 delay-100 ease-out text-4xl md:text-5xl lg:text-6xl font-extrabold text-white mb-6 drop-shadow-lg">
                Pembangunan Desa
            </h1>
            <p :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'" class="transition-all duration-1000 delay-200 ease-out text-lg md:text-xl text-blue-100 max-w-2xl mx-auto mb-8 font-light">
                Transparansi informasi mengenai infrastruktur dan proyek pembangunan fisik di Desa Kersagalih.
            </p>
        </div>
    </section>

    <!-- Main Content (Placeholder) -->
    <section class="py-24 bg-slate-50 relative z-10 -mt-10">
        <div class="max-w-4xl mx-auto px-4 md:px-8">
            <div class="bg-white rounded-[2rem] shadow-xl border border-slate-100 p-8 md:p-16 text-center" x-data="{ shown: false }" x-intersect.once="shown = true">
                
                <div :class="shown ? 'opacity-100 scale-100' : 'opacity-0 scale-50'" class="transition-all duration-700 ease-out w-24 h-24 bg-blue-50 text-[#1e3a8a] rounded-full flex items-center justify-center mx-auto mb-8 border-4 border-white shadow-lg">
                    <!-- Construction Icon -->
                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                </div>
                
                <h2 :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-5'" class="transition-all duration-700 delay-100 ease-out text-3xl font-extrabold text-slate-800 mb-4">
                    Data Sedang Dihimpun
                </h2>
                
                <p :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-5'" class="transition-all duration-700 delay-200 ease-out text-slate-600 text-lg mb-10 leading-relaxed max-w-2xl mx-auto">
                    Saat ini, rincian data pembangunan infrastruktur dan fasilitas umum Desa Kersagalih sedang dalam tahap perekapan oleh perangkat desa. Informasi lengkap akan segera diperbarui di halaman ini untuk mewujudkan transparansi publik.
                </p>

                <div :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-5'" class="transition-all duration-700 delay-300 ease-out">
                    <a href="{{ route('beranda') }}" class="inline-flex items-center gap-2 bg-[#1e3a8a] hover:bg-blue-800 text-white font-bold px-8 py-4 rounded-xl transition-all shadow-md hover:shadow-lg hover:-translate-y-1">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                        Kembali ke Beranda
                    </a>
                </div>
                
            </div>
        </div>
    </section>
</x-layout>
