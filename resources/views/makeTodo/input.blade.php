@extends('layouts.app')
@section('content')
<div class="flex-center position-ref full-height">
    <div class="container">
        <form id="make-confirm-form" method="get" action="/makeTodo/confirm">
            @csrf
            <div class="row">
                <div class="col">
                    <table class="table">
                        <tr>
                            <th>タイトル</th>
                            <td>
                                <input class="form-control @error('title') is-invalid @enderror" id="title" name="title" type="text" requred>
                                @error('title')
                                    <div class="alert alert-danger">入力されていない、もしくは３２文字を超えています。</div>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <th>期限</th>
                            <td>
                                <input class="form-control" id="time_limit" name="time_limit" type="date">
                            </td>
                        </tr>
                        <tr>
                            <th>優先度</th>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" id="not_chosen" name="priority_cls" type="radio" value="1" checked>
                                    <label class="form-check-label" for="not_chosen">未選択</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" id="hign" name="priority_cls" type="radio" value="1">
                                    <label class="form-check-label" for="hign">高</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" id="middle" name="priority_cls" type="radio" value="2">
                                    <label class="form-check-label" for="notmiddle_chosen">中</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" id="low" name="priority_cls" type="radio" value="3">
                                    <label class="form-check-label" for="low">低</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th>内容</th>
                            <td>
                                <textarea class="form-control" id="description" name="description" type="text"></textarea>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </form>
        <div class="row justify-content-center btn-row">
            <div class="col-3">
                <button class="btn btn-primary btn-block" type="submit" form="make-confirm-form">確認</button>
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
