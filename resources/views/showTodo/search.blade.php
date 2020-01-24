@extends('layouts.app')
@section('content')
<div class="flex-center position-ref full-height">
    <div class="container">
        <form id="search-form" method="get" action="/showTodo/list">
            @csrf
            <div class="row">
                <div class="col">
                    <table class="table">
                        <tr>
                            <th>文字列</th>
                            <td><input class="form-control" id="str" name="str" type="text"></td>
                        </tr>
                        <tr>
                            <th>完了区分</th>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" id="not_yet" name="comp_cls[]" type="checkbox" value="0" checked>
                                    <label class="form-check-label" for="not_yet">未達成</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" id="comp" name="comp_cls[]" type="checkbox" value="1" checked>
                                    <label class="form-check-label" for="comp">完了</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th>期限</th>
                            <td>
                                <input class="form-control" id="time_limit_start" name="time_limit_start" type="date">
                                <span> ~ </span>
                                <input class="form-control  @error('time_limit_end') is-invalid @enderror" id="time_limit_end" name="time_limit_end" type="date">
                                @error('time_limit_end')
                                    <div class="alert alert-danger">開始日以前の日付を終了日に指定しています。</div>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <th>優先度</th>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" id="not_chosen" name="priority_cls[]" type="checkbox" value="0" checked>
                                    <label class="form-check-label" for="not_chosen">未選択</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" id="hign" name="priority_cls[]" type="checkbox" value="1" checked>
                                    <label class="form-check-label" for="hign">高</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" id="middle" name="priority_cls[]" type="checkbox" value="2" checked>
                                    <label class="form-check-label" for="middle">中</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" id="low" name="priority_cls[]" type="checkbox" value="3" checked>
                                    <label class="form-check-label" for="low">低</label>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </form>
        <div class="row justify-content-center btn-row">
            <div class="col-3">
                <button class="btn btn-primary btn-block" type="submit" form="search-form">検索</button>
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
