<x-layouts.app title="Home">

    {{-- HERO --}}
    <section class="bg-green-300 text-white py-20 text-center">
        <h1 class="text-4xl font-bold mb-4">
            PPI Sumedang
        </h1>
        <p class="mb-6">
            Wadah kontribusi dan pengembangan pemuda
        </p>

        <x-button>Lihat Kegiatan</x-button>
    </section>

    {{-- TENTANG --}}
    <section class="py-16 text-center">
        <h2 class="text-3xl font-bold mb-4">Tentang Kami</h2>
        <p class="max-w-xl mx-auto text-gray-600">
            Organisasi Purna Paskibraka Indonesia Kabupaten Sumedang.
        </p>
    </section>

    {{-- KEGIATAN --}}
    <section class="py-16 bg-gray-100">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold mb-6 text-center">Kegiatan</h2>

            <div class="grid md:grid-cols-3 gap-6">

                <x-card title="Pelatihan">
                    Pelatihan anggota PPI
                </x-card>

                <x-card title="Pengabdian">
                    Kegiatan sosial masyarakat
                </x-card>

                <x-card title="Upacara">
                    Kegiatan kenegaraan
                </x-card>

            </div>
        </div>
    </section>

</x-layouts.app>