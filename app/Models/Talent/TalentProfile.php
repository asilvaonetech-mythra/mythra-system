<?php

namespace App\Models\Talent;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TalentProfile extends Model
{
    use HasFactory;

    protected $table = 'talent_profiles';

    protected $fillable = [

        'nome_completo',

        'email',

        'telefone',

        'data_nascimento',

        'cidade',

        'estado',

        'objetivo',

        'biografia',

        'status',

    ];

    /**
     * Currículo.
     */
    public function curriculum()
    {
        return $this->hasOne(
            Curriculum::class,
            'talent_profile_id'
        );
    }

    /**
     * Competências.
     */
    public function talentSkills()
    {
        return $this->hasMany(
            TalentSkill::class,
            'talent_profile_id'
        );
    }

    /**
     * Processos seletivos.
     */
    public function selections()
    {
        return $this->hasMany(
            SelectionProcess::class,
            'talent_profile_id'
        );
    }
}