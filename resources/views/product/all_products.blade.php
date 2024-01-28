<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>
    @if ($errors->any())
        <div class="alert alert-danger" style="background: white">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="py-12">
        <div class="bg-gray-100 min-h-screen py-12 flex items-center justify-center">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">


                <div class=" bg-white">
                    <div class="bg-white  overflow-hidden shadow-sm sm:rounded-lg">
                        <livewire:calendario />
                    </div>
                </div>

                <div class=" bg-white">
                    @foreach ($plans as $plan)
                        <button id="{{ $plan->name }}"
                            class="tipo w-full bg-blue-500 text-white rounded-full px-4 py-2 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue active:bg-blue-800 mt-3">
                            {{ $plan->name }}
                        </button>
                    @endforeach
                </div>



                <form action="{{ route('checkout') }}" method="post">
                    @csrf
                    <label>
                        <span>Numero de cuartos</span>
                        <input type="number" name="cuartos" id="cuartos" placeholder="Max 5">
                    </label>
                    <label>
                        <span>Banos Adicionales</span>
                        <input type="number" name="banos_extra" id="banos_extra" placeholder="0">
                    </label>
                    <label>
                        <span>1/2 Banos Adicionales</span>
                        <input type="number" name="medio_banos_extra" id="medio_banos_extra" placeholder="0">
                    </label>
                    <label>
                        <span>Numero de oficinas o sala Adicionales</span>
                        <input type="number" name="sala_oficina" id="sala_oficina" placeholder="0">
                    </label>
                    <label>
                        <span>Hornos</span>
                        <input type="number" name="horno" id="horno" placeholder="Max 5">
                    </label>
                    <label>
                        <span>Refri</span>
                        <input type="number" name="refri" id="refri" placeholder="0">
                    </label>
                    <label>
                        <span>Socalo</span>
                        <input type="number" name="socalo" id="socalo" placeholder="0">
                    </label>
                    <label>
                        <span>Zotano</span>
                        <input type="number" name="zotano" id="zotano" placeholder="0">
                    </label>
                    <label>
                        <span>Ventana</span>
                        <input type="number" name="ventana" id="ventana" placeholder="0">
                    </label>
                    <label>
                        <span>Persiana</span>
                        <input type="number" name="persiana" id="persiana" placeholder="0">
                    </label>
                    <label>
                        <span>Mascotas</span>
                        <input type="number" name="mascotas" id="mascotas">
                    </label>
                    <input type="text" name="id_product" id="id_product">
                    <input type="date" name="fecha_seleccionada1" id="fecha_seleccionada1">
                    <input type="number" name="hora1" id="hora1">
                    <input type="date" name="fecha_seleccionada2" id="fecha_seleccionada2">
                    <input type="number" name="hora2" id="hora2">
                    <input type="text" name="tipo" id="tipo">
                    <input type="submit" value="contratar">
                </form>
                <h2 id="total">0</h2>
            </div>
        </div>

    </div>

    <script>
        @foreach ($plans as $plan)
            var plan_{{ $loop->index }} = @json($plan);
        @endforeach
    </script>

    @vite('resources/js/formProduct.js', 'resources/js/scriptsformulario.js')
</x-app-layout>
