@extends('admin.partials.main')
@section('container')
    <div class="layout-px-spacing">
        <div class="middle-content container-xxl p-0">
            <!-- BREADCRUMB -->
            <div class="page-meta">
                <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Laporan</a></li>
                        
                    </ol>
                </nav>
            </div>

            <div class="row layout-top-spacing">
                <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
                    <div class="widget-content widget-content-area br-8">
                        <div class="m-4">
                            <a href="{{ route('laporan-drink.exportExcel') }}" class="btn btn-success">Export to Excel</a>
                            <a href="{{ route('laporan-drink.exportPDF') }}" class="btn btn-danger">Export to PDF</a>
                            <a href="{{ route('laporan-drink.printAll') }}" class="btn btn-primary">Print All</a>
                        </div>
                        <table id="zero-config" class="table dt-table-hover" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Harga</th>
                                    <th>Exp</th>
                                    <th>Tanggal Datang</th>
                                    <th>Stock</th>
                                    <th>Barang Keluar</th>
                                    {{-- <th>Action</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($produks as $index => $produk)
                                    @php
                                        $expDate = \Carbon\Carbon::parse($produk->exp);
                                        $currentDate = \Carbon\Carbon::now();
                                        $diff = $expDate->diffInDays($currentDate, false);
                                        $barangKeluar = $detailPenjualan
                                            ->where('id_produk', $produk->id)
                                            ->sum('qty_keluar');
                                    @endphp
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $produk->nama }}</td>
                                        <td>{{ $produk->harga }}</td>
                                        <td class="{{ $diff <= 30 ? 'bg-danger text-white' : '' }}">{{ $produk->exp }}</td>
                                        <td>{{ $produk->tanggal_datang }}</td>
                                        <td>{{ $produk->qty }}</td>
                                        <td>{{ $barangKeluar }}</td>
                                        {{-- <td>
                                            <a href="{{ route('laporan-excel.drink', $produk->id) }}"
                                                class="btn btn-success btn-sm">Export to Excel</a>
                                            <a href="{{ route('laporan-pdfbyid.drink', $produk->id) }}"
                                                class="btn btn-danger btn-sm">Export to PDF</a>
                                            <a href="{{ route('laporan-drink.printById', $produk->id) }}"
                                                class="btn btn-primary btn-sm">Print</a>
                                        </td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
@endsection
