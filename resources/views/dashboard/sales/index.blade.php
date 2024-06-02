@extends('dashboard.layouts.app')

@section('title', 'Dashboard - Data Penjualan')

@push('css')
  <link href="{{ asset('/') }}dash/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
      <form action="{{ route('sales.index') }}" method="GET">
        <div class="row mb-3">
          <div class="col-md-3">
            <select class="form-select" id="bulan" name="bulan">
              <option value="">Pilih Bulan</option>
              @foreach ($mounths as $month)
                <option value="{{ $month['value'] }}">{{ $month['label'] }}</option>
              @endforeach
            </select>
          </div>
          <div class="col-md-3">
            <select class="form-select" id="tahun" name="tahun">
              <option value="">Pilih Tahun</option>
              @foreach ($years as $year)
                <option value="{{ $year }}">{{ $year }}</option>
              @endforeach
            </select>
          </div>
          <div class="col-md-3">
            <select class="form-select" id="status" name="status">
              <option value="">Pilih Status</option>
              @foreach ($statuses as $status)
                <option value="{{ $status }}">{{ $status }}</option>
              @endforeach
            </select>
          </div>
          <div class="col-md-3 align-self-end">
            <button type="submit" class="btn btn-primary">Terapkan</button>
            <a target="_blank"
              href="{{ route('sales.exportPDF', ['bulan' => $request->bulan, 'tahun' => $request->tahun, 'status' => $request->status]) }}"
              class="btn btn-success">Export PDF</a>
          </div>
        </div>
      </form>

      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>#</th>
              <th>Nama Pelanggan</th>
              <th>Nama Produk</th>
              <th>Tanggal</th>
              <th>Metode Pembayaran & Pengiriman</th>
              <th>Harga</th>
              <th>Bukti Bayar</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>#</th>
              <th>Nama Pelanggan</th>
              <th>Nama Produk</th>
              <th>Tanggal</th>
              <th>Metode Pembayaran & Pengiriman</th>
              <th>Harga</th>
              <th>Bukti Bayar</th>
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
                <td>{{ \Carbon\Carbon::parse($sale->updated_at)->format('d-M-Y') }}</td>
                <td>{{ optional($sale->payment)->bank }} - {{ optional($sale->delivery)->delivery_name }}</td>
                <td>Rp {{ number_format(optional($sale->product)->price_discount, 0, ',', '.') }}</td>
                <td>
                  <img src="{{ asset('storage/payment/' . $sale->image) }}" alt="Bukti Bayar" class="img-table">
                </td>
                <td>
                  <span
                    class="btn btn-sm 
                    {{ $sale->status === 'Pending'
                        ? 'btn-danger'
                        : ($sale->status === 'Sudah Bayar'
                            ? 'btn-warning'
                            : ($sale->status === 'Selesai'
                                ? 'btn-primary'
                                : '')) }}">
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
