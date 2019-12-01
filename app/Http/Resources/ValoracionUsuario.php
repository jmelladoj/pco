<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ValoracionUsuario extends JsonResource
{
    /**
     * Transform the resource into an array.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'atencion' => $this->atencion,
            'disponibilidad' => $this->disponibilidad,
            'fotos' => $this->fotos,
            'nota' => $this->nota,
            'rostro' => $this->rostro,
            'cuerpo' => $this->cuerpo,
            'trato' => $this->trato,
            'besos' => $this->besos,
            'cama' => $this->cama,
            'sexo_oral' => $this->sexo_oral,
            'sexo_anal' => $this->sexo_anal,
            'oral_mutuo' => $this->oral_mutuo,
            'trasero' => $this->trasero,
            'senos' => $this->senos,
            'americana' => $this->americana,
            'fogosa' => $this->fogosa,
            'fecha' => $this->fecha           
        ];
    }
}
