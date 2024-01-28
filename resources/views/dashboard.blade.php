<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white">
            <div class="bg-white  overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>

    <div x-data="main()"  class="bg-white">
        <button wire:key="event-bind-{{ \Illuminate\Support\Str::random() }}" x-on:click.stop="incrementar($event)">Incrementar</button>
        <span x-text="contador"></span>
    </div>

    <script>
        function main() {
            return {
                contador: 15,
                incrementar: function(evt) {
                    console.log('test')
                    return this.contador++
                    evt.stopPropagation()
                }
            }
        }
    </script>
</x-app-layout>
