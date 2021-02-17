<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;
use Auth;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
    }

    public function index()
    {

        $record = Sale::where('user_id', Auth::id())->where('status', 'paid')->get();
      
         $data = [];
     
         foreach($record as $row) {
            $data['label'][] = $row->getCourse->title;
            $data['data'][] = (int) $row->price;
          }
     
        $data['chart_data'] = json_encode($data);
        
        $sales = Sale::where('user_id', Auth::id())->paginate(5);

        return view('student.index',compact('sales', 'data'));
    }
}
