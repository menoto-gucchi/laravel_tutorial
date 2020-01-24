@extends('layouts.app')
@section('content')
<div class="flex-center position-ref full-height">
    <div class="container">
        <div class="row justify-content-center  complete-text-row">
            <div class="col-3 text-center">
                {{__('messages.update_complete_msg')}}
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
