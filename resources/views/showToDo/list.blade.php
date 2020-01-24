@extends('layouts.app')
@section('content')
<div class="flex-center position-ref full-height">
    <div class="container">
        <div class="row justify-content-center btn-row">
            <div class="col-3">
                <form method="get" action="/makeTodo/input">
                    @csrf
                    <input class="btn btn-primary btn-block" type="submit" value={{__('messages.make')}}>
                </form>
            </div>
            <div class="col-3">
                <form method="get" action="/showTodo/search">
                    @csrf
                    <input class="btn btn-info btn-block" type="submit" value={{__('messages.search')}}>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col">
            @if (count($todoList) == 0)
                <p>{{__('messages.not_found_todo')}}</p>
            @else
                <table class="table">
                <tr>
                    <th>{{__('messages.title')}}</th>
                    <th>{{__('messages.comp_cls')}}</th>
                    <th>{{__('messages.time_limit')}}</th>
                    <th>{{__('messages.detail')}}</th>
                </tr>
                @foreach ($todoList as $todo)
                <tr>
                    <td>{{$todo->title}}</td>

                    @if ($todo->comp_cls == FALSE)
                        <td>{{__('messages.not_yet')}}</td>
                    @elseif ($todo->comp_cls == TRUE)
                        <td>{{__('messages.comp')}}</td>
                    @endif
                    
                    <td>{{$todo->time_limit}}</td>
                    
                    <td>
                        <form method="get" action="/showTodo/detail">
                            @csrf
                            <input id="id" name="id" type="hidden" value={{$todo->id}}>
                            <input class="btn btn-outline-dark btn-detail" type="submit" value={{__('messages.detail')}}>
                        </form>
                    </td>
                </tr>
                @endforeach
                </table>
            @endif
            </div>
        </div>
    </div>
</div>
@endsection
