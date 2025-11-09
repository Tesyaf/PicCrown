<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'name',
        'email',
        'password',
        // tambahin kalau nanti pake: 'avatar', 'bio', 'location', 'website', dst.
    ];
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function viewPublicProfile(User $user)
    {
        $isOwner   = auth()->check() && auth()->id() === $user->id;

        // Ambil data yang diperlukan (contoh)
        $photos    = $user->photos()->latest()->take(12)->get(); // id, title, url, avg_score...
        $avgScore  = number_format($user->ratings()->avg('score') ?? 4.7, 1);
        $rank      = $user->rank ?? '#42';

        // contoh: status follow
        $isFollowing = false;
        $isFollowing = auth()->check() && !$isOwner
            ? auth()->user()->following()->where('followed_user_id', $user->id)->exists()
            : false;

        return view('profile', compact('user','photos','avgScore','rank','isOwner','isFollowing'));
    }

    public function following()
    {
        return $this->belongsToMany(
            User::class,
            'follows',
            'follower_id',       // kolom pivot yang menunjuk ke user (this)
            'followed_user_id'   // kolom pivot yang menunjuk ke user lain
        )->withTimestamps();
    }

    // Users yang mengikuti user ini
    public function followers()
    {
        return $this->belongsToMany(
            User::class,
            'follows',
            'followed_user_id',  // kolom pivot yang menunjuk ke user (this)
            'follower_id'        // kolom pivot yang menunjuk ke follower
        )->withTimestamps();
    }
}
