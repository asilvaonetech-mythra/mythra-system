<?php

namespace App\Models;

use App\Traits\Auditable;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Setting extends Model
{
    use SoftDeletes;
    use Auditable;



    /**
     * Módulo de auditoria.
     */
    protected string $auditModule = 'settings';



    /**
     * Campos preenchíveis.
     */
    protected $fillable = [

        'group',

        'key',

        'display_name',

        'description',

        'value',

        'type',

        'default_value',

        'sort_order',

        'autoload',

        'encrypted',

        'is_public',

        'is_system',

        'is_active',

        'created_by',

        'updated_by',

    ];



    /**
     * Conversões.
     */
    protected $casts = [

        'autoload'   => 'boolean',

        'encrypted'  => 'boolean',

        'is_public'  => 'boolean',

        'is_system'  => 'boolean',

        'is_active'  => 'boolean',

        'sort_order' => 'integer',

    ];



    /*
    |--------------------------------------------------------------------------
    | Scopes
    |--------------------------------------------------------------------------
    */

    public function scopeActive($query)
    {
        return $query->where(

            'is_active',

            true

        );
    }



    public function scopeAutoload($query)
    {
        return $query->where(

            'autoload',

            true

        );
    }



    public function scopePublic($query)
    {
        return $query->where(

            'is_public',

            true

        );
    }



    public function scopeGroup(
        $query,
        string $group
    ) {

        return $query->where(

            'group',

            $group

        );

    }



    /*
    |--------------------------------------------------------------------------
    | Helpers
    |--------------------------------------------------------------------------
    */

    public function getValueAttribute($value)
    {

        if ($value === null) {

            return $this->default_value;

        }


        return match ($this->type) {


            'boolean' => filter_var(

                $value,

                FILTER_VALIDATE_BOOLEAN

            ),


            'integer' => (int) $value,


            'float' => (float) $value,


            'json' => json_decode(

                $value,

                true

            ),


            default => $value,


        };

    }



    public function setValueAttribute($value)
    {

        if (is_array($value)) {

            $this->attributes['value'] = json_encode(

                $value,

                JSON_UNESCAPED_UNICODE

            );

            return;

        }


        $this->attributes['value'] = $value;

    }



    public function getTypedValue()
    {
        return $this->value;
    }



    public function isEncrypted(): bool
    {
        return $this->encrypted;
    }



    public function isSystem(): bool
    {
        return $this->is_system;
    }



    public function isPublic(): bool
    {
        return $this->is_public;
    }
}