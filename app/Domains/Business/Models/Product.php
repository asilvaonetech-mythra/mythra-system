<?php

namespace App\Domains\Business\Models;

use App\Models\Organization;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Product extends Model
{
    use HasFactory;


    protected $fillable = [

        'organization_id',
        'nome',
        'codigo',
        'tipo',
        'categoria',
        'descricao',
        'valor',
        'unidade',
        'status',

    ];



    /**
     * Organização proprietária do produto
     */
    public function organization(): BelongsTo
    {
        return $this->belongsTo(
            Organization::class
        );
    }

}