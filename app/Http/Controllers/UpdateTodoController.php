<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class UpdateTodoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function input(Request $req)
    {
        $data['id'] = $req->id;
        $data['title'] = $req->title;
        $data['comp_cls'] = $req->comp_cls;
        $data['time_limit'] = $req->time_limit;
        $data['priority_cls'] = $req->priority_cls;
        $data['description'] = $req->description;

        return view('updateTodo.input', ['todo' => $data]);
    }

    public function confirm(Request $req)
    {
        $validatedData = $req->validate([
            'title' => 'required|max:140',
        ]);

        $data['id'] = $req->id;
        $data['title'] = $req->title;
        $data['comp_cls'] = $req->comp_cls;
        $data['time_limit'] = $req->time_limit;
        $data['priority_cls'] = $req->priority_cls;
        $data['description'] = $req->description;

        return view('updateTodo.confirm', ['todo' => $data]);
    }

    public function complete(Request $req)
    {
        $data = Todo::find($req->id);

        $data->fill($req->except('_token','_method','user_id'))->save();

        return view('updateTodo.complete');
    }
}
