@extends('layouts.app')
@section('content')
<div class="flex-center position-ref full-height">
    <div class="container">
        <div class="row justify-content-center btn-row">
            <div class="col-3">
                <form method="get" action="/makeTodo/input">
                    @csrf
                    <input class="btn btn-primary btn-block" type="submit" value="作成">
                </form>
            </div>
            <div class="col-3">
                <form method="get" action="/showTodo/search">
                    @csrf
                    <input class="btn btn-info btn-block" type="submit" value="検索">
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col">
            @if (count($todoList) == 0)
                <p>ToDoがありません。</p>
            @else
                <table class="table">
                <tr>
                    <th>タイトル</th>
                    <th>完了区分</th>
                    <th>期限</th>
                    <th>詳細</th>
                </tr>
                @foreach ($todoList as $todo)
                <tr>
                    <td>{{$todo->title}}</td>

                    @if ($todo->comp_cls == FALSE)
                        <td>未達成</td>
                    @elseif ($todo->comp_cls == TRUE)
                        <td>完了</td>
                    @endif
                    
                    <td>{{$todo->time_limit}}</td>
                    
                    <td>
                        <form method="get" action="/showTodo/detail">
                            @csrf
                            <input id="id" name="id" type="hidden" value={{$todo->id}}>
                            <input class="btn btn-outline-dark btn-detail" type="submit" value="詳細">
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
