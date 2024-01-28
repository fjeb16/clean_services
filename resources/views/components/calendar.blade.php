<div>
    {{-- @dd($calendario) --}}
    <div class="flex items-center justify-center py-8 px-4">
        <!--- more free and premium Tailwind CSS components at https://tailwinduikit.com/ --->
        <div class="max-w-sm w-full shadow-lg">
            <div class="md:p-8 p-5 dark:bg-gray-800 bg-white rounded-t">
                <div class="px-4 flex items-center justify-between">
                    <span tabindex="0"
                        class="focus:outline-none  text-base font-bold dark:text-gray-100 text-gray-800">October
                        2020</span>
                    <div class="flex items-center">
                        <button aria-label="calendar backward"
                            class="focus:text-gray-400 hover:text-gray-400 text-gray-800 dark:text-gray-100">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-left"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <polyline points="15 6 9 12 15 18" />
                            </svg>
                        </button>
                        <button aria-label="calendar forward"
                            class="focus:text-gray-400 hover:text-gray-400 ml-3 text-gray-800 dark:text-gray-100">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler  icon-tabler-chevron-right"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <polyline points="9 6 15 12 9 18" />
                            </svg>
                        </button>

                    </div>
                </div>
                <div class="flex items-center justify-between pt-12 overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr>
                                <th>
                                    <div class="w-full flex justify-center">
                                        <p class="text-base font-medium text-center text-gray-800 dark:text-gray-100">Mo
                                        </p>
                                    </div>
                                </th>
                                <th>
                                    <div class="w-full flex justify-center">
                                        <p class="text-base font-medium text-center text-gray-800 dark:text-gray-100">Tu
                                        </p>
                                    </div>
                                </th>
                                <th>
                                    <div class="w-full flex justify-center">
                                        <p class="text-base font-medium text-center text-gray-800 dark:text-gray-100">We
                                        </p>
                                    </div>
                                </th>
                                <th>
                                    <div class="w-full flex justify-center">
                                        <p class="text-base font-medium text-center text-gray-800 dark:text-gray-100">Th
                                        </p>
                                    </div>
                                </th>
                                <th>
                                    <div class="w-full flex justify-center">
                                        <p class="text-base font-medium text-center text-gray-800 dark:text-gray-100">Fr
                                        </p>
                                    </div>
                                </th>
                                <th>
                                    <div class="w-full flex justify-center">
                                        <p class="text-base font-medium text-center text-gray-800 dark:text-gray-100">Sa
                                        </p>
                                    </div>
                                </th>
                                <th>
                                    <div class="w-full flex justify-center">
                                        <p class="text-base font-medium text-center text-gray-800 dark:text-gray-100">Su
                                        </p>
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>

                            {{-- @foreach ($calendario as $dia)
                                @if ($loop->first)
                                    <tr>
                                        @for ($i = 0; $i < $inicio; $i++)
                                            <td class="pt-6">
                                                <div class="px-2 py-2 cursor-pointer flex w-full justify-center">0</div>
                                            </td>
                                        @endfor
                                @endif
                                <td class="pt-6">
                                    <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                        {{ $loop->index + 1 }}</div>
                                </td>
                                @if (($loop->index + 1) % 7 == 0 && !$loop->last)
                                    </tr>
                                    <tr>
                                @endif
                                @if ($loop->last)
                                    </tr>
                                @endif
                            @endforeach --}}

                            @for ($i = 0; $i < (count($calendario) + $inicio); $i++)
                                @if ($i == 0)
                                    <tr>
                                        @for ($y = 0; $y < $inicio; $y++)
                                            <td class="pt-6">
                                                <div class="px-2 py-2 cursor-pointer flex w-full justify-center"></div>
                                            </td>
                                            @php
                                                $i++
                                            @endphp
                                        @endfor
                                @endif
                                <td class="pt-6">
                                    <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                        {{ $control }}</div>
                                </td>
                                @if (($i + 1) % 7 == 0 && $i != (count($calendario) + $inicio))
                                    </tr>
                                    <tr>
                                @endif
                                @if ($i == (count($calendario) + $inicio))
                                    </tr>
                                @endif
                                @php
                                    $control++
                                @endphp
                            @endfor



                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
