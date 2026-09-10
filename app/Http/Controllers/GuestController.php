<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    // Menentukan source berdasarkan URL yang diakses tamu
    private function sourceFromPath(string $path): string
    {
        $map = [
            '/' => 'direct',
            'whatsapp' => 'whatsapp',
            'instagram' => 'instagram',
            'facebook' => 'facebook',
        ];

        return $map[$path] ?? 'direct';
    }

    // Menampilkan form buku tamu
    public function create(Request $request)
    {
        $source = $this->sourceFromPath($request->path());
        session(['source' => $source]);
        return view('guests.create');
    }

    // Menyimpan data tamu yang mengisi form
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'no_hp' => 'required|digits_between:10,13',
            'email' => 'required|email',
            'instansi' => 'required|string|max:255',
            'tujuan_kunjungan' => 'required|string|max:255',
            'tanggal_kunjungan' => 'required|date',
        ]);

        $validated['source'] = session('source', 'direct');

        Guest::create($validated);

        return back()->with('success', 'Data kunjungan berhasil disimpan. Terima kasih atas kunjungan Anda.');
    }

    // Menampilkan daftar tamu untuk admin
    public function index(Request $request)
    {
        $search = $request->input('search');
        $source = $request->input('source');
        $guests = Guest::when($search, function ($query) use ($search) {
            return $query->where('nama', 'like', '%' . $search . '%');
        })
            ->when($source, function ($query) use ($source) {
                return $query->where('source', $source);
            })
            ->orderBy('tanggal_kunjungan', 'desc')
            ->paginate(10)
            ->withQueryString();

        return view('guests.index', [
            'guests' => $guests,
            'search' => $search,
            'source' => $source,
        ]);
    }

    //Ekspor data dalam excel
    public function export(Request $request)
    {
        $search = $request->input('search');
        $source = $request->input('source');

        $guests = Guest::when($search, function ($query) use ($search) {
            return $query->where('nama', 'like', '%' . $search . '%');
        })
            ->when($source, function ($query) use ($source) {
                return $query->where('source', $source);
            })
            ->orderBy('tanggal_kunjungan', 'desc')
            ->get();

        $filename = 'Data_Tamu_BPS_Kota_Bukittinggi.csv';

        return response()->streamDownload(function () use ($guests) {
            $file = fopen('php://output', 'w');

            fwrite($file, "\xEF\xBB\xBF");

            fputcsv($file, [
                'No',
                'Nama',
                'No. HP',
                'Email',
                'Instansi',
                'Tujuan Kunjungan',
                'Tanggal Kunjungan',
                'Sumber'
            ]);

            foreach ($guests as $index => $guest) {
                fputcsv($file, [
                    $index + 1,
                    $guest->nama,
                    $guest->no_hp,
                    $guest->email,
                    $guest->instansi ?: '-',
                    $guest->tujuan_kunjungan,
                    $guest->tanggal_kunjungan,
                    $guest->source
                ]);
            }

            fclose($file);
        }, $filename, [
            'Content-Type' => 'text/csv; charset=UTF-8',
        ]);
    }
}
