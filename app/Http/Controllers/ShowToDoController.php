<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
use Auth;
use CommonUtils;
use App\Http\Requests\ListRequest;

class ShowTodoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function list(ListRequest $req){

        $validatedData = $req->validated();

        //検索条件を取得
        $array = $req->get_condition_array();

        //DB処理
        $data = new Todo();

        $data = Todo::FindUserId()
            ->FindStr($array['str'])
            ->FindCompCls($array['comp_cls'])
            ->FindTimeLimitStart($array['time_limit_start'])
            ->FindTimeLimitEnd($array['time_limit_end'])
            ->FindPriorityCls($array['priority_cls'])
            ->OrderSort($array['sort_column'], $array['asc_desc']);

        return view('showTodo.list',['todoList' => $data->get()]);
    }

    public function detail(Request $req){
        $data = ['todo' => Todo::find($req->id)];

        return view('showTodo.detail',$data);
    }

    public function search(){

        //直前の検索条件を取得し、画面に反映
        $search_arr = session('search_arr');

        $data['str']=CommonUtils::get_str_from_array($search_arr);
        $data['comp_cls']=CommonUtils::get_comp_cls_from_array($search_arr);
        $data['time_limit_start']=CommonUtils::get_timelimit_start_from_array($search_arr);
        $data['time_limit_end']=CommonUtils::get_timelimit_end_from_array($search_arr);
        $data['priority_cls']=CommonUtils::get_priority_cls_from_array($search_arr);
        $data['sort_column']=CommonUtils::get_sort_column_from_array($search_arr);
        $data['asc_desc']=CommonUtils::get_asc_desc_from_array($search_arr);

        return view('showTodo.search', ['condition' => $data]);
    }
}
