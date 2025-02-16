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

    <main>
        <?php
        mb_internal_encoding("utf8");
        $pdo=new PDO("mysql:dbname=14_work;host=localhost;","root","");
        $stmt=$pdo->query("select* from collection_book");
        

        
             while($row=$stmt->fetch()){
                echo  '<table border="1">' ;
                echo "<tr>";
                 $result= $row['id'];
                echo "<td>".$result."</td>";
                echo "<td>". $row['title']."</td>";
                echo "<td>". $row['author']."</td>";
                echo "<td>". $row['isbn']."</td>";
                echo "<td>". $row['publisher']."</td>";
                echo "<td>". $row['publication_date']."</td>";
    
               
                $option=['0'=>'未読',
                         '1'=>'既読'];
                    $unread=$row['unread'] ;
                    $unreaddisp=$option[$row['unread']];
                echo "<td>".$unreaddisp."</td>";
        
                echo "<td>". $row['memo']."</td>";
        
                echo "<td>";
                echo '<form method="post" class="back" action="update.php" >';
                echo"<input type='hidden' value={$result} name='resultid1' id='resultid1'>";
                echo'<input type="submit" class="back" value="更新">';
                echo"</form>";
                echo"</td>";

                echo "<td>";
                echo '<form  method="post" class="back" action="delete.php">';
                echo"<input type='hidden' value={$result} name='resultid2' id='resultid2'>";
                echo"<input type='submit' class='back' value='削除'>";
 
                echo"</form>";
                echo"</td>";
                echo" </tr>";
            
               }
          
         echo  " </table>";
    ?>
    
    </main>


</body>

</html>
