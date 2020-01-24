@extends('layouts.app')
@section('content')
<div class="flex-center position-ref full-height">
    <div class="container">
        <div class="row">
            <div class="col">
                <table class="table">
                    <tr>
                        <th>{{__('messages.title')}}</th><td>{{$todo->title}}</td>
                    </tr>
                    <tr>
                        <th>{{__('messages.comp_cls')}}</th>
                        @if ($todo->comp_cls == config('constant.not_yet'))
                            <td>{{__('messages.not_yet')}}</td>
                        @elseif ($todo->comp_cls == config('constant.comp'))
                            <td>{{__('messages.comp')}}</td>
                        @endif
                    </tr>
                    <tr>
                        <th>{{__('messages.time_limit')}}</th><td>{{$todo->time_limit}}</td>
                    </tr>
                    <tr>
                        <th>{{__('messages.priority_cls')}}</th>
                        @switch ($todo->priority_cls)
                            @case(config('constant.high'))
                                <td>{{__('messages.high')}}</td>@break
                            @case(config('constant.middle'))
                                <td>{{__('messages.middle')}}</td>@break
                            @case(config('constant.low'))
                                <td>{{__('messages.low')}}</td>@break
                            @default
                                <td>{{__('messages.title')}}</td>@break
                        @endswitch
                    </tr>
                    <tr>
                        <th>{{__('messages.description')}}</th><td>{{$todo->description}}</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row justify-content-center btn-row">
            <div class="col-3">
                <form method="get" action="/updateTodo/input">
                    @csrf
                    <input id="id" name="id" type="hidden" value={{$todo->id}}>
                    <input id="title" name="title" type="hidden" value={{$todo->title}}>
                    <input id="comp_cls" name="comp_cls" type="hidden" value={{$todo->comp_cls}}>
                    <input id="time_limit" name="time_limit" type="hidden" value={{$todo->time_limit}}>
                    <input id="not_chosen" name="priority_cls" type="hidden" value={{$todo->priority_cls}}>
                    <input id="description" name="description" type="hidden" value={{$todo->description}}>
                    <input class="btn btn-primary btn-block" type="submit" value={{__('messages.edit')}}>
                </form>
            </div>
            <div class="col-3">
                <form method="get" action="/deleteTodo/confirm">
                    @csrf
                    <input id="id" name="id" type="hidden" value={{$todo->id}}>
                    <input class="btn btn-danger btn-block" type="submit" value={{__('messages.delete')}}>
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
