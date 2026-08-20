<x-admin-layout>
    
    <div class="flex items-center gap-3 mb-8">
        <a href="{{ route('admin.albums.index') }}" class="p-2 bg-white border border-slate-200 rounded-xl hover:bg-slate-50 transition-colors text-slate-500 hover:text-[#1e3a8a]">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
        </a>
        <div>
            <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-800 tracking-tight">Edit Detail Album</h1>
            <p class="text-slate-500 mt-1">Perbarui informasi atau ganti sampul album ini.</p>
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

    <form action="{{ route('admin.albums.update', $album->id) }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
        @csrf
        @method('PUT')
        
        <div class="p-6 sm:p-8 flex flex-col lg:flex-row gap-8">
            
            <!-- Kolom Kiri: Cover -->
            <div class="w-full lg:w-1/3 shrink-0" x-data="{ imagePreview: '{{ $album->cover_image ? asset('storage/' . $album->cover_image) : '' }}' }">
                <label class="block text-sm font-bold text-slate-700 mb-2">Foto Cover Album (Abaikan jika tidak diubah)</label>
                <div class="p-4 border-2 border-slate-200 border-dashed rounded-2xl bg-slate-50 text-center relative hover:bg-slate-100 transition-colors cursor-pointer group">
                    <!-- Area Foto -->
                    <div class="w-full aspect-video mx-auto relative rounded-xl overflow-hidden bg-slate-200 mb-4 border border-slate-300">
                        
                        <div x-show="!imagePreview" class="absolute inset-0 flex flex-col items-center justify-center text-slate-400">
                            <svg class="w-12 h-12 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        </div>
                        
                        <img x-show="imagePreview" :src="imagePreview" class="absolute inset-0 w-full h-full object-cover">
                        
                        <div x-show="imagePreview" class="absolute inset-0 bg-black/50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                            <span class="text-white font-bold">Ganti Sampul</span>
                        </div>
                    </div>

                    <p class="text-sm font-bold text-[#1e3a8a] mb-1">Klik untuk mengubah cover</p>
                    <p class="text-xs text-slate-500">Format: JPG, PNG (Max 2MB)</p>
                    
                    <input id="cover_image" name="cover_image" type="file" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" accept="image/png, image/jpeg, image/jpg" 
                        @change="const reader = new FileReader(); reader.onload = (e) => { imagePreview = e.target.result; }; reader.readAsDataURL($event.target.files[0]);" />
                </div>
            </div>

            <!-- Kolom Kanan: Detail -->
            <div class="w-full lg:w-2/3 space-y-6">
                
                <div>
                    <label for="title" class="block text-sm font-bold text-slate-700 mb-2">Judul Album <span class="text-red-500">*</span></label>
                    <input type="text" name="title" id="title" value="{{ old('title', $album->title) }}" required
                        class="block w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 focus:ring-2 focus:ring-[#1e3a8a] transition-all font-bold text-lg">
                </div>

                <div>
                    <label for="description" class="block text-sm font-bold text-slate-700 mb-2">Deskripsi Singkat (Opsional)</label>
                    <textarea name="description" id="description" rows="4"
                        class="block w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 focus:ring-2 focus:ring-[#1e3a8a] transition-all">{{ old('description', $album->description) }}</textarea>
                </div>

                <div class="pt-2 flex items-center gap-3">
                    <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', $album->is_active) ? 'checked' : '' }} class="w-5 h-5 text-[#1e3a8a] rounded border-slate-300 focus:ring-[#1e3a8a]">
                    <label for="is_active" class="text-sm font-bold text-slate-700">Tampilkan Album Ini di Website Publik</label>
                </div>

            </div>
        </div>

        <!-- Submit Area -->
        <div class="px-6 py-4 bg-slate-50 border-t border-slate-200 flex justify-end gap-3">
            <a href="{{ route('admin.albums.index') }}" class="px-6 py-3 bg-white border border-slate-300 text-slate-700 font-bold rounded-xl hover:bg-slate-100 transition-colors">Batal</a>
            <button type="submit" class="px-6 py-3 bg-[#1e3a8a] text-white font-bold rounded-xl hover:bg-blue-800 transition-colors shadow-md hover:shadow-lg">
                Simpan Perubahan
            </button>
        </div>

    </form>
</x-admin-layout>
