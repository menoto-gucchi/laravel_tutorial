<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class DeleteTodoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function confirm(Request $req)
    {
        return view('deleteTodo.confirm', ['req' => $req]);
    }

    public function complete(Request $req)
    {
        $data = Todo::find($req->id);

        $data->delete();

        return view('deleteTodo.complete', ['result' => '']);
    }
}
