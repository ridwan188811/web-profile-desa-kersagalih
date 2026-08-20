<x-admin-layout>
    <!-- Header Page -->
    <div class="mb-8">
        <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-800 tracking-tight">Dashboard Admin</h1>
        <p class="text-slate-500 mt-1">Ringkasan statistik dan akses cepat fitur manajemen website.</p>
    </div>

    <!-- Summary Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
        <!-- Card 1: Berita -->
        <div class="bg-white rounded-2xl p-6 border border-slate-100 shadow-sm relative overflow-hidden group hover:shadow-md transition-shadow">
            <div class="absolute right-0 top-0 w-24 h-24 bg-blue-50 rounded-bl-full -mr-4 -mt-4 transition-transform group-hover:scale-110"></div>
            <div class="relative z-10 flex items-start justify-between">
                <div>
                    <p class="text-sm font-bold text-slate-500 uppercase tracking-wider mb-1">Kabar Desa</p>
                    <h3 class="text-4xl font-extrabold text-[#1e3a8a]">{{ $stats['total_berita'] }}</h3>
                </div>
                <div class="w-12 h-12 rounded-xl bg-blue-100 text-[#1e3a8a] flex items-center justify-center">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2.5 2.5 0 00-2.5-2.5H14"></path></svg>
                </div>
            </div>
        </div>

        <!-- Card 2: SOTK & Lembaga -->
        <div class="bg-white rounded-2xl p-6 border border-slate-100 shadow-sm relative overflow-hidden group hover:shadow-md transition-shadow">
            <div class="absolute right-0 top-0 w-24 h-24 bg-emerald-50 rounded-bl-full -mr-4 -mt-4 transition-transform group-hover:scale-110"></div>
            <div class="relative z-10 flex items-start justify-between">
                <div>
                    <p class="text-sm font-bold text-slate-500 uppercase tracking-wider mb-1">Aparatur</p>
                    <h3 class="text-4xl font-extrabold text-emerald-600">{{ $stats['total_personil'] }}</h3>
                </div>
                <div class="w-12 h-12 rounded-xl bg-emerald-100 text-emerald-600 flex items-center justify-center">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                </div>
            </div>
        </div>

        <!-- Card 3: Galeri -->
        <div class="bg-white rounded-2xl p-6 border border-slate-100 shadow-sm relative overflow-hidden group hover:shadow-md transition-shadow">
            <div class="absolute right-0 top-0 w-24 h-24 bg-purple-50 rounded-bl-full -mr-4 -mt-4 transition-transform group-hover:scale-110"></div>
            <div class="relative z-10 flex items-start justify-between">
                <div>
                    <p class="text-sm font-bold text-slate-500 uppercase tracking-wider mb-1">Album Foto</p>
                    <h3 class="text-4xl font-extrabold text-purple-600">{{ $stats['total_album'] }}</h3>
                </div>
                <div class="w-12 h-12 rounded-xl bg-purple-100 text-purple-600 flex items-center justify-center">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                </div>
            </div>
        </div>

        <!-- Card 4: Potensi -->
        <div class="bg-white rounded-2xl p-6 border border-slate-100 shadow-sm relative overflow-hidden group hover:shadow-md transition-shadow">
            <div class="absolute right-0 top-0 w-24 h-24 bg-yellow-50 rounded-bl-full -mr-4 -mt-4 transition-transform group-hover:scale-110"></div>
            <div class="relative z-10 flex items-start justify-between">
                <div>
                    <p class="text-sm font-bold text-slate-500 uppercase tracking-wider mb-1">Potensi Desa</p>
                    <h3 class="text-4xl font-extrabold text-yellow-600">{{ $stats['total_potensi'] }}</h3>
                </div>
                <div class="w-12 h-12 rounded-xl bg-yellow-100 text-yellow-600 flex items-center justify-center">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Shortcuts Area -->
    <div class="mb-10">
        <h2 class="text-xl font-bold text-slate-800 mb-4 flex items-center gap-2">
            <svg class="w-5 h-5 text-yellow-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z" clip-rule="evenodd"></path></svg>
            Akses Cepat (Shortcut)
        </h2>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            
            <!-- Shortcut 1 -->
            <a href="{{ route('admin.posts.index') }}" class="flex items-center gap-4 bg-white p-5 rounded-2xl border border-slate-200 hover:border-[#1e3a8a] hover:shadow-lg transition-all group">
                <div class="w-14 h-14 shrink-0 rounded-full bg-blue-50 group-hover:bg-[#1e3a8a] text-blue-500 group-hover:text-white flex items-center justify-center transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                </div>
                <div>
                    <h3 class="font-bold text-slate-800 group-hover:text-[#1e3a8a] transition-colors">Tulis Kabar Desa</h3>
                    <p class="text-xs text-slate-500 mt-0.5">Buat artikel/berita terbaru</p>
                </div>
            </a>

            <!-- Shortcut 2 -->
            <a href="{{ route('admin.personils.index') }}" class="flex items-center gap-4 bg-white p-5 rounded-2xl border border-slate-200 hover:border-emerald-600 hover:shadow-lg transition-all group">
                <div class="w-14 h-14 shrink-0 rounded-full bg-emerald-50 group-hover:bg-emerald-600 text-emerald-500 group-hover:text-white flex items-center justify-center transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path></svg>
                </div>
                <div>
                    <h3 class="font-bold text-slate-800 group-hover:text-emerald-600 transition-colors">Tambah Anggota SOTK</h3>
                    <p class="text-xs text-slate-500 mt-0.5">Input data & foto aparatur desa</p>
                </div>
            </a>

            <!-- Shortcut 3 -->
            <a href="{{ route('admin.albums.index') }}" class="flex items-center gap-4 bg-white p-5 rounded-2xl border border-slate-200 hover:border-purple-600 hover:shadow-lg transition-all group">
                <div class="w-14 h-14 shrink-0 rounded-full bg-purple-50 group-hover:bg-purple-600 text-purple-500 group-hover:text-white flex items-center justify-center transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                </div>
                <div>
                    <h3 class="font-bold text-slate-800 group-hover:text-purple-600 transition-colors">Buat Album Baru</h3>
                    <p class="text-xs text-slate-500 mt-0.5">Unggah koleksi foto kegiatan</p>
                </div>
            </a>

        </div>
    </div>

    <!-- Info Box -->
    <div class="bg-blue-50 border border-blue-100 rounded-2xl p-6 flex flex-col md:flex-row items-center gap-6">
        <div class="w-16 h-16 shrink-0 bg-white rounded-full flex items-center justify-center shadow-sm">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-10 h-10 object-contain" onerror="this.src='https://upload.wikimedia.org/wikipedia/commons/e/e0/Lambang_Kabupaten_Tasikmalaya.png'">
        </div>
        <div>
            <h3 class="font-bold text-[#1e3a8a] text-lg mb-1">Selamat Bekerja!</h3>
            <p class="text-slate-600 text-sm leading-relaxed">Website ini dikelola secara dinamis. Perubahan yang Anda lakukan pada menu Kabar Desa, SOTK, maupun Galeri akan langsung terlihat oleh masyarakat di halaman publik. Pastikan data yang dimasukkan akurat.</p>
        </div>
    </div>

</x-admin-layout>
