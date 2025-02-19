@extends('dashboard.layouts.app')

@section('title', 'Dashboard - Tambah Kategori')

@section('content')
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Tambahkan data kategorimu</h1>

    <div class="row">
      <div class="col-lg-6">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form tambah kategori</h6>
          </div>
          <div class="card-body">
            <form action="{{ route('categories.store') }}" method="POST">
              @csrf
              <div class="mb-3 row">
                <label for="category_name" class="col-sm-4 col-form-label">Nama Kategori</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" id="category_name" name="category_name" required>
                </div>
              </div>
              <button type="submit" class="btn btn-primary">Tambah kategori</button>
            </form>
          </div>
        </div>
      </div>
    </div>

  </div>
@endsection
