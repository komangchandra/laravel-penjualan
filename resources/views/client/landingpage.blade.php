@extends('client.layouts.app')

@section('title', 'Kopi Bubuk')

@section('content')
  <section>
    <div class="container py-3">
      <div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="false">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="{{ asset('client/img/banner-1.jpg') }}" class="d-block w-100" alt="Banner image">
          </div>
          <div class="carousel-item">
            <img src="{{ asset('client/img/banner-2.jpg') }}" class="d-block w-100" alt="Banner image">
          </div>
          <div class="carousel-item">
            <img src="{{ asset('client/img/banner-3.jpg') }}" class="d-block w-100" alt="Banner image">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching"
          data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching"
          data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>
  </section>

  <section class="bg-primary">
    <div class="container py-5 mb-5">
      <div class="row d-flex gap-3 justify-content-center">
        <div class="col-md-9 mx-auto ">
          <div class="card border-left-primary shadow h-100 py-2 bg-secondary">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="h5 mb-0 font-weight-bold text-gray-800 text-light">
                    <span class="text-uppercase">
                      {{ $profile[0]->company_name }} -
                    </span> {{ $profile[0]->address }}
                  </div>
                  <div class="text-xs font-weight-bold text-light mb-1">
                    {{ $profile[0]->number }} - {{ $profile[0]->email }}
                  </div>
                </div>
                <div class="col-auto">
                  <i class="fas  fa-2x text-white-300"></i>
                  <i class="bi bi-cup-hot-fill fs-2"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section>
    <div class="container my-5 py-5">
      <h4 class="text-light">Produk Terbaru</h4>
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
                  <a class="btn btn-secondary" href="{{ route('client.product.show', $product->id) }}">Lihat Produk</a>
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
      <div class="mt-5 justify-content-center align-items-center d-flex">
        <a class="mx-auto text-decoration-none text-light" href="/products">Semua produk..</a>
      </div>
    </div>
  </section>
@endsection
