<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $totalTamu = Guest::count();
        $tamuBulanIni = Guest::whereMonth('tanggal_kunjungan', Carbon::now()->month)
            ->whereYear('tanggal_kunjungan', Carbon::now()->year)
            ->count();
        $tamuPerSource = Guest::select('source', DB::raw('count(*) as total'))
            ->groupBy('source')
            ->pluck('total', 'source');

        return view('dashboard', [
            'totalTamu' => $totalTamu,
            'tamuBulanIni' => $tamuBulanIni,
            'tamuPerSource' => $tamuPerSource,
        ]);
    }
}
