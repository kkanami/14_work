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


<!doctype html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>Collection of Book</title>
    <link rel="stylesheet" type="text/css" href="mypage.css">
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
                <li><a href="index.php">ログイン</a></li>
                <li><a href="logout.php">ログアウト</a></li>
            </ul>
        </div>
    </header>

    <main>
        <h1>catalog</h1>
        <?php
        $pdo=new PDO("mysql:dbname=14_work;host=localhost;","root","");
        $stmt=$pdo->query("select* from collection_book where owner = '". $_SESSION['user']."' order by id desc");
        

             while($row=$stmt->fetch()){
                echo '<table border="1">' ;
              
                 $result= $row['id'];
                echo '<tr><td class="left">'.$result.'</td><td class="center"></td><td class="right"></td></tr>';
                 
                    $option=['0'=>'未読',
                             '1'=>'既読'];
                    $unread=$row['unread'] ;
                    $unreaddisp=$option[$row['unread']];
                echo "<tr><td>".$unreaddisp."</td><td></td><td>". $row['title']."</td></tr>";
                echo "<tr><td></td><td></td><td>". $row['author']."</td></tr>";
                echo "<tr><td>". $row['isbn']."</td><td></td><td>". $row['publisher']."</td></tr>";
                echo "<tr><td></td><td></td><td>". $row['publication_date']."</td></tr>";
                echo "<tr><td></td><td></td><td>". $row['memo']."</td></tr>";
               
                 
              
                 
                echo '<tr><td><form method="post" action="update.php" >';
                echo "<input type='hidden' value={$result} name='resultid1' id='resultid1'>";
                echo '<input type="submit" class="button" value="更新">';
                echo "</form></td>";
                 
                echo '<td><form  method="post" action="delete.php">';
                echo "<input type='hidden' value={$result} name='resultid2' id='resultid2'>";
                echo "<input type='submit' class='button' value='削除'>";
 
                echo "</form>";
                echo "</td><td></td></tr>";
           
                 echo "</table>";
                 echo "<br>";
               }
          
        
    ?>

    </main>


</body>

</html>
