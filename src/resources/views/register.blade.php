<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Registrasi Masyarakat</title>
    @vite('resources/css/app.css') <!-- jika pakai Tailwind -->
    @livewireStyles
</head>
<body class="bg-gray-100">
    {{-- Panggil komponen Livewire --}}
    @livewire('register-masyarakat')
    @livewireScripts
</body>
</html>
