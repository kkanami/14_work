

<!doctype html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>蔵書更新画面</title>
    <script type="text/javascript">
        function check() {
            if (form.title.value == "") {
                document.getElementById("title_msg").innerHTML = "タイトルを入力してください。";
                return false;
            } else {
                return true;
            }
        }
    </script>
    <link rel="stylesheet" type="text/css" href="regist.css">
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
        <h1>蔵書更新画面</h1>
        <?php
        //PDO
        mb_internal_encoding("utf8");
        $pdo=new PDO("mysql:dbname=14_work;host=localhost;","root","");
        $stmt=$pdo->query("select*from collection_book where id = '". $_SESSION['user']."'");
        $row=$stmt->fetch() 
        ?>
        <table>
            <form method="post" class="main" action="update_confirm.php" 　name="form" id="form" onsubmit="check()">

                <div>
                    <label>タイトル</label>
                    <br>
                    <input type="text" class="text" pattern="^[ぁ-ん一-龠ー]*$" size="35" maxlength="10" id="title" name="title" value="<?php if(!empty($_POST['title'])){echo $_POST['title'];}else{echo $row['title'];}?>">
                    <br>
                </div>
                <p style="color:#FF0000" id="title_msg"></p>


                <div>
                    <label>著書</label>
                    <br>
                    <input type="text" class="text" pattern="^[ぁ-ん一-龠ー]*$" size="35" maxlength="10" id="author" name="author" value="<?php if(!empty($_POST['author'])){echo $_POST['author'];}else{echo $row['author'];}?>">
                </div>
             


                <div>
                    <label>ISBN/ISSN</label>
                    <br>
                    <input type="text" pattern="[\u30A1-\u30F6]*" class="text" size="35" maxlength="10" id="isbn" name="isbn" value="<?php if(!empty($_POST['isbn'])){echo $_POST['isbn'];}else{echo $row['isbn'];}?>">
                </div>
           


                <div>
                    <label>出版者</label>
                    <br>
                    <input type="text" pattern="[\u30A1-\u30F6]*" 　inputmode="katakana" class="text" size="35" maxlength="10" id="publisher" name="publisher" value="<?php if(!empty($_POST['publisher'])){echo $_POST['publisher'];}else{echo $row['publisher'];}?>">
                </div>
            

                <div>
                    <label>出版日</label>
                    <br>
                    <input type="text" class="text" size="100" maxlength="100" id="publication_date" name="publication_date" value="<?php if(!empty($_POST['publication_date'])){echo $_POST['publication_date'];}else{echo $row['publication_date'];}?>">
                </div>
             
                <div>
                    <label>未読/既読</label>
                    <br>
                    <input type="radio" id="0" name="unread" value="0" <?php if(empty($_POST['unread'])) { if($row['unread']== "0" ){ echo 'checked';}} else{ if($_POST['unread']== "0" ){ echo 'checked';}}?> />
                    <label for="0">未読</label>

                    <input type="radio" id="1" name="unread" value="1" <?php if(empty($_POST['unread'])) { if($row['unread']== "1" ){ echo 'checked';}} else{ if($_POST['unread']== "1" ){ echo 'checked';}}?> />
                    <label for="1">既読</label>
                </div>
               
                <div>
                    <label>memo</label>
                    <br>
                    <input type="text" class="text" pattern="^[　ー０-９ぁ-んァ-ヶｱ-ﾝﾞﾟ一-龠ー]*$" size="100" maxlength="100" id="memo" name="memo" value="<?php if(!empty($_POST['memo'])){echo $_POST['memo'];}else{echo $row['memo'];}?>">
                </div>
      
                <div>
                    <input type='hidden' value='<?php echo $_POST["resultid1"];?>' name='resultid1' id='resultid1'>
                    <input type="submit" class="submit" value="確認する">
                </div>

            </form>




        </table>
    </main>

</body>

</html>
