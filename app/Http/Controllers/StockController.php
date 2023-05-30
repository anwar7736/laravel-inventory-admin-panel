<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index()
    {
        return view('inventory.create');
    }    
    
    public function addItemRow()
    {
        return view('inventory.partials.item_row', ['type'=>1])->render();
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'type.*' => ['required'],
            'item.*' => ['required'],
            'input_quantity.*' => ['required'],
            'current_quantity.*' => [''],
        ]);

        foreach($request->item as $key => $item)
        {
            if($request->type[$key] == 'increase')
            {
                Stock::where('product_id', $request->item[$key])->update([
                    'quantity' => $request->current_quantity[$key] + $request->input_quantity[$key]
                ]);
            }
            else{
                Stock::where('product_id', $request->item[$key])->update([
                    'quantity' => $request->current_quantity[$key] - $request->input_quantity[$key]
                ]);
            }
        }

        return redirect()->route('product.index')->with('success', 'Inventory added successfully');
    }
    
    
}
