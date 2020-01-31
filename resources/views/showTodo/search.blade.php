@extends('layouts.app')
@section('content')
<div class="flex-center position-ref full-height">
    <div class="container">
        <form id="search-form" method="get" action="{{route('list')}}">
            @csrf
            <div class="row">
                <div class="col">
                    <table class="table">
                        <tr>
                            <th>{{__('messages.str')}}</th>
                            <td><input class="form-control" id="str" name="str" type="text" value={{$req['str']}}></td>
                        </tr>
                        <tr>
                            <th>{{__('messages.comp_cls')}}</th>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" id="not_yet" name="comp_cls[]" type="checkbox" value={{App\Todo::$not_yet}} @if (in_array(App\Todo::$not_yet, $req['comp_cls'])) checked @endif>
                                    <label class="form-check-label" for="not_yet">{{__('messages.not_yet')}}</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" id="comp" name="comp_cls[]" type="checkbox" value={{App\Todo::$comp}} @if (in_array(App\Todo::$comp, $req['comp_cls']))  checked @endif>
                                    <label class="form-check-label" for="comp">{{__('messages.comp')}}</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th>{{__('messages.time_limit')}}</th>
                            <td>
                                <input class="form-control" id="time_limit_start" name="time_limit_start" type="date" value={{$req['time_limit_start']}}>
                                <span> ~ </span>
                                <input class="form-control  @error('time_limit_end') is-invalid @enderror" id="time_limit_end" name="time_limit_end" type="date" value={{$req['time_limit_end']}}>
                                @error('time_limit_end')
                                    <div class="alert alert-danger">{{__('messages.date_err_msg')}}</div>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <th>{{__('messages.priority_cls')}}</th>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" id="high" name="priority_cls[]" type="checkbox" value={{App\Todo::$high}} @if (in_array(App\Todo::$high, $req['priority_cls'])) checked @endif>
                                    <label class="form-check-label" for="high">{{__('messages.high')}}</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" id="middle" name="priority_cls[]" type="checkbox" value={{App\Todo::$middle}} @if (in_array(App\Todo::$middle, $req['priority_cls'])) checked @endif>
                                    <label class="form-check-label" for="middle">{{__('messages.middle')}}</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" id="low" name="priority_cls[]" type="checkbox" value={{App\Todo::$low}} @if (in_array(App\Todo::$low, $req['priority_cls'])) checked @endif>
                                    <label class="form-check-label" for="low">{{__('messages.low')}}</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" id="not_chosen" name="priority_cls[]" type="checkbox" value={{App\Todo::$not_chosen}} @if (in_array(App\Todo::$not_chosen, $req['priority_cls'])) checked @endif>
                                    <label class="form-check-label" for="not_chosen">{{__('messages.not_chosen')}}</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th>{{__('messages.sort')}}</th>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" id="sort_time_limit" name="sort_column" type="radio" value="time_limit"  @if ($req['sort_column']=="time_limit")) checked @endif>
                                    <label class="form-check-label" for="sort_time_limit">{{__('messages.time_limit')}}</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" id="sort_created_at" name="sort_column" type="radio" value="created_at" @if ($req['sort_column']=="created_at") checked @endif>
                                    <label class="form-check-label" for="sort_created_at">{{__('messages.created_at')}}</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" id="sort_updated_at" name="sort_column" type="radio" value="updated_at" @if ($req['sort_column']=="updated_at") checked @endif>
                                    <label class="form-check-label" for="sort_updated_at">{{__('messages.updated_at')}}</label>
                                </div>
                                <br>
                                <div class="form-check">
                                    <input class="form-check-input" id="asc" name="asc_desc" type="radio" value="asc" @if ($req['asc_desc']=="asc") checked @endif>
                                    <label class="form-check-label" for="asc">{{__('messages.asc')}}</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" id="desc" name="asc_desc" type="radio" value="desc" @if ($req['asc_desc']=="desc") checked @endif>
                                    <label class="form-check-label" for="desc">{{__('messages.desc')}}</label>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </form>
        <div class="row justify-content-center btn-row">
            <div class="col col-sm-3">
                <button class="btn btn-primary btn-block" type="submit" form="search-form">{{__('messages.search')}}</button>
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
