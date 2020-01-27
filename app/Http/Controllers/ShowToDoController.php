<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
use Auth;

class ShowTodoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function list(Request $req){

        $validatedData = $req -> validate([
            'time_limit_end' => 'nullable|date|after:time_limit_start',
        ]);

        $data = new Todo();

        $data = $data -> where('user_id',Auth::id());

        if (!empty($req -> str)){
            $data = $data -> where('title','LIKE','%'.$req -> str.'%')
                -> orWhere('description','LIKE','%'.$req -> str.'%');
        }

        if (!empty($req->comp_cls)){
            $data = $data -> whereIn('comp_cls',$req->comp_cls);
        } else {
            $data = $data -> where('comp_cls',config('constant.not_yet'));
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

        if (!empty($req->time_limit_sort)){
            $data = $data -> orderBy($req->sort_column,$req->asc_desc);
        } else {
            $data = $data -> orderBy('time_limit', 'asc');
        }

        $data = ['todoList' => $data ->get()];

        return view('showTodo.list',$data);
    }

    public function detail(Request $req){
        $data = ['todo' => Todo::find($req->id)];

        return view('showTodo.detail',$data);
    }

    public function search(){
        return view('showTodo.search');
    }
}
