<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Todo extends Model
{
    protected $fillable = ['user_id','title','comp_cls','time_limit','priority_cls','description'];

    public function scopeFindUserId($query){
        $query->where('user_id',Auth::id());
    }

    public function scopeFindStr($query, $str){
        if (!empty($str)) {
            return $query->whereRaw("(title like '%".$str."%' OR description like '%".$str."%')");
        }
        return $query;
    }

    public function scopeFindCompCls($query, $comp_cls){
        if (!empty($comp_cls)) {
            return $query->whereIn('comp_cls',$comp_cls);
        }
        return $query;
    }

    public function scopeFindTimeLimitStart($query, $time_limit_start){
        if (!empty($time_limit_start)) {
            $data = Todo::whereDate('time_limit','>',$time_limit_start);
        }
        return $query;
    }

    public function scopeFindTimeLimitEnd($query, $time_limit_end){
        if (!empty($time_limit_end)) {
            return whereDate('time_limit','<',$time_limit_end);
        }
        return $query;
    }

    public function scopeFindPriorityCls($query, $priority_cls){
        if (!empty($priority_cls)) {
            $query->whereIn('priority_cls',$priority_cls);
        }
        return $query;
    }

    public function scopeOrderSort($query, $sort_column, $asc_desc){
        if (!(empty($sort_column) or empty($asc_desc))) {
            $query->orderBy($sort_column,$asc_desc);
        }
        else {
            $query->orderBy("time_limit","asc");
        }
    }

}
