@extends('layouts.app')
@section('content')
<div class="flex-center position-ref full-height">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col text-center">
                本当に削除しますか？
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-3">
                <form method="POST" action="/deleteTodo/complete">
                    @csrf
                    <input id="id" name="id" type="hidden" value={{$req->id}}>
                    <input class="btn btn-danger btn-block" type="submit" value="削除">
                </form>
            </div>
            <div class="col-3">
                <button class="btn btn-secondary btn-block" type="button" onclick="history.back()">詳細へ戻る</button>
            </div>
        </div>
    </div>
</div>
@endsection
