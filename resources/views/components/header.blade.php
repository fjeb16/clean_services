<header class=" bg-azuloscuro z-10 sticky top-0">
    <nav class="contenido h-20 flex items-center justify-between ">
        <a href="./" class="w-1/3 max-w-[140px]">
            <img src="{{ asset('/images/logo.png') }}" class="w-14 " alt="">
        </a>

        <input type="checkbox" id="menu" class="peer hidden">


        <div
            class="fixed inset-0 bg-gradient-to-b from-verdelima/70 to-cyan-400/70  translate-x-full peer-checked:translate-x-0 transition-transform 
         md:static md:bg-none md:translate-x-0">

            <ul
                class="absolute inset-x-0 top-24 p-12 bg-white w-[100%] mx-auto rounded-md h-max text-center text-lg grid gap-6 font-extrabold   
            md:w-max md:bg-transparent md:p-0 md:grid-flow-col md:static z-50 
            text-black sm:text-blue-50">
                <li>
                    <a href="/"> Home </a>
                </li>
                <li>
                    <a href="{{ route('about_us') }}"> About Us </a>
                </li>

                <li>
                    <a href="{{ route('service') }}"> Service </a>
                </li>
                <li>
                    <a href="{{ route('contact') }}"> Contact Us </a>
                </li>
                <li class="lg:hidden md:hidden">
                    <a href="#" class=" hover:text-cyan-400 "> Login </a>
                </li>
                <li class="lg:hidden md:hidden">
                    <a href="#" class=" hover:text-cyan-400 "> Register </a>
                </li>
            </ul>
        </div>

        @auth
            <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
                <div class="px-4">
                    <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>

                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('profile.edit')">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        @else
            <ul class="grid grid-cols-2 font-extrabold text-verdelima">
                <li
                    class="hidden sm:block  w-max py-4 px-12 rounded-full font-bold  shadow-lg  dark:shadow-lg  text-sm  text-center me-2 mb-2">
                    <a href="{{ route('login') }}" class="hover:text-cyan-400">Login</a>
                </li>
                <li class="button  hidden sm:block ">
                    <a href="{{ route('register') }}" class="hover:text-azuloscuro">Register</a>
                </li>
            </ul>
        @endauth





        <label for="menu"
            class="bg-abrir-menu w-6 h-5 bg-cover bg-center cursor-pointer 
        peer-checked:bg-cerrar-menu transition-all z-50 md:hidden"></label>
        </div>
    </nav>
</header>
