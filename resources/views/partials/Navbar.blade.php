<nav class="shadow-lg sticky lg:top-4 z-50 bg-slate-300 lg:rounded-full lg:mb-10 lg:mr-10 lg:ml-10">
    <div class="container mx-auto px-2 flex justify-between items-center py-2">
        <!-- Logo dan Judul -->
        <div class="flex items-center text-sky-900">
            <img src="{{ asset('image/logo4.png') }}" alt="Logo" class="h-14 rounded-full">
            <a href="{{ url('/') }}" class="text-xl font-bold hidden md:flex px-1">Movlist</a>
            <div id="menu" class="hidden md:flex text-sky-950 text-lg font-bold space-x-4 pl-12">
                <a href="{{ url('/') }}"
                    class="py-2 px-5  font-medium {{ request()->is('/') ? 'border-b-2 bg-sky-800 rounded-full text-white shadow-lg' : 'hover:border-b-2 hover:border-sky-500 hover:rounded-full' }}">
                    Home
                </a>
                <a href="{{ url('/movie/all') }}"
                    class="py-2 px-6 font-medium {{ request()->is('movie/all') ? 'order-b-2 bg-sky-800 rounded-full text-white shadow-lg' : 'hover:border-b-2 hover:border-sky-500 hover:rounded-full' }}">
                    Movie
                </a>
                <a href="{{ url('/movie/news') }}"
                    class="py-2 px-5 font-medium {{ request()->is('movie/news') ? 'order-b-2 bg-sky-800 rounded-full text-white shadow-lg' : 'hover:border-b-2 hover:border-sky-500 hover:rounded-full' }}">
                    News
                </a>
            </div>
        </div>
        <!-- Menu Navigasi -->
        <div class="lg:space-x-3 space-x-5 flex mt-2">
            <form action="{{ url('movie/all')}}" method="GET">
                <div class="flex justify-center">
                    <div class="relative w-full" id="input">
                        <input placeholder="Search..." name="search"
                            class="block w-full text-sm h-11 px-4 text-slate-900 bg-white rounded-full border-2 border-slate-400 appearance-none focus:border-transparent focus:outline focus:outline-2 focus:outline-secondaryy focus:ring-0 hover:border-brand-500-secondary- peer invalid:border-error-500 invalid:focus:border-error-500 overflow-ellipsis overflow-hidden text-nowrap pr-[48px]"
                            id="floating_outlined" type="text" value="{{ $search ?? '' }}" />
                        <div class="absolute top-2 right-4">
                            <button type="submit">
                                <i class="fa-solid fa-magnifying-glass text-2xl"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
            <button id="menu-toggle" class="ml-3 text-sky-900 text-2xl lg:hidden px-2">
                <i class="fa-solid fa-bars"></i>
            </button>
            <div class="hidden md:flex">
                <a href="/login"
                    class="bg-sky-900 pt-3 px-4 text-center text-md h-11 text-white shadow-xl rounded-full font-semibold">
                    <i class="fa-solid fa-user"></i>
                </a>
            </div>
        </div>
    </div>
    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden bg-slate-300 absolute top-full w-full left-0 py-4">
        <a href="{{ url('/') }}" class="block py-2 px-4 hover:bg-slate-400 {{ request()->is('/') ? 'bg-slate-400' : '' }}">Home</a>
        <a href="{{ url('/movie/all') }}" class="block py-2 px-4 hover:bg-slate-400 {{ request()->is('movie/all') ? 'bg-slate-400' : '' }}">Movie</a>
        <a href="{{ url('/movie/news') }}" class="block py-2 px-4 hover:bg-slate-400 {{ request()->is('movie/news') ? 'bg-slate-400' : '' }}">News</a>
    </div>
</nav>

<script>
    const menuToggle = document.getElementById('menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');

    menuToggle.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });
</script>
