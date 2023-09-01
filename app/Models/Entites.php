<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    // protected $guarded = [];
    // public static function tree()
    // {
    //     $allEntites = Entites::get();
    //     $rootEntites = $allEntites->whereNull('parent_id');

    //         self::formatTree($rootEntites,$allEntites);
    //         return $rootEntites;
    // }

    // private static function formatTree($entites ,$allEntites){
    //     foreach ($entites as $entite) {
    //         $entite->children = $allEntites->where('parent_id',$entite->id)->values();
         
    //         if ($entite->children->isNotEmpty()){
    //             self::formatTree($entite->children,$allEntites);
    //         }
    //     }
    // }
}
