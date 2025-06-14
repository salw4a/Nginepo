<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body>
    <div class="min-h-screen flex items-center justify-center px-4 sm:px-6 lg:px-8" style="background: url('{{ asset('images/bgLoginRegist.png') }}') no-repeat center center/cover;">
            <div class="bg-[#926f5b] w-full max-w-md md:max-w-sm p-6 sm:p-8 rounded-2xl shadow-lg text-white">
                <h2 class="text-2xl font-bold text-center mb-2">Selamat datang!</h2>
                <p class="text-center text-sm mb-6">Buat akunmu di Nginepo sekarang!</p>

                @if ($errors->any())
            <div class="mb-4 bg-red-100 text-red-700 px-4 py-2 rounded-lg">
                <ul class="list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="/register">
            @csrf

            <div class="mb-4">
                <label for="nama" class="block text-sm font-semibold mb-1">Nama Lengkap</label>
                <input type="text" name="nama" id="nama" value="{{ old('nama') }}" required
                    class="w-full px-4 py-2 rounded-full bg-[#c7b3a3] text-black focus:outline-none focus:ring-2 focus:ring-white">
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-semibold mb-1">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required
                    class="w-full px-4 py-2 rounded-full bg-[#c7b3a3] text-black focus:outline-none focus:ring-2 focus:ring-white">
            </div>

            <div class="mb-4">
                <label for="phone" class="block text-sm font-semibold mb-1">Nomor HP</label>
                <input type="text" name="phone" id="phone" value="{{ old('phone') }}" required
                    class="w-full px-4 py-2 rounded-full bg-[#c7b3a3] text-black focus:outline-none focus:ring-2 focus:ring-white">
            </div>

            <div class="mb-4">
                <label for="role" class="block text-sm font-semibold mb-1">Daftar Sebagai</label>
                <select name="role" id="role" required
                    class="w-full px-4 py-2 rounded-full bg-[#c7b3a3] text-black focus:outline-none focus:ring-2 focus:ring-white">
                    <option value="">-- Pilih Role --</option>
                    <option value="penyewa" {{ old('role') == 'penyewa' ? 'selected' : '' }}>Penyewa</option>
                    <option value="pemilik" {{ old('role') == 'pemilik' ? 'selected' : '' }}>Pemilik</option>
                </select>
            </div>

            <div class="mb-4 relative">
                <label for="password" class="block text-sm font-semibold mb-1">Password</label>
                <input type="password" name="password" id="password" required
                    class="w-full px-4 py-2 pr-10 rounded-full bg-[#c7b3a3] text-black focus:outline-none focus:ring-2 focus:ring-white">
                <span class="absolute right-3 top-9 text-gray-600 cursor-pointer password-toggle" data-target="password">
                    👁️‍🗨️
                </span>
            </div>

            <div class="mb-6 relative">
                <label for="password_confirmation" class="block text-sm font-semibold mb-1">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required
                    class="w-full px-4 py-2 pr-10 rounded-full bg-[#c7b3a3] text-black focus:outline-none focus:ring-2 focus:ring-white">
                <span class="absolute right-3 top-9 text-gray-600 cursor-pointer password-toggle" data-target="password_confirmation">
                    👁️‍🗨️
                </span>
            </div>

            <button type="submit"
                class="w-full py-2 bg-gray-800 hover:bg-gray-900 text-white font-semibold rounded-xl transition-all duration-300 btn-primary">
                Register
            </button>
        </form>

        <p class="text-center text-sm mt-4 text-white">
            Sudah memiliki akun?
            <a href="/login" class="text-[#4d2600] font-semibold hover:underline">Login</a>
        </p>
    </div>
</body>
</html>
