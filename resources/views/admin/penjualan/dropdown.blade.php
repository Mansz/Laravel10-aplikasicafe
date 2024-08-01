@extends('admin.partials.tambahpenjualan')
@section('container')
    <div class="layout-px-spacing">
        <div class="middle-content container-xxl p-0">
            <div class="row invoice layout-top-spacing layout-spacing">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="doc-container">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="invoice-content">
                                    <form method="POST" enctype="multipart/form-data"
                                        action="{{ route('penjualan.store') }}">
                                        @csrf
                                        <div class="invoice-detail-body">
                                            <div class="invoice-detail-terms">
                                                <div class="row justify-content-between">
                                                    <div class="col-md-3">
                                                        <div class="form-group mb-4">
                                                            <label for="number">Kode Invoice</label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                id="kode_invoice" name="kode_invoice"
                                                                value="{{ 'INV-' . date('Ymd') . '-' . uniqid() }}"
                                                                readonly />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group mb-4">
                                                            <label for="date">Tanggal Invoice</label>
                                                            <input type="date" class="form-control form-control-sm"
                                                                id="tgl" name="tgl" value="{{ date('Y-m-d') }}" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="invoice-detail-items">
                                                <div class="table-responsive">
                                                    <table class="table item-table">
                                                        <thead>
                                                            <tr>
                                                                <th></th>
                                                                <th>PLU</th>
                                                                <th>Deskripsi</th>
                                                                <th>Qty Stock</th>
                                                                <th>Exp Date</th>
                                                                <th>Qty Keluar</th>
                                                            </tr>
                                                            <tr aria-hidden="true" class="mt-3 d-block table-row-hidden">
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td class="delete-item-row">
                                                                    <ul class="table-controls">
                                                                        <li>
                                                                            <a href="javascript:void(0);"
                                                                                class="delete-item" data-toggle="tooltip"
                                                                                data-placement="top" title="Delete"
                                                                                onclick="deleteItem(this)">
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    width="24" height="24"
                                                                                    viewBox="0 0 24 24" fill="none"
                                                                                    stroke="currentColor" stroke-width="2"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round"
                                                                                    class="feather feather-x-circle">
                                                                                    <circle cx="12" cy="12"
                                                                                        r="10"></circle>
                                                                                    <line x1="15" y1="9"
                                                                                        x2="9" y2="15">
                                                                                    </line>
                                                                                    <line x1="9" y1="9"
                                                                                        x2="15" y2="15">
                                                                                    </line>
                                                                                </svg>
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </td>
                                                                <td class="description">
                                                                    <select
                                                                        class="form-control form-control-sm produk-dropdown"
                                                                        name="plu[]" onchange="updateItem(this)">
                                                                        <option value="">Pilih Produk</option>
                                                                        @foreach ($produks as $produk)
                                                                            <option value="{{ $produk->id }}"
                                                                                data-kategori="{{ $produk->kategori }}"
                                                                                data-harga="{{ $produk->harga }}">
                                                                                {{ $produk->plu }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </td>
                                                                <td class="rate">
                                                                    <input type="text"
                                                                        class="form-control form-control-sm nama"
                                                                        name="nama[]" readonly />
                                                                </td>
                                                                <td class="rate">
                                                                    <input type="text"
                                                                        class="form-control form-control-sm stock"
                                                                        name="stock[]" readonly />
                                                                </td>
                                                                <td class="rate">
                                                                    <input type="text"
                                                                        class="form-control form-control-sm exp_date"
                                                                        name="exp_date[]" readonly />
                                                                </td>
                                                                <td class="rate">
                                                                    <input type="text"
                                                                        class="form-control form-control-sm qty_keluar"
                                                                        name="qty[]" />
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <button type="button" class="btn btn-dark additem" onclick="addItem()">Add
                                                    Item</button>
                                            </div>
                                            <div class="invoice-detail-total">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function updateItem(selectElement) {
            const produkId = selectElement.value;
            if (produkId) {
                fetch(`/produk/${produkId}`)
                    .then(response => response.json())
                    .then(data => {
                        const row = selectElement.closest('tr');
                        row.querySelector('.nama').value = data.nama;
                        row.querySelector('.stock').value = data.qty;
                        row.querySelector('.exp_date').value = data.exp;
                    })
                    .catch(error => console.error('Error:', error));
            }
        }

        function addItem() {
            const tableBody = document.querySelector('.item-table tbody');
            const newRow = document.createElement('tr');

            newRow.innerHTML = `
                <td class="delete-item-row">
                    <ul class="table-controls">
                        <li>
                            <a href="javascript:void(0);" class="delete-item" data-toggle="tooltip" data-placement="top" title="Delete" onclick="deleteItem(this)">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <line x1="15" y1="9" x2="9" y2="15"></line>
                                    <line x1="9" y1="9" x2="15" y2="15"></line>
                                </svg>
                            </a>
                        </li>
                    </ul>
                </td>
                <td class="description">
                    <select class="form-control form-control-sm produk-dropdown" name="plu[]" onchange="updateItem(this)">
                        <option value="">Pilih Produk</option>
                        @foreach ($produks as $produk)
                            <option value="{{ $produk->id }}" data-kategori="{{ $produk->kategori }}" data-harga="{{ $produk->harga }}">
                                {{ $produk->plu }}
                            </option>
                        @endforeach
                    </select>
                </td>
                <td class="rate">
                    <input type="text" class="form-control form-control-sm nama" name="nama[]" readonly />
                </td>
                <td class="rate">
                    <input type="text" class="form-control form-control-sm stock" name="stock[]" readonly />
                </td>
                <td class="rate">
                    <input type="text" class="form-control form-control-sm exp_date" name="exp_date[]" readonly />
                </td>
                <td class="rate">
                    <input type="text" class="form-control form-control-sm qty_keluar" name="qty[]" />
                </td>
            `;

            tableBody.appendChild(newRow);
        }

        function deleteItem(deleteButton) {
            const row = deleteButton.closest('tr');
            row.remove();
        }
    </script>
@endsection
