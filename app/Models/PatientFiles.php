<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientFiles extends Model
{
    use HasFactory;

    protected $table = 'patient_files';
    protected $fillable = [
        'patients_id',
        'plan_classement_id',
        'filename',
        'filepath'
    ];

    public function planClassement()
    {
        return $this->belongsTo(PlanClassement::class);
    }
}
