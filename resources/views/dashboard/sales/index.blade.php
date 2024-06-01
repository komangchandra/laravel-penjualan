@extends('dashboard.layouts.app')

@section('title', 'Dashboard - Data Penjualan')

@push('css')
  <link href="{{ asset('/') }}dash/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endpush

@section('content')
  <h1 class="h3 mb-4 text-gray-800">Penjualan</h1>

  @if (session('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
  @endif

  <div class="card shad ow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Tabel Penjualan</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>#</th>
              <th>Nama Pelanggan</th>
              <th>Nama Produk</th>
              <th>Metode Pembayaran</th>
              <th>Metode Pengiriman</th>
              <th>Harga</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>#</th>
              <th>Nama Pelanggan</th>
              <th>Nama Produk</th>
              <th>Metode Pembayaran</th>
              <th>Metode Pengiriman</th>
              <th>Harga</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </tfoot>
          <tbody>
            @forelse ($sales as $sale)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ optional($sale->user)->name }}</td>
                <td>
                  {{ optional($sale->product)->product_name }} - {{ optional($sale->product)->category->category_name }}
                </td>
                <td>{{ optional($sale->payment)->bank }}</td>
                <td>{{ optional($sale->delivery)->delivery_name }}</td>
                <td>Rp {{ number_format(optional($sale->product)->price_discount, 0, ',', '.') }}</td>
                <td>
                  <span class="btn btn-sm {{ $sale->status === 'Pending' ? 'btn-warning' : 'btn-primary' }}">
                    {{ $sale->status }}
                  </span>
                </td>
                <td>
                  <a href="{{ route('sales.edit', $sale->id) }}" class="btn btn-sm btn-warning"><i
                      class="fa fa-pencil-alt"></i></a>
                </td>
              </tr>
            @empty
              <div class="alert alert-danger">
                Data kosong.
              </div>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection


@push('js')
  <!-- Page level plugins -->
  <script src="{{ asset('/') }}dash/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="{{ asset('/') }}dash/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="{{ asset('/') }}dash/js/demo/datatables-demo.js"></script>
@endpush
