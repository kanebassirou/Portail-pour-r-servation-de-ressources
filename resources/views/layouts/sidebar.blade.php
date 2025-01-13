<div x-data="{ isOpen: true }" class="relative min-h-screen md:flex">
    <!-- "Burger" icon button -->
    <button @click="isOpen = !isOpen" class="text-white absolute p-4a z-30">
        <i :class="isOpen ? 'fas fa-times' : 'fas fa-bars'"></i>
    </button>
    <!-- Sidebar -->
    <div :class="isOpen ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'"
        class="sidebar bg-gray-800 text-gray-100 w-64 space-y-6 py-7 px-2 absolute inset-y-0 left-0 transform transition duration-300 md:relative">
        <!-- Logo or brand -->
        {{-- <a href="#" class="text-white flex items-center space-x-2 px-4 mt-5">
            <i class="fas fa-user-cog"></i>
            <span class="text-lg font-bold">{{ auth()->user()->hasRole('admin') ? 'Admin' : 'User' }}</span>
        </a> --}}
        <div class="mt-auto flex items-center px-4 mb-4 mt-6">
            <img src="https://gravatar.com/avatar/4474ca42d303761c2901fa819c4f2547" alt="user avatar"
                class="h-10 w-10 rounded-full">
            <div class="ml-3">
                <p class="text-sm font-semibold mt-6">{{ auth()->user()->name }}</p>
                <p class="text-xs text-gray-400">{{ auth()->user()->hasRole('admin') ? 'admin' : 'user' }}</p>
            </div>
        </div>

        <!-- Navigation Links -->
        <nav class="mt-6">
            <a href="{{ auth()->user()->hasRole('admin') ? route('admin.dashboard') : route('dashboard') }}"
                class="block py-3 px-4 rounded transition duration-200 hover:bg-gray-700 my-2">Dashboard</a>
            @if (auth()->user()->hasRole('admin'))
                <a href="{{ route('profile.show') }}"
                    class="block py-3 px-4 rounded transition duration-200 hover:bg-gray-700 my-2">Gérer  Profile</a>
                <a href="{{ route('admin.users.index') }}" class="block py-3 px-4 rounded transition duration-200 hover:bg-gray-700 my-2">Gérer
                    les Utilisateurs</a>
                <a href="{{ route('admin.ressources') }}"
                    class="block py-3 px-4 rounded transition duration-200 hover:bg-gray-700 my-2">Gérer Ressources</a>
                <a href="{{ route('admin.reservationRessource') }}"
                    class="block py-3 px-4 rounded transition duration-200 hover:bg-gray-700 my-2">Gérer les reservations</a>
            @else
                <a href="#"
                    class="block py-3 px-4 rounded transition duration-200 hover:bg-gray-700 my-2">Profile</a>
                <a href="#" class="block py-3 px-4 rounded transition duration-200 hover:bg-gray-700 my-2">Vos
                    Reservation</a>
                <a href="#"
                    class="block py-3 px-4 rounded transition duration-200 hover:bg-gray-700 my-2">Messages</a>
                <a href="#"
                    class="block py-3 px-4 rounded transition duration-200 hover:bg-gray-700 my-2">Notification</a>
            @endif
        </nav>

        <!-- Footer with user info -->

    </div>

    <!-- Content area -->
    <div class="flex-1 p-10 text-2xl font-bold">

    </div>
</div>
