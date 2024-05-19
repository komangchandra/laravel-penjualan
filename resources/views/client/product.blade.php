@extends('client.layouts.app')

@section('title', 'Kopi Bubuk - Produk')

@section('content')
  <section>
    <div class="container my-5 py-5">
      <h4 class="text-light">Produk Kami</h4>
      <div class="row mt-5 justify-content-center align-items-center ">
        @foreach ($products as $product)
          <div class="col-md-4 mb-4">
            <div class="card bg-primary">
              <img
                src="{{ $product->image !== 'null' ? asset('storage/products/' . $product->image) : asset('client/img/' . $product->id . '.jpg') }}"
                class="card-img-top img-fluid" alt="Produk">
              <div class="card-body">
                <h5 class="card-title fw-bold text-success fs-6 text-light">{{ $product->product_name }} -
                  {{ optional($product->category)->category_name }}</h5>
                <p class="card-text card-desc">Rp {{ number_format($product->price_discount, 0, ',', '.') }}</p>
                <div class="d-flex gap-2">
                  <a class="btn btn-secondary" href="">Lihat Produk</a>
                  <form action="{{ route('client.product.add_to_cart', $product->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-secondary"><i class="bi bi-cart3"> </i>Beli</button>
                  </form>
                </div>
                {{-- <a href="{{ route('client.product.cart') }}" class="btn btn-primary">Beli</a> --}}
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>
@endsection
