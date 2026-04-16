<x-Layout>

    <header>
        <h1 class="text-3xl text-center font-bold py-5">Rencana liburan</h1>
    </header>
    <h1 class="pb-10 text-2xl font-bold">{{ $judul }}</h1>
    <h1></h1>
    <div class="flex flex-col-reverse lg:flex-row w-full justify-center gap-2">
        <section class=" w-full border-x-1 border-gray-700">
            <div class="flex justify-between mx-5 pb-3 border-b-1 border-gray-700">
                <div class="flex justify-between w-full">
                    <h2 class="px-2 border-l-8 text-xl font-bold border-indigo-500">Lokasi</h2>
                    <button id="location_toggle" class="bg-indigo-500 px-5 rounded-sm cursor-pointer"><img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxNiIgaGVpZ2h0PSIxNiIgdmlld0JveD0iMCAwIDE2IDE2Ij48cGF0aCBmaWxsPSIjZmZmIiBkPSJNOC43NSAzLjc1YS43NS43NSAwIDAgMC0xLjUgMHYzLjVoLTMuNWEuNzUuNzUgMCAwIDAgMCAxLjVoMy41djMuNWEuNzUuNzUgMCAwIDAgMS41IDB2LTMuNWgzLjVhLjc1Ljc1IDAgMCAwIDAtMS41aC0zLjV6Ii8+PC9zdmc+" alt=""></button>
                </div>
            </div>
            @guest
            {{-- Form location --}}
                <div id="location_form" class="hidden w-full p-3 select-none pointer-events-none opacity-80">
                    <form action="/location" method="POST" class="w-full">
                        <table class="w-full">
                            <tr>
                                <td>
                                    <label for="location">Lokasi</label>
                                </td>
                                <td>
                                    :
                                </td>
                                <td class="flex">
                                    <input type="text" name="judul" value="{{ $judul }}" hidden>
                                    <input class="border-1 flex-1 rounded-md border-gray-700 w-auto" type="text" name="location">
                                    <button id="location_form_btn" class="ml-4 text-white bg-indigo-500 px-5 py-1 rounded-sm cursor-pointer" type="submit">Masukkan</button>
                                </td>
                                    
                            </tr>
                        </table>
                    </form>
                </div>
                <p class="p-5 select-none text-gray-600 text-center">Anda belum merencanakan apapun</p>
            @endguest
            @auth
                    {{-- location form input --}}
                    <div id="location_form" class="hidden w-full p-5">
                        <form action="/location" method="POST" class="w-full">
                            <table class="w-full">
                                @if (!$judul)
                                    <p class="text-red-700">Destinasi belum dipilih, Pilih destinasi terlebih dahulu</p>
                                @endif
                                <tr>
                                    <td>
                                        <label for="location">Lokasi</label>
                                    </td>
                                    <td>
                                        :
                                    </td>
                                    <td class="flex">
                                        @if (!$judul)
                                            <input class="border-1 pointer-events-none flex-1 rounded-md border-gray-700 w-auto" type="text" name="location">
                                        @else
                                            <input type="text" name="destination_id" value="{{ Auth::user()->destinations[0]->id }}" hidden>
                                            <input type="text" name="judul" value="{{ $judul }}" hidden>
                                            <input class="border-1 flex-1 rounded-md border-gray-700 w-auto" type="text" name="location">
                                        @endif
                                        @if (!$judul)
                                            <button id="location_form_btn" class="ml-4 pointer-events-none text-white bg-indigo-500 px-5 py-1 rounded-sm cursor-pointer" type="submit">Masukkan</button>
                                        @else
                                            <button id="location_form_btn" class="ml-4 text-white bg-indigo-500 px-5 py-1 rounded-sm cursor-pointer" type="submit">Masukkan</button>
                                        @endif
                                    </td>
                                        
                                </tr>
                            </table>
                        </form>
                    </div>

                    {{-- location form edit --}}
                    <div id="edit_form_location" class="hidden w-full p-5">
                        <form action="/edit_location" method="POST" class="w-full">
                            <table class="w-full">
                                <tr>
                                    <td>
                                        <label for="location">Lokasi</label>
                                    </td>
                                    <td>
                                        :
                                    </td>
                                    <td class="flex">
                                        @if (!$judul)
                                            <input class="border-1 pointer-events-none flex-1 rounded-md border-gray-700 w-auto" type="text" name="location">
                                        @else
                                            <input type="text" name="destination_id" value="{{ Auth::user()->destinations[0]->id }}" hidden>
                                            <input type="text" name="judul" value="{{ $judul }}" hidden>
                                            <input type="text" name="edit_id" hidden>
                                            <input class="border-1 flex-1 rounded-md border-gray-700 w-auto" type="text" name="edit_location">
                                        @endif
                                        @if (!$judul)
                                            <button class="ml-4 pointer-events-none text-white bg-indigo-500 px-5 py-1 rounded-sm cursor-pointer" type="submit">Masukkan</button>
                                        @else
                                            <button type="submit" class="ml-4 text-white bg-indigo-500 px-5 py-1 rounded-sm cursor-pointer" type="submit">Masukkan</button>
                                        @endif
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>

                    @if(count(Auth::user()->destinations) == 0 || count(Auth::user()->destinations[0]->locations) == 0)
                        <p class="p-5 select-none text-gray-600 text-center">Anda belum merencanakan apapun</p>
                    @elseif (!$judul)
                        <p class="p-5 select-none text-gray-600 text-center">Pilih destinasi</p>
                    @else
                    @foreach (Auth::user()->destinations[0]->locations as $item)
                        {{-- Lokasi --}}
                        <div class="px-5 my-2 w-full">
                            @if ($item['checked'] == true)
                                <table class="w-full transition-all duration-1000 border-1 border-gray-700 rounded-md shadow-md bg-[#50D890]">
                                    <tr>
                                        <td class="p-1 border-r-1 border-gray-700 flex justify-center">
                                            <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyNCIgaGVpZ2h0PSIyNCIgdmlld0JveD0iMCAwIDI0IDI0Ij48cGF0aCBmaWxsPSIjZjAxMjEyIiBkPSJNMTAuMTE1IDIxLjgxMWMuNjA2LjUgMS4yMzguOTU3IDEuODg1IDEuNDAzYTI3IDI3IDAgMCAwIDEuODg1LTEuNDAzYTI4IDI4IDAgMCAwIDIuODUzLTIuNjk5QzE4Ljc4MiAxNi44NzcgMjEgMTMuNjM3IDIxIDEwYTkgOSAwIDEgMC0xOCAwYzAgMy42MzcgMi4yMTggNi44NzYgNC4yNjIgOS4xMTJhMjggMjggMCAwIDAgMi44NTMgMi43TTEyIDEzLjI1YTMuMjUgMy4yNSAwIDEgMSAwLTYuNWEzLjI1IDMuMjUgMCAwIDEgMCA2LjUiLz48L3N2Zz4=" alt="iconLocation">
                                        </td>
                                        <td class="p-1 border-r-1 border-gray-700 w-3/4">
                                            
                                            {{ $item['location'] ?? '-' }}
                                        </td>
                                        <td class="border-r-1 border-gray-400 transition-all duration-300 bg-[#50D890]">
                                            <form action="/location_unchecked" method="POST">
                                                <input type="text" name="id" value="{{ $item['id'] }}" id="" hidden>
                                                <input type="text" name="judul" value="{{ $judul }}" id="" hidden>
                                                <button type="submit" class="location_check_toggle p-1 h-full w-full flex justify-center cursor-pointer text-white text-center"><img class="block" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyNCIgaGVpZ2h0PSIyNCIgdmlld0JveD0iMCAwIDI0IDI0Ij48cGF0aCBmaWxsPSIjZmZmIiBkPSJNMjAgNi45MUwxNy4wOSA0TDEyIDkuMDlMNi45MSA0TDQgNi45MUw5LjA5IDEyTDQgMTcuMDlMNi45MSAyMEwxMiAxNC45MUwxNy4wOSAyMEwyMCAxNy4wOUwxNC45MSAxMnoiLz48L3N2Zz4=" alt=""></button>
                                            </form>
                                        </td>
                                        <td class="border-r-1 border-gray-400 hover:bg-[#ffdd78] transition-all duration-300 bg-[#FFC81E]">
                                            <button data="{{ $item['location'] }}" data-id="{{ $item['id'] }}" class="location_edit_toggle p-1 h-full w-full flex justify-center cursor-pointer text-white text-center">Edit</button>
                                        </td>
                                        <td class="border-r-1 border-gray-400 hover:bg-[#fa4444] transition-all duration-300 bg-[#DB1A1A]">
                                            <form action="/delete_location" method="POST">
                                                <input type="text" name="id" value="{{ $item['id'] }}" hidden>
                                                <input type="text" name="judul" value="{{ $judul }}" hidden>
                                                <button type="submit" class="location_delete_toggle p-1 h-full w-full flex justify-center cursor-pointer text-white text-center">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>    
                                </table>
                            @else
                                <table class="w-full transition-all duration-1000 border-1 border-gray-700 rounded-md shadow-md">
                                    <tr>
                                        <td class="p-1 border-r-1 border-gray-700 flex justify-center">
                                            <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyNCIgaGVpZ2h0PSIyNCIgdmlld0JveD0iMCAwIDI0IDI0Ij48cGF0aCBmaWxsPSIjZjAxMjEyIiBkPSJNMTAuMTE1IDIxLjgxMWMuNjA2LjUgMS4yMzguOTU3IDEuODg1IDEuNDAzYTI3IDI3IDAgMCAwIDEuODg1LTEuNDAzYTI4IDI4IDAgMCAwIDIuODUzLTIuNjk5QzE4Ljc4MiAxNi44NzcgMjEgMTMuNjM3IDIxIDEwYTkgOSAwIDEgMC0xOCAwYzAgMy42MzcgMi4yMTggNi44NzYgNC4yNjIgOS4xMTJhMjggMjggMCAwIDAgMi44NTMgMi43TTEyIDEzLjI1YTMuMjUgMy4yNSAwIDEgMSAwLTYuNWEzLjI1IDMuMjUgMCAwIDEgMCA2LjUiLz48L3N2Zz4=" alt="iconLocation">
                                        </td>
                                        <td class="p-1 border-r-1 border-gray-700 w-3/4">
                                            {{ $item['location'] ?? '-' }}
                                        </td>
                                        <td class="border-r-1 border-gray-400 hover:bg-[#87f0b8] transition-all duration-300 bg-[#50D890]">
                                            <form action="/location_checked" method="POST">
                                                <input type="text" name="id" value="{{ $item['id'] }}" id="" hidden>
                                                <input type="text" name="judul" value="{{ $judul }}" id="" hidden>
                                                <button type="submit" class="location_check_toggle p-1 h-full w-full flex justify-center cursor-pointer text-white text-center"><img class="block" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyNCIgaGVpZ2h0PSIyNCIgdmlld0JveD0iMCAwIDI0IDI0Ij48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxwYXRoIGQ9Im0xMi41OTMgMjMuMjU4bC0uMDExLjAwMmwtLjA3MS4wMzVsLS4wMi4wMDRsLS4wMTQtLjAwNGwtLjA3MS0uMDM1cS0uMDE2LS4wMDUtLjAyNC4wMDVsLS4wMDQuMDFsLS4wMTcuNDI4bC4wMDUuMDJsLjAxLjAxM2wuMTA0LjA3NGwuMDE1LjAwNGwuMDEyLS4wMDRsLjEwNC0uMDc0bC4wMTItLjAxNmwuMDA0LS4wMTdsLS4wMTctLjQyN3EtLjAwNC0uMDE2LS4wMTctLjAxOG0uMjY1LS4xMTNsLS4wMTMuMDAybC0uMTg1LjA5M2wtLjAxLjAxbC0uMDAzLjAxMWwuMDE4LjQzbC4wMDUuMDEybC4wMDguMDA3bC4yMDEuMDkzcS4wMTkuMDA1LjAyOS0uMDA4bC4wMDQtLjAxNGwtLjAzNC0uNjE0cS0uMDA1LS4wMTgtLjAyLS4wMjJtLS43MTUuMDAyYS4wMi4wMiAwIDAgMC0uMDI3LjAwNmwtLjAwNi4wMTRsLS4wMzQuNjE0cS4wMDEuMDE4LjAxNy4wMjRsLjAxNS0uMDAybC4yMDEtLjA5M2wuMDEtLjAwOGwuMDA0LS4wMTFsLjAxNy0uNDNsLS4wMDMtLjAxMmwtLjAxLS4wMXoiLz48cGF0aCBmaWxsPSIjZmZmIiBkPSJNMjEuNTQ2IDUuMTExYTEuNSAxLjUgMCAwIDEgMCAyLjEyMUwxMC4zMDMgMTguNDc1YTEuNiAxLjYgMCAwIDEtMi4yNjMgMEwyLjQ1NCAxMi44OWExLjUgMS41IDAgMSAxIDIuMTIxLTIuMTIxbDQuNTk2IDQuNTk2TDE5LjQyNCA1LjExMWExLjUgMS41IDAgMCAxIDIuMTIyIDAiLz48L2c+PC9zdmc+" alt=""></button>
                                            </form>
                                        </td>
                                        <td class="border-r-1 border-gray-400 hover:bg-[#ffdd78] transition-all duration-300 bg-[#FFC81E]">
                                            <button data="{{ $item['location'] }}" data-id="{{ $item['id'] }}" class="location_edit_toggle p-1 h-full w-full flex justify-center cursor-pointer text-white text-center">Edit</button>
                                        </td>
                                        <td class="border-r-1 border-gray-400 hover:bg-[#fa4444] transition-all duration-300 bg-[#DB1A1A]">
                                            <form action="/delete_location" method="POST">
                                                <input type="text" name="id" value="{{ $item['id'] }}" hidden>
                                                <input type="text" name="judul" value="{{ $judul }}" hidden>
                                                <button type="submit" class="location_delete_toggle p-1 h-full w-full flex justify-center cursor-pointer text-white text-center">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>    
                                </table>
                            @endif
                        </div>
                    @endforeach
                    @endif
            @endauth
        </section>
        <section class="block p-5 lg:p-0 lg:flex w-full border-x-1 justify-center border-gray-700 items-center">
            <div>
                {{-- Kalender --}}
                <div class="sm:w-full md:w-full lg:w-160 rounded-3xl border-1 border-gray-400">
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
                        <div id="dates" class="grid grid-cols-7 gap-1 pb-1">

                        </div>
                    </div>
                </div>
                {{-- Aktifitas per hari --}}
                <div>
                    <div class="pt-5 pb-4 border-b-1 flex justify-between items-end border-gray-700 mb-5" >
                        <p class="border-l-8 border-indigo-500 text-xl font-bold px-4">hari</p>
                        @auth
                            @if(count(Auth::user()->destinations) == 0 || !$judul)
                            @else
                                <?php 
                                    $tanggal_berangkat = Auth::user()->destinations[0]->tanggal;
                                    $berangkat = explode('-', Auth::user()->destinations[0]->tanggal);
                                    $lama_liburan = explode( ' ', Auth::user()->destinations[0]->lama_liburan);
                                    $hasil = $berangkat[0] . '-' .  $berangkat[1] . '-' . ($berangkat[2] + $lama_liburan[0]);
                                ?>
                                <p class="text_gray-700 text-sm">{{ $tanggal_berangkat . ' --- ' . $hasil }}</p>
                            @endif
                        @endauth
                        <button id="activity_toggle" class="bg-indigo-500 px-5 py-1 rounded-sm cursor-pointer"><img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxNiIgaGVpZ2h0PSIxNiIgdmlld0JveD0iMCAwIDE2IDE2Ij48cGF0aCBmaWxsPSIjZmZmIiBkPSJNOC43NSAzLjc1YS43NS43NSAwIDAgMC0xLjUgMHYzLjVoLTMuNWEuNzUuNzUgMCAwIDAgMCAxLjVoMy41djMuNWEuNzUuNzUgMCAwIDAgMS41IDB2LTMuNWgzLjVhLjc1Ljc1IDAgMCAwIDAtMS41aC0zLjV6Ii8+PC9zdmc+" alt=""></button>
                    </div>
                </div>
                @guest
                    <p class="text-center text-gray-700">Pilih lokasi untuk membuat aktifitas</p>
                @endguest
                @auth
                    @if(count(Auth::user()->destinations) == 0 || !$judul)
                        <p class="p-5 select-none text-gray-600 text-center">Pilih destinasi</p>
                    @else
                        <form action="/activities" method="POST" class="hidden border-1 border-gray-700 rounded-md p-2" id="form_activity">
                            <table class="w-full">
                                <tr>
                                    <td><label for="activity">Aktifitas</label></td>
                                    <td>:</td>
                                    <td>
                                        <input type="text" name="judul" value="{{ $judul }}" hidden>
                                        <input class="border-1 rounded-sm w-full" type="text" name="activity" required>
                                        <input type="text" name="destination_id" value="{{ Auth::user()->destinations[0]->id }}" hidden>
                                        <input type="date" name="tanggal" value="{{ $tanggal_berangkat }}" hidden>
                                        <input type="text" name="lama_liburan" value="{{ Auth::user()->destinations[0]->lama_liburan }}" hidden>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tanggal</td>
                                    <td>:</td>
                                    <td class="flex w-full justify-between"><input name="schedule" type="date" required><button type="submit" class="bg-indigo-500 px-5 py-1 rounded-sm hover:bg-indigo-400 hover:scale-102 transition-all duration-300 my-1 text-white">Tambahkan</button></td>
                                    <td></td>
                                </tr>
                            </table>
                        </form>
                        @foreach (Auth::user()->destinations[0]->Daily_activities as $activities)
                            <div class=" w-full my-2">
                                <table class="w-full shadow border-1 border-gray-700 rounded-md shadow">
                                    <tr>
                                        <td class="py-1 px-2 text-center border-r-1 border-gray-700">{{ $activities->tanggal }}</td>
                                        <td class="py-1 px-2 w-2/3 border-r-1 border-gray-700">{{ $activities->activities }}</td>
                                        <td class="border-r-1 border-gray-400 hover:bg-[#87f0b8] transition-all duration-300 bg-[#50D890]">
                                            <button class="p-2 px-2 w-full flex justify-center cursor-pointer text-white text-center"><img class="block" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyNCIgaGVpZ2h0PSIyNCIgdmlld0JveD0iMCAwIDI0IDI0Ij48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxwYXRoIGQ9Im0xMi41OTMgMjMuMjU4bC0uMDExLjAwMmwtLjA3MS4wMzVsLS4wMi4wMDRsLS4wMTQtLjAwNGwtLjA3MS0uMDM1cS0uMDE2LS4wMDUtLjAyNC4wMDVsLS4wMDQuMDFsLS4wMTcuNDI4bC4wMDUuMDJsLjAxLjAxM2wuMTA0LjA3NGwuMDE1LjAwNGwuMDEyLS4wMDRsLjEwNC0uMDc0bC4wMTItLjAxNmwuMDA0LS4wMTdsLS4wMTctLjQyN3EtLjAwNC0uMDE2LS4wMTctLjAxOG0uMjY1LS4xMTNsLS4wMTMuMDAybC0uMTg1LjA5M2wtLjAxLjAxbC0uMDAzLjAxMWwuMDE4LjQzbC4wMDUuMDEybC4wMDguMDA3bC4yMDEuMDkzcS4wMTkuMDA1LjAyOS0uMDA4bC4wMDQtLjAxNGwtLjAzNC0uNjE0cS0uMDA1LS4wMTgtLjAyLS4wMjJtLS43MTUuMDAyYS4wMi4wMiAwIDAgMC0uMDI3LjAwNmwtLjAwNi4wMTRsLS4wMzQuNjE0cS4wMDEuMDE4LjAxNy4wMjRsLjAxNS0uMDAybC4yMDEtLjA5M2wuMDEtLjAwOGwuMDA0LS4wMTFsLjAxNy0uNDNsLS4wMDMtLjAxMmwtLjAxLS4wMXoiLz48cGF0aCBmaWxsPSIjZmZmIiBkPSJNMjEuNTQ2IDUuMTExYTEuNSAxLjUgMCAwIDEgMCAyLjEyMUwxMC4zMDMgMTguNDc1YTEuNiAxLjYgMCAwIDEtMi4yNjMgMEwyLjQ1NCAxMi44OWExLjUgMS41IDAgMSAxIDIuMTIxLTIuMTIxbDQuNTk2IDQuNTk2TDE5LjQyNCA1LjExMWExLjUgMS41IDAgMCAxIDIuMTIyIDAiLz48L2c+PC9zdmc+" alt=""></button>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        @endforeach
                    @endif
                @endauth
            </div>
        </section>
    </div>

</x-Layout>