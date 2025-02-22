<!doctype html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>蔵書削除画面</title>
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
        <h1>蔵書削除画面</h1>



        <?php
        //PDO
        mb_internal_encoding("utf8");
        $pdo=new PDO("mysql:dbname=14_work;host=localhost;","root","");
          if(!empty($_POST['resultid2'])){
        $stmt=$pdo->query("select*from collection_book where id = '".$_POST['resultid2']."'");
        $row=$stmt->fetch(); }?>

        <table>
            <tr>
                <th>タイトル
                </th>
                <td>
                    <?php  if(isset($row['title'])){echo $row['title']; }?></td>
            </tr>

            <tr>
                <th>著書
                </th>
                <td>
                    <?php if(isset($row['author'])){echo $row['author']; }?>
                </td>
            </tr>

            <tr>
                <th>ISBN/ISSN
                </th>
                <td>
                    <?php if(isset($row['isbn'])){echo $row['isbn']; } ?>
                </td>
            </tr>

            <tr>
                <th>出版者
                </th>
                <td>
                    <?php if(isset($row['publisher'])){echo $row['publisher']; } ?>
                </td>
            </tr>

            <tr>
                <th>出版日
                </th>
                <td>
                    <?php if(isset($row['publication_date'])){echo $row['publication_date']; } ?>
                </td>
            </tr>

            <tr>
                <th>未読/既読
                </th>
                <td>
                    <?php if(!empty($_POST['unread'])){
            $option=['0'=>'未読',
                    '1'=>'既読'];
            $unread=$row['unread'] ;
            $unreaddisp=$option[$row['unread']];
             echo $unreaddisp;} ?>
                </td>
            </tr>

            <tr>
                <th>memo
                </th>
                <td>
                    <?phpif(isset($row['memo'])){echo $row['memo']; } ?>
                </td>
            </tr>



        </table>

        <form method="post" class="button" action="delete_confirm.php">
            <input type='hidden' value='<?php echo $_POST["resultid2"];?>' name='resultid2' id='resultid2'>
            <input type="submit" class="button" value="確認する">
        </form>


    </main>


</body>

</html>
