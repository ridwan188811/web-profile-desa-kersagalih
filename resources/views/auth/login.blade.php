<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Admin - Desa Kersagalih</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Tailwind via Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js"></script>

    <style>
        body { font-family: 'Poppins', sans-serif; }
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-[#1e3a8a] text-slate-800 min-h-screen flex items-center justify-center relative overflow-hidden">
    
    <!-- Ornamen Latar Belakang -->
    <div class="absolute top-0 left-0 w-full h-full overflow-hidden pointer-events-none flex items-center justify-center">
        <!-- Lingkaran 1 -->
        <div class="absolute -top-32 -left-32 w-96 h-96 rounded-full bg-blue-700/50 mix-blend-multiply blur-3xl opacity-70"></div>
        <!-- Logo Background (Watermark) -->
        <img src="{{ asset('images/logo.png') }}" alt="Watermark" class="absolute inset-0 w-full h-full object-contain p-20 opacity-20" onerror="this.style.display='none'">
    </div>

    <!-- Kotak Login -->
    <div class="relative w-full max-w-md px-6 py-12 mx-auto z-10" x-data="{ showPassword: false }">
        <div class="bg-white rounded-[2rem] shadow-2xl p-8 sm:p-10 border border-white/20 backdrop-blur-sm relative overflow-hidden">
            
            <!-- Aksen Kuning Atas -->
            <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-yellow-300 to-yellow-500"></div>

            <!-- Logo & Header -->
            <div class="text-center mb-10 mt-2">
                <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-blue-50 mb-4 shadow-inner">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo Kab. Tasikmalaya" class="w-14 h-auto" onerror="this.src='https://upload.wikimedia.org/wikipedia/commons/e/e0/Lambang_Kabupaten_Tasikmalaya.png'">
                </div>
                <h1 class="text-2xl font-extrabold text-[#1e3a8a]">Admin Panel</h1>
                <p class="text-slate-500 text-sm mt-1">Desa Kersagalih Kab. Tasikmalaya</p>
            </div>

            <!-- Error Pesan -->
            @if ($errors->any())
                <div class="bg-red-50 text-red-600 px-4 py-3 rounded-xl text-sm mb-6 border border-red-100 flex items-start gap-3">
                    <svg class="w-5 h-5 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <div>
                        @foreach ($errors->all() as $error)
                            <p class="font-medium">{{ $error }}</p>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- Form -->
            <form action="{{ route('login') }}" method="POST" class="space-y-6">
                @csrf
                
                <!-- Input Username -->
                <div>
                    <label for="username" class="block text-sm font-bold text-slate-700 mb-2">Username</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        </div>
                        <input type="text" name="username" id="username" value="{{ old('username') }}" required autofocus
                            class="block w-full pl-11 pr-4 py-3.5 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 text-sm focus:ring-2 focus:ring-[#1e3a8a] focus:border-[#1e3a8a] focus:bg-white transition-all placeholder:text-slate-400" 
                            placeholder="Masukkan username admin">
                    </div>
                </div>

                <!-- Input Password -->
                <div>
                    <label for="password" class="block text-sm font-bold text-slate-700 mb-2">Password</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                        </div>
                        <input :type="showPassword ? 'text' : 'password'" name="password" id="password" required
                            class="block w-full pl-11 pr-12 py-3.5 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 text-sm focus:ring-2 focus:ring-[#1e3a8a] focus:border-[#1e3a8a] focus:bg-white transition-all placeholder:text-slate-400" 
                            placeholder="••••••••">
                        
                        <!-- Toggle Password -->
                        <button type="button" @click="showPassword = !showPassword" class="absolute inset-y-0 right-0 pr-4 flex items-center text-slate-400 hover:text-[#1e3a8a] transition-colors focus:outline-none">
                            <svg x-show="!showPassword" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                            <svg x-show="showPassword" x-cloak class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"></path></svg>
                        </button>
                    </div>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="w-full bg-[#1e3a8a] hover:bg-blue-800 text-white font-bold rounded-xl text-sm px-5 py-4 text-center transition-all shadow-lg hover:shadow-xl hover:-translate-y-0.5 mt-2">
                    Masuk ke Dashboard
                </button>
                
                <div class="text-center mt-6">
                    <a href="{{ route('beranda') }}" class="text-sm text-slate-500 hover:text-[#1e3a8a] font-medium transition-colors flex items-center justify-center gap-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                        Kembali ke Beranda
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
