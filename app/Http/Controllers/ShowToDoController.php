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

        $empty = empty(session('search_arr'));
        $search_arr = session('search_arr');

        if ($req->has('str')){
            $array['str']=$req->str;
        } 
        else {
            $array['str']=($empty or empty($search_arr['str'])) ? '' : $search_arr['str'];
        }

        if ($req->has('comp_cls')){
            $array['comp_cls']=$req->comp_cls;
        } 
        else {
            $array['comp_cls']=($empty or empty($search_arr['comp_cls'])) ? array(config('constant.not_yet')) : $search_arr['comp_cls'];
        }

        if ($req->has('time_limit_start')){
            $array['time_limit_start']=$req->time_limit_start;
        } 
        else {
            $array['time_limit_start']=($empty or empty($search_arr['time_limit_start'])) ? '' : $search_arr['time_limit_start'];
        }

        if ($req->has('time_limit_end')){
            $array['time_limit_end']=$req->time_limit_end;
        } 
        else {
            $array['time_limit_end']=($empty or empty($search_arr['time_limit_end'])) ? '' : $search_arr['time_limit_end'];
        }

        if ($req->has('priority_cls')){
            $array['priority_cls']=$req->priority_cls;
        } 
        else {
            $array['priority_cls']=($empty or empty($search_arr['priority_cls'])) 
                ? array(config('constant.high'),config('constant.middle'),config('constant.low'),config('constant.not_chosen'))
                : $search_arr['priority_cls'];
        }

        if ($req->has('sort_column')){
            $array['sort_column']=$req->sort_column;
        } 
        else {
            $array['sort_column']=($empty or empty($search_arr['sort_column'])) ? 'time_limit' : $search_arr['sort_column'];
        }

        if ($req->has('asc_desc')){
            $array['asc_desc']=$req->asc_desc;
        } 
        else {
            $array['asc_desc']=($empty or empty($search_arr['asc_desc'])) ? 'asc' : $search_arr['asc_desc'];
        }

        session()->put('search_arr',$array);

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

        $empty = empty(session('search_arr'));
        $search_arr = session('search_arr');

        $data['str']=($empty or empty($search_arr['str'])) ? '' : $search_arr['str'];
        $data['comp_cls']=($empty or empty($search_arr['comp_cls'])) ? array(config('constant.not_yet')) : $search_arr['comp_cls'];
        $data['time_limit_start']=($empty or empty($search_arr['time_limit_start'])) ? '' : $search_arr['time_limit_start'];
        $data['time_limit_end']=($empty or empty($search_arr['time_limit_end'])) ? '' : $search_arr['time_limit_end'];
        $data['priority_cls']=($empty or empty($search_arr['priority_cls'])) 
            ? array(config('constant.high'),config('constant.middle'),config('constant.low'),config('constant.not_chosen'))
            : $search_arr['priority_cls'];
        $data['sort_column']=($empty or empty($search_arr['sort_column'])) ? 'time_limit' : $search_arr['sort_column'];
        $data['asc_desc']=($empty or empty($search_arr['asc_desc'])) ? 'asc' : $search_arr['asc_desc'];
        $data = ['req' => $data];

        return view('showTodo.search', $data);
    }
}
