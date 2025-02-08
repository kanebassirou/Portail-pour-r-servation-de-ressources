<div x-data="{ isOpen: true }" class="relative min-h-screen md:flex bg-gray-100">
    <!-- Bouton pour afficher/masquer le sidebar -->
    <button @click="isOpen = !isOpen"
        class="text-white bg-gray-800 p-3 rounded-md absolute top-4 left-4 z-30 md:hidden shadow-lg focus:outline-none">
        <i :class="isOpen ? 'fas fa-times' : 'fas fa-bars'"></i>
    </button>

    <!-- Sidebar -->
    <div :class="isOpen ? 'translate-x-0' : '-translate-x-full'"
        class="bg-gray-900 text-gray-200 w-72 space-y-6 py-7 px-4 absolute inset-y-0 left-0 transform transition-all duration-300 ease-in-out md:relative md:translate-x-0 md:flex md:flex-col md:w-64 shadow-lg">

        <!-- Logo ou marque -->
        <div class="flex items-center justify-center space-x-2 text-white text-lg font-bold mb-6">
            <i class="fas fa-user-cog text-green-400"></i>
            <span>{{ auth()->user()->hasRole('admin') ? 'Admin' : 'User' }}</span>
        </div>

        <!-- Navigation Links -->
        <nav class="space-y-3">
            <a href="{{ auth()->user()->hasRole('admin') ? route('admin.dashboard') : route('dashboard') }}"
                class="flex items-center space-x-3 py-3 px-4 rounded-md transition duration-200 hover:bg-green-600">
                <i class="fas fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>

            @if (auth()->user()->hasRole('admin'))
                <a href="{{ route('profile.show') }}"
                    class="flex items-center space-x-3 py-3 px-4 rounded-md transition duration-200 hover:bg-green-600">
                    <i class="fas fa-user-edit"></i>
                    <span>Gérer Profil</span>
                </a>
                <a href="{{ route('admin.users.index') }}"
                    class="flex items-center space-x-3 py-3 px-4 rounded-md transition duration-200 hover:bg-green-600">
                    <i class="fas fa-users-cog"></i>
                    <span>Gérer Utilisateurs</span>
                </a>
                <a href="{{ route('admin.ressources') }}"
                    class="flex items-center space-x-3 py-3 px-4 rounded-md transition duration-200 hover:bg-green-600">
                    <i class="fas fa-box"></i>
                    <span>Gérer Ressources</span>
                </a>
                <a href="{{ route('admin.reservationRessource') }}"
                    class="flex items-center space-x-3 py-3 px-4 rounded-md transition duration-200 hover:bg-green-600">
                    <i class="fas fa-calendar-check"></i>
                    <span>Gérer Réservations</span>
                </a>
                <a href="{{ route('admin.ressources.etat') }}"
                    class="flex items-center space-x-3 py-3 px-4 rounded-md transition duration-200 hover:bg-green-600">
                    <i class="fas fa-chart-bar"></i>
                    <span>État des Ressources</span>
                </a>
            @else
                <a href="#"
                    class="flex items-center space-x-3 py-3 px-4 rounded-md transition duration-200 hover:bg-green-600">
                    <i class="fas fa-user"></i>
                    <span>Profil</span>
                </a>
                <a href="#"
                    class="flex items-center space-x-3 py-3 px-4 rounded-md transition duration-200 hover:bg-green-600">
                    <i class="fas fa-calendar-alt"></i>
                    <span>Vos Réservations</span>
                </a>
                <a href="#"
                    class="flex items-center space-x-3 py-3 px-4 rounded-md transition duration-200 hover:bg-green-600">
                    <i class="fas fa-envelope"></i>
                    <span>Messages</span>
                </a>
                <a href="#"
                    class="flex items-center space-x-3 py-3 px-4 rounded-md transition duration-200 hover:bg-green-600">
                    <i class="fas fa-bell"></i>
                    <span>Notifications</span>
                </a>
            @endif
        </nav>

        <!-- Footer avec les informations de l'utilisateur -->
        <div class="mt-auto flex items-center p-4 border-t border-gray-700">
            <img src="https://gravatar.com/avatar/4474ca42d303761c2901fa819c4f2547" alt="User avatar"
                class="h-12 w-12 rounded-full border-2 border-green-500">
            <div class="ml-3">
                <p class="text-sm font-semibold">{{ auth()->user()->name }}</p>
                <p class="text-xs text-gray-400">{{ auth()->user()->hasRole('admin') ? 'Admin' : 'Utilisateur' }}</p>
            </div>
        </div>
    </div>

    <!-- Contenu principal -->
    <div class="flex-1 p-10">
        <h1 class="text-2xl font-bold text-gray-800">Bienvenue sur le Dashboard</h1>
    </div>
</div>
