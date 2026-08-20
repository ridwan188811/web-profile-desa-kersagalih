<x-admin-layout>
    
    <div class="flex items-center gap-3 mb-8">
        <a href="{{ route('admin.posts.index') }}" class="p-2 bg-white border border-slate-200 rounded-xl hover:bg-slate-50 transition-colors text-slate-500 hover:text-[#1e3a8a]">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
        </a>
        <div>
            <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-800 tracking-tight">Edit Berita</h1>
            <p class="text-slate-500 mt-1">Lakukan perubahan pada artikel yang sudah ada.</p>
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

    <form action="{{ route('admin.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden" x-data="{ categoryMode: 'select' }">
        @csrf
        @method('PUT')
        
        <div class="p-6 sm:p-8 space-y-8">
            
            <!-- Judul -->
            <div>
                <label for="title" class="block text-sm font-bold text-slate-700 mb-2">Judul Berita <span class="text-red-500">*</span></label>
                <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}" required
                    class="block w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 focus:ring-2 focus:ring-[#1e3a8a] focus:border-[#1e3a8a] focus:bg-white transition-all text-lg font-medium" 
                    placeholder="Contoh: Penyaluran BLT Dana Desa Tahap III Berjalan Lancar">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Kategori -->
                <div>
                    <div class="flex items-center justify-between mb-2">
                        <label for="category_id" class="block text-sm font-bold text-slate-700">Kategori <span class="text-red-500">*</span></label>
                        <button type="button" @click="categoryMode = categoryMode === 'select' ? 'custom' : 'select'" class="text-xs font-bold text-[#1e3a8a] hover:text-blue-800 underline">
                            <span x-show="categoryMode === 'select'">+ Tambah Kategori Baru</span>
                            <span x-show="categoryMode === 'custom'">Kembali Pilih Kategori</span>
                        </button>
                    </div>
                    
                    <!-- Mode Select -->
                    <div x-show="categoryMode === 'select'">
                        <select name="category_id" id="category_id" :required="categoryMode === 'select'"
                            class="block w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 focus:ring-2 focus:ring-[#1e3a8a] focus:border-[#1e3a8a] focus:bg-white transition-all appearance-none">
                            <option value="">-- Pilih Kategori --</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ (old('category_id', $post->category_id) == $category->id) ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                            @if($categories->isEmpty())
                                <option value="custom" selected>Kategori belum ada (Buat Baru)</option>
                            @endif
                        </select>
                    </div>

                    <!-- Mode Custom -->
                    <div x-show="categoryMode === 'custom'" x-cloak>
                        <input type="hidden" name="category_id" value="custom" :disabled="categoryMode !== 'custom'">
                        <input type="text" name="custom_category_name" id="custom_category_name" :required="categoryMode === 'custom'" value="{{ old('custom_category_name') }}"
                            class="block w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 focus:ring-2 focus:ring-[#1e3a8a] focus:border-[#1e3a8a] focus:bg-white transition-all" 
                            placeholder="Ketik nama kategori baru (Cth: Kesehatan)">
                    </div>
                </div>

                <!-- Status Publikasi -->
                <div>
                    <label for="status" class="block text-sm font-bold text-slate-700 mb-2">Status <span class="text-red-500">*</span></label>
                    <select name="status" id="status" required
                        class="block w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 focus:ring-2 focus:ring-[#1e3a8a] focus:border-[#1e3a8a] focus:bg-white transition-all appearance-none">
                        <option value="published" {{ old('status', $post->status) == 'published' ? 'selected' : '' }}>Tampilkan Sekarang (Published)</option>
                        <option value="draft" {{ old('status', $post->status) == 'draft' ? 'selected' : '' }}>Simpan sebagai Draf (Draft)</option>
                    </select>
                </div>
            </div>

            <!-- Foto Cover -->
            <div x-data="{ imagePreview: '{{ $post->image ? asset('storage/' . $post->image) : '' }}' }">
                <label for="image" class="block text-sm font-bold text-slate-700 mb-2">Foto Utama / Sampul (Opsional)</label>
                <div class="flex items-center justify-center w-full">
                    <label for="image" class="flex flex-col items-center justify-center w-full h-64 border-2 border-slate-300 border-dashed rounded-xl cursor-pointer bg-slate-50 hover:bg-slate-100 transition-colors relative overflow-hidden">
                        
                        <!-- Placeholder -->
                        <div x-show="!imagePreview" class="flex flex-col items-center justify-center pt-5 pb-6 text-slate-500">
                            <svg class="w-10 h-10 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            <p class="mb-2 text-sm font-bold text-slate-700">Klik untuk mengganti gambar</p>
                            <p class="text-xs">PNG, JPG, JPEG (Maks. 2MB)</p>
                        </div>
                        
                        <!-- Preview Image -->
                        <img x-show="imagePreview" :src="imagePreview" class="absolute inset-0 w-full h-full object-cover">
                        
                        <!-- Overlay Saat Hover -->
                        <div x-show="imagePreview" class="absolute inset-0 bg-black/50 opacity-0 hover:opacity-100 transition-opacity flex items-center justify-center text-white font-bold">
                            Ubah Gambar
                        </div>
                        
                        <input id="image" name="image" type="file" class="hidden" accept="image/png, image/jpeg, image/jpg" 
                            @change="const reader = new FileReader(); reader.onload = (e) => { imagePreview = e.target.result; }; reader.readAsDataURL($event.target.files[0]);" />
                    </label>
                </div>
            </div>

            <!-- Trix Editor untuk Konten -->
            <div>
                <label for="content" class="block text-sm font-bold text-slate-700 mb-2">Isi Berita <span class="text-red-500">*</span></label>
                
                <!-- Load Trix CSS & JS via CDN -->
                <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
                <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
                <style>
                    trix-toolbar [data-trix-button-group="file-tools"] { display: none; }
                    trix-editor { min-height: 300px; background: #fff; border-radius: 0.75rem; border-color: #e2e8f0; }
                </style>

                <input id="content" type="hidden" name="content" value="{{ old('content', $post->content) }}">
                <trix-editor input="content" class="prose max-w-none text-slate-800"></trix-editor>
            </div>

        </div>

        <!-- Submit Area -->
        <div class="px-6 py-4 bg-slate-50 border-t border-slate-200 flex justify-end gap-3">
            <a href="{{ route('admin.posts.index') }}" class="px-6 py-3 bg-white border border-slate-300 text-slate-700 font-bold rounded-xl hover:bg-slate-100 transition-colors">Batal</a>
            <button type="submit" class="px-6 py-3 bg-[#1e3a8a] text-white font-bold rounded-xl hover:bg-blue-800 transition-colors shadow-md hover:shadow-lg">
                Perbarui Berita
            </button>
        </div>

    </form>
</x-admin-layout>
