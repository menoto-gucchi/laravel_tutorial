@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ダッシュボード</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    ログイン中です。
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">最新Todo</div>

                <div class="card-body">
                    @if (count($todo) == 0)
                        <p>ToDoがありません。</p>
                    @else
                        <table class="table">
                            <tr>
                                <th>タイトル</th><td>{{$todo[0]->title}}</td>
                            </tr>
                            <tr>
                                <th>完了区分</th>
                                @if ($todo[0]->comp_cls == FALSE)
                                    <td>未達成</td>
                                @elseif ($todo[0]->comp_cls == TRUE)
                                    <td>完了</td>
                                @endif
                            </tr>
                            <tr>
                                <th>期限</th><td>{{$todo[0]->time_limit}}</td>
                            </tr>
                            <tr>
                                <th>優先度</th>
                                @switch ($todo[0]->priority_cls)
                                    @case(1)
                                        <td>低</td>@break
                                    @case(2)
                                        <td>中</td>@break
                                    @case(3)
                                        <td>高</td>@break
                                    @default
                                        <td>-</td>@break
                                @endswitch
                            </tr>
                            <tr>
                                <th>内容</th><td>{{$todo[0]->description}}</td>
                            </tr>
                        </table>
                    @endif
                </div>
            </div>
        </div>

    </div>
    <div class="row justify-content-center">
        <form method="POST" action="/showTodo/list">
            @csrf
            <input class="btn btn-primary" type="submit" value="Todo一覧へ">
        </form>
    </div>
</div>
@endsection
