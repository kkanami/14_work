<!doctype html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>アカウント削除確認画面</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <header>
        <img src="img/diblog_logo.jpg">
        <div class="content">
            <ul class="menu">
                <li><a href="index.php">トップ</a></li>
                <li>プロフィール</li>
                <li>D.I.Blogについて</li>
                <li>登録フォーム</li>
                <li>問い合わせ</li>
                <li>その他</li>
                <li> <a href="regist.php">アカウント登録</a></li>
                <li> <a href="list.php">アカウント一覧</a></li>
                <li><a href="login.php">ログイン</a></li>
                <li><a href="logout.php">ログアウト</a></li>
            </ul>
        </div>
    </header>

    <main>
        <h1>アカウント削除確認画面</h1>

        <p><span>本当に削除してよろしいですか？</span></p>

        <table>
            <tr>
                <td>
                    <form action="delete.php" method="post">
                        <input type='hidden' value='<?php echo $_POST["resultid2"];?>' name='resultid2' id='resultid2'>
                        <input type="submit" class="button1" value="前に戻る">
                    </form>
                </td>
                <td>
                    <form action="delete_complete.php" method="post">
                        <input type='hidden' value='<?php echo $_POST["resultid2"];?>' name='resultid2' id='resultid2'>
                        <input type="submit" class="button1" value="削除する">
                    </form>
                </td>
            </tr>
        </table>

    </main>

    <footer>
        Copyright D.I.works| D.I.blog is the one which provides A to Z about programming
    </footer>
</body>

</html>
