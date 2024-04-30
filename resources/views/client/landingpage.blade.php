@extends('client.layouts.app')

@section('title', 'Kopi Bubuk')

@section('content')
  <section>
    <div class="container py-5 my-5">
      <div class="row d-flex align-items-center justify-content-center">
        <div class="col-md-6">
          <h4>Lorem ipsum dolor sit amet.</h4>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem, eos repudiandae odit culpa doloribus velit
            laudantium. Asperiores totam praesentium vitae.</p>
          <a class="btn btn-primary" href="">Beli sekarang</a>
        </div>
        <div class="col-md-6">
          <img class="img-blog" src="{{ asset('/') }}client/img/Group.png" alt="Hero">
        </div>
      </div>
    </div>
  </section>

  <section class="bg-primary">
    <div class="container py-5 my-5">
      <div class="row d-flex gap-3 justify-content-center">
        <div class="col-md-3 mx-auto ">
          <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                    Earnings (Monthly)</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-calendar fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3 mx-auto ">
          <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                    Earnings (Monthly)</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-calendar fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3 mx-auto ">
          <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                    Earnings (Monthly)</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-calendar fa-2x text-gray-300"></i>
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
      <h4>Produk Terbaru</h4>
      <div class="row mt-5 justify-content-center align-items-center ">
        <div class="col-md-4">
          <div class="card">
            <img src="{{ asset('/') }}client/img/Group.png" class="card-img-top img-fluid" alt="Profuk">
            <div class="card-body">
              <h5 class="card-title fw-bold text-success">Judul Produk</h5>
              <p class="card-text card-desc">harga</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <img src="{{ asset('/') }}client/img/Group.png" class="card-img-top img-fluid" alt="Profuk">
            <div class="card-body">
              <h5 class="card-title fw-bold text-success">Judul Produk</h5>
              <p class="card-text card-desc">harga</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <img src="{{ asset('/') }}client/img/Group.png" class="card-img-top img-fluid" alt="Profuk">
            <div class="card-body">
              <h5 class="card-title fw-bold text-success">Judul Produk</h5>
              <p class="card-text card-desc">harga</p>
            </div>
          </div>
        </div>
      </div>
      <div class="mt-5 justify-content-center align-items-center d-flex">
        <a class="mx-auto text-decoration-none" href="">Semua produk..</a>
      </div>
    </div>
  </section>

  <footer class="bg-primary">
    <div class="container mt-5 py-5 d-flex">
      <span class="mx-auto text-white">Copyright &copy; Alifian Akbar 2024</span>
    </div>
  </footer>
@endsection
