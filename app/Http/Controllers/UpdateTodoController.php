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
        return view('updateTodo.input', ['req' => $req]);
    }

    public function confirm(Request $req)
    {
        $validatedData = $req -> validate([
            'title' => 'required|max:140',
        ]);

        return view('updateTodo.confirm', ['req' => $req]);
    }

    public function complete(Request $req)
    {
        $data = Todo::find($req->id);

        $data->fill($req->except('_token','_method','user_id'))->save();

        return view('common.complete', ['msg' => __('messages.update_complete_msg')]);
    }
}
