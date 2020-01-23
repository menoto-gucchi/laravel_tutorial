@extends('layouts.app')

@section('content')
<div class="flex-center position-ref full-height">
    <div class="container">
        <form method="post" action="/showTodo/list">
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
                                <input class="form-control" id="time_limit_end" name="time_limit_end" type="date">
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
            <div class="row">
                <div class="col-3">
                    <input class="btn btn-primary btn-block" type="submit" value="検索">
                </div>
                <div class="col-3">
                    <button class="btn btn-outline-secondary btn-block" type="button" onclick="history.back()">一覧画面へ戻る</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
