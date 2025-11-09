<?php

namespace App\Policies;

use App\Models\Photo;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PhotoPolicy
{
    public function update(User $user, Photo $photo): bool
    {
        return $user->id === $photo->user_id;
    }

    public function delete(User $user, Photo $photo): bool
    {
        return $user->id === $photo->user_id;
    }
}
