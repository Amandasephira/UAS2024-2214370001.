<nav class="bg-blue-500 p-4">
    <div class="flex items-center justify-between">

        <a href="{{ route('dashboard') }}" class="text-white focus:outline-none">
            <img src="/storage/images/logo.jpg" alt="logo" class="w-12 h-12">
        </a>
        
        <div class="flex items-center space-x-4">
            <a href="{{ route('profile.show') }}" class="text-white focus:outline-none">
                Profil
            </a>
            <a href="{{ route('logout') }}" class="text-white focus:outline-none">
                Logout
            </a>
        </div>
    </div>
</nav>