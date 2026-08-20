<x-layout>
    <!-- Hero Section -->
    <section class="relative pt-32 pb-20 lg:pt-48 lg:pb-32 overflow-hidden bg-[#1e3a8a]">
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1543857778-c4a1a3e0b2eb?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80" alt="Demografi Desa" class="w-full h-full object-cover opacity-20 mix-blend-luminosity">
            <div class="absolute inset-0 bg-gradient-to-t from-[#0f1f4d] to-transparent"></div>
        </div>
        <div class="relative max-w-7xl mx-auto px-4 md:px-8 text-center" x-data="{ shown: false }" x-intersect.once="shown = true">
            <h1 :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'" class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-white mb-6 drop-shadow-lg transition-all duration-1000 ease-out">
                Demografi & Potensi Desa
            </h1>
            <p :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'" class="text-lg md:text-xl text-blue-100 max-w-2xl mx-auto mb-8 font-light transition-all duration-1000 delay-100 ease-out">
                Statistik Kependudukan, Sosial, Ekonomi, dan Infrastruktur Desa Kersagalih
            </p>
        </div>
    </section>

    <div class="bg-slate-50 relative pb-24">
        
        <!-- 1. Ringkasan Kependudukan -->
        <section class="max-w-7xl mx-auto px-4 md:px-8 relative z-10 -mt-16">
            <div class="bg-white rounded-3xl shadow-xl p-8 border border-slate-100" x-data="{ shown: false }" x-intersect.once="shown = true">
                <div class="flex items-center justify-between mb-8 border-b-2 border-slate-100 pb-4">
                    <h2 class="text-2xl md:text-3xl font-extrabold text-[#1e3a8a]">Statistik Penduduk</h2>
                    <span class="text-sm font-medium text-slate-500 bg-slate-100 px-3 py-1 rounded-full">Per 12 Okt 2023</span>
                </div>

                <!-- Kartu Utama -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
                    <div class="bg-gradient-to-br from-blue-500 to-blue-700 rounded-2xl p-6 text-white shadow-lg relative overflow-hidden group">
                        <div class="absolute -right-6 -bottom-6 opacity-20 group-hover:scale-110 transition-transform duration-500">
                            <svg class="w-32 h-32" fill="currentColor" viewBox="0 0 20 20"><path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path></svg>
                        </div>
                        <h4 class="font-bold text-blue-100 mb-1 relative z-10">Total Penduduk</h4>
                        <p class="font-extrabold text-4xl relative z-10">{{ number_format(\App\Models\Setting::getValue('penduduk_total', 3793), 0, ',', '.') }} <span class="text-lg font-medium text-blue-200">Jiwa</span></p>
                    </div>
                    <div class="bg-gradient-to-br from-emerald-500 to-emerald-700 rounded-2xl p-6 text-white shadow-lg relative overflow-hidden group">
                        <div class="absolute -right-6 -bottom-6 opacity-20 group-hover:scale-110 transition-transform duration-500">
                            <svg class="w-32 h-32" fill="currentColor" viewBox="0 0 20 20"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                        </div>
                        <h4 class="font-bold text-emerald-100 mb-1 relative z-10">Kepala Keluarga</h4>
                        <p class="font-extrabold text-4xl relative z-10">{{ number_format(\App\Models\Setting::getValue('penduduk_kk', 1173), 0, ',', '.') }} <span class="text-lg font-medium text-emerald-200">KK</span></p>
                    </div>
                    <div class="bg-gradient-to-br from-indigo-500 to-indigo-700 rounded-2xl p-6 text-white shadow-lg relative overflow-hidden group">
                        <div class="absolute -right-6 -bottom-6 opacity-20 group-hover:scale-110 transition-transform duration-500">
                            <svg class="w-32 h-32" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        </div>
                        <h4 class="font-bold text-indigo-100 mb-1 relative z-10">Laki-Laki</h4>
                        <p class="font-extrabold text-4xl relative z-10">{{ number_format(\App\Models\Setting::getValue('penduduk_lk', 1923), 0, ',', '.') }} <span class="text-lg font-medium text-indigo-200">Jiwa</span></p>
                    </div>
                    <div class="bg-gradient-to-br from-pink-500 to-pink-700 rounded-2xl p-6 text-white shadow-lg relative overflow-hidden group">
                        <div class="absolute -right-6 -bottom-6 opacity-20 group-hover:scale-110 transition-transform duration-500">
                            <svg class="w-32 h-32" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                        </div>
                        <h4 class="font-bold text-pink-100 mb-1 relative z-10">Perempuan</h4>
                        <p class="font-extrabold text-4xl relative z-10">{{ number_format(\App\Models\Setting::getValue('penduduk_pr', 1870), 0, ',', '.') }} <span class="text-lg font-medium text-pink-200">Jiwa</span></p>
                    </div>
                </div>

                <!-- Grafik Kependudukan -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 mt-16">
                    <!-- Usia -->
                    <div>
                        <h3 class="text-xl font-bold text-slate-800 mb-6 flex items-center gap-2">
                            <span class="w-8 h-8 rounded bg-blue-100 text-blue-600 flex items-center justify-center">📅</span>
                            Berdasarkan Usia
                        </h3>
                        <div class="bg-slate-50 rounded-2xl p-6 border border-slate-100">
                            <div class="relative h-[250px]">
                                <canvas id="ageChart"></canvas>
                            </div>
                        </div>
                    </div>
                    <!-- Pendidikan -->
                    <div>
                        <h3 class="text-xl font-bold text-slate-800 mb-6 flex items-center gap-2">
                            <span class="w-8 h-8 rounded bg-yellow-100 text-yellow-600 flex items-center justify-center">🎓</span>
                            Tingkat Pendidikan
                        </h3>
                        <div class="bg-slate-50 rounded-2xl p-6 border border-slate-100">
                            <div class="relative h-[250px]">
                                <canvas id="eduChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pekerjaan & Agama -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 mt-12">
                    <div>
                        <h3 class="text-xl font-bold text-slate-800 mb-6 flex items-center gap-2">
                            <span class="w-8 h-8 rounded bg-emerald-100 text-emerald-600 flex items-center justify-center">💼</span>
                            Mata Pencaharian
                        </h3>
                        <div class="overflow-hidden rounded-xl border border-slate-200">
                            <table class="w-full text-sm text-left">
                                <thead class="bg-slate-100 text-slate-700">
                                    <tr>
                                        <th class="py-3 px-4 font-bold">Mata Pencaharian</th>
                                        <th class="py-3 px-4 font-bold text-right">Jumlah</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-100">
                                    <tr class="bg-white"><td class="py-2 px-4 font-medium">Petani Pemilik Tanah</td><td class="py-2 px-4 text-right font-bold text-[#1e3a8a]">624</td></tr>
                                    <tr class="bg-slate-50"><td class="py-2 px-4 font-medium">Buruh Tani</td><td class="py-2 px-4 text-right font-bold text-[#1e3a8a]">1.070</td></tr>
                                    <tr class="bg-white"><td class="py-2 px-4 font-medium">Pengusaha Dagang</td><td class="py-2 px-4 text-right font-bold text-[#1e3a8a]">450</td></tr>
                                    <tr class="bg-slate-50"><td class="py-2 px-4 font-medium">Pengrajin</td><td class="py-2 px-4 text-right font-bold text-[#1e3a8a]">11</td></tr>
                                    <tr class="bg-white"><td class="py-2 px-4 font-medium">Pengusaha Angkutan</td><td class="py-2 px-4 text-right font-bold text-[#1e3a8a]">49</td></tr>
                                    <tr class="bg-slate-50"><td class="py-2 px-4 font-medium">PNS</td><td class="py-2 px-4 text-right font-bold text-[#1e3a8a]">29</td></tr>
                                    <tr class="bg-white"><td class="py-2 px-4 font-medium">TNI / POLRI</td><td class="py-2 px-4 text-right font-bold text-[#1e3a8a]">2</td></tr>
                                    <tr class="bg-slate-50"><td class="py-2 px-4 font-medium">Pensiunan PNS/TNI/POLRI</td><td class="py-2 px-4 text-right font-bold text-[#1e3a8a]">63</td></tr>
                                    <tr class="bg-white"><td class="py-2 px-4 font-medium">Peternak</td><td class="py-2 px-4 text-right font-bold text-[#1e3a8a]">28</td></tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    <div>
                        <h3 class="text-xl font-bold text-slate-800 mb-6 flex items-center gap-2">
                            <span class="w-8 h-8 rounded bg-purple-100 text-purple-600 flex items-center justify-center">🕌</span>
                            Agama
                        </h3>
                        <div class="overflow-hidden rounded-xl border border-slate-200 mb-8">
                            <table class="w-full text-sm text-left">
                                <thead class="bg-slate-100 text-slate-700">
                                    <tr>
                                        <th class="py-3 px-4 font-bold">Agama</th>
                                        <th class="py-3 px-4 font-bold text-right">Jumlah</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-100">
                                    <tr class="bg-white"><td class="py-3 px-4 font-medium">Islam</td><td class="py-3 px-4 text-right font-bold text-[#1e3a8a] text-lg">3.960</td></tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Pemerintahan -->
                        <h3 class="text-xl font-bold text-slate-800 mb-4 flex items-center gap-2">
                            <span class="w-8 h-8 rounded bg-red-100 text-red-600 flex items-center justify-center">🏛️</span>
                            Pemerintahan
                        </h3>
                        <p class="text-sm text-slate-600 mb-4 leading-relaxed">
                            Pada tahun 2022 Desa Kersagalih ada penambahan Rt di Dusun Parungjagong yang tadinya terdiri dari 5 Rt menjadi 6 Rt, dan masih terdiri dari 5 kedusunan, 5 Rw dan 20 Rt yaitu :
                        </p>
                        <div class="grid grid-cols-2 gap-3">
                            <div class="bg-slate-50 p-3 rounded-lg border border-slate-200">
                                <p class="font-bold text-slate-800 text-sm">Cilendi</p>
                                <p class="text-xs text-slate-500">3 RT / 1 RW</p>
                            </div>
                            <div class="bg-slate-50 p-3 rounded-lg border border-slate-200">
                                <p class="font-bold text-slate-800 text-sm">Bakung</p>
                                <p class="text-xs text-slate-500">3 RT / 1 RW</p>
                            </div>
                            <div class="bg-slate-50 p-3 rounded-lg border border-slate-200">
                                <p class="font-bold text-slate-800 text-sm">Parungjagong</p>
                                <p class="text-xs text-slate-500">6 RT / 1 RW</p>
                            </div>
                            <div class="bg-slate-50 p-3 rounded-lg border border-slate-200">
                                <p class="font-bold text-slate-800 text-sm">Barangbang</p>
                                <p class="text-xs text-slate-500">4 RT / 1 RW</p>
                            </div>
                            <div class="bg-slate-50 p-3 rounded-lg border border-slate-200">
                                <p class="font-bold text-slate-800 text-sm">Setiakarya</p>
                                <p class="text-xs text-slate-500">4 RT / 1 RW</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 2. Sosial & Ekonomi -->
        <section class="max-w-7xl mx-auto px-4 md:px-8 mt-12">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8" x-data="{ shown: false }" x-intersect.once="shown = true">
                <div :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'" class="bg-white p-10 rounded-3xl shadow-lg border border-slate-100 transition-all duration-700 ease-out">
                    <div class="w-16 h-16 bg-blue-100 text-blue-600 rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    </div>
                    <h3 class="text-2xl font-bold text-slate-800 mb-4">Keadaan Sosial</h3>
                    <p class="text-slate-600 leading-relaxed">
                        Kondisi sosial masyarakat Desa Kersagalih masih memegang teguh adat istiadat daerah dengan ciri-ciri budaya yang terlihat kental pada <strong>kegotong-royongan, sabanda sariksa, dan kesopanan</strong>. Kondisi sosial inilah yang selalu dijadikan dasar dalam melakukan setiap proses pembangunan yang senantiasa dijaga, dipelihara, dan dikembangkan.
                    </p>
                </div>
                <div :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'" class="bg-white p-10 rounded-3xl shadow-lg border border-slate-100 transition-all duration-700 delay-100 ease-out">
                    <div class="w-16 h-16 bg-emerald-100 text-emerald-600 rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <h3 class="text-2xl font-bold text-slate-800 mb-4">Keadaan Ekonomi</h3>
                    <p class="text-slate-600 leading-relaxed">
                        Sebagian besar penduduk Desa Kersagalih bermata pencaharian <strong>bertani dan berkebun</strong>. Pada bidang usaha mikro, masyarakat masih sangat mengandalkan pemanfaatan bantuan pinjaman permodalan dari pemerintah ataupun bantuan pinjaman dari pihak-pihak lain untuk menggerakkan perekonomian desa.
                    </p>
                </div>
            </div>
        </section>



    </div>

    <!-- Chart.js Script -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Age Chart
            const ctxAge = document.getElementById('ageChart').getContext('2d');
            new Chart(ctxAge, {
                type: 'bar',
                data: {
                    labels: ['0-4 Thn', '5-19 Thn', '20-59 Thn', '60+ Thn'],
                    datasets: [{
                        label: 'Jumlah Jiwa',
                        data: [338, 1196, 1821, 460],
                        backgroundColor: '#3b82f6',
                        borderRadius: 6
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: { legend: { display: false } },
                    scales: {
                        y: { beginAtZero: true, grid: { borderDash: [2, 4] } },
                        x: { grid: { display: false } }
                    }
                }
            });

            // Education Chart
            const ctxEdu = document.getElementById('eduChart').getContext('2d');
            new Chart(ctxEdu, {
                type: 'doughnut',
                data: {
                    labels: ['SD', 'SMP', 'SMA', 'Perguruan Tinggi'],
                    datasets: [{
                        data: [1272, 704, 567, 215],
                        backgroundColor: ['#ef4444', '#f59e0b', '#10b981', '#6366f1'],
                        borderWidth: 0,
                        hoverOffset: 10
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    cutout: '60%',
                    plugins: {
                        legend: { position: 'right', labels: { font: { family: "'Poppins', sans-serif" } } }
                    }
                }
            });
        });
    </script>
</x-layout>
