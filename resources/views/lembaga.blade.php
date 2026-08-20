<x-layout>
    <!-- Hero Section -->
    <section class="relative pt-32 pb-20 lg:pt-48 lg:pb-32 overflow-hidden bg-[#1e3a8a]">
        <div class="absolute inset-0">
            <!-- Gunakan foto balai desa atau kegiatan sebagai background -->
            <img src="https://images.unsplash.com/photo-1577414376483-37651a084c8a?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80" alt="Lembaga Desa" class="w-full h-full object-cover opacity-20 mix-blend-luminosity">
            <div class="absolute inset-0 bg-gradient-to-t from-[#0f1f4d] to-transparent"></div>
        </div>
        <div class="relative max-w-7xl mx-auto px-4 md:px-8 text-center" x-data="{ shown: false }" x-intersect.once="shown = true">
            <span :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'" class="transition-all duration-1000 ease-out text-yellow-300 font-bold tracking-widest uppercase text-sm mb-4 block">
                Aparatur & Kelembagaan
            </span>
            <h1 :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'" class="transition-all duration-1000 delay-100 ease-out text-4xl md:text-5xl lg:text-6xl font-extrabold text-white mb-6 drop-shadow-lg">
                Struktur Organisasi & Lembaga
            </h1>
            <p :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'" class="transition-all duration-1000 delay-200 ease-out text-lg md:text-xl text-blue-100 max-w-2xl mx-auto mb-8 font-light">
                Mengenal lebih dekat struktur pemerintahan dan kelembagaan yang melayani masyarakat Desa Kersagalih.
            </p>
        </div>
    </section>

    <!-- Content Section -->
    <div class="bg-slate-50 relative pb-24">
        <div class="max-w-7xl mx-auto px-4 md:px-8 relative z-10 -mt-10">
            
            <!-- Filter / Tabs Menu -->
            <div class="bg-white rounded-2xl shadow-lg border border-slate-100 p-2 md:p-4 mb-16 flex flex-wrap justify-center gap-2">
                @php
                    $categories = ['Semua Lembaga', 'Pemerintahan', 'BPD', 'LPM', 'Posyandu', 'PKK', 'Karang Taruna'];
                @endphp
                
                @foreach($categories as $cat)
                    @if($cat === 'Semua Lembaga')
                        <a href="{{ route('lembaga') }}" class="px-5 py-2.5 rounded-xl text-sm font-bold transition-all duration-300 {{ (!request()->has('kategori')) ? 'bg-[#1e3a8a] text-white shadow-md' : 'text-slate-600 hover:bg-slate-100 hover:text-[#1e3a8a]' }}">
                            {{ $cat }}
                        </a>
                    @else
                        <a href="{{ route('lembaga', ['kategori' => $cat]) }}" class="px-5 py-2.5 rounded-xl text-sm font-bold transition-all duration-300 {{ (request('kategori') === $cat) ? 'bg-[#1e3a8a] text-white shadow-md' : 'text-slate-600 hover:bg-slate-100 hover:text-[#1e3a8a]' }}">
                            {{ $cat }}
                        </a>
                    @endif
                @endforeach
            </div>

            <!-- Bagian Struktur -->
            @php
                $allCategories = ['Pemerintahan', 'BPD', 'LPM', 'Posyandu', 'PKK', 'Karang Taruna'];
                
                if (request('kategori') && request('kategori') !== 'Semua Lembaga') {
                    $displayCategories = [request('kategori')];
                } else {
                    $displayCategories = $allCategories;
                }

                $hasContent = false;
            @endphp

            @foreach($displayCategories as $category)
                @php
                    $personils = $personilGroups->get($category, collect());
                    $baganKey = 'bagan_' . Str::slug($category);
                    $hasBagan = isset($bagans[$baganKey]);
                @endphp

                @if($personils->isNotEmpty() || $hasBagan)
                    @php $hasContent = true; @endphp
                    <div class="mb-20" x-data="{ shown: false }" x-intersect.once="shown = true">
                        <!-- Judul Kategori -->
                        <div :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-5'" class="transition-all duration-700 ease-out flex items-center justify-between mb-10 border-b-2 border-slate-200 pb-4">
                            <h2 class="text-3xl font-extrabold text-[#1e3a8a] flex items-center gap-3">
                                <span class="bg-blue-100 text-[#1e3a8a] w-10 h-10 rounded-lg flex items-center justify-center text-xl">
                                    {{ $category == 'Pemerintahan' ? '🏛️' : ($category == 'BPD' ? '⚖️' : '👥') }}
                                </span>
                                {{ $category }}
                            </h2>
                            <span class="bg-slate-100 text-slate-600 px-3 py-1 rounded-full text-sm font-semibold border border-slate-200">{{ $personils->count() }} Anggota</span>
                        </div>

                        <!-- Bagan Struktur Organisasi Langsung di Halaman -->
                        @if($hasBagan)
                            <div :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'" class="transition-all duration-700 delay-100 ease-out mb-12 bg-white rounded-3xl p-6 shadow-md border border-slate-200">
                                <img src="{{ asset('storage/' . $bagans[$baganKey]) }}" alt="Struktur Organisasi {{ $category }}" class="w-full h-auto rounded-xl">
                            </div>
                        @endif

                        <!-- Grid SOTK Cards -->
                        @if($personils->isNotEmpty())
                            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 lg:gap-8">
                                @foreach($personils as $index => $personil)
                                    <div :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'" class="group relative bg-white rounded-2xl shadow-md hover:shadow-2xl hover:-translate-y-2 transition-all duration-500 overflow-hidden border border-slate-100 flex flex-col h-full" style="transition-delay: {{ $index * 50 }}ms;">
                                        
                                        <!-- Area Foto Profile Berlatar Merah -->
                                        <div class="w-full pt-[133%] relative overflow-hidden bg-red-600">
                                            @if($personil->image)
                                                <img src="{{ asset('storage/' . $personil->image) }}" alt="{{ $personil->name }}" class="absolute inset-0 w-full h-full object-cover object-top transition-transform duration-700 group-hover:scale-110">
                                            @else
                                                <img src="https://ui-avatars.com/api/?name={{ urlencode($personil->name) }}&background=ef4444&color=ffffff&size=512&font-size=0.33" alt="{{ $personil->name }}" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                                            @endif
                                            <div class="absolute inset-0 bg-gradient-to-t from-[#1e3a8a]/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                                        </div>

                                        <!-- Area Nama & Jabatan -->
                                        <div class="mt-auto p-5 text-center bg-gradient-to-br from-[#1e3a8a] to-blue-800 text-white relative z-10 border-t-4 border-yellow-400 flex-grow flex flex-col justify-center">
                                            <h3 class="font-extrabold text-lg leading-tight uppercase tracking-wide mb-1 text-white group-hover:text-yellow-300 transition-colors line-clamp-2">{{ $personil->name }}</h3>
                                            <p class="text-xs font-semibold text-blue-200 tracking-wider uppercase">{{ $personil->position }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center py-10 bg-slate-50 rounded-2xl border border-dashed border-slate-200">
                                <p class="text-slate-500">Belum ada anggota yang ditambahkan untuk kategori ini.</p>
                            </div>
                        @endif
                    </div>
                @endif
            @endforeach

            @if(!$hasContent)
                <div class="text-center py-20 bg-white rounded-3xl shadow-sm border border-slate-100">
                    <div class="w-20 h-20 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-4 text-slate-400">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    </div>
                    <h3 class="text-2xl font-bold text-slate-800 mb-2">Belum Ada Data</h3>
                    <p class="text-slate-500">Data struktur bagan maupun anggota untuk kategori ini belum ditambahkan oleh Admin.</p>
                </div>
            @endif

        </div>
    </div>
</x-layout>
