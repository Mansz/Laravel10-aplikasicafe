<!DOCTYPE html>
<html>

<head>
    <title>Laporan Food</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        .bg-danger {
            background-color: red;
            color: white;
        }
    </style>
</head>

<body>
    <h1>Report Print</h1>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>PLU</th>
                <th>Nama</th>
                <th>Exp</th>
                <th>Tanggal Datang</th>
                <th>Stock</th>
                <th>Kategori</th>
                <th>Barang Keluar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produks as $index => $produk)
                @php
                    $expDate = \Carbon\Carbon::parse($produk->exp);
                    $currentDate = \Carbon\Carbon::now();
                    $diff = $expDate->diffInDays($currentDate, false);
                    $barangKeluar = $detailPenjualans->where('id_produk', $produk->id)->sum('qty_keluar');
                @endphp
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $produk->plu }}</td>
                    <td>{{ $produk->nama }}</td>
                    <td class="{{ $diff <= 30 ? 'bg-danger' : '' }}">{{ $produk->exp }}</td>
                    <td>{{ $produk->tanggal_datang }}</td>
                    <td>{{ $produk->qty }}</td>
                    <td>{{ $produk->kategori }}</td>
                    <td>{{ $barangKeluar }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <script>
        window.addEventListener('load', function() {
            window.print();
        });
    </script>
</body>

</html>
