<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($siteSettings->brand_name) ? $siteSettings->brand_name : 'Katalog Jelly' }} - {{ isset($siteSettings->brand_tagline) ? $siteSettings->brand_tagline : 'Paket Usaha & Bahan Baku' }}</title>
    <meta name="description" content="Katalog produk terbaik kami dengan akses pembelian mudah via Shopee dan TikTok Shop.">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f0f9ff !important;
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

        /* Custom Brand Color Helpers */
        .bg-brand-dark {
            background-color: #1c3d7d !important;
        }
        .text-brand-dark {
            color: #1c3d7d !important;
        }
        .border-brand-dark {
            border-color: #1c3d7d !important;
        }
        .bg-brand-blue {
            background-color: #1d96f3 !important;
        }
        .text-brand-blue {
            color: #1d96f3 !important;
        }
        .border-brand-blue {
            border-color: #1d96f3 !important;
        }
        .bg-brand-blue-light {
            background-color: #e0f2fe !important;
        }
        .hover\:bg-brand-blue-hover:hover {
            background-color: #2b5cbf !important;
        }
        .hover\:text-brand-blue-hover:hover {
            color: #2b5cbf !important;
        }
        .hover\:bg-brand-blue\/20:hover {
            background-color: rgba(29, 150, 243, 0.2) !important;
        }
        .from-brand-dark\/95 {
            --tw-gradient-from: rgba(28, 61, 125, 0.95) var(--tw-gradient-from-position) !important;
            --tw-gradient-to: rgba(28, 61, 125, 0) var(--tw-gradient-to-position) !important;
            --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to) !important;
        }
        .via-brand-dark\/50 {
            --tw-gradient-stops: var(--tw-gradient-from), rgba(28, 61, 125, 0.5) var(--tw-gradient-via-position), var(--tw-gradient-to) !important;
        }
        .border-brand-blue\/20 {
            border-color: rgba(29, 150, 243, 0.2) !important;
        }
        .border-brand-blue\/30 {
            border-color: rgba(29, 150, 243, 0.3) !important;
        }
        .bg-brand-dark\/80 {
            background-color: rgba(28, 61, 125, 0.8) !important;
        }
        .bg-brand-blue\/20 {
            background-color: rgba(29, 150, 243, 0.2) !important;
        }
        .bg-brand-blue\/25 {
            background-color: rgba(29, 150, 243, 0.25) !important;
        }
        .bg-brand-blue\/15 {
            background-color: rgba(29, 150, 243, 0.15) !important;
        }
        .shadow-brand-blue\/20 {
            --tw-shadow: 0 10px 15px -3px rgba(29, 150, 243, 0.2), 0 4px 6px -4px rgba(29, 150, 243, 0.2) !important;
            --tw-shadow-colored: 0 10px 15px -3px var(--tw-shadow-color), 0 4px 6px -4px var(--tw-shadow-color) !important;
            box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow) !important;
        }
        .focus\:ring-brand-blue:focus {
            --tw-ring-color: #1d96f3 !important;
        }
        .from-brand-blue\/60 {
            --tw-gradient-from: rgba(29, 150, 243, 0.6) var(--tw-gradient-from-position) !important;
            --tw-gradient-to: rgba(29, 150, 243, 0) var(--tw-gradient-to-position) !important;
            --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to) !important;
        }
        .via-brand-blue\/20 {
            --tw-gradient-stops: var(--tw-gradient-from), rgba(29, 150, 243, 0.2) var(--tw-gradient-via-position), var(--tw-gradient-to) !important;
        }
        .text-brand-dark\/80 {
            color: rgba(28, 61, 125, 0.8) !important;
        }
        .bg-brand-dark\/10 {
            background-color: rgba(28, 61, 125, 0.1) !important;
        }
        .border-brand-dark\/20 {
            border-color: rgba(28, 61, 125, 0.2) !important;
        }
        .product-card {
            border-top: 4px solid #1d96f3 !important;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .product-card:hover {
            border-color: rgba(29, 150, 243, 0.3) !important;
            box-shadow: 0 20px 25px -5px rgba(29, 150, 243, 0.1), 0 8px 10px -6px rgba(29, 150, 243, 0.1) !important;
        }
    </style>
</head>
<body class="text-slate-800 antialiased min-h-screen flex flex-col relative">

    <!-- Jelly Decorative Blobs -->
    <div class="fixed inset-0 -z-10 overflow-hidden pointer-events-none">
        <div class="absolute -top-40 -right-40 w-96 h-96 rounded-full bg-brand-blue blur-3xl opacity-20 animate-pulse" style="animation-duration: 8s;"></div>
        <div class="absolute top-1/2 -left-40 w-80 h-80 rounded-full bg-brand-blue blur-3xl opacity-15 animate-pulse" style="animation-duration: 12s;"></div>
        <div class="absolute -bottom-20 right-1/4 w-72 h-72 rounded-full bg-brand-blue blur-3xl opacity-20 animate-pulse" style="animation-duration: 10s;"></div>
    </div>

    <!-- Header Section -->
    <header class="sticky top-0 z-50 shadow-md" style="background: linear-gradient(135deg, #2b5cbf, #1d96f3); backdrop-filter: blur(12px); border-bottom: 1px solid rgba(255, 255, 255, 0.15);">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                @php
                    $brandLogo = ($siteSettings && $siteSettings->logo) ? asset('storage/' . $siteSettings->logo) : asset('images/logo.jpg');
                    $brandName = ($siteSettings && $siteSettings->brand_name) ? $siteSettings->brand_name : 'Katalog Jelly';
                    $brandTagline = ($siteSettings && $siteSettings->brand_tagline) ? $siteSettings->brand_tagline : 'Paket Usaha & Bahan Baku';
                    $heroBanner = ($siteSettings && $siteSettings->banner) ? asset('storage/' . $siteSettings->banner) : asset('images/hero-banner.jpg');
                @endphp
                <div class="flex items-center gap-3">
                    <img src="{{ $brandLogo }}" alt="{{ $brandName }}" class="w-12 h-12 rounded-xl object-cover shadow-sm border border-white/20">
                    <div>
                        <h1 class="text-xl font-bold tracking-tight text-white">{{ $brandName }}</h1>
                        <p class="text-xs font-medium" style="color: #e0f2fe;">{{ $brandTagline }}</p>
                    </div>
                </div>

                <!-- Admin Link -->
                <div>
                    <a href="{{ url('/admin') }}" class="inline-flex items-center gap-1.5 text-xs font-semibold px-3 py-1.5 rounded-lg bg-white/15 hover:bg-white/25 text-white border border-white/30 backdrop-blur-sm transition-all duration-200 shadow-sm whitespace-nowrap">
                        <svg class="w-3.5 h-3.5 text-white/90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                        </svg>
                        <span>Admin Panel</span>
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- Full Width Standard Banner -->
    <div class="w-full bg-slate-100 overflow-hidden shadow-sm relative">
        <div class="w-full h-32 sm:h-48 md:h-60 lg:h-72 xl:h-80 relative">
            <img src="{{ $heroBanner }}" 
                 alt="{{ $brandName }} Banner" 
                 class="w-full h-full object-cover object-center block">
        </div>
    </div>

    <!-- Main Content -->
    <main class="flex-grow max-w-7xl w-full mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12">

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
                           class="block w-full pl-11 pr-24 py-4 bg-white border border-slate-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-brand-blue focus:border-transparent text-sm transition text-brand-dark">
                    <div class="absolute inset-y-1.5 right-1.5 flex items-center">
                        @if($search)
                            <a href="{{ route('catalog.index', ['category' => $currentCategory]) }}" class="mr-2 text-xs text-slate-400 hover:text-slate-600 transition">Hapus</a>
                        @endif
                        <button type="submit" class="px-5 py-2.5 bg-brand-blue hover:bg-brand-blue-hover text-white font-bold text-xs rounded-xl shadow-md shadow-brand-blue/20 transition">
                            Cari
                        </button>
                    </div>
                </div>
            </form>

            <!-- Multi-Category Filter Component (Desktop Pills & Mobile Drawer Modal) -->
            <div x-data="{
                selected: {{ json_encode($selectedCategories ?? []) }},
                pendingSelected: {{ json_encode($selectedCategories ?? []) }},
                filterOpen: false,
                searchQuery: '{{ e($search) }}',
                toggleCategory(slug) {
                    if (this.selected.includes(slug)) {
                        this.selected = this.selected.filter(s => s !== slug);
                    } else {
                        this.selected.push(slug);
                    }
                    this.applyFilter();
                },
                togglePendingCategory(slug) {
                    if (this.pendingSelected.includes(slug)) {
                        this.pendingSelected = this.pendingSelected.filter(s => s !== slug);
                    } else {
                        this.pendingSelected.push(slug);
                    }
                },
                resetCategory() {
                    this.selected = [];
                    this.pendingSelected = [];
                    this.applyFilter();
                },
                applyPendingFilter() {
                    this.selected = [...this.pendingSelected];
                    this.filterOpen = false;
                    this.applyFilter();
                },
                applyFilter() {
                    const params = new URLSearchParams();
                    if (this.searchQuery) params.set('search', this.searchQuery);
                    if (this.selected.length > 0) params.set('category', this.selected.join(','));
                    window.location.href = '{{ route('catalog.index') }}' + (params.toString() ? '?' + params.toString() : '');
                }
            }" class="space-y-3">

                <!-- Mobile Filter Trigger Button (Mobile Only) -->
                <div class="sm:hidden flex justify-center">
                    <button @click="pendingSelected = [...selected]; filterOpen = true;" 
                            type="button" 
                            class="px-5 py-2.5 rounded-xl text-xs font-bold bg-white text-slate-800 border border-slate-200 shadow-sm flex items-center gap-2.5 hover:bg-slate-50 transition active:scale-95 cursor-pointer">
                        <svg class="w-4 h-4 text-brand-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                        </svg>
                        <span>Filter Kategori</span>
                        <template x-if="selected.length > 0">
                            <span class="px-2 py-0.5 text-[10px] font-extrabold bg-brand-blue text-white rounded-full shadow-sm"
                                  x-text="selected.length"></span>
                        </template>
                    </button>
                </div>

                <!-- Desktop Category Pills (Desktop Only) -->
                <div class="hidden sm:flex flex-wrap justify-center items-center gap-2 sm:gap-3">
                    <!-- All Categories Pill -->
                    <button @click="resetCategory()" 
                            :class="selected.length === 0 ? 'bg-brand-blue text-white shadow-lg shadow-brand-blue/20 border-brand-blue' : 'bg-white text-brand-dark hover:bg-brand-blue-light border-slate-200'"
                            class="px-4 py-2.5 rounded-xl text-xs sm:text-sm font-bold border transition-all duration-200 flex items-center gap-1.5 cursor-pointer">
                        <span>Semua Kategori</span>
                        <template x-if="selected.length === 0">
                            <svg class="w-4 h-4 fill-current text-white" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                        </template>
                    </button>

                    <!-- Dynamic Category Pills -->
                    @foreach($categories as $cat)
                        <button @click="toggleCategory('{{ $cat->slug }}')" 
                                :class="selected.includes('{{ $cat->slug }}') ? 'bg-brand-blue text-white shadow-lg shadow-brand-blue/20 border-brand-blue' : 'bg-white text-brand-dark hover:bg-brand-blue-light border-slate-200'"
                                class="px-4 py-2.5 rounded-xl text-xs sm:text-sm font-bold border transition-all duration-200 flex items-center gap-1.5 cursor-pointer">
                            <!-- Checkbox indicator -->
                            <span :class="selected.includes('{{ $cat->slug }}') ? 'bg-white/20 text-white' : 'bg-slate-100 text-slate-400'"
                                  class="w-4 h-4 rounded flex items-center justify-center text-[10px] transition">
                                <template x-if="selected.includes('{{ $cat->slug }}')">
                                    <svg class="w-3 h-3 fill-current text-white" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                    </svg>
                                </template>
                            </span>
                            @if($cat->icon)
                                <span>{{ $cat->icon }}</span>
                            @endif
                            <span>{{ $cat->name }}</span>
                        </button>
                    @endforeach
                </div>

                <!-- Active Categories Count Indicator (Desktop) -->
                <template x-if="selected.length > 1">
                    <div class="hidden sm:flex items-center justify-center gap-2 pt-1">
                        <span class="text-xs text-slate-500 font-medium" x-text="`${selected.length} kategori dipilih`"></span>
                        <button @click="resetCategory()" class="text-xs text-red-500 font-bold hover:underline cursor-pointer">Reset pilihan</button>
                    </div>
                </template>

                <!-- Mobile Filter Slide-Over Bottom Sheet / Modal -->
                <div x-show="filterOpen" 
                     x-cloak
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0"
                     x-transition:enter-end="opacity-100"
                     x-transition:leave="transition ease-in duration-200"
                     x-transition:leave-start="opacity-100"
                     x-transition:leave-end="opacity-0"
                     class="fixed inset-0 z-50 flex items-end justify-center p-0 bg-slate-950/60 backdrop-blur-sm sm:hidden"
                     style="display: none;">
                    
                    <div @click="filterOpen = false" class="absolute inset-0 z-0"></div>

                    <div x-show="filterOpen"
                         x-transition:enter="transition ease-out duration-300 transform"
                         x-transition:enter-start="translate-y-full"
                         x-transition:enter-end="translate-y-0"
                         x-transition:leave="transition ease-in duration-200 transform"
                         x-transition:leave-start="translate-y-0"
                         x-transition:leave-end="translate-y-full"
                         class="relative z-10 w-full max-w-lg bg-white rounded-t-3xl p-5 shadow-2xl space-y-4 max-h-[85vh] flex flex-col border-t border-slate-100">
                        
                        <!-- Drag Handle & Header -->
                        <div class="flex flex-col items-center">
                            <div class="w-12 h-1.5 bg-slate-200 rounded-full mb-3"></div>
                            <div class="w-full flex items-center justify-between">
                                <div class="flex items-center gap-2">
                                    <svg class="w-5 h-5 text-brand-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                                    </svg>
                                    <h3 class="text-base font-bold text-slate-900">Pilih Kategori Produk</h3>
                                </div>
                                <button @click="filterOpen = false" class="p-1 text-slate-400 hover:text-slate-600 rounded-full">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <!-- Category Checklist Options -->
                        <div class="flex-1 overflow-y-auto space-y-2 py-2 pr-1">
                            <!-- All Categories Option -->
                            <div @click="pendingSelected = []" 
                                 :class="pendingSelected.length === 0 ? 'bg-brand-blue/10 border-brand-blue text-brand-blue' : 'bg-slate-50 border-slate-100 text-slate-700'"
                                 class="p-3.5 rounded-xl border flex items-center justify-between cursor-pointer font-bold text-sm transition">
                                <div class="flex items-center gap-2">
                                    <span>📁</span>
                                    <span>Semua Kategori</span>
                                </div>
                                <div :class="pendingSelected.length === 0 ? 'bg-brand-blue text-white' : 'border border-slate-300 bg-white'"
                                     class="w-5 h-5 rounded-full flex items-center justify-center text-xs transition">
                                    <template x-if="pendingSelected.length === 0">
                                        <svg class="w-3 h-3 fill-current text-white" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                        </svg>
                                    </template>
                                </div>
                            </div>

                            <!-- Category List -->
                            @foreach($categories as $cat)
                                <div @click="togglePendingCategory('{{ $cat->slug }}')" 
                                     :class="pendingSelected.includes('{{ $cat->slug }}') ? 'bg-brand-blue/10 border-brand-blue text-brand-blue' : 'bg-slate-50 border-slate-100 text-slate-700'"
                                     class="p-3.5 rounded-xl border flex items-center justify-between cursor-pointer font-bold text-sm transition">
                                    <div class="flex items-center gap-2">
                                        @if($cat->icon)
                                            <span>{{ $cat->icon }}</span>
                                        @endif
                                        <span>{{ $cat->name }}</span>
                                    </div>
                                    <div :class="pendingSelected.includes('{{ $cat->slug }}') ? 'bg-brand-blue text-white' : 'border border-slate-300 bg-white'"
                                         class="w-5 h-5 rounded-md flex items-center justify-center text-xs transition">
                                        <template x-if="pendingSelected.includes('{{ $cat->slug }}')">
                                            <svg class="w-3 h-3 fill-current text-white" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                            </svg>
                                        </template>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Action Buttons -->
                        <div class="pt-3 border-t border-slate-100 grid grid-cols-2 gap-3">
                            <button @click="pendingSelected = []; applyPendingFilter();" 
                                    type="button" 
                                    class="py-3 px-4 rounded-xl text-xs font-bold text-slate-600 bg-slate-100 hover:bg-slate-200 transition cursor-pointer">
                                Reset
                            </button>
                            <button @click="applyPendingFilter()" 
                                    type="button" 
                                    class="py-3 px-4 rounded-xl text-xs font-bold text-white bg-brand-blue hover:bg-brand-blue-hover shadow-md shadow-brand-blue/20 transition cursor-pointer">
                                Terapkan Filter
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Products Section Container with View Mode State & Modal State -->
        <div x-data="{ 
            viewMode: localStorage.getItem('catalog_view') || 'grid', 
            setView(mode) { this.viewMode = mode; localStorage.setItem('catalog_view', mode); },
            modalOpen: false,
            modalImages: [],
            modalIndex: 0,
            modalTitle: '',
            openModal(images, index, title) {
                if (!images || images.length === 0) return;
                this.modalImages = images;
                this.modalIndex = index;
                this.modalTitle = title;
                this.modalOpen = true;
                document.body.classList.add('overflow-hidden');
            },
            closeModal() {
                this.modalOpen = false;
                document.body.classList.remove('overflow-hidden');
            },
            prevModalImage() {
                this.modalIndex = (this.modalIndex === 0) ? this.modalImages.length - 1 : this.modalIndex - 1;
            },
            nextModalImage() {
                this.modalIndex = (this.modalIndex === this.modalImages.length - 1) ? 0 : this.modalIndex + 1;
            }
        }" @keydown.escape.window="closeModal()">
            <!-- Toolbar Header & View Switcher -->
            <div class="flex items-center justify-between mb-6 pb-4 border-b border-slate-200/80">
                <div class="text-xs sm:text-sm font-bold text-slate-500 flex items-center gap-2">
                    <span>Daftar Produk</span>
                    <span class="px-2.5 py-0.5 rounded-full text-xs bg-slate-100 text-slate-700 font-extrabold border border-slate-200">
                        {{ $products->count() }}
                    </span>
                </div>
                
                <!-- View Switcher Toggle -->
                <div class="flex items-center gap-1 bg-slate-100 p-1 rounded-xl border border-slate-200/80 shadow-inner">
                    <button @click="setView('grid')" 
                            :class="viewMode === 'grid' ? 'bg-white text-slate-900 shadow-sm font-bold border border-slate-200' : 'text-slate-500 hover:text-slate-900 font-medium'"
                            class="flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs transition-all duration-200"
                            title="Tampilan Grid (Kartu)">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                        </svg>
                        <span class="hidden sm:inline">Grid</span>
                    </button>
                    <button @click="setView('list')" 
                            :class="viewMode === 'list' ? 'bg-white text-slate-900 shadow-sm font-bold border border-slate-200' : 'text-slate-500 hover:text-slate-900 font-medium'"
                            class="flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs transition-all duration-200"
                            title="Tampilan List (Baris)">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                        </svg>
                        <span class="hidden sm:inline">List</span>
                    </button>
                </div>
            </div>

            <!-- Products Grid / List -->
            @if($products->isEmpty())
                <div class="text-center py-20 bg-white rounded-3xl border border-slate-100 shadow-sm max-w-xl mx-auto px-6">
                    <div class="w-16 h-16 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-4 text-slate-400">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900">Produk Tidak Ditemukan</h3>
                    <p class="text-slate-500 mt-2 text-sm">Maaf, tidak ada produk aktif yang cocok dengan pencarian atau filter kategori saat ini.</p>
                    <a href="{{ route('catalog.index') }}" class="mt-5 inline-block text-xs font-bold text-brand-dark bg-brand-blue-light hover:bg-brand-blue/20 px-4 py-2.5 rounded-xl border border-brand-blue/20 transition">
                        Reset Filter
                    </a>
                </div>
            @else
                <div :class="viewMode === 'grid' ? 'grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-3 sm:gap-6 lg:gap-8' : 'flex flex-col gap-3 sm:gap-5'">
                    @foreach($products as $product)
                        @php
                            $discount = 0;
                            if ($product->original_price &&
                                $product->price &&
                                $product->original_price > $product->price) {
                                $discount = round((($product->original_price - $product->price) / $product->original_price) * 100);
                            }
                            $productImages = $product->images_list;
                        @endphp
                        <div x-data="{ active: 0, count: {{ count($productImages) }} }" 
                             :class="viewMode === 'grid' ? 'flex flex-col p-0' : 'flex flex-col sm:flex-row items-stretch sm:items-center p-3 sm:p-4 gap-3 sm:gap-5'"
                             class="group product-card bg-white rounded-2xl overflow-hidden shadow-sm border border-slate-100 transform hover:-translate-y-1 transition-all duration-300">
                            
                            <!-- Main Content Group (Image + Info) -->
                            <div :class="viewMode === 'grid' ? 'contents' : 'flex flex-row items-start sm:items-center gap-3 sm:gap-5 flex-1 min-w-0'">
                                <!-- Left Column: Product Image & Slider Controls Below Image -->
                                <div :class="viewMode === 'grid' ? 'w-full' : 'w-24 sm:w-36 md:w-40 flex-shrink-0 flex flex-col gap-1'">
                                    <!-- Product Image Box -->
                                    <div @click="count > 0 && openModal({{ json_encode($productImages) }}, active, '{{ e($product->name) }}')"
                                         :class="viewMode === 'grid' ? 'w-full aspect-square relative bg-slate-50 overflow-hidden cursor-pointer group/img' : 'w-24 h-24 sm:w-36 sm:h-36 md:w-40 md:h-40 relative bg-slate-50 overflow-hidden rounded-xl shadow-sm border border-slate-100 cursor-pointer group/img'"
                                         title="Klik untuk memperbesar gambar">
                                        @if(count($productImages) > 0)
                                            <!-- Zoom Hover Icon -->
                                            <div class="absolute inset-0 bg-slate-900/20 opacity-0 group-hover/img:opacity-100 transition-opacity duration-300 flex items-center justify-center z-10">
                                                <span class="bg-white/90 backdrop-blur-sm text-slate-800 p-2 rounded-full shadow-lg transform scale-75 group-hover/img:scale-100 transition-transform duration-300">
                                                    <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"></path>
                                                    </svg>
                                                </span>
                                            </div>

                                            @foreach($productImages as $index => $img)
                                                <div x-show="active === {{ $index }}" 
                                                     x-transition:enter="transition ease-out duration-300"
                                                     x-transition:enter-start="opacity-0 scale-95"
                                                     x-transition:enter-end="opacity-100 scale-100"
                                                     class="absolute inset-0">
                                                    <img src="{{ asset('storage/' . $img) }}" alt="{{ $product->name }}" 
                                                         class="w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-500">
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="w-full h-full flex flex-col items-center justify-center text-slate-300">
                                                <svg class="w-8 h-8 sm:w-12 sm:h-12 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                </svg>
                                                <span class="text-[10px] sm:text-xs font-medium">Foto tidak tersedia</span>
                                            </div>
                                        @endif
                                    </div>

                                    <!-- Image Navigation Bar (Directly Below Image) -->
                                    @if(count($productImages) > 1)
                                        <div :class="viewMode === 'grid' ? 'px-2 sm:px-4 py-1.5 sm:py-2 bg-slate-100/80 border-b border-slate-100' : 'px-1.5 py-1 bg-slate-100/90 rounded-lg border border-slate-200/80 w-full'" 
                                             class="flex items-center justify-between">
                                            <!-- Prev Button -->
                                            <button @click.stop.prevent="active = (active === 0) ? count - 1 : active - 1" 
                                                    type="button"
                                                    aria-label="Previous Image"
                                                    style="width: 22px; height: 22px; min-width: 22px; min-height: 22px; border-radius: 50%; background-color: #1c3d7d; color: #ffffff; border: none; display: flex; align-items: center; justify-content: center; cursor: pointer; box-shadow: 0 2px 4px rgba(28,61,125,0.3); transition: transform 0.2s, background-color 0.2s;"
                                                    onmouseover="this.style.transform='scale(1.1)'; this.style.backgroundColor='#152e5f';"
                                                    onmouseout="this.style.transform='scale(1)'; this.style.backgroundColor='#1c3d7d';">
                                                <svg style="width: 10px; height: 10px; stroke: #ffffff; fill: none; stroke-width: 3; stroke-linecap: round; stroke-linejoin: round;" viewBox="0 0 24 24">
                                                    <polyline points="15 18 9 12 15 6"></polyline>
                                                </svg>
                                            </button>

                                            <!-- Dots Indicator + Counter -->
                                            <div class="flex items-center gap-1">
                                                <div class="hidden sm:flex items-center gap-1">
                                                    @foreach($productImages as $index => $img)
                                                        <button @click.stop.prevent="active = {{ $index }}" 
                                                                :class="active === {{ $index }} ? 'bg-brand-dark w-2.5' : 'bg-slate-300 w-1'" 
                                                                class="h-1 rounded-full transition-all duration-300"></button>
                                                    @endforeach
                                                </div>
                                                <span class="text-[9px] sm:text-[10px] font-black text-slate-700" x-text="`${active + 1}/${count}`"></span>
                                            </div>

                                            <!-- Next Button -->
                                            <button @click.stop.prevent="active = (active === count - 1) ? 0 : active + 1" 
                                                    type="button"
                                                    aria-label="Next Image"
                                                    style="width: 22px; height: 22px; min-width: 22px; min-height: 22px; border-radius: 50%; background-color: #1c3d7d; color: #ffffff; border: none; display: flex; align-items: center; justify-content: center; cursor: pointer; box-shadow: 0 2px 4px rgba(28,61,125,0.3); transition: transform 0.2s, background-color 0.2s;"
                                                    onmouseover="this.style.transform='scale(1.1)'; this.style.backgroundColor='#152e5f';"
                                                    onmouseout="this.style.transform='scale(1)'; this.style.backgroundColor='#1c3d7d';">
                                                <svg style="width: 10px; height: 10px; stroke: #ffffff; fill: none; stroke-width: 3; stroke-linecap: round; stroke-linejoin: round;" viewBox="0 0 24 24">
                                                    <polyline points="9 18 15 12 9 6"></polyline>
                                                </svg>
                                            </button>
                                        </div>
                                    @endif
                                </div>

                                <!-- Product Info -->
                                <div :class="viewMode === 'grid' ? 'p-3 sm:p-4 pb-1 sm:pb-2 flex-grow flex flex-col justify-between' : 'flex-1 flex flex-col justify-between py-0.5 min-w-0'">
                                    <div>
                                        <h4 :class="viewMode === 'grid' ? 'text-xs sm:text-base font-bold' : 'text-xs sm:text-base font-bold'" class="text-brand-dark line-clamp-1 group-hover:text-brand-blue transition">
                                            @if($product->sort_order)<span style="color: #000000; font-weight: 900; font-size: 1.3em; margin-right: 12px; display: inline-block;">{{ $product->sort_order }}</span>@endif{{ $product->name }}
                                        </h4>
                                        @if($product->description && strlen($product->description) > 80)
                                            <div class="mt-0.5 sm:mt-1">
                                                <!-- Short Desc -->
                                                <p id="desc-short-{{ $product->id }}" class="text-slate-500 text-[11px] sm:text-xs leading-tight sm:leading-relaxed line-clamp-2">
                                                    {{ $product->description }}
                                                </p>
                                                <!-- Full Desc -->
                                                <p id="desc-full-{{ $product->id }}" class="text-slate-500 text-[11px] sm:text-xs leading-tight sm:leading-relaxed hidden">
                                                    {{ $product->description }}
                                                </p>
                                                <!-- Toggle Button -->
                                                <button onclick="toggleDescription({{ $product->id }})" id="desc-btn-{{ $product->id }}" class="text-brand-blue hover:text-brand-blue-hover text-[10px] sm:text-xs font-semibold mt-0.5 focus:outline-none transition">
                                                    Lihat detail
                                                </button>
                                            </div>
                                        @else
                                            <p class="text-slate-500 text-[11px] sm:text-xs mt-0.5 sm:mt-1 line-clamp-2 leading-tight sm:leading-relaxed">
                                                {{ $product->description ?? 'Tidak ada deskripsi produk.' }}
                                            </p>
                                        @endif
                                    </div>
                                    
                                    <!-- Price & Discount Badge -->
                                    @if($product->price || $discount > 0)
                                    <div :class="viewMode === 'grid' ? 'mt-2 sm:mt-3 pt-2 sm:pt-3 border-t border-slate-50' : 'mt-1 sm:mt-2 pt-1 sm:pt-2 border-t border-slate-100'" class="flex flex-col items-start">
                                        @if($discount > 0)
                                            <div class="flex items-center gap-1.5 mb-0.5">
                                                <span class="text-[10px] sm:text-[11px] text-slate-400 line-through">
                                                    Rp{{ number_format($product->original_price, 0, ',', '.') }}
                                                </span>
                                                <span class="bg-red-500 text-white text-[9px] sm:text-[10px] font-extrabold px-1.5 py-0.5 rounded-md shadow-sm">
                                                    -{{ $discount }}%
                                                </span>
                                            </div>
                                        @endif
                                        @if($product->price)
                                        <span :class="viewMode === 'grid' ? 'text-sm sm:text-xl' : 'text-sm sm:text-xl'" class="font-black text-brand-dark leading-tight" style="color: #1c3d7d;">
                                            Rp{{ number_format($product->price, 0, ',', '.') }}
                                        </span>
                                        @endif
                                    </div>
                                    @endif
                                </div>
                            </div>

                            <!-- Store Links / Call to Action -->
                            <div :class="viewMode === 'grid' ? 'p-3 sm:p-4 pt-1 sm:pt-2 mt-auto w-full grid grid-cols-2 gap-1.5 sm:gap-2' : 'w-full sm:w-44 flex-shrink-0 grid grid-cols-2 sm:flex sm:flex-col gap-1.5 sm:gap-2 sm:self-center justify-center pt-2 sm:pt-0 border-t sm:border-t-0 border-slate-100'" class="w-full">
                                @if($product->shopee_url)
                                    <a href="{{ $product->shopee_url }}" target="_blank" rel="noopener noreferrer" 
                                       class="shopee-btn w-full py-2.5 rounded-xl text-white text-xs font-bold flex items-center justify-center gap-1.5 shadow-md shadow-orange-100"
                                       :class="viewMode === 'grid' && !'{{ $product->tiktok_url }}' ? 'col-span-2' : ''">
                                        <!-- Shopee Icon (SVG) -->
                                        <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 109.59 122.88">
                                            <path d="M74.98,91.98C76.15,82.36,69.96,76.22,53.6,71c-7.92-2.7-11.66-6.24-11.57-11.12 c0.33-5.4,5.36-9.34,12.04-9.47c4.63,0.09,9.77,1.22,14.76,4.56c0.59,0.37,1.01,0.32,1.35-0.2c0.46-0.74,1.61-2.53,2-3.17 c0.26-0.42,0.31-0.96-0.35-1.44c-0.95-0.7-3.6-2.13-5.03-2.72c-3.88-1.62-8.23-2.64-12.86-2.63c-9.77,0.04-17.47,6.22-18.12,14.47 c-0.42,5.95,2.53,10.79,8.86,14.47c1.34,0.78,8.6,3.67,11.49,4.57c9.08,2.83,13.8,7.9,12.69,13.81c-1.01,5.36-6.65,8.83-14.43,8.93 c-6.17-0.24-11.71-2.75-16.02-6.1c-0.11-0.08-0.65-0.5-0.72-0.56c-0.53-0.42-1.11-0.39-1.47,0.15c-0.26,0.4-1.92,2.8-2.34,3.43 c-0.39,0.55-0.18,0.86,0.23,1.2c1.8,1.5,4.18,3.14,5.81,3.97c4.47,2.28,9.32,3.53,14.48,3.72c3.32,0.22,7.5-0.49,10.63-1.81 C70.63,102.67,74.25,97.92,74.98,91.98L74.98,91.98z M54.79,7.18c-10.59,0-19.22,9.98-19.62,22.47h39.25 C74.01,17.16,65.38,7.18,54.79,7.18L54.79,7.18z M94.99,122.88l-0.41,0l-80.82-0.01h0c-5.5-0.21-9.54-4.66-10.09-10.19l-0.05-1 l-3.61-79.5v0C0,32.12,0,32.06,0,32c0-1.28,1.03-2.33,2.3-2.35l0,0h25.48C28.41,13.15,40.26,0,54.79,0s26.39,13.15,27.01,29.65 h25.4h0.04c1.3,0,2.35,1.05,2.35,2.35c0,0.04,0,0.08,0,0.12v0l-3.96,79.81l-0.04,0.68C105.12,118.21,100.59,122.73,94.99,122.88 L94.99,122.88z"/>
                                        </svg>
                                        <span>Shopee</span>
                                    </a>
                                @endif

                                @if($product->tiktok_url)
                                    <a href="{{ $product->tiktok_url }}" target="_blank" rel="noopener noreferrer" 
                                       class="tiktok-btn w-full py-2.5 rounded-xl text-white text-xs font-bold flex items-center justify-center gap-1.5 shadow-md shadow-slate-900/10"
                                       :class="viewMode === 'grid' && !'{{ $product->shopee_url }}' ? 'col-span-2' : ''">
                                        <!-- TikTok Icon (SVG) -->
                                        <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24">
                                            <path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.02 1.59 4.23.85.98 2.02 1.68 3.3 1.98.01 1.25.01 2.5.02 3.75-1.12-.04-2.23-.37-3.21-.92-.8-.48-1.46-1.16-1.92-1.97-.02 2.37.01 4.74-.02 7.11-.08 1.48-.56 2.94-1.41 4.14-1.32 1.76-3.48 2.76-5.69 2.67-2.31-.08-4.52-1.39-5.6-3.43-1.22-2.18-1.07-4.99.37-7.01 1.22-1.8 3.39-2.76 5.56-2.5v3.66c-1.15-.17-2.34.25-3.03 1.2-.66.86-.75 2.09-.23 3.04.53.94 1.57 1.52 2.64 1.49 1.13-.01 2.15-.76 2.51-1.83.25-.66.21-1.38.22-2.08V.02z"/>
                                        </svg>
                                        <span>TikTok</span>
                                    </a>
                                @endif

                                @if(!$product->shopee_url && !$product->tiktok_url)
                                    <button disabled class="w-full py-2.5 rounded-xl bg-slate-100 text-slate-400 text-xs font-bold cursor-not-allowed col-span-2">
                                        Hubungi Penjual
                                    </button>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

            <!-- High-Resolution Image Lightbox Modal -->
            <div x-show="modalOpen" 
                 x-cloak
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0"
                 class="fixed inset-0 z-50 flex items-center justify-center p-3 sm:p-6 bg-slate-950/90 backdrop-blur-md overflow-hidden"
                 style="display: none;">

                <!-- Background Click Handler -->
                <div @click="closeModal()" class="absolute inset-0 z-0"></div>

                <!-- Modal Content Box -->
                <div class="relative z-10 w-full max-w-4xl max-h-[92vh] flex flex-col bg-slate-900 rounded-3xl overflow-hidden shadow-2xl border border-slate-800">
                    
                    <!-- Modal Header -->
                    <div class="flex items-center justify-between px-4 sm:px-6 py-3.5 bg-slate-900/90 border-b border-slate-800">
                        <div class="flex items-center gap-3 min-w-0 pr-4">
                            <h3 class="text-xs sm:text-base font-bold text-white truncate" x-text="modalTitle"></h3>
                            <template x-if="modalImages.length > 1">
                                <span class="px-2.5 py-0.5 rounded-full text-[11px] font-extrabold bg-brand-blue text-white shadow-sm flex-shrink-0"
                                      x-text="`${modalIndex + 1} / ${modalImages.length}`"></span>
                            </template>
                        </div>
                        
                        <!-- Close Button -->
                        <button @click="closeModal()" 
                                type="button" 
                                class="p-2 text-slate-400 hover:text-white bg-slate-800 hover:bg-slate-700 rounded-full transition focus:outline-none flex-shrink-0"
                                aria-label="Close Lightbox">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>

                    <!-- Modal Body (Image Container with Left/Right Slider Buttons) -->
                    <div class="relative flex-1 bg-slate-950 flex items-center justify-center p-3 sm:p-6 min-h-[280px] sm:min-h-[450px] overflow-hidden select-none">
                        
                        <!-- Main Preview Image -->
                        <template x-for="(img, idx) in modalImages" :key="idx">
                            <img x-show="modalIndex === idx" 
                                 x-transition:enter="transition ease-out duration-300 transform"
                                 x-transition:enter-start="opacity-0 scale-95"
                                 x-transition:enter-end="opacity-100 scale-100"
                                 x-transition:leave="transition ease-in duration-200 transform"
                                 x-transition:leave-start="opacity-100 scale-100"
                                 x-transition:leave-end="opacity-0 scale-95"
                                 :src="'/storage/' + img" 
                                 :alt="modalTitle" 
                                 class="max-h-[60vh] sm:max-h-[65vh] max-w-full object-contain rounded-xl shadow-2xl">
                        </template>

                        <!-- Previous Slide Button -->
                        <template x-if="modalImages.length > 1">
                            <button @click.stop="prevModalImage()" 
                                    type="button"
                                    aria-label="Previous Image"
                                    class="absolute left-2 sm:left-5 top-1/2 -translate-y-1/2 w-9 h-9 sm:w-12 sm:h-12 rounded-full bg-slate-900/80 hover:bg-brand-blue text-white border border-slate-700 hover:border-brand-blue flex items-center justify-center shadow-xl backdrop-blur-md transition-all duration-200 transform hover:scale-110 active:scale-95 focus:outline-none z-20">
                                <svg class="w-5 h-5 sm:w-6 sm:h-6 stroke-current" fill="none" stroke-width="2.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                                </svg>
                            </button>
                        </template>

                        <!-- Next Slide Button -->
                        <template x-if="modalImages.length > 1">
                            <button @click.stop="nextModalImage()" 
                                    type="button"
                                    aria-label="Next Image"
                                    class="absolute right-2 sm:right-5 top-1/2 -translate-y-1/2 w-9 h-9 sm:w-12 sm:h-12 rounded-full bg-slate-900/80 hover:bg-brand-blue text-white border border-slate-700 hover:border-brand-blue flex items-center justify-center shadow-xl backdrop-blur-md transition-all duration-200 transform hover:scale-110 active:scale-95 focus:outline-none z-20">
                                <svg class="w-5 h-5 sm:w-6 sm:h-6 stroke-current" fill="none" stroke-width="2.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                </svg>
                            </button>
                        </template>
                    </div>

                    <!-- Modal Footer Thumbnail Bar (If > 1 Image) -->
                    <template x-if="modalImages.length > 1">
                        <div class="flex items-center justify-center gap-2 p-3 bg-slate-900 border-t border-slate-800 overflow-x-auto">
                            <template x-for="(img, idx) in modalImages" :key="'thumb-'+idx">
                                <button @click="modalIndex = idx" 
                                        :class="modalIndex === idx ? 'ring-2 ring-brand-blue scale-105 opacity-100' : 'opacity-50 hover:opacity-100 scale-95'"
                                        class="w-10 h-10 sm:w-14 sm:h-14 rounded-lg overflow-hidden flex-shrink-0 transition-all duration-200 border border-slate-700 focus:outline-none">
                                    <img :src="'/storage/' + img" :alt="modalTitle" class="w-full h-full object-cover">
                                </button>
                            </template>
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="mt-16" style="background: linear-gradient(135deg, #1c3d7d, #1d96f3); color: #ffffff; border-top: 1px solid rgba(255, 255, 255, 0.1); padding: 3rem 1.5rem;">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <p class="text-sm font-medium" style="color: rgba(255, 255, 255, 0.9);">&copy; {{ date('Y') }} Katalog Jelly. Semua Hak Cipta Dilindungi.</p>
            <p class="text-xs mt-2" style="color: rgba(255, 255, 255, 0.65);">Dibuat dengan dedikasi tinggi &bull; Laravel v{{ app()->version() }}</p>
        </div>
    </footer>

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
