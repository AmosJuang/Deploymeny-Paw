<?php
namespace App\Http\Controllers; 
use App\Models\Scholarship;
use App\Models\User; 
use Illuminate\Http\Request;

class ScholarshipController extends Controller
{
    public function index()
    {
        $scholarships = Scholarship::all(); // Ambil semua data beasiswa
        return view('blog.beasiswa', compact('scholarships'));
    }

    public function register($id)
    {
        // Cek apakah user sudah login
        if (!auth()->check()) {
            // Simpan ID beasiswa di session untuk digunakan setelah login
            session(['redirect_after_login' => route('beasiswa.register', $id)]);
            
            return redirect()->route('login')
                ->with('error', 'Silakan login untuk mendaftar beasiswa ini.');
        }

        $user = auth()->user();
        $scholarship = Scholarship::findOrFail($id);

        // Cek apakah user sudah mendaftar
        if ($user->scholarships()->where('scholarship_id', $id)->exists()) {
            return redirect()->back()
                ->with('error', 'Anda sudah mendaftar ke beasiswa ini.');
        }

        // Daftarkan user ke beasiswa
        $user->scholarships()->attach($id);

        return redirect()->back()
            ->with('success', 'Anda berhasil mendaftar ke beasiswa ini!');
    }
}