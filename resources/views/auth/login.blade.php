<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>@yield('title')</title>
</head>
<body>
    <div class="min-h-screen flex items-center justify-center px-4 sm:px-6 lg:px-8" style="background: url('{{ asset('images/bgLoginRegist.png') }}') no-repeat center center/cover;">
        <div class="bg-[#9c745e] rounded-2xl shadow-md px-6 sm:px-8 py-8 sm:py-10 w-full max-w-sm text-white">
            <div class="flex flex-col items-center mb-6">
                <img src="images/logoNginepo.png" alt="icon" class="w-12 h-12 mb-3">
                <h2 class="text-xl font-bold">Selamat datang!</h2>
                <p class="text-sm text-center mt-1">Mohon isi detail data di bawah</p>
            </div>
            @if(session('error'))
                <div class="mb-4 px-4 py-3 rounded bg-red-400 text-white font-semibold">
                    {{ session('error') }}
                </div>
            @endif

            <form method="POST" action="{{route('login.post')}}" class="space-y-4">
                @csrf
                <div>
                    <label for="email" class="block text-sm font-semibold mb-1">Email</label>
                    <input type="text" id="email" name="email" required
                        class="w-full px-4 py-2 rounded-full bg-[#cdb7ab] text-black focus:outline-none">
                </div>
                @error('email')
                    <small>{{$message}}</small>
                @enderror
                <div>
                    <label for="password" class="block text-sm font-semibold mb-1">Password</label>
                    <div class="relative">
                        <input type="password" id="password" name="password" required
                            class="w-full px-4 py-2 pr-10 rounded-full bg-[#cdb7ab] text-black focus:outline-none">
                        <button type="button" onclick="togglePassword()" class="absolute right-3 top-2.5" id="togglePasswordBtn">
                            <svg id="togglePasswordIcon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13.875 18.825A10.05 10.05 0 0112 19c-5.523 0-10-4.477-10-10
                                    0-1.654.405-3.215 1.125-4.575M6.225 6.225A9.95 9.95 0 012 9c0
                                    5.523 4.477 10 10 10 1.987 0 3.83-.587 5.375-1.575M15 12a3
                                    3 0 00-3-3M3 3l18 18" />
                            </svg>
                        </button>
                    </div>
                    @error('password')
                        <small>{{$message}}</small>
                    @enderror
                </div>

                <div class="flex justify-end">
                    <a href="/" class="text-sm font-semibold">Lupa password?</a>
                </div>

                <button type="submit"
                        class="w-full py-2 bg-gray-800 text-white font-semibold rounded-xl hover:bg-gray-700 transition">
                    Login
                </button>
            </form>

            <p class="text-sm text-center mt-6">Belum memiliki akun?
                <a href="{{ route('register') }}" class="text-[#5a2d0c] font-semibold">Register</a>
            </p>
        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.getElementById('togglePasswordIcon');
            const isPassword = passwordInput.type === 'password';

            passwordInput.type = isPassword ? 'text' : 'password';

            toggleIcon.innerHTML = isPassword
                ? `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943
                            9.542 7-1.274 4.057-5.064 7-9.542 7-4.477
                            0-8.268-2.943-9.542-7z" />`
                : `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13.875 18.825A10.05 10.05 0 0112 19c-5.523 0-10-4.477-10-10
                            0-1.654.405-3.215 1.125-4.575M6.225 6.225A9.95
                            9.95 0 012 9c0 5.523 4.477 10 10 10 1.987 0
                            3.83-.587 5.375-1.575M15 12a3 3 0 00-3-3M3 3l18 18" />`;
        }
    </script>
</body>
</html>
