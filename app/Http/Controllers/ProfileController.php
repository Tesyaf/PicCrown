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
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();

        // Validasi input
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'bio' => ['nullable', 'string', 'max:500'],
            'location' => ['nullable', 'string', 'max:150'],
            'avatar' => ['nullable', 'image', 'max:2048'],
            'password' => ['nullable', 'confirmed', 'min:8'],
        ]);

        // Upload avatar jika ada
        if ($request->hasFile('avatar')) {
            if ($user->avatar_url && file_exists(public_path('storage/' . $user->avatar_url))) {
                unlink(public_path('storage/' . $user->avatar_url));
            }
            $validated['avatar_url'] = $request->file('avatar')->store('avatars', 'public');
        }

        // Simpan password hanya kalau diisi
        if (!empty($validated['password'])) {
            $validated['password'] = bcrypt($validated['password']);
        } else {
            // Pastikan password lama tetap dipakai
            unset($validated['password']);
        }

        // Update field lain
        $user->fill($validated);

        // Reset verifikasi email kalau email berubah
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        return Redirect::route('profile.edit')->with('success', 'Profil berhasil diperbarui!');
    }


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
        $isOwner = auth()->check() && auth()->id() === $user->id;
        $photos = $user->photos()->latest()->take(12)->get();

        // Hitung skor rata-rata
        $avgScore = round($user->photos()
            ->join('ratings', 'ratings.photo_id', '=', 'photos.id')
            ->avg('ratings.score'), 2) ?? 0;

        // Hitung ranking
        $rank = User::select('users.id')
            ->join('photos', 'photos.user_id', '=', 'users.id')
            ->join('ratings', 'ratings.photo_id', '=', 'photos.id')
            ->selectRaw('users.id, AVG(ratings.score) as avg_score')
            ->groupBy('users.id')
            ->orderByDesc('avg_score')
            ->pluck('users.id')
            ->search($user->id) + 1;

        $isFollowing = false;
        if (auth()->check() && !$isOwner) {
            $isFollowing = auth()->user()
                ->following()
                ->where('followed_user_id', $user->id)
                ->exists();
        }

        // Statistik tambahan
        $totalLikes = $user->photos()
            ->join('ratings', 'ratings.photo_id', '=', 'photos.id')
            ->where('ratings.score', '>=', 4)
            ->count();

        $totalComments = $user->photos()
            ->join('ratings', 'ratings.photo_id', '=', 'photos.id')
            ->whereNotNull('ratings.encrypted_comment')
            ->count();

        $totalRatings = $user->photos()
            ->join('ratings', 'ratings.photo_id', '=', 'photos.id')
            ->count();

        return view('profile.public', compact(
            'user', 'photos', 'avgScore', 'rank',
            'isOwner', 'isFollowing',
            'totalLikes', 'totalComments', 'totalRatings'
        ));
    }
}
