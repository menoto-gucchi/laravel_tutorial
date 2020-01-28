<?php

namespace App\Utils;

class CommonUtils
{
    public static function convert_comp_cls_num_to_str($comp_cls){
        switch($comp_cls){
            case config('constant.not_yet') : return __('messages.not_yet');break;
            case config('constant.comp') : return __('messages.comp');break;
        }
    }

    public static function convert_priority_cls_num_to_str($priority_cls){
        switch($priority_cls){
            case config('constant.high') : return __('messages.high');break;
            case config('constant.middle') : return __('messages.middle');break;
            case config('constant.low') : return __('messages.low');break;
            case config('constant.not_chosen') : return __('messages.not_chosen');break;
        }
    }

    public static function get_str_from_array($search_arr){
        return (empty($search_arr) or empty($search_arr['str'])) ? '' : $search_arr['str'];
    }

    public static function get_comp_cls_from_array($search_arr){
        return (empty($search_arr) or empty($search_arr['comp_cls'])) ? array(config('constant.not_yet')) : $search_arr['comp_cls'];
    }

    public static function get_timelimit_start_from_array($search_arr){
        return (empty($search_arr) or empty($search_arr['time_limit_start'])) ? '' : $search_arr['time_limit_start'];
    }

    public static function get_timelimit_end_from_array($search_arr){
        return (empty($search_arr) or empty($search_arr['time_limit_end'])) ? '' : $search_arr['time_limit_end'];
    }

    public static function get_priority_cls_from_array($search_arr){
        return (empty($search_arr) or empty($search_arr['priority_cls'])) 
        ? array(config('constant.high'),config('constant.middle'),config('constant.low'),config('constant.not_chosen'))
        : $search_arr['priority_cls'];
    }

    public static function get_sort_column_from_array($search_arr){
        return (empty($search_arr) or empty($search_arr['sort_column'])) ? 'time_limit' : $search_arr['sort_column'];
    }

    public static function get_asc_desc_from_array($search_arr){
        return (empty($search_arr) or empty($search_arr['asc_desc'])) ? 'asc' : $search_arr['asc_desc'];
    }

    public static function get_list_card_color($comp_cls,$priority_cls){
        if ($comp_cls == config('constant.comp')) {
            return 'btn-light';
        }

        switch($priority_cls){
            case config('constant.high') : return 'btn-outline-danger';break;
            case config('constant.middle') : return 'btn-outline-warning';break;
            case config('constant.low') : return 'btn-outline-info';break;
            case config('constant.not_chosen') : return 'btn-outline-dark';break;
        }

    }
}
