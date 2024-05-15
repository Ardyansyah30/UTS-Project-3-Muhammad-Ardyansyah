<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <style>
        .w-full {
            width: 100%
        }

        .margin-top {
            margin-top: 1.25rem;
        }

        .title {
            border: 0px;
            font-weight: bold;
        }

        .footer {
            text-align: right;
        }

        table,
        tr,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        tr,
        td {
            padding: 0.5rem;
        }

        thead.center {
            text-align: center;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="title">
        Laporan Penjualan {{ $bulan }}, {{ $tahun }}
    </div>
    <div class="margin-top">
        <table class="w-full">
            <thead class="center">
                <tr class="border">
                    <td>No</td>
                    <td>Nota</td>
                    <td>Tanggal</td>
                    <td>Nama Produk</td>
                    <td>Quantity</td>
                    <td>Biaya</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($laporans as $laporan)
                    <tr>
                        <td>
                            {{ $loop->iteration }}
                        </td>
                        <td>
                            {{ $laporan->nota }}
                        </td>
                        <td>
                            {{ $laporan->tanggal }}
                        </td>
                        <td>
                            {{ $laporan->nama_produk }}
                        </td>
                        <td>
                            {{ $laporan->quantity }}
                        </td>
                        <td>
                            {{ 'Rp' . $laporan->biaya }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="footer margin-top">Total : Rp{{ $total }}</div>
</body>

</html>
