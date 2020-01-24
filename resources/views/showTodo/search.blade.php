@extends('layouts.app')
@section('content')
<div class="flex-center position-ref full-height">
    <div class="container">
        <form id="search-form" method="get" action="/showTodo/list">
            @csrf
            <div class="row">
                <div class="col">
                    <table class="table">
                        <tr>
                            <th>{{__('messages.str')}}</th>
                            <td><input class="form-control" id="str" name="str" type="text"></td>
                        </tr>
                        <tr>
                            <th>{{__('messages.comp_cls')}}</th>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" id="not_yet" name="comp_cls[]" type="checkbox" value={{config('constant.not_yet')}} checked>
                                    <label class="form-check-label" for="not_yet">{{__('messages.not_yet')}}</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" id="comp" name="comp_cls[]" type="checkbox" value={{config('constant.comp')}} checked>
                                    <label class="form-check-label" for="comp">{{__('messages.comp')}}</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th>{{__('messages.time_limit')}}</th>
                            <td>
                                <input class="form-control" id="time_limit_start" name="time_limit_start" type="date">
                                <span> ~ </span>
                                <input class="form-control  @error('time_limit_end') is-invalid @enderror" id="time_limit_end" name="time_limit_end" type="date">
                                @error('time_limit_end')
                                    <div class="alert alert-danger">{{__('messages.date_err_msg')}}</div>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <th>{{__('messages.priority_cls')}}</th>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" id="not_chosen" name="priority_cls[]" type="checkbox" value={{config('constant.not_chosen')}} checked>
                                    <label class="form-check-label" for="not_chosen">{{__('messages.not_chosen')}}</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" id="high" name="priority_cls[]" type="checkbox" value={{config('constant.high')}} checked>
                                    <label class="form-check-label" for="high">{{__('messages.high')}}</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" id="middle" name="priority_cls[]" type="checkbox" value={{config('constant.middle')}} checked>
                                    <label class="form-check-label" for="middle">{{__('messages.middle')}}</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" id="low" name="priority_cls[]" type="checkbox" value={{config('constant.low')}} checked>
                                    <label class="form-check-label" for="low">{{__('messages.low')}}</label>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </form>
        <div class="row justify-content-center btn-row">
            <div class="col-3">
                <button class="btn btn-primary btn-block" type="submit" form="search-form">{{__('messages.search')}}</button>
            </div>
        </div>
        <div class="row justify-content-center btn-row">
            <div class="col-3">
                @include('common.toListButton')
            </div>
        </div>
    </div>
</div>
@endsection
