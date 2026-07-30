<?php

namespace App\Models\Talent;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Talent\TalentProfile;

class Curriculum extends Model
{
    use HasFactory;

    protected $table = 'curriculums';

    protected $fillable = [

        'talent_profile_id',

        'resumo',

        'formacao',

        'experiencias',

        'idiomas',

        'status',

    ];

    /**
     * Perfil do talento.
     */
    public function talentProfile()
    {
        return $this->belongsTo(
            TalentProfile::class,
            'talent_profile_id'
        );
    }
}