<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Nette\Utils\Arrays;
use Carbon\Carbon;

class Calendar extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $test,
    ){}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {


        $fechaActual = Carbon::now();
        $fechaActual = $fechaActual->addMonth();
        // $fechaActual = Carbon::parse('2024-01-01 23:26:11.123789');
        $diasDelMes = $fechaActual->daysInMonth;

        for ($i = 1; $i <= $diasDelMes; $i++) {
            $fecha = Carbon::createFromDate($fechaActual->year, $fechaActual->month, $i);
            $diaDeLaSemana = $fecha->dayOfWeekIso;
            // echo "El día $i del mes actual cae en $diaDeLaSemana.\n";

            $calendario["dia_$i"] = $diaDeLaSemana;
            if($i == 1){
                $inicio = $calendario["dia_$i"] -1;
                $control = 1;
            }

        }
        return view('components.calendar', compact("calendario", "inicio", "control"));
    }
}
