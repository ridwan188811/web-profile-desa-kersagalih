<x-admin-layout>
    
    <div class="flex items-center gap-3 mb-8">
        <div class="p-3 bg-[#1e3a8a] text-white rounded-xl shadow-md">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
        </div>
        <div>
            <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-800 tracking-tight">Pengaturan Profil Desa</h1>
            <p class="text-slate-500 mt-1">Sesuaikan narasi sejarah, luas wilayah, dan statistik kependudukan.</p>
        </div>
    </div>

    @if (session('success'))
        <div class="bg-emerald-50 text-emerald-600 px-4 py-3 rounded-xl text-sm mb-6 border border-emerald-100 font-bold flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
            {{ session('success') }}
        </div>
    @endif

    <div x-data="{ tab: 'sejarah' }" class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden flex flex-col md:flex-row min-h-[600px]">
        
        <!-- Sidebar Tabs -->
        <div class="w-full md:w-64 bg-slate-50 border-b md:border-b-0 md:border-r border-slate-200 shrink-0">
            <nav class="flex md:flex-col p-4 gap-2 overflow-x-auto">
                <button @click="tab = 'sejarah'" :class="tab === 'sejarah' ? 'bg-white text-[#1e3a8a] shadow-sm border-slate-200 font-bold' : 'text-slate-600 hover:bg-slate-100 border-transparent font-medium'" class="flex items-center gap-3 px-4 py-3 rounded-xl border text-left transition-all whitespace-nowrap">
                    <span class="text-xl">📜</span> Sejarah
                </button>
                <button @click="tab = 'wilayah'" :class="tab === 'wilayah' ? 'bg-white text-[#1e3a8a] shadow-sm border-slate-200 font-bold' : 'text-slate-600 hover:bg-slate-100 border-transparent font-medium'" class="flex items-center gap-3 px-4 py-3 rounded-xl border text-left transition-all whitespace-nowrap">
                    <span class="text-xl">🗺️</span> Wilayah
                </button>
                <button @click="tab = 'demografi'" :class="tab === 'demografi' ? 'bg-white text-[#1e3a8a] shadow-sm border-slate-200 font-bold' : 'text-slate-600 hover:bg-slate-100 border-transparent font-medium'" class="flex items-center gap-3 px-4 py-3 rounded-xl border text-left transition-all whitespace-nowrap">
                    <span class="text-xl">👥</span> Demografi
                </button>
            </nav>
        </div>

        <!-- Form Area -->
        <div class="flex-1 p-6 md:p-8">
            <form action="{{ route('admin.settings.update') }}" method="POST">
                @csrf
                
                <!-- Tab: Sejarah -->
                <div x-show="tab === 'sejarah'" x-cloak class="space-y-6">
                    <div class="mb-6">
                        <h2 class="text-xl font-bold text-slate-800 mb-1">Sejarah Desa</h2>
                        <p class="text-sm text-slate-500">Tuliskan sejarah desa. Anda bisa menebalkan teks atau membuat list (poin).</p>
                    </div>

                    <!-- Trix Editor untuk Sejarah -->
                    <div>
                        <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
                        <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
                        <style>
                            trix-toolbar [data-trix-button-group="file-tools"] { display: none; }
                            trix-editor { min-height: 200px; background: #fff; border-radius: 0.75rem; border-color: #e2e8f0; }
                        </style>

                        <input id="sejarah_narasi" type="hidden" name="sejarah_narasi" value="{{ $settings['sejarah_narasi'] ?? 'Dahulu Desa Kersagalih bernama Desa Campaka. Desa Campaka berdiri kurang lebih pada abad ke-19 yaitu sekitar tahun 1923, dengan Kepala Desa yang pertama yaitu Bapak Jayadisastra (Alm).' }}">
                        <trix-editor input="sejarah_narasi" class="prose max-w-none text-slate-800"></trix-editor>
                    </div>
                </div>

                <!-- Tab: Wilayah -->
                <div x-show="tab === 'wilayah'" x-cloak class="space-y-8">
                    <div class="mb-6">
                        <h2 class="text-xl font-bold text-slate-800 mb-1">Data Wilayah & Geografis</h2>
                        <p class="text-sm text-slate-500">Angka yang Anda ubah di sini akan langsung memperbarui grafik di website.</p>
                    </div>

                    <!-- Batas Desa -->
                    <div>
                        <h3 class="font-bold text-[#1e3a8a] mb-4 border-b pb-2">Batas-Batas Desa</h3>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-1">Sebelah Utara</label>
                                <input type="text" name="batas_utara" value="{{ $settings['batas_utara'] ?? 'Desa Ciwarak' }}" class="block w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-xl">
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-1">Sebelah Selatan</label>
                                <input type="text" name="batas_selatan" value="{{ $settings['batas_selatan'] ?? 'Desa Mandalamekar' }}" class="block w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-xl">
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-1">Sebelah Timur</label>
                                <input type="text" name="batas_timur" value="{{ $settings['batas_timur'] ?? 'Desa Kertarahayu' }}" class="block w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-xl">
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-1">Sebelah Barat</label>
                                <input type="text" name="batas_barat" value="{{ $settings['batas_barat'] ?? 'Desa Cibalong' }}" class="block w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-xl">
                            </div>
                        </div>
                    </div>

                    <!-- Jarak Administratif -->
                    <div>
                        <h3 class="font-bold text-[#1e3a8a] mb-4 border-b pb-2">Jarak Administratif</h3>
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-1">Ke Kecamatan (Km)</label>
                                <input type="number" step="0.1" name="jarak_kecamatan" value="{{ $settings['jarak_kecamatan'] ?? '17' }}" class="block w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-xl">
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-1">Ke Kabupaten (Km)</label>
                                <input type="number" step="0.1" name="jarak_kabupaten" value="{{ $settings['jarak_kabupaten'] ?? '35' }}" class="block w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-xl">
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-1">Ke Provinsi (Km)</label>
                                <input type="number" step="0.1" name="jarak_provinsi" value="{{ $settings['jarak_provinsi'] ?? '160' }}" class="block w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-xl">
                            </div>
                        </div>
                    </div>

                    <!-- Luas Lahan -->
                    <div>
                        <h3 class="font-bold text-[#1e3a8a] mb-4 border-b pb-2">Luas Lahan (Hektar) - Mempengaruhi Diagram Pie</h3>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-1">Total Luas Keseluruhan (Ha)</label>
                                <input type="number" step="0.01" name="luas_total" value="{{ $settings['luas_total'] ?? '980' }}" class="block w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-xl">
                            </div>
                            <div class="sm:col-span-2 grid grid-cols-2 md:grid-cols-4 gap-4 mt-2">
                                <div>
                                    <label class="block text-xs font-bold text-slate-500 mb-1">Pertanian Basah</label>
                                    <input type="number" step="0.01" name="lahan_basah" value="{{ $settings['lahan_basah'] ?? '85.97' }}" class="block w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm">
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-slate-500 mb-1">Pertanian Kering</label>
                                    <input type="number" step="0.01" name="lahan_kering" value="{{ $settings['lahan_kering'] ?? '362.02' }}" class="block w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm">
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-slate-500 mb-1">Pemukiman</label>
                                    <input type="number" step="0.01" name="lahan_pemukiman" value="{{ $settings['lahan_pemukiman'] ?? '109.77' }}" class="block w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm">
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-slate-500 mb-1">Hutan</label>
                                    <input type="number" step="0.01" name="lahan_hutan" value="{{ $settings['lahan_hutan'] ?? '24.56' }}" class="block w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tab: Demografi -->
                <div x-show="tab === 'demografi'" x-cloak class="space-y-6">
                    <div class="mb-6">
                        <h2 class="text-xl font-bold text-slate-800 mb-1">Demografi Penduduk</h2>
                        <p class="text-sm text-slate-500">Sesuaikan jumlah penduduk agar diagram pada frontend selalu akurat.</p>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div class="bg-blue-50 p-6 rounded-2xl border border-blue-100">
                            <label class="block text-sm font-bold text-[#1e3a8a] mb-2">Total Penduduk (Jiwa)</label>
                            <input type="number" name="penduduk_total" value="{{ $settings['penduduk_total'] ?? '5218' }}" class="block w-full px-4 py-3 bg-white border border-slate-200 rounded-xl font-extrabold text-2xl text-center">
                        </div>
                        <div class="bg-blue-50 p-6 rounded-2xl border border-blue-100">
                            <label class="block text-sm font-bold text-[#1e3a8a] mb-2">Jumlah Kepala Keluarga (KK)</label>
                            <input type="number" name="penduduk_kk" value="{{ $settings['penduduk_kk'] ?? '1788' }}" class="block w-full px-4 py-3 bg-white border border-slate-200 rounded-xl font-extrabold text-2xl text-center">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">Penduduk Laki-laki</label>
                            <input type="number" name="penduduk_lk" value="{{ $settings['penduduk_lk'] ?? '2717' }}" class="block w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-xl">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">Penduduk Perempuan</label>
                            <input type="number" name="penduduk_pr" value="{{ $settings['penduduk_pr'] ?? '2501' }}" class="block w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-xl">
                        </div>
                    </div>
                </div>

                <!-- Footer / Submit Button -->
                <div class="mt-8 pt-6 border-t border-slate-200 flex justify-end">
                    <button type="submit" class="px-8 py-3 bg-[#1e3a8a] text-white font-bold rounded-xl hover:bg-blue-800 transition-colors shadow-md hover:shadow-lg">
                        Simpan Semua Pengaturan
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
