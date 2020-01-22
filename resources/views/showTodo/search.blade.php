<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ToDo検索</title>

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

                <form method="get" action="/">
                    @csrf
                    <label id="str">文字列</label><br>
                    <input id="str" name="str" type="text">
                    <br>

                    <label id="comp_cls">完了区分</label><br>
                    <input id="not_yet" name="comp_cls[]" type="checkbox" value="0" checked>未達成
                    <input id="comp" name="comp_cls[]" type="checkbox" value="1" checked>完了
                    <br>

                    <label id="time_limit">期限</label><br>
                    <input id="time_limit_start" name="time_limit_start" type="date">
                    <span> ~ </span>
                    <input id="time_limit_end" name="time_limit_end" type="date">
                    <br>

                    <label id="priority_cls">優先度</label><br>
                    <input id="not_chosen" name="priority_cls[]" type="checkbox" value="0" checked>未選択
                    <input id="high" name="priority_cls[]" type="checkbox" value="1" checked>低
                    <input id="middle" name="priority_cls[]" type="checkbox" value="2" checked>中
                    <input id="low" name="priority_cls[]" type="checkbox" value="3" checked>高
                    <br>

                    <input type="submit" value="検索">

                </form>

                <button type="button" onclick="history.back()">戻る</button>

            </div>
        </div>
    </body>
</html>
