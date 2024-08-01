@extends('admin.partials.tambahpenjualan')
@section('container')
    <div class="layout-px-spacing">
        <div class="middle-content container-xxl p-0">
            @if (session('success'))
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: '{{ session('success') }}',
                        showConfirmButton: false,
                        timer: 1500
                    });
                </script>
            @endif
            @if (session('error'))
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: '{{ session('error') }}',
                        showConfirmButton: true
                    });
                </script>
            @endif

            <div class="row invoice layout-top-spacing layout-spacing">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="doc-container">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="invoice-content">
                                    <form id="penjualan-form" method="POST" enctype="multipart/form-data"
                                        action="{{ route('penjualan.update', $penjualan->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <div class="invoice-detail-body">
                                            <div class="invoice-detail-terms">
                                                <div class="row justify-content-between">
                                                    <div class="col-md-3">
                                                        <div class="form-group mb-4">
                                                            <label for="number">Kode Invoice</label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                id="kode_invoice" name="kode_invoice"
                                                                value="{{ old('kode_invoice', $penjualan->kode_invoice) }}"
                                                                readonly />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group mb-4">
                                                            <label for="date">Tanggal Invoice</label>
                                                            <input type="date" class="form-control form-control-sm"
                                                                id="tgl" name="tgl"
                                                                value="{{ old('tgl', $penjualan->tgl) }}" />
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
                                                            @foreach ($detailPenjualan as $index => $detail)
                                                                <tr>
                                                                    <td class="delete-item-row">
                                                                        <ul class="table-controls">
                                                                            <li>
                                                                                <a href="javascript:void(0);"
                                                                                    class="delete-item"
                                                                                    data-toggle="tooltip"
                                                                                    data-placement="top" title="Delete"
                                                                                    onclick="deleteItem(this)">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                        width="24" height="24"
                                                                                        viewBox="0 0 24 24" fill="none"
                                                                                        stroke="currentColor"
                                                                                        stroke-width="2"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round"
                                                                                        class="feather feather-x-circle">
                                                                                        <circle cx="12"
                                                                                            cy="12" r="10"></circle>
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
                                                                        <input type="text"
                                                                            class="form-control form-control-sm plu-input"
                                                                            name="plu[]"
                                                                            value="{{ old('plu.' . $index, $detail->plu) }}"
                                                                            oninput="updateItem(this)"
                                                                            placeholder="Scan or enter PLU" />
                                                                    </td>
                                                                    <td class="rate">
                                                                        <input type="text"
                                                                            class="form-control form-control-sm nama"
                                                                            name="nama[]"
                                                                            value="{{ old('nama.' . $index, $detail->produk->nama) }}"
                                                                            readonly />
                                                                    </td>
                                                                    <td class="rate">
                                                                        <input type="text"
                                                                            class="form-control form-control-sm stock"
                                                                            name="stock[]"
                                                                            value="{{ old('stock.' . $index, $detail->stock) }}"
                                                                            readonly />
                                                                    </td>
                                                                    <td class="rate">
                                                                        <input type="text"
                                                                            class="form-control form-control-sm exp_date"
                                                                            name="exp_date[]"
                                                                            value="{{ old('exp_date.' . $index, $detail->exp) }}"
                                                                            readonly />
                                                                    </td>
                                                                    <td class="rate">
                                                                        <input type="text"
                                                                            class="form-control form-control-sm qty_keluar"
                                                                            name="qty_keluar[]"
                                                                            value="{{ old('qty_keluar.' . $index, $detail->qty_keluar) }}" />
                                                                    </td>
                                                                </tr>
                                                            @endforeach
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
                                    <div id="response-message"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('penjualan-form').addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            fetch(this.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: data.success,
                            showConfirmButton: false,
                            timer: 1500
                        }).then(() => {
                            window.location.href = "{{ route('penjualan.index') }}";
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: data.error,
                            showConfirmButton: true
                        });
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'An error occurred. Please try again.',
                        showConfirmButton: true
                    });
                });
        });

        function updateItem(inputElement) {
            const plu = inputElement.value;
            if (plu) {
                fetch(`/produk/plu/${plu}`)
                    .then(response => response.json())
                    .then(data => {
                        const row = inputElement.closest('tr');
                        row.querySelector('.nama').value = data.nama;
                        row.querySelector('.stock').value = data.qty;
                        row.querySelector('.exp_date').value = data.exp;
                    })
                    .catch(error => console.error('Error:', error));
            }
        }

        function applyAutocomplete() {
            $('.plu-input').autocomplete({
                source: function(request, response) {
                    $.ajax({
                        url: '/produk/search',
                        dataType: 'json',
                        data: {
                            term: request.term
                        },
                        success: function(data) {
                            response(data);
                        }
                    });
                },
                minLength: 2,
                select: function(event, ui) {
                    $(this).val(ui.item.value);
                    updateItem(this);
                    return false;
                }
            });
        }

        $(document).ready(function() {
            applyAutocomplete();
        });

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
            <input type="text" class="form-control form-control-sm plu-input" name="plu[]" placeholder="Scan or enter PLU"  oninput="updateItem(this)" />
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
            <input type="text" class="form-control form-control-sm qty_keluar" name="qty_keluar[]" />
        </td>
    `;

            tableBody.appendChild(newRow);
            applyAutocomplete();
        }

        function deleteItem(deleteButton) {
            const row = deleteButton.closest('tr');
            row.remove();
        }
    </script>
@endsection
