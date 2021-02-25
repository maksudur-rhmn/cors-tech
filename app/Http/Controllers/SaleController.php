<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;

class SaleController extends Controller
{
   public function __construct()
   {
     $this->middleware('auth');
     $this->middleware('verified');
     $this->middleware('checkRole');
   }

   public function index()
   {
     return view('backend.sale.index', [
       'sales' => Sale::latest()->get(),
     ]);
   }
}
