<x-layout>

    {{-- Header --}}
    <header>
        <h1 class="font-bold text-4xl md:text-5xl lg:text-5xl font-sans text-center py-13">Rilekskan fikiran dengan bepergian</h1>
        <div class="block md:block lg:flex justify-center gap-2 sm:p-0 md:p-8 lg:p-10">
            <div class=" md:w-160 lg:w-160 sm:p-0 md:p-6 lg:p-8 ">
                <h2 class=" font-bold text-3xl ">Rencanakan liburan sesuai dengan keinginanmu</h2>
                <p class="text-xl py-4 text-gray-800/80">Rencanakan liburanmu, lalu kita akan mewujudkannya bersama! Kami akan membantu dengan membuat tempat yang diunjungi, budget yang dibutuhkan, lama liburan, dll. Ini akan menyenangan!</p>
                <div class="text-center md:text-left my-2 ">
                    <a href="/destinasi_liburan" class="p-3 hover:bg-gray-950/80 hover:-translate-y-1 cursor-pointer mt-6 transition-all duration-200 bg-black rounded-2xl text-white">Buat destinasi baru sekarang -></a>
                </div>
                <div class="flex flex-col justify-center items-center md:flex-row md:justify-between gap-1">
                    <div class="p-4 w-45 rounded-2xl border-2 my-4 border-gray-700">
                        <h3 class="font-bold text-4xl pb-5 text-center">
                            @guest
                                -
                            @endguest
                            @auth
                                @if ($user)
                                    {{ $user->destinations ? count($user->destinations) : '-'}}
                                @else
                                    -
                                @endif
                            @endauth
                        </h3>
                        <p class="text-center text-gray-900">Destinasi</p>
                    </div>
                    <div class="p-4 w-45 rounded-2xl border-2 my-4 border-gray-700">
                        <h3 class="font-bold text-4xl pb-5 text-center">
                            @guest
                                -
                            @endguest
                            @auth
                                @if ($spot_aktifitas)
                                    {{ $spot_aktifitas }}
                                @else
                                    -
                                @endif
                            @endauth
                        </h3>
                        <p class="text-center text-gray-900">Spots & aktifitas</p>
                    </div>
                    <div class="p-4 w-45 rounded-2xl border-2 my-4 border-gray-700">
                        <h3 class="font-bold text-4xl pb-5 text-center">
                            @guest
                                -
                            @endguest
                            @auth
                                @if ($tercapai)
                                    {{ $tercapai }}
                                @else
                                    -
                                @endif
                            @endauth
                        </h3>
                        <p class="text-center text-gray-900">tercapai</p>
                    </div>
                </div>
            </div>

            {{-- Kalender --}}
            <div class="sm:w-full md:w-full lg:w-160 p-8 rounded-3xl border-1 border-gray-400">
                <div class="w-full">
                    <div class="flex justify-around p-2">
                        <div id="prevBtn" class="cursor-pointer p-1 px-2.5 bg-gray-400 border-1 border-gray-800 rounded-full inline-block"><</div>
                        <div id="monthYear"></div>
                        <div id="nextBtn" class="cursor-pointer p-1 px-2.5 bg-gray-400 border-1 border-gray-800 rounded-full inline-block">></div>
                    </div>
                    <div id="days" class="flex justify-around border-t-1 border-gray-700">
                        <div>Min</div>
                        <div>Sen</div>
                        <div>Sel</div>
                        <div>Rab</div>
                        <div>Kam</div>
                        <div>Jum</div>
                        <div>Sab</div>
                    </div>
                    <div id="dates" class="grid grid-cols-7 gap-3.5">

                    </div>
                </div>
            </div>
        </div>
    </header>
    @guest
        {{-- Belum login --}}
    @endguest
    @auth
        {{-- Destinasi belum diunjungi --}}
        <section id="destinasi">
            <h1 class="text-center mt-25 mb-10 text-3xl font-bold">Tenang semua sudah direncanakan</h1>
            <h1 class="mx-0 my-3 text-2xl md:mx-20 font-bold">Belum direncanakan</h1>
            @if (count($user->destinations) == 0)
                <p class="text-gray-700 text-center py-20">Anda belum membuat destinasi</p>
            @endif
            <div class="grid grid-cols-1 mx-0 md:mx-20 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($user->destinations as $item)
                    @if ($item->status == false)
                        <div class="shadow-md shadow-black/30">
                            <img src="{{ asset('storage/' . $item->image) }}" class="aspect-[9/5] sm:rounded-t-md md:rounded-t-lg bg-[#F77F00]">
                            <div class="p-3 md:p-5">
                                <h3 class="font-bold text-2xl ">{{ $item['judul'] }}</h3>
                            <p class="text-gray-700">{{ $item['tanggal'] }}</p>
                            <p class="text-gray-700">{{'Rp '. number_format($item['budget'], 0, ',', '.') }}</p>
                            <p>{{ $item['lama_liburan'] . ' Hari'}}</p>
                            <a href="/destinasi_liburan" class="p-2 w-30 hover:bg-gray-950/80 hover:-translate-y-1 cursor-pointer mt-6 transition-all duration-200 bg-black rounded-sm text-white block">Detail -></a>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </section>

        {{-- Navigasi rencana liburan --}}
        @if (count($user->destinations) == 0)
            <div class="text-center">
                <a href="/destinasi_liburan" class="inline-block text-center p-3 mt-6 bg-white text-black rounded-2xl cursor-pointer transition duration-200 ease-out hover:bg-gray-900 hover:text-white shadow-md hover:-translate-y-1 hover:shadow-lg active:scale-95">Masih luang? Buat yuk -></a>
            </div>
        @else
        <div class="text-center">
            <a href="/destinasi_liburan" class="inline-block text-center p-3 mt-6 bg-white text-black rounded-2xl cursor-pointer transition duration-200 ease-out hover:bg-gray-900 hover:text-white shadow-md hover:-translate-y-1 hover:shadow-lg active:scale-95">Masih luang? Buat lagi yuk -></a>
        </div>
        @endif

        {{-- Destinasi sudah dikunjungi --}}
        <section id="destinasi">
            <h1 class="text-center mt-25 mb-10 text-3xl font-bold">Perjalanan dalam hidupmu</h1>
            <h1 class="mx-0 my-3 text-2xl md:mx-20 font-bold">Sudah dikunjungi</h1>
            <div class="grid grid-cols-1 mx-0 md:mx-20 md:grid-cols-2 lg:grid-cols-3 gap-6">

                @foreach ($user->destinations as $item)
                @if ($item->status == true)
                    <div class="shadow-md shadow-black/30">
                        <img src="{{ asset('storage/' . $item->image) }}" class="aspect-[9/5] sm:rounded-t-md md:rounded-t-lg bg-[#F77F00]">
                        <div class="p-3 md:p-5">
                            <h3 class="font-bold text-2xl ">{{ $item['judul'] }}</h3>
                        <p class="text-gray-700">{{ $item['tanggal'] }}</p>
                        <p class="text-gray-700">{{'Rp '. number_format($item['budget'], 0, ',', '.') }}</p>
                        <p>{{ $item['lama_liburan'] . ' Hari'}}</p>
                        <a href="/destinasi_liburan" class="p-2 w-30 hover:bg-gray-950/80 hover:-translate-y-1 cursor-pointer mt-6 transition-all duration-200 bg-black rounded-sm text-white block">Detail -></a>
                        </div>
                    </div>
                @endif
                @endforeach
            </div>
        </section>
    @endauth

</x-layout>