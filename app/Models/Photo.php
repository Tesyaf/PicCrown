<?php

namespace App\Models;

use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Crypt;

/**
 * @property mixed $encrypted_path
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Rating> $ratings
 * @property-read int|null $ratings_count
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Photo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Photo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Photo query()
 * @mixin \Eloquent
 */
class Photo extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'encrypted_path',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ratings() : HasMany
    {
        return $this->hasMany(Rating::class);
    }
    public function setEncryptedPathAttribute($value)
    {
        $this->attributes['encrypted_path'] = Crypt::encryptString($value);
    }
    public function getEncryptedPathAttribute($value)
    {
        try {
            return Crypt::encryptString($value);
        } catch (DecryptException $e) {
            logger()->error("Dekripsi path foto gagal: " . $this->id);
            return ''; 
        }
    }
}
