<!DOCTYPE html>
<html>

<head>
    <title>Rekapan Kegiatan PKL</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th,
        td {
            border: 1px solid #333;
            padding: 6px;
            text-align: left;
        }

        th {
            background-color: #ddd;
        }

        .profile {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .biodata {
            margin-left: 20px;
        }


        img.kegiatan-foto {
            max-width: 80px;
            margin-top: 5px;
        }
    </style>
</head>

<body>

    <h2>Rekapan Kegiatan PKL</h2>

    <div class="profile">
        <div class="biodata">
            <p><strong>NIS</strong>: {{ $siswa->nis ?? '-' }}</p>
            <p><strong>Nama Lengkap</strong>: {{ $siswa->user->nama_lengkap ?? '-' }}</p>
            <p><strong>Kelas</strong>: {{ $siswa->kelas ?? '-' }}</p>
            <p><strong>Jurusan</strong>: {{ $siswa->jurusan ?? '-' }}</p>
            <p><strong>Email</strong>: {{ $siswa->email ?? '-' }}</p>
            <p><strong>Kontak</strong>: {{ $siswa->kontak ?? '-' }}</p>
            <p><strong>Periode Magang</strong>:
                {{ \Carbon\Carbon::parse($siswa->periode_mulai)->format('d/m/Y') ?? '-' }} -
                {{ \Carbon\Carbon::parse($siswa->periode_selesai)->format('d/m/Y') ?? '-' }}
            </p>
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Deskripsi Kegiatan</th>
                <th>Status</th>
                <th>Foto</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kegiatans as $item)
            <tr>
                <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                <td>{{ $item->kegiatan }}</td>
                <td>{{ ucfirst($item->status) }}</td>
                <td>
                    @if($item->foto && file_exists(public_path('storage/' . $item->foto)))
                    <img src="{{ public_path('storage/' . $item->foto) }}" class="kegiatan-foto">
                    @else
                    -
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>