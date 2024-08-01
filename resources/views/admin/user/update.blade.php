@extends('admin.partials.tambahuser')
@section('container')
    <div class="container">
        <div class="container">
            <!-- BREADCRUMB -->
            <div class="page-meta">
                <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Form</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Update User
                        </li>
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
                                    <h4>Update User</h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <form method="post" action="{{ route('users.update', $user->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row mb-3">
                                    <label for="inputNamaLengkap" class="col-sm-2 col-form-label">Nama</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputNamaLengkap" name="nama"
                                            value="{{ old('nama', $user->nama) }}" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="inputEmail" name="email"
                                            value="{{ old('email', $user->email) }}" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputTempatLahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputTempatLahir" name="tempat_lahir"
                                            value="{{ old('tempat_lahir', $user->tempat_lahir) }}" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputTanggalLahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" id="inputTanggalLahir" name="tgl_lahir"
                                            value="{{ old('tgl_lahir', $user->tgl_lahir) }}" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputAlamat" class="col-sm-2 col-form-label">Alamat</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputAlamat" name="alamat"
                                            value="{{ old('alamat', $user->alamat) }}" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputRole" class="col-sm-2 col-form-label">Role</label>
                                    <div class="col-sm-10">
                                        <select name="role" id="role" class="form-control">
                                            <option value=""></option>
                                            <option value="Admin" {{ $user->role == 'Admin' ? 'selected' : '' }}>Admin
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
