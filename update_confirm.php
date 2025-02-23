<?php
    mb_internal_encoding("utf8");
    if(!isset($_SESSION)) {
        session_start();
     }

    if(empty($_SESSION['user'])) {
        echo "ログインしてください";
        echo' <form action="index.php"><input type="submit" class="button" value="ログイン"></form>';
        exit();
    }

    $pdo=new PDO("mysql:dbname=14_work;host=localhost;","root","");
    $stmt=$pdo->query("select*from login_user where id = '". $_SESSION['user']."'");
    $row=$stmt->fetch();
    
    echo  "<p>". $row['nick_name']."さん"."</p>";


?>
<!doctype html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>蔵書更新確認画面</title>

    <link rel="stylesheet" type="text/css" href="regist.css">
</head>

<body>
    <header>
        <div class="img_icon">
            <a href="index.php"><img src="img/library.png" alt="TOPページへ"></a>
        </div>

        <div class="content">
            <ul class="menu">
                <li>
                    <h2>Collection Of Book</h2>
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

    <main>
        <div class="top_image">
            <table class="main">
                <h1>蔵書更新確認画面</h1>
                <?php
            //PDO
            mb_internal_encoding("utf8");
            $pdo=new PDO("mysql:dbname=14_work;host=localhost;","root","");
            if(!empty($_POST['resultid1'])){
            $stmt=$pdo->query("select*from collection_book where id = '". $_SESSION['user']."'");
            $row=$stmt->fetch();
            }
            ?>
                <tr>
                    <th>タイトル
                    </th>
                    <td>
                        <?php if(!empty($_POST['title'])){echo $_POST['title'];}?></td>
                </tr>

                <tr>
                    <th>著書
                    </th>
                    <td>
                        <?php if(!empty($_POST['author'])){echo $_POST['author'];}?>
                    </td>
                </tr>

                <tr>
                    <th>ISBN/ISSN
                    </th>
                    <td>
                        <?php if(!empty($_POST['isbn'])){echo $_POST['isbn'];}?>
                    </td>
                </tr>

                <tr>
                    <th>出版者
                    </th>
                    <td>
                        <?php if(!empty($_POST['publisher'])){echo $_POST['publisher'];}?>
                    </td>
                </tr>

                <tr>
                    <th>出版日
                    </th>
                    <td>
                        <?php if(!empty($_POST['publication_date'])){echo $_POST['publication_date'];}?>
                    </td>
                </tr>

                <tr>
                    <th>未読/既読
                    </th>
                    <td>
                        <?php  if(!empty($_POST['unread'])){
                    $option=['0'=>'未読',
                             '1'=>'既読'];
                    $unread=$row['unread'] ;
                    $unreaddisp=$option[$_POST['unread']];
                    echo $unreaddisp;} ?>
                    </td>
                </tr>

                <tr>
                    <th>memo
                    </th>
                    <td>
                        <?php if(!empty($_POST['memo'])){echo $_POST['memo'];}?>
                    </td>
                </tr>

                <tr>
                    <td>
                        <form action="update.php" method="post">
                            <input type='hidden' value='<?php echo $_POST["resultid1"];?>' name='resultid1' id='resultid1'>
                            <input type="submit" class="button" value="前に戻る">

                            <input type="hidden" value="<?php if(!empty($_POST['title'])){echo $_POST['title'];}?>" name="title">
                            <input type="hidden" value="<?php if(!empty($_POST['author'])){echo $_POST['author'];}?>" name="author">
                            <input type="hidden" value="<?php if(!empty($_POST['isbn'])){echo $_POST['isbn'];}?>" name="isbn">
                            <input type="hidden" value="<?php if(!empty($_POST['publisher'])){echo $_POST['publisher'];}?>" name="publisher">
                            <input type="hidden" value="<?php if(!empty($_POST['titpublication_datele'])){echo $_POST['publication_date'];}?>" name="publication_date">
                            <input type="hidden" value="<?php if(!empty($_POST['unread'])){echo $_POST['unread'];}?>" name="unread">
                            <input type="hidden" value="<?php if(!empty($_POST['memo'])){echo $_POST['memo'];}?>" name="memo">
                        </form>
                    </td>
                    <td>
                        <form action="update_complete.php" method="post">
                            <input type='hidden' value='<?php echo $_POST["resultid1"];?>' name='resultid1' id='resultid1'>
                            <input type="submit" class="button" value="更新する">
                            <input type="hidden" value="<?php if(!empty($_POST['title'])){echo $_POST['title'];}?>" name="title">
                            <input type="hidden" value="<?php if(!empty($_POST['author'])){echo $_POST['author'];}?>" name="author">
                            <input type="hidden" value="<?php if(!empty($_POST['isbn'])){echo $_POST['isbn'];}?>" name="isbn">
                            <input type="hidden" value="<?php if(!empty($_POST['publisher'])){echo $_POST['publisher'];}?>" name="publisher">
                            <input type="hidden" value="<?php if(!empty($_POST['titpublication_datele'])){echo $_POST['publication_date'];}?>" name="publication_date">
                            <input type="hidden" value="<?php if(!empty($_POST['unread'])){echo $_POST['unread'];}?>" name="unread">
                            <input type="hidden" value="<?php if(!empty($_POST['memo'])){echo $_POST['memo'];}?>" name="memo">
                        </form>
                    </td>
                </tr>
            </table>

        </div>
    </main>


</body>

</html>
