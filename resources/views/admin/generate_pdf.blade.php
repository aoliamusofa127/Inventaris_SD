<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <style rel="stylesheet">
        @page {
            size: A4 portrait;
            margin: 1.5cm;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #fff;
            font-size: 12px;
        }

        .container {
            width: 100%;
            background-color: #fff;
        }

        .styled-table {
            width: 100%;
            border-collapse: collapse;
            font-family: 'Arial', sans-serif;
            background-color: #ffffff;
            border: 1px solid #dddddd;
            page-break-inside: auto;
        }

        .styled-table thead {
            background-color: #057A55;
            color: #ffffff;
            text-align: left;
        }

        .styled-table th,
        .styled-table td {
            padding: 10px;
            text-align: center;
            border: 1px solid #dddddd;
        }

        .styled-table tbody tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }

        .styled-table tbody tr:last-of-type {
            border-bottom: 2px solid #057A55;
        }

        /* Agar tabel tidak terpotong saat pindah halaman */
        .styled-table tbody tr {
            page-break-inside: avoid;
        }

        footer {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            text-align: center;
            padding: 10px 0;
            font-size: 11px;
            color: #555555;
        }

        /* Merge the cells for "Rusak berat", "Rusak sedang", and "Bagus" */
        .merge {
            text-align: left;
            padding-left: 16px;
        }

        .font_bold {
            font-weight: bold;
            font-size: 13px;
        }

        /* Media Query untuk layar kecil dan memastikan ukuran mengikuti kertas A4 */
        @media print {
            body {
                width: 100%;
                margin: 0;
                padding: 0;
                background-color: white;
            }

            .container {
                padding: 0;
                margin: 0;
            }

            .styled-table {
                font-size: 10px;
            }

            @page {
                margin: 1.5cm;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <table class="styled-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kategori</th>
                    <th>Nama Barang</th>
                    <th>Penerbit</th>
                    <th>Tahun</th>
                    <th>Harga</th>
                    <th>Tanggal</th>
                    <th>Kondisi</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                @foreach ($data as $val)
                    @foreach ($val->JoinToKategori as $kategori)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $kategori->nama_kategori }}</td>
                            <td>{{ $val->nama_barang }}</td>
                            <td>{{ $val->penerbit }}</td>
                            <td>{{ $val->tahun_pelajaran }}</td>
                            <td>Rp. {{ number_format($val->harga, 0) }}</td>
                            <td>{{ $val->tanggal }}</td>
                            <td>{{ $val->kondisi }}</td>
                            <td>{{ $val->keterangan }}</td>
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
            <tbody>
                <tr>
                    <td class="merge font_bold" colspan="8">Jumlah Rusak berat</td>
                    <td class="font_bold">{{ $rb }}</td>
                </tr>
                <tr>
                    <td class="merge font_bold" colspan="8">Jumlah Rusak sedang</td>
                    <td class="font_bold">{{ $rs }}</td>
                </tr>
                <tr>
                    <td class="merge font_bold" colspan="8">Jumlah Bagus</td>
                    <td class="font_bold">{{ $b }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <!-- Footer -->
    <footer>
        @Copyright KKN XVII STMIK Lombok 2024
        <br>Desa Jurang Jaler
    </footer>
</body>

</html>
