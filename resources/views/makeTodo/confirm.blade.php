@extends('layouts.app')
@section('content')
<div class="flex-center position-ref full-height">
    <div class="container">
        <div class="row justify-content-center confirm-text-row">
            <div class="col text-center">
                {{__('messages.make_confirm_msg')}}
            </div>
        </div>  
        <div class="row">
            <div class="col">
                <table class="table">
                    <tr>
                        <th><nobr>{{__('messages.title')}}</nobr></th><td>{{$req->title}}</td>
                    </tr>
                    <tr>
                        <th>{{__('messages.time_limit')}}</th><td>{{$req->time_limit}}</td>
                    </tr>
                    <tr>
                        <th>{{__('messages.priority_cls')}}</th>
                        @switch ($req->priority_cls)
                            @case(config('constant.high'))
                                <td>{{__('messages.high')}}</td>@break
                            @case(config('constant.middle'))
                                <td>{{__('messages.middle')}}</td>@break
                            @case(config('constant.low'))
                                <td>{{__('messages.low')}}</td>@break
                            @default
                                <td>{{__('messages.not_chosen')}}</td>@break
                        @endswitch
                    </tr>
                    <tr>
                        <th>{{__('messages.description')}}</th><td>{{$req->description}}</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row justify-content-center btn-row">
            <div class="col col-sm-3">
                <form method="get" action="/makeTodo/complete">
                    @csrf
                    <input id="title" name="title" type="hidden" value={{$req->title}}>
                    <input id="time_limit" name="time_limit" type="hidden" value={{$req->time_limit}}>
                    <input id="priority_cls" name="priority_cls" type="hidden" value={{$req->priority_cls}}>
                    <input id="description" name="description" type="hidden" value={{$req->description}}>
                    <input class="btn btn-primary btn-block" type="submit" value={{__('messages.make')}}>
                </form>
            </div>
            <div class="col col-sm-3">
                <button class="btn btn-secondary btn-block" type="button" onclick="history.back()">{{__('messages.revise')}}</button>
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
