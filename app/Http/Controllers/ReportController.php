<?php

namespace App\Http\Controllers;

use App\Models\Scholarship;
use App\Models\User;
use Illuminate\Http\Request;
use PDF; // Requires laravel-dompdf
use Carbon\Carbon;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $statistics = [
            'total_scholarships' => Scholarship::count(),
            'active_scholarships' => Scholarship::where('deadline', '>', now())->count(),
            'total_applicants' => User::count(),
            'applications' => \DB::table('scholarship_user')->count(),
        ];

        return view('reports.index', compact('statistics'));
    }

    public function generatePDF(Request $request)
    {
        $startDate = $request->start_date ? Carbon::parse($request->start_date) : Carbon::now()->subMonth();
        $endDate = $request->end_date ? Carbon::parse($request->end_date) : Carbon::now();

        $scholarships = Scholarship::withCount('users')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->get();

        $data = [
            'scholarships' => $scholarships,
            'start_date' => $startDate->format('d M Y'),
            'end_date' => $endDate->format('d M Y'),
            'generated_at' => now()->format('d M Y H:i')
        ];

        $pdf = PDF::loadView('reports.pdf', $data);
        return $pdf->download('scholarship-report.pdf');
    }
}