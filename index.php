<!doctype html>
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
            <p>読書記録アプリケーションCOBへようこそ！</p>

            <form method="post" class="login" action="mypage.php" name="form" id="form" onsubmit="return !! (check1()& check2())">

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


    </main>
</body>

</html>
