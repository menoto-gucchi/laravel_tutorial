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

                <form method="POST" action="/makeTodo/confirm">
                    @csrf
                    <label id="title">タイトル</label><br>
                    <input id="title" name="title" type="text" requred>
                    <br>

                    <label id="time_limit">期限</label><br>
                    <input id="time_limit" name="time_limit" type="date">
                    <br>

                    <label id="priority_cls">優先度</label><br>
                    <input id="not_chosen" name="priority_cls" type="radio" checked>未選択
                    <input id="high" name="priority_cls" type="radio" value="0">低
                    <input id="middle" name="priority_cls" type="radio" value="1">中
                    <input id="low" name="priority_cls" type="radio" value="2">高
                    <br>

                    <label id="description">内容</label><br>
                    <textarea id="description" name="description" type="text"></textarea>
                    <br>

                    <input id="user_id" name="user_id" type="hidden" value={{$req->user_id}}>

                    <input type="submit" value="確認">

                </form>

                <button type="button" onclick="history.back()">戻る</button>

            </div>
        </div>
    </body>
</html>
