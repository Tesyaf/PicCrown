<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Photo;

class RatingController extends Controller
{
    public function store(Request $request, Photo $photo)
    {
        $request->validate([
            'score' => 'nullable|integer|min:1|max:5', 
            
            'comment' => 'nullable|string|max:500', 
            
            'parent_id' => 'nullable|uuid|exists:ratings,id', 
        ]);
        
        $scoreInput = $request->score;
        $commentInput = $request->comment;

        if (is_null($scoreInput) && is_null($commentInput)) {
             return back()->withErrors(['score' => 'Anda harus memberikan skor atau menulis komentar.'])->withInput();
        }
        
        // Jika ini balasan (parent_id ada), pastikan tidak ada skor
        // Bisnis Rule: Skor hanya diberikan pada komentar utama (opsional, tapi disarankan)
        if ($request->parent_id && $scoreInput) {
             return back()->withErrors(['score' => 'Skor rating hanya boleh diberikan pada komentar utama, bukan pada balasan.'])->withInput();
        }
        
        Auth::user()->ratings()->create([
            'photo_id' => $photo->id,
            'parent_id' => $request->parent_id,
            
            'score' => $request->parent_id ? null : $scoreInput, 
            
            'encrypted_comment' => $commentInput, // Input mentah (Mutator akan mengenkripsi)
        ]);

        return back()->with('status', 'Rating atau komentar Anda berhasil ditambahkan!')->withFragment('comments');
    }

    public function update(Request $request, Rating $rating)
    {
        if (Auth::id() !== $rating->user_id) {
            abort(403, 'Anda tidak berhak mengedit rating atau komentar ini.');
        }

        $request->validate([
            'score' => 'nullable|integer|min:1|max:5', 
            'comment' => 'nullable|string|max:500', 
        ]);
        
        $scoreInput = $request->score;
        $commentInput = $request->comment;
        
        if ($rating->parent_id && $scoreInput) {
            return back()->withErrors(['score' => 'Balasan komentar tidak dapat diperbarui dengan skor rating.'])->withInput();
        }

        if (is_null($scoreInput) && is_null($commentInput)) {
             return back()->withErrors(['score' => 'Anda harus memberikan skor atau menulis komentar.'])->withInput();
        }

        $rating->update([
            'score' => $rating->parent_id ? null : $scoreInput, 
            
            'encrypted_comment' => $commentInput, 
        ]);

        return back()->with('status', 'Komentar/Rating berhasil diperbarui.')->withFragment('comments');
    }

    public function destroy(Rating $rating)
    {
        if (Auth::id() !== $rating->user_id) {
            abort(403, 'Anda tidak berhak menghapus rating atau komentar ini.');
        }
        
        // Hapus rating/komentar
        // Karena ada relasi cascade pada parent_id, semua balasan (jika ada) akan ikut terhapus.
        $rating->delete(); 

        return back()->with('status', 'Komentar berhasil dihapus.')->withFragment('comments');
    }
}
