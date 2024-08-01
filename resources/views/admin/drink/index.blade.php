@extends('admin.partials.main')
@section('container')
    <div class="layout-px-spacing">
        <div class="middle-content container-xxl p-0">
            <!-- BREADCRUMB -->
            <div class="page-meta">
                <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Data Drink</a></li>
                        
                    </ol>
                    <a href="/tambah/drinks" class="btn btn-primary">Tambah Data </a>
                </nav>
            </div>
            <!-- /BREADCRUMB -->

            <div class="row layout-top-spacing">
                <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
                    <div class="widget-content widget-content-area br-8">
                        <table id="zero-config" class="table dt-table-hover" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>PLU</th>
                                    <th>Deksripsi</th>
                                    <th>Exp</th>
                                    <th>Tanggal Datang</th>
                                    <th>Qty</th>
                                    <th>Loc</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($produks as $index => $produk)
                                    @php
                                        $expDate = \Carbon\Carbon::parse($produk->exp);
                                        $currentDate = \Carbon\Carbon::now();
                                        $diff = $expDate->diffInDays($currentDate, false);
                                    @endphp
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $produk->plu }}</td>
                                        <td>{{ $produk->nama }}</td>
                                        <td class="{{ $diff <= 30 ? 'bg-danger text-white' : '' }}">{{ $produk->exp }}</td>
                                        <td>{{ $produk->tanggal_datang }}</td>
                                        <td>{{ $produk->qty }}</td>
                                        <td>{{ $produk->loc }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('drinks.edit', Crypt::encrypt($produk->id)) }}"
                                                class="badge rounded-pill bg-primary">Edit</a>
                                            <a href="{{ route('delete.drinks', $produk->id) }}"
                                                class="badge rounded-pill bg-danger" data-confirm-delete="true">Hapus</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- SweetAlert script -->
    <script>
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ session('success') }}',
            });
        @endif
    </script>
@endsection
