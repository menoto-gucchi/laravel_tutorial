<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use CommonUtils;

class ListRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'time_limit_end' => 'nullable|date|after:time_limit_start',
        ];
    }

    public function get_condition_array(){

        //セッションから直前の検索条件を取得
        //検索画面で検索した場合はRequestから条件を取得
        $search_arr = session('search_arr');

        if ($this->has('str')){
            $array['str']=$this->str;
        } 
        else {
            $array['str']=CommonUtils::get_str_from_array($search_arr);
        }

        if ($this->has('comp_cls')){
            $array['comp_cls']=$this->comp_cls;
        } 
        else {
            $array['comp_cls']=CommonUtils::get_comp_cls_from_array($search_arr);
        }

        if ($this->has('time_limit_start')){
            $array['time_limit_start']=$this->time_limit_start;
        } 
        else {
            $array['time_limit_start']=CommonUtils::get_timelimit_start_from_array($search_arr);
        }

        if ($this->has('time_limit_end')){
            $array['time_limit_end']=$this->time_limit_end;
        } 
        else {
            $array['time_limit_end']=CommonUtils::get_timelimit_end_from_array($search_arr);
        }

        if ($this->has('priority_cls')){
            $array['priority_cls']=$this->priority_cls;
        } 
        else {
            $array['priority_cls']=CommonUtils::get_priority_cls_from_array($search_arr);
        }

        if ($this->has('sort_column')){
            $array['sort_column']=$this->sort_column;
        } 
        else {
            $array['sort_column']=CommonUtils::get_sort_column_from_array($search_arr);
        }

        if ($this->has('asc_desc')){
            $array['asc_desc']=$this->asc_desc;
        } 
        else {
            $array['asc_desc']=CommonUtils::get_asc_desc_from_array($search_arr);
        }

        //検索条件をセッションに保存
        session()->put('search_arr',$array);

        return $array;

    }
}
