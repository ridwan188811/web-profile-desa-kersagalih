<x-layout>
    <!-- Hero Section -->
    <section class="relative pt-32 pb-20 lg:pt-48 lg:pb-32 overflow-hidden bg-[#1e3a8a]">
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1500382017468-9049fed747ef?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80" alt="Wilayah Desa Kersagalih" class="w-full h-full object-cover opacity-30 mix-blend-luminosity">
            <div class="absolute inset-0 bg-gradient-to-t from-[#0f1f4d] via-[#1e3a8a]/60 to-transparent"></div>
        </div>
        <div class="relative max-w-7xl mx-auto px-4 md:px-8 text-center" x-data="{ shown: false }" x-intersect.once="shown = true">
            <h1 :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'" class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-white mb-6 drop-shadow-lg transition-all duration-1000 ease-out">
                Wilayah & Geografis
            </h1>
            <p :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'" class="text-lg md:text-xl text-blue-100 max-w-2xl mx-auto mb-8 font-light transition-all duration-1000 delay-100 ease-out">
                Potret Administratif dan Kondisi Alam Desa Kersagalih
            </p>
        </div>
    </section>

    <div class="bg-slate-50 relative pb-24">
        
        <!-- 1. Seksi Lokasi & Batas Wilayah -->
        <section class="max-w-7xl mx-auto px-4 md:px-8 relative z-10 -mt-16">
            <div class="bg-white rounded-3xl shadow-xl p-8 border border-slate-100" x-data="{ shown: false }" x-intersect.once="shown = true">
                <p class="text-lg md:text-xl font-medium leading-relaxed text-slate-700 mb-8 text-center max-w-4xl mx-auto">
                    Desa Kersagalih merupakan salah satu dari 11 Desa di Wilayah Kecamatan Jatiwaras, Kabupaten Tasikmalaya.
                </p>

                <!-- Jarak Administratif -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
                    <div class="bg-blue-50 rounded-2xl p-6 text-center border border-blue-100 hover:shadow-md transition-shadow">
                        <div class="w-14 h-14 bg-[#1e3a8a] text-white rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                        </div>
                        <h4 class="font-bold text-slate-800 mb-1">Kantor Kecamatan</h4>
                        <p class="text-[#1e3a8a] font-extrabold text-2xl">{{ \App\Models\Setting::getValue('jarak_kecamatan', '17') }} Km</p>
                    </div>
                    <div class="bg-blue-50 rounded-2xl p-6 text-center border border-blue-100 hover:shadow-md transition-shadow">
                        <div class="w-14 h-14 bg-[#1e3a8a] text-white rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"></path></svg>
                        </div>
                        <h4 class="font-bold text-slate-800 mb-1">Kota Kabupaten</h4>
                        <p class="text-[#1e3a8a] font-extrabold text-2xl">{{ \App\Models\Setting::getValue('jarak_kabupaten', '35') }} Km</p>
                    </div>
                    <div class="bg-blue-50 rounded-2xl p-6 text-center border border-blue-100 hover:shadow-md transition-shadow">
                        <div class="w-14 h-14 bg-[#1e3a8a] text-white rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <h4 class="font-bold text-slate-800 mb-1">Kota Provinsi</h4>
                        <p class="text-[#1e3a8a] font-extrabold text-2xl">{{ \App\Models\Setting::getValue('jarak_provinsi', '160') }} Km</p>
                    </div>
                </div>

                <hr class="border-slate-200 mb-10">

                <h3 class="text-2xl font-bold text-center text-[#1e3a8a] mb-8">Batas-Batas Desa</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                    <div class="flex items-center gap-4 p-4 rounded-xl border border-slate-200 bg-white shadow-sm">
                        <div class="w-12 h-12 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center font-bold text-xl shrink-0">U</div>
                        <div>
                            <p class="text-xs text-slate-500 font-semibold uppercase tracking-wider mb-1">Sebelah Utara</p>
                            <p class="font-bold text-slate-800 leading-tight">{{ \App\Models\Setting::getValue('batas_utara', 'Desa Ciwarak') }}</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-4 p-4 rounded-xl border border-slate-200 bg-white shadow-sm">
                        <div class="w-12 h-12 rounded-full bg-yellow-100 text-yellow-600 flex items-center justify-center font-bold text-xl shrink-0">T</div>
                        <div>
                            <p class="text-xs text-slate-500 font-semibold uppercase tracking-wider mb-1">Sebelah Timur</p>
                            <p class="font-bold text-slate-800 leading-tight">{{ \App\Models\Setting::getValue('batas_timur', 'Desa Kertarahayu') }}</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-4 p-4 rounded-xl border border-slate-200 bg-white shadow-sm">
                        <div class="w-12 h-12 rounded-full bg-red-100 text-red-600 flex items-center justify-center font-bold text-xl shrink-0">S</div>
                        <div>
                            <p class="text-xs text-slate-500 font-semibold uppercase tracking-wider mb-1">Sebelah Selatan</p>
                            <p class="font-bold text-slate-800 leading-tight">{{ \App\Models\Setting::getValue('batas_selatan', 'Desa Mandalamekar') }}</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-4 p-4 rounded-xl border border-slate-200 bg-white shadow-sm">
                        <div class="w-12 h-12 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold text-xl shrink-0">B</div>
                        <div>
                            <p class="text-xs text-slate-500 font-semibold uppercase tracking-wider mb-1">Sebelah Barat</p>
                            <p class="font-bold text-slate-800 leading-tight">{{ \App\Models\Setting::getValue('batas_barat', 'Desa Cibalong') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 2. Penggunaan Lahan -->
        <section class="max-w-7xl mx-auto px-4 md:px-8 mt-16">
            <div class="flex flex-col lg:flex-row gap-12 items-center" x-data="{ shown: false }" x-intersect.once="shown = true">
                <div :class="shown ? 'opacity-100 translate-x-0' : 'opacity-0 -translate-x-10'" class="w-full lg:w-1/2 transition-all duration-1000 ease-out">
                    <span class="text-[#1e3a8a] font-bold tracking-wider uppercase text-sm mb-2 block">Luas Wilayah</span>
                    <h2 class="text-3xl md:text-4xl font-extrabold text-slate-800 mb-6 leading-tight">Penggunaan Lahan <br><span class="text-[#1e3a8a]">± {{ \App\Models\Setting::getValue('luas_total', '980') }} Hektar</span></h2>
                    
                    <div class="overflow-x-auto rounded-xl shadow-sm border border-slate-200 w-full mb-6">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-slate-100 text-slate-700">
                                    <th class="py-4 px-6 font-bold w-16 text-center">No</th>
                                    <th class="py-4 px-6 font-bold">Uraian</th>
                                    <th class="py-4 px-6 font-bold text-right">Luas (Ha)</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-200">
                                <tr class="bg-white">
                                    <td class="py-3 px-6 text-center font-medium text-slate-500">1</td>
                                    <td class="py-3 px-6 font-semibold text-slate-700">Pertanian basah</td>
                                    <td class="py-3 px-6 font-bold text-[#1e3a8a] text-right">{{ \App\Models\Setting::getValue('lahan_basah', '85.97') }}</td>
                                </tr>
                                <tr class="bg-slate-50">
                                    <td class="py-3 px-6 text-center font-medium text-slate-500">2</td>
                                    <td class="py-3 px-6 font-semibold text-slate-700">Pertanian kering</td>
                                    <td class="py-3 px-6 font-bold text-[#1e3a8a] text-right">{{ \App\Models\Setting::getValue('lahan_kering', '362.02') }}</td>
                                </tr>
                                <tr class="bg-white">
                                    <td class="py-3 px-6 text-center font-medium text-slate-500">3</td>
                                    <td class="py-3 px-6 font-semibold text-slate-700">Pemukiman & Perkantoran</td>
                                    <td class="py-3 px-6 font-bold text-[#1e3a8a] text-right">{{ \App\Models\Setting::getValue('lahan_pemukiman', '109.77') }}</td>
                                </tr>
                                <tr class="bg-slate-50">
                                    <td class="py-3 px-6 text-center font-medium text-slate-500">4</td>
                                    <td class="py-3 px-6 font-semibold text-slate-700">Hutan</td>
                                    <td class="py-3 px-6 font-bold text-[#1e3a8a] text-right">{{ \App\Models\Setting::getValue('lahan_hutan', '24.56') }}</td>
                                </tr>
                                <tr class="bg-white">
                                    <td class="py-3 px-6 text-center font-medium text-slate-500">5</td>
                                    <td class="py-3 px-6 font-semibold text-slate-700">Lahan lainnya</td>
                                    <td class="py-3 px-6 font-bold text-[#1e3a8a] text-right">{{ \App\Models\Setting::getValue('lahan_lainnya', '397.68') }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <div :class="shown ? 'opacity-100 translate-x-0' : 'opacity-0 translate-x-10'" class="w-full lg:w-1/2 transition-all duration-1000 delay-200 ease-out">
                    <div class="bg-white rounded-3xl shadow-xl p-8 border border-slate-100 relative">
                        <canvas id="landChart" class="w-full max-w-md mx-auto aspect-square"></canvas>
                        <p class="text-center text-sm text-slate-500 mt-6 font-medium italic">*Diagram visual persentase lahan</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- 3. Topografi & Hidrologi -->
        <section class="max-w-7xl mx-auto px-4 md:px-8 mt-24">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <!-- Topografi -->
                <div class="bg-white rounded-3xl p-8 shadow-md border border-slate-100" x-data="{ shown: false }" x-intersect.once="shown = true">
                    <h3 class="text-2xl font-bold text-[#1e3a8a] mb-4 flex items-center gap-3">
                        <svg class="w-8 h-8 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                        Topografi Lahan
                    </h3>
                    <p class="text-slate-600 leading-relaxed mb-6">
                        Berada pada ketinggian <strong class="text-slate-800">300 – 450 mdpl</strong>. Bentang alam didominasi oleh permukaan landai sampai sangat curam.
                    </p>
                    
                    <div class="space-y-4 mb-8">
                        <div>
                            <div class="flex justify-between text-sm mb-1"><span class="font-semibold text-slate-700">Sangat Curam</span><span class="font-bold text-[#1e3a8a]">± 25%</span></div>
                            <div class="w-full bg-slate-200 rounded-full h-2"><div class="bg-red-500 h-2 rounded-full" style="width: 25%"></div></div>
                        </div>
                        <div>
                            <div class="flex justify-between text-sm mb-1"><span class="font-semibold text-slate-700">Curam</span><span class="font-bold text-[#1e3a8a]">± 20%</span></div>
                            <div class="w-full bg-slate-200 rounded-full h-2"><div class="bg-orange-500 h-2 rounded-full" style="width: 20%"></div></div>
                        </div>
                        <div>
                            <div class="flex justify-between text-sm mb-1"><span class="font-semibold text-slate-700">Agak Curam</span><span class="font-bold text-[#1e3a8a]">± 25%</span></div>
                            <div class="w-full bg-slate-200 rounded-full h-2"><div class="bg-yellow-400 h-2 rounded-full" style="width: 25%"></div></div>
                        </div>
                        <div>
                            <div class="flex justify-between text-sm mb-1"><span class="font-semibold text-slate-700">Landai</span><span class="font-bold text-[#1e3a8a]">± 20%</span></div>
                            <div class="w-full bg-slate-200 rounded-full h-2"><div class="bg-emerald-400 h-2 rounded-full" style="width: 20%"></div></div>
                        </div>
                        <div>
                            <div class="flex justify-between text-sm mb-1"><span class="font-semibold text-slate-700">Datar</span><span class="font-bold text-[#1e3a8a]">± 10%</span></div>
                            <div class="w-full bg-slate-200 rounded-full h-2"><div class="bg-emerald-600 h-2 rounded-full" style="width: 10%"></div></div>
                        </div>
                    </div>

                    <div class="overflow-hidden rounded-xl border border-slate-200">
                        <table class="w-full text-sm text-left">
                            <thead class="bg-slate-100 text-slate-700">
                                <tr>
                                    <th class="py-3 px-4 font-bold">Ketinggian (mdpl)</th>
                                    <th class="py-3 px-4 font-bold">Sebaran (Dusun)</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100">
                                <tr class="bg-white"><td class="py-2 px-4 font-semibold text-[#1e3a8a]">300 - 350</td><td class="py-2 px-4 text-slate-600">Cilendi, Parungjagong, Bakung</td></tr>
                                <tr class="bg-slate-50"><td class="py-2 px-4 font-semibold text-[#1e3a8a]">350 - 400</td><td class="py-2 px-4 text-slate-600">Parungjagong, Barangbang</td></tr>
                                <tr class="bg-white"><td class="py-2 px-4 font-semibold text-[#1e3a8a]">400 - 450</td><td class="py-2 px-4 text-slate-600">Barangbang, Setiakarya</td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Hidrologi & Klimatologi -->
                <div class="flex flex-col gap-8">
                    <!-- Hidrologi -->
                    <div class="bg-white rounded-3xl p-8 shadow-md border border-slate-100" x-data="{ shown: false }" x-intersect.once="shown = true">
                        <h3 class="text-2xl font-bold text-[#1e3a8a] mb-4 flex items-center gap-3">
                            <svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z"></path></svg>
                            Sistem Hidrologi
                        </h3>
                        <p class="text-slate-600 leading-relaxed mb-6 text-sm">
                            Kondisi hidrologi terdiri dari DAS besar dan kecil yang dipengaruhi fisiografi. Pola aliran umumnya berpola <strong>radial</strong> (dominasi vulkanik) dan <strong>irregular</strong> pada daerah tektonik.
                        </p>
                        <h4 class="font-bold text-slate-800 mb-3 text-sm uppercase tracking-wider">3 Sungai Utama:</h4>
                        <div class="flex flex-wrap gap-2">
                            <span class="px-4 py-1.5 bg-blue-50 text-blue-700 font-bold rounded-full border border-blue-100 shadow-sm">Ci Batur</span>
                            <span class="px-4 py-1.5 bg-blue-50 text-blue-700 font-bold rounded-full border border-blue-100 shadow-sm">Ci Putih</span>
                            <span class="px-4 py-1.5 bg-blue-50 text-blue-700 font-bold rounded-full border border-blue-100 shadow-sm">Ci Wulan</span>
                        </div>
                    </div>

                    <!-- Klimatologi -->
                    <div class="bg-gradient-to-br from-[#1e3a8a] to-[#2a4fac] rounded-3xl p-8 shadow-lg text-white" x-data="{ shown: false }" x-intersect.once="shown = true">
                        <h3 class="text-2xl font-bold text-white mb-6">Klimatologi & Cuaca</h3>
                        <div class="grid grid-cols-2 gap-6">
                            <div class="bg-white/10 rounded-2xl p-4 border border-white/20">
                                <div class="text-2xl mb-1">🌡️</div>
                                <div class="text-xs text-white/70 uppercase font-bold tracking-wider mb-1">Suhu Rata-rata</div>
                                <div class="text-2xl font-extrabold text-yellow-300">28°C</div>
                            </div>
                            <div class="bg-white/10 rounded-2xl p-4 border border-white/20">
                                <div class="text-2xl mb-1">💧</div>
                                <div class="text-xs text-white/70 uppercase font-bold tracking-wider mb-1">Kelembaban</div>
                                <div class="text-2xl font-extrabold text-blue-200">50%</div>
                            </div>
                            <div class="col-span-2 bg-white/10 rounded-2xl p-4 border border-white/20 flex items-center justify-between">
                                <div>
                                    <div class="text-xs text-white/70 uppercase font-bold tracking-wider mb-1">Curah Hujan</div>
                                    <div class="text-xl font-bold">2.171,95 <span class="text-sm font-normal text-white/80">mm/thn</span></div>
                                </div>
                                <div class="text-right">
                                    <div class="text-xs text-white/70 uppercase font-bold tracking-wider mb-1">Hari Hujan</div>
                                    <div class="text-xl font-bold">84 <span class="text-sm font-normal text-white/80">hari</span></div>
                                </div>
                            </div>
                            <div class="col-span-2 text-sm text-white/80 text-center font-medium">
                                🌦️ Musim Hujan: <strong class="text-white">Okt - Mei</strong> &nbsp;|&nbsp; ☀️ Kemarau: <strong class="text-white">Jun - Sep</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 4. Geologi & Geomorfologi -->
        <section class="max-w-7xl mx-auto px-4 md:px-8 mt-24">
            <div class="bg-white rounded-3xl p-8 md:p-12 shadow-xl border border-slate-100" x-data="{ shown: false }" x-intersect.once="shown = true">
                <div class="text-center mb-12">
                    <span class="text-[#1e3a8a] font-bold tracking-wider uppercase text-sm mb-2 block">Struktur Bumi</span>
                    <h2 class="text-3xl md:text-4xl font-extrabold text-slate-800">Geologi & Geomorfologi</h2>
                </div>
                
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                    <div>
                        <div class="bg-yellow-50 border-l-4 border-yellow-400 p-6 rounded-r-xl mb-8">
                            <p class="text-slate-700 font-medium leading-relaxed">
                                Kondisi geologi Desa Kersagalih termasuk pada kelompok <strong class="text-[#1e3a8a]">Geologi Landscape Pegunungan Lipatan dan Patahan</strong>.
                            </p>
                        </div>
                        <p class="text-slate-600 leading-relaxed mb-4 font-semibold">
                            Secara umum di Kabupaten Tasikmalaya terdapat 3 kelompok geologi:
                        </p>
                        <ul class="space-y-3 text-slate-600 mb-8">
                            <li class="flex items-start gap-3">
                                <div class="w-6 h-6 rounded-full bg-slate-100 text-slate-500 flex items-center justify-center shrink-0 font-bold text-xs mt-0.5">1</div>
                                <span>Geologi Landscape Depresi (Material vulkanis Galunggung, Sawal, Cakrabuana).</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <div class="w-6 h-6 rounded-full bg-[#1e3a8a] text-white flex items-center justify-center shrink-0 font-bold text-xs mt-0.5 shadow-md">2</div>
                                <div>
                                    <strong class="text-[#1e3a8a]">Geologi Landscape Pegunungan Lipatan & Patahan</strong>
                                    <p class="text-sm mt-1">Berisi batuan kapur & vulkanik. <span class="bg-green-100 text-green-700 text-xs px-2 py-0.5 rounded font-bold ml-1">Lokasi Kersagalih</span></p>
                                </div>
                            </li>
                            <li class="flex items-start gap-3">
                                <div class="w-6 h-6 rounded-full bg-slate-100 text-slate-500 flex items-center justify-center shrink-0 font-bold text-xs mt-0.5">3</div>
                                <span>Geologi Landscape Dataran Pantai Selatan.</span>
                            </li>
                        </ul>
                    </div>
                    
                    <div>
                        <h4 class="font-bold text-xl text-slate-800 mb-6 border-b border-slate-100 pb-3">4 Satuan Geomorfologi Wilayah:</h4>
                        <div class="space-y-6">
                            <div class="flex gap-4">
                                <div class="w-10 h-10 rounded-full bg-slate-100 border border-slate-200 text-[#1e3a8a] font-bold flex items-center justify-center shrink-0 shadow-sm">1</div>
                                <div>
                                    <h5 class="font-bold text-slate-800 text-lg">Satuan Vulkanik Ber-relief Tinggi</h5>
                                    <p class="text-sm text-slate-600 mt-1 leading-relaxed">Erupsi vulkanik, aliran radier ditampung Sungai Ciwulan. Membentang seperti tapak kuda terbuka ke arah selatan.</p>
                                </div>
                            </div>
                            <div class="flex gap-4">
                                <div class="w-10 h-10 rounded-full bg-slate-100 border border-slate-200 text-[#1e3a8a] font-bold flex items-center justify-center shrink-0 shadow-sm">2</div>
                                <div>
                                    <h5 class="font-bold text-slate-800 text-lg">Satuan Perbukitan Sedimen</h5>
                                    <p class="text-sm text-slate-600 mt-1 leading-relaxed">Relief tinggi-sedang, sedimen klastika, dialiri lima sungai hampir paralel ke selatan. Berada di tengah tapak kuda.</p>
                                </div>
                            </div>
                            <div class="flex gap-4">
                                <div class="w-10 h-10 rounded-full bg-slate-100 border border-slate-200 text-[#1e3a8a] font-bold flex items-center justify-center shrink-0 shadow-sm">3</div>
                                <div>
                                    <h5 class="font-bold text-slate-800 text-lg">Satuan Kara Ber-relief Sedang</h5>
                                    <p class="text-sm text-slate-600 mt-1 leading-relaxed">Batu gamping, aliran dentritik, ada sungai bawah tanah. Menyebar di lingkaran perbukitan terlipat.</p>
                                </div>
                            </div>
                            <div class="flex gap-4">
                                <div class="w-10 h-10 rounded-full bg-slate-100 border border-slate-200 text-[#1e3a8a] font-bold flex items-center justify-center shrink-0 shadow-sm">4</div>
                                <div>
                                    <h5 class="font-bold text-slate-800 text-lg">Satuan Peneplain</h5>
                                    <p class="text-sm text-slate-600 mt-1 leading-relaxed">Batuan vulkanik & sedimen tertua di Tasikmalaya. Relief rendah, aliran hampir paralel.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const ctx = document.getElementById('landChart').getContext('2d');
            new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ['Pertanian Basah', 'Pertanian Kering', 'Pemukiman', 'Hutan', 'Lahan Lainnya'],
                    datasets: [{
                        data: [
                            {{ \App\Models\Setting::getValue('lahan_basah', '85.97') }}, 
                            {{ \App\Models\Setting::getValue('lahan_kering', '362.02') }}, 
                            {{ \App\Models\Setting::getValue('lahan_pemukiman', '109.77') }}, 
                            {{ \App\Models\Setting::getValue('lahan_hutan', '24.56') }}, 
                            {{ \App\Models\Setting::getValue('lahan_lainnya', '397.68') }}
                        ],
                        backgroundColor: [
                            '#3b82f6', // blue
                            '#f59e0b', // yellow/orange
                            '#ef4444', // red
                            '#10b981', // emerald
                            '#94a3b8'  // slate
                        ],
                        borderWidth: 0,
                        hoverOffset: 10
                    }]
                },
                options: {
                    responsive: true,
                    cutout: '65%',
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                padding: 20,
                                font: { family: "'Poppins', sans-serif" }
                            }
                        }
                    }
                }
            });
        });
    </script>
</x-layout>
