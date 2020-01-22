<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class ShowToDoController extends Controller
{
    public function list(){
        $data = ['todoList' => Todo::all()];

        return view('showToDo.list',$data);
    }
}
