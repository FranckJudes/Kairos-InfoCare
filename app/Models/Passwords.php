<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Passwords
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Passwords newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Passwords newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Passwords query()
 * @mixin \Eloquent
 * @mixin IdeHelperPasswords
 */
class Passwords extends Model
{
    use HasFactory;
    protected $fillable = [
        'libelle',
        'valeur',
        'description'
    ];
}
