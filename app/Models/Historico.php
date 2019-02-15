<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Historico extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tipo',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tipo($tipo = null)
    {
        $tipos = [
            'E' => 'Entrada',
            'S' => 'Saída',
        ];

        if (!$tipo)
            return $tipos;

        return $tipos[$tipo];
    }

}
