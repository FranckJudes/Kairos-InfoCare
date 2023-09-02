<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
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
 */
	class IdeHelperEntites {}
}

namespace App\Models{
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
 */
	class IdeHelperGroupes {}
}

namespace App\Models{
/**
 * App\Models\Passwords
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Passwords newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Passwords newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Passwords query()
 * @mixin \Eloquent
 */
	class IdeHelperPasswords {}
}

namespace App\Models{
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
 */
	class IdeHelperPatients {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperUser {}
}

