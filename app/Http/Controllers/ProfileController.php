<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Tampilkan halaman profil pengguna dengan beasiswa yang diikuti
     */
    public function index()
    {
        $user = Auth::user();
        $scholarships = $user->scholarships; // Mengambil beasiswa yang diikuti oleh pengguna
        
        return view('blog.profile', compact('scholarships'));
    }
}