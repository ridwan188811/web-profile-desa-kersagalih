<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Desa Kersagalih</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,400&display=swap" rel="stylesheet">
    
    <!-- Alpine.js for Animations -->
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/intersect@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8fafc;
        }

        /* Dropdown Hover Logic */
        .group:hover .group-hover\:block {
            display: block;
        }
        
        /* Smooth Fade In utility */
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="antialiased text-slate-800 flex flex-col min-h-screen" x-data="{ showServiceModal: false, mobileMenuOpen: false }">

    <!-- Main Navigation Header (Biru Dongker) -->
    <header class="bg-[#1e3a8a] text-white shadow-md sticky top-0 z-50 transition-all duration-300 w-full" id="navbar">
        <div class="px-4 md:px-8 py-3 flex justify-between items-center w-full max-w-7xl mx-auto">
            
            <!-- Logo -->
            <a href="{{ route('beranda') }}" class="flex items-center space-x-3 text-white">
                <img src="{{ asset('images/logo.png') }}" alt="Logo Kab. Tasikmalaya" class="h-10 w-auto bg-white/10 rounded p-1" onerror="this.src='https://upload.wikimedia.org/wikipedia/commons/e/e0/Lambang_Kabupaten_Tasikmalaya.png'">
                <div class="flex flex-col">
                    <span class="font-extrabold text-lg md:text-xl leading-tight tracking-tight">Desa Kersagalih</span>
                    <span class="text-xs md:text-sm font-semibold text-blue-200">Kabupaten Tasikmalaya</span>
                </div>
            </a>

            <!-- Navigation Links (Desktop) -->
            <nav class="hidden lg:flex items-center space-x-8 h-full">
                <a href="{{ route('beranda') }}" class="font-semibold hover:text-yellow-300 border-b-2 {{ request()->routeIs('beranda') ? 'border-yellow-300 text-yellow-300' : 'border-transparent text-white/90' }} pb-1 transition">Beranda</a>
                <a href="{{ route('kabar') }}" class="font-semibold hover:text-yellow-300 border-b-2 {{ request()->routeIs('kabar') || request()->routeIs('kabar.show') ? 'border-yellow-300 text-yellow-300' : 'border-transparent text-white/90' }} pb-1 transition">Kabar Desa</a>
                
                <!-- Dropdown Tentang -->
                <div class="relative group h-full py-2">
                    <button class="font-semibold hover:text-yellow-300 flex items-center space-x-1 border-b-2 {{ request()->routeIs('sejarah') || request()->routeIs('tentang.*') ? 'border-yellow-300 text-yellow-300' : 'border-transparent text-white/90' }} pb-1 transition outline-none">
                        <span>Tentang</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <!-- Dropdown Menu (Putih untuk kontras) -->
                    <div class="absolute top-full left-0 mt-0 w-48 bg-white rounded-lg shadow-xl py-2 hidden group-hover:block border border-slate-100 z-50">
                        <a href="{{ route('sejarah') }}" class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-50 hover:text-[#1e3a8a] font-medium transition {{ request()->routeIs('sejarah') ? 'bg-slate-50 text-[#1e3a8a] font-bold' : '' }}">Sejarah</a>
                        <a href="{{ route('tentang.wilayah') }}" class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-50 hover:text-[#1e3a8a] font-medium transition {{ request()->routeIs('tentang.wilayah') ? 'bg-slate-50 text-[#1e3a8a] font-bold' : '' }}">Wilayah</a>
                        <a href="{{ route('tentang.demografi') }}" class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-50 hover:text-[#1e3a8a] font-medium transition {{ request()->routeIs('tentang.demografi') ? 'bg-slate-50 text-[#1e3a8a] font-bold' : '' }}">Demografi</a>
                        <a href="{{ route('tentang.potensi') }}" class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-50 hover:text-[#1e3a8a] font-medium transition {{ request()->routeIs('tentang.potensi') ? 'bg-slate-50 text-[#1e3a8a] font-bold' : '' }}">Potensi</a>
                        <a href="{{ route('tentang.wisata') }}" class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-50 hover:text-[#1e3a8a] font-medium transition {{ request()->routeIs('tentang.wisata') ? 'bg-slate-50 text-[#1e3a8a] font-bold' : '' }}">Wisata Desa</a>
                        <a href="{{ route('galeri') }}" class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-50 hover:text-[#1e3a8a] font-medium transition {{ request()->routeIs('galeri') ? 'bg-slate-50 text-[#1e3a8a] font-bold' : '' }}">Galeri Foto</a>
                    </div>
                </div>

                <!-- Dropdown Lembaga -->
                <div class="relative group h-full py-2">
                    <button class="font-semibold hover:text-yellow-300 flex items-center space-x-1 border-b-2 {{ request()->routeIs('lembaga') ? 'border-yellow-300 text-yellow-300' : 'border-transparent text-white/90' }} pb-1 transition outline-none">
                        <span>Lembaga</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <!-- Dropdown Menu -->
                    <div class="absolute top-full left-0 mt-0 w-48 bg-white rounded-lg shadow-xl py-2 hidden group-hover:block border border-slate-100 z-50">
                        <a href="{{ route('lembaga') }}?kategori=Pemerintahan" class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-50 hover:text-[#1e3a8a] font-medium transition {{ request('kategori') == 'Pemerintahan' ? 'bg-slate-50 text-[#1e3a8a] font-bold' : '' }}">Pemerintahan</a>
                        <a href="{{ route('lembaga') }}?kategori=BPD" class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-50 hover:text-[#1e3a8a] font-medium transition {{ request('kategori') == 'BPD' ? 'bg-slate-50 text-[#1e3a8a] font-bold' : '' }}">BPD</a>
                        <a href="{{ route('lembaga') }}?kategori=LPM" class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-50 hover:text-[#1e3a8a] font-medium transition {{ request('kategori') == 'LPM' ? 'bg-slate-50 text-[#1e3a8a] font-bold' : '' }}">LPM</a>
                        <a href="{{ route('lembaga') }}?kategori=Posyandu" class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-50 hover:text-[#1e3a8a] font-medium transition {{ request('kategori') == 'Posyandu' ? 'bg-slate-50 text-[#1e3a8a] font-bold' : '' }}">Posyandu</a>
                        <a href="{{ route('lembaga') }}?kategori=PKK" class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-50 hover:text-[#1e3a8a] font-medium transition {{ request('kategori') == 'PKK' ? 'bg-slate-50 text-[#1e3a8a] font-bold' : '' }}">PKK</a>
                        <a href="{{ route('lembaga') }}?kategori=Karang+Taruna" class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-50 hover:text-[#1e3a8a] font-medium transition {{ request('kategori') == 'Karang Taruna' ? 'bg-slate-50 text-[#1e3a8a] font-bold' : '' }}">Karang Taruna</a>
                    </div>
                </div>

                <a href="{{ route('pembangunan') }}" class="font-semibold hover:text-yellow-300 border-b-2 {{ request()->routeIs('pembangunan') ? 'border-yellow-300 text-yellow-300' : 'border-transparent text-white/90' }} pb-1 transition">Pembangunan</a>
            </nav>

            <!-- CTA Button -->
            <div class="hidden lg:block">
                <!-- Putih teks biru agar kontras dengan header biru -->
                <button @click="showServiceModal = true" class="bg-white hover:bg-slate-100 text-[#1e3a8a] px-6 py-2.5 rounded shadow-md font-bold text-sm tracking-wide transition-colors">
                    LAYANAN ONLINE
                </button>
            </div>

            <!-- Mobile Menu Button -->
            <button @click="mobileMenuOpen = !mobileMenuOpen" class="lg:hidden text-white p-2 focus:outline-none" id="mobileMenuBtn">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
            </button>
        </div>

        <!-- Mobile Navigation Menu (Alpine.js) -->
        <div x-show="mobileMenuOpen" x-cloak class="lg:hidden bg-[#1e3a8a] border-t border-blue-800/50 absolute top-full left-0 w-full shadow-lg" x-transition.opacity>
            <nav class="flex flex-col px-4 py-4 space-y-4">
                <a href="{{ route('beranda') }}" class="text-white font-medium">Beranda</a>
                <a href="{{ route('kabar') }}" class="text-white font-medium">Kabar Desa</a>
                
                <!-- Tentang Mobile -->
                <div x-data="{ openTentang: false }" class="flex flex-col">
                    <button @click="openTentang = !openTentang" class="flex justify-between items-center text-white font-medium outline-none">
                        <span>Tentang</span>
                        <svg class="w-4 h-4 transition-transform" :class="openTentang ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div x-show="openTentang" class="flex flex-col pl-4 mt-2 space-y-2 border-l-2 border-blue-700">
                        <a href="{{ route('sejarah') }}" class="text-blue-100 text-sm py-1">Sejarah</a>
                        <a href="{{ route('tentang.wilayah') }}" class="text-blue-100 text-sm py-1">Wilayah</a>
                        <a href="{{ route('tentang.demografi') }}" class="text-blue-100 text-sm py-1">Demografi</a>
                        <a href="{{ route('tentang.potensi') }}" class="text-blue-100 text-sm py-1">Potensi</a>
                        <a href="{{ route('tentang.wisata') }}" class="text-blue-100 text-sm py-1">Wisata Desa</a>
                        <a href="{{ route('galeri') }}" class="text-blue-100 text-sm py-1">Galeri Foto</a>
                    </div>
                </div>

                <!-- Lembaga Mobile -->
                <div x-data="{ openLembaga: false }" class="flex flex-col">
                    <button @click="openLembaga = !openLembaga" class="flex justify-between items-center text-white font-medium outline-none">
                        <span>Lembaga</span>
                        <svg class="w-4 h-4 transition-transform" :class="openLembaga ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div x-show="openLembaga" class="flex flex-col pl-4 mt-2 space-y-2 border-l-2 border-blue-700">
                        <a href="{{ route('lembaga') }}?kategori=Pemerintahan" class="text-blue-100 text-sm py-1">Pemerintahan</a>
                        <a href="{{ route('lembaga') }}?kategori=BPD" class="text-blue-100 text-sm py-1">BPD</a>
                        <a href="{{ route('lembaga') }}?kategori=LPM" class="text-blue-100 text-sm py-1">LPM</a>
                        <a href="{{ route('lembaga') }}?kategori=Posyandu" class="text-blue-100 text-sm py-1">Posyandu</a>
                        <a href="{{ route('lembaga') }}?kategori=PKK" class="text-blue-100 text-sm py-1">PKK</a>
                        <a href="{{ route('lembaga') }}?kategori=Karang+Taruna" class="text-blue-100 text-sm py-1">Karang Taruna</a>
                    </div>
                </div>

                <a href="{{ route('pembangunan') }}" class="text-white font-medium">Pembangunan</a>
                
                <button @click="showServiceModal = true; mobileMenuOpen = false" class="bg-yellow-400 text-[#1e3a8a] px-4 py-2 mt-4 rounded shadow-md font-bold text-sm w-full">
                    LAYANAN ONLINE
                </button>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow">
        {{ $slot }}
    </main>

    <!-- Footer (Biru Dongker) -->
    <footer class="bg-[#0f1f4d] border-t border-[#1e3a8a] pt-16 pb-8 mt-auto text-white">
        <div class="max-w-7xl mx-auto px-4 md:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
                
                <!-- Kolom 1: Desa Anti Korupsi -->
                <div>
                    <h3 class="font-bold text-yellow-400 mb-4 text-lg">Desa Anti Korupsi</h3>
                    <ul class="space-y-2 text-white/80 text-sm">
                        <li><a href="#" class="hover:text-white hover:underline transition">Tujuan dan Sasaran</a></li>
                        <li><a href="#" class="hover:text-white hover:underline transition">Visi dan Misi</a></li>
                        <li><a href="#" class="hover:text-white hover:underline transition">Asistensi dan Supervisi</a></li>
                        <li><a href="#" class="hover:text-white hover:underline transition">Partisipasi Masyarakat</a></li>
                        <li><a href="#" class="hover:text-white hover:underline transition">Pelatihan dan Edukasi</a></li>
                        <li><a href="#" class="hover:text-white hover:underline transition">Monitoring dan Evaluasi</a></li>
                        <li><a href="#" class="hover:text-white hover:underline transition">Pengaduan dan Pelaporan</a></li>
                        <li><a href="#" class="hover:text-white hover:underline transition">Transparansi dan Akuntabilitas</a></li>
                    </ul>
                </div>

                <!-- Kolom 2: PPID -->
                <div>
                    <h3 class="font-bold text-yellow-400 mb-4 text-lg">PPID</h3>
                    <ul class="space-y-2 text-white/80 text-sm">
                        <li><a href="#" class="hover:text-white hover:underline transition">Visi dan Misi</a></li>
                        <li><a href="#" class="hover:text-white hover:underline transition">SOP PPID</a></li>
                        <li><a href="#" class="hover:text-white hover:underline transition">Alur Informasi Publik</a></li>
                        <li><a href="#" class="hover:text-white hover:underline transition">Daftar Informasi Publik</a></li>
                        <li><a href="#" class="hover:text-white hover:underline transition">Maklumat Pelayanan Publik</a></li>
                    </ul>
                </div>

                <!-- Kolom 3: Program -->
                <div>
                    <h3 class="font-bold text-yellow-400 mb-4 text-lg">Program</h3>
                    <ul class="space-y-2 text-white/80 text-sm">
                        <li><a href="#" class="hover:text-white hover:underline transition">Kampung KB</a></li>
                        <li><a href="#" class="hover:text-white hover:underline transition">Inovasi Desa</a></li>
                        <li><a href="#" class="hover:text-white hover:underline transition">Pemberdayaan</a></li>
                        <li><a href="#" class="hover:text-white hover:underline transition">Literasi Digital</a></li>
                        <li><a href="#" class="hover:text-white hover:underline transition">Anti Narkoba</a></li>
                        <li><a href="#" class="hover:text-white hover:underline transition">Pamsimas</a></li>
                        <li><a href="#" class="hover:text-white hover:underline transition">Siskamling</a></li>
                        <li><a href="#" class="hover:text-white hover:underline transition">Pencegahan Stunting</a></li>
                        <li><a href="#" class="hover:text-white hover:underline transition">Ketahanan Pangan</a></li>
                        <li><a href="#" class="hover:text-white hover:underline transition">PAUD</a></li>
                    </ul>
                </div>

                <!-- Kolom 4: Link Terkait -->
                <div>
                    <h3 class="font-bold text-yellow-400 mb-4 text-lg">Link Terkait</h3>
                    <ul class="space-y-2 text-white/80 text-sm">
                        <li><a href="#" class="hover:text-white hover:underline transition">Prodeskel</a></li>
                        <li><a href="#" class="hover:text-white hover:underline transition">Epdeskel</a></li>
                        <li><a href="#" class="hover:text-white hover:underline transition">SID Kemendes</a></li>
                    </ul>
                </div>

            </div>

            <!-- Bottom Bar & Identity -->
            <div class="pt-8 border-t border-white/20 flex flex-col md:flex-row justify-between items-center gap-6">
                <!-- Copyright & Developer -->
                <div class="text-sm text-white/70 text-center md:text-left flex flex-col gap-2">
                    <p>&copy; {{ date('Y') }} Pemerintah Desa Kersagalih</p>
                    
                    <!-- KKN Identity Box -->
                    <div class="flex items-center gap-3 bg-[#1e3a8a] px-4 py-2 rounded-lg border border-white/10 mt-2">
                        <!-- Logo KKN Asli -->
                        <img src="{{ asset('images/LOGO KKN DESA KERSAGALIH 2026.png') }}" alt="Logo KKN Desa Kersagalih 2026" class="h-12 w-auto shrink-0 drop-shadow-md">
                        <div class="flex flex-col">
                            <span class="text-xs text-white/60">Dikembangkan oleh:</span>
                            <span class="font-bold text-white text-sm">KKN DESA KERSAGALIH 2026</span>
                            <span class="text-xs text-yellow-300 font-semibold">UNIVERSITAS PERJUANGAN TASIKMALAYA</span>
                        </div>
                    </div>
                </div>
                
                <div class="flex flex-col items-center md:items-end gap-4">
                    <div class="flex flex-wrap justify-center gap-4 text-sm text-white/70 font-medium">
                        <a href="#" class="hover:text-white hover:underline">Kebijakan Privasi</a>
                        <a href="#" class="hover:text-white hover:underline">Syarat dan Ketentuan</a>
                        <a href="#" class="hover:text-white hover:underline">Pedoman Media Siber</a>
                        <a href="#" class="hover:text-white hover:underline">Tanya Jawab</a>
                    </div>
                    
                    <!-- Social Icons -->
                    <div class="flex items-center space-x-4">
                        <a href="#" class="w-8 h-8 rounded-full bg-white/10 hover:bg-white text-white hover:text-[#1e3a8a] flex items-center justify-center transition-colors">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"/></svg>
                        </a>
                        <a href="#" class="w-8 h-8 rounded-full bg-white/10 hover:bg-white text-white hover:text-[#1e3a8a] flex items-center justify-center transition-colors">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                        </a>
                        <a href="#" class="w-8 h-8 rounded-full bg-white/10 hover:bg-white text-white hover:text-[#1e3a8a] flex items-center justify-center transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 5c7.18 0 13 5.82 13 13M6 11a7 7 0 017 7m-6 0a1 1 0 11-2 0 1 1 0 012 0z"/></svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Modal Layanan Online -->
    <div x-show="showServiceModal" x-cloak class="fixed inset-0 z-[100] flex items-center justify-center overflow-y-auto overflow-x-hidden bg-black/50 backdrop-blur-sm transition-opacity"
        x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
        <div x-show="showServiceModal" @click.away="showServiceModal = false" class="relative p-4 w-full max-w-md"
            x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
            <!-- Modal content -->
            <div class="relative bg-white rounded-3xl shadow-2xl p-8 text-center border border-slate-100">
                <!-- Close button -->
                <button @click="showServiceModal = false" type="button" class="absolute top-4 right-4 text-slate-400 hover:text-slate-900 bg-slate-50 hover:bg-slate-200 rounded-full text-sm w-8 h-8 flex justify-center items-center transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
                
                <!-- Icon -->
                <div class="w-20 h-20 bg-yellow-100 text-yellow-500 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                </div>
                
                <h3 class="mb-3 text-2xl font-extrabold text-slate-800">Tahap Pengembangan 🚧</h3>
                <p class="mb-8 text-slate-500 leading-relaxed">Fitur <strong>Layanan Online</strong> untuk surat menyurat sedang disiapkan untuk tahap <strong>pengembangan selanjutnya</strong>. Nantikan pembaruannya!</p>
                
                <button @click="showServiceModal = false" class="w-full text-[#1e3a8a] bg-yellow-400 hover:bg-yellow-300 font-extrabold rounded-xl text-sm px-5 py-3.5 text-center transition-colors shadow-lg shadow-yellow-400/30">
                    Oke, Saya Mengerti
                </button>
            </div>
        </div>
    </div>

</body>
</html>
