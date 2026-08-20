<x-layout>
    <!-- Hero Section -->
    <section class="relative pt-32 pb-20 lg:pt-48 lg:pb-32 overflow-hidden bg-[#1e3a8a]">
        <div class="absolute inset-0">
            <!-- Background pattern/image -->
            <img src="https://images.unsplash.com/photo-1506744626753-1fa44df31c7f?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80" alt="Pemandangan" class="w-full h-full object-cover opacity-20 mix-blend-luminosity">
            <div class="absolute inset-0 bg-gradient-to-t from-[#0f1f4d] to-transparent"></div>
        </div>
        <div class="relative max-w-7xl mx-auto px-4 md:px-8 text-center" x-data="{ shown: false }" x-intersect.once="shown = true">
            <span :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'" class="transition-all duration-1000 ease-out text-yellow-300 font-bold tracking-widest uppercase text-sm mb-4 block">
                Dokumentasi & Album
            </span>
            <h1 :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'" class="transition-all duration-1000 delay-100 ease-out text-4xl md:text-5xl lg:text-6xl font-extrabold text-white mb-6 drop-shadow-lg">
                Galeri Desa
            </h1>
            <p :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'" class="transition-all duration-1000 delay-200 ease-out text-lg md:text-xl text-blue-100 max-w-2xl mx-auto mb-8 font-light">
                Kumpulan momen, kegiatan, dan keindahan alam yang terekam di Desa Kersagalih.
            </p>
        </div>
    </section>

    <!-- Galeri Content -->
    <div class="bg-slate-50 relative pb-24">
        <div class="max-w-7xl mx-auto px-4 md:px-8 relative z-10 -mt-10">
            
            @if($albums->isEmpty())
                <div class="text-center py-20 bg-white rounded-3xl shadow-sm border border-slate-100">
                    <div class="w-20 h-20 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-4 text-slate-400">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    </div>
                    <h3 class="text-2xl font-bold text-slate-800 mb-2">Belum Ada Album</h3>
                    <p class="text-slate-500">Galeri foto sedang dalam tahap pembaruan.</p>
                </div>
            @else
                <div class="space-y-20">
                    @foreach($albums as $album)
                        @if($album->photos->isNotEmpty())
                            <div x-data="{ shown: false }" x-intersect.once="shown = true">
                                <!-- Judul Album -->
                                <div :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-5'" class="transition-all duration-700 ease-out flex items-center justify-between mb-8 border-b-2 border-slate-200 pb-4">
                                    <div>
                                        <h2 class="text-2xl md:text-3xl font-extrabold text-[#1e3a8a]">{{ $album->title }}</h2>
                                        @if($album->description)
                                            <p class="text-slate-500 mt-1">{{ $album->description }}</p>
                                        @endif
                                    </div>
                                    <span class="bg-blue-50 text-[#1e3a8a] px-3 py-1 rounded-full text-sm font-bold">{{ $album->photos->count() }} Foto</span>
                                </div>

                                <!-- Grid Foto -->
                                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-6">
                                    @foreach($album->photos as $index => $photo)
                                        <div :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'" class="group cursor-pointer relative rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 bg-white" style="transition-delay: {{ $index * 50 }}ms;" @click="$dispatch('open-lightbox', { image: '{{ asset('storage/' . $photo->image_path) }}', title: '{{ addslashes($photo->title ?? $album->title) }}', description: '{{ addslashes($photo->description ?? '') }}' })">
                                            
                                            <div class="w-full pt-[100%] relative bg-slate-100 overflow-hidden">
                                                <img src="{{ asset('storage/' . $photo->image_path) }}" alt="{{ $photo->title }}" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                                            </div>
                                            
                                            <!-- Overlay Caption -->
                                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-4">
                                                <h4 class="text-white font-bold text-sm line-clamp-1">{{ $photo->title ?? 'Foto' }}</h4>
                                                @if($photo->description)
                                                    <p class="text-white/80 text-xs line-clamp-2 mt-1">{{ $photo->description }}</p>
                                                @endif
                                            </div>

                                            <!-- View Icon -->
                                            <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none">
                                                <div class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center text-white border border-white/40 shadow-lg">
                                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"></path></svg>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            @endif

        </div>
    </div>

    <!-- Lightbox Modal -->
    <div x-data="{ 
            open: false, 
            imageSrc: '', 
            imageTitle: '', 
            imageDesc: '' 
         }" 
         @open-lightbox.window="
            open = true; 
            imageSrc = $event.detail.image; 
            imageTitle = $event.detail.title;
            imageDesc = $event.detail.description;
         "
         x-show="open" x-cloak
         class="fixed inset-0 z-[110] flex items-center justify-center bg-black/95 p-4 md:p-8 backdrop-blur-md"
         x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
        
        <!-- Close Button -->
        <button @click="open = false" class="absolute top-6 right-6 text-white/50 hover:text-white bg-white/10 hover:bg-white/20 rounded-full p-3 transition-colors z-[120]">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
        </button>

        <!-- Container -->
        <div @click.away="open = false" class="relative max-w-5xl w-full flex flex-col items-center">
            
            <!-- Image Frame -->
            <div class="relative w-full rounded-2xl overflow-hidden shadow-2xl bg-black border border-white/10 max-h-[75vh] flex items-center justify-center">
                <img :src="imageSrc" :alt="imageTitle" class="max-w-full max-h-[75vh] object-contain">
            </div>
            
            <!-- Caption -->
            <div class="mt-6 text-center text-white w-full max-w-2xl px-4">
                <h3 class="text-xl md:text-2xl font-bold mb-2" x-text="imageTitle"></h3>
                <p class="text-white/70 text-sm" x-text="imageDesc" x-show="imageDesc"></p>
            </div>
        </div>
    </div>
</x-layout>
