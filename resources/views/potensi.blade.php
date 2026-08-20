<x-layout>
    <!-- Hero Section -->
    <section class="relative pt-32 pb-20 lg:pt-48 lg:pb-32 overflow-hidden bg-[#1e3a8a]">
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1592982537447-7440770cbfc9?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80" alt="Potensi Desa" class="w-full h-full object-cover opacity-20 mix-blend-luminosity">
            <div class="absolute inset-0 bg-gradient-to-t from-[#0f1f4d] to-transparent"></div>
        </div>
        <div class="relative max-w-7xl mx-auto px-4 md:px-8 text-center" x-data="{ shown: false }" x-intersect.once="shown = true">
            <h1 :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'" class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-white mb-6 drop-shadow-lg transition-all duration-1000 ease-out">
                Potensi Desa
            </h1>
            <p :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'" class="text-lg md:text-xl text-blue-100 max-w-2xl mx-auto mb-8 font-light transition-all duration-1000 delay-100 ease-out">
                Infrastruktur, Pembangunan, dan Sumber Daya Desa Kersagalih
            </p>
        </div>
    </section>

    <div class="bg-slate-50 relative pb-24">
        <!-- Potensi & Aset -->
        <section class="max-w-7xl mx-auto px-4 md:px-8 relative z-10 -mt-16">
            <div class="bg-white rounded-3xl shadow-xl p-8 md:p-12 border border-slate-100">
                <div class="text-center mb-12">
                    <span class="text-[#1e3a8a] font-bold tracking-wider uppercase text-sm mb-2 block">Infrastruktur & Sumber Daya</span>
                    <h2 class="text-3xl md:text-4xl font-extrabold text-slate-800">Potensi Desa Kersagalih</h2>
                </div>

                <!-- Grid Potensi -->
                <div class="grid grid-cols-1 xl:grid-cols-2 gap-8" x-data="{ shown: false }" x-intersect.once="shown = true">
                    
                    <!-- Pembangunan -->
                    <div :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'" class="bg-slate-50 rounded-3xl shadow-md border border-slate-200 overflow-hidden transition-all duration-700 ease-out">
                        <div class="bg-gradient-to-r from-blue-600 to-blue-800 px-8 py-5">
                            <h3 class="text-white font-bold text-2xl flex items-center gap-3">
                                <span class="bg-white/20 p-2 rounded-lg">🏗️</span> Aset Pembangunan & Prasarana
                            </h3>
                        </div>
                        <div class="p-8">
                            <div class="space-y-8">
                                <div>
                                    <h4 class="font-bold text-slate-800 mb-4 border-b-2 border-blue-100 pb-2 text-lg">Prasarana Umum</h4>
                                    <ul class="grid grid-cols-1 md:grid-cols-2 gap-4 text-slate-600">
                                        <li class="flex justify-between items-center bg-white p-3 rounded-xl border border-slate-100 shadow-sm"><span>Jalan</span> <strong class="text-blue-700 text-lg">16 Km</strong></li>
                                        <li class="flex justify-between items-center bg-white p-3 rounded-xl border border-slate-100 shadow-sm"><span>Jembatan</span> <strong class="text-blue-700 text-lg">7 Buah</strong></li>
                                        <li class="flex justify-between items-center bg-white p-3 rounded-xl border border-slate-100 shadow-sm"><span>TPT</span> <strong class="text-blue-700 text-lg">2 Buah</strong></li>
                                    </ul>
                                </div>
                                <div>
                                    <h4 class="font-bold text-slate-800 mb-4 border-b-2 border-blue-100 pb-2 text-lg">Pendidikan</h4>
                                    <ul class="grid grid-cols-1 md:grid-cols-2 gap-4 text-slate-600">
                                        <li class="flex justify-between items-center bg-white p-3 rounded-xl border border-slate-100 shadow-sm"><span>PAUD</span> <strong class="text-blue-700 text-lg">4</strong></li>
                                        <li class="flex justify-between items-center bg-white p-3 rounded-xl border border-slate-100 shadow-sm"><span>TK</span> <strong class="text-blue-700 text-lg">1</strong></li>
                                        <li class="flex justify-between items-center bg-white p-3 rounded-xl border border-slate-100 shadow-sm"><span>SD</span> <strong class="text-blue-700 text-lg">3</strong></li>
                                        <li class="flex justify-between items-center bg-white p-3 rounded-xl border border-slate-100 shadow-sm"><span>SMP</span> <strong class="text-blue-700 text-lg">2</strong></li>
                                        <li class="flex justify-between items-center bg-white p-3 rounded-xl border border-slate-100 shadow-sm"><span>SMA/SMK</span> <strong class="text-blue-700 text-lg">1</strong></li>
                                        <li class="flex justify-between items-center bg-white p-3 rounded-xl border border-slate-100 shadow-sm"><span>Madrasah Diniyah</span> <strong class="text-blue-700 text-lg">9</strong></li>
                                    </ul>
                                </div>
                                <div>
                                    <h4 class="font-bold text-slate-800 mb-4 border-b-2 border-blue-100 pb-2 text-lg">Kesehatan & Ekonomi</h4>
                                    <ul class="grid grid-cols-1 md:grid-cols-2 gap-4 text-slate-600">
                                        <li class="flex justify-between items-center bg-white p-3 rounded-xl border border-slate-100 shadow-sm"><span>Posyandu</span> <strong class="text-blue-700 text-lg">5</strong></li>
                                        <li class="flex justify-between items-center bg-white p-3 rounded-xl border border-slate-100 shadow-sm"><span>Polindes</span> <strong class="text-blue-700 text-lg">1</strong></li>
                                        <li class="flex justify-between items-center bg-white p-3 rounded-xl border border-slate-100 shadow-sm"><span>Pustu</span> <strong class="text-blue-700 text-lg">1</strong></li>
                                        <li class="flex justify-between items-center bg-white p-3 rounded-xl border border-slate-100 shadow-sm"><span>Kandang Ternak</span> <strong class="text-blue-700 text-lg">10</strong></li>
                                        <li class="flex justify-between items-center bg-white p-3 rounded-xl border border-slate-100 shadow-sm"><span>Penggilingan Padi</span> <strong class="text-blue-700 text-lg">7</strong></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Kemasyarakatan -->
                    <div :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'" class="bg-slate-50 rounded-3xl shadow-md border border-slate-200 overflow-hidden transition-all duration-700 delay-100 ease-out">
                        <div class="bg-gradient-to-r from-emerald-600 to-emerald-800 px-8 py-5">
                            <h3 class="text-white font-bold text-2xl flex items-center gap-3">
                                <span class="bg-white/20 p-2 rounded-lg">👥</span> Pembinaan Kemasyarakatan
                            </h3>
                        </div>
                        <div class="p-8">
                            <div class="space-y-8">
                                <div>
                                    <h4 class="font-bold text-slate-800 mb-4 border-b-2 border-emerald-100 pb-2 text-lg">Lembaga Kemasyarakatan</h4>
                                    <ul class="grid grid-cols-1 md:grid-cols-2 gap-4 text-slate-600">
                                        <li class="flex justify-between items-center bg-white p-3 rounded-xl border border-slate-100 shadow-sm"><span>LPM</span> <strong class="text-emerald-700 text-lg">7</strong></li>
                                        <li class="flex justify-between items-center bg-white p-3 rounded-xl border border-slate-100 shadow-sm"><span>Karang Taruna</span> <strong class="text-emerald-700 text-lg">5</strong></li>
                                        <li class="flex justify-between items-center bg-white p-3 rounded-xl border border-slate-100 shadow-sm"><span>PKK</span> <strong class="text-emerald-700 text-lg">5</strong></li>
                                        <li class="flex justify-between items-center bg-white p-3 rounded-xl border border-slate-100 shadow-sm"><span>Kader Posyandu</span> <strong class="text-emerald-700 text-lg">25</strong></li>
                                        <li class="flex justify-between items-center bg-white p-3 rounded-xl border border-slate-100 shadow-sm"><span>Muslimat NU</span> <strong class="text-emerald-700 text-lg">115</strong></li>
                                        <li class="flex justify-between items-center bg-white p-3 rounded-xl border border-slate-100 shadow-sm"><span>Partai Politik</span> <strong class="text-emerald-700 text-lg">7</strong></li>
                                        <li class="flex justify-between items-center bg-white p-3 rounded-xl border border-slate-100 shadow-sm"><span>MUI Desa</span> <strong class="text-emerald-700 text-lg">1</strong></li>
                                        <li class="flex justify-between items-center bg-white p-3 rounded-xl border border-slate-100 shadow-sm"><span>Majelis Taklim</span> <strong class="text-emerald-700 text-lg">9</strong></li>
                                    </ul>
                                </div>
                                <div>
                                    <h4 class="font-bold text-slate-800 mb-4 border-b-2 border-emerald-100 pb-2 text-lg">Olahraga & Keamanan</h4>
                                    <ul class="grid grid-cols-1 md:grid-cols-2 gap-4 text-slate-600">
                                        <li class="flex justify-between items-center bg-white p-3 rounded-xl border border-slate-100 shadow-sm"><span>Lapang Bulu Tangkis</span> <strong class="text-emerald-700 text-lg">2</strong></li>
                                        <li class="flex justify-between items-center bg-white p-3 rounded-xl border border-slate-100 shadow-sm"><span>Klub Voley</span> <strong class="text-emerald-700 text-lg">5</strong></li>
                                        <li class="flex justify-between items-center bg-white p-3 rounded-xl border border-slate-100 shadow-sm"><span>Linmas / Hansip</span> <strong class="text-emerald-700 text-lg">20</strong></li>
                                        <li class="flex justify-between items-center bg-white p-3 rounded-xl border border-slate-100 shadow-sm"><span>Pos Ronda</span> <strong class="text-emerald-700 text-lg">20</strong></li>
                                    </ul>
                                </div>
                                <div>
                                    <h4 class="font-bold text-slate-800 mb-4 border-b-2 border-emerald-100 pb-2 text-lg">Aparatur Pemerintahan</h4>
                                    <div class="flex flex-wrap gap-3">
                                        <span class="bg-emerald-50 text-emerald-800 px-4 py-2 rounded-xl border border-emerald-200 shadow-sm font-semibold">Kades (1)</span>
                                        <span class="bg-emerald-50 text-emerald-800 px-4 py-2 rounded-xl border border-emerald-200 shadow-sm font-semibold">Sekdes (1)</span>
                                        <span class="bg-emerald-50 text-emerald-800 px-4 py-2 rounded-xl border border-emerald-200 shadow-sm font-semibold">Kasi (3)</span>
                                        <span class="bg-emerald-50 text-emerald-800 px-4 py-2 rounded-xl border border-emerald-200 shadow-sm font-semibold">Kaur (3)</span>
                                        <span class="bg-emerald-50 text-emerald-800 px-4 py-2 rounded-xl border border-emerald-200 shadow-sm font-semibold">Staf (2)</span>
                                        <span class="bg-emerald-50 text-emerald-800 px-4 py-2 rounded-xl border border-emerald-200 shadow-sm font-semibold">Operator (1)</span>
                                        <span class="bg-emerald-50 text-emerald-800 px-4 py-2 rounded-xl border border-emerald-200 shadow-sm font-semibold">Kadus (5)</span>
                                        <span class="bg-emerald-50 text-emerald-800 px-4 py-2 rounded-xl border border-emerald-200 shadow-sm font-semibold">RW (5)</span>
                                        <span class="bg-emerald-50 text-emerald-800 px-4 py-2 rounded-xl border border-emerald-200 shadow-sm font-semibold">RT (20)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>
</x-layout>
