<x-filament-panels::page.simple>
    <div class="mb-6 p-4 bg-emerald-50 border border-emerald-200 rounded-xl text-center space-y-3">
        <div class="w-10 h-10 bg-emerald-100 text-emerald-600 rounded-full flex items-center justify-center mx-auto font-bold text-lg">
            📱
        </div>
        <h3 class="text-sm font-bold text-emerald-900">Kode OTP Reset WhatsApp</h3>
        <p class="text-xs text-emerald-700 leading-relaxed">
            Kode OTP reset password Anda adalah: 
            <span class="font-mono font-black text-sm bg-white px-2 py-0.5 rounded border border-emerald-300 text-emerald-800 tracking-wider">{{ $otpCode }}</span>
        </p>
        @if($phone)
            <div class="pt-1">
                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $phone) }}?text=Halo,+kode+OTP+Reset+Password+Admin+Katalog+saya+adalah:+{{ $otpCode }}" 
                   target="_blank" 
                   class="inline-flex items-center justify-center gap-2 px-4 py-2 bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs rounded-lg shadow-sm transition">
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                        <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l.21.336-1.156 4.22 4.316-1.131.373.222z"/>
                    </svg>
                    <span>Kirim OTP ke WhatsApp Saya</span>
                </a>
            </div>
        @endif
    </div>

    <form wire:submit="submit" class="space-y-6">
        {{ $this->form }}

        <x-filament::button type="submit" size="lg" class="w-full">
            Verifikasi & Reset Password
        </x-filament::button>

        <div class="text-center">
            <a href="{{ route('filament.admin.auth.password-reset.request') }}" class="text-xs font-medium text-slate-500 hover:text-slate-800 transition">
                &larr; Pilih Metode Reset Lain
            </a>
        </div>
    </form>
</x-filament-panels::page.simple>
