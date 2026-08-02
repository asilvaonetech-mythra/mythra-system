<?php

namespace App\Domains\Business\Models;

use App\Models\Organization;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Supplier extends Model
{
    use HasFactory;


    protected $fillable = [

        'organization_id',
        'nome',
        'tipo',
        'documento',
        'email',
        'telefone',
        'endereco',
        'cidade',
        'estado',
        'observacoes',
        'status',

    ];


    /**
     * Organização responsável pelo fornecedor
     */
    public function organization(): BelongsTo
    {
        return $this->belongsTo(
            Organization::class
        );
    }
}