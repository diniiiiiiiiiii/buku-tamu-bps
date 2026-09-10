<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('logo-bps.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <title>Daftar Tamu - Buku Tamu BPS</title>
    <style>
        * {
            box-sizing: border-box;
        }
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f3f6f9;
            color: #263238;
        }
        .header,
        .navbar {
            height: 62px;
            background-color: #005b96;
            color: #ffffff;
            padding: 0 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }
        .brand {
            font-size: 15px;
        }
        .container {
            max-width: 1150px;
            margin: 0 auto;
            padding: 30px 24px 40px;
        }
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            margin-bottom: 18px;
        }
        .page-title {
            margin: 0;
            font-size: 24px;
            color: #003b5c;
            font-weight: 700;
        }
        .page-description {
            margin: 6px 0 0;
            font-size: 13px;
            color: #6b7280;
        }
        .btn-dashboard {
            display: inline-block;
            background-color: #005b96;
            color: #ffffff;
            text-decoration: none;
            padding: 10px 16px;
            border-radius: 6px;
            font-size: 13px;
            font-weight: 600;
        }
        .btn-dashboard:hover {
            background-color: #003b5c;
        }
        .guest-card {
            background: white;
            border: 1px solid #dce4eb;
            border-radius: 9px;
            overflow: hidden;
        }
        .card-header {
            padding: 18px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #e5eaee;
        }
        .card-title {
            margin: 0;
            font-size: 14px;
            color: #003b5c;
            font-weight: 700;
        }
        .card-total {
            color: #6b7280;
            font-size: 12px;
        }
        .card-total strong {
            color: #005b96;
        }
        .search-area {
            padding: 15px 20px;
            border-bottom: 1px solid #e5eaee;
        }
        .search-form {
            display: flex;
            gap: 8px;
        }
        .search-wrapper {
            flex: 1;
            position: relative;
        }
        .search-wrapper i {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #9aa5af;
            font-size: 12px;
        }
        .search-input {
            width: 100%;
            height: 38px;
            border: 1px solid #d5dee6;
            border-radius: 6px;
            padding: 0 12px 0 33px;
            outline: none;
            font-size: 12px;
            color: #263238;
        }
        .search-input:focus {
            border-color: #005b96;
        }
        .source-filter {
            height: 38px;
            min-width: 140px;
            border: 1px solid #d5dee6;
            border-radius: 6px;
            padding: 0 10px;
            outline: none;
            font-size: 12px;
            color: #4b5563;
            background: white;
        }
        .source-filter:focus {
            border-color: #005b96;
        }
        .btn-search,
        .btn-reset {
            height: 38px;
            border-radius: 6px;
            padding: 0 16px;
            font-size: 12px;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }
        .btn-search {
            background: #005b96;
            color: white;
            border: none;
        }
        .btn-search:hover {
            background: #003b5c;
        }
        .btn-reset {
            background: white;
            color: #59636d;
            border: 1px solid #d5dee6;
        }
        .btn-reset:hover {
            background: #f5f7f9;
            border-color: #bfcbd4;
        }
        .table-wrapper {
            overflow-x: auto;
        }
        table {
            width: 100%;
            min-width: 900px;
            border-collapse: collapse;
        }
        th {
            background: #f7f9fb;
            color: #59636d;
            font-size: 11px;
            font-weight: 600;
            text-align: left;
            padding: 12px 15px;
            border-bottom: 1px solid #dfe6eb;
            white-space: nowrap;
        }
        td {
            padding: 13px 15px;
            font-size: 12px;
            color: #4b5563;
            border-bottom: 1px solid #edf0f3;
            vertical-align: middle;
        }
        tbody tr:hover {
            background: #fafcfd;
        }
        tbody tr:last-child td {
            border-bottom: none;
        }
        .number {
            color: #8a949e;
            width: 45px;
        }
        .guest-name {
            color: #263238;
            font-weight: 600;
        }
        .guest-email {
            color: #5f6973;
        }
        .source {
            color: #005b96;
            font-weight: 600;
            text-transform: capitalize;
        }
        .empty {
            text-align: center;
            padding: 45px 20px;
            color: #8a949e;
            font-size: 12px;
        }
        .empty i {
            display: block;
            margin-bottom: 8px;
            font-size: 23px;
            color: #b7c0c7;
        }
        .pagination-area {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 14px 20px;
            border-top: 1px solid #e5eaee;
        }
        .pagination-info {
            color: #7a858f;
            font-size: 11px;
        }
        .pagination {
            display: flex;
            align-items: center;
            gap: 4px;
        }
        .pagination a,
        .pagination span {
            min-width: 30px;
            height: 30px;
            padding: 0 8px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #d9e1e7;
            border-radius: 5px;
            text-decoration: none;
            color: #59636d;
            background: white;
            font-size: 11px;
        }
        .pagination a:hover {
            color: #005b96;
            border-color: #005b96;
        }
        .pagination .active {
            background: #005b96;
            border-color: #005b96;
            color: white;
        }
        .pagination .disabled {
            color: #c4cbd0;
            background: #f8fafb;
        }
        .btn-export {
            height: 38px;
            border-radius: 6px;
            padding: 0 16px;
            background: #18794e;
            color: white;
            font-size: 12px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
        }
        .btn-export:hover {
            background: #12613e;
        }
        
        /* Mobile */
        @media (max-width: 700px) {
            .header,
            .navbar {
                height: 52px;
                padding: 0 18px;
            }
            .header-title,
            .brand {
                font-size: 13px;
            }
            .container {
                padding: 22px 14px 30px;
            }
            .page-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 12px;
            }
            .btn-dashboard {
                width: 100%;
                text-align: center;
            }
            .card-header {
                align-items: flex-start;
                flex-direction: column;
                gap: 5px;
            }
            .search-form {
                flex-direction: column;
            }
            .source-filter {
                width: 100%;
            }
            .btn-search,
            .btn-reset {
                width: 100%;
            }
            .pagination-area {
                align-items: flex-start;
                flex-direction: column;
                gap: 10px;
            }
            .pagination {
                flex-wrap: wrap;
            }
            .btn-search,
            .btn-reset,
            .btn-export {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <nav class="navbar">
        <div class="brand"> Buku Tamu Digital — BPS Kota Bukittinggi </div>
    </nav>
    <main class="container">
        <div class="page-header">
            <div>
                <h1 class="page-title">
                    Daftar Tamu
                </h1>
                <p class="page-description">
                    Data tamu yang telah melakukan kunjungan ke BPS Kota Bukittinggi
                </p>
            </div>

            <a href="{{ route('dashboard') }}" class="btn-dashboard">
                <i class="fa-solid fa-arrow-left"></i>
                Dashboard
            </a>
        </div>

        <div class="guest-card">
            <div class="card-header">
                <h2 class="card-title">
                    Data Tamu
                </h2>
                <div class="card-total">
                    Total: <strong>{{ $guests->total() }}</strong> tamu
                </div>
            </div>

            <div class="search-area">
                <form action="{{ route('guests.index') }}" method="GET" class="search-form">
                    <div class="search-wrapper">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        <input type="text" name="search" class="search-input" placeholder="Cari berdasarkan nama tamu..." value="{{ $search ?? '' }}">
                    </div>

                    <select name="source" class="source-filter">
                        <option value="">Semua Sumber</option>
                        <option value="direct" {{ ($source ?? '') == 'direct' ? 'selected' : '' }}>Direct</option>
                        <option value="whatsapp" {{ ($source ?? '') == 'whatsapp' ? 'selected' : '' }}>WhatsApp</option>
                        <option value="instagram" {{ ($source ?? '') == 'instagram' ? 'selected' : '' }}>Instagram</option>
                        <option value="facebook" {{ ($source ?? '') == 'facebook' ? 'selected' : '' }}>Facebook</option>
                    </select>

                    <button type="submit" class="btn-search">
                        Cari
                    </button>
                    <a href="{{ route('guests.index') }}" class="btn-reset">
                        Reset
                    </a>
                    <a href="{{ route('guests.export', ['search' => $search ?? '', 'source' => $source ?? '']) }}" class="btn-export">
                        Export Excel
                    </a>

                </form>
            </div>

            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>No. HP</th>
                            <th>Email</th>
                            <th>Instansi</th>
                            <th>Tujuan Kunjungan</th>
                            <th>Tanggal</th>
                            <th>Sumber</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @forelse ($guests as $guest)
                            <tr>
                                <td class="number">
                                    {{ $guests->firstItem() + $loop->index }}
                                </td>
                                <td>
                                    <div class="guest-name">
                                        {{ $guest->nama }}
                                    </div>
                                </td>
                                <td>
                                    {{ $guest->no_hp }}
                                </td>
                                <td>
                                    <div class="guest-email">
                                        {{ $guest->email }}
                                    </div>
                                </td>
                                <td>
                                    {{ $guest->instansi ?: '-' }}
                                </td>
                                <td>
                                    {{ $guest->tujuan_kunjungan }}
                                </td>
                                <td>
                                    {{ \Carbon\Carbon::parse($guest->tanggal_kunjungan)->format('d-m-Y') }}
                                </td>
                                <td>
                                    <span class="source">
                                        {{ $guest->source }}
                                    </span>
                                </td>
                            </tr>

                        @empty
                            <tr>
                                <td colspan="8">
                                    <div class="empty">
                                        <i class="fa-regular fa-folder-open"></i>
                                        @if ($search || $source)
                                            Data tamu yang sesuai dengan filter tidak ditemukan.
                                        @else
                                            Belum ada data tamu.
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if ($guests->hasPages())
                <div class="pagination-area">
                    <div class="pagination-info">
                        Menampilkan
                        {{ $guests->firstItem() }}–{{ $guests->lastItem() }}
                        dari {{ $guests->total() }} data
                    </div>
                    <div class="pagination">

                        @if ($guests->onFirstPage())
                            <span class="disabled">
                                <i class="fa-solid fa-chevron-left"></i>
                            </span>
                        @else
                            <a href="{{ $guests->previousPageUrl() }}">
                                <i class="fa-solid fa-chevron-left"></i>
                            </a>
                        @endif

                        @foreach ($guests->getUrlRange(1, $guests->lastPage()) as $page => $url)
                            @if ($page == $guests->currentPage())
                                <span class="active">
                                    {{ $page }}
                                </span>
                            @else
                                <a href="{{ $url }}">
                                    {{ $page }}
                                </a>
                            @endif
                        @endforeach

                        @if ($guests->hasMorePages())
                            <a href="{{ $guests->nextPageUrl() }}">
                                <i class="fa-solid fa-chevron-right"></i>
                            </a>
                        @else
                            <span class="disabled">
                                <i class="fa-solid fa-chevron-right"></i>
                            </span>
                        @endif

                    </div>
                </div>
            @endif

        </div>
    </main>

</body>
</html>