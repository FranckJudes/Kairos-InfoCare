<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class PlanClassement extends Model
{
    use HasFactory;

    protected $fillable = [
        'libelle',
        'description',
        'parent_id',
        'type'
    ];

    public function patient()
    {
        return $this->hasMany(Patient::class);
    }
    public function parent()
    {
        return $this->belongsTo(PlanClassement::class, 'parent_id');
    }
    public function children()
    {
        return $this->hasMany(Entites::class, 'parent_id');
    }
}
