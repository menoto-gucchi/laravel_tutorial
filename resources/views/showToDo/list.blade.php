@extends('layouts.app')
@section('content')
<div class="flex-center position-ref full-height">
    <div class="container">
        <div class="row justify-content-center btn-row">
            <div class="col col-sm-3">
                <form method="get" action="/makeTodo/input">
                    @csrf
                    <input class="btn btn-primary btn-block" type="submit" value={{__('messages.make')}}>
                </form>
            </div>
            <div class="col col-sm-3">
                <form method="get" action="/showTodo/search">
                    @csrf
                    <input class="btn btn-info btn-block" type="submit" value={{__('messages.search')}}>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col">
            @if (empty($todoList))
                <p>{{__('messages.not_found_todo')}}</p>
            @else
                <table class="table list_table">
                    <th>{{__('messages.todoList')}}</th>
                    @foreach ($todoList as $todo)
                    <tr @if ($todo->comp_cls == config('constant.comp')) style="background-color:#c0c0c0;" @endif>
                        <td>
                            <form method="get" action="/showTodo/detail">
                                @csrf
                                <input id="id" name="id" type="hidden" value={{$todo->id}}>
                                <input class="btn btn-default" type="submit" value={{$todo->title}}>
                            </form>
                            <br>
                            <div>{{$todo->time_limit}}</div>
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
