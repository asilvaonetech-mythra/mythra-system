<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Audit extends Model
{

    use HasFactory;



    /**
     * Tabela.
     */
    protected $table = 'audits';



    /**
     * Campos preenchíveis.
     */
    protected $fillable = [

        'user_id',

        'module',

        'action',

        'model',

        'model_id',

        'old_values',

        'new_values',

        'ip_address',

        'user_agent',

    ];



    /**
     * Conversões.
     */
    protected function casts(): array
    {
        return [

            'old_values' => 'array',

            'new_values' => 'array',

        ];
    }



    /**
     * Usuário responsável.
     */
    public function user()
    {
        return $this->belongsTo(

            User::class

        );
    }



    /**
     * Registro afetado.
     */
    public function auditable()
    {
        return $this->morphTo(

            'model'

        );
    }


}