<footer class="bg-[#004f00] text-white {{ $class ?? '' }}">
    <div class="max-w-7xl mx-auto px-4 md:px-6 py-12">
        <div class="flex justify-between">

            {{-- Company Info --}}
            <div class="space-y-4">
                <div class="font-bold pb-3">Kontak Kami</div>




                {{-- Social Media --}}
                {{-- Social Media --}}
                <div class="flex flex-col space-y-4">
                    {{-- Instagram --}}

                    <a href="https://www.instagram.com/" target="_blank"
                        class="text-gray-200 hover:text-sky-400 transition flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                            <path
                                d="M7 2C4.243 2 2 4.243 2 7v10c0 2.757 2.243 5 5 5h10c2.757 0 5-2.243 5-5V7c0-2.757-2.243-5-5-5H7zm10 2a3 3 0 013 3v10a3 3 0 01-3 3H7a3 3 0 01-3-3V7a3 3 0 013-3h10zm-5 3a5 5 0 100 10 5 5 0 000-10zm0 2a3 3 0 110 6 3 3 0 010-6zm4.5-.75a.75.75 0 110 1.5.75.75 0 010-1.5z" />
                        </svg>
                        <span>@bibitpohonsokaraja</span>
                    </a>

                    <a href="https://wa.me/6281234567890" target="_blank"
                        class="text-gray-200 hover:text-green-400 transition flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                            <path
                                d="M12.04 2C6.51 2 2 6.23 2 11.44c0 2.01.66 3.87 1.79 5.39L2 22l5.39-1.77a10.4 10.4 0 004.65 1.08c5.53 0 10.04-4.23 10.04-9.44C22.08 6.23 17.57 2 12.04 2zm0 17.3a8.33 8.33 0 01-4.26-1.16l-.31-.18-3.2 1.05 1.07-3.06-.2-.32a8.02 8.02 0 01-1.26-4.18c0-4.43 3.79-8.03 8.16-8.03s8.16 3.6 8.16 8.03-3.79 8.03-8.16 8.03zm4.45-5.55c-.24-.12-1.43-.7-1.65-.78-.22-.08-.38-.12-.54.12-.16.24-.62.78-.76.94-.14.16-.28.18-.52.06-.24-.12-1.02-.38-1.94-1.2-.72-.64-1.21-1.43-1.35-1.67-.14-.24-.02-.37.1-.49.1-.1.24-.26.36-.39.12-.13.16-.22.24-.36.08-.14.04-.26-.02-.38-.06-.12-.54-1.3-.74-1.78-.2-.48-.4-.42-.54-.42h-.46c-.16 0-.42.06-.64.3-.22.24-.84.82-.84 2s.86 2.32.98 2.48c.12.16 1.7 2.6 4.12 3.64.58.25 1.03.4 1.38.51.58.18 1.1.15 1.52.09.46-.07 1.43-.58 1.63-1.14.2-.56.2-1.04.14-1.14-.06-.1-.22-.16-.46-.28z" />
                        </svg>
                        <span>+6282251611550</span>
                    </a>
                </div>


            </div>

            {{-- Contact --}}
            <div class="space-y-4">
                <h3 class="font-semibold text-lg pb-3">Menu</h3>

                <div class="flex flex-col space-y-4">
                    {{-- Instagram --}}

                    <a href="/" target="_blank"
                        class="text-gray-200 hover:text-green-400 transition flex items-center gap-2">

                        <span>Beranda</span>
                    </a>


                    <a href="/menu" target="_blank"
                        class="text-gray-200 hover:text-green-400 transition flex items-center gap-2">

                        <span>Bibit Unggul</span>
                    </a>


                    <a href="/tentang" target="_blank"
                        class="text-gray-200 hover:text-green-400 transition flex items-center gap-2">

                        <span>Tentang</span>
                    </a>
                </div>
            </div>

            <div class="space-y-4">
                <h3 class="font-semibold text-lg pb-3">Alamat</h3>

                <div class="flex flex-col space-y-4">
                    <p class="text-gray-200">
                        Dusun I, Petir, Kec. Kalibagor, Kabupaten Banyumas, Jawa Tengah
                    </p>
                    <div class="w-full h-56 rounded-lg overflow-hidden border border-white/20">
                        <iframe class="w-full h-full" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                            src="https://www.google.com/maps?q=Dusun%20I%20Petir%20Kalibagor%20Banyumas&output=embed">
                        </iframe>
                    </div>
                </div>

            </div>


        </div>

        {{-- Copyright --}}
        <div class="border-t border-white  mt-12 pt-8">
            <div class="flex flex-col md:flex-row text-center justify-center">
                <p class="text-gray-200 text-sm text-center">
                  Bibit Pohon Unggul © 2022.All rights reserved.
                </p>
            </div>
        </div>
    </div>
</footer>
