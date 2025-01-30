<?php
//文字化け防止
mb_internal_encoding("utf8");
$mail=isset($_POST['mail']) ? $_POST['mail']:"";
$pass=isset($_POST['password']) ? $_POST['password']:"";
session_start();
//DB接続
try{
    $pdo=new PDO("mysql:dbname=practice;host=localhost;","root","");
    $stmt=$pdo->query("select*from login_user_transaction where mail = '".$mail."'");
    $row=$stmt->fetch();
     
        if(isset($_SESSION['user'])){
          if (!empty("$pass")){
               if($row['delete_flag']==0 && password_verify("$pass", $row['password'])){
                session_regenerate_id(true);
                $_SESSION['user']=$row['authority'];
                echo "<span>ログイン認証に成功しました</span>";
                }else {
                header("Location:login.php");
                }
        }else{

          }
        }else {
         //hash化したパスを認証する  
            if($row['delete_flag']==0 && password_verify("$pass", $row['password'])){
                session_regenerate_id(true);
                $_SESSION['user']=$row['authority'];
                echo "<span>ログイン認証に成功しました</span>";
                }else {
                header("Location:login.php");
                }
        }

    }catch(Exception $e){
        echo '<span style="color:#FF0000">エラーが発生したためログイン情報を取得できません。</span>：';
        echo $e->getMessage();
        exit();
    }

if($_SESSION['user']==1){
    $reg='<a href="regist.php">アカウント登録</a>';
    $li='<a href="list.php">アカウント一覧</a>';
}else {
    $reg = '';
    $li = '';
}
?>

<!doctype html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>D.I.BLOG</title>
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
                <li> <?php echo $reg; ?></li>
                <li> <?php echo $li; ?></li>
                <li><a href="login.php">ログイン</a></li>
                <li><a href="logout.php">ログアウト</a></li>
            </ul>
        </div>
    </header>

    <main>
        <div class="main">
            <div class="left">
                <h1>プログラミングに役立つ書籍</h1>
                <div class="ymd">2017年1月15日</div>
                <br>
                <img src="img/bookstore.jpg">
                <p>D.I.BlogはD.I.Wroksが提供する演習課題です。</p><br>
                <p>記事中身</p>
                <div class="main_menu">
                    <div class="pic1">
                        <img src="img/pic1.jpg">
                        <p>ドメイン取得方法</p>　
                    </div>
                    <div class="pic1">
                        <img src="img/pic2.jpg">
                        <p>快適な職場環境</p>　
                    </div>
                    <div class="pic1">
                        <img src="img/pic3.jpg">
                        <p>Linuxの基礎</p>　
                    </div>
                    <div class="pic1">
                        <img src="img/pic4.jpg">
                        <p>マーケティング入門</p>　
                    </div>
                    <br>
                    <div class="pic2">
                        <img src="img/pic5.jpg">
                        <p>アクティブラーニング</p>　
                    </div>
                    <div class="pic2">
                        <img src="img/pic6.jpg">
                        <p>CSSの効率的な勉強方法</p>　
                    </div>
                    <div class="pic2">
                        <img src="img/pic7.jpg">
                        <p>リーダブルコードとは</p>　
                    </div>
                    <div class="pic2">
                        <img src="img/pic8.jpg">
                        <p>HTML5の可能性</p>　
                    </div>

                </div>

            </div>
            <div class="right">
                <h3>人気の記事</h3>
                <ul>
                    <li><a href=""> PHPオススメ本</a></li>
                    <li><a href="">PHP　MyAdminの使い方</a></li>
                    <li><a href="">いま人気のエディタTops</a></li>
                    <li><a href="">HTMLの基礎</a></li>
                </ul>

                <h3>オススメリンク</h3>
                <ul>
                    <li><a href=""> ﾃﾞｨｰｱｲﾜｰｸｽ株式会社</a></li>
                    <li><a href="">XAMPPのダウンロード</a></li>
                    <li> <a href="">Eclipseのダウンロード</a></li>
                    <li> <a href="">Braketsのダウンロード</a></li>
                </ul>

                <h3>カテゴリ</h3>
                <ul>
                    <li> <a href=""> HTML</a></li>
                    <li><a href=""> PHP</a></li>
                    <li><a href=""> MySQL</a></li>
                    <li><a href=""> JavaScript</a></li>
                </ul>

            </div>

        </div>
    </main>

    <footer>
        Copyright D.I.works| D.I.blog is the one which provides A to Z about programming
    </footer>
</body>

</html>
