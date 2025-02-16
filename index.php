<!doctype html>
<?php
    mb_internal_encoding("utf8");
    session_start();
?>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>TOPページ</title>
    <script type="text/javascript">
        function check1() {
            if (form.mail.value == "") {
                document.getElementById("mail_msg").innerHTML = "メールアドレスを入力してください。";
                return false;
            } else {
                return true;
            }
        }

        function check2() {
            if (form.password.value == "") {
                document.getElementById("password_msg").innerHTML = "パスワードを入力してください。";
                return false;
            } else {
                return true;
            }
        }

    </script>
    <link rel="stylesheet" type="text/css" href="index.css">
</head>


<body>
    <main>
        <div class="top_image">
            <h1>Collection Of Book</h1>
            <p>読書記録アプリケーション</p>

            <form method="post" class="login" action="index.php" name="login" id="login" onsubmit="return !! (check1()& check2())">

                <div>
                    <label>メールアドレス</label>
                    <br>
                    <input type="email" class="text" size="50" maxlength="100" id="mail" name="mail" value="">
                </div>
                <p style="color:#FF0000" id="mail_msg"></p>
                <br>
                <div>
                    <label>パスワード</label>
                    <br>
                    <input type="password" pattern="^[0-9a-zA-Z]*$" class="text" size="50" maxlength="10" id="password" name="password" value="">
                </div>
                <p style="color:#FF0000" id="password_msg"></p>

                <div>
                    <input type="submit" class="submit" value="ログイン">
                </div>
            </form>
        </div>

        <a href="regist.php">新規登録</a>
<?php

    if(!empty($_SESSION['user'])) {
        echo "ログイン済です<br>";
        echo "<a href=mypage.php>マイページに戻る</a>";
        exit;
    }
    if((empty($_POST['mail'])) || (empty($_POST['password']))) {
        exit;
    }

    try{
        $pdo=new PDO("mysql:dbname=14_work;host=localhost;","root","");
        $sql="select*from login_user where mail = :mail";
        $stmt=$pdo->prepare($sql);
        $stmt->bindvalue(":mail", $_POST['mail'], PDO::PARAM_STR);
        $stmt->execute();
        $row=$stmt->fetch();

        if(!$row){
            echo "ログインに失敗しました。";
            exit;
        }

         if($row['delete_flag']==0 && password_verify($_POST['password'], $row['password'])){
            session_regenerate_id(true);
            $_SESSION['user']=$row['id'];
            header("Location: mypage.php");
        }else {
            echo"'".$_POST['password']."'";
            echo"'".$row['password']."'";
            echo"'".$row['id']."'";
            echo"'".$row['delete_flag']."'";
        }

    }catch(Exception $e){
            echo '<span style="color:#FF0000">エラーが発生したためログイン情報を取得できません。</span>：';
            echo $e->getMessage();
            exit();
    }
 
    ?>




    </main>
</body>

</html>
