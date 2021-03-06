<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use CommonUtils;

class Todo extends Model
{
    protected $fillable = ['user_id','title','comp_cls','time_limit','priority_cls','description'];

    //完了区分
    public static $not_yet = 0;
    public static $comp = 1;

    //優先度
    public static $not_chosen = 0;
    public static $high = 1;
    public static $middle = 2;
    public static $low = 3;

    public function scopeFindUserId($query, $id){
        $query->where('user_id', $id);
    }

    public function scopeFindStr($query, $str){
        if (!empty($str)) {
            $str = CommonUtils::get_where_like_escaped_str($str);
            return $query->where(
                function($query) use($str){
                    $query->where('title', 'like', '%'.$str.'%')
                    ->orWhere('description', 'like', '%'.$str.'%');
                });
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
            return $query->whereDate('time_limit','>',$time_limit_start);
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
