<x-layouts.app title="Login — Masuk ke Akun Anda">

    <div class="min-h-screen bg-[#FAF8F5] flex items-center justify-center p-4 relative overflow-hidden">

        {{-- Background decorative shapes --}}
        <div class="absolute top-0 right-0 w-[600px] h-[600px] bg-emerald-100/50 rounded-full -translate-y-1/3 translate-x-1/3 blur-3xl pointer-events-none"></div>
        <div class="absolute bottom-0 left-0 w-[400px] h-[400px] bg-stone-200/60 rounded-full translate-y-1/3 -translate-x-1/3 blur-2xl pointer-events-none"></div>
        <div class="absolute top-1/2 left-1/4 w-2 h-2 bg-emerald-400 rounded-full opacity-60 pointer-events-none"></div>
        <div class="absolute top-1/3 right-1/4 w-1.5 h-1.5 bg-stone-400 rounded-full opacity-40 pointer-events-none"></div>

        <div class="w-full max-w-md relative z-10">

            {{-- Card --}}
            <div class="bg-white rounded-3xl shadow-xl shadow-stone-200/80 overflow-hidden">

                {{-- Top accent bar --}}
                <div class="h-1 w-full bg-gradient-to-r from-emerald-400 via-emerald-500 to-emerald-400"></div>

                <div class="p-10">

                    {{-- Header --}}
                    <div class="mb-10">
                        {{-- Logo / icon --}}
                        <div class="w-12 h-12 bg-emerald-50 border border-emerald-200 rounded-2xl flex items-center justify-center mb-6">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>

                        <h1 class="text-[1.75rem] leading-tight font-bold text-stone-800" style="font-family: 'DM Serif Display', serif;">
                            Selamat datang<br>
                            <span class="italic text-emerald-500">kembali.</span>
                        </h1>
                        <p class="mt-2 text-sm text-stone-400 font-light">
                            Masuk untuk melanjutkan aktivitas Anda.
                        </p>
                    </div>

                    {{-- Form --}}
                    <form method="#" action="#" class="space-y-5" novalidate>
                        @csrf

                        <x-input
                            label="username"
                            name="username"
                            type="username"
                            placeholder="username"
                        />

                        <div>
                            <x-input
                                label="Password"
                                name="password"
                                type="password"
                                placeholder="••••••••"
                            />
                            <div class="mt-2 text-right">
                                <a href="#" class="text-xs text-emerald-500 hover:text-emerald-600 font-medium transition-colors">
                                    Lupa kata sandi?
                                </a>
                            </div>
                        </div>

                        {{-- Remember me --}}
                        <label class="flex items-center gap-3 cursor-pointer select-none group">
                            <div class="relative">
                                <input type="checkbox" name="remember" class="peer sr-only">
                                <div class="w-9 h-5 bg-stone-200 rounded-full transition-colors duration-200 peer-checked:bg-emerald-500"></div>
                                <div class="absolute top-0.5 left-0.5 w-4 h-4 bg-white rounded-full shadow-sm transition-transform duration-200 peer-checked:translate-x-4"></div>
                            </div>
                            <span class="text-sm text-stone-500 group-hover:text-stone-700 transition-colors">Ingat saya</span>
                        </label>

                        {{-- Error umum --}}
                        @if (session('error'))
                            <div class="flex items-start gap-3 bg-red-50 border border-red-100 text-red-600 text-sm rounded-xl p-3.5">
                                <svg class="w-4 h-4 mt-0.5 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                </svg>
                                {{ session('error') }}
                            </div>
                        @endif

                        <x-button type="submit" class="mt-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75"/>
                            </svg>
                            Masuk
                        </x-button>
                    </form>

                    {{-- Divider --}}
                    <div class="flex items-center gap-4 my-7">
                        <div class="flex-1 h-px bg-stone-100"></div>
                        <span class="text-xs text-stone-300 tracking-wider uppercase">atau</span>
                        <div class="flex-1 h-px bg-stone-100"></div>
                    </div>

                    {{-- Register link --}}
                    <p class="text-center text-sm text-stone-400">
                        Belum punya akun?
                        <a href="#" class="text-stone-700 font-semibold hover:text-emerald-500 transition-colors ml-1">
                            Daftar sekarang →
                        </a>
                    </p>

                </div>
            </div>

            {{-- Footer note --}}
            <p class="text-center text-xs text-stone-400 mt-6">
                Dengan masuk, Anda menyetujui
                <a href="#" class="underline underline-offset-2 hover:text-stone-600 transition-colors">Syarat & Ketentuan</a>
                kami.
            </p>

        </div>
    </div>

</x-layouts.app>