<x-admin-layout>
    
    <div class="flex flex-col sm:flex-row sm:items-center justify-between mb-8 gap-4">
        <div>
            <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-800 tracking-tight">SOTK & Lembaga</h1>
            <p class="text-slate-500 mt-1">Kelola data aparatur pemerintah desa dan kelembagaan lainnya.</p>
        </div>
        <a href="{{ route('admin.personils.create') }}" class="inline-flex items-center justify-center gap-2 bg-[#1e3a8a] hover:bg-blue-800 text-white font-bold px-6 py-3 rounded-xl transition-all shadow-md hover:shadow-lg hover:-translate-y-0.5">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            Tambah Anggota
        </a>
    </div>

    <!-- Bagian 1: Upload Bagan Struktur -->
    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden mb-8" x-data="{ showBaganForm: false }">
        <div class="p-6 border-b border-slate-100 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                </div>
                <div>
                    <h2 class="text-lg font-bold text-slate-800">Unggah Gambar Bagan Struktur</h2>
                    <p class="text-sm text-slate-500">Bagan akan tampil di bagian atas halaman publik.</p>
                </div>
            </div>
            <button @click="showBaganForm = !showBaganForm" class="text-sm font-bold text-[#1e3a8a] hover:text-blue-800 bg-blue-50 px-4 py-2 rounded-lg">
                <span x-show="!showBaganForm">Buka Form</span>
                <span x-show="showBaganForm" x-cloak>Tutup Form</span>
            </button>
        </div>
        
        <div x-show="showBaganForm" x-collapse x-cloak>
            <form action="{{ route('admin.personils.upload_bagan') }}" method="POST" enctype="multipart/form-data" class="p-6 bg-slate-50 flex flex-col md:flex-row gap-6 items-end border-b border-slate-200">
                @csrf
                <div class="w-full md:w-1/3">
                    <label for="bagan_category" class="block text-sm font-bold text-slate-700 mb-2">Pilih Kategori Lembaga</label>
                    <select name="bagan_category" id="bagan_category" required class="block w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 focus:ring-2 focus:ring-[#1e3a8a] focus:border-[#1e3a8a] transition-all appearance-none">
                        <option value="">-- Pilih Kategori --</option>
                        @php
                            $defaultCategories = ['Pemerintahan', 'BPD', 'LPM', 'Posyandu', 'PKK', 'Karang Taruna'];
                            $allCats = $categories->merge($defaultCategories)->unique()->sort();
                        @endphp
                        @foreach($allCats as $cat)
                            <option value="{{ $cat }}">{{ $cat }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="w-full md:w-1/3">
                    <label for="bagan_image" class="block text-sm font-bold text-slate-700 mb-2">Gambar Bagan (Max 5MB)</label>
                    <input type="file" name="bagan_image" id="bagan_image" required accept="image/jpeg,image/png,image/jpg" class="block w-full text-sm text-slate-500 file:mr-4 file:py-3 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-[#1e3a8a] hover:file:bg-blue-100 transition-all border border-slate-200 rounded-xl bg-white">
                </div>
                <div class="w-full md:w-1/3">
                    <button type="submit" class="w-full px-6 py-3 bg-[#1e3a8a] text-white font-bold rounded-xl hover:bg-blue-800 transition-colors shadow-md">
                        Unggah Bagan
                    </button>
                </div>
            </form>

            @if(count($bagans ?? []) > 0)
                <div class="p-6 bg-white">
                    <h3 class="font-bold text-slate-700 mb-4">Bagan yang Telah Diunggah:</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                        @foreach($bagans as $key => $path)
                            @php
                                $catSlug = str_replace('bagan_', '', $key);
                            @endphp
                            <div class="border border-slate-200 rounded-xl p-3 flex items-center justify-between gap-4">
                                <div class="flex items-center gap-3 overflow-hidden">
                                    <div class="w-12 h-12 bg-slate-100 rounded-lg overflow-hidden shrink-0 border border-slate-200">
                                        <img src="{{ asset('storage/' . $path) }}" class="w-full h-full object-cover" alt="Bagan">
                                    </div>
                                    <span class="font-bold text-sm text-slate-700 capitalize truncate">{{ str_replace('-', ' ', $catSlug) }}</span>
                                </div>
                                <form action="{{ route('admin.personils.delete_bagan', $catSlug) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus bagan ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2 text-red-600 bg-red-50 hover:bg-red-100 rounded-lg transition-colors shrink-0" title="Hapus Bagan">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                    </button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>

    <!-- Bagian 2: Tabel Anggota -->
    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
        <!-- Filter Bar -->
        <div class="p-4 border-b border-slate-200 bg-slate-50 flex flex-wrap items-center justify-between gap-4">
            <h3 class="font-bold text-slate-700">Daftar Anggota / Aparatur</h3>
            <form method="GET" action="{{ route('admin.personils.index') }}" class="flex items-center gap-2">
                <select name="category" onchange="this.form.submit()" class="px-4 py-2 bg-white border border-slate-200 rounded-lg text-sm font-medium focus:ring-2 focus:ring-[#1e3a8a]">
                    <option value="">Semua Kategori</option>
                    @foreach($allCats as $cat)
                        <option value="{{ $cat }}" {{ request('category') === $cat ? 'selected' : '' }}>{{ $cat }}</option>
                    @endforeach
                </select>
            </form>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-white border-b border-slate-200 text-slate-500 text-xs uppercase tracking-wider">
                        <th class="p-4 font-bold w-16 text-center">Urutan</th>
                        <th class="p-4 font-bold">Profil Aparatur</th>
                        <th class="p-4 font-bold hidden sm:table-cell">Jabatan</th>
                        <th class="p-4 font-bold hidden md:table-cell">Lembaga</th>
                        <th class="p-4 font-bold text-center w-32">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($personils as $personil)
                        <tr class="hover:bg-slate-50 transition-colors">
                            <td class="p-4 text-center">
                                <span class="w-8 h-8 rounded-full bg-slate-100 border border-slate-200 text-slate-600 font-bold flex items-center justify-center mx-auto text-sm">
                                    {{ $personil->order }}
                                </span>
                            </td>
                            <td class="p-4">
                                <div class="flex items-center gap-4">
                                    @if($personil->image)
                                        <div class="w-14 h-14 shrink-0 rounded-xl overflow-hidden bg-red-600 border border-slate-200">
                                            <img src="{{ asset('storage/' . $personil->image) }}" class="w-full h-full object-cover" alt="{{ $personil->name }}">
                                        </div>
                                    @else
                                        <div class="w-14 h-14 shrink-0 rounded-xl overflow-hidden bg-red-600 border border-slate-200 flex items-center justify-center text-white text-xl font-bold">
                                            {{ substr($personil->name, 0, 1) }}
                                        </div>
                                    @endif
                                    <div>
                                        <p class="font-extrabold text-slate-800 text-base uppercase tracking-wide">{{ $personil->name }}</p>
                                        <p class="text-xs text-slate-500 font-medium sm:hidden">{{ $personil->position }} ({{ $personil->category }})</p>
                                    </div>
                                </div>
                            </td>
                            <td class="p-4 hidden sm:table-cell font-semibold text-slate-700">
                                {{ $personil->position }}
                            </td>
                            <td class="p-4 hidden md:table-cell">
                                <span class="bg-blue-50 text-[#1e3a8a] px-3 py-1 rounded-full text-xs font-bold whitespace-nowrap">
                                    {{ $personil->category }}
                                </span>
                            </td>
                            <td class="p-4">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="{{ route('admin.personils.edit', $personil->id) }}" class="p-2 text-blue-600 bg-blue-50 hover:bg-blue-100 rounded-lg transition-colors" title="Edit">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                                    </a>
                                    
                                    <form action="{{ route('admin.personils.destroy', $personil->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus anggota ini secara permanen?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 text-red-600 bg-red-50 hover:bg-red-100 rounded-lg transition-colors" title="Hapus">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="p-12 text-center text-slate-500">
                                <div class="w-16 h-16 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <svg class="w-8 h-8 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                                </div>
                                <h3 class="text-lg font-bold text-slate-700 mb-1">Belum Ada Data Personil</h3>
                                <p>Klik "Tambah Anggota" di atas untuk memasukkan data aparatur pertama.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-admin-layout>
