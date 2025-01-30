<?php
    session_start();
    if(!isset($_SESSION['user'])){
        echo "ログインしてください";
        echo' <form action="login.php">
                    <input type="submit" class="button1" value="ログイン">
                </form>';
    exit();
}

if($_SESSION['user']==0){
   echo "権限がありません";
    exit();
}
?>



<!doctype html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>アカウント一覧画面</title>
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
                <li> <a href="regist.php">アカウント登録</a></li>
                <li> <a href="list.php">アカウント一覧</a></li>
                <li><a href="login.php">ログイン</a></li>
                <li><a href="logout.php">ログアウト</a></li>
            </ul>
        </div>
    </header>

    <main>
        <h1>アカウント一覧画面</h1>



        <form method="post" class="search" action="#">
            <table border="1" style="border-collapse: collapse">
                <tr>
                    <th>名前（姓）</th>
                    <td><input type="text" class="text" id="family_name" name="family_name" value=""></td>
                    <th>名前（名）</th>
                    <td><input type="text" class="text" id="last_name" name="last_name" value=""></td>
                </tr>
                <tr>
                    <th>カナ（姓）</th>
                    <td> <input type="text" id="family_name_kana" name="family_name_kana" value=""></td>
                    <th>カナ（名）</th>
                    <td><input type="text" class="text" id="last_name_kana" name="last_name_kana" value=""></td>
                </tr>
                <tr>
                    <th>メールアドレス</th>
                    <td> <input type="email" class="text" id="mail" name="mail" value=""></td>
                    <th>性別</th>
                    <td> <input type="radio" id="0" name="gender" value="0" checked>
                        <label for="0">男</label>
                        <input type="radio" id="1" name="gender" value="1">
                        <label for="1">女</label>
                        <input type="radio" id="2" name="gender" value="2">
                        <label for="2">未選択</label>
                    </td>
                </tr>
                <tr>
                    <th>アカウント権限</th>
                    <td> <select class="dropdown" id="authority" name="authority">
                            <option value="0">一般</option>
                            <option value="1">管理者</option>
                            <option value="2">未選択</option>
                        </select></td>
                    <td colspan="2"></td>
                </tr>
            </table>

            <div class="search_submit">
                <input type="submit" class="search_submit" value="検索">
            </div>

        </form>



        <?php
        mb_internal_encoding("utf8");
        $pdo=new PDO("mysql:dbname=practice;host=localhost;","root","");
        $stmt = $pdo->prepare("select*from login_user_transaction 
        where family_name like ? and last_name like ? and family_name_kana like ? and last_name_kana like ? and mail like ? and (gender=? or gender=?) and (authority=? or authority=?)");
        
        //%は変数に入れる
        $family_name=isset($_POST['family_name']) ? '%'.$_POST['family_name'].'%':"";
        $last_name=isset($_POST['last_name']) ? '%'.$_POST['last_name'].'%':"";
        $family_name_kana=isset($_POST['family_name_kana']) ? '%'.$_POST['family_name_kana'].'%':"";
        $last_name_kana=isset($_POST['last_name_kana']) ? '%'.$_POST['last_name_kana'].'%':"";
        $mail=isset($_POST['mail']) ? '%'.$_POST['mail'].'%':"";
        $gender=isset($_POST['gender'] )&& ($_POST['gender']<=1)? $_POST['gender']:"";
        $gender2=isset($_POST['gender']) && ($_POST['gender']<=1)? $_POST['gender']:"1";
        $authority=isset($_POST['authority'])&& ($_POST['authority']<=1) ? $_POST['authority']:"";
        $authority2=isset($_POST['authority'])&& ($_POST['authority']<=1) ? $_POST['authority']:"1";
        
//        echo "<p>".$gender."</p>"; 　変数の確認
       
            
        $stmt->bindValue(1,$family_name);
        $stmt->bindValue(2,$last_name);
        $stmt->bindValue(3,$family_name_kana);
        $stmt->bindValue(4,$last_name_kana);
        $stmt->bindValue(5,$mail);
        $stmt->bindValue(6,$gender);
        $stmt->bindValue(7,$gender2);
        $stmt->bindValue(8,$authority);
        $stmt->bindValue(9,$authority2);
        

           $stmt->execute();
              
//           $stmt->debugDumpParams();     sql文の確認
   
                
         //投稿を表示させるrow…行 stmt…statementの略。声明 fetch…取ってくる
                
 if(isset($_POST['family_name']) || isset($_POST['last_name']) || isset($_POST['family_name_kana']) || isset($_POST['last_name_kana']) || isset($_POST['mail'])){
     
  
        echo  '<table border="1">' ;
        echo  "<tr>";
        echo  " <th>ID</th>";
        echo  " <th>名前（姓）</th>";
        echo  "<th>名前（名）</th>";
        echo  "  <th>カナ（姓）</th>";
        echo  "<th>カナ（名）</th>";
        echo  " <th>メールアドレス</th>";
        echo  "<th>性別</th>";
        echo  " <th>アカウント権限</th>";
        echo  " <th>削除フラグ</th>";
        echo  " <th>登録日時</th>";
        echo  " <th>更新日時</th>";
        echo  '<th colspan="2">操作</th>';
        echo  "</tr>";
     
     
     
     while($row=$stmt->fetch()){
                
                echo "<tr>";
                $result= $row['id'];
                echo "<td>".$result."</td>";
        
                echo "<td>". $row['family_name']."</td>";
                echo "<td>". $row['last_name']."</td>";
                echo "<td>". $row['family_name_kana']."</td>";
                echo "<td>". $row['last_name_kana']."</td>";
                echo "<td>". $row['mail']."</td>";
    
               
                $option=['0'=>'男',
                         '1'=>'女'];
                    $gender=$row['gender'] ;
                    $genderdisp=$option[$row['gender']];
                echo "<td>".$genderdisp."</td>";
        
                $option=['0'=>'一般',
                         '1'=>'管理者'];
                    $authority=$row['authority'] ;
                    $authoritydisp=$option[$row['authority']];
                echo "<td>". $authoritydisp."</td>";
        
                $option=['0'=>'有効',
                        '1'=>'無効',
                        ''=>''];
                    $delete=$row['delete_flag'] ;
                    $deletedisp=$option[$row['delete_flag']];
                echo "<td>".$deletedisp."</td>";
        
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

    <footer>
        Copyright D.I.works| D.I.blog is the one which provides A to Z about programming
    </footer>
</body>

</html>
