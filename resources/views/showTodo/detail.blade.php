@extends('layouts.app')
@section('content')
<div class="flex-center position-ref full-height">
    <div class="container">
        <div class="row">
            <div class="col">
                <table class="table">
                    <tr>
                        <th><nobr>{{__('messages.title')}}</nobr></th><td>{{$todo->title}}</td>
                    </tr>
                    <tr>
                        <th>{{__('messages.comp_cls')}}</th>
                        <td>{{CommonUtils::convert_comp_cls_num_to_str($todo->comp_cls)}}</td>
                    </tr>
                    <tr>
                        <th>{{__('messages.time_limit')}}</th><td>{{$todo->time_limit}}</td>
                    </tr>
                    <tr>
                        <th>{{__('messages.priority_cls')}}</th>
                        <td>{{CommonUtils::convert_priority_cls_num_to_str($todo->priority_cls)}}</td>
                    </tr>
                    <tr>
                        <th>{{__('messages.description')}}</th><td>{{$todo->description}}</td>
                    </tr>
                    <tr>
                        <th>{{__('messages.created_at')}}</th><td>{{$todo->created_at}}</td>
                    </tr>
                    <tr>
                        <th>{{__('messages.updated_at')}}</th><td>{{$todo->updated_at}}</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row justify-content-center btn-row">
            <div class="col col-sm-3">
                <form method="get" action="{{route('updateInput')}}">
                    @csrf
                    <input id="id" name="id" type="hidden" value={{$todo->id}}>
                    <input id="title" name="title" type="hidden" value={{$todo->title}}>
                    <input id="comp_cls" name="comp_cls" type="hidden" value={{$todo->comp_cls}}>
                    <input id="time_limit" name="time_limit" type="hidden" value={{$todo->time_limit}}>
                    <input id="not_chosen" name="priority_cls" type="hidden" value={{$todo->priority_cls}}>
                    <input id="description" name="description" type="hidden" value={{$todo->description}}>
                    <input class="btn btn-primary btn-block" type="submit" value={{__('messages.edit')}}>
                </form>
            </div>
            <div class="col col-sm-3">
                <form method="get" action="{{route('deleteConfirm')}}">
                    @csrf
                    <input id="id" name="id" type="hidden" value={{$todo->id}}>
                    <input class="btn btn-danger btn-block" type="submit" value={{__('messages.delete')}}>
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
