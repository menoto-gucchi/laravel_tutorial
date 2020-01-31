<?php

namespace App\Utils;
use App\Todo;

class CommonUtils
{
    public static function convert_comp_cls_num_to_str($comp_cls){
        switch($comp_cls){
            case Todo::$not_yet : return __('messages.not_yet');
            case Todo::$comp : return __('messages.comp');
        }
    }

    public static function convert_priority_cls_num_to_str($priority_cls){
        switch($priority_cls){
            case Todo::$high : return __('messages.high');
            case Todo::$middle : return __('messages.middle');
            case Todo::$low : return __('messages.low');
            case Todo::$not_chosen : return __('messages.not_chosen');
        }
    }

    public static function get_str_from_array($search_arr){
        return (empty($search_arr) or empty($search_arr['str'])) ? '' : $search_arr['str'];
    }

    public static function get_comp_cls_from_array($search_arr){
        return (empty($search_arr) or empty($search_arr['comp_cls'])) ? array(Todo::$not_yet) : $search_arr['comp_cls'];
    }

    public static function get_timelimit_start_from_array($search_arr){
        return (empty($search_arr) or empty($search_arr['time_limit_start'])) ? '' : $search_arr['time_limit_start'];
    }

    public static function get_timelimit_end_from_array($search_arr){
        return (empty($search_arr) or empty($search_arr['time_limit_end'])) ? '' : $search_arr['time_limit_end'];
    }

    public static function get_priority_cls_from_array($search_arr){
        return (empty($search_arr) or empty($search_arr['priority_cls'])) 
        ? array(Todo::$high, Todo::$middle, Todo::$low, Todo::$not_chosen)
        : $search_arr['priority_cls'];
    }

    public static function get_sort_column_from_array($search_arr){
        return (empty($search_arr) or empty($search_arr['sort_column'])) ? 'time_limit' : $search_arr['sort_column'];
    }

    public static function get_asc_desc_from_array($search_arr){
        return (empty($search_arr) or empty($search_arr['asc_desc'])) ? 'asc' : $search_arr['asc_desc'];
    }

    public static function get_list_card_color($comp_cls,$priority_cls){
        if ($comp_cls == Todo::$comp) {
            return 'btn-light';
        }

        switch($priority_cls){
            case Todo::$high : return 'btn-outline-danger';
            case Todo::$middle : return 'btn-outline-warning';
            case Todo::$low : return 'btn-outline-info';
            case Todo::$not_chosen : return 'btn-outline-dark';
        }

    }

    public static function get_where_like_escaped_str ($str){
        $str = str_replace('%','\%',$str);
        $str = str_replace('_','\_',$str);
        return $str;
    }
}
