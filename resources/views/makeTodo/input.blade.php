@extends('layouts.app')
@section('content')
<div class="flex-center position-ref full-height">
    <div class="container">
        <form id="make-confirm-form" method="get" action="{{route('makeConfirm')}}">
            @csrf
            <div class="row">
                <div class="col">
                    <table class="table">
                        <tr>
                            <th>{{__('messages.title')}}</th>
                            <td>
                                <input class="form-control @error('title') is-invalid @enderror" id="title" name="title" type="text" requred>
                                @error('title')
                                    <div class="alert alert-danger">{{__('messages.title_error_msg')}}</div>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <th>{{__('messages.time_limit')}}</th>
                            <td>
                                <input class="form-control" id="time_limit" name="time_limit" type="date">
                            </td>
                        </tr>
                        <tr>
                            <th>{{__('messages.priority_cls')}}</th>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" id="high" name="priority_cls" type="radio" value={{config('constant.high')}}>
                                    <label class="form-check-label" for="high">{{__('messages.high')}}</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" id="middle" name="priority_cls" type="radio" value={{config('constant.middle')}}>
                                    <label class="form-check-label" for="notmiddle_chosen">{{__('messages.middle')}}</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" id="low" name="priority_cls" type="radio" value={{config('constant.low')}}>
                                    <label class="form-check-label" for="low">{{__('messages.low')}}</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" id="not_chosen" name="priority_cls" type="radio" value={{config('constant.not_chosen')}} checked>
                                    <label class="form-check-label" for="not_chosen">{{__('messages.not_chosen')}}</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th>{{__('messages.description')}}</th>
                            <td>
                                <textarea class="form-control" id="description" name="description" type="text"></textarea>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </form>
        <div class="row justify-content-center btn-row">
            <div class="col col-sm-3">
                <button class="btn btn-primary btn-block" type="submit" form="make-confirm-form">{{__('messages.confirm')}}</button>
            </div>
        </div>
        <div class="row justify-content-center btn-row">
            <div class="col col-sm-3">
                @include('common.toListButton')
            </div>
        </div> 
    </div>
</div>
@endsection
