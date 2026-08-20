<x-admin-layout>
    
    <div class="flex items-center gap-3 mb-8">
        <a href="{{ route('admin.personils.index') }}" class="p-2 bg-white border border-slate-200 rounded-xl hover:bg-slate-50 transition-colors text-slate-500 hover:text-[#1e3a8a]">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
        </a>
        <div>
            <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-800 tracking-tight">Edit Anggota SOTK</h1>
            <p class="text-slate-500 mt-1">Perbarui data atau pas foto aparatur/anggota lembaga.</p>
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

    <form action="{{ route('admin.personils.update', $personil->id) }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden" x-data="{ categoryMode: 'select' }">
        @csrf
        @method('PUT')
        
        <div class="p-6 sm:p-8 flex flex-col lg:flex-row gap-8">
            
            <!-- Kolom Kiri: Foto Profil -->
            <div class="w-full lg:w-1/3 shrink-0" x-data="{ imagePreview: '{{ $personil->image ? asset('storage/' . $personil->image) : '' }}' }">
                <label class="block text-sm font-bold text-slate-700 mb-2">Foto Formal (Abaikan jika tidak ingin mengubah)</label>
                <div class="p-4 border-2 border-slate-200 border-dashed rounded-2xl bg-slate-50 text-center relative hover:bg-slate-100 transition-colors cursor-pointer group">
                    <!-- Area Foto Berlatar Merah -->
                    <div class="w-48 h-64 mx-auto relative rounded-xl overflow-hidden shadow-inner bg-red-600 mb-4 border-4 border-white">
                        
                        <div x-show="!imagePreview" class="absolute inset-0 flex flex-col items-center justify-center text-white/70">
                            <svg class="w-12 h-12 mb-2 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            <span class="text-xs font-bold uppercase tracking-wider">Pas Foto 3:4</span>
                        </div>
                        
                        <img x-show="imagePreview" :src="imagePreview" class="absolute inset-0 w-full h-full object-cover">
                        
                        <!-- Overlay Edit -->
                        <div x-show="imagePreview" class="absolute inset-0 bg-black/50 flex flex-col items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                            <span class="text-white font-bold mb-1">Ganti Foto</span>
                        </div>
                    </div>

                    <p class="text-sm font-bold text-[#1e3a8a] mb-1">Klik untuk mengubah foto</p>
                    <p class="text-xs text-slate-500">Format: JPG, PNG (Max 2MB)</p>
                    
                    <input id="image" name="image" type="file" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" accept="image/png, image/jpeg, image/jpg" 
                        @change="const reader = new FileReader(); reader.onload = (e) => { imagePreview = e.target.result; }; reader.readAsDataURL($event.target.files[0]);" />
                </div>
            </div>

            <!-- Kolom Kanan: Data Identitas -->
            <div class="w-full lg:w-2/3 space-y-6">
                
                <!-- Nama -->
                <div>
                    <label for="name" class="block text-sm font-bold text-slate-700 mb-2">Nama Lengkap & Gelar <span class="text-red-500">*</span></label>
                    <input type="text" name="name" id="name" value="{{ old('name', $personil->name) }}" required
                        class="block w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 focus:ring-2 focus:ring-[#1e3a8a] focus:border-[#1e3a8a] transition-all font-bold">
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <!-- Kategori -->
                    <div>
                        <div class="flex items-center justify-between mb-2">
                            <label for="category" class="block text-sm font-bold text-slate-700">Lembaga/Kategori <span class="text-red-500">*</span></label>
                            <button type="button" @click="categoryMode = categoryMode === 'select' ? 'custom' : 'select'" class="text-xs font-bold text-[#1e3a8a] hover:underline">
                                <span x-show="categoryMode === 'select'">+ Kategori Baru</span>
                                <span x-show="categoryMode === 'custom'">Kembali</span>
                            </button>
                        </div>
                        
                        <!-- Mode Select -->
                        <div x-show="categoryMode === 'select'">
                            <select name="category" id="category_select" :required="categoryMode === 'select'"
                                class="block w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 focus:ring-2 focus:ring-[#1e3a8a] transition-all appearance-none">
                                <option value="">-- Pilih Lembaga --</option>
                                @php
                                    $defaultCategories = ['Pemerintahan', 'BPD', 'LPM', 'Posyandu', 'PKK', 'Karang Taruna'];
                                    $allCats = collect($categories)->merge($defaultCategories)->unique()->sort();
                                @endphp
                                @foreach($allCats as $cat)
                                    <option value="{{ $cat }}" {{ old('category', $personil->category) == $cat ? 'selected' : '' }}>{{ $cat }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Mode Custom -->
                        <div x-show="categoryMode === 'custom'" x-cloak>
                            <input type="text" name="category" id="category_input" :disabled="categoryMode !== 'custom'" :required="categoryMode === 'custom'" value="{{ old('category') }}"
                                class="block w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 focus:ring-2 focus:ring-[#1e3a8a] transition-all" 
                                placeholder="Ketik nama lembaga baru">
                        </div>
                    </div>

                    <!-- Jabatan -->
                    <div>
                        <label for="position" class="block text-sm font-bold text-slate-700 mb-2">Jabatan <span class="text-red-500">*</span></label>
                        <input type="text" name="position" id="position" value="{{ old('position', $personil->position) }}" required
                            class="block w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 focus:ring-2 focus:ring-[#1e3a8a] transition-all">
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <!-- Urutan -->
                    <div>
                        <label for="order" class="block text-sm font-bold text-slate-700 mb-2">Urutan Tampil <span class="text-red-500">*</span></label>
                        <input type="number" name="order" id="order" value="{{ old('order', $personil->order) }}" min="1" required
                            class="block w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 focus:ring-2 focus:ring-[#1e3a8a] transition-all">
                        <p class="text-xs text-slate-500 mt-1">Angka 1 akan tampil paling awal (kiri atas).</p>
                    </div>

                    <!-- Periode (Opsional) -->
                    <div>
                        <label for="period" class="block text-sm font-bold text-slate-700 mb-2">Periode Jabatan (Opsional)</label>
                        <input type="text" name="period" id="period" value="{{ old('period', $personil->period) }}"
                            class="block w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 focus:ring-2 focus:ring-[#1e3a8a] transition-all">
                    </div>
                </div>

                <!-- Status Aktif -->
                <div class="pt-4 flex items-center gap-3">
                    <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', $personil->is_active) ? 'checked' : '' }} class="w-5 h-5 text-[#1e3a8a] rounded border-slate-300 focus:ring-[#1e3a8a]">
                    <label for="is_active" class="text-sm font-bold text-slate-700">Tampilkan Profil Ini di Website Publik</label>
                </div>

            </div>
        </div>

        <!-- Submit Area -->
        <div class="px-6 py-4 bg-slate-50 border-t border-slate-200 flex justify-end gap-3">
            <a href="{{ route('admin.personils.index') }}" class="px-6 py-3 bg-white border border-slate-300 text-slate-700 font-bold rounded-xl hover:bg-slate-100 transition-colors">Batal</a>
            <button type="submit" class="px-6 py-3 bg-[#1e3a8a] text-white font-bold rounded-xl hover:bg-blue-800 transition-colors shadow-md hover:shadow-lg">
                Perbarui Anggota
            </button>
        </div>

    </form>
</x-admin-layout>
