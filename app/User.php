<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Carbon\Carbon;
use Cache;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    protected $fillable = [
        'nombre','telefono', 'edad', 'usuario', 'sexo', 'ciudad_id', 'nacionalidad', 'password','altura', 'busto', 'cintura', 'caderas', 'descripcion', 'tipo_usuario', 'perfil_url', 'foto_uno_url', 'foto_dos_url', 'foto_tres_url', 'foto_cuatro_url', 'foto_cinco_url', 'foto_seis_url', 'foto_siete_url', 'foto_ocho_url', 'foto_nueve_url', 'foto_diez_url', 'foto_once_url', 'foto_doce_url'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getFotosAttribute(){
        $fotos = array();

        if($this->foto_uno_url != null) array_push($fotos, $this->foto_uno_url);
        if($this->foto_dos_url != null) array_push($fotos, $this->foto_dos_url);
        if($this->foto_tres_url != null) array_push($fotos, $this->foto_tres_url);
        if($this->foto_cuatro_url != null) array_push($fotos, $this->foto_cuatro_url);
        if($this->foto_cinco_url != null) array_push($fotos, $this->foto_cinco_url);
        if($this->foto_seis_url != null) array_push($fotos, $this->foto_seis_url);
        if($this->foto_siete_url != null) array_push($fotos, $this->foto_siete_url);
        if($this->foto_ocho_url != null) array_push($fotos, $this->foto_ocho_url);
        if($this->foto_nueve_url != null) array_push($fotos, $this->foto_nueve_url);
        if($this->foto_diez_url != null) array_push($fotos, $this->foto_diez_url);
        if($this->foto_once_url != null) array_push($fotos, $this->foto_once_url);
        if($this->foto_doce_url != null) array_push($fotos, $this->foto_doce_url);
        
        return $fotos;
    }

    public function getCiudadAttribute(){
        switch ($this->ciudad_id) {
            case 1:
                return "Concepción";
                break;
            case 2:
                return "Chillán";
                break;
            case 3:
                return "Los Ángeles";
                break;
            default:
                return "Desconocido";
                break;
        }
    }

    public function getLinkWhatsappAttribute(){
        return 'https://api.whatsapp.com/send?phone=56' . $this->telefono . '&text=Cont%C3%A1cto%20desde%20placerconce.cl'; 
    }

    public function getCelularAttribute(){
        return '+56 ' . $this->telefono;
    }

    public function getUltimaActualizacionAttribute(){
        
        return Carbon::parse($this->updated_at)->diffInHours(Carbon::now());
    }

    public function getNotaAttribute(){
        $calificaciones = $this->hasMany(ValoracionUsuario::class, 'user_id');

        return $calificaciones->count() > 0 ? round($calificaciones->avg('nota'), 1) : 0;
    }

    public function getNotaFotosAttribute(){
        $calificaciones = $this->hasMany(ValoracionUsuario::class, 'user_id');

        return $calificaciones->count() > 0 ? round($calificaciones->avg('fotos'), 1) : 0;
    }

    public function getNotaDisponibilidadAttribute(){
        $calificaciones = $this->hasMany(ValoracionUsuario::class, 'user_id');

        return $calificaciones->count() > 0 ? round($calificaciones->avg('disponibilidad'), 1) : 0;
    }

    public function getNotaAtencionAttribute(){
        $calificaciones = $this->hasMany(ValoracionUsuario::class, 'user_id');

        return $calificaciones->count() > 0 ? round($calificaciones->avg('atencion'), 1) : 0;
    }

    public function getVideoAttribute(){
        $videos = $this->HasMany(Video::class, 'user_id');

        if($this->video_url == null || $this->video_url == '' || $videos->count() == 0){
            return 0;
        } else {  
            return 1;
        }
    }

    public function getCantidadValoracionesAttribute(){
        return $this->hasMany(ValoracionUsuario::class, 'user_id')->count();
    }

    public function getValoracionesAttribute(){
        $calificaciones = $this->hasMany(ValoracionUsuario::class, 'user_id');

        $rostro = $calificaciones->sum('rostro');
        $cuerpo = $calificaciones->sum('cuerpo');
        $trato = $calificaciones->sum('trato');
        $besos = $calificaciones->sum('besos');
        $cama = $calificaciones->sum('cama');
        $sexo_oral = $calificaciones->sum('sexo_oral');
        $sexo_anal = $calificaciones->sum('sexo_anal');
        $oral_mutuo = $calificaciones->sum('oral_mutuo');
        $trasero = $calificaciones->sum('trasero');
        $senos = $calificaciones->sum('senos');
        $americana = $calificaciones->sum('americana');
        $fogosa = $calificaciones->sum('fogosa');

        $calificacion = array(
            'ROSTRO' => $rostro,
            'CUERPO' => $cuerpo,
            'TRATO' => $trato,
            'BESOS' => $besos,
            'MOVIMIENTOS' => $cama,
            'SEXO ORAL' => $sexo_oral,
            'SEXO ANAL' => $sexo_anal,
            'ORAL MUTUO' => $oral_mutuo,
            'TRASERO' => $trasero,
            'SENOS' => $senos,
            'AMERICANA' => $americana,
            'FOGOSA' => $fogosa
        );

        arsort($calificacion);

        $caracteristicas = array();

        foreach($calificacion AS $key => $val){
            array_push($caracteristicas, $key);
        }
        
        return $caracteristicas;
    }

    public function getVideosAttribute(){
        $videos = array();
        
        $videos = $this->HasMany(Video::class, 'user_id')->pluck('video_url');
    
        if($this->video_url != null){
            $videos->push($this->video_url);
        }

        return $videos;
    }
     public function messages()
    {
        return $this->hasMany(Message::class);
    }
        public function isOnline()
    {
        return Cache::has('user-is-online-'. $this->id);
    }
}
