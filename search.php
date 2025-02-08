


<!doctype html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>蔵書検索画面</title>
    <link rel="stylesheet" type="text/css" href="mypage.css">
</head>

<body>
    <header>
        <img src="img/library.png">
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
        <h1>蔵書検索画面</h1>



        <form method="post" class="search" action="#">
            <table border="1" style="border-collapse: collapse">
                <tr>
                    <th>タイトル</th>
                    <td><input type="text" class="text" id="" name="title" value=""></td>
                    <th>著者</th>
                    <td><input type="text" class="text" id="author" name="author" value=""></td>
                </tr>
                <tr>
                    <th>ISBN/ISSN</th>
                    <td> <input type="text" id="isbn" name="isbn" value=""></td>
                    <th>出版者</th>
                    <td><input type="text" class="text" id="publisher" name="publisher" value=""></td>
                </tr>
                <tr>
                    <th>出版日</th>
                    <td> <input type="ememo" class="text" id="publication_date" name="publication_date" value=""></td>
                    <th>未読/既読</th>
                    <td> <input type="radio" id="0" name="unread" value="0" checked>
                        <label for="0">未読</label>
                        <input type="radio" id="1" name="unread" value="1">
                        <label for="1">既読</label>
                        <input type="radio" id="2" name="unread" value="2">
                        <label for="2">未選択</label>
                    </td>
                </tr>
                <tr>
                   <th>memo</th>
                    <td> <input type="text" class="text" id="memo" name="memo" value=""></td>
                </tr>
            </table>

            <div class="search_submit">
                <input type="submit" class="search_submit" value="検索">
            </div>

        </form>



        <?php
        mb_internal_encoding("utf8");
        $pdo=new PDO("mysql:dbname=14_work;host=localhost;","root","");
        $sql="select*from collection_book 
        where title like ? and author like ? and isbn=? and publisher like ? and publication_date like ? and memo like ? and (unread=? or unread=?)";
            
      if(!empty($_POST)) {
        $stmt = $pdo->prepare($sql);
        $unread=isset($_POST['unread']) && ($_POST['unread']<=1)? $_POST['unread']:"";
        $unread2=isset($_POST['unread']) && ($_POST['unread']<=1)? $_POST['unread']:"1";
        
        $stmt->bindValue(1,'%'.$_POST['title'].'%',PDO::PARAM_STR);
        $stmt->bindValue(2,'%'.$_POST['author'].'%',PDO::PARAM_STR);
        $stmt->bindValue(3,$_POST['isbn'],PDO::PARAM_STR);
        $stmt->bindValue(4, '%'.$_POST['publisher'].'%',PDO::PARAM_STR);
        $stmt->bindValue(5, '%'.$_POST['publication_date'].'%',PDO::PARAM_STR);
        $stmt->bindValue(6,'%'.$_POST['memo'].'%',PDO::PARAM_STR);
        $stmt->bindValue(7,$unread);
        $stmt->bindValue(8,$unread2);

        $stmt->execute();
      }
              
//           $stmt->debugDumpParams();     sql文の確認
   
                
         //投稿を表示させるrow…行 stmt…statementの略。声明 fetch…取ってくる
                
 if(!empty($_POST)){
     
  
        echo  '<table border="1">' ;
        echo  "<tr>";
        echo  " <th>ID</th>";
        echo  " <th>タイトル</th>";
        echo  "<th>著者</th>";
        echo  "  <th>ISBN/ISSN</th>";
        echo  "<th>出版者</th>";
        echo  " <th>出版日</th>";
        echo  "<th>未読/既読</th>";
        echo  " <th>memo</th>";
        echo  " <th>登録日</th>";
        echo  " <th>更新日</th>";
        echo  '<th colspan="2">操作</th>';
        echo  "</tr>";
     
     
     
     while($row=$stmt->fetch()){
                
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


        $regist=$row['registered_time'];
       if(empty($row['registered_time'])){
           echo "<td>".''."</td>" ; 
       } else if   (!empty($row['registered_time'])){ 
            echo "<td>". date('Y/m/d', strtotime($regist))."</td>";
       }

        $update=$row['update_time'];
      if(empty($row['update_time'])){
           echo "<td>".''."</td>" ; 
       } else if   (!empty($row['update_time'])){ 
            echo "<td>". date('Y/m/d', strtotime($update))."</td>";
       }

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
       }
           




         echo  " </table>";
  
   ?>


    </main>

</body>

</html>
