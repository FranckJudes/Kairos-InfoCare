<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Entites
 *
 * @property int $id
 * @property string $code
 * @property string $libelle
 * @property string|null $parent_id
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Entites> $children
 * @property-read int|null $children_count
 * @property-read Entites|null $parent
 * @method static \Illuminate\Database\Eloquent\Builder|Entites newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Entites newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Entites query()
 * @method static \Illuminate\Database\Eloquent\Builder|Entites whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Entites whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Entites whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Entites whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Entites whereLibelle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Entites whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Entites whereUpdatedAt($value)
 * @mixin \Eloquent
 * @mixin IdeHelperEntites
 */
class Entites extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'libelle',
        'description',
        'responsable'
    ];

    public function parent()
    {
        return $this->belongsTo(Entites::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Entites::class, 'parent_id');
    }
    public function users()
    {
        return $this->belongsTo(User::class);
    }

}
