@extends('admin.partials.tambahuser')
@section('container')
    <div class="container">
        <!-- BREADCRUMB -->
        <div class="page-meta">
            <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Form</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah Foods</li>
                </ol>
            </nav>
        </div>
        <!-- /BREADCRUMB -->
        <div class="row">
            <div id="flHorizontalForm" class="col-lg-12 layout-spacing">
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area">
                        <form method="POST" action="{{ route('foods.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label for="inputHarga" class="col-sm-2 col-form-label">PLU</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="inputHarga" name="plu" required />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputNamaLengkap" class="col-sm-2 col-form-label">Deskripsi</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputNamaLengkap" name="nama"
                                        required />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputExp" class="col-sm-2 col-form-label">Exp</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" id="inputExp" name="exp" required />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputTanggalDatang" class="col-sm-2 col-form-label">Tanggal Datang</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" id="inputTanggalDatang" name="tanggal_datang"
                                        required />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputQty" class="col-sm-2 col-form-label">Quantity</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputQty" name="qty" required />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputLoc" class="col-sm-2 col-form-label">Location</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputLoc" name="loc" required />
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
