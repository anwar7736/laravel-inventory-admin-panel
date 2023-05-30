@php 
    $products = \App\Models\Product::with('stock')->get(['id', 'name']);
@endphp

<tr>
    <td>
        <select name="type[]" class="form-control select2 type" required>
            <option value="">Please Select Any One</option>
            <option value="increase">Increase</option>
            <option value="decrease">Decrease</option>
        </select>
    </td>            
    <td>
        <select name="item[]" class="form-control select2 item" required>
            <option value="">Please Select Any One</option>
            @foreach($products as $key => $item)
                <option value="{{ $item->id }}" data-stock="{{ $item->stock->quantity }}">{{ $item->name }}</option>
            @endforeach
        </select>
    </td>
    <td>
        <input type="text" name="input_quantity[]" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" class="form-control input_quantity" required>
    </td>        
    <td>
        <input type="text" name="current_quantity[]"  class="form-control current_quantity" readonly style="background:#f0ebeb">
    </td>        
    @if($type == 0)
    <td></td>
    @else
    <td>
        <button type="button" class="btn btn-danger btn-sm remove_item">Remove</button>
    </td>
    @endif
</tr>