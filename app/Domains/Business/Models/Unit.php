<?php

namespace App\Domains\Business\Models;

use App\Models\Organization;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Unit extends Model
{
    use HasFactory;

    protected $fillable = [

        'organization_id',
        'nome',
        'codigo',
        'tipo',
        'descricao',
        'localizacao',
        'status',

    ];


    public function organization()
    {
        return $this->belongsTo(
            Organization::class
        );
    }
}