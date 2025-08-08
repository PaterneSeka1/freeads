<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Test Tailwind</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 text-center">
    <section class="bg-gray-50 dark:bg-gray-900">
        <div class="flex flex-col items-center justify-center px-6 mx-auto md:h-screen lg:py-0">
            <div
                class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Login
                    </h1>
                    <form method="POST" action="{{ url('/login') }}" class="space-y-4 md:space-y-6">
                        @csrf

                        @error('email')
                            <p class="mb-4 text-red-600">{{ $message }}</p>
                        @enderror
                        <div>
                            <label for="email"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                            <input type="email" name="email" id="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="name@company.com" value="{{ old('email') }}" required autofocus>
                        </div>
                        <div>
                            <label for="password"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••"
                                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required="">
                        </div>
                        <div class="flex items-center justify-between">
                            <a href="#"
                                class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">Forgot
                                password?</a>
                        </div>
                        <button type="submit"
                            class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Sign
                            in</button>
                        <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                            Don’t have an account yet? <a href="register"
                                class="font-medium text-blue-600 hover:underline dark:text-blue-500">Sign up</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
    {{-- <form method="POST" action="{{ url('/login') }}" class="bg-white p-8 rounded shadow-md w-96">
        @csrf

        <h2 class="text-2xl font-bold mb-6 text-center">Se connecter</h2>

        @error('email')
            <p class="mb-4 text-red-600">{{ $message }}</p>
        @enderror

        <div class="mb-4">
            <label for="email" class="block mb-1 font-medium">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}"
                   class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-indigo-500" required autofocus>
        </div>

        <div class="mb-6">
            <label for="password" class="block mb-1 font-medium">Mot de passe</label>
            <input type="password" id="password" name="password"
                   class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
        </div>

        <button type="submit" class="w-full bg-indigo-600 text-white py-2 rounded hover:bg-indigo-700 transition">
            Se connecter
        </button>
    </form> --}}

</body>

</html>
