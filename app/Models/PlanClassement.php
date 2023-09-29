<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanClassement extends Model
{
    use HasFactory;

    protected $fillable = [
        'libelle',
        'description',
        'parent_id',
        'type'
    ];

    
    public function parent()
    {
        return $this->belongsTo(PlanClassement::class, 'parent_id');
    }
    public function children()
    {
        return $this->hasMany(Entites::class, 'parent_id');
    }

   
    public function patientFiles()
    {
        return $this->hasMany(PatientFiles::class);
    }
}
