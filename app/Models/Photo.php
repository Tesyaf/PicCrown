<?php

namespace App\Models;

use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Crypt;

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

    public function ratings(): HasMany
    {
        return $this->hasMany(Rating::class);
    }

    // Setter → mengenkripsi sebelum disimpan
    public function setEncryptedPathAttribute($value)
    {
        $this->attributes['encrypted_path'] = Crypt::encryptString($value);
    }

    // Getter → mendekripsi sebelum digunakan
    public function getEncryptedPathAttribute($value)
    {
        try {
            return Crypt::decryptString($value);
        } catch (DecryptException $e) {
            logger()->error("Dekripsi path foto gagal: " . $this->id);
            return '';
        }
    }

    public function getEncryptedDescriptionAttribute($value)
    {
        try {
            return Crypt::decryptString($value);
        } catch (DecryptException $e) {
            logger()->error("Dekripsi deskripsi foto gagal: " . $this->id);
            return '';
        }
    }
}
