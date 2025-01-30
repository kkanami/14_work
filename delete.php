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
    <title>アカウント削除画面</title>
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
        <h1>アカウント削除画面</h1>



        <?php
        //PDO
        mb_internal_encoding("utf8");
        $pdo=new PDO("mysql:dbname=practice;host=localhost;","root","");
        $stmt=$pdo->query("select*from login_user_transaction where id = '".$_POST['resultid2']."'");
        ?>
        <?php $row=$stmt->fetch() ?>
        <table>
            <tr>
                <th>名前（姓）
                </th>
                <td>
                    <?php echo $row['family_name']; ?></td>
            </tr>

            <tr>
                <th>名前（名）
                </th>
                <td>
                    <?php echo $row['last_name']; ?>
                </td>
            </tr>

            <tr>
                <th>カナ（姓）
                </th>
                <td>
                    <?php echo $row['family_name_kana']; ?>
                </td>
            </tr>

            <tr>
                <th>カナ（名）
                </th>
                <td>
                    <?php echo $row['last_name_kana']; ?>
                </td>
            </tr>

            <tr>
                <th>メールアドレス
                </th>
                <td>
                    <?php echo $row['mail']; ?>
                </td>
            </tr>

            <tr>
                <th>パスワード
                </th>
                <td>
                    <?php if(!empty($row['password'])){
                echo "セキリュティのため表示できません";} ?>
                </td>
            </tr>


            <tr>
                <th>性別
                </th>
                <td>
                    <?php
            $option=['0'=>'男',
                    '1'=>'女'];
            $gender=$row['gender'] ;
            $genderdisp=$option[$row['gender']];
             echo $genderdisp ?>
                </td>
            </tr>

            <tr>
                <th>郵便番号
                </th>
                <td>
                    <?php echo $row['postal_code']; ?>
                </td>
            </tr>


            <tr>
                <th>住所（都道府県）
                </th>
                <td>
                    <?php echo $row['prefecture']; ?>
                </td>
            </tr>

            <tr>
                <th>住所（市区町村）
                </th>
                <td>
                    <?php echo $row['address_1']; ?>
                </td>
            </tr>

            <tr>
                <th>住所（番地）
                </th>
                <td>
                    <?php echo $row['address_2']; ?>
                </td>
            </tr>

            <tr>
                <th>アカウント権限
                </th>
                <td>
                    <?php
            $option=['0'=>'一般',
                    '1'=>'管理者'];
            $authority=$row['authority'] ;
            $authoritydisp=$option[$row['authority']];
            echo $authoritydisp ?>
                </td>
            </tr>

        </table>

        <form method="post" class="button" action="delete_confirm.php">
            <input type='hidden' value='<?php echo $_POST["resultid2"];?>' name='resultid2' id='resultid2'>
            <input type="submit" class="button" value="確認する">
        </form>


    </main>

    <footer>
        Copyright D.I.works| D.I.blog is the one which provides A to Z about programming
    </footer>
</body>

</html>
