@extends('layouts.app')
@section('content')
<div class="flex-center position-ref full-height">
    <div class="container">
        <div class="row justify-content-center confirm-text-row">
            <div class="col text-center">
                この内容で作成しますか？
            </div>
        </div>  
        <div class="row">
            <div class="col">
                <table class="table">
                    <tr>
                        <th>タイトル</th><td>{{$req->title}}</td>
                    </tr>
                    <tr>
                        <th>期限</th><td>{{$req->time_limit}}</td>
                    </tr>
                    <tr>
                        <th>優先度</th>
                        @switch ($req->priority_cls)
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
                        <th>内容</th><td>{{$req->description}}</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row justify-content-center btn-row">
            <div class="col-3">
                <form method="get" action="/makeTodo/complete">
                    @csrf
                    <input id="title" name="title" type="hidden" value={{$req->title}}>
                    <input id="time_limit" name="time_limit" type="hidden" value={{$req->time_limit}}>
                    <input id="priority_cls" name="priority_cls" type="hidden" value={{$req->priority_cls}}>
                    <input id="description" name="description" type="hidden" value={{$req->description}}>
                    <input class="btn btn-primary btn-block" type="submit" value="作成">
                </form>
            </div>
            <div class="col-3">
                <button class="btn btn-secondary btn-block" type="button" onclick="history.back()">修正</button>
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
