<?php

namespace App\Models;

use App\Models\Local;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Room extends Model
{
    /** @use HasFactory<\Database\Factories\RoomFactory> */
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['name', 'id_local'];

    const ROOMS_PORTO = [
        'Sala 1' => 1,
        'Sala 2' => 1,
        'Sala 3' => 1,
        'Sala 4' => 1,
        'Sala 5' => 1,
        'Sala 6' => 1,
        'Sala 7' => 1,
        'Laboratório 2' => 1,
    ];

    const ROOMS_SJM = [
        'Sala 1' => 2,
        'Sala 2' => 2,
    ];

    const ROOMS_MDC = [
        'Sala 1' => 3,
        'Sala 2' => 3,
        'Sala 3' => 3,
        'Sala 4' => 3,
    ];

    /**  Método para verificar se o nome da sala existe na lista de salas padrão. */
    public static function isDefaultPorto($name)
    {
        return array_key_exists($name, self::ROOMS_PORTO);
    }

    public static function isDefaultSJM($name)
    {
        return array_key_exists($name, self::ROOMS_SJM);
    }

    public static function isDefaultMDC($name)
    {
        return array_key_exists($name, self::ROOMS_MDC);
    }

    /** Método para adicionar novas salas ao banco. */
    public static function addNewRoom($name)
    {
        if (!self::isDefault($name) && !self::where('name', $name)->exists()) {
            return self::create(['name' => $name]);
        }
        return null;
    }

    public function local()
    {
        return $this->belongsTo(Local::class, 'id_local');
    }
}
