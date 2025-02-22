<!doctype html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>蔵書削除完了画面</title>
    <link rel="stylesheet" type="text/css" href="regist.css">
</head>

<body>
   
    header
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
                <li><a href="index.php">ログイン</a></li>
                <li><a href="logout.php">ログアウト</a></li>
            </ul>
        </div>
    </header>

    <main>
        <h1>蔵書削除完了画面</h1>


        <?php
        //PDO
        mb_internal_encoding("utf8");
        try{
            $pdo=new PDO("mysql:dbname=14_work;host=localhost;","root","");
            if(!empty($_POST['resultid2'])){
              $pdo->exec("update collection_book set delete_flag=1 , update_time= now() where id = '".$_POST['resultid2']."'");
            }
        }catch(Exception $e){
           echo '<span style="color:#FF0000">エラーが発生したため削除できません。</span>';

	       exit();
        }    
        ?>

        <div class="top_image">
            <p><span>削除完了しました</span></p>
            <form action="mypage.html">
                <input type="submit" class="button1" value="マイページへ戻る">
            </form>
        </div>

    </main>

   
</body>

</html>
