<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Test Tailwind</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-center py-10">
    {{-- <section class="bg-gray-50 dark:bg-gray-900">
        <div class="flex flex-col items-center justify-center px-6 mx-auto md:h-screen lg:py-0">
            <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Create an account
                    </h1>
                    <form class="space-y-4 md:space-y-6" action="#" method="post">
                        <div>
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your name</label>
                            <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name" required="">
                        </div>
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@company.com" required="">
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                        </div>
                        <div class="max-w-sm mx-auto">
                            <label for="phone-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone number:</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 top-0 flex items-center ps-3.5 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 19 18">
                                        <path d="M18 13.446a3.02 3.02 0 0 0-.946-1.985l-1.4-1.4a3.054 3.054 0 0 0-4.218 0l-.7.7a.983.983 0 0 1-1.39 0l-2.1-2.1a.983.983 0 0 1 0-1.389l.7-.7a2.98 2.98 0 0 0 0-4.217l-1.4-1.4a2.824 2.824 0 0 0-4.218 0c-3.619 3.619-3 8.229 1.752 12.979C6.785 16.639 9.45 18 11.912 18a7.175 7.175 0 0 0 5.139-2.325A2.9 2.9 0 0 0 18 13.446Z"/>
                                    </svg>
                                </div>
                                <input type="text" name="number_phone" id="phone-input" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="123-456-7890" required />
                            </div>
                            <p id="helper-text-explanation" class="mt-2 text-sm text-gray-500 dark:text-gray-400">Select a phone number that matches the divat.</p>
                        </div>
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input id="terms" aria-describedby="terms" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800" required="">
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="terms" class="font-light text-gray-500 dark:text-gray-300">I accept the <a class="font-medium text-blue-600 hover:underline dark:text-blue-500" href="#">Terms and Conditions</a></label>
                            </div>
                        </div>
                        <button type="submit" class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create an account</button>
                        <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                            Already have an account? <a href="login" class="font-medium text-blue-600 hover:underline dark:text-blue-500">Login here</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section> --}}
    <form method="POST" action="{{ url('/register') }}" class="bg-white p-8 rounded shadow-md w-96">
        @csrf

        <h2 class="text-2xl font-bold mb-6 text-center">Créer un compte</h2>

        @if ($errors->any())
            <div class="mb-4 text-red-600">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>- {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="mb-4">
            <label for="name" class="block mb-1 font-medium">Nom complet</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required
                class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-indigo-500" />
        </div>

        <div class="mb-4">
            <label for="email" class="block mb-1 font-medium">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required
                class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-indigo-500" />
        </div>

        <div class="mb-4">
            <label for="number_phone" class="block mb-1 font-medium">Numéro de téléphone</label>
            <input type="text" id="number_phone" name="number_phone" value="{{ old('number_phone') }}" required
                class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-indigo-500" />
        </div>

        <div class="mb-4">
            <label for="password" class="block mb-1 font-medium">Mot de passe</label>
            <input type="password" id="password" name="password" required
                class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-indigo-500" />
        </div>

        <div class="mb-6">
            <label for="password_confirmation" class="block mb-1 font-medium">Confirmer le mot de passe</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required
                class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-indigo-500" />
        </div>

        <button type="submit"
            class="w-full bg-indigo-600 text-white py-2 rounded hover:bg-indigo-700 transition">
            S'inscrire
        </button>
    </form>
</body>
</html>
