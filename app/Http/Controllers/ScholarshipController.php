<?php

namespace App\Http\Controllers;

use App\Models\Scholarship;
use App\Models\User;
use Illuminate\Http\Request;
use App\Notifications\ScholarshipRegistrationNotification;

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
        $scholarship = Scholarship::findOrFail($id);
        $user = auth()->user();
        
        // Check if already registered
        if($user->scholarships()->where('scholarship_id', $id)->exists()) {
            return back()->with('error', 'Anda sudah terdaftar di beasiswa ini.');
        }
        
        // Register for scholarship
        $user->scholarships()->attach($id);
        
        // Send notification
        $user->notify(new ScholarshipRegistrationNotification($scholarship));
        
        return back()->with('success', 'Berhasil mendaftar beasiswa.');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $sort = $request->input('sort', 'name');

        $scholarships = Scholarship::query()
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', "%{$search}%")
                            ->orWhere('organization', 'like', "%{$search}%");
            })
            ->when($sort, function ($query, $sort) {
                return $query->orderBy($sort);
            })
            ->get();

        return view('blog.beasiswa', compact('scholarships'));
    }
}
