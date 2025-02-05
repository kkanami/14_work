<?php
mb_internal_encoding("utf8");
try{
$pdo=new PDO("mysql:dbname=14_work;host=localhost;","root","");
$sql="insert into collection_book(title,author,isbn,publisher,publication_date,unread,memo)
values(:title,:author,:isbn,:publisher,:publication_date,:unread,:memo)";
if(!empty($_POST['title'])) {
$stmt=$pdo->prepare($sql);
$stmt->bindValue(":title",$_POST['title'],PDO::PARAM_STR);
$stmt->bindvalue(":author",$_POST['author'],PDO::PARAM_STR);
$stmt->bindvalue(":isbn",$_POST['isbn'],PDO::PARAM_STR);
$stmt->bindvalue(":publisher",$_POST['publisher'],PDO::PARAM_STR);
$stmt->bindvalue(":publication_date",$_POST['publication_date'],PDO::PARAM_STR);
$unread=(int) $_POST['unread'];
$stmt->bindvalue(":unread",$unread,PDO::PARAM_STR);
$stmt->bindvalue(":memo",$_POST['memo'],PDO::PARAM_STR);

$stmt->execute();
}
}catch(Exception $e){
	echo '<span style="color:#FF0000">エラーが発生したため蔵書登録できません。</span>';
    echo $e->getMessage();

	exit();
}
?>


<!doctype html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>蔵書登録完了画面</title>
        <link rel="stylesheet"type="text/css"href="regist.css">
    </head>
    <body>
         <header>
        <div class="img_icon">
            <img src="img/library.png">
        </div>

        <div class="content">
            <ul class="menu">
                <li>
                    <h1>Collection Of Book</h1>
                </li>
                <li><a href="mypage.php">マイページ</a></li>
                <li> <a href="profile.php">プロフィール</a></li>
                <li> <a href="newbook.php">蔵書登録</a></li>
                <li> <a href="search.php">蔵書検索</a></li>
                <li><a href="login.php">ログイン</a></li>
                <li><a href="logout.php">ログアウト</a></li>
            </ul>
        </div>
    </header>
       <div class="top_image">
        <h1>蔵書登録</h1>
        <div class="main">
            <p><span>登録完了しました</span></p>
             <form action="mypage.php">
           <input type="submit" class="button1" value="マイページへ戻る">
       </form>
        </div>
         </div>
    </body>
</html>


