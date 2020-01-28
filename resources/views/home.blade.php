@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{__('messages.dashboard')}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{__('messages.logged_in')}}
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{__('messages.newest_todo')}}</div>

                <div class="card-body">
                    @if (empty($todo))
                        <p>{{__('messages.not_found_todo')}}</p>
                    @else
                        <table class="table">
                            <tr>
                                <th><nobr>{{__('messages.title')}}</nobr></th><td>{{$todo[0]->title}}</td>
                            </tr>
                            <tr>
                                <th>{{__('messages.comp_cls')}}</th>
                                <td>{{CommonUtils::convert_comp_cls_num_to_str($todo[0]->comp_cls)}}</td>
                            </tr>
                            <tr>
                                <th>{{__('messages.time_limit')}}</th><td>{{$todo[0]->time_limit}}</td>
                            </tr>
                            <tr>
                                <th>{{__('messages.priority_cls')}}</th>
                                <td>{{CommonUtils::convert_priority_cls_num_to_str($todo[0]->priority_cls)}}</td>
                            </tr>
                            <tr>
                                <th>{{__('messages.description')}}</th><td>{{$todo[0]->description}}</td>
                            </tr>
                        </table>
                    @endif
                </div>
            </div>
        </div>

    </div>
    <div class="row justify-content-center btn-row">
        <form method="get" action="/showTodo/list">
            @csrf
            <input class="btn btn-primary" type="submit" value={{__('messages.to_list')}}>
        </form>
    </div>
</div>
@endsection
