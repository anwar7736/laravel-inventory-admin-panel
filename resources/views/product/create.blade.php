@extends('layouts.master')
@section('title', 'Dashboard')
@section('content')
  <main id="main" class="main">

<div class="pagetitle">
  <h1>Add New Product</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
      <li class="breadcrumb-item active">Add New Product</li>
    </ol>
  </nav>
  <div>
    <a href="{{ route('product.index') }}" class="btn btn-sm btn-secondary">Back</a>
  </div>
</div><!-- End Page Title -->

<section class="section dashboard">
  <div class="row">
    <div class="col-md-8 offset-md-2">
        
        <form method="POST" action="{{ route('product.store') }}">
            @csrf
        <div class="form-group mb-2">
                <label for="name">Product Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" aria-describedby="emailHelp" value="{{ old('name') }}" placeholder="Enter unique product name...">
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>            
            <div class="form-group mb-2">
                <label for="price">Product Price</label>
                <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price" aria-describedby="emailHelp" value="{{ old('price') }}" placeholder="Enter product unit price...">
                @error('price')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>            
            <div class="form-group">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>

        </form>
    </div>

  </div><!-- End Revenue Card -->
</section>

</main><!-- End #main -->
@endsection

@push('js')
<script>
    $(document).ready(function(){
       
       
    });
</script>

@endpush