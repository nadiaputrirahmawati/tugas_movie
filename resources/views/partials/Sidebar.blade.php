<div id="sidebar"
    class="bg-white shadow-md fixed mb-28 lg:relative h-screen z-50 transition-all duration-300 w-64 text-sky-900 font-semibold lg:block hidden">
    <div class="flex flex-col h-full">
        <!-- Sidebar Header -->
        <div class="px-7 py-7 flex items-center justify-center">
            <img src="{{ asset('image/logo2.png') }}" alt="" class="w-7/12 sidebar-text" onclick="toggleSidebar()">
        </div>
        <a  href="/movie/dashboard">
            <img src="{{ asset('image/logo3.png') }}" alt="" class="img hidden">
        </a>

        <!-- Sidebar Menu -->
        <ul class="menu flex-1 px-4 space-y-2">
            <li class="{{ request()->is('movie/dashboard') ? 'bg-gray-400 text-white rounded-md' : '' }}">
                <a class="flex items-center gap-3" href="/movie/dashboard">
                    <i class="fa-solid fa-house text-2xl"></i>
                    <span class="sidebar-text text-xl">Home</span>
                </a>
            </li>
            <li class="{{ request()->is('movie') ? 'bg-gray-400 text-white rounded-md' : '' }}">
                <a class="flex items-center gap-3" href="/movie">
                    <i class="fa-solid fa-film text-2xl"></i>
                    <span class="sidebar-text text-xl">Movies</span>
                </a>
            </li>
            <li class="{{ request()->is('genre') ? 'bg-gray-400 text-white rounded-md' : '' }}">
                <a class="flex items-center gap-3" href="/genre">
                    <i class="fa-solid fa-video text-2xl"></i>
                    <span class="sidebar-text text-xl">Genre</span>
                </a>
            </li>
        </ul>

    </div>
</div>
{{-- <div class=""> --}}
<nav class="fixed bottom-0 inset-x-0 bg-slate-100 z-50  px-3 rounded-se-3xl rounded-tl-3xl lg:hidden md:hidden">
    <div class="container mx-auto px-4 flex justify-between items-center py-3">
        <!-- Home -->
        <a href="/admin/dashboard" class="flex flex-col items-center text-sky-900">
            <i class="fa-solid fa-house text-2xl"></i>
            <span class="text-sm">Home</span>
        </a>
        <a href="/movie" class="flex flex-col items-center text-sky-900">
            <i class="fa-solid fa-film text-2xl"></i>
            <span class="text-sm">Movies</span>
        </a>
        <a href="/genre" class="flex flex-col items-center text-sky-900">
            <i class="fa-solid fa-video text-2xl"></i>
            <span class="text-sm">Genre</span>
        </a>
        <a href="/user" class="flex flex-col items-center text-sky-900">
            <i class="fa-solid fa-user text-2xl"></i>
            <span class="text-sm">User</span>
        </a>
    </div>
</nav>
{{-- </div> --}}
