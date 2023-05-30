@extends('layouts.master')
@section('content')
  <main id="main" class="main">

<div class="pagetitle">
  <h1>{{ __('lang.title') }}</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('lang.home') }}</a></li>
      <li class="breadcrumb-item active">{{ __('lang.title') }}</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
  <div class="row">

    <!-- Left side columns -->
    <div class="col-lg-12">
      <div class="row">

        <!-- Sales Card -->
        <div class="col-xxl-4 col-md-4">
          <div class="card info-card sales-card">
            <div class="card-body">
              <h5 class="card-title">{{ __('lang.total_user') }}</span></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-person"></i>
                </div>
                <div class="ps-3">
                  <h6>{{ $data['total_user'] }}</h6>
                </div>
              </div>
            </div>

          </div>
        </div><!-- End Sales Card -->        
        <!-- Sales Card -->
        <div class="col-xxl-4 col-md-4">
          <div class="card info-card sales-card">
            <div class="card-body">
              <h5 class="card-title">{{ __('lang.total_product') }}</span></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-cart"></i>
                </div>
                <div class="ps-3">
                  <h6>{{ $data['total_product'] }}</h6>
                </div>
              </div>
            </div>

          </div>
        </div><!-- End Sales Card -->


    
      
</section>

</main><!-- End #main -->
@endsection