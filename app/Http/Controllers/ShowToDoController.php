<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class ShowTodoController extends Controller
{
    public function list(Request $req){

        $data = new Todo();

        if (!empty($req -> str)){
            $data = $data -> where('title','LIKE','%'.$req -> str.'%')
                -> orWhere('description','LIKE','%'.$req -> str.'%');
        }

        if (!empty($req->comp_cls)){
            $data = $data -> whereIn('comp_cls',$req->comp_cls);
        }

        if (!empty($req->time_limit_start)){
            $data = $data -> whereDate('time_limit','>',$req -> time_limit_start);
        }

        if (!empty($req->time_limit_end)){
            $data = $data -> whereDate('time_limit','<',$req -> time_limit_end);
        }

        if (!empty($req->priority_cls)){
            $data = $data -> whereIn('priority_cls',$req->priority_cls);
        }

        $data = ['todoList' => $data ->get()];

        return view('showTodo.list',$data);
    }

    public function detail(Request $req){
        $data = ['todo' => Todo::find($req->id)];

        return view('showTodo.detail',$data);
    }

    public function search(){
        return view('showTodo.search',['result' => '']);
    }
}
