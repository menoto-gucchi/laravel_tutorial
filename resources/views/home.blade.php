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
                                @if ($todo[0]->comp_cls == config('constant.not_yet'))
                                    <td>{{__('messages.not_yet')}}</td>
                                @elseif ($todo[0]->comp_cls == config('constant.comp'))
                                    <td>{{__('messages.comp')}}</td>
                                @endif
                            </tr>
                            <tr>
                                <th>{{__('messages.time_limit')}}</th><td>{{$todo[0]->time_limit}}</td>
                            </tr>
                            <tr>
                                <th>{{__('messages.priority_cls')}}</th>
                                @switch ($todo[0]->priority_cls)
                                    @case(config('constant.high'))
                                        <td>{{__('messages.high')}}</td>@break
                                    @case(config('constant.middle'))
                                        <td>{{__('messages.middle')}}</td>@break
                                    @case(config('constant.low'))
                                        <td>{{__('messages.low')}}</td>@break
                                    @default
                                        <td>{{__('messages.not_chosen')}}</td>@break
                                @endswitch
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
