<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
use Auth;

class MakeTodoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function input()
    {
        return view('makeTodo.input');
    }

    public function confirm(Request $req)
    {
        $validatedData = $req -> validate([
            'title' => 'required|max:140',
        ]);

        $data['title'] = $req->title;
        $data['time_limit'] = $req->time_limit;
        $data['priority_cls'] = $req->priority_cls;
        $data['description'] = $req->description;

        return view('makeTodo.confirm', ['todo' => $data]);
    }

    public function complete(Request $req)
    {
        //モデルオブジェクトをインスタント化
        $todos = new Todo();

        $todos->user_id = Auth::id();
        $todos->title = $req->title;
        $todos->comp_cls = '0';
        $todos->time_limit = $req->time_limit;
        $todos->priority_cls = $req->priority_cls;
        $todos->description = $req->description;

        $todos->save(); 

        return view('makeTodo.complete');
    }
}
