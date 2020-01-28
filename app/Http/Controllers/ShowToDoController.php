<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
use Auth;
use CommonUtils;

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

        $empty = empty(session('search_arr'));

        //セッションから直前の検索条件を取得
        //検索画面で検索した場合はRequestから条件を取得
        $search_arr = session('search_arr');

        if ($req->has('str')){
            $array['str']=$req->str;
        } 
        else {
            $array['str']=CommonUtils::getStrFromArray($search_arr);
        }

        if ($req->has('comp_cls')){
            $array['comp_cls']=$req->comp_cls;
        } 
        else {
            $array['comp_cls']=CommonUtils::getCompClsFromArray($search_arr);
        }

        if ($req->has('time_limit_start')){
            $array['time_limit_start']=$req->time_limit_start;
        } 
        else {
            $array['time_limit_start']=CommonUtils::getTimeLimitStartFromArray($search_arr);
        }

        if ($req->has('time_limit_end')){
            $array['time_limit_end']=$req->time_limit_end;
        } 
        else {
            $array['time_limit_end']=CommonUtils::getTimeLimitEndFromArray($search_arr);
        }

        if ($req->has('priority_cls')){
            $array['priority_cls']=$req->priority_cls;
        } 
        else {
            $array['priority_cls']=CommonUtils::getPriorityClsFromArray($search_arr);
        }

        if ($req->has('sort_column')){
            $array['sort_column']=$req->sort_column;
        } 
        else {
            $array['sort_column']=CommonUtils::getSortColumnFromArray($search_arr);
        }

        if ($req->has('asc_desc')){
            $array['asc_desc']=$req->asc_desc;
        } 
        else {
            $array['asc_desc']=CommonUtils::getAscDescFromArray($search_arr);
        }

        //検索条件をセッションに保存
        session()->put('search_arr',$array);

        //DB処理
        $data = new Todo();
        $data = $data -> where('user_id',Auth::id());

        if (!empty($array['str'])) {
            $data = $data -> whereRaw("(title like '%".$array['str']."%' OR description like '%".$array['str']."%')");
        }

        if (!empty($array['comp_cls'])) {
            $data = $data -> whereIn('comp_cls',$array['comp_cls']);
        }

        if (!empty($array['time_limit_start'])) {
            $data = $data -> whereDate('time_limit','>',$array['time_limit_start']);
        }

        if (!empty($array['time_limit_end'])) {
            $data = $data -> whereDate('time_limit','<',$array['time_limit_end']);
        }

        if (!empty($array['priority_cls'])) {
            $data = $data -> whereIn('priority_cls',$array['priority_cls']);
        }

        if (!(empty($array['sort_column']) or empty($array['asc_desc']))) {
            $data = $data -> orderBy($array['sort_column'],$array['asc_desc']);
        }
        else {
            $data = $data -> orderBy("time_limit","asc");
        }

        $data = ['todoList' => $data ->get()];

        return view('showTodo.list',$data);
    }

    public function detail(Request $req){
        $data = ['todo' => Todo::find($req->id)];

        return view('showTodo.detail',$data);
    }

    public function search(Request $req){

        //直前の検索条件を取得し、画面に反映
        $empty = empty(session('search_arr'));
        $search_arr = session('search_arr');

        $data['str']=CommonUtils::getStrFromArray($search_arr);
        $data['comp_cls']=CommonUtils::getCompClsFromArray($search_arr);
        $data['time_limit_start']=CommonUtils::getTimeLimitStartFromArray($search_arr);
        $data['time_limit_end']=CommonUtils::getTimeLimitEndFromArray($search_arr);
        $data['priority_cls']=CommonUtils::getPriorityClsFromArray($search_arr);
        $data['sort_column']=CommonUtils::getSortColumnFromArray($search_arr);
        $data['asc_desc']=CommonUtils::getAscDescFromArray($search_arr);
        $data = ['req' => $data];

        return view('showTodo.search', $data);
    }
}
