<x-admin-layout>
    
    <div class="flex items-center gap-3 mb-8">
        <a href="{{ route('admin.wisata.index') }}" class="p-2 bg-white border border-slate-200 rounded-xl hover:bg-slate-50 transition-colors text-slate-500 hover:text-[#1e3a8a]">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
        </a>
        <div>
            <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-800 tracking-tight">Edit wisata Desa</h1>
            <p class="text-slate-500 mt-1">Perbarui informasi tentang produk atau keunggulan desa Anda.</p>
        </div>
    </div>

    @if ($errors->any())
        <div class="bg-red-50 text-red-600 px-4 py-3 rounded-xl text-sm mb-6 border border-red-100">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.wisata.update', $wisata->id) }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden" x-data="{ locationMode: 'select' }">
        @csrf
        @method('PUT')
        
        <div class="p-6 sm:p-8 space-y-8">
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Kolom Kiri: Input Dasar -->
                <div class="space-y-6">
                    <!-- Judul -->
                    <div>
                        <label for="title" class="block text-sm font-bold text-slate-700 mb-2">Nama Produk / wisata <span class="text-red-500">*</span></label>
                        <input type="text" name="title" id="title" value="{{ old('title', $wisata->title) }}" required
                            class="block w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 focus:ring-2 focus:ring-[#1e3a8a] transition-all font-bold text-lg">
                    </div>

                    <!-- Lokasi -->
                    <div>
                        <div class="flex items-center justify-between mb-2">
                            <label for="location" class="block text-sm font-bold text-slate-700">Lokasi <span class="text-red-500">*</span></label>
                            <button type="button" @click="locationMode = locationMode === 'select' ? 'custom' : 'select'" class="text-xs font-bold text-[#1e3a8a] hover:underline">
                                <span x-show="locationMode === 'select'">+ Lokasi Baru</span>
                                <span x-show="locationMode === 'custom'">Kembali</span>
                            </button>
                        </div>
                        
                        <!-- Mode Select -->
                        <div x-show="locationMode === 'select'">
                            <select name="location" id="location_select" :required="locationMode === 'select'"
                                class="block w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 focus:ring-2 focus:ring-[#1e3a8a] transition-all appearance-none">
                                <option value="">-- Pilih Lokasi --</option>
                                @php
                                    $defaultCategories = ['Pertanian', 'Peternakan', 'Pariwisata', 'UMKM', 'Kerajinan', 'Kesenian'];
                                    $allCats = collect($defaultCategories)->push($wisata->location)->unique()->sort();
                                @endphp
                                @foreach($allCats as $cat)
                                    <option value="{{ $cat }}" {{ old('location', $wisata->location) == $cat ? 'selected' : '' }}>{{ $cat }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Mode Custom -->
                        <div x-show="locationMode === 'custom'" x-cloak>
                            <input type="text" name="location" id="location_input" :disabled="locationMode !== 'custom'" :required="locationMode === 'custom'" value="{{ old('location') }}"
                                class="block w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 focus:ring-2 focus:ring-[#1e3a8a] transition-all" 
                                placeholder="Ketik Lokasi baru (Cth: Perkebunan)">
                        </div>
                    </div>

                    <!-- Status Tampil -->
                    <div class="pt-2 flex items-center gap-3">
                        <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', $wisata->is_active) ? 'checked' : '' }} class="w-5 h-5 text-[#1e3a8a] rounded border-slate-300 focus:ring-[#1e3a8a]">
                        <label for="is_active" class="text-sm font-bold text-slate-700">Tampilkan di Website Publik</label>
                    </div>
                </div>

                <!-- Kolom Kanan: Gambar -->
                <div x-data="{ imagePreview: '{{ $wisata->image ? asset('storage/' . $wisata->image) : '' }}' }">
                    <label class="block text-sm font-bold text-slate-700 mb-2">Foto Utama wisata (Abaikan jika tidak diubah)</label>
                    <div class="p-4 border-2 border-slate-200 border-dashed rounded-2xl bg-slate-50 text-center relative hover:bg-slate-100 transition-colors cursor-pointer w-full h-48 md:h-full flex flex-col items-center justify-center group">
                        
                        <div x-show="!imagePreview" class="flex flex-col items-center justify-center text-slate-400 absolute inset-0">
                            <svg class="w-12 h-12 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        </div>
                        
                        <img x-show="imagePreview" :src="imagePreview" class="absolute inset-0 w-full h-full object-cover rounded-xl">
                        
                        <div x-show="imagePreview" class="absolute inset-0 bg-black/50 flex flex-col items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity rounded-xl">
                            <span class="text-white font-bold mb-1">Ganti Foto</span>
                            <span class="text-xs text-slate-300">Format: JPG, PNG (Max 2MB)</span>
                        </div>
                        
                        <input id="image" name="image" type="file" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10" accept="image/png, image/jpeg, image/jpg" 
                            @change="const reader = new FileReader(); reader.onload = (e) => { imagePreview = e.target.result; }; reader.readAsDataURL($event.target.files[0]);" />
                    </div>
                </div>
            </div>

            <hr class="border-slate-100">

            <!-- Trix Editor untuk Deskripsi -->
            <div>
                <label for="description" class="block text-sm font-bold text-slate-700 mb-2">Penjelasan / Deskripsi Lengkap <span class="text-red-500">*</span></label>
                
                <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
                <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
                <style>
                    trix-toolbar [data-trix-button-group="file-tools"] { display: none; }
                    trix-editor { min-height: 250px; background: #fff; border-radius: 0.75rem; border-color: #e2e8f0; }
                </style>

                <input id="description" type="hidden" name="description" value="{{ old('description', $wisata->description) }}">
                <trix-editor input="description" class="prose max-w-none text-slate-800"></trix-editor>
            </div>

        </div>

        <!-- Submit Area -->
        <div class="px-6 py-4 bg-slate-50 border-t border-slate-200 flex justify-end gap-3">
            <a href="{{ route('admin.wisata.index') }}" class="px-6 py-3 bg-white border border-slate-300 text-slate-700 font-bold rounded-xl hover:bg-slate-100 transition-colors">Batal</a>
            <button type="submit" class="px-6 py-3 bg-[#1e3a8a] text-white font-bold rounded-xl hover:bg-blue-800 transition-colors shadow-md hover:shadow-lg">
                Simpan Perubahan
            </button>
        </div>

    </form>
</x-admin-layout>
