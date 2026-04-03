<footer class="bg-black border-t border-stone-100 mt-auto">
    <div class="max-w-7xl mx-auto px-6 py-8">
        <div class="flex flex-col sm:flex-row items-center justify-between gap-4">

            {{-- Brand --}}
            <div class="flex items-center gap-2">
                <img 
                    src="{{ asset('images/Logo PPI.png') }}" 
                    alt="Logo PPI"
                    class="w-9 h-9 object-contain transition-transform duration-200 group-hover:scale-105"
                >
                <span class="text-sm font-semibold text-white" style="font-family: 'DM Serif Display', serif;">
                    Purna Paskibraka Indonesia<span class="text-emerald-500">.</span>
                </span>
 
            </div>



            {{-- Links --}}
            <nav class="flex items-center gap-5">
                {{-- Email --}}
                <a href="mailto:ppi.sumedang@gmail.com"
                class="flex items-center gap-1.5 group transition-all duration-200 text-stone-400 hover:text-primary">
                    <svg class="w-4 h-4 transition-transform duration-200 group-hover:-translate-y-0.5"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25H4.5A2.25 2.25 0 012.25 17.25V6.75m19.5 0L12 13.5 2.25 6.75m19.5 0A2.25 2.25 0 0019.5 4.5H4.5A2.25 2.25 0 002.25 6.75"/>
                    </svg>
                    <span>Email</span>
                </a>
    {{-- Instagram --}}
    <a href="https://instagram.com/ppismd"
       target="_blank"
       class="flex items-center gap-1.5 group transition-all duration-200 text-stone-400 hover:text-primary">

        <svg class="w-4 h-4 transition-transform duration-200 group-hover:-translate-y-0.5"
             fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
            <rect x="3" y="3" width="18" height="18" rx="5" />
            <circle cx="12" cy="12" r="3.5" />
            <circle cx="17.5" cy="6.5" r="1" />
        </svg>

        <span>Instagram</span>
    </a>
    {{-- YouTube --}}
    <a href="https://youtube.com/@ppisumedang9021"
       target="_blank"
       class="flex items-center gap-1.5 group transition-all duration-200 text-stone-400 hover:text-primary">

        <svg class="w-4 h-4 transition-transform duration-200 group-hover:-translate-y-0.5"
             fill="currentColor" viewBox="0 0 24 24">
            <path d="M21.8 8s-.2-1.4-.8-2a2.8 2.8 0 00-2-0.8C16.2 5 12 5 12 5s-4.2 0-7 .2a2.8 2.8 0 00-2 .8c-.6.6-.8 2-.8 2S2 9.6 2 11.2v1.6c0 1.6.2 3.2.2 3.2s.2 1.4.8 2a3.3 3.3 0 002.2.8c1.6.2 6.8.2 6.8.2s4.2 0 7-.2a2.8 2.8 0 002-.8c.6-.6.8-2 .8-2s.2-1.6.2-3.2v-1.6C22 9.6 21.8 8 21.8 8zM10 14.5v-5l5 2.5-5 2.5z"/>
        </svg>

        <span>YouTube</span>
    </a>
            </nav>

            {{-- Copyright --}}
            <p class="text-xs text-stone-300">
                &copy; {{ date('Y') }} PPI Sumedang. All rights reserved.
            </p>
        </div>
    </div>
</footer>