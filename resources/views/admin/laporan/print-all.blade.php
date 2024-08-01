<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print All Penjualan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            table-layout: fixed;
            word-wrap: break-word;
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
            font-size: 12px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h1>Print All Penjualan</h1>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Invoice</th>
                <th>Tanggal</th>
                <th>Produk</th>
                <th>Kategori</th>
                <th>Tanggal Datang</th>
                <th>Exp</th>
                <th>Qty</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($penjualans as $index => $penjualan)
                @foreach ($penjualan->detailPenjualans as $detail)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $penjualan->kode_invoice }}</td>
                        <td>{{ $penjualan->tgl }}</td>
                        <td>{{ $detail->produk->nama }}</td>
                        <td>{{ $detail->produk->kategori }}</td>
                        <td>{{ $detail->produk->tanggal_datang }}</td>
                        <td>{{ $detail->produk->exp }}</td>
                        <td>{{ $detail->qty }}</td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>
    <script>
        window.print();
    </script>
</body>

</html>
