<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class UpdateTodoController extends Controller
{
    public function input(Request $req)
    {
        return view('updateTodo.input', ['req' => $req]);
    }

    public function confirm(Request $req)
    {
        return view('updateTodo.confirm', ['req' => $req]);
    }

    public function complete(Request $req)
    {
        $data = Todo::find($req->id);

        $data->fill($req->except('_token','_method','user_id'))->save();

        return view('updateTodo.complete', ['result' => '']);
    }
}
