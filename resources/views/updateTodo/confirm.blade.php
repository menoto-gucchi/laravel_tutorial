<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ToDo編集確認</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            #title{
                width:250px;
            }
            #description{
                width:250px;
                height:250px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">

            <div class="content">

                <p>この内容で更新しますか？</p>
                <br>

                <table class="table">
                <table class="table">
                    <tr>
                        <th>タイトル</th><td>{{$req->title}}</td>
                    </tr>
                    <tr>
                        <th>完了区分</th>
                        @if ($req->comp_cls == FALSE)
                            <td>未達成</td>
                        @elseif ($req->comp_cls == TRUE)
                            <td>完了</td>
                        @endif
                    </tr>
                    <tr>
                        <th>期限</th><td>{{$req->time_limit}}</td>
                    </tr>
                    <tr>
                        <th>優先度</th>
                        @switch ($req->priority_cls)
                            @case(1)
                                <td>低</td>@break
                            @case(2)
                                <td>中</td>@break
                            @case(3)
                                <td>高</td>@break
                            @default
                                <td>未設定</td>@break
                        @endswitch
                    </tr>
                    <tr>
                        <th>内容</th><td>{{$req->description}}</td>
                    </tr>
                </table>

                <form method="POST" action="/updateTodo/complete">
                    @csrf
                    <input id="id" name="id" type="hidden" value={{$req->id}}>
                    <input id="title" name="title" type="hidden" value={{$req->title}}>
                    <input id="comp_cls" name="comp_cls" type="hidden" value={{$req->comp_cls}}>
                    <input id="time_limit" name="time_limit" type="hidden" value={{$req->time_limit}}>
                    <input id="not_chosen" name="priority_cls" type="hidden" value={{$req->priority_cls}}>
                    <input id="description" name="description" type="hidden" value={{$req->description}}>
                    <input type="submit" value="更新">
                </form>

                <button type="button" onclick="history.back()">修正</button>

            </div>
        </div>
    </body>
</html>