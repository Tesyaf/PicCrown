<?php

namespace App\Http\Controllers;
use App\Models\Photo;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $photos = Photo::with(['ratings', 'user'])->latest()->get();
        $topUsers = User::withCount('photos')->orderByDesc('photos_count')->take(5)->get();
        return view('dashboard', compact('photos', 'topUsers'));
    }
}
