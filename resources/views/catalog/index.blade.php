<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Jelly - Paket Usaha & Bahan Baku</title>
    <meta name="description" content="Katalog produk terbaik kami dengan akses pembelian mudah via Shopee dan TikTok Shop.">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f8fafc;
        }
        .shopee-btn {
            background-color: #ee4d2d;
            transition: all 0.2s ease-in-out;
        }
        .shopee-btn:hover {
            background-color: #d73a1e;
            transform: translateY(-2px);
        }
        .tiktok-btn {
            background-color: #010101;
            transition: all 0.2s ease-in-out;
        }
        .tiktok-btn:hover {
            background-color: #25f4ee;
            color: #010101;
            transform: translateY(-2px);
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.4);
        }
        .tab-transition {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        @keyframes float-bubble-1 {
            0% { transform: translateY(0px) scale(1); }
            50% { transform: translateY(-15px) scale(1.05); }
            100% { transform: translateY(0px) scale(1); }
        }
        @keyframes float-bubble-2 {
            0% { transform: translateY(0px) scale(1); }
            50% { transform: translateY(15px) scale(0.95); }
            100% { transform: translateY(0px) scale(1); }
        }
        .jelly-bubble-1 {
            animation: float-bubble-1 6s ease-in-out infinite;
        }
        .jelly-bubble-2 {
            animation: float-bubble-2 8s ease-in-out infinite;
        }
    </style>
</head>
<body class="text-slate-800 antialiased min-h-screen flex flex-col relative">

    <!-- Jelly Decorative Blobs -->
    <div class="fixed inset-0 -z-10 overflow-hidden pointer-events-none">
        <div class="absolute -top-40 -right-40 w-96 h-96 rounded-full bg-sky-200 blur-3xl opacity-30 animate-pulse" style="animation-duration: 8s;"></div>
        <div class="absolute top-1/2 -left-40 w-80 h-80 rounded-full bg-blue-200 blur-3xl opacity-25 animate-pulse" style="animation-duration: 12s;"></div>
        <div class="absolute -bottom-20 right-1/4 w-72 h-72 rounded-full bg-indigo-200 blur-3xl opacity-20 animate-pulse" style="animation-duration: 10s;"></div>
    </div>

    <!-- Header Section -->
    <header class="sticky top-0 z-50 glass-card shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <div class="flex items-center gap-3">
                    <img src="{{ asset('images/logo.jpg') }}" alt="Katalog Jelly" class="w-12 h-12 rounded-xl object-cover shadow-sm border border-slate-100">
                    <div>
                        <h1 class="text-xl font-bold tracking-tight text-slate-900">Katalog Jelly</h1>
                        <p class="text-xs text-slate-500 font-medium">Paket Usaha & Bahan Baku</p>
                    </div>
                </div>

                <!-- Admin Link -->
                <div>
                    <a href="{{ url('/admin') }}" class="text-xs font-semibold text-sky-600 hover:text-sky-800 bg-sky-50 hover:bg-sky-100 px-4 py-2 rounded-lg transition">
                        Admin Panel &rarr;
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow max-w-7xl w-full mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12">
        <!-- Hero Section -->
        <div class="relative mb-12 rounded-3xl overflow-hidden shadow-lg bg-slate-900 text-white py-16 px-6 sm:px-12 text-center">
            <!-- Background Image with Overlay -->
            <div class="absolute inset-0 bg-cover bg-center opacity-45 mix-blend-overlay" style="background-image: url('{{ asset('images/hero-banner.jpg') }}');"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-slate-900/50 to-transparent"></div>
            
            <!-- Floating Fruits & Jelly Bubbles -->
            <div class="absolute top-4 left-6 text-3xl select-none jelly-bubble-1 opacity-70 hidden sm:block">🍓</div>
            <div class="absolute bottom-4 right-8 text-4xl select-none jelly-bubble-2 opacity-60 hidden sm:block">🍊</div>
            <div class="absolute top-1/2 right-6 text-3xl select-none jelly-bubble-1 opacity-50 hidden sm:block">🍇</div>
            <div class="absolute bottom-1/3 left-8 text-3xl select-none jelly-bubble-2 opacity-60 hidden sm:block">🫧</div>
            <div class="absolute top-8 right-1/3 text-2xl select-none jelly-bubble-1 opacity-40 hidden sm:block">🍋</div>
            
            <!-- Hero Content -->
            <div class="relative z-10 max-w-3xl mx-auto">
                <span class="inline-block px-3 py-1 text-xs font-semibold text-sky-300 bg-sky-950/50 border border-sky-800/30 rounded-full">Koleksi Terkini & Original</span>
                <h2 class="text-3xl sm:text-5xl font-extrabold mt-4 tracking-tight leading-tight drop-shadow-sm">Katalog Paket Usaha & Bahan Jelly</h2>
                <p class="text-slate-200 mt-4 text-base sm:text-lg leading-relaxed max-w-2xl mx-auto drop-shadow-sm">
                    Temukan produk terbaik untuk mulai bisnismu sekarang! Cek daftar harganya di bawah ini dan jangan sampai kehabisan stok. Buruan belanja produk pilihanmu di toko online Shopee dan TikTok kami!
                </p>
            </div>
        </div>

        <!-- Search & Filter Controls -->
        <div class="mb-10 space-y-6">
            <!-- Search Bar -->
            <form action="{{ route('catalog.index') }}" method="GET" class="max-w-2xl mx-auto relative">
                @if($currentCategory)
                    <input type="hidden" name="category" value="{{ $currentCategory }}">
                @endif
                <div class="relative rounded-2xl shadow-sm">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <input type="text" name="search" value="{{ $search }}" placeholder="Cari nama atau deskripsi produk..." 
                           class="block w-full pl-11 pr-24 py-4 bg-white border border-slate-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-transparent text-sm transition">
                    <div class="absolute inset-y-1.5 right-1.5 flex items-center">
                        @if($search)
                            <a href="{{ route('catalog.index', ['category' => $currentCategory]) }}" class="mr-2 text-xs text-slate-400 hover:text-slate-600 transition">Hapus</a>
                        @endif
                        <button type="submit" class="px-5 py-2.5 bg-sky-600 hover:bg-sky-700 text-white font-semibold text-xs rounded-xl shadow-md shadow-sky-100 transition">
                            Cari
                        </button>
                    </div>
                </div>
            </form>

            <!-- Category Filter (Dropdown on Mobile, Tabs on Desktop) -->
            <div class="space-y-4">
                <!-- Mobile Select Dropdown -->
                <div class="sm:hidden max-w-xs mx-auto">
                    <label for="category-select" class="sr-only">Pilih Kategori</label>
                    <select id="category-select" onchange="window.location.href = this.value" 
                            class="block w-full px-4 py-3 bg-white border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-sky-500 text-sm font-semibold text-slate-700 shadow-sm transition">
                        <option value="{{ route('catalog.index', ['search' => $search]) }}" {{ !$currentCategory ? 'selected' : '' }}>
                            📁 Semua Kategori
                        </option>
                        @foreach($categories as $cat)
                            <option value="{{ route('catalog.index', ['category' => $cat->slug, 'search' => $search]) }}" {{ $currentCategory === $cat->slug ? 'selected' : '' }}>
                                {{ $cat->icon ? $cat->icon . ' ' : '' }}{{ $cat->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Desktop Filter Tabs -->
                <div class="hidden sm:flex flex-wrap justify-center gap-2 sm:gap-3">
                    <!-- All Categories Tab -->
                    <a href="{{ route('catalog.index', ['search' => $search]) }}" 
                       class="px-5 py-2.5 rounded-xl text-sm font-semibold tab-transition {{ !$currentCategory ? 'bg-sky-600 text-white shadow-lg shadow-sky-200' : 'bg-white text-slate-600 hover:bg-slate-50 border border-slate-200' }}">
                        Semua Kategori
                    </a>

                    @foreach($categories as $cat)
                        <a href="{{ route('catalog.index', ['category' => $cat->slug, 'search' => $search]) }}" 
                           class="px-5 py-2.5 rounded-xl text-sm font-semibold flex items-center gap-1.5 tab-transition {{ $currentCategory === $cat->slug ? 'bg-sky-600 text-white shadow-lg shadow-sky-200' : 'bg-white text-slate-600 hover:bg-slate-50 border border-slate-200' }}">
                            @if($cat->icon)
                                <span>{{ $cat->icon }}</span>
                            @endif
                            <span>{{ $cat->name }}</span>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Products Grid -->
        @if($products->isEmpty())
            <div class="text-center py-20 bg-white rounded-3xl border border-slate-100 shadow-sm max-w-xl mx-auto px-6">
                <div class="w-16 h-16 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-4 text-slate-400">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-slate-900">Produk Tidak Ditemukan</h3>
                <p class="text-slate-500 mt-2 text-sm">Maaf, tidak ada produk aktif yang cocok dengan pencarian atau filter kategori saat ini.</p>
                <a href="{{ route('catalog.index') }}" class="mt-5 inline-block text-xs font-semibold text-sky-600 bg-sky-50 hover:bg-sky-100 px-4 py-2.5 rounded-xl transition">
                    Reset Filter
                </a>
            </div>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 sm:gap-8">
                @foreach($products as $product)
                    @php
                        $discount = 0;
                        if ($product->original_price && $product->original_price > $product->price) {
                            $discount = round((($product->original_price - $product->price) / $product->original_price) * 100);
                        }
                    @endphp
                    <div class="group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col border border-slate-100 transform hover:-translate-y-1">
                        <!-- Product Image -->
                        <div class="relative aspect-square bg-slate-50 overflow-hidden">
                            @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" 
                                     class="w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-500">
                            @else
                                <div class="w-full h-full flex flex-col items-center justify-center text-slate-300">
                                    <svg class="w-12 h-12 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    <span class="text-xs font-medium">Foto tidak tersedia</span>
                                </div>
                            @endif

                            <!-- Discount Badge -->
                            @if($discount > 0)
                                <span class="absolute top-3 right-3 bg-red-500 text-white text-xs font-extrabold px-2.5 py-1.5 rounded-lg shadow-md z-10">
                                    -{{ $discount }}%
                                </span>
                            @endif

                            <!-- Category Badge -->
                            <span class="absolute top-3 left-3 bg-white/90 backdrop-blur-md text-slate-800 text-xs font-bold px-3 py-1.5 rounded-lg shadow-sm border border-slate-100 flex items-center gap-1">
                                @if($product->category->icon)
                                    <span>{{ $product->category->icon }}</span>
                                @endif
                                <span>{{ $product->category->name }}</span>
                            </span>
                        </div>

                        <!-- Product Info -->
                        <div class="p-5 flex-grow flex flex-col">
                            <h4 class="text-base font-bold text-slate-900 line-clamp-1 group-hover:text-sky-600 transition">
                                {{ $product->name }}
                            </h4>
                            @if($product->description && strlen($product->description) > 80)
                                <div class="mt-2 flex-grow">
                                    <!-- Short Desc -->
                                    <p id="desc-short-{{ $product->id }}" class="text-slate-500 text-xs leading-relaxed line-clamp-2">
                                        {{ $product->description }}
                                    </p>
                                    <!-- Full Desc -->
                                    <p id="desc-full-{{ $product->id }}" class="text-slate-500 text-xs leading-relaxed hidden">
                                        {{ $product->description }}
                                    </p>
                                    <!-- Toggle Button -->
                                    <button onclick="toggleDescription({{ $product->id }})" id="desc-btn-{{ $product->id }}" class="text-sky-600 hover:text-sky-800 text-xs font-semibold mt-1 focus:outline-none transition">
                                        Lihat detail
                                    </button>
                                </div>
                            @else
                                <p class="text-slate-500 text-xs mt-2 line-clamp-2 leading-relaxed flex-grow">
                                    {{ $product->description ?? 'Tidak ada deskripsi produk.' }}
                                </p>
                            @endif
                            
                            <!-- Price -->
                            <div class="mt-4 pt-4 border-t border-slate-50 flex items-center justify-between">
                                <span class="text-xs text-slate-400 font-semibold">Harga</span>
                                <div class="text-right">
                                    @if($discount > 0)
                                        <span class="text-xs text-slate-400 line-through mr-1.5">
                                            Rp{{ number_format($product->original_price, 0, ',', '.') }}
                                        </span>
                                    @endif
                                    <span class="text-lg font-extrabold text-slate-900">
                                        Rp{{ number_format($product->price, 0, ',', '.') }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Store Links / Call to Action -->
                        <div class="p-5 pt-0 mt-auto grid gap-2">
                            @if($product->shopee_url)
                                <a href="{{ $product->shopee_url }}" target="_blank" rel="noopener noreferrer" 
                                   class="shopee-btn w-full py-2.5 rounded-xl text-white text-xs font-bold flex items-center justify-center gap-2 shadow-md shadow-orange-100">
                                    <!-- Shopee Icon (SVG) -->
                                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm-1-13h2v6h-2zm0 8h2v2h-2z"/>
                                    </svg>
                                    <span>Beli di Shopee</span>
                                </a>
                            @endif

                            @if($product->tiktok_url)
                                <a href="{{ $product->tiktok_url }}" target="_blank" rel="noopener noreferrer" 
                                   class="tiktok-btn w-full py-2.5 rounded-xl text-white text-xs font-bold flex items-center justify-center gap-2 shadow-md shadow-slate-900/10">
                                    <!-- TikTok Icon (SVG) -->
                                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                                        <path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.02 1.59 4.23.85.98 2.02 1.68 3.3 1.98.01 1.25.01 2.5.02 3.75-1.12-.04-2.23-.37-3.21-.92-.8-.48-1.46-1.16-1.92-1.97-.02 2.37.01 4.74-.02 7.11-.08 1.48-.56 2.94-1.41 4.14-1.32 1.76-3.48 2.76-5.69 2.67-2.31-.08-4.52-1.39-5.6-3.43-1.22-2.18-1.07-4.99.37-7.01 1.22-1.8 3.39-2.76 5.56-2.5v3.66c-1.15-.17-2.34.25-3.03 1.2-.66.86-.75 2.09-.23 3.04.53.94 1.57 1.52 2.64 1.49 1.13-.01 2.15-.76 2.51-1.83.25-.66.21-1.38.22-2.08V.02z"/>
                                    </svg>
                                    <span>Beli di TikTok</span>
                                </a>
                            @endif

                            @if(!$product->shopee_url && !$product->tiktok_url)
                                <button disabled class="w-full py-2.5 rounded-xl bg-slate-100 text-slate-400 text-xs font-bold cursor-not-allowed">
                                    Hubungi Penjual
                                </button>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-slate-100 mt-16 py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <p class="text-sm text-slate-400">&copy; {{ date('Y') }} Katalog Jelly. Semua Hak Cipta Dilindungi.</p>
            <p class="text-xs text-slate-300 mt-2">Dibuat dengan dedikasi tinggi &bull; Laravel v{{ app()->version() }}</p>
        </div>
    </footer class="bg-white border-t border-slate-100 mt-16 py-8">

    <script>
        function toggleDescription(id) {
            const shortDesc = document.getElementById('desc-short-' + id);
            const fullDesc = document.getElementById('desc-full-' + id);
            const btn = document.getElementById('desc-btn-' + id);
            
            if (fullDesc.classList.contains('hidden')) {
                fullDesc.classList.remove('hidden');
                shortDesc.classList.add('hidden');
                btn.innerText = 'Sembunyikan';
            } else {
                fullDesc.classList.add('hidden');
                shortDesc.classList.remove('hidden');
                btn.innerText = 'Lihat detail';
            }
        }
    </script>
</body>
</html>
