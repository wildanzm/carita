<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('partials.head')
    <style>
        body {
            background-image: url('/bg.svg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background-repeat: no-repeat;
        }

        .glassmorphism {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.1);
        }

        .glassmorphism-dark {
            background: rgba(31, 41, 55, 0.8);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.2);
        }

        .nav-item {
            position: relative;
            transition: all 0.3s ease;
        }

        .nav-item:hover {
            transform: translateX(8px);
        }

        .nav-item.active {
            background: linear-gradient(to right, rgba(180, 83, 9, 0.1), transparent);
            border-right: 3px solid #b45309;
        }

        .nav-item.active::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 4px;
            background: linear-gradient(to bottom, #b45309, #d97706);
            border-radius: 0 4px 4px 0;
        }

        .sidebar-scrollbar::-webkit-scrollbar {
            width: 6px;
        }

        .sidebar-scrollbar::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
        }

        .sidebar-scrollbar::-webkit-scrollbar-thumb {
            background: rgba(180, 83, 9, 0.3);
            border-radius: 10px;
        }

        .sidebar-scrollbar::-webkit-scrollbar-thumb:hover {
            background: rgba(180, 83, 9, 0.5);
        }

        /* Mobile Sidebar Overlay */
        .sidebar-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 30;
            transition: opacity 0.3s ease;
        }

        .sidebar-overlay.active {
            display: block;
            opacity: 1;
        }

        /* Mobile Sidebar Animation */
        @media (max-width: 1024px) {
            .mobile-sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s ease;
            }

            .mobile-sidebar.open {
                transform: translateX(0);
            }
        }

        /* Responsive adjustments */
        @media (max-width: 1024px) {
            .nav-item:hover {
                transform: translateX(4px);
            }
        }
    </style>
</head>

<body class="min-h-screen">
    <!-- Mobile Header -->
    <header class="lg:hidden fixed top-0 left-0 right-0 z-50 glassmorphism border-b border-gray-200/50">
        <div class="flex items-center justify-between px-4 py-3">
            <!-- Hamburger Menu -->
            <button type="button" id="mobile-menu-button" class="p-2 rounded-lg hover:bg-gray-100/50 transition-colors">
                <svg class="w-6 h-6 text-amber-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                    </path>
                </svg>
            </button>

            <!-- Centered Logo -->
            <div class="absolute left-1/2 transform -translate-x-1/2">
                <a href="{{ route('home') }}" class="flex flex-col items-center">
                    <h1 class="font-bold text-amber-700 text-xl">Carita</h1>
                    <p class="text-[10px] text-gray-600">Cultural Stories</p>
                </a>
            </div>

            <!-- User Avatar -->
            <div
                class="w-9 h-9 bg-gradient-to-br from-amber-700 to-amber-600 rounded-full flex items-center justify-center text-white font-semibold text-sm shadow-lg">
                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
            </div>
        </div>
    </header>

    <!-- Sidebar Overlay for Mobile -->
    <div id="sidebar-overlay" class="sidebar-overlay"></div>

    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside id="sidebar" class="w-64 fixed left-0 top-0 h-screen z-40 mobile-sidebar lg:transform-none">
            <div class="h-full glassmorphism lg:rounded-r-3xl flex flex-col">
                <!-- Logo Section - Hidden on Mobile -->
                <div class="hidden lg:block p-6 border-b border-gray-200/50">
                    <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                        <div>
                            <h1 class="font-bold text-amber-700 text-2xl">Carita</h1>
                            <p class="text-xs text-gray-600">Cultural Stories</p>
                        </div>
                    </a>
                </div>

                <!-- Mobile Header Inside Sidebar -->
                <div class="lg:hidden p-4 border-b border-gray-200/50 flex items-center justify-between">
                    <div>
                        <h1 class="font-bold text-amber-700 text-xl">Carita</h1>
                        <p class="text-xs text-gray-600">Cultural Stories</p>
                    </div>
                    <button type="button" onclick="toggleMobileSidebar()"
                        class="p-2 rounded-lg hover:bg-gray-100/50 transition-colors">
                        <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12">
                            </path>
                        </svg>
                    </button>
                </div>

                <!-- Navigation Menu -->
                <nav class="flex-1 overflow-y-auto sidebar-scrollbar p-4 space-y-2">
                    <div class="mb-4">
                        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider px-4 mb-2">Menu Utama
                        </p>

                        <!-- Dashboard -->
                        <a href="{{ route('dashboard') }}"
                            class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }} flex items-center gap-3 px-4 py-3 rounded-xl text-gray-700 hover:text-amber-700 group">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                </path>
                            </svg>
                            <span class="font-medium">Dashboard</span>
                        </a>

                        <!-- My Stories -->
                        <a href="{{ route('my-stories') }}"
                            class="nav-item {{ request()->routeIs('my-stories') ? 'active' : '' }} flex items-center gap-3 px-4 py-3 rounded-xl text-gray-700 hover:text-amber-700 group">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                                </path>
                            </svg>
                            <span class="font-medium">Carita Saya</span>
                        </a>



                        <!-- Produk -->
                        <a href="{{ route('product.index') }}"
                            class="nav-item {{ request()->routeIs('product.*') ? 'active' : '' }} flex items-center gap-3 px-4 py-3 rounded-xl text-gray-700 hover:text-amber-700 group">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4">
                                </path>
                            </svg>
                            <span class="font-medium">Produk</span>
                        </a>
                    </div>

                    <div class="border-t border-gray-200/50 pt-4 mt-4">
                        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider px-4 mb-2">Pengaturan
                        </p>

                        <!-- Profile -->
                        <a href="{{ route('profile.edit') }}"
                            class="nav-item {{ request()->routeIs('profile.edit') ? 'active' : '' }} flex items-center gap-3 px-4 py-3 rounded-xl text-gray-700 hover:text-amber-700 group">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            <span class="font-medium">Profil</span>
                        </a>

                        <!-- Password -->
                        <a href="{{ route('user-password.edit') }}"
                            class="nav-item {{ request()->routeIs('user-password.edit') ? 'active' : '' }} flex items-center gap-3 px-4 py-3 rounded-xl text-gray-700 hover:text-amber-700 group">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                                </path>
                            </svg>
                            <span class="font-medium">Password</span>
                        </a>
                    </div>
                </nav>

                <!-- User Profile Section -->
                <div class="p-4 border-t border-gray-200/50">
                    <div class="glassmorphism rounded-xl p-3 mb-3">
                        <div class="flex items-center gap-3 mb-3">
                            <div
                                class="w-10 h-10 bg-gradient-to-br from-amber-700 to-amber-600 rounded-full flex items-center justify-center text-white font-semibold shadow-lg">
                                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="font-semibold text-gray-900 text-sm truncate">{{ auth()->user()->name }}</p>
                                <p class="text-xs text-gray-600 truncate">{{ auth()->user()->email }}</p>
                            </div>
                        </div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="w-full flex items-center justify-center gap-2 px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg transition-all duration-300 text-sm font-medium shadow-lg hover:shadow-xl">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                    </path>
                                </svg>
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 lg:ml-64 p-4 sm:p-6 lg:p-8 pt-20 lg:pt-8">
            <div class="max-w-7xl mx-auto">
                {{ $slot }}
            </div>
        </main>
    </div>

    <script>
        // Initialize when DOM is ready
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebar-overlay');
            const menuButton = document.getElementById('mobile-menu-button');

            // Hamburger menu click handler
            if (menuButton) {
                menuButton.addEventListener('click', function(e) {
                    e.stopPropagation();
                    toggleMobileSidebar();
                });
            }

            // Overlay click handler
            if (overlay) {
                overlay.addEventListener('click', function() {
                    toggleMobileSidebar();
                });
            }

            // Navigation links click handler for mobile
            const navLinks = document.querySelectorAll('.nav-item');
            navLinks.forEach(function(link) {
                link.addEventListener('click', function() {
                    closeMobileSidebar();
                });
            });
        });

        function toggleMobileSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebar-overlay');

            if (sidebar && overlay) {
                sidebar.classList.toggle('open');
                overlay.classList.toggle('active');

                // Prevent body scroll when sidebar is open
                if (sidebar.classList.contains('open')) {
                    document.body.style.overflow = 'hidden';
                } else {
                    document.body.style.overflow = '';
                }
            }
        }

        function closeMobileSidebar() {
            if (window.innerWidth < 1024) {
                const sidebar = document.getElementById('sidebar');
                const overlay = document.getElementById('sidebar-overlay');

                if (sidebar && overlay) {
                    sidebar.classList.remove('open');
                    overlay.classList.remove('active');
                    document.body.style.overflow = '';
                }
            }
        }

        // Close sidebar when clicking outside
        document.addEventListener('click', function(event) {
            const sidebar = document.getElementById('sidebar');
            const menuButton = document.getElementById('mobile-menu-button');

            if (sidebar && menuButton &&
                window.innerWidth < 1024 &&
                sidebar.classList.contains('open') &&
                !sidebar.contains(event.target) &&
                !menuButton.contains(event.target)) {
                closeMobileSidebar();
            }
        });

        // Handle window resize
        window.addEventListener('resize', function() {
            if (window.innerWidth >= 1024) {
                const sidebar = document.getElementById('sidebar');
                const overlay = document.getElementById('sidebar-overlay');

                if (sidebar && overlay) {
                    sidebar.classList.remove('open');
                    overlay.classList.remove('active');
                    document.body.style.overflow = '';
                }
            }
        });
    </script>

</body>

</html>
