<x-Layout>

    @guest
        <section class="border-1 border-gray-700 w-full p-4 rounded-xl">
            <h1 class="text-bold text-2xl border-l-10 px-2 border-indigo-700">Buat destinasi anda disini</h1>
            <div class="py-2 flex justify-around">
                <div class="border rounded-md">
                    <img class="w-90 rounded-t-md aspect-[5/3]" src="https://i.pinimg.com/1200x/20/02/e8/2002e85a60a1962e359b57a1666af7ff.jpg" alt="Russia">
                    <h3 class="p-2 text-bold text-xl">Russia</h3>
                    <p class="p-2 ">Suasana negara eropa</p>
                </div>
                <div class="border rounded-md">
                    <img class="w-90 rounded-t-md aspect-[5/3]" src="https://i.pinimg.com/1200x/91/63/aa/9163aaba4d8a24710d8e521bb2e8bd53.jpg" alt="Dubai">
                    <h3 class="text-bold text-xl p-2">Dubai</h3>
                    <p class="p-2 ">Keindahan timur tengah</p>
                </div>
                <div class="border rounded-md">
                    <img class="w-90 rounded-t-md aspect-[5/3]" src="https://i.pinimg.com/1200x/1f/7a/36/1f7a36ee1580c0fc154ba480a16d5ec1.jpg" alt="Singapura">
                    <h3 class="text-bold text-xl p-2">Singapura</h3>
                    <p class="p-2 ">Tempat wisata yang menakjubkan</p>
                </div>
            </div>
        </section>
    @endguest
    @auth
        <section class="border-1 border-gray-700 w-full p-4 rounded-xl shadow-md">
            <div id="add_form_destination">
                <h1 class="text-bold text-2xl border-l-10 px-2 border-indigo-700">Buat destinasi baru</h1>
                <form action="/destination" method="POST" class="border-t-1 border-gray-700 p-3 mt-5" enctype="multipart/form-data">
                    <table class="w-full">
                        <tr>
                            <td class="w-1/8">
                                <label for="judul">Judul</label>
                            </td>
                            <td class="px-5">
                                :
                            </td>
                            <td class="w-full">
                                <input type="text" class="border-1 my-2 w-full border-gray-500 shadow rounded-md" id="judul" name="judul" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="tanggal">Tanggal keberangkatan</label>
                            </td>
                            <td class="px-5">
                                :
                            </td>
                            <td>
                                <input type="date" id="tanggal" class="my-2 border-1 w-full border-gray-500 shadow rounded-md" id="judul" name="tanggal" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="budget">Budget yang dibutuhkan</label>
                            </td>
                            <td class="px-5">
                                :
                            </td>
                            <td>
                                <input type="number" placeholder="Rupiah" id="budget" name="budget" class="border-1 my-2 w-full border-gray-500 shadow rounded-md" id="judul" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="lama_liburan">Lama liburan</label>
                            </td>
                            <td class="px-5">
                                :
                            </td>
                            <td>
                                <input placeholder="Hari" type="number" id="lama_liburan" name="lama_liburan" class="border-1 my-2 w-full border-gray-500 shadow rounded-md" id="judul" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="image">Foto</label>
                            </td>
                            <td class="px-5">
                                :
                            </td>
                            <td>
                                <input type="file" name="image" id="image" accept="image/*" required>
                                <img id="preview" alt="">
                            </td>
                        </tr>
                    </table>
                    <button type="submit" class="w-full bg-indigo-500 rounded-sm cursor-pointer mt-5 text-white hover:scale-101 transition-all duration-300 hover:bg-indigo-400">Submit</button>
                </form>
            </div>
            <div id="edit_form_destination" class="hidden">
                <h1 class="text-bold text-2xl border-l-10 px-2 border-yellow-200">Edit destinasi</h1>
                <form action="/edit_destination" method="POST" class="border-t-1 border-gray-700 p-3 mt-5" enctype="multipart/form-data">
                    <table class="w-full">
                        <tr>
                            <td class="w-1/8">
                                <label for="judul">Judul</label>
                            </td>
                            <td class="px-5">
                                :
                            </td>
                            <td class="w-full">
                                <input type="text" name="edit_id" hidden>
                                <input type="text" name="edit_user_id" hidden>
                                <input type="text" class="border-1 my-2 w-full border-gray-500 shadow rounded-md" id="judul" name="edit_judul" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="tanggal">Tanggal keberangkatan</label>
                            </td>
                            <td class="px-5">
                                :
                            </td>
                            <td>
                                <input type="date" id="tanggal" class="my-2 border-1 w-full border-gray-500 shadow rounded-md" id="judul" name="edit_tanggal" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="budget">Budget yang dibutuhkan</label>
                            </td>
                            <td class="px-5">
                                :
                            </td>
                            <td>
                                <input type="number" placeholder="Rupiah" id="budget" name="edit_budget" class="border-1 my-2 w-full border-gray-500 shadow rounded-md" id="judul" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="lama_liburan">Lama liburan</label>
                            </td>
                            <td class="px-5">
                                :
                            </td>
                            <td>
                                <input placeholder="Hari" type="number" id="lama_liburan" name="edit_lama_liburan" class="border-1 my-2 w-full border-gray-500 shadow rounded-md" id="judul" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="image">Foto</label>
                            </td>
                            <td class="px-5">
                                :
                            </td>
                            <td>
                                <input type="file" name="edit_image" id="image" accept="image/*" required>
                                <img id="preview" alt="">
                            </td>
                        </tr>
                    </table>
                    <button type="submit" class="w-full bg-indigo-500 rounded-sm cursor-pointer mt-5 text-white hover:scale-101 transition-all duration-300 hover:bg-indigo-400">Submit</button>
                </form>
            </div>
        </section>
    @endauth
    
    <section class="py-4 md:p-4 ">
        <div class="text-bold border-b-1 border-gray-700 text-2xl mb-5">Daftar Destinasi</div>
        @guest
            <p class="text-gray-700 text-center">Anda belum membuat destinasi</p>
        @endguest
        @auth
        <div>
            @if (count($user->destinations) == 0)
                <p class="text-gray-700 text-center">Anda belum membuat destinasi</p>
            @endif

            @foreach ($user->destinations as $item)

            <div class="border-1 border-gray-400 rounded-md m-2 md:m-5 block md:flex">
                <img src="{{ asset('storage/' . $item->image) }}" class="w-full md:w-80 lg:w-140 rounded-l-md  bg-[#1A05A2] block aspect-[4/2]">
                <div class="p-2 md:mx-10 w-full">
                    <div class="flex justify-between py-3">
                        <h3 class="text-2xl font-bold">{{ $item['judul'] }}</h3>
                        <div class="relative">
                            <div class="destination_dropdown hidden absolute -translate-x-25 border p-2 rounded-md borde-gray-700 shadow">
                                <button class="cursor-pointer px-5 py-2 my-1 w-20 bg-[#FFC81E] rounded-md text-white edit_destination_toggle" data="{{ $item }}">Edit</button>
                                <form action="/delete_destination" method="POST">
                                    <input type="text" name="id" value="{{ $item['id'] }}" hidden>
                                    <button type="submit" class="delete_destination cursor-pointer px-5 py-2 my-1 w-20 bg-[#DB1A1A] text-white rounded-md">delete</button>
                                </form>
                            </div>
                            <button class="destination_dropdown_toggle cursor-pointer"><img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxNiIgaGVpZ2h0PSIxNiIgdmlld0JveD0iMCAwIDE2IDE2Ij48cGF0aCBmaWxsPSIjMDAwIiBkPSJNOS41IDEzYTEuNSAxLjUgMCAxIDEtMyAwYTEuNSAxLjUgMCAwIDEgMyAwbTAtNWExLjUgMS41IDAgMSAxLTMgMGExLjUgMS41IDAgMCAxIDMgMG0wLTVhMS41IDEuNSAwIDEgMS0zIDBhMS41IDEuNSAwIDAgMSAzIDAiLz48L3N2Zz4=" alt=""></button>
                        </div>
                    </div>
                    <table>
                        <tr>
                            <td>Berangkat</td>
                            <td class="px-2">:</td>
                            <td>{{ $item['tanggal'] }}</td>
                        </tr>
                        <tr>
                            <td>Budget</td>
                            <td class="px-2">:</td>
                            <td>{{'Rp ' . number_format( $item['budget'], 0, ',','.') }}</td>
                        </tr>
                        <tr>
                            <td>Lama liburan</td>
                            <td class="px-2">:</td>
                            <td>{{ $item['lama_liburan'] . ' Hari' }}</td>
                        </tr>
                    </table>
                    <div class="block md:flex justify-between pt-10">
                        <a href="/rencana_liburan?judul={{ $item['judul'] }}" class=" p-2 px-4 cursor-pointer rounded-sm bg-gray-900 hover:-translate-y-1 duration-300 hover:bg-gray-700 transition-all  shadow-md text-white ">Lihat rencana</a>
                        <div class="mt-4 md:my-0">

                            @if (!$item['status'])
                            
                            <p class="flex bg-[#DB1A1A] rounded-sm p-2 max-w-43 justify-around text-white font-medium">Belum tercapai <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyNCIgaGVpZ2h0PSIyNCIgdmlld0JveD0iMCAwIDI0IDI0Ij48cGF0aCBmaWxsPSIjZmZmIiBkPSJNMjAgNi45MUwxNy4wOSA0TDEyIDkuMDlMNi45MSA0TDQgNi45MUw5LjA5IDEyTDQgMTcuMDlMNi45MSAyMEwxMiAxNC45MUwxNy4wOSAyMEwyMCAxNy4wOUwxNC45MSAxMnoiLz48L3N2Zz4=" alt=""></p>

                            @else

                            <p class="flex bg-[#78C841] rounded-sm p-2 w-25 justify-around text-white font-medium">Tercapai<img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyNCIgaGVpZ2h0PSIyNCIgdmlld0JveD0iMCAwIDI0IDI0Ij48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxwYXRoIGQ9Im0xMi41OTMgMjMuMjU4bC0uMDExLjAwMmwtLjA3MS4wMzVsLS4wMi4wMDRsLS4wMTQtLjAwNGwtLjA3MS0uMDM1cS0uMDE2LS4wMDUtLjAyNC4wMDVsLS4wMDQuMDFsLS4wMTcuNDI4bC4wMDUuMDJsLjAxLjAxM2wuMTA0LjA3NGwuMDE1LjAwNGwuMDEyLS4wMDRsLjEwNC0uMDc0bC4wMTItLjAxNmwuMDA0LS4wMTdsLS4wMTctLjQyN3EtLjAwNC0uMDE2LS4wMTctLjAxOG0uMjY1LS4xMTNsLS4wMTMuMDAybC0uMTg1LjA5M2wtLjAxLjAxbC0uMDAzLjAxMWwuMDE4LjQzbC4wMDUuMDEybC4wMDguMDA3bC4yMDEuMDkzcS4wMTkuMDA1LjAyOS0uMDA4bC4wMDQtLjAxNGwtLjAzNC0uNjE0cS0uMDA1LS4wMTgtLjAyLS4wMjJtLS43MTUuMDAyYS4wMi4wMiAwIDAgMC0uMDI3LjAwNmwtLjAwNi4wMTRsLS4wMzQuNjE0cS4wMDEuMDE4LjAxNy4wMjRsLjAxNS0uMDAybC4yMDEtLjA5M2wuMDEtLjAwOGwuMDA0LS4wMTFsLjAxNy0uNDNsLS4wMDMtLjAxMmwtLjAxLS4wMXoiLz48cGF0aCBmaWxsPSIjZmZmIiBkPSJNMjEuNTQ2IDUuMTExYTEuNSAxLjUgMCAwIDEgMCAyLjEyMUwxMC4zMDMgMTguNDc1YTEuNiAxLjYgMCAwIDEtMi4yNjMgMEwyLjQ1NCAxMi44OWExLjUgMS41IDAgMSAxIDIuMTIxLTIuMTIxbDQuNTk2IDQuNTk2TDE5LjQyNCA1LjExMWExLjUgMS41IDAgMCAxIDIuMTIyIDAiLz48L2c+PC9zdmc+" alt=""></p>

                            @endif

                        </div> 
                    </div>
                </div>
            </div>
            @endforeach

        </div>
        @endauth
    </section>

</x-Layout>