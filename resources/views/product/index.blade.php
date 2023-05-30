@extends('layouts.master')
@section('title', 'Dashboard')
@section('content')
  <main id="main" class="main">

<div class="pagetitle">
  <h1>All Product</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
      <li class="breadcrumb-item active">All Product</li>
    </ol>
  </nav>
  <div align="left">
    <a href="{{ route('manage.stock') }}" class="btn btn-sm btn-dark">Manage Stock</a>
  </div>  
  <div align="right">
    <a href="{{ route('product.create') }}" class="btn btn-sm btn-primary">Add Product</a>
  </div>
</div><!-- End Page Title -->
@if(session()->has('message'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> {{ session('message') }}
</div>
@endif
<section class="section dashboard">
  <div class="row">
    <div class="col-md-12 table-responsive">
    <table class="table table-bordered table-striped">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#SL</th>
      <th scope="col">Name</th>
      <th scope="col">Price</th>
      <th scope="col">Stock</th>
      <th scope="col">Stock Value</th>
      <th scope="col" colspan="2" class="text-center">Action</th>
    </tr>
  </thead>
  <tbody id="tbl_product">
    @forelse($products as $key => $item)
        <tr>
            <td>{{ $key +1 }}</td>
            <td>{{ $item->name}}</td>
            <td>{{ $item->price}}</td>
            <td>{{ $item->stock->quantity}}</td>
            <td>{{ $item->stock_value}}</td>
            <td class="text-center">
                <a href="{{ route('product.edit', [$item->id]) }}" class="btn btn-success btn-sm">Edit</a>
            </td>  
            <td class="text-center">
                <form onsubmit="return confirm('Are you sure?')" action="{{ route('product.destroy', [$item->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
    @empty
    <tr>
        <td colspan="6" class="text-danger" align="center">No Product Found!</td>
    </tr>
    @endforelse
  </tbody>    
</table>
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