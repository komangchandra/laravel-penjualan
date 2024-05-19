@extends('client.layouts.app')

@section('title', 'Kopi Bubuk - Produk')

@section('content')
  <section>
    <div class="container my-5 py-5">
      <h4 class="text-light">Keranjang Saya - {{ Auth::user()->name }}</h4>
      @if (session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div>
      @endif
      <div class="row mt-5 justify-content-center align-items-center mb-5">
        <table class="table mb-5">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nama Produk</th>
              <th scope="col">Harga</th>
              <th scope="col">Quantity</th>
              <th scope="col">Total Harga</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($carts as $cart)
              <tr>
                <th>
                  <img src="{{ asset('storage/products/' . optional($cart->product)->image) }}"
                    alt="{{ optional($cart->product)->product_name }}" class="img-cart">
                </th>
                <td>{{ optional($cart->product)->product_name }}</td>
                <td>Rp {{ number_format(optional($cart->product)->price, 0, ',', '.') }}</td>
                <td>{{ $cart->quantity }}</td>
                <td>Rp {{ number_format($cart->total, 0, ',', '.') }}</td>
                <td>
                  <form onsubmit="return confirm('Yakin ingin menghapus data?');"
                    action="{{ route('client.product.destroy', $cart->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger"><i class="bi bi-x-lg"></i></button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>

        <form action="{{ route('client.checkout') }}" method="POST" class="mx-auto">
          @csrf
          <button type="submit" class="btn btn-primary">Checkout</button>
        </form>

        <style>
          .quantity-column {
            width: 150px;
            /* Sesuaikan lebar kolom sesuai kebutuhan */
          }
        </style>

      </div>
    </div>
  </section>
@endsection
