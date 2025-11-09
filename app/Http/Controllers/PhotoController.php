<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{

    public function create()
    {
        return view('photos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'photo_file' => 'required|image|max:5120', // Maks 5MB
        ]);

        $path = $request->file('photo_file')->store('photos', 'public');

        $photo = Photo::create([
            'user_id' => Auth::id(),
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'encrypted_path' => '/storage/' . $path,

        ]);

        return redirect()->route('photos.show', $photo)->with('status', 'Foto berhasil diunggah!');
    }

    public function show(Photo $photo)
    {
        $averageRating = $photo->ratings()->whereNotNull('score')->avg('score');
        $mainComments = $photo->ratings()->whereNull('parent_id')->with(['replies.user', 'user'])->latest()->get();
        return view('photos.show', ['photo' => $photo, 'averageRating' => number_format($averageRating, 1), 'mainComments' => $mainComments]);
    }

    public function edit(Photo $photo)
    {
        $this->authorize('update', $photo);
        return view('photos.edit', compact('photo'));
    }

    public function update(Request $request, Photo $photo)
    {
        $this->authorize('update', $photo);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'photo_file' => 'nullable|image|max:5120', // Maks 5MB
        ]);

        $data = $request->only('title', 'description');

        if ($request->hasFile('photo_file')) {
            // Hapus file lama dari storage
            $oldPath = $photo->encrypted_path; 
            // Karena Accessor sudah mendekripsi $photo->encrypted_path, 
            // kita harus memastikan path yang dihapus adalah yang **mentah**
            // Note: Jika Anda menyimpan path mentah di properti terpisah saat save, itu lebih baik.
            // Untuk sementara, kita anggap $photo->getOriginal('encrypted_path') adalah path yang terenkripsi.
            // Cara yang lebih aman: Ambil path mentah dari database sebelum dienkripsi.
            
            // --- Cara Lebih Aman untuk Mendapatkan Path Asli Terenkripsi ---
            // Asumsi: Kita bisa mendapatkan path yang tersimpan di DB
            $encryptedOldPath = $photo->getOriginal('encrypted_path');
            
            try {
                // Dekripsi path lama untuk mendapatkan path storage mentah
                $pathToDelete = \Illuminate\Support\Facades\Crypt::decryptString($encryptedOldPath);
                
                Storage::disk('public')->delete($pathToDelete); 
                
            } catch (\Exception $e) {
                logger()->warning('Gagal menghapus file foto lama: ' . $e->getMessage());
            }

            $newPath = $request->file('photo_file')->store('photos', 'public');
            $data['encrypted_path'] = $newPath;
        }

        $photo->update($data);

        return redirect()->route('photos.show', $photo)->with('status', 'Foto berhasil diperbarui!');
    }

    public function destroy(Photo $photo)
    {
        $this->authorize('delete', $photo);

        $encryptedPath = $photo->getOriginal('encrypted_path');
        
        try {
            // Dekripsi path untuk mendapatkan path storage mentah
            $pathToDelete = \Illuminate\Support\Facades\Crypt::decryptString($encryptedPath);
            
            Storage::disk('public')->delete($pathToDelete);
            
        } catch (\Exception $e) {
            logger()->warning('Gagal menghapus file foto saat destroy: ' . $e->getMessage());
        }

        $photo->delete();

        return redirect()->route('dashboard')->with('status', 'Foto berhasil dihapus.');
    }
}
