<x-layout>
    <!-- Hero Section -->
    <section class="relative pt-32 pb-20 lg:pt-48 lg:pb-32 overflow-hidden bg-[#1e3a8a]">
        <div class="absolute inset-0">
            <!-- Pemandangan Hero -->
            <img src="https://images.unsplash.com/photo-1595844730298-b960fad97369?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80" alt="Sejarah Desa Kersagalih" class="w-full h-full object-cover opacity-20 mix-blend-luminosity">
            <div class="absolute inset-0 bg-gradient-to-t from-[#0f1f4d] to-transparent"></div>
        </div>
        <div class="relative max-w-7xl mx-auto px-4 md:px-8 text-center" x-data="{ shown: false }" x-intersect.once="shown = true">
            <h1 :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'" class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-white mb-6 drop-shadow-lg transition-all duration-1000 ease-out">
                Sejarah Desa Kersagalih
            </h1>
        </div>
    </section>

    <!-- Narasi Sejarah & Tabel -->
    <section class="py-16 md:py-24 bg-white relative">
        <div class="max-w-7xl mx-auto px-4 md:px-8">
            
            <!-- Grid Layout untuk Teks agar tidak terlalu memanjang dan tetap proporsional -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 mb-20" x-data="{ shown: false }" x-intersect.once="shown = true">
                
                <!-- Ornamen Garis -->
                <div class="hidden lg:block lg:col-span-1">
                    <div class="w-1 h-full bg-[#1e3a8a] rounded-full opacity-20"></div>
                </div>

                <!-- Konten Teks -->
                <div :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'" class="lg:col-span-10 transition-all duration-1000 ease-out">
                    <div class="prose prose-lg prose-slate max-w-none">
                        {!! \App\Models\Setting::getValue('sejarah_narasi', '<p class="text-xl md:text-2xl leading-relaxed text-slate-800 font-semibold mb-8"><span class="text-4xl text-[#1e3a8a]">D</span>ahulu Desa Kersagalih bernama Desa Campaka. Desa Campaka berdiri kurang lebih pada abad ke-19 yaitu sekitar tahun 1923, dengan Kepala Desa yang pertama yaitu Bapak Jayadisastra (Alm).</p><p class="text-lg md:text-xl leading-relaxed text-slate-600 mb-8">Seiring berjalannya waktu Desa Campaka pun berganti nama menjadi Desa Kersagalih. Dari kata <strong class="text-slate-800">‘Campaka’</strong> berubah menjadi <strong class="text-[#1e3a8a]">‘Kersagalih’</strong> sama halnya dengan kata ‘Insun Medal’ menjadi ‘Sumedang’.</p><p class="text-lg md:text-xl leading-relaxed text-slate-600">Desa Kersagalih dahulu wilayahnya terbilang cukup luas sehingga dimekarkan menjadi empat desa yaitu Desa Mandalamekar dan Desa Mandalahurip di sebelah selatan yang menjadi bagian dari Kecamatan Jatiwaras, dan Desa Kertarahayu di sebelah Timur yang menjadi bagian dari Kecamatan Jatiwaras juga.</p>') !!}
                    </div>
                </div>
            </div>

            <!-- Tabel Full Width -->
            <div x-data="{ shown: false }" x-intersect.once="shown = true">
                <div :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'" class="transition-all duration-1000 ease-out delay-200">
                    <div class="flex items-center justify-between mb-8 border-b-2 border-slate-100 pb-4">
                        <h2 class="text-3xl md:text-4xl font-extrabold text-[#1e3a8a]">Daftar Kepala Desa dari Masa ke Masa</h2>
                    </div>
                    
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-xl overflow-hidden">
                        <div class="overflow-x-auto">
                            <table class="w-full text-left border-collapse min-w-[600px]">
                                <thead>
                                    <tr class="bg-gradient-to-r from-[#1e3a8a] to-blue-700 text-white">
                                        <th class="py-5 px-6 font-bold w-20 text-center tracking-wider text-sm">No</th>
                                        <th class="py-5 px-6 font-bold tracking-wider text-sm">Nama Kepala Desa</th>
                                        <th class="py-5 px-6 font-bold tracking-wider text-sm">Masa Jabatan</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-100">
                                    <tr class="hover:bg-blue-50/50 transition-colors group">
                                        <td class="py-4 px-6 text-center text-slate-400 font-medium group-hover:text-[#1e3a8a] transition-colors">1</td>
                                        <td class="py-4 px-6 font-semibold text-slate-700">Bapak Jayadisastra (Alm)</td>
                                        <td class="py-4 px-6 text-slate-500"><span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-slate-100 text-slate-600">1923 - 1930</span></td>
                                    </tr>
                                    <tr class="bg-slate-50/50 hover:bg-blue-50/50 transition-colors group">
                                        <td class="py-4 px-6 text-center text-slate-400 font-medium group-hover:text-[#1e3a8a] transition-colors">2</td>
                                        <td class="py-4 px-6 font-semibold text-slate-700">Bapak Sulaeman (Alm)</td>
                                        <td class="py-4 px-6 text-slate-500"><span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-slate-100 text-slate-600">1931 - 1935</span></td>
                                    </tr>
                                    <tr class="hover:bg-blue-50/50 transition-colors group">
                                        <td class="py-4 px-6 text-center text-slate-400 font-medium group-hover:text-[#1e3a8a] transition-colors">3</td>
                                        <td class="py-4 px-6 font-semibold text-slate-700">Bapak Sumadipraja (Alm)</td>
                                        <td class="py-4 px-6 text-slate-500"><span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-slate-100 text-slate-600">1935 - 1947</span></td>
                                    </tr>
                                    <tr class="bg-slate-50/50 hover:bg-blue-50/50 transition-colors group">
                                        <td class="py-4 px-6 text-center text-slate-400 font-medium group-hover:text-[#1e3a8a] transition-colors">4</td>
                                        <td class="py-4 px-6 font-semibold text-slate-700">Bapak Sasmita (Alm)</td>
                                        <td class="py-4 px-6 text-slate-500"><span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-slate-100 text-slate-600">1947 - 1957</span></td>
                                    </tr>
                                    <tr class="hover:bg-blue-50/50 transition-colors group">
                                        <td class="py-4 px-6 text-center text-slate-400 font-medium group-hover:text-[#1e3a8a] transition-colors">5</td>
                                        <td class="py-4 px-6 font-semibold text-slate-700">Bapak Suparman (Alm)</td>
                                        <td class="py-4 px-6 text-slate-500"><span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-slate-100 text-slate-600">1958 - 1970</span></td>
                                    </tr>
                                    <tr class="bg-slate-50/50 hover:bg-blue-50/50 transition-colors group">
                                        <td class="py-4 px-6 text-center text-slate-400 font-medium group-hover:text-[#1e3a8a] transition-colors">6</td>
                                        <td class="py-4 px-6 font-semibold text-slate-700">Bapak Emo Suganda (Alm)</td>
                                        <td class="py-4 px-6 text-slate-500"><span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-slate-100 text-slate-600">1971 - 1980</span></td>
                                    </tr>
                                    <tr class="hover:bg-blue-50/50 transition-colors group">
                                        <td class="py-4 px-6 text-center text-slate-400 font-medium group-hover:text-[#1e3a8a] transition-colors">7</td>
                                        <td class="py-4 px-6 font-semibold text-slate-700">Bapak D. Djudju Juhana (Alm)</td>
                                        <td class="py-4 px-6 text-slate-500"><span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-slate-100 text-slate-600">1981 - 1999</span></td>
                                    </tr>
                                    <tr class="bg-slate-50/50 hover:bg-blue-50/50 transition-colors group">
                                        <td class="py-4 px-6 text-center text-slate-400 font-medium group-hover:text-[#1e3a8a] transition-colors">8</td>
                                        <td class="py-4 px-6 font-semibold text-slate-700">Bapak Suryaman</td>
                                        <td class="py-4 px-6 text-slate-500"><span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-slate-100 text-slate-600">2000 - 2008</span></td>
                                    </tr>
                                    <tr class="hover:bg-blue-50/50 transition-colors group">
                                        <td class="py-4 px-6 text-center text-slate-400 font-medium group-hover:text-[#1e3a8a] transition-colors">9</td>
                                        <td class="py-4 px-6 font-semibold text-slate-700">Bapak Encam Supriatna</td>
                                        <td class="py-4 px-6 text-slate-500"><span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-slate-100 text-slate-600">2008 - 2014</span></td>
                                    </tr>
                                    <tr class="bg-slate-50/50 hover:bg-blue-50/50 transition-colors group">
                                        <td class="py-4 px-6 text-center text-slate-400 font-medium group-hover:text-[#1e3a8a] transition-colors">10</td>
                                        <td class="py-4 px-6 font-semibold text-slate-700">Bapak Asep Nurhasan</td>
                                        <td class="py-4 px-6 text-slate-500"><span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-slate-100 text-slate-600">2015 - 2021</span></td>
                                    </tr>
                                    <tr class="bg-blue-50 hover:bg-blue-100 transition-colors group">
                                        <td class="py-4 px-6 text-center text-blue-500 font-bold group-hover:text-blue-700 transition-colors">11</td>
                                        <td class="py-4 px-6 font-extrabold text-[#1e3a8a]">Bapak Dadi Suryadi, S.IP</td>
                                        <td class="py-4 px-6">
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-[#1e3a8a] text-yellow-300 shadow-sm border border-[#1e3a8a]/20">
                                                2022 - Sekarang (PJ)
                                            </span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>
