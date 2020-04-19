<?php

namespace App\Exports;

use App\User;
use App\Venta;
use App\Coche;
use App\Traits\Bastidor;
use App\Mail\CompraCocheEmail;
use App\Mail\SolicitarPago;
use Auth;
use Mail;
use Session;
use Carbon\Carbon;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithTitle;

class ExcelExport implements FromView, ShouldAutoSize, WithEvents, WithTitle
{
    public function view(): View
    {
    	$user = Auth::user(); // obtengo el usuario actualmente logueado
        $ventas = Venta::all();
        $usuarios = User::all();
        $coches = Coche::all();
        $estados  = [];
        $contadorVentasCliente = 0;
        $contadorVentasEmpleado = 0;
        foreach ($ventas as $key => $venta) {
            if($user->id == $venta->id_cliente){
                $contadorVentasCliente++;
            }
            if($user->id == $venta->id_empleado){
                $contadorVentasEmpleado++;
            }
        }
        //dd($contadorVentasEmpleado);
        return view("venta.excel",
            [
                "ventas"=>$ventas,
                "usuarios"=>$usuarios,
                "coches"=>$coches,
                "estados"=>$estados,
                "user" => $user,
                "contadorVentasEmpleado" => $contadorVentasEmpleado,
                "contadorVentasCliente" => $contadorVentasCliente
            ]);
    }

    
    /**
     * @return array
     */
    public function registerEvents(): array
    {
        $styleArray = [
            'font' => [
                'bold' => true,
            ]
        ];

        return [
            // Handle by a closure.
            AfterSheet::class => function (AfterSheet $event) use ($styleArray) {
                // $event->sheet->insertNewRowBefore(7, 2);
                // $event->sheet->insertNewColumnBefore('A', 2);
                $event->sheet->getStyle('A1:G1')->applyFromArray($styleArray);
                $event->sheet->setCellValue('E27', '=SUM(E2:E26)');
            },
        ];
    }


    public function headings(): array
    {
        return [
            'Clientes',
            'DNI Cliente',
            'Empleado',
            'DNI Empleado',
            'Marca',
            'Matrícula',
            'Precio',
        ];
    }

    /**
     * @return string
     */
    public function title(): string
    {
    	//Nombre a la hoja del excel
        return 'Ventas Concesionarios Portillo';
    }
}