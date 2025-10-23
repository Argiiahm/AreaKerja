<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Laporan Omset Perusahaan</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            margin: 20px;
            font-size: 12px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }

        .logo {
            text-align: right;
            color: #ff6600;
            font-weight: bold;
            font-size: 14px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        table th,
        table td {
            border: 1px solid #000;
            padding: 6px 8px;
            text-align: left;
        }

        table th {
            background: #ff6600;
            color: white;
        }

        .summary {
            margin-top: 10px;
        }

        .footer {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
            font-size: 11px;
            color: #555;
        }
    </style>
</head>

<body>
    <div class="header">
        <div>
            <p>Email : areakerja@gmail.com<br>
                Telepon : 081234567009</p>
        </div>
        <div class="logo">
            <p>Areakerja.com</p>
        </div>
    </div>

    <h3 style="text-align: center; margin-top: 10px;">LAPORAN OMSET PERUSAHAAN</h3>

    <table>
        <thead>
            <tr>
                <th style="width:5%">No.</th>
                <th>Bulan</th>
                <th>Nominal</th>
            </tr>
        </thead>
        <tbody>
            @forelse($listOmset as $item)
                <tr>
                    <td>{{ $item['no'] }}</td>
                    <td>{{ $item['bulan'] }}</td>
                    <td>Rp {{ number_format($item['nominal'], 0, ',', '.') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" style="text-align:center;">Tidak Ada Transaksi</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="summary">
        <p>Jumlah Bulan : {{ count($listOmset) }}</p>
        <p>Total Omset : Rp {{ number_format($totalOmset, 0, ',', '.') }}</p>
        <p>Rata-rata : Rp {{ number_format($rataRata, 0, ',', '.') }}</p>
    </div>

    <div class="footer">
        <span>Areakerja.com</span>
        <span>{{ $tanggalCetak }}</span>
    </div>
</body>

</html>
