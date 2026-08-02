<?php

namespace App\Models;

use App\Domains\Business\Models\Customer;
use App\Domains\Business\Models\Product;
use App\Domains\Business\Models\Supplier;
use App\Domains\Business\Models\Unit;
use App\Domains\Business\Models\Service;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Organization extends Model
{
    use HasFactory;


    protected $fillable = [

        'nome',
        'documento',
        'segmento',
        'descricao',
        'localizacao',
        'responsavel_user_id',
        'status',

    ];



    /**
     * Usuário responsável pela organização
     */
    public function responsibleUser(): BelongsTo
    {
        return $this->belongsTo(
            User::class,
            'responsavel_user_id'
        );
    }



    /**
     * Oportunidades da organização
     */
    public function opportunities(): HasMany
    {
        return $this->hasMany(
            Opportunity::class
        );
    }



    /**
     * Unidades da organização
     */
    public function units(): HasMany
    {
        return $this->hasMany(
            Unit::class
        );
    }



    /**
     * Clientes da organização
     */
    public function customers(): HasMany
    {
        return $this->hasMany(
            Customer::class
        );
    }



    /**
     * Fornecedores da organização
     */
    public function suppliers(): HasMany
    {
        return $this->hasMany(
            Supplier::class
        );
    }



    /**
     * Produtos da organização
     */
    public function products(): HasMany
    {
        return $this->hasMany(
            Product::class
        );
    }

}

/**
 * Serviços da organização
 */
public function services(): HasMany
{
    return $this->hasMany(
        Service::class
    );
}