<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />
    <!--OGPタグ/twitterカード-->
</head>
<body>
    <header>
        <div class="header_inner">
            <div class="header_list">
                <div class="header_item">
                    <a href="/top"><img src="images/atlas.png" class="header_item_img"></a>
                </div>
                <div class="header_nav_user">
                    {{Auth::user()->username}}&nbsp;さん
                </div>
                <ul class="menu">
                    <li>
                        <span class="arrow">></span>
                        <ul class="menuSub">
                            <li><a href="/top" class="ac_item_link home">HOME</a></li>
                            <li class="profile"><a href="/profile" class="ac_item_link profile">プロフィール編集</a></li>
                            <li><a href="/logout" class="ac_item_link logout">ログアウト</a></li>
                        </ul>
                    </li>
                </ul>
                <div class="header_nav_item">
                        <img src="{{ asset('storage/' . Auth::user()->images) }}" >
                </div>
            </div>
        </div>
    </header>





    <div id="row">
        <div id="container">
            @yield('content')
        </div >
        <div id="side-bar">
            <div id="confirm">
                <p>{{ Auth::user()->username }}さんの</p></br>
                <div>
                <p>フォロー数    {{ Auth::user()->getFollowCount(Auth::id()) }}名</p><!--User.PHP内のgetFollowCountメソッドを使っている。(Auth::id())はログインしている人のidをgetFollowCount内の$user_idに送っている。-->
                </div>
                <p align="right"><a href="/follow-list" class="button_follow">フォローリスト</a></p>
                <div>
                <p>フォロワー数{{ Auth::user()->getFollowerCount(Auth::id()) }}名</p>
                </div>
                <P align="right"><a href="/follow-list" class="button_follower">フォロワーリスト</a></P>
            </div></br>
            <p align="center"><a href="/search" class="button_searchUser">ユーザー検索</a></p>
        </div>
    </div>
    <footer>
    </footer>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <script>
        $(function() {
            $("ul.menu li").on('click',
            function() {
                $(".menuSub:not(:animated)", this).slideToggle();
                $('.arrow').toggleClass("open");
            }

            );
        });
    </script>


</body>
</html>
