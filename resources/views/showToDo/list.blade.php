@extends('layouts.app')
@section('content')
<div class="flex-center position-ref full-height">
    <div class="container">
        <div class="row justify-content-left btn-row">
            <div class="col col-sm-3">
                <form method="get" action="{{route('makeInput')}}">
                    @csrf
                    <input class="btn btn-primary btn-block" type="submit" value={{__('messages.make')}}>
                </form>
            </div>
            <div class="col col-sm-3">
                <form method="get" action="{{route('search')}}">
                    @csrf
                    <input class="btn btn-info btn-block" type="submit" value={{__('messages.search')}}>
                </form>
            </div>
        </div>
        @if (empty($todoList))
            <div class="row justify-content-center">
                <div class="col text-center">
                    <p>{{__('messages.not_found_todo')}}</p>
                </div>
            </div>
        @else
            <div class="row justify-content-left btn-row">
                @foreach ($todoList as $todo)
                <div class="col-12 col-sm-6 list-card">
                    <div>
                        <form id="to-detail-form" method="get" action="{{route('detail')}}">
                            @csrf
                            <input id="id" name="id" type="hidden" value={{$todo->id}}>
                            <button class="btn {{CommonUtils::get_list_card_color($todo->comp_cls,$todo->priority_cls)}} list-btn" type="submit">{{$todo->title}}<br>{{$todo->time_limit}}</button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
        
        @endif
    </div>
</div>
@endsection
