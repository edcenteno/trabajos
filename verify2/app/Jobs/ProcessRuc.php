<?php

namespace App\Jobs;

use App\Company;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ProcessRuc implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $company;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Company $company)
    {
        $this->company = $company;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(){

        $company = new \Sunat\Sunat( true, true );
        $ruc = $this->company->ruc;

        $i =0;

        do{
            if ($i > 0) {
                sleep(10);
                $result = $company->search( $ruc );
            }else{
                $result = $company->search( $ruc );
            }
            $i++;

       }while ($result->success == true && $i <= 3);
        if ($result->success == true) {
            $this->company->razon_social =$result->result->razon_social;
            $this->company->condicion =$result->result->condicion;
            $this->company->nombre_comercial =$result->result->nombre_comercial;
            $this->company->tipo =$result->result->tipo;
            $this->company->fecha_inscripcion =$result->result->fecha_inscripcion;
            $this->company->estado =$result->result->estado;
            $this->company->direccion =$result->result->direccion;             // Solo Empresas
            $this->company->sistema_emision =$result->result->sistema_emision;
            $this->company->actividad_exterior =$result->result->actividad_exterior;
            $this->company->oficio =$result->result->oficio;                // Solo Personas
            $this->company->actividad_economica =$result->result->actividad_economica;
            $this->company->sistema_contabilidad =$result->result->sistema_contabilidad;
            $this->company->emision_electronica =$result->result->emision_electronica;
            $this->company->ple =$result->result->ple;
            $this->company->emision_electronica =$result->result->emision_electronica;
            $this->company->cantidad_trabajadores =$result->result->cantidad_trabajadores;
            $this->company->representantes_legales =$result->result->representantes_legales;
            $this->company->save();
        }else{
            $this->company->razon_social = "No existe en la SUNAT.";
            $this->company->save();
        }


    }
}
