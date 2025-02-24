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
        <div class="top_image">
            <div class="main">
                <h1>catalog</h1>
                <?php
        $pdo=new PDO("mysql:dbname=14_work;host=localhost;","root","");
        $stmt=$pdo->query("select* from collection_book where owner = '". $_SESSION['user']."' order by id desc");
        

             while($row=$stmt->fetch()){
                echo '<table class="mypage">' ;
              
                $result= $row['id'];
                $option=['1'=>'未読',
                         '2'=>'既読'];
                $unread=$row['unread'] ;
                $unreaddisp=$option[$row['unread']];
                echo '<tr><th class="left">'.$unreaddisp.'</th><th class="center"></th><th class="right"></th></tr>';
                echo '<tr><td></td><td></td><td>'. $row['title']."</td></tr>";
                echo '<tr><td></td><td><br></td><td>'. $row['author']."</td></tr>";
                echo '<tr><td>'. $row['isbn']."</td><td><br></td><td>". $row['publisher']."</td></tr>";
                echo '<tr><td></td><td><br></td><td>'. $row['publication_date']."</td></tr>";
               
                 
              
                 
                echo '<tr><td><form method="post" action="update.php" >';
                echo "<input type='hidden' value={$result} name='resultid1' id='resultid1'>";
                echo '<input type="submit" class="button" value="更新">';
                echo "</form></td>";
                 
                echo '<td><form  method="post" action="delete.php">';
                echo "<input type='hidden' value={$result} name='resultid2' id='resultid2'>";
                echo "<input type='submit' class='button' value='削除'>";
 
                echo "</form>";
                echo "</td><td>". $row['memo']."</td></tr>";
           
                 echo "</table>";
                 echo "<br>";
               }
          
        
    ?>
            </div>
        </div>
    </main>


</body>

</html>
