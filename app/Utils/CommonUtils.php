<?php

namespace App\Utils;

class CommonUtils
{
    public static function convert_comp_cls_num_to_str($comp_cls){
        if ($comp_cls == config('constant.not_yet')){
            return __('messages.not_yet');
        }
        elseif ($comp_cls == config('constant.comp')){
            return __('messages.comp');
        }
    }

    public static function convert_priority_cls_num_to_str($comp_cls){
        if ($comp_cls == config('constant.high')){
            return __('messages.high');
        }
        elseif ($comp_cls == config('constant.middle')){
            return __('messages.middle');
        }
        elseif ($comp_cls == config('constant.low')){
            return __('messages.low');
        }
        elseif ($comp_cls == config('constant.not_chosen')){
            return __('messages.not_chosen');
        }
    }

    public static function getStrFromArray($search_arr){
        return (empty($search_arr) or empty($search_arr['str'])) ? '' : $search_arr['str'];
    }

    public static function getCompClsFromArray($search_arr){
        return (empty($search_arr) or empty($search_arr['comp_cls'])) ? array(config('constant.not_yet')) : $search_arr['comp_cls'];
    }

    public static function getTimeLimitStartFromArray($search_arr){
        return (empty($search_arr) or empty($search_arr['time_limit_start'])) ? '' : $search_arr['time_limit_start'];
    }

    public static function getTimeLimitEndFromArray($search_arr){
        return (empty($search_arr) or empty($search_arr['time_limit_end'])) ? '' : $search_arr['time_limit_end'];
    }

    public static function getPriorityClsFromArray($search_arr){
        return (empty($search_arr) or empty($search_arr['priority_cls'])) 
        ? array(config('constant.high'),config('constant.middle'),config('constant.low'),config('constant.not_chosen'))
        : $search_arr['priority_cls'];
    }

    public static function getSortColumnFromArray($search_arr){
        return (empty($search_arr) or empty($search_arr['sort_column'])) ? 'time_limit' : $search_arr['sort_column'];
    }

    public static function getAscDescFromArray($search_arr){
        return (empty($search_arr) or empty($search_arr['asc_desc'])) ? 'asc' : $search_arr['asc_desc'];
    }
}
