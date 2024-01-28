<div>
    <div x-data="main()">
        <div>
            <div class="bg-white rounded-lg overflow-hidden shadow-lg transition-transform transform hover:scale-105">
                <div class="p-4">
                    @foreach ($products as $product)
                        <button id="{{ $product->id }}" @click="selectProduct($event)"
                            class="select_product w-full bg-blue-200 text-white rounded-full px-4 py-2 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue active:bg-blue-800 mt-2">
                            @if ($product->id == 1)
                                Unica
                            @else
                                Mensual
                            @endif
                        </button>
                    @endforeach
                    <button id="3" @click="selectProduct($event)"
                        class="select_product w-full bg-blue-200 text-white rounded-full px-4 py-2 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue active:bg-blue-800 mt-2">
                        Quincenal
                    </button>
                </div>

            </div>
            <div class="flex items-center justify-center py-8 px-4">
                <!--- more free and premium Tailwind CSS components at https://tailwinduikit.com/ --->
                <div class="max-w-sm w-full shadow-lg">
                    <div class="md:p-8 p-5 dark:bg-gray-800 bg-white rounded-t">
                        <div class="px-4 flex items-center justify-between">
                            <p tabindex="0"
                                class="focus:outline-none  text-base font-bold dark:text-gray-100 text-gray-800"><span
                                    id="mes">{{ $mes }}</span>
                                <span id="anno">{{ $anno }}</span>
                            </p>
                            <div class="flex items-center">
                                <button aria-label="calendar backward" wire:click="decrement"
                                    x-bind:hidden="selected_date1"
                                    class="focus:text-gray-400 hover:text-gray-400 text-gray-800 dark:text-gray-100">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-chevron-left" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <polyline points="15 6 9 12 15 18" />
                                    </svg>
                                </button>
                                <button aria-label="calendar forward" wire:click="increment"
                                    x-bind:hidden="selected_date1"
                                    class="focus:text-gray-400 hover:text-gray-400 ml-3 text-gray-800 dark:text-gray-100"
                                    :class="selected_date1 ? 'text-gray-400' : ''">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler  icon-tabler-chevron-right" width="24"
                                        height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
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
                                                <p
                                                    class="text-base font-medium text-center text-gray-800 dark:text-gray-100">
                                                    Mo
                                                </p>
                                            </div>
                                        </th>
                                        <th>
                                            <div class="w-full flex justify-center">
                                                <p
                                                    class="text-base font-medium text-center text-gray-800 dark:text-gray-100">
                                                    Tu
                                                </p>
                                            </div>
                                        </th>
                                        <th>
                                            <div class="w-full flex justify-center">
                                                <p
                                                    class="text-base font-medium text-center text-gray-800 dark:text-gray-100">
                                                    We
                                                </p>
                                            </div>
                                        </th>
                                        <th>
                                            <div class="w-full flex justify-center">
                                                <p
                                                    class="text-base font-medium text-center text-gray-800 dark:text-gray-100">
                                                    Th
                                                </p>
                                            </div>
                                        </th>
                                        <th>
                                            <div class="w-full flex justify-center">
                                                <p
                                                    class="text-base font-medium text-center text-gray-800 dark:text-gray-100">
                                                    Fr
                                                </p>
                                            </div>
                                        </th>
                                        <th>
                                            <div class="w-full flex justify-center">
                                                <p
                                                    class="text-base font-medium text-center text-gray-800 dark:text-gray-100">
                                                    Sa
                                                </p>
                                            </div>
                                        </th>
                                        <th>
                                            <div class="w-full flex justify-center">
                                                <p
                                                    class="text-base font-medium text-center text-gray-800 dark:text-gray-100">
                                                    Su
                                                </p>
                                            </div>
                                        </th>
                                    </tr>
                                </thead>
        
                                <tbody>
                                    @for ($i = 0; $i < count($calendario) + $inicio; $i++)
                                       
                                        @if ($i == 0)
                                            <tr>
                                                @for ($y = 0; $y < $inicio; $y++)
                                                    <td class="pt-6">
                                                        <div
                                                            class="fecha px-2 py-2 cursor-pointer flex w-full justify-center dark:text-gray-100">
                                                        </div>
                                                    </td>
                                                    @php
                                                        $i++;
                                                    @endphp
                                                @endfor
                                        @endif
                                        <td class="pt-6">
                                            @php
                                                $ocupated_hours = $calendario['dia_' . $control][2];
                                                $clean_ocupated_hours = str_replace(['[', ']', '"'], '', $ocupated_hours);
                                                if(isset($fechasSuscripcion['dia_' . $control])){
                                                    $hotas_suscritas = str_replace(['[', ']', '"', '{', '}'], '', json_encode($fechasSuscripcion['dia_' . $control]));
                                                    $clean_ocupated_hours = str_replace(['[', ']', '"'], '', $ocupated_hours) .','. $hotas_suscritas;
                                                }

                                            @endphp

                                            <div @mouseover="availableHours($event,'{{ $clean_ocupated_hours }}')"
                                                @mouseout='showHours' @click="selectDate1($event)"
                                                @class([
                                                    'fecha',
                                                    'px-2',
                                                    'cursor-pointer',
                                                    'flex',
                                                    'w-full',
                                                    'justify-center',
                                                    'dark:text-white',
                                                    'invisible' => $calendario["dia_$control"][1] >= 4 ? true : false,
                                                ])>
                                                {{ $control }}
                                            </div>
                                        </td>

                                        @if (($i+1) % 7 == 0 && $i != count($calendario))
                                            </tr>
                                           
                                        @endif
                                        @if ($i == count($calendario) + $inicio)
                                            </tr>
                                        @endif
                                        @php
                                            $control++;
                                        @endphp
                                    @endfor
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div x-show="show_hoursAll" class="asdadadasdasdasdasdas">
                <div class="horas_disponibles" id="content_horas1">
                    <span @click="selectHour1($event)"
                        class="hour_8 bg-black rounded w-8 h-8 m-2 text-white inline-block text-center cursor-pointer">8</span>
                    <span @click="selectHour1($event)"
                        class="hour_9 bg-black rounded w-8 h-8 m-2 text-white inline-block text-center cursor-pointer">9</span>
                    <span @click="selectHour1($event)"
                        class="hour_10 bg-black rounded w-8 h-8 m-2 text-white inline-block text-center cursor-pointer">10</span>
                    <span @click="selectHour1($event)"
                        class="hour_11 bg-black rounded w-8 h-8 m-2 text-white inline-block text-center cursor-pointer">11</span>
                    <span @click="selectHour1($event)"
                        class="hour_12 bg-black rounded w-8 h-8 m-2 text-white inline-block text-center cursor-pointer">12</span>
                    <span @click="selectHour1($event)"
                        class="hour_1 bg-black rounded w-8 h-8 m-2 text-white inline-block text-center cursor-pointer">1</span>
                    <span @click="selectHour1($event)"
                        class="hour_2 bg-black rounded w-8 h-8 m-2 text-white inline-block text-center cursor-pointer">2</span>
                    <span @click="selectHour1($event)"
                        class="hour_3 bg-black rounded w-8 h-8 m-2 text-white inline-block text-center cursor-pointer">3</span>
                    <span @click="selectHour1($event)"
                        class="hour_4 bg-black rounded w-8 h-8 m-2 text-white inline-block text-center cursor-pointer">4</span>

                </div>
                <div class="horas_disponibles" id="content_horas2" x-show="show_hours2">
                    <span @click="selectHour2($event)"
                        class="hour_8 bg-black rounded w-8 h-8 m-2 text-white inline-block text-center cursor-pointer">8</span>
                    <span @click="selectHour2($event)"
                        class="hour_9 bg-black rounded w-8 h-8 m-2 text-white inline-block text-center cursor-pointer">9</span>
                    <span @click="selectHour2($event)"
                        class="hour_10 bg-black rounded w-8 h-8 m-2 text-white inline-block text-center cursor-pointer">10</span>
                    <span @click="selectHour2($event)"
                        class="hour_11 bg-black rounded w-8 h-8 m-2 text-white inline-block text-center cursor-pointer">11</span>
                    <span @click="selectHour2($event)"
                        class="hour_12 bg-black rounded w-8 h-8 m-2 text-white inline-block text-center cursor-pointer">12</span>
                    <span @click="selectHour2($event)"
                        class="hour_1 bg-black rounded w-8 h-8 m-2 text-white inline-block text-center cursor-pointer">1</span>
                    <span @click="selectHour2($event)"
                        class="hour_2 bg-black rounded w-8 h-8 m-2 text-white inline-block text-center cursor-pointer">2</span>
                    <span @click="selectHour2($event)"
                        class="hour_3 bg-black rounded w-8 h-8 m-2 text-white inline-block text-center cursor-pointer">3</span>
                    <span @click="selectHour2($event)"
                        class="hour_4 bg-black rounded w-8 h-8 m-2 text-white inline-block text-center cursor-pointer">4</span>


                </div>
            </div>
        </div>
        {{-- <button @click="showCalendar" x-text="open?'Cerrar':'mostrar'"></button> --}}
    </div>

    <script>
        function main() {
            return {
                show_hoursAll: false,
                show_hours2: false,
                selected_date1: false,
                selected_date2: false,
                date2: false,
                selectProduct: function(evt) {
                    if (evt.target.textContent.trim() == 'Quincenal')
                        this.show_hours2 = true
                    else {
                        const date2_selected = document.getElementsByClassName('date_seleted');
                        if (date2_selected && date2_selected.length > 1)
                            date2_selected[1].classList.remove('date_seleted');

                        const hour2_selected = document.querySelector('#content_horas2 .hour_seleted');
                        if (hour2_selected)
                            hour2_selected.classList.remove('hour_seleted');
                        this.show_hours2 = false;
                        hora2.value = '';
                        fecha_seleccionada2.value = '';
                    }
                    id_product.value = evt.target.id;
                },

                availableHours: function(evt, available_hours) {
                    this.show_hoursAll = true;
                    if (!available_hours)
                        return;
                    if (!this.selected_date1) {
                        available_hours.split(',').forEach(hour => {
                            let query_hour = `#content_horas1 > .hour_${parseInt(hour.split(':')[0])}`;
                            this.toggleStatusHoursAvailable('add', query_hour);
                        });
                    } else if (!this.selected_date2 && this.selected_date1) {
                        console.log('control')
                        available_hours.split(',').forEach(hour => {
                            let query_hour = `#content_horas2 > .hour_${parseInt(hour.split(':')[0])}`;
                            this.toggleStatusHoursAvailable('add', query_hour);
                        });
                    } else if (!this.selected_date2 && !this.selected_date1) {
                        console.log('control')
                        available_hours.split(',').forEach(hour => {
                            let query_hour = `#content_horas2 > .hour_${parseInt(hour.split(':')[0])}`;
                            this.toggleStatusHoursAvailable('add', query_hour);
                        });
                    }
                },

                showHours: function() {

                    if (this.selected_date1) {
                        if (!this.selected_date2)
                            this.toggleStatusHoursAvailable('remove', '#content_horas2 > .invisible');
                    } else {
                        this.toggleStatusHoursAvailable('remove', '.horas_disponibles > .invisible');
                        this.show_hoursAll = false;
                    }
                },

                selectDate1: function(evt) {
                    const element = evt.target;

                    if (this.selected_date1) {
                        if (element.textContent.trim() == parseInt(fecha_seleccionada1.value.split('-')[2])) {
                            element.classList.remove('date_seleted');
                            fecha_seleccionada1.value = '';
                            this.selected_date1 = false;
                            const hour1_selected = document.querySelector('#content_horas1 .hour_seleted');
                            if (hour1_selected)
                                hour1_selected.classList.remove('hour_seleted');
                            hora1.value = '';
                            return;
                        }
                    }
                    if (this.selected_date2) {
                        if (element.textContent.trim() == parseInt(fecha_seleccionada2.value.split('-')[2])) {
                            element.classList.remove('date_seleted');
                            fecha_seleccionada2.value = '';
                            this.selected_date2 = false;
                            const hour2_selected = document.querySelector('#content_horas2 .hour_seleted');
                            if (hour2_selected)
                                hour2_selected.classList.remove('hour_seleted');
                            hora2.value = '';
                            return;
                        }
                    }
                    if (!this.selected_date1 || !this.show_hours2) {
                        console.log('control1')
                        const dia = element.textContent.trim();
                        const get_fecha = `${mes.textContent} ${dia}, ${anno.textContent}`;
                        const fecha = new Date(get_fecha);
                        const options = {
                            year: 'numeric',
                            month: 'numeric',
                            day: 'numeric',
                        };
                        fecha_seleccionada1.value = fecha.toLocaleDateString("en-CA", options)
                        const date1_selected = document.querySelector('.date_seleted');
                        if (date1_selected)
                            date1_selected.classList.remove('date_seleted');
                        element.classList.add('date_seleted');
                        this.selected_date1 = true;
                    } else if (this.show_hours2) {
                        console.log('control2')

                        const dia = evt.target.textContent.trim();
                        const dia_fecha_1 = parseInt(fecha_seleccionada1.value.split('-')[2]);
                        if (dia == dia_fecha_1) {
                            alert('fechas iguales');
                            return;
                        }
                        console.log(`dia = ${dia}, dia_1 = ${dia_fecha_1} son iguales: ${dia == dia_fecha_1}`)
                        const get_fecha = `${mes.textContent} ${dia}, ${anno.textContent}`;
                        const fecha = new Date(get_fecha);
                        const options = {
                            year: 'numeric',
                            month: 'numeric',
                            day: 'numeric',
                        };
                        fecha_seleccionada2.value = fecha.toLocaleDateString("en-CA", options)
                        const date2_selected = document.getElementsByClassName('date_seleted');
                        console.log(date2_selected[1])

                        if (this.date2) {
                            console.log('control3')
                            this.date2.classList.remove('date_seleted');
                            // console.log(date2_selected[1])
                        }
                        element.classList.add('date_seleted');
                        this.date2 = element;
                        this.selected_date2 = true;
                    }
                },

                selectHour1: function(evt) {
                    const hour1_selected = document.querySelector('#content_horas1 .hour_seleted');
                    if (hour1_selected)
                        hour1_selected.classList.remove('hour_seleted');
                    evt.target.classList.add('hour_seleted');
                    hora1.value = evt.target.textContent;

                },

                selectHour2: function(evt) {
                    const hour1_selected = document.getElementsByClassName('hour_seleted');
                    if (hour1_selected && hour1_selected.length > 1)
                        hour1_selected[1].classList.remove('hour_seleted');
                    evt.target.classList.add('hour_seleted');
                    hora2.value = evt.target.textContent;
                },

                toggleStatusHoursAvailable: function(action, query) {
                    document.querySelectorAll(query).forEach(hour => {
                        hour.classList[action]('invisible');
                    });
                }

            }
        }
        // var control = 0;
    </script>
</div>
