<?php
    mb_internal_encoding("utf8");
    session_start();
    $pdo=new PDO("mysql:dbname=14_work;host=localhost;","root","");
    $stmt=$pdo->query("select*from login_user where id = '". $_SESSION['user']."'");
    $row=$stmt->fetch();
    

    if(isset($_SESSION['user'])){
        echo  "<p>". $row['nick_name']."さん"."</p>";
    }else{
        echo "ログインしてください";
        echo' <form action="index.php">
                    <input type="submit" class="button1" value="ログイン">
                </form>';
    exit();
}

?>

<?php
session_start();
$_SESSION = array();//セッションの中身をすべて削除
session_destroy();//セッションを破壊
?>
<!doctype html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>ログアウト画面</title>

    <link rel="stylesheet" type="text/css" href="regist.css">
</head>

<body>
    <header>
        <div class="img_icon">
           <a href="index.php"><img src="img/library.png" alt="TOPページへ"></a>
        </div>
        
        <div class="content">
            <ul class="menu">
                <li><h2>Collection Of Book</h2></li>
                <li><a href="mypage.php">マイページ</a></li>
                <li> <a href="profile.php">プロフィール</a></li>
                <li> <a href="newbook.php">蔵書登録</a></li>
                <li> <a href="search.php">蔵書検索</a></li>
                <li><a href="login.php">ログイン</a></li>
                <li><a href="logout.php">ログアウト</a></li>
            </ul>
        </div>
    </header>




    <main>
        <h1>ログアウト画面</h1>



        <div>
            <p><span>ログアウトしました</span></p>
        </div>




    </main>

  
</body>

</html>
