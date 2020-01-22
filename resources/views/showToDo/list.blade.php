<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ToDoリスト</title>

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
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">

            <div class="content">

                <table class="table">
                <tr>
                    <th>タイトル</th>
                    <th>完了区分</th>
                    <th>期限</th>
                    <th>優先度</th>
                </tr>
                @foreach ($todoList as $todo)
                <tr>
                    <td>{{$todo->title}}</td>

                    @if ($todo->priority_cls == FALSE)
                        <td>未達成</td>
                    @elseif ($todo->priority_cls == TRUE)
                        <td>完了</td>
                    @endif
                    
                    <td>{{$todo->time_limit}}</td>

                    @switch ($todo->priority_cls)
                        @case(0)
                            <td>低</td>@break
                        @case(1)
                            <td>中</td>@break
                        @case(2)
                            <td>高</td>@break
                        @default
                            <td>未設定</td>@break
                    @endswitch
                </tr>
                @endforeach
                </table>

            </div>
        </div>
    </body>
</html>
