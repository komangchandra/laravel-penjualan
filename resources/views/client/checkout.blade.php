@extends('client.layouts.app')

@section('title', 'Kopi Bubuk - Checkout')

@section('content')
  <section>
    <div class="container my-5 py-5">
      <h4 class="text-light">Lakukan pembayaran pada barangmu - {{ Auth::user()->name }}</h4>
      <div class="row mt-5 align-items-start mb-5">
        @if (session('success'))
          <div class="alert alert-success">
            {{ session('success') }}
          </div>
        @endif
        <div class="col-md-6">
          <ol class="list-group list-group-numbered">
            @foreach ($sales as $sale)
              <li class="list-group-item d-flex justify-content-between align-items-start bg-primary text-white">
                <div class="ms-2 me-auto">
                  <div class="fw-bold">{{ $sale->product->product_name }} -
                    {{ $sale->product->category->category_name }}
                  </div>
                  Rp {{ number_format($sale->product->price, 0, ',', '.') }}
                </div>
                <form onsubmit="return confirm('Yakin ingin menghapus data?');"
                  action="{{ route('client.sale.destroy', $sale->id) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-primary">
                    <i class="bi bi-trash-fill"></i>
                  </button>
                </form>
              </li>
            @endforeach
          </ol>
          <div class="d-flex rounded justify-content-between bg-primary text-white">
            <div class="ms-2 me-auto">
              <div class="ms-2 me-auto py-3">
                <p>Total : <span>Rp {{ number_format($totalPrice, 0, ',', '.') }}</span></p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card-body bg-primary rounded p-3">
            <form action="{{ route('client.checkout.sudahbayar') }}" method="POST" enctype="multipart/form-data">
              @method('PUT')
              @csrf
              <div class="mb-3 row">
                <label for="status" class="col-sm-5 col-form-label text-white">Metode Pembayaran</label>
                <div class="col-sm-6">
                  <select class="form-select" aria-label="Default select example" name="payment_id" required>
                    <option selected>Pilih Metode Pembayaran</option>
                    @foreach ($payments as $payment)
                      <option value="{{ $payment->id }}">{{ $payment->bank }} | {{ $payment->number }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="mb-3 row">
                <label for="status" class="col-sm-5 col-form-label text-white">Metode Pembayaran</label>
                <div class="col-sm-6">
                  <select class="form-select" aria-label="Default select example" name="delivery_id" required>
                    <option selected>Pilih Metode Pengiriman</option>
                    @foreach ($deliveries as $delivery)
                      <option value="{{ $delivery->id }}">{{ $delivery->delivery_name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="mb-3 row">
                <label for="image_payment" class="col-sm-5 col-form-label text-white">Bukti Pembayaran</label>
                <div class="col-sm-6">
                  <input type="file" class="form-control" id="image_payment" name="image_payment" required>
                </div>
              </div>
              <button type="submit" class="btn btn-light">Konfirmasi</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
