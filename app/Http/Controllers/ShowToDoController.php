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

    public function detail(Request $req){
        $data = ['todo' => Todo::find($req->id)];

        return view('showTodo.detail',$data);
    }
}
