<?php

namespace App\Models;

use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
    public function setEncryptedPathAttribute($value)
    {
        try {
            return Crypt::encryptString($value);
        } catch (DecryptException $e) {
            logger()->error("Dekripsi path foto gagal: " . $this->id);
            return ''; 
        }
    }
    public function getEncryptedPathAttribute($value)
    {
        $this->attributes['encrypted_path'] = Crypt::encryptString($value);
    }
}
