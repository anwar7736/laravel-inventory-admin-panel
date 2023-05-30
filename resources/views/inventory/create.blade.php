@extends('layouts.master')
@section('title', 'Dashboard')
@section('content')
  <main id="main" class="main">

<div class="pagetitle">
  <h1>Manage Stock</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
      <li class="breadcrumb-item active">Manage Stock</li>
    </ol>
  </nav>
</div><!-- End Page Title -->
<div>
    <a href="{{ route('product.index') }}" class="btn btn-sm btn-secondary mb-2">Back</a>
  </div>
<section class="section dashboard">
  <div class="row">
    <div class="col-md-12 table-responsive">
<form action="{{ route('stock.store') }}" method="POST">
    @csrf
    <table class="table table-bordered table-striped">
  <thead class="thead-dark">
  <tr>
      <th scope="col">Inventory Item</th>
    </tr>    
    <tr>
      <th scope="col">Type <span class="text-danger">*</span></th>
      <th scope="col">Item <span class="text-danger">*</span></th>
      <th scope="col">Input Quantity <span class="text-danger">*</span></th>
      <th scope="col">Current Quantity</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody id="tbl_inventory">
    @include('inventory.partials.item_row', ['type'=>0])
  </tbody>    
  <tr>
        <td colspan="5" align="right">
            <button type="button" class="btn btn-success btn-sm add_more"><i class="bi bi-plus"></i> Add Item</button>
        </td>
    </tr>    
    <tr>
        <td colspan="4" align="center">
            <button type="submit" class="btn btn-primary submit">Submit</button>
        </td>
    </tr>
</table>
</form>
    </div>

  </div><!-- End Revenue Card -->
</section>

</main><!-- End #main -->
@endsection

@push('js')
<script>
    $(document).ready(function(){
        $(document).on('click', 'button.add_more', function(){
            $.ajax({
                url: "{{ route('row.add') }}",
                method: "GET",
                success: function(res){
                    $('tbody#tbl_inventory').append(res);
                }
            });
       });       
       
       $(document).on('click', 'button.remove_item', function(){
            if(confirm('Are you sure?'))
            {
                $(this).closest('tr').remove();
            }
       });       
       
       $(document).on('change', 'select.item', function(){
            let current_stock = $(this).closest('td').find('select.item option:selected').data('stock');
            $(this).closest('tr').find('input.current_quantity').val(current_stock);
            let value = $(this).val();
       });    
       
       $(document).on('change', 'select.type', function(){
            inputValidation(this);
       });   
       
       $(document).on('blur', 'input.input_quantity', function(){
            inputValidation(this);
       });

       function inputValidation(elem)
       {
            let input_quantity = Number($(elem).closest('tr').find('input.input_quantity').val());
            let type = $(elem).closest('tr').find('select.type option:selected').val();
            let current_stock = Number($(elem).closest('tr').find('select.item option:selected').data('stock'));
            if(type == 'decrease')
            {
                if(input_quantity > current_stock )
               {
                $(elem).closest('tr').find('span.error').remove();
                $(elem).closest('tr').find('input.input_quantity').after(`<span class="text-danger error">less than or equal ${current_stock}</span>`);
                $(document).find('button.submit').attr('disabled', true);
               }               
               else
               {
                    $(elem).closest('tr').find('span.error').remove();
                    $(document).find('button.submit').attr('disabled', false);
               }
            }   
            else
            {
                $(elem).closest('tr').find('span.error').remove();
                $(document).find('button.submit').attr('disabled', false);
            }         
       }
       
    });
</script>

@endpush