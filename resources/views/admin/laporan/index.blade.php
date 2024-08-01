@extends('admin.partials.main')
@section('container')
    <div class="layout-px-spacing">
        <div class="middle-content container-xxl p-0">
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
                            <a href="{{ route('laporan.exportExcel') }}" class="btn btn-success">Export to Excel</a>
                            <a href="{{ route('laporan.exportPDF') }}" class="btn btn-danger">Export to PDF</a>
                            <a href="{{ route('laporan.printAll') }}" class="btn btn-primary">Print All</a>
                        </div>
                        <table id="zero-config" class="table dt-table-hover" style="width: 100%">
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
                                    {{-- <th>Action</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($penjualans as $penjualan)
                                    @foreach ($penjualan->detailPenjualans as $detail)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $penjualan->kode_invoice }}</td>
                                            <td>{{ $penjualan->tgl }}</td>
                                            <td>{{ $detail->produk->nama }}</td>
                                            <td>{{ $detail->produk->kategori }}</td>
                                            <td>{{ $detail->produk->tanggal_datang }}</td>
                                            <td>{{ $detail->produk->exp }}</td>
                                            <td>{{ $detail->qty_keluar }}</td>
                                            {{-- <td>
                                                <a href="{{ route('laporan.exportExcelById', $penjualan->id) }}"
                                                    class="btn btn-success btn-sm">Export to Excel</a>
                                                <a href="{{ route('laporan.exportPDFById', $penjualan->id) }}"
                                                    class="btn btn-danger btn-sm">Export to PDF</a>
                                                <a href="{{ route('laporan.printById', $penjualan->id) }}"
                                                    class="btn btn-primary btn-sm">Print</a>
                                            </td> --}}
                                        </tr>
                                    @endforeach
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
