<x-Layout>

    <section>
        <div></div>
        <div>
            <div class="border-1 border-gray-400 p-4 rounded-md m-2 md:m-5 block md:flex">
                <div class="w-full md:w-140 rounded-md  bg-[#1A05A2] aspect-[4/2]"></div>
                <div class="m-0 md:mx-10 w-full">
                    <div class="flex justify-between">
                        <h3 class="text-2xl font-bold my-3">Judul liburan</h3>
                        <button class="cursor-pointer"><img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxNiIgaGVpZ2h0PSIxNiIgdmlld0JveD0iMCAwIDE2IDE2Ij48cGF0aCBmaWxsPSIjMDAwIiBkPSJNOS41IDEzYTEuNSAxLjUgMCAxIDEtMyAwYTEuNSAxLjUgMCAwIDEgMyAwbTAtNWExLjUgMS41IDAgMSAxLTMgMGExLjUgMS41IDAgMCAxIDMgMG0wLTVhMS41IDEuNSAwIDEgMS0zIDBhMS41IDEuNSAwIDAgMSAzIDAiLz48L3N2Zz4=" alt=""></button>
                    </div>
                    <p>Berangat: kamis-11-04-2026</p>
                    <p>Budged: Rp. 20.000.000</p>
                    <p>Lama liburan: 30 hari</p>
                    <div class="block md:flex justify-between py-10">
                        <a href="/rencana_liburan" class=" p-2 px-4 cursor-pointer rounded-sm bg-gray-900 hover:-translate-y-1 duration-300 hover:bg-gray-700 transition-all  shadow-md text-white ">Buat rencana</a>
                        <div class="my-4 md:my-0">
                            <p class="flex bg-[#DB1A1A] rounded-sm p-2 max-w-43 justify-around text-white font-medium">Belum tercapai <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyNCIgaGVpZ2h0PSIyNCIgdmlld0JveD0iMCAwIDI0IDI0Ij48cGF0aCBmaWxsPSIjZmZmIiBkPSJNMjAgNi45MUwxNy4wOSA0TDEyIDkuMDlMNi45MSA0TDQgNi45MUw5LjA5IDEyTDQgMTcuMDlMNi45MSAyMEwxMiAxNC45MUwxNy4wOSAyMEwyMCAxNy4wOUwxNC45MSAxMnoiLz48L3N2Zz4=" alt=""></p>
                            {{-- <p class="flex bg-[#F8DE22] rounded-sm p-2 w-48 justify-around text-white font-medium">Sedang berlangsung <img class="w-5" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI0NDgiIGhlaWdodD0iNTEyIiB2aWV3Qm94PSIwIDAgNDQ4IDUxMiI+PHBhdGggZmlsbD0iI2ZmZiIgZD0iTTMyMCA0OGE0OCA0OCAwIDEgMC05NiAwYTQ4IDQ4IDAgMSAwIDk2IDBNMTI1LjcgMTc1LjVjOS45LTkuOSAyMy40LTE1LjUgMzcuNS0xNS41YzEuOSAwIDMuOC4xIDUuNi4zTDEzNy42IDI1NGMtOS4zIDI4IDEuNyA1OC44IDI2LjggNzQuNWw4Ni4yIDUzLjlsLTI1LjQgODguOGMtNC45IDE3IDUgMzQuNyAyMiAzOS42czM0LjctNSAzOS42LTIybDI4LjctMTAwLjRjNS45LTIwLjYtMi42LTQyLjYtMjAuNy01My45TDIzOCAyOTlsMzAuOS04Mi40bDUuMSAxMi4zYzE1IDM1LjggNDkuOSA1OS4xIDg4LjcgNTkuMUgzODRjMTcuNyAwIDMyLTE0LjMgMzItMzJzLTE0LjMtMzItMzItMzJoLTIxLjNjLTEyLjkgMC0yNC42LTcuOC0yOS41LTE5LjdsLTYuMy0xNWMtMTQuNi0zNS4xLTQ0LjEtNjEuOS04MC41LTczLjFsLTQ4LjctMTVDMTg2LjYgOTcuOCAxNzUgOTYgMTYzLjMgOTZjLTMxIDAtNjAuOCAxMi4zLTgyLjcgMzQuM2wtMjMuMiAyMy4xYy0xMi41IDEyLjUtMTIuNSAzMi44IDAgNDUuM3MzMi44IDEyLjUgNDUuMyAwbDIzLjEtMjMuMXpNOTEuMiAzNTJIMzJjLTE3LjcgMC0zMiAxNC4zLTMyIDMyczE0LjMgMzIgMzIgMzJoNjkuNmMxOSAwIDM2LjItMTEuMiA0My45LTI4LjVsMTEuNS0yNS45bC05LjUtNmE5NS40IDk1LjQgMCAwIDEtMzcuOS00NC45eiIvPjwvc3ZnPg==" alt=""></p>
                            <p class="flex bg-[#78C841] rounded-sm p-2 w-25 justify-around text-white font-medium">Tercapai<img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyNCIgaGVpZ2h0PSIyNCIgdmlld0JveD0iMCAwIDI0IDI0Ij48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxwYXRoIGQ9Im0xMi41OTMgMjMuMjU4bC0uMDExLjAwMmwtLjA3MS4wMzVsLS4wMi4wMDRsLS4wMTQtLjAwNGwtLjA3MS0uMDM1cS0uMDE2LS4wMDUtLjAyNC4wMDVsLS4wMDQuMDFsLS4wMTcuNDI4bC4wMDUuMDJsLjAxLjAxM2wuMTA0LjA3NGwuMDE1LjAwNGwuMDEyLS4wMDRsLjEwNC0uMDc0bC4wMTItLjAxNmwuMDA0LS4wMTdsLS4wMTctLjQyN3EtLjAwNC0uMDE2LS4wMTctLjAxOG0uMjY1LS4xMTNsLS4wMTMuMDAybC0uMTg1LjA5M2wtLjAxLjAxbC0uMDAzLjAxMWwuMDE4LjQzbC4wMDUuMDEybC4wMDguMDA3bC4yMDEuMDkzcS4wMTkuMDA1LjAyOS0uMDA4bC4wMDQtLjAxNGwtLjAzNC0uNjE0cS0uMDA1LS4wMTgtLjAyLS4wMjJtLS43MTUuMDAyYS4wMi4wMiAwIDAgMC0uMDI3LjAwNmwtLjAwNi4wMTRsLS4wMzQuNjE0cS4wMDEuMDE4LjAxNy4wMjRsLjAxNS0uMDAybC4yMDEtLjA5M2wuMDEtLjAwOGwuMDA0LS4wMTFsLjAxNy0uNDNsLS4wMDMtLjAxMmwtLjAxLS4wMXoiLz48cGF0aCBmaWxsPSIjZmZmIiBkPSJNMjEuNTQ2IDUuMTExYTEuNSAxLjUgMCAwIDEgMCAyLjEyMUwxMC4zMDMgMTguNDc1YTEuNiAxLjYgMCAwIDEtMi4yNjMgMEwyLjQ1NCAxMi44OWExLjUgMS41IDAgMSAxIDIuMTIxLTIuMTIxbDQuNTk2IDQuNTk2TDE5LjQyNCA1LjExMWExLjUgMS41IDAgMCAxIDIuMTIyIDAiLz48L2c+PC9zdmc+" alt=""></p> --}}
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-Layout>