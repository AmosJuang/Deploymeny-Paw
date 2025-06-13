
<!DOCTYPE html>
<html>
<head>
    <title>Laporan Beasiswa</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .header { text-align: center; margin-bottom: 30px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 8px; border: 1px solid #ddd; }
        th { background-color: #f5f5f5; }
    </style>
</head>
<body>
    <div class="header">
        <h1>Laporan Beasiswa</h1>
        <p>Periode: {{ $start_date }} - {{ $end_date }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>Nama Beasiswa</th>
                <th>Organisasi</th>
                <th>Deadline</th>
                <th>Jumlah Pendaftar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($scholarships as $scholarship)
            <tr>
                <td>{{ $scholarship->name }}</td>
                <td>{{ $scholarship->organization }}</td>
                <td>{{ \Carbon\Carbon::parse($scholarship->deadline)->format('d M Y') }}</td>
                <td>{{ $scholarship->users_count }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div style="margin-top: 20px;">
        <p>Dibuat pada: {{ $generated_at }}</p>
    </div>
</body>
</html>