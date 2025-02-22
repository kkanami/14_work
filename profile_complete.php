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
    <title>プロフィール更新完了画面</title>

    <link rel="stylesheet" type="text/css" href="regist.css">
</head>

<body>
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
                <li><a href="login.php">ログイン</a></li>
                <li><a href="logout.php">ログアウト</a></li>
            </ul>
        </div>
    </header>




    <main>
        <h1>プロフィール更新完了画面</h1>

        <?php
        //PDO
        mb_internal_encoding("utf8");
        try{
            $pdo=new PDO("mysql:dbname=14_work;host=localhost;","root","");
            if(!empty($_POST)) {
            $pdo->exec("update login_user set family_name='".$_POST['family_name']."' , last_name='".$_POST['last_name']."' , nick_name='".$_POST['nick_name']."' ,  mail='".$_POST['mail']."' , gender='".$_POST['gender']."' , postal_code='".$_POST['postal_code']."' , prefecture='".$_POST['prefecture']."' , address_1='".$_POST['address_1']."' , address_2='".$_POST['address_2']."' , update_time= now() where id = '". $_SESSION['user']."'");
            }

            if(!empty($_POST['password'])){
                $pdo->exec("update login_user set password='".password_hash($_POST['password'],PASSWORD_DEFAULT)."', update_time= now() where id ='". $_SESSION['user']."'");
            }

        }catch(Exception $e){
           echo '<span style="color:#FF0000">エラーが発生したためアカウント更新できません。</span>' . $e->getMessage();

           exit();
        }    
        
        ?>

        <div>
            <p><span>更新完了しました</span></p>
            <form action="mypage.php">
                <input type="submit" class="button1" value="マイページへ戻る">
            </form>
        </div>




    </main>

  
</body>

</html>
