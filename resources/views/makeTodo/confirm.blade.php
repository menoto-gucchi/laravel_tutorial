<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ToDoリスト作成</title>

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

                <p>この内容で作成しますか？</p>
                <br>

                <table class="table">
                <tr>
                    <th>タイトル</th>
                    <th>期限</th>
                    <th>優先度</th>
                    <th>内容</th>
                </tr>
                <tr>
                    <td>{{$req->title}}</td>
                    <td>{{$req->time_limit}}</td>
                    @switch ($req->priority_cls)
                        @case(0)
                            <td>低</td>@break
                        @case(1)
                            <td>中</td>@break
                        @case(2)
                            <td>高</td>@break
                        @default
                            <td>未設定</td>@break
                    @endswitch
                    <td>{{$req->description}}</td>
                </tr>
                </table>

                <form method="POST" action="/makeTodo/complete">
                    @csrf
                    <input id="title" name="title" type="hidden" value={{$req->title}}>
                    <input id="time_limit" name="time_limit" type="hidden" value={{$req->time_limit}}>
                    <input id="not_chosen" name="priority_cls" type="hidden" value={{$req->priority_cls}}>
                    <input id="description" name="description" type="hidden" value={{$req->description}}>
                    <input id="user_id" name="user_id" type="hidden" value={{$req->user_id}}>
                    <input type="submit" value="作成">
                </form>

                <button type="button" onclick="history.back()">修正</button>

            </div>
        </div>
    </body>
</html>
