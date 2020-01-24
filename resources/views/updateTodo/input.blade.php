@extends('layouts.app')
@section('content')
<div class="flex-center position-ref full-height">
    <div class="container">
        <form id="update-confirm-form" method="get" action="/updateTodo/confirm">
            @csrf
            <div class="row">
                <div class="col">
                    <table class="table">
                        <tr>
                            <th>{{__('messages.title')}}</th>
                            <td>
                                <input class="form-control @error('title') is-invalid @enderror" id="title" name="title" type="text" value="{{$req->title}}" requred>
                                </input>
                                @error('title')
                                    <div class="alert alert-danger">{{__('messages.title_error_msg')}}</div>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <th>{{__('messages.comp_cls')}}</th>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" id="not_yet" name="comp_cls" type="radio" value={{config('constant.not_yet')}}
                                    @if ($req->comp_cls == config('constant.not_yet'))
                                        checked
                                    @endif
                                    >
                                    <label class="form-check-label" for="not_yet">{{__('messages.not_yet')}}</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" id="comp" name="comp_cls" type="radio" value={{config('constant.comp')}}
                                    @if ($req->comp_cls == config('constant.comp'))
                                        checked
                                    @endif
                                    >
                                    <label class="form-check-label" for="comp">{{__('messages.comp')}}</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th>{{__('messages.time_limit')}}</th>
                            <td>
                                <input class="form-control" id="time_limit" name="time_limit" type="date" value={{$req->time_limit}}>
                            </td>
                        </tr>
                        <tr>
                            <th>{{__('messages.priority_cls')}}</th>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" id="not_chosen" name="priority_cls" type="radio" value={{config('constant.not_chosen')}}
                                    @if ($req->priority_cls == config('constant.not_chosen'))
                                        checked
                                    @endif
                                    >
                                    <label class="form-check-label" for="not_chosen">{{__('messages.not_chosen')}}</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" id="high" name="priority_cls" type="radio" value={{config('constant.high')}}
                                    @if ($req->priority_cls == config('constant.high'))
                                        checked
                                    @endif
                                    >
                                    <label class="form-check-label" for="high">{{__('messages.high')}}</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" id="middle" name="priority_cls" type="radio" value={{config('constant.middle')}}
                                    @if ($req->priority_cls == config('constant.middle'))
                                        checked
                                    @endif
                                    >
                                    <label class="form-check-label" for="notmiddle_chosen">{{__('messages.middle')}}</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" id="low" name="priority_cls" type="radio" value={{config('constant.low')}}
                                    @if ($req->priority_cls == config('constant.low'))
                                        checked
                                    @endif
                                    >
                                    <label class="form-check-label" for="low">{{__('messages.low')}}</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th>{{__('messages.description')}}</th>
                            <td>
                                <textarea class="form-control" id="description" name="description" type="text">{{$req->description}}</textarea>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <input id="id" name="id" type="hidden" value={{$req->id}}>
        </form>
        <div class="row justify-content-center btn-row">
            <div class="col-3">
                <button class="btn btn-primary btn-block" type="submit" form="update-confirm-form">{{__('messages.confirm')}}</button>
            </div>
            <div class="col-3">
                <form method="get" action="/showTodo/detail">
                    @csrf
                    <input id="id" name="id" type="hidden" value={{$req->id}}>
                    <input class="btn btn-secondary btn-block" type="submit" value={{__('messages.back_to_detail')}}>
                </form>
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
