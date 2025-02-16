<!doctype html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>プロフィール更新確認画面</title>

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
        <h1>プロフィール更新確認画面</h1>
        <?php
        //PDO
        mb_internal_encoding("utf8");
        $pdo=new PDO("mysql:dbname=14_work;host=localhost;","root","");
        if(empty($_POST)) {
            $stmt=$pdo->query("select*from login_user where id = 5");
            $row=$stmt->fetch();
        }
        ?>
        <table>
            <tr>
                <th>名前（姓）
                </th>
                <td>
                    <?php if(!empty($_POST['family_name'])){echo $_POST['family_name'];} ?></td>
            </tr>

            <tr>
                <th>名前（名）
                </th>
                <td>
                    <?php if(!empty($_POST['last_name'])){echo $_POST['last_name'];} ?>
                </td>
            </tr>

            <tr>
                <th>カナ（姓）
                </th>
                <td>
                    <?php if(!empty($_POST['nick_name'])){echo $_POST['nick_name'];} ?>
                </td>
            </tr>

            <tr>
                <th>ニックネーム
                </th>
                <td>
                    <?php if(!empty($_POST['mail'])){echo $_POST['mail'];} ?>
                </td>
            </tr>

            <tr>
                <th>メールアドレス
                </th>
                <td>
                    <?php if(!empty($_POST['mail'])){echo $_POST['mail'];} ?>
                </td>
            </tr>

            <tr>
                <th>パスワード
                </th>
                <td>
                    <?php if(!empty($_POST['password'])){
                echo "セキュリティのため表示できません。";}else{echo "パスワードは変更されません。";} ?>
                </td>
            </tr>


            <tr>
                <th>性別
                </th>
                <td>
                    <?php if(!empty($_POST['gender'])){
            $option=['0'=>'男',
                    '1'=>'女',
                    '2'=>'未選択'];
            $gender=$_POST['gender'] ;
            $genderdisp=$option[$_POST['gender']];
             echo $genderdisp; }?>
                </td>
            </tr>

            <tr>
                <th>郵便番号
                </th>
                <td>
                    <?php if(!empty($_POST['postal_code'])){echo $_POST['postal_code'];} ?>
                </td>
            </tr>


            <tr>
                <th>住所（都道府県）
                </th>
                <td>
                    <?php 
           if(!empty($_POST['prefecture'])){echo $_POST['prefecture'];} ?>
                </td>
            </tr>

            <tr>
                <th>住所（市区町村）
                </th>
                <td>
                    <?php if(!empty($_POST['address_1'])){echo $_POST['address_1'];} ?>
                </td>
            </tr>

            <tr>
                <th>住所（番地）
                </th>
                <td>
                    <?php if(!empty($_POST['address_2'])){echo $_POST['address_2'];} ?>
                </td>
            </tr>



        </table>

        <table>
            <tr>
                <td>
                    <form method="POST" action="profile.php">
                        <input type="submit" class="button2" value="前に戻る">
                        <input type="hidden" value="<?php if(!empty($_POST['family_name'])){echo $_POST['family_name'];}?>" name="family_name">
                        <input type="hidden" value="<?php if(!empty($_POST['last_name'])){echo $_POST['last_name'];}?>" name="last_name">
                        <input type="hidden" value="<?php if(!empty($_POST['nick_name'])){echo $_POST['nick_name'];}?>" name="nick_name">
                        <input type="hidden" value="<?php if(!empty($_POST['mail'])){echo $_POST['mail'];}?>" name="mail">
                        <input type="hidden" value="<?php if(!empty($_POST['password'])){echo $_POST['password'];}?>" name="password">
                        <input type="hidden" value="<?php if(!empty($_POST['gender'])){echo $_POST['gender'];}?>" name="gender">
                        <input type="hidden" value="<?php if(!empty($_POST['postal_code'])){echo $_POST['postal_code'];}?>" name="postal_code">
                        <input type="hidden" value="<?php if(!empty($_POST['prefecture'])){echo $_POST['prefecture'];}?>" name="prefecture">
                        <input type="hidden" value="<?php if(!empty($_POST['address_1'])){echo $_POST['address_1'];}?>" name="address_1">
                        <input type="hidden" value="<?php if(!empty($_POST['address_2'])){echo $_POST['address_2'];}?>" name="address_2">

                    </form>

                </td>
                <td>
                    <form action="profile_complete.php" method="post">
                        <input type="submit" class="button2" value="登録する">
                        <input type="hidden" value="<?php if(!empty($_POST['family_name'])){echo $_POST['family_name'];}?>" name="family_name">
                        <input type="hidden" value="<?php if(!empty($_POST['last_name'])){echo $_POST['last_name'];}?>" name="last_name">
                        <input type="hidden" value="<?php if(!empty($_POST['nick_name'])){echo $_POST['nick_name'];}?>" name="nick_name">
                        <input type="hidden" value="<?php if(!empty($_POST['mail'])){echo $_POST['mail'];}?>" name="mail">
                        <input type="hidden" value="<?php if(!empty($_POST['password'])){echo $_POST['password'];}?>" name="password">
                        <input type="hidden" value="<?php if(!empty($_POST['gender'])){echo $_POST['gender'];}?>" name="gender">
                        <input type="hidden" value="<?php if(!empty($_POST['postal_code'])){echo $_POST['postal_code'];}?>" name="postal_code">
                        <input type="hidden" value="<?php if(!empty($_POST['prefecture'])){echo $_POST['prefecture'];}?>" name="prefecture">
                        <input type="hidden" value="<?php if(!empty($_POST['address_1'])){echo $_POST['address_1'];}?>" name="address_1">
                        <input type="hidden" value="<?php if(!empty($_POST['address_2'])){echo $_POST['address_2'];}?>" name="address_2">

                    </form>
                </td>
            </tr>
        </table>


    </main>

    <footer>
        Copyright D.I.works| D.I.blog is the one which provides A to Z about programming
    </footer>
</body>

</html>
