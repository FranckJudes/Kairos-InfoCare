<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Patients
 *
 * @property int $id
 * @property string $nomPrenoms
 * @property string $sexe
 * @property string|null $adresseMail
 * @property string|null $NumeroTelephone
 * @property string $dateNaissance
 * @property string $quartier
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Patients newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Patients newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Patients query()
 * @method static \Illuminate\Database\Eloquent\Builder|Patients whereAdresseMail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patients whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patients whereDateNaissance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patients whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patients whereNomPrenoms($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patients whereNumeroTelephone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patients whereQuartier($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patients whereSexe($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patients whereUpdatedAt($value)
 * @mixin \Eloquent
 * @mixin IdeHelperPatients
 */
class Patients extends Model
{
    use HasFactory;
    protected $fillable=[
      'titrePatient',
      'name',
      'lastname',
      'sexe',
      'dateNaissance',
      'cni',
      'numeroTelephone',
      'IdentiteGenre',
      'OrientationSexuel',
      'adresse',
      'codePostal',
      'nomMere',
      'region',
      'TelephoneUrgence',
      'TelephoneProfessionel',
      'emailDuContact',
      'AntecedentMedicaux',
      'allergie',
      'chirugieAnterieurs',
      'MedicamentsActuel',
      'ProblemeSante',
      'HistoriqueVaccination',
      'resultatTestMedicaux',
      'nomEmployeur',
      'contactEmployeur',
      'dateDeces',
      'raisonDeces',
      'nomGuardian',
      'LienParent',
      'sexeParente',
      'AdresseLienParente',
      'TelephoneProfessionelLienParente',
      'CourrielLienParente',
      'villeLienParente',
      'codePostalLienParente',
      'numeroPoliceAssurance',
      'detailAssuranceMedicale',
      'dateExpirationAssurance',
      'coordonneAssurance'
    
    ];
    
    public function classement()
    {
        return $this->belongsTo(PlanClassement::class);
    }
}
