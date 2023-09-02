<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Groupes
 *
 * @property int $id
 * @property string $libelle
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Groupes newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Groupes newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Groupes query()
 * @method static \Illuminate\Database\Eloquent\Builder|Groupes whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Groupes whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Groupes whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Groupes whereLibelle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Groupes whereUpdatedAt($value)
 * @mixin \Eloquent
 * @mixin IdeHelperGroupes
 */
class Groupes extends Model
{
    use HasFactory;
    protected $fillable   =[
        'libelle',
        'description'
    ];
    
}
