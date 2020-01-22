<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class ShowTodoController extends Controller
{
    public function list(){
        $data = ['todoList' => Todo::all()];

        return view('showTodo.list',$data);
    }
}
