<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Planes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="bg-gray-100 min-h-screen py-12 flex items-center justify-center">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                @foreach ($planes as $plan)
                    @php
                        if ($loop->index == 1) {
                            $fondo = 'bg-blue-200';
                            $colorBoton = 'bg-blue-500';
                        } elseif ($loop->index == 2) {
                            $fondo = 'bg-green-200';
                            $colorBoton = 'bg-green-500';
                        } else {
                            $fondo = 'bg-purple-200';
                            $colorBoton = 'bg-purple-500';
                        }
                    @endphp
                    <div
                        class="bg-white rounded-lg overflow-hidden shadow-lg transition-transform transform hover:scale-105">
                        <div
                            class="p-1 {{$fondo}}">
                        </div>
                        <div class="p-8">
                            <h2 class="text-3xl font-bold text-gray-800 mb-4">Basic Plan</h2>
                            <p class="text-gray-600 mb-6">Ideal for small businesses</p>
                            <p class="text-4xl font-bold text-gray-800 mb-6">$19.99</p>
                            <ul class="text-sm text-gray-600 mb-6">
                                <li class="mb-2 flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-green-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    10 Users
                                </li>
                                <li class="mb-2 flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-green-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    Basic Features
                                </li>
                                <li class="flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-green-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    24/7 Support
                                </li>
                            </ul>
                        </div>
                        <div class="p-4">
                            <a href="{{ route('plan.contratar', $plan) }}"
                                class="w-full {{$colorBoton}} text-white rounded-full px-4 py-2 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
                                Select Plan
                            </a>
                        </div>
                    </div>
                @endforeach


                <!-- Pricing Card 2 -->
                {{-- <div
                    class="bg-white rounded-lg overflow-hidden shadow-lg transition-transform transform hover:scale-105">
                    <div class="p-1 bg-green-200">
                    </div>
                    <div class="p-8">
                        <h2 class="text-3xl font-bold text-gray-800 mb-4">Pro Plan</h2>
                        <p class="text-gray-600 mb-6">Perfect for growing businesses</p>
                        <p class="text-4xl font-bold text-gray-800 mb-6">$49.99</p>
                        <ul class="text-sm text-gray-600 mb-6">
                            <li class="mb-2 flex items-center">
                                <svg class="w-4 h-4 mr-2 text-green-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                25 Users
                            </li>
                            <li class="mb-2 flex items-center">
                                <svg class="w-4 h-4 mr-2 text-green-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                Advanced Features
                            </li>
                            <li class="flex items-center">
                                <svg class="w-4 h-4 mr-2 text-green-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                24/7 Support
                            </li>
                        </ul>
                    </div>
                    <div class="p-4">
                        <a href="{{ route('plan.contratar', 2) }}"
                            class="w-full bg-green-500 text-white rounded-full px-4 py-2 hover:bg-green-700 focus:outline-none focus:shadow-outline-green active:bg-green-800">
                            Select Plan
                        </a>
                    </div>
                </div>

                <!-- Pricing Card 3 -->
                <div
                    class="bg-white rounded-lg overflow-hidden shadow-lg transition-transform transform hover:scale-105">
                    <div class="p-1 bg-purple-200">
                    </div>
                    <div class="p-8">
                        <h2 class="text-3xl font-bold text-gray-800 mb-4">Enterprise Plan</h2>
                        <p class="text-gray-600 mb-6">For large-scale enterprises</p>
                        <p class="text-4xl font-bold text-gray-800 mb-6">$99.99</p>
                        <ul class="text-sm text-gray-600 mb-6">
                            <li class="mb-2 flex items-center">
                                <svg class="w-4 h-4 mr-2 text-green-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                Unlimited Users
                            </li>
                            <li class="mb-2 flex items-center">
                                <svg class="w-4 h-4 mr-2 text-green-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http
          
          ://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                Premium Features
                            </li>
                            <li class="flex items-center">
                                <svg class="w-4 h-4 mr-2 text-green-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                24/7 Priority Support
                            </li>
                        </ul>
                    </div>
                    <div class="p-4">
                        <a href="{{ route('plan.contratar', 3) }}"
                            class="w-full bg-purple-500 text-white rounded-full px-4 py-2 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple active:bg-purple-800">
                            Select Plan
                        </a>
                    </div>
                </div> --}}

            </div>
        </div>
    </div>
</x-app-layout>
