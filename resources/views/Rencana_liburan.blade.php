<x-Layout>

    <h1 class="font-bold text-4xl md:text-5xl lg:text-5xl font-sans text-center py-13">Rilekskan fikiran dengan bepergian</h1>
    <div class="block md:block lg:flex justify-center gap-2 sm:p-0 md:p-8 lg:p-10">
        <div class=" md:w-160 lg:w-160 sm:p-0 md:p-6 lg:p-8 ">
            <h2 class=" font-bold text-3xl ">Rencanakan liburan sesuai dengan keinginanmu</h2>
            <p class="text-xl py-4 text-gray-800/80">Rencanakan liburanmu, lalu kita akan mewujudkannya bersama! Kami akan membantu dengan membuat tempat yang diunjungi, budget yang dibutuhkan, lama liburan, dll. Ini akan menyenangan!</p>
            <button class="p-3 hover:bg-gray-950/80 hover:-translate-y-1 cursor-pointer mt-6 transition-all duration-200 bg-black rounded-2xl text-white block">Buat rencana baru sekarang -></button>
            <div class="flex flex-col justify-center items-center md:flex-row md:justify-between gap-1">
                <div class="p-4 w-45 rounded-2xl border-2 my-4 border-gray-700">
                    <h3 class="font-bold text-4xl pb-5 text-center">2</h3>
                    <p class="text-center text-gray-900">Destinasi</p>
                </div>
                <div class="p-4 w-45 rounded-2xl border-2 my-4 border-gray-700">
                    <h3 class="font-bold text-4xl pb-5 text-center">100+</h3>
                    <p class="text-center text-gray-900">Spots & aktifitas</p>
                </div>
                <div class="p-4 w-45 rounded-2xl border-2 my-4 border-gray-700">
                    <h3 class="font-bold text-4xl pb-5 text-center">5</h3>
                    <p class="text-center text-gray-900">tercapai</p>
                </div>
            </div>
        </div>

        <div class="sm:w-full md:w-full lg:w-160 flex justify-center items-center p-8 rounded-3xl border-1 border-gray-400">
            {{-- Selanjutnya apa yang kamu rencanakan --}}
            <div class="w-50 text-center">
                <p class="text-xl py-3">Anda belum membuat jadwal destinasi</p>
                <button class=" cursor-pointer rounded-full border-1 border-gray-700 aspect-square w-12 mt-2  p-2">+</button>
                <p>Buat baru</p>
            </div>
        </div>
    </div>

</x-Layout>