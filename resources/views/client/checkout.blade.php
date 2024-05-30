@extends('client.layouts.app')

@section('title', 'Kopi Bubuk - Checkout')

@section('content')
  <section>
    <div class="container my-5 py-5">
      <h4 class="text-light">Lakukan pembayaran pada barangmu - {{ Auth::user()->name }}</h4>
      <div class="row mt-5 justify-content-center align-items-center mb-5">
        <div class="col-md-6">
          <ol class="list-group list-group-numbered">
            <li class="list-group-item d-flex justify-content-between align-items-start">
              <div class="ms-2 me-auto">
                <div class="fw-bold">Subheading</div>
                Content for list item
              </div>
              <span class="badge text-bg-primary rounded-pill">14</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-start">
              <div class="ms-2 me-auto">
                <div class="fw-bold">Subheading</div>
                Content for list item
              </div>
              <span class="badge text-bg-primary rounded-pill">14</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-start">
              <div class="ms-2 me-auto">
                <div class="fw-bold">Subheading</div>
                Content for list item
              </div>
              <span class="badge text-bg-primary rounded-pill">14</span>
            </li>
          </ol>
        </div>
      </div>
    </div>
  </section>
@endsection
