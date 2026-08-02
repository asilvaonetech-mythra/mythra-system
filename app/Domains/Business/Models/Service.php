<?php

namespace App\Domains\Business\Models;

use App\Models\Organization;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Service extends Model
{
    use HasFactory;



    protected $fillable = [

        'organization_id',
        'nome',
        'codigo',
        'categoria',
        'descricao',
        'valor',
        'duracao',
        'status',

    ];



    /**
     * Organização responsável pelo serviço
     */
    public function organization(): BelongsTo
    {
        return $this->belongsTo(
            Organization::class
        );
    }

}