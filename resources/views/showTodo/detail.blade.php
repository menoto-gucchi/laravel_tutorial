@extends('layouts.app')
@section('content')
<div class="flex-center position-ref full-height">
    <div class="container">
        <div class="row">
            <div class="col">
                <table class="table">
                    <tr>
                        <th>タイトル</th><td>{{$todo->title}}</td>
                    </tr>
                    <tr>
                        <th>完了区分</th>
                        @if ($todo->comp_cls == FALSE)
                            <td>未達成</td>
                        @elseif ($todo->comp_cls == TRUE)
                            <td>完了</td>
                        @endif
                    </tr>
                    <tr>
                        <th>期限</th><td>{{$todo->time_limit}}</td>
                    </tr>
                    <tr>
                        <th>優先度</th>
                        @switch ($todo->priority_cls)
                            @case(1)
                                <td>低</td>@break
                            @case(2)
                                <td>中</td>@break
                            @case(3)
                                <td>高</td>@break
                            @default
                                <td>-</td>@break
                        @endswitch
                    </tr>
                    <tr>
                        <th>内容</th><td>{{$todo->description}}</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-3">
                <form method="POST" action="/updateTodo/input">
                    @csrf
                    <input id="id" name="id" type="hidden" value={{$todo->id}}>
                    <input id="title" name="title" type="hidden" value={{$todo->title}}>
                    <input id="comp_cls" name="comp_cls" type="hidden" value={{$todo->comp_cls}}>
                    <input id="time_limit" name="time_limit" type="hidden" value={{$todo->time_limit}}>
                    <input id="not_chosen" name="priority_cls" type="hidden" value={{$todo->priority_cls}}>
                    <input id="description" name="description" type="hidden" value={{$todo->description}}>
                    <input class="btn btn-primary btn-block" type="submit" value="編集">
                </form>
            </div>
            <div class="col-3">
                <form method="POST" action="/deleteTodo/confirm">
                    @csrf
                    <input id="id" name="id" type="hidden" value={{$todo->id}}>
                    <input class="btn btn-danger btn-block" type="submit" value="削除">
                </form>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-3">
                <button class="btn btn-secondary btn-block" type="button" onclick="history.back()">一覧へ戻る</button>
            </div>
        </div>
    </div>
</div>
@endsection
