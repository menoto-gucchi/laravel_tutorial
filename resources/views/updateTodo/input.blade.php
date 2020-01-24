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
                            <th>タイトル</th>
                            <td>
                                <input class="form-control @error('title') is-invalid @enderror" id="title" name="title" type="text" value="{{$req->title}}" requred>
                                </input>
                                @error('title')
                                    <div class="alert alert-danger">入力されていない、もしくは３２文字を超えています。</div>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <th>完了区分</th>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" id="not_yet" name="comp_cls" type="radio" value="0"
                                    @if ($req->comp_cls == FALSE)
                                        checked
                                    @endif
                                    >
                                    <label class="form-check-label" for="not_yet">未達成</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" id="comp" name="comp_cls" type="radio" value="1"
                                    @if ($req->comp_cls == TRUE)
                                        checked
                                    @endif
                                    >
                                    <label class="form-check-label" for="comp">完了</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th>期限</th>
                            <td>
                                <input class="form-control" id="time_limit" name="time_limit" type="date" value={{$req->time_limit}}>
                            </td>
                        </tr>
                        <tr>
                            <th>優先度</th>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" id="not_chosen" name="priority_cls" type="radio" value="0"
                                    @if ($req->priority_cls == 0)
                                        checked
                                    @endif
                                    >
                                    <label class="form-check-label" for="not_chosen">未選択</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" id="hign" name="priority_cls" type="radio" value="1"
                                    @if ($req->priority_cls == 1)
                                        checked
                                    @endif
                                    >
                                    <label class="form-check-label" for="hign">高</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" id="middle" name="priority_cls" type="radio" value="2"
                                    @if ($req->priority_cls == 2)
                                        checked
                                    @endif
                                    >
                                    <label class="form-check-label" for="notmiddle_chosen">中</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" id="low" name="priority_cls" type="radio" value="3"
                                    @if ($req->priority_cls == 3)
                                        checked
                                    @endif
                                    >
                                    <label class="form-check-label" for="low">低</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th>内容</th>
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
                <button class="btn btn-primary btn-block" type="submit" form="update-confirm-form">確認</button>
            </div>
            <div class="col-3">
                <form method="get" action="/showTodo/detail">
                    @csrf
                    <input id="id" name="id" type="hidden" value={{$req->id}}>
                    <input class="btn btn-secondary btn-block" type="submit" value="詳細へ戻る">
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
