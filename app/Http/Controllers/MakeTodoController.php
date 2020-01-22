<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class MakeTodoController extends Controller
{
    public function input(Request $req)
    {
        return view('makeTodo.input', ['req' => $req]);
    }

    public function confirm(Request $req)
    {
        return view('makeTodo.confirm', ['req' => $req]);
    }

    public function complete(Request $req)
    {
        //モデルオブジェクトをインスタント化
        $todos = new Todo();

        $todos -> user_id = $req -> user_id;
        $todos -> title = $req -> title;
        $todos -> comp_cls = '0';
        $todos -> time_limit = $req -> time_limit;
        $todos -> priority_cls = $req -> priority_cls;
        $todos -> description = $req -> description;

        $todos ->save(); 

        return view('makeTodo.complete', ['result' => '']);
    }
}
