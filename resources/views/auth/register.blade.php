<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/src/css/estilos.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
    <title>ANA MGP Cleaning Services</title>

</head>

<body class="font-principal">

    <div class="bg-gray-100 flex h-screen items-center justify-center px-4 sm:px-6 lg:px-8">
        <div class="w-full max-w-md space-y-8">
            <div class="bg-white shadow-md rounded-md p-6">

                <img class="mx-auto h-40 w-auto" src="/images/2.png" alt="" />

                <h2 class="my-3 text-center text-3xl font-bold tracking-tight text-gray-900">
                    Sign up for an account
                </h2>


                <form class="space-y-6" method="POST">

                    <div>
                        <x-input-label for="name" :value="__('Name')"
                            class="block text-sm font-medium text-gray-700" />
                        <div class="mt-1">
                            <input name="username" type="username" required />
                            <x-text-input id="name"
                                class="px-2 py-3 mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-sky-500 sm:text-sm"
                                type="text" name="name" :value="old('name')" required autofocus
                                autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                    </div>


                    <div>
                        <x-input-label for="email" :value="__('Email')"
                            class="block text-sm font-medium text-gray-700" />
                        <div class="mt-1">
                            <x-text-input id="email"
                                class="px-2 py-3 mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-sky-500 sm:text-sm"
                                type="email" name="email" :value="old('email')" required autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <div class="mt-1">
                            <input name="password" type="password" autocomplete="password" required
                                class="px-2 py-3 mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-sky-500 sm:text-sm" />
                        </div>
                    </div>

                    <div>
                        <x-input-label for="password" :value="__('Password')"
                            class="block text-sm font-medium text-gray-700" />
                        <div class="mt-1">
                            <x-text-input id="password"
                                class="px-2 py-3 mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-sky-500 sm:text-sm"
                                type="password" name="password" required autocomplete="new-password" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                    </div>

                    <a href="{{route('auth.redirect.g')}}"
                        class="flex items-center justify-center mt-4 text-white rounded-lg shadow-md hover:bg-gray-100">
                        <div class="px-4 py-3">
                            <svg class="h-6 w-6" viewBox="0 0 40 40">
                                <path
                                    d="M36.3425 16.7358H35V16.6667H20V23.3333H29.4192C28.045 27.2142 24.3525 30 20 30C14.4775 30 10 25.5225 10 20C10 14.4775 14.4775 9.99999 20 9.99999C22.5492 9.99999 24.8683 10.9617 26.6342 12.5325L31.3483 7.81833C28.3717 5.04416 24.39 3.33333 20 3.33333C10.7958 3.33333 3.33335 10.7958 3.33335 20C3.33335 29.2042 10.7958 36.6667 20 36.6667C29.2042 36.6667 36.6667 29.2042 36.6667 20C36.6667 18.8825 36.5517 17.7917 36.3425 16.7358Z"
                                    fill="#FFC107" />
                                <path
                                    d="M5.25497 12.2425L10.7308 16.2583C12.2125 12.59 15.8008 9.99999 20 9.99999C22.5491 9.99999 24.8683 10.9617 26.6341 12.5325L31.3483 7.81833C28.3716 5.04416 24.39 3.33333 20 3.33333C13.5983 3.33333 8.04663 6.94749 5.25497 12.2425Z"
                                    fill="#FF3D00" />
                                <path
                                    d="M20 36.6667C24.305 36.6667 28.2167 35.0192 31.1742 32.34L26.0159 27.975C24.3425 29.2425 22.2625 30 20 30C15.665 30 11.9842 27.2359 10.5975 23.3784L5.16254 27.5659C7.92087 32.9634 13.5225 36.6667 20 36.6667Z"
                                    fill="#4CAF50" />
                                <path
                                    d="M36.3425 16.7358H35V16.6667H20V23.3333H29.4192C28.7592 25.1975 27.56 26.805 26.0133 27.9758C26.0142 27.975 26.015 27.975 26.0158 27.9742L31.1742 32.3392C30.8092 32.6708 36.6667 28.3333 36.6667 20C36.6667 18.8825 36.5517 17.7917 36.3425 16.7358Z"
                                    fill="#1976D2" />
                            </svg>
                        </div>
                        <h1 class="px-4 py-3 w-5/6 text-center text-gray-600 font-bold">Sign in with Google</h1>
                    </a>
                    <a href="{{route('auth.redirect.face')}}"
                        class="flex items-center justify-center mt-4 text-white rounded-lg shadow-md hover:bg-gray-100">
                        <div class="px-4 py-3">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="32" height="32"
                                viewBox="0 0 64 64">
                                <radialGradient id="7jnoslngIja1InKyh66Ura_118960_gr1" cx="32" cy="31.5"
                                    r="31.259" gradientUnits="userSpaceOnUse" spreadMethod="reflect">
                                    <stop offset="0" stop-color="#c5f1ff"></stop>
                                    <stop offset=".35" stop-color="#cdf3ff"></stop>
                                    <stop offset=".907" stop-color="#e4faff"></stop>
                                    <stop offset="1" stop-color="#e9fbff"></stop>
                                </radialGradient>
                                <path fill="url(#7jnoslngIja1InKyh66Ura_118960_gr1)" d="M58,54c-1.105,0-2-0.895-2-2c0-1.105,0.895-2,2-2h2.5c1.925,0,3.5-1.575,3.5-3.5 S62.425,43,60.5,43H50c-1.381,0-2.5-1.119-2.5-2.5c0-1.381,1.119-2.5,2.5-2.5h8c1.65,
                                 0,3-1.35,3-3c0-1.65-1.35-3-3-3H42v-6h18 c2.335,0,4.22-2.028,3.979-4.41C63.77,19.514,61.897,18,59.811,18H58c-1.105,0-2-0.895-2-2c0-1.105,0.895-2,2-2h0.357 c1.308,0,
                                 2.499-0.941,2.63-2.242C61.137,10.261,59.966,9,58.5,9h-14C43.672,9,43,8.328,43,7.5S43.672,6,44.5,6h3.857 c1.308,0,2.499-0.941,2.63-2.242C51.137,2.261,49.966,1,48.5,
                                 1L15.643,1c-1.308,0-2.499,0.941-2.63,2.242 C12.863,4.739,14.034,6,15.5,6H19c1.105,0,2,0.895,2,2c0,1.105-0.895,2-2,2H6.189c-2.086,0-3.958,1.514-4.168,3.59 C1.78,15.972,
                                 3.665,18,6,18h2.5c1.933,0,3.5,1.567,3.5,3.5c0,1.933-1.567,3.5-3.5,3.5H5.189c-2.086,0-3.958,1.514-4.168,3.59 C0.78,30.972,2.665,33,5,33h17v11H6c-1.65,0-3,1.35-3,3c0,1.65,1.35,
                                 3,3,3h0c1.105,0,2,0.895,2,2c0,1.105-0.895,2-2,2H4.189 c-2.086,0-3.958,1.514-4.168,3.59C-0.22,59.972,1.665,62,4,62h53.811c2.086,0,3.958-1.514,4.168-3.59C62.22,56.028,60.335,54,
                                 58,54z"></path>
                                <linearGradient id="7jnoslngIja1InKyh66Urb_118960_gr2" x1="32" x2="32"
                                    y1="61.521" y2="17.521" gradientUnits="userSpaceOnUse" spreadMethod="reflect">
                                    <stop offset="0" stop-color="#155cde"></stop>
                                    <stop offset=".278" stop-color="#1f7fe5"></stop>
                                    <stop offset=".569" stop-color="#279ceb"></stop>
                                    <stop offset=".82" stop-color="#2cafef"></stop>
                                    <stop offset="1" stop-color="#2eb5f0"></stop>
                                </linearGradient>
                                <path fill="url(#7jnoslngIja1InKyh66Urb_118960_gr2)" d="M50,12H14c-2.209,0-4,1.791-4,4v36c0,2.209,1.791,4,4,4h36c2.209,0,4-1
                                     .791,4-4V16 C54,13.791,52.209,12,50,12z"></path>
                                <path fill="#fff"
                                    d="M44.4,35H41v15c0,0.552-0.448,1-1,1h-4c-0.552,0-1-0.448-1-1V35h-3c-0.552,0-1-0.448-1-1v-3 c0-0.552,0.448-1,1-1h3v-3
                                     .069C35.005,22.582,36.812,20,41.936,20H45c0.552,0,1,0.448,1,1v3c0,0.552-0.448,1-1,1h-1.874 C41.131,25,41,25.746,41,27.136V30h4c0.631,0,1.104,0.577,0.981,1.196l-0.6,3C45.287,34.664,44.876,35,44.4,35z">
                                </path>
                            </svg>
                        </div>
                        <h1 class="px-4 py-3 w-5/6 text-center text-gray-600 font-bold">Sign in with Facebook</h1>
                    </a>
                    <div>
                        <button type="submit"
                            class="flex w-full justify-center rounded-md border border-transparent bg-blue-300 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-opacity-75 focus:outline-none focus:ring-2 focus:ring-sky-400 focus:ring-offset-2">Register
                            Account
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>




{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="mt-4">
            <!-- Using utilities: -->
            <a href="{{route('auth.redirect.face')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-full block">
                Iniciar session con face
            </a>
        </div>

        <div class="mt-4">
            <!-- Using utilities: -->
            <a href="{{route('auth.redirect.g')}}" class="bg-yellow-400 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-full block">
                Iniciar session con google
            </a>
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
