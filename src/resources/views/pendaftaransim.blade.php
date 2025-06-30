<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Formulir Pendaftaran SIM</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    @vite('resources/css/app.css')

    @livewireStyles
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="w-full max-w-2xl bg-white p-6 rounded-xl shadow-lg">
        <h2 class="text-2xl font-bold mb-4 text-center">Formulir Pendaftaran SIM</h2>

        @livewire('form-pendaftaran-sim')
    </div>

    @livewireScripts
    <script src="https://unpkg.com/alpinejs" defer></script>
</body>
</html>
