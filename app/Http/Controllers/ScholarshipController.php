<?php

namespace App\Http\Controllers;

use App\Models\Scholarship;
use App\Models\User;
use Illuminate\Http\Request;

class ScholarshipController extends Controller
{
    // Display list of scholarships with search and sort functionality
    public function index(Request $request)
    {
        $query = Scholarship::query();

        // Handle search
        if ($request->has('search') && $request->search) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Handle sorting
        if ($request->has('sort') && in_array($request->sort, ['name', 'open_registration', 'deadline'])) {
            $query->orderBy($request->sort);
        }

        // Fetch scholarships based on filters
        $scholarships = $query->get();

        return view('blog.beasiswa', compact('scholarships'));
    }

    // Handle user registration for a scholarship
    public function register($id)
    {
        // Check if the user is logged in
        if (!auth()->check()) {
            // Save the scholarship ID to session for redirection after login
            session(['redirect_after_login' => route('beasiswa.register', $id)]);
            
            return redirect()->route('login')
                ->with('error', 'Silakan login untuk mendaftar beasiswa ini.');
        }

        $user = auth()->user();
        $scholarship = Scholarship::findOrFail($id);

        // Check if the user has already registered for this scholarship
        if ($user->scholarships()->where('scholarship_id', $id)->exists()) {
            return redirect()->back()
                ->with('error', 'Anda sudah mendaftar ke beasiswa ini.');
        }

        // Register the user for the scholarship
        $user->scholarships()->attach($id);

        return redirect()->back()
            ->with('success', 'Anda berhasil mendaftar ke beasiswa ini!');
    }
}
