<?php

namespace App\Livewire;

use App\Models\product;
use Livewire\Component;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class Calendario extends Component
{
    public $calendario = [];
    public $control = 1;
    public $inicio = 0;
    public $fechaActual = '';
    public $diasDelMes = '';
    public $anno = '';
    public $mes = '';
    public $agenda = [];
    public $fechasRegistradas = [];
    public $fechasSuscripcion = [];

    public $controlMes = 0;

    public function mount()
    {
        $this->fechaActual = Carbon::now();
        $this->anno = $this->fechaActual->year;
        $this->mes = $this->fechaActual->month;
        // $this->fechaActual = $this->fechaActual->addMonth();
        // $this->fechaActual = Carbon::parse('2023-12-01 08:00:00');
        $this->fechasRegistradas = DB::select("SELECT product_id, fecha_trabajo, DAY(fecha_trabajo) AS dia, TIME(fecha_trabajo) AS hora FROM orders WHERE product_id = 2 OR (MONTH(fecha_trabajo) = $this->mes AND YEAR(fecha_trabajo) = $this->anno)");
        // $this->fechasRegistradas = DB::table('orders')->select('fecha_trabajo', 'product_id')->whereMonth('fecha_trabajo', $this->fechaActual->month)->whereYear('fecha_trabajo',$this->fechaActual->year)->get();
        foreach ($this->fechasRegistradas as $value) {
            $datosCita = explode(" ", $value->fecha_trabajo);
            $horaCita = $datosCita[1];
            $fechaCita = explode("-", $datosCita[0]);
            $timestampCita = Carbon::createFromDate($fechaCita[0], $fechaCita[1], $fechaCita[2]);
            $this->agenda[$timestampCita->timestamp][] = $horaCita;
            if ($value->product_id == 2) {
                $num = intval($fechaCita[2]);
                $this->fechasSuscripcion["dia_$num"][] = $horaCita;
            }
        }
        $this->diasDelMes = $this->fechaActual->daysInMonth;
        $this->calcularDias($this->fechaActual);
    }

    private function calcularDias($fechaActual)
    {
        $this->calendario = [];
        $this->diasDelMes = $fechaActual->daysInMonth;
        $this->anno = $fechaActual->year;
        $this->mes = $fechaActual->englishMonth;
        for ($i = 1; $i <= $this->diasDelMes; $i++) {
            $fecha = Carbon::createFromDate($fechaActual->year, $fechaActual->month, $i);
            $diaDeLaSemana = $fecha->dayOfWeekIso;
            if (isset($this->agenda[$fecha->timestamp])) {
                $this->calendario["dia_$i"] = [$diaDeLaSemana, count($this->agenda[$fecha->timestamp]), json_encode($this->agenda[$fecha->timestamp])];
            } else
                $this->calendario["dia_$i"] = [$diaDeLaSemana, 0, false];

            if ($i == 1) {
                $this->inicio = $this->calendario["dia_$i"][0] - 1;
            }
        }
    }

    public function increment()
    {
        $this->controlMes += 1;
        $this->fechaActual = $this->fechaActual->addMonth();
        $this->anno = $this->fechaActual->year;
        $this->mes = $this->fechaActual->month;
        $this->fechasRegistradas = DB::select("SELECT product_id, fecha_trabajo, DAY(fecha_trabajo) AS dia, TIME(fecha_trabajo) AS hora FROM orders WHERE MONTH(fecha_trabajo) = $this->mes AND YEAR(fecha_trabajo) = $this->anno");

        foreach ($this->fechasRegistradas as $value) {
            $datosCita = explode(" ", $value->fecha_trabajo);
            $horaCita = $datosCita[1];
            $fechaCita = explode("-", $datosCita[0]);
            $timestampCita = Carbon::createFromDate($fechaCita[0], $fechaCita[1], $fechaCita[2]);
            $this->agenda[$timestampCita->timestamp][] = $horaCita;
        }
        $this->diasDelMes = $this->fechaActual->daysInMonth;
        $this->calcularDias($this->fechaActual);
    }
    public function decrement()
    {
        if ($this->controlMes > 0) {
            $this->controlMes -= 1;
            $this->fechaActual = $this->fechaActual->subMonth();
            $this->anno = $this->fechaActual->year;
            $this->mes = $this->fechaActual->month;
            // $fechaActual = Carbon::parse('2024-01-01 23:26:11.123789');
            $this->fechasRegistradas = DB::select("SELECT product_id, fecha_trabajo, DAY(fecha_trabajo) AS dia, TIME(fecha_trabajo) AS hora FROM orders WHERE MONTH(fecha_trabajo) = $this->mes AND YEAR(fecha_trabajo) = $this->anno");

            foreach ($this->fechasRegistradas as $value) {
                $datosCita = explode(" ", $value->fecha_trabajo);
                $horaCita = $datosCita[1];
                $fechaCita = explode("-", $datosCita[0]);
                $timestampCita = Carbon::createFromDate($fechaCita[0], $fechaCita[1], $fechaCita[2]);
                $this->agenda[$timestampCita->timestamp][] = $horaCita;
            }
            $this->diasDelMes = $this->fechaActual->daysInMonth;
            $this->calcularDias($this->fechaActual);
        }
    }
    public function render()
    {
        return view('livewire.calendario')->with(['products' => Product::all()]);
    }
}
