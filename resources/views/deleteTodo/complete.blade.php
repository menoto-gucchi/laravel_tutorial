@extends('layouts.app')
@section('content')
<div class="flex-center position-ref full-height">
    <div class="container">
        <div class="row justify-content-center complete-text-row">
            <div class="col text-center">
                削除が完了しました。
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
