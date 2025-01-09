    <!-- Footer -->
    <footer class="bg-sky-950 text-white py-6">
        <div class="container mx-auto px-4">
            <!-- Baris atas dengan logo dan menu -->
            <div class="flex flex-col md:flex-row justify-between items-center">
                <!-- Logo -->
                <div class="flex items-center space-x-4">
                    <img src="{{ asset('image/logo6.png') }}" alt="Logo" class="h-20">
                    <span class="text-xl font-bold text-slate-100">MOV<span class="text-white">List</span></span>
                </div>

                <!-- Menu Navigasi -->
                <ul class="flex space-x-8 mt-4 md:mt-0">
                    <li><a href="{{ url('/') }}" class="text-sm hover:underline">HOME</a></li>
                    <li><a href="{{ url('/movie/all') }}" class="text-sm hover:underline">MOVIE</a></li>
                    <li><a href="{{ url('/movie/news') }}" class="text-sm hover:underline">NEWS</a></li>
                </ul>

                <!-- Tombol Show More -->
                <a href="movie/all" class="bg-blue-300 hover:bg-sky-900 hover:text-white text-sky-950 py-2 px-4 shadow-lg rounded-full mt-4 md:mt-0">
                    Show more
                </a>
            </div>

            <!-- Baris bawah dengan ikon media sosial -->
            <div class="mt-6 flex justify-center space-x-6">
                <a href="#" class="text-lg hover:text-blue-300"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="text-lg hover:text-blue-300"><i class="fab fa-twitter"></i></a>
                <a href="#" class="text-lg hover:text-blue-300"><i class="fab fa-instagram"></i></a>
            </div>

            <!-- Garis pemisah dan teks hak cipta -->
            <div class="mt-6 border-t border-gray-700 pt-4 text-center text-sm">
                &copy; {{ date('Y') }} Movlist. All Rights Reserved.
            </div>
        </div>
    </footer>