<?php

namespace App\Http\Controllers;
use App\Models\Photo;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('q');

        $photos = Photo::when($query, function ($q) use ($query) {
            $q->where('title', 'like', "%{$query}%")
            ->orWhere('description', 'like', "%{$query}%");
        })
        ->latest()
        ->paginate(9)
        ->withQueryString();

        $topUsers = User::withCount('photos')->orderByDesc('photos_count')->take(5)->get();

        return view('dashboard', compact('photos', 'topUsers'));
    }

}
