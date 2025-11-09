<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class PhotoController extends Controller
{
    public function create()
    {
        return view('photos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|max:5120',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Simpan file utama ke storage
        $rawPath = $request->file('photo')->store('photos', 'public');

        // Buat thumbnail preview (tidak dienkripsi)
        $previewPath = 'previews/' . basename($rawPath);
        $image = Image::make($request->file('photo'))
            ->resize(480, null, fn($constraint) => $constraint->aspectRatio())
            ->encode('jpg', 70);
        Storage::disk('public')->put($previewPath, $image);

        // Simpan path terenkripsi ke database
        Photo::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'description' => $request->description,
            'encrypted_path' => $rawPath, // akan otomatis terenkripsi oleh mutator
        ]);

        return redirect()
            ->route('dashboard')
            ->with('success', 'Foto berhasil diunggah!');
    }

    public function show(Photo $photo)
    {
        $averageRating = $photo->ratings()->whereNotNull('score')->avg('score');
        $mainComments = $photo->ratings()
            ->whereNull('parent_id')
            ->with(['replies.user', 'user'])
            ->latest()
            ->get();

        return view('photos.show', [
            'photo' => $photo,
            'averageRating' => number_format($averageRating, 1),
            'mainComments' => $mainComments,
        ]);
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
            'photo' => 'nullable|image|max:5120',
        ]);

        $data = $request->only(['title', 'description']);

        // Jika user upload file baru
        if ($request->hasFile('photo')) {
            $oldDecryptedPath = $photo->encrypted_path;
            if ($oldDecryptedPath && Storage::disk('public')->exists($oldDecryptedPath)) {
                Storage::disk('public')->delete($oldDecryptedPath);
                Storage::disk('public')->delete('previews/' . basename($oldDecryptedPath));
            }

            $newPath = $request->file('photo')->store('photos', 'public');

            $previewPath = 'previews/' . basename($newPath);

            $manager = new ImageManager(new Driver());

            $image = $manager->read($request->file('photo'))
                ->scale(width: 480)
                ->encodeByExtension('jpg', quality: 70);

            Storage::disk('public')->put($previewPath, (string) $image);

            $data['encrypted_path'] = $newPath;
        }

        $photo->update($data);

        return redirect()
            ->route('photos.show', $photo)
            ->with('success', 'Foto berhasil diperbarui!');
    }

    public function destroy(Photo $photo)
    {
        $this->authorize('delete', $photo);

        // Hapus file dan preview lama berdasarkan hasil dekripsi
        $decryptedPath = $photo->encrypted_path; // getter otomatis decrypt

        if ($decryptedPath && Storage::disk('public')->exists($decryptedPath)) {
            Storage::disk('public')->delete($decryptedPath);
            Storage::disk('public')->delete('previews/' . basename($decryptedPath));
        }

        $photo->delete();

        return redirect()
            ->route('dashboard')
            ->with('success', 'Foto berhasil dihapus.');
    }
}
