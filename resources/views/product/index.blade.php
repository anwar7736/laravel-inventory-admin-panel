@extends('layouts.master')
@section('title', 'Dashboard')
@section('content')
  <main id="main" class="main">

<div class="pagetitle">
  <h1>{{ __('lang.all_product') }}</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('lang.home') }}</a></li>
      <li class="breadcrumb-item active">{{ __('lang.all_product') }}</li>
    </ol>
  </nav>
  <div align="left">
    <a href="{{ route('manage.stock') }}" class="btn btn-sm btn-dark">{{ __('lang.stock_manage') }}</a>
  </div>  
  <div align="right">
    <a href="{{ route('product.create') }}" class="btn btn-sm btn-primary">{{ __('lang.add_product') }}</a>
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
      <th scope="col">{{ __('lang.sl') }}</th>
      <th scope="col">{{ __('lang.name') }}</th>
      <th scope="col">{{ __('lang.price') }}</th>
      <th scope="col">{{ __('lang.stock') }}</th>
      <th scope="col">{{ __('lang.stock_value') }}</th>
      <th scope="col" colspan="2" class="text-center">{{ __('lang.action') }}</th>
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
                <a href="{{ route('product.edit', [$item->id]) }}" class="btn btn-success btn-sm">{{ __('lang.edit') }}</a>
            </td>  
            <td class="text-center">
                <form onsubmit="return confirm('Are you sure?')" action="{{ route('product.destroy', [$item->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">{{ __('lang.delete') }}</button>
                </form>
            </td>
        </tr>
    @empty
    <tr>
        <td colspan="6" class="text-danger" align="center">{{ __('lang.no_data_found') }}</td>
    </tr>
    @endforelse
    {{ $products->links() }}
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