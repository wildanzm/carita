<!DOCTYPE html>
<html lang="id">

<head>
    @include('partials.head')
</head>

<body class="min-h-screen font-sans antialiased"
    style="background-image: url('{{ asset('bg.svg') }}'); background-size: cover; background-position: center; background-attachment: fixed;">
    <!-- Background Overlay -->
    <div class="fixed inset-0 -z-10 bg-gradient-to-br from-amber-50/90 via-orange-50/90 to-yellow-50/90"></div>

    <!-- Content -->
    <div class="relative min-h-screen py-8 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            {{ $slot }}
        </div>
    </div>

    @livewireScripts
</body>

</html>
