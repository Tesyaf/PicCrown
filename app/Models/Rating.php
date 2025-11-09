<?php

namespace App\Models;

use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Support\Facades\Crypt;

/**
 * @property mixed $encrypted_comment
 * @property-read Rating|null $parent
 * @property-read \App\Models\Photo|null $photo
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Rating> $replies
 * @property-read int|null $replies_count
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Rating newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Rating newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Rating query()
 * @mixin \Eloquent
 */
class Rating extends Model
{
    use HasFactory, HasUuids;
    protected $fillable = [
        'photo_id',
        'user_id',
        'parent_id',
        'score',
        'encrypted_comment',
    ];
    public function photo()
    {
        return $this->belongsTo(Photo::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function parent()
    {
        return $this->belongsTo(Rating::class, 'parent_id');
    }
    public function replies()
    {
        return $this->hasMany(Rating::class, 'parent_id');
    }
    public function setEncryptedCommentAttribute($value)
    {
        if (is_null($value) || trim($value) === '') {
            $this->attributes['encrypted_comment'] = null;
        } else {
            $this->attributes['encrypted_comment'] = Crypt::encryptString($value);
        }
    }
    public function getEncryptedCommentAttribute($value)
    {
        if (is_null($value)) {
            return null;
        }
        
        try {
            return Crypt::decryptString($value);
        } catch (DecryptException $e) {
            logger()->error("Dekripsi komentar gagal: " . $this->id);
            return '[Komentar Gagal Dimuat]'; 
        }
    }
}
