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

    // Menampilkan form buku tamu (dipakai oleh 4 URL: /, /whatsapp, /instagram, /facebook)
    public function create(Request $request)
    {
        $source = $this->sourceFromPath($request->path());

        // Simpan source ke session, bukan ke form.
        // Ini mencegah tamu mengubah source lewat hidden input di form.
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
            'instansi' => 'nullable|string|max:255',
            'tujuan_kunjungan' => 'required|string|max:255',
            'tanggal_kunjungan' => 'required|date',
        ]);

        // Source diambil dari session (server-side), bukan dari input form
        $validated['source'] = session('source', 'direct');

        Guest::create($validated);

        return back()->with('success', 'Data kunjungan berhasil disimpan. Terima kasih atas kunjungan Anda.');
    }

    // Menampilkan daftar tamu untuk admin, dengan fitur search nama
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
}
