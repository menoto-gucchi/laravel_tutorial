@extends('layouts.app')
@section('content')
<div class="flex-center position-ref full-height">
    <div class="container">
        <div class="row justify-content-center confirm-text-row">
            <div class="col text-center">
                {{__('messages.delete_confirm_msg')}}
            </div>
        </div>
        <div class="row justify-content-center btn-row">
            <div class="col col-sm-3">
                <form method="get" action="/deleteTodo/complete">
                    @csrf
                    <input id="id" name="id" type="hidden" value={{$req->id}}>
                    <input class="btn btn-danger btn-block" type="submit" value={{__('messages.delete')}}>
                </form>
            </div>
            <div class="col col-sm-3">
                <form method="get" action="/showTodo/detail">
                    @csrf
                    <input id="id" name="id" type="hidden" value={{$req->id}}>
                    <input class="btn btn-secondary btn-block" type="submit" value={{__('messages.back_to_detail')}}>
                </form>
            </div>
        </div>
        <div class="row justify-content-center btn-row">
            <div class="col col-sm-3">
                @include('common.toListButton')
            </div>
        </div>
    </div>
</div>
@endsection
