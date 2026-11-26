<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login PetshopKu</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center h-screen">

    <div class="bg-white p-6 rounded-2xl shadow-md w-80">

        <h2 class="text-2xl font-bold mb-4 text-center">
            Login PetshopKu
        </h2>

        
        <form action="{{ route('login.post') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="block text-sm font-medium mb-1">
                    Email
                </label>

                <input
                    type="email"
                    name="email"
                    class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                    placeholder="Masukkan email"
                    required>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">
                    Password
                </label>

                <input
                    type="password"
                    name="password"
                    class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                    placeholder="Masukkan password"
                    required>
            </div>

            <button
                type="submit"
                class="w-full bg-[#D8B4A0] text-white py-2 rounded-lg hover:bg-[#C49A84]">
                Login
            </button>

        </form>
        @error('login_error')
            <p class="text-red-500 text-sm mb-3 text-center">
                {{ $message }}
            </p>
        @enderror
    </div>

</body>
</html>
