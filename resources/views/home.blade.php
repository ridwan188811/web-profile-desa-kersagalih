<x-layout>

    <!-- 1. Hero Video Section -->
    <section class="relative h-screen flex items-center justify-center overflow-hidden bg-slate-900">
        <!-- Audio Control Button (Top Right) -->
        <button id="audio-toggle-btn" 
            style="position: absolute; top: 120px; right: 30px;"
            class="z-50 bg-white/10 hover:bg-white/30 backdrop-blur-md border border-white/30 text-white rounded-full p-3 transition-all duration-300 shadow-xl group" 
            title="Nyalakan/Matikan Suara">
            <!-- Icon Volume Off (default) -->
            <svg id="icon-vol-off" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z" clip-rule="evenodd" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2" /></svg>
            <!-- Icon Volume On (hidden) -->
            <svg id="icon-vol-on" class="w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.536 8.464a5 5 0 010 7.072m2.828-9.898a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z" /></svg>
        </button>

        <div class="absolute inset-0 z-0 overflow-hidden bg-slate-900">
            <iframe id="yt-hero-bg"
                style="position: absolute; top: 50%; left: 50%; width: 100vw; height: 56.25vw; min-height: 100vh; min-width: 177.77vh; transform: translate(-50%, -50%); pointer-events: none;"
                src="https://www.youtube.com/embed/7fG-EHCFNTw?autoplay=1&mute=1&controls=0&showinfo=0&rel=0&loop=1&playlist=7fG-EHCFNTw&modestbranding=1&playsinline=1&enablejsapi=1" 
                frameborder="0" 
                allow="autoplay; encrypted-media" 
                allowfullscreen>
            </iframe>
            <!-- Overlay Gradient -->
            <div class="absolute inset-0 bg-gradient-to-b from-black/40 via-black/20 to-slate-900/90"></div>
        </div>

        <!-- Hero Content -->
        <div class="relative z-10 text-center px-4 max-w-5xl mx-auto w-full mt-16" x-data="{ shown: false }" x-init="setTimeout(() => shown = true, 100)">
            <span :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'" class="transition-all duration-1000 ease-out block text-sm md:text-base font-bold text-yellow-300 tracking-[0.2em] uppercase mb-4">Selamat Datang di Website</span>
            <h1 :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'" class="transition-all duration-1000 delay-200 ease-out text-5xl md:text-7xl lg:text-8xl font-extrabold text-white mb-6 tracking-tight drop-shadow-lg">
                Desa Kersagalih
            </h1>
            <p :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'" class="transition-all duration-1000 delay-300 ease-out text-lg md:text-xl text-white/90 font-medium max-w-2xl mx-auto mb-10 leading-relaxed">
                Kecamatan Jatiwaras, Kabupaten Tasikmalaya
            </p>
            
            <div :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'" class="transition-all duration-1000 delay-500 ease-out flex justify-center">
                <a href="#jelajahi" class="bg-yellow-400 hover:bg-yellow-300 text-[#1e3a8a] px-8 py-3.5 rounded-full font-bold shadow-lg shadow-yellow-400/30 transition-transform transform hover:-translate-y-1 flex items-center gap-2">
                    Jelajahi Desa
                    <svg class="w-5 h-5 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path></svg>
                </a>
            </div>
        </div>
    </section>

    <!-- 2. Mengenal Desa Kersagalih -->
    <section class="py-24 bg-white relative z-20" id="jelajahi">
        <div class="max-w-7xl mx-auto px-4 md:px-8">
            <div class="flex flex-col lg:flex-row items-center gap-16">
                <!-- Image (Logo) -->
                <div class="w-full lg:w-1/2 flex justify-center items-center p-8" x-data="{ shown: false }" x-intersect.once="shown = true">
                    <div :class="shown ? 'opacity-100 scale-100' : 'opacity-0 scale-95'" class="transition-all duration-1000 ease-out relative w-full max-w-sm">
                        <!-- Logo -->
                        <img src="{{ asset('images/logo.png') }}" alt="Logo Desa Kersagalih" class="w-full h-auto object-contain drop-shadow-2xl hover:scale-105 transition-transform duration-700">
                    </div>
                </div>
                <!-- Text -->
                <div class="w-full lg:w-1/2" x-data="{ shown: false }" x-intersect.once="shown = true">
                    <div :class="shown ? 'opacity-100 translate-x-0' : 'opacity-0 translate-x-10'" class="transition-all duration-1000 ease-out">
                        <span class="text-[#1e3a8a] font-bold tracking-wider uppercase text-sm mb-2 block">Tentang Kami</span>
                        <h2 class="text-3xl md:text-4xl font-extrabold text-slate-800 mb-6 leading-tight">Mengenal Lebih Dekat<br><span class="text-[#1e3a8a]">Desa Kersagalih</span></h2>
                        <p class="text-slate-600 mb-6 leading-relaxed text-lg">
                            Desa Kersagalih adalah sebuah desa agraris yang terletak di Kecamatan Jatiwaras, Kabupaten Tasikmalaya. Dengan pemandangan alam yang asri dan udara yang sejuk, desa ini menjadi rumah bagi masyarakat yang menjunjung tinggi nilai gotong royong dan kearifan lokal.
                        </p>
                        <p class="text-slate-600 mb-8 leading-relaxed">
                            Kami terus berinovasi untuk mewujudkan tata kelola pemerintahan desa yang transparan, responsif, dan profesional demi kesejahteraan seluruh warga.
                        </p>
                        <a href="{{ route('sejarah') }}" class="inline-flex items-center gap-2 bg-slate-900 hover:bg-[#1e3a8a] text-white px-6 py-3 rounded-lg font-semibold transition-colors shadow-md">
                            Selengkapnya
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 3. Sambutan Kepala Desa -->
    <section class="py-20 bg-slate-50 border-y border-slate-200">
        <div class="max-w-6xl mx-auto px-4 md:px-8">
            <div class="bg-white rounded-[2rem] shadow-xl overflow-hidden" x-data="{ shown: false }" x-intersect.once="shown = true">
                <div :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'" class="transition-all duration-1000 ease-out flex flex-col md:flex-row">
                    <!-- Photo -->
                    <div class="w-full md:w-2/5 relative min-h-[350px]">
                        @if($kades && $kades->image)
                            <img src="{{ asset('storage/' . $kades->image) }}" alt="Kepala Desa" class="absolute inset-0 w-full h-full object-cover object-top">
                        @else
                            <img src="{{ asset('images/kepala_desa.jpeg') }}" alt="Kepala Desa" class="absolute inset-0 w-full h-full object-cover object-top">
                        @endif
                        <div class="absolute inset-x-0 bottom-0 h-1/2 bg-gradient-to-t from-black/90 via-black/50 to-transparent"></div>
                        <div class="absolute bottom-6 left-6 right-6 text-white drop-shadow-xl">
                            <h3 class="text-2xl font-extrabold mb-1 tracking-wide uppercase">{{ $kades->name ?? 'DADI SURYADI, S.IP' }}</h3>
                            <p class="text-yellow-400 font-bold text-sm drop-shadow-md">PJ Kepala Desa Kersagalih</p>
                        </div>
                    </div>
                    <!-- Quote Content -->
                    <div class="w-full md:w-3/5 p-8 md:p-12 flex flex-col justify-center">
                        <svg class="w-12 h-12 text-[#1e3a8a]/20 mb-6" fill="currentColor" viewBox="0 0 24 24"><path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/></svg>
                        <h2 class="text-2xl font-bold text-slate-800 mb-4">Sambutan Kepala Desa</h2>
                        <p class="text-slate-600 text-lg leading-relaxed italic mb-6">
                            "Puji syukur kehadirat Allah SWT, website resmi Desa Kersagalih ini dapat hadir sebagai jembatan informasi dan komunikasi antara pemerintah desa dengan masyarakat luas. Melalui portal ini, kami berkomitmen menyajikan transparansi data, mempermudah layanan, dan mempromosikan seluruh potensi hebat yang dimiliki oleh desa kita tercinta."
                        </p>
                        <div class="mt-auto">
                            <span class="inline-block w-16 h-1 bg-[#1e3a8a] rounded"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 4. Jelajahi Desa (Navigasi Cepat) -->
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 md:px-8">
            <div class="text-center mb-16" x-data="{ shown: false }" x-intersect.once="shown = true">
                <h2 :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 -translate-y-5'" class="transition-all duration-700 ease-out text-3xl md:text-4xl font-extrabold text-[#1e3a8a] mb-4">Jelajahi Desa</h2>
                <p :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-5'" class="transition-all duration-700 delay-100 ease-out text-slate-500 max-w-2xl mx-auto">Akses cepat ke berbagai informasi penting seputar pemerintahan dan kekayaan Desa Kersagalih.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Card 1: Profil -->
                <a href="{{ route('sejarah') }}" class="group block relative rounded-2xl overflow-hidden aspect-square bg-gradient-to-br from-[#1e3a8a] to-blue-800 shadow-xl" x-data="{ shown: false }" x-intersect.once="shown = true" :class="shown ? 'opacity-100 scale-100' : 'opacity-0 scale-95'" style="transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1) 100ms;">
                    <div class="absolute inset-0 flex items-center justify-center p-8">
                        <img src="{{ asset('images/logo.png') }}" alt="Profil Desa" class="w-full h-full object-contain opacity-20 group-hover:scale-110 group-hover:opacity-40 transition-all duration-700 drop-shadow-2xl">
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-[#0a1945]/90 via-transparent to-transparent"></div>
                    <div class="absolute bottom-0 left-0 p-6 w-full">
                        <div class="w-10 h-10 bg-yellow-400 rounded-full flex items-center justify-center mb-3 text-[#1e3a8a] transform group-hover:-translate-y-2 transition-transform shadow-md">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-1">Profil Desa</h3>
                        <p class="text-white/80 text-sm opacity-0 group-hover:opacity-100 transform translate-y-4 group-hover:translate-y-0 transition-all duration-300">Sejarah, visi, dan misi</p>
                    </div>
                </a>

                <!-- Card 2: Data -->
                <a href="{{ route('tentang.demografi') }}" class="group block relative rounded-2xl overflow-hidden aspect-square bg-gradient-to-br from-[#1e3a8a] to-blue-800 shadow-xl" x-data="{ shown: false }" x-intersect.once="shown = true" :class="shown ? 'opacity-100 scale-100' : 'opacity-0 scale-95'" style="transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1) 200ms;">
                    <div class="absolute inset-0 flex items-center justify-center p-8">
                        <img src="{{ asset('images/logo.png') }}" alt="Data Desa" class="w-full h-full object-contain opacity-20 group-hover:scale-110 group-hover:opacity-40 transition-all duration-700 drop-shadow-2xl">
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-[#0a1945]/90 via-transparent to-transparent"></div>
                    <div class="absolute bottom-0 left-0 p-6 w-full">
                        <div class="w-10 h-10 bg-yellow-400 rounded-full flex items-center justify-center mb-3 text-[#1e3a8a] transform group-hover:-translate-y-2 transition-transform shadow-md">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-1">Data Desa</h3>
                        <p class="text-white/80 text-sm opacity-0 group-hover:opacity-100 transform translate-y-4 group-hover:translate-y-0 transition-all duration-300">Statistik kependudukan</p>
                    </div>
                </a>

                <!-- Card 3: Lembaga -->
                <a href="{{ route('lembaga') }}" class="group block relative rounded-2xl overflow-hidden aspect-square bg-gradient-to-br from-[#1e3a8a] to-blue-800 shadow-xl" x-data="{ shown: false }" x-intersect.once="shown = true" :class="shown ? 'opacity-100 scale-100' : 'opacity-0 scale-95'" style="transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1) 300ms;">
                    <div class="absolute inset-0 flex items-center justify-center p-8">
                        <img src="{{ asset('images/logo.png') }}" alt="Lembaga Desa" class="w-full h-full object-contain opacity-20 group-hover:scale-110 group-hover:opacity-40 transition-all duration-700 drop-shadow-2xl">
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-[#0a1945]/90 via-transparent to-transparent"></div>
                    <div class="absolute bottom-0 left-0 p-6 w-full">
                        <div class="w-10 h-10 bg-yellow-400 rounded-full flex items-center justify-center mb-3 text-[#1e3a8a] transform group-hover:-translate-y-2 transition-transform shadow-md">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-1">Lembaga Desa</h3>
                        <p class="text-white/80 text-sm opacity-0 group-hover:opacity-100 transform translate-y-4 group-hover:translate-y-0 transition-all duration-300">Aparatur & kelembagaan</p>
                    </div>
                </a>

                <!-- Card 4: Potensi -->
                <a href="{{ route('tentang.potensi') }}" class="group block relative rounded-2xl overflow-hidden aspect-square bg-gradient-to-br from-[#1e3a8a] to-blue-800 shadow-xl" x-data="{ shown: false }" x-intersect.once="shown = true" :class="shown ? 'opacity-100 scale-100' : 'opacity-0 scale-95'" style="transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1) 400ms;">
                    <div class="absolute inset-0 flex items-center justify-center p-8">
                        <img src="{{ asset('images/logo.png') }}" alt="Potensi Desa" class="w-full h-full object-contain opacity-20 group-hover:scale-110 group-hover:opacity-40 transition-all duration-700 drop-shadow-2xl">
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-[#0a1945]/90 via-transparent to-transparent"></div>
                    <div class="absolute bottom-0 left-0 p-6 w-full">
                        <div class="w-10 h-10 bg-yellow-400 rounded-full flex items-center justify-center mb-3 text-[#1e3a8a] transform group-hover:-translate-y-2 transition-transform shadow-md">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-1">Potensi Desa</h3>
                        <p class="text-white/80 text-sm opacity-0 group-hover:opacity-100 transform translate-y-4 group-hover:translate-y-0 transition-all duration-300">Sumber daya unggulan</p>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <!-- 5. Potensi Unggulan Desa -->
    <section class="py-24 bg-[#1e3a8a] text-white relative overflow-hidden">
        <!-- Decoration -->
        <div class="absolute top-0 right-0 -mt-20 -mr-20 w-64 h-64 bg-white/5 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute bottom-0 left-0 -mb-20 -ml-20 w-80 h-80 bg-blue-500/10 rounded-full blur-3xl pointer-events-none"></div>
        
        <div class="max-w-7xl mx-auto px-4 md:px-8 relative z-10">
            <div class="text-center mb-16" x-data="{ shown: false }" x-intersect.once="shown = true">
                <h2 :class="shown ? 'opacity-100 scale-100' : 'opacity-0 scale-95'" class="transition-all duration-700 ease-out text-3xl md:text-4xl font-extrabold text-white mb-4">Potensi Unggulan Desa</h2>
                <p :class="shown ? 'opacity-100 scale-100' : 'opacity-0 scale-95'" class="transition-all duration-700 delay-100 ease-out text-blue-200 max-w-2xl mx-auto">Kekayaan alam dan keterampilan lokal yang menjadi roda penggerak ekonomi utama.</p>
            </div>

            @if($potensis->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($potensis as $index => $potensi)
                        <a href="{{ route('tentang.potensi') }}" class="group relative rounded-2xl overflow-hidden aspect-[4/5] cursor-pointer block" x-data="{ shown: false }" x-intersect.once="shown = true" :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'" style="transition: all 0.5s ease-out {{ ($index + 1) * 100 }}ms;">
                            @if($potensi->image)
                                <img src="{{ asset('storage/' . $potensi->image) }}" alt="{{ $potensi->title }}" class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            @else
                                <div class="absolute inset-0 w-full h-full bg-blue-800 flex items-center justify-center group-hover:scale-110 transition-transform duration-700">
                                    <svg class="w-16 h-16 text-blue-400 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                </div>
                            @endif
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/40 to-transparent opacity-80 group-hover:opacity-90 transition-opacity duration-300"></div>
                            <div class="absolute bottom-0 left-0 p-6 w-full">
                                <h4 class="font-bold text-xl md:text-2xl text-white drop-shadow-md mb-1">{{ $potensi->title }}</h4>
                                <p class="text-blue-200 text-sm line-clamp-2">{{ strip_tags($potensi->description) }}</p>
                            </div>
                        </a>
                    @endforeach
                </div>
            @else
                <div class="text-center py-12" x-data="{ shown: false }" x-intersect.once="shown = true">
                    <div :class="shown ? 'opacity-100 scale-100' : 'opacity-0 scale-95'" class="transition-all duration-700 ease-out bg-white/10 backdrop-blur-sm border border-white/20 rounded-2xl p-8 max-w-2xl mx-auto">
                        <svg class="w-12 h-12 text-blue-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                        <h3 class="text-xl font-bold text-white mb-2">Data Belum Tersedia</h3>
                        <p class="text-blue-200">Informasi mengenai potensi unggulan desa sedang dalam tahap pendataan dan akan segera dipublikasikan.</p>
                    </div>
                </div>
            @endif
        </div>
    </section>

    <!-- 5.5. Wisata Desa -->
    <section class="py-24 bg-white relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 md:px-8 relative z-10">
            <div class="text-center mb-16" x-data="{ shown: false }" x-intersect.once="shown = true">
                <span :class="shown ? 'opacity-100 scale-100' : 'opacity-0 scale-95'" class="transition-all duration-700 ease-out text-[#1e3a8a] font-bold tracking-wider uppercase text-sm mb-2 block">Destinasi Liburan</span>
                <h2 :class="shown ? 'opacity-100 scale-100' : 'opacity-0 scale-95'" class="transition-all duration-700 ease-out text-3xl md:text-4xl font-extrabold text-slate-800 mb-4">Wisata Desa</h2>
                <p :class="shown ? 'opacity-100 scale-100' : 'opacity-0 scale-95'" class="transition-all duration-700 delay-100 ease-out text-slate-500 max-w-2xl mx-auto">Jelajahi keindahan alam dan pesona wisata lokal yang menawarkan pengalaman tak terlupakan.</p>
            </div>

            @if($wisatas->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($wisatas as $index => $wisata)
                        <a href="{{ route('tentang.wisata') }}" class="group relative rounded-2xl overflow-hidden cursor-pointer block bg-slate-100 shadow-md hover:shadow-xl transition-all duration-300" style="aspect-ratio: 4/3;">
                            @if($wisata->image)
                                <img src="{{ asset('storage/' . $wisata->image) }}" alt="{{ $wisata->title }}" class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            @else
                                <div class="absolute inset-0 w-full h-full bg-emerald-100 flex items-center justify-center group-hover:scale-110 transition-transform duration-700">
                                    <svg class="w-16 h-16 text-emerald-400 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                </div>
                            @endif
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/40 to-transparent opacity-80 group-hover:opacity-90 transition-opacity duration-300"></div>
                            
                            <!-- Location Badge -->
                            @if($wisata->location)
                            <div class="absolute top-4 right-4 bg-white/20 backdrop-blur-md border border-white/30 text-white text-xs font-bold px-3 py-1.5 rounded-full flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                {{ $wisata->location }}
                            </div>
                            @endif

                            <div class="absolute bottom-0 left-0 p-6 w-full">
                                <h4 class="font-bold text-xl md:text-2xl text-white drop-shadow-md mb-1">{{ $wisata->title }}</h4>
                                <p class="text-slate-200 text-sm line-clamp-2">{{ strip_tags($wisata->description) }}</p>
                            </div>
                        </a>
                    @endforeach
                </div>
                
                <div class="mt-12 text-center" x-data="{ shown: false }" x-intersect.once="shown = true">
                    <a href="{{ route('tentang.wisata') }}" :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-4'" class="transition-all duration-700 delay-300 ease-out inline-flex items-center gap-2 bg-[#1e3a8a] hover:bg-blue-800 text-white px-6 py-3 rounded-full font-bold shadow-lg hover:shadow-xl hover:-translate-y-0.5">
                        Jelajahi Semua Wisata
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>
                </div>
            @else
                <div class="text-center py-12" x-data="{ shown: false }" x-intersect.once="shown = true">
                    <div :class="shown ? 'opacity-100 scale-100' : 'opacity-0 scale-95'" class="transition-all duration-700 ease-out bg-slate-50 border border-slate-200 rounded-2xl p-8 max-w-2xl mx-auto">
                        <svg class="w-12 h-12 text-slate-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <h3 class="text-xl font-bold text-slate-700 mb-2">Data Belum Tersedia</h3>
                        <p class="text-slate-500">Informasi mengenai destinasi wisata desa sedang dalam tahap penyusunan dan akan segera dipublikasikan.</p>
                    </div>
                </div>
            @endif
        </div>
    </section>

    <!-- 6. Kabar Desa -->
    <section class="py-24 bg-slate-50 border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-4 md:px-8">
            <div class="flex flex-col md:flex-row justify-between items-end mb-12" x-data="{ shown: false }" x-intersect.once="shown = true">
                <div :class="shown ? 'opacity-100 translate-x-0' : 'opacity-0 -translate-x-5'" class="transition-all duration-700 ease-out">
                    <span class="text-[#1e3a8a] font-bold tracking-wider uppercase text-sm mb-2 block">Berita Terkini</span>
                    <h2 class="text-3xl md:text-4xl font-extrabold text-slate-800">Kabar Desa Kersagalih</h2>
                </div>
                <div :class="shown ? 'opacity-100 translate-x-0' : 'opacity-0 translate-x-5'" class="transition-all duration-700 ease-out mt-4 md:mt-0">
                    <a href="{{ route('kabar') }}" class="inline-flex items-center gap-2 text-[#1e3a8a] font-bold hover:text-blue-700 transition group">
                        Lihat Semua Berita 
                        <span class="w-8 h-8 rounded-full bg-[#1e3a8a]/10 flex items-center justify-center group-hover:bg-[#1e3a8a] group-hover:text-white transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </span>
                    </a>
                </div>
            </div>

            <!-- News Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @forelse($recent_posts as $index => $post)
                <div class="bg-white rounded-2xl overflow-hidden shadow-lg border border-slate-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col" x-data="{ shown: false }" x-intersect.once="shown = true" :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'" style="transition: all 0.6s ease-out {{ ($index + 1) * 100 }}ms;">
                    <div class="aspect-video bg-slate-200 relative overflow-hidden">
                        @if($post->image)
                            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-full h-full object-cover">
                        @else
                            <img src="https://images.unsplash.com/photo-1558486012-817176f84c6d?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" alt="{{ $post->title }}" class="w-full h-full object-cover">
                        @endif
                        <div class="absolute top-4 left-4 bg-yellow-400 text-[#1e3a8a] text-xs font-bold px-3 py-1 rounded-full">{{ $post->category->name ?? 'Berita' }}</div>
                    </div>
                    <div class="p-6 flex flex-col flex-grow">
                        <span class="text-sm text-slate-400 mb-2 font-medium">{{ $post->created_at->translatedFormat('d F Y') }}</span>
                        <h3 class="font-bold text-xl text-slate-800 mb-3 leading-snug hover:text-[#1e3a8a] cursor-pointer">
                            <a href="{{ route('kabar.show', $post->slug) }}">{{ $post->title }}</a>
                        </h3>
                        <p class="text-slate-600 text-sm mb-4 line-clamp-3">{{ strip_tags($post->content) }}</p>
                        <a href="{{ route('kabar.show', $post->slug) }}" class="mt-auto text-[#1e3a8a] font-bold text-sm hover:underline">Baca selengkapnya &rarr;</a>
                    </div>
                </div>
                @empty
                <div class="col-span-1 md:col-span-3 text-center py-12">
                    <p class="text-slate-500">Belum ada berita yang diterbitkan oleh Admin.</p>
                </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- 7. Desa Kersagalih dalam Angka (Statistik dengan Counter) -->
    <section class="py-24 bg-white relative">
        <div class="max-w-7xl mx-auto px-4 md:px-8">
            <div class="text-center mb-16" x-data="{ shown: false }" x-intersect.once="shown = true">
                <h2 :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 -translate-y-5'" class="transition-all duration-700 ease-out text-3xl md:text-4xl font-extrabold text-[#1e3a8a] mb-4">Desa Kersagalih dalam Angka</h2>
                <p :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-5'" class="transition-all duration-700 delay-100 ease-out text-slate-500 max-w-2xl mx-auto text-lg">Gambaran demografis dan kewilayahan yang tercatat hingga tahun ini.</p>
            </div>

            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 md:gap-8">
                
                <!-- Counter 1: Penduduk -->
                <div class="bg-slate-50 rounded-2xl p-6 text-center border border-slate-100" x-data="{ count: 0, target: {{ \App\Models\Setting::getValue('penduduk_total', 3793) }}, shown: false }" x-intersect.once="shown = true; let i = 0; let interval = setInterval(() => { if(i >= target) { count = target; clearInterval(interval); } else { count = Math.floor(i); i += target/40; } }, 30)">
                    <div :class="shown ? 'opacity-100 scale-100' : 'opacity-0 scale-50'" class="transition-all duration-500 ease-out w-14 h-14 mx-auto bg-blue-100 text-[#1e3a8a] rounded-full flex items-center justify-center mb-4">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    </div>
                    <h3 class="text-3xl md:text-4xl font-extrabold text-slate-800 mb-2">
                        <span x-text="count.toLocaleString('id-ID')">0</span>
                    </h3>
                    <p class="text-sm font-bold text-[#1e3a8a] tracking-wider uppercase">Jumlah Penduduk</p>
                </div>

                <!-- Counter 2: KK -->
                <div class="bg-slate-50 rounded-2xl p-6 text-center border border-slate-100" x-data="{ count: 0, target: {{ \App\Models\Setting::getValue('penduduk_kk', 1173) }}, shown: false }" x-intersect.once="shown = true; let i = 0; let interval = setInterval(() => { if(i >= target) { count = target; clearInterval(interval); } else { count = Math.floor(i); i += target/40; } }, 30)">
                    <div :class="shown ? 'opacity-100 scale-100' : 'opacity-0 scale-50'" class="transition-all duration-500 delay-100 ease-out w-14 h-14 mx-auto bg-blue-100 text-[#1e3a8a] rounded-full flex items-center justify-center mb-4">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                    </div>
                    <h3 class="text-3xl md:text-4xl font-extrabold text-slate-800 mb-2">
                        <span x-text="count.toLocaleString('id-ID')">0</span>
                    </h3>
                    <p class="text-sm font-bold text-[#1e3a8a] tracking-wider uppercase">Jumlah KK</p>
                </div>

                <!-- Counter 3: Dusun -->
                <div class="bg-slate-50 rounded-2xl p-6 text-center border border-slate-100" x-data="{ count: 0, target: 5, shown: false }" x-intersect.once="shown = true; let i = 0; let interval = setInterval(() => { if(i >= target) { count = target; clearInterval(interval); } else { count = Math.floor(i); i += target/20; } }, 60)">
                    <div :class="shown ? 'opacity-100 scale-100' : 'opacity-0 scale-50'" class="transition-all duration-500 delay-200 ease-out w-14 h-14 mx-auto bg-blue-100 text-[#1e3a8a] rounded-full flex items-center justify-center mb-4">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                    </div>
                    <h3 class="text-3xl md:text-4xl font-extrabold text-slate-800 mb-2">
                        <span x-text="count">0</span>
                    </h3>
                    <p class="text-sm font-bold text-[#1e3a8a] tracking-wider uppercase">Jumlah Dusun</p>
                </div>

                <!-- Counter 4: Luas Wilayah -->
                <div class="bg-[#1e3a8a] rounded-2xl p-6 text-center shadow-lg text-white" x-data="{ count: 0, target: {{ \App\Models\Setting::getValue('luas_total', 980) }}, shown: false }" x-intersect.once="shown = true; let i = 0; let interval = setInterval(() => { if(i >= target) { count = target; clearInterval(interval); } else { count = Math.floor(i); i += target/40; } }, 30)">
                    <div :class="shown ? 'opacity-100 scale-100' : 'opacity-0 scale-50'" class="transition-all duration-500 delay-300 ease-out w-14 h-14 mx-auto bg-white/20 text-yellow-300 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path></svg>
                    </div>
                    <h3 class="text-3xl md:text-4xl font-extrabold text-white mb-2">
                        <span x-text="count.toLocaleString('id-ID')">0</span> <span class="text-xl font-bold text-white/80">Ha</span>
                    </h3>
                    <p class="text-sm font-bold text-yellow-300 tracking-wider uppercase">Luas Wilayah</p>
                </div>

            </div>
        </div>
    </section>

    <!-- 8. Peta Desa (Google Maps) -->
    <section class="bg-slate-100">
        <div class="max-w-7xl mx-auto px-4 md:px-8 py-16" x-data="{ shown: false }" x-intersect.once="shown = true">
            <div :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'" class="transition-all duration-1000 ease-out bg-white rounded-3xl p-4 md:p-8 shadow-xl border border-slate-200">
                <div class="flex flex-col md:flex-row items-center justify-between mb-6 px-4">
                    <div>
                        <h2 class="text-2xl font-extrabold text-slate-800">Peta Desa Kersagalih</h2>
                        <p class="text-slate-500">Lokasi geografis dan administratif.</p>
                    </div>
                    <a href="https://maps.google.com" target="_blank" class="mt-4 md:mt-0 bg-slate-100 hover:bg-slate-200 text-[#1e3a8a] px-5 py-2 rounded-lg font-bold text-sm transition-colors flex items-center gap-2">
                        Buka di Google Maps
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                    </a>
                </div>
                <!-- Embed Maps (Accurate for Desa Kersagalih) -->
                <div class="w-full h-[400px] rounded-2xl overflow-hidden bg-slate-200">
                    <iframe 
                        src="https://maps.google.com/maps?q=Desa+Kersagalih,+Kecamatan+Jatiwaras,+Kabupaten+Tasikmalaya&t=&z=14&ie=UTF8&iwloc=&output=embed" 
                        width="100%" 
                        height="100%" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>
    </section>

    <!-- 9. Galeri Desa -->
    <section class="py-24 bg-white border-t border-slate-200">
        <div class="max-w-7xl mx-auto px-4 md:px-8">
            <div class="text-center mb-12" x-data="{ shown: false }" x-intersect.once="shown = true">
                <h2 :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 -translate-y-5'" class="transition-all duration-700 ease-out text-3xl md:text-4xl font-extrabold text-[#1e3a8a] mb-4">Galeri Desa</h2>
                <p :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-5'" class="transition-all duration-700 delay-100 ease-out text-slate-500 max-w-2xl mx-auto text-lg">Dokumentasi kegiatan, pembangunan, dan aktivitas masyarakat sehari-hari.</p>
            </div>

            <!-- Breathtaking Masonry/Grid Gallery -->
            @if($recent_photos->count() > 0)
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4" x-data="{ shown: false }" x-intersect.once="shown = true">
                    @foreach($recent_photos as $index => $photo)
                        @php
                            $spanClass = 'aspect-square';
                            if ($index === 0) $spanClass = 'col-span-2 row-span-2';
                            elseif ($index === 3) $spanClass = 'col-span-2 aspect-[2/1]';
                        @endphp
                        <div :class="shown ? 'opacity-100 scale-100' : 'opacity-0 scale-95'" class="{{ $spanClass }} rounded-2xl overflow-hidden relative group cursor-pointer transition-all duration-700 ease-out" style="transition-delay: {{ $index * 100 }}ms">
                            <img src="{{ asset('storage/' . $photo->image) }}" alt="{{ $photo->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            <div class="absolute bottom-6 left-6 right-6 text-white opacity-0 group-hover:opacity-100 transform translate-y-4 group-hover:translate-y-0 transition-all duration-300">
                                <h4 class="font-bold text-lg drop-shadow-md">{{ $photo->title }}</h4>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-12" x-data="{ shown: false }" x-intersect.once="shown = true">
                    <div :class="shown ? 'opacity-100 scale-100' : 'opacity-0 scale-95'" class="transition-all duration-700 ease-out bg-slate-50 border border-slate-200 rounded-2xl p-8 max-w-2xl mx-auto shadow-sm">
                        <svg class="w-12 h-12 text-slate-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        <h3 class="text-xl font-bold text-slate-700 mb-2">Data Belum Tersedia</h3>
                        <p class="text-slate-500">Dokumentasi foto kegiatan desa belum dipublikasikan saat ini.</p>
                    </div>
                </div>
            @endif
            
            <div class="mt-12 text-center">
                <a href="{{ route('galeri') }}" class="inline-flex items-center gap-2 bg-slate-100 hover:bg-slate-200 text-slate-700 px-6 py-3 rounded-full font-bold transition-colors">
                    Lihat Semua Foto
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </a>
            </div>
        </div>
    </section>

    <!-- YouTube API Script for Audio Toggle -->
    <script>
        // Load the IFrame Player API code asynchronously.
        var tag = document.createElement('script');
        tag.src = "https://www.youtube.com/iframe_api";
        var firstScriptTag = document.getElementsByTagName('script')[0];
        firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

        var player;
        function onYouTubeIframeAPIReady() {
            player = new YT.Player('yt-hero-bg', {
                events: {
                    'onReady': onPlayerReady
                }
            });
        }

        function onPlayerReady(event) {
            const audioBtn = document.getElementById('audio-toggle-btn');
            const iconOff = document.getElementById('icon-vol-off');
            const iconOn = document.getElementById('icon-vol-on');
            let isMuted = true;

            audioBtn.addEventListener('click', function() {
                if (isMuted) {
                    player.unMute();
                    player.setVolume(100);
                    iconOff.classList.add('hidden');
                    iconOn.classList.remove('hidden');
                } else {
                    player.mute();
                    iconOn.classList.add('hidden');
                    iconOff.classList.remove('hidden');
                }
                isMuted = !isMuted;
            });
        }
    </script>
</x-layout>
