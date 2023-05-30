<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $lang = request('lang');
        app()->setLocale($lang);
        session()->forget('lang');       
        session()->put('lang', $lang);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $data = [];

        $data['total_user'] = User::count();
        $data['total_product'] = Product::count();

        return view('index', compact('data'));
    }
}
