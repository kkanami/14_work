



<!doctype html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>プロフィール画面</title>
    <script type="text/javascript">
        function check() {
            if (form.family_name.value == "") {
                document.getElementById("family_name_msg").innerHTML = "名前（姓）を入力してください。";
                return false;
            } else {
                return true;
            }
        }

        function check2() {
            if (form.last_name.value == "") {
                document.getElementById("last_name_msg").innerHTML = "名前（名）を入力してください。";
                return false;
            } else {
                return true;
            }
        }

        function check3() {
            if (form.nick_name.value == "") {
                document.getElementById("nick_name_msg").innerHTML = "ニックネームを入力してください。";
                return false;
            } else {
                return true;
            }
        }

        function check4() {
            if (form.mail.value == "") {
                document.getElementById("mail_msg").innerHTML = "メールアドレスを入力してください。";
                return false;
            } else {
                return true;
            }
        }

        function check5() {
            if (form.password.value == "") {
                document.getElementById("password_msg").innerHTML = "パスワードを入力してください。";
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
        <img src="img/library.png">
        <div class="content">
            <ul class="menu">
                <li><a href="index.php">TOPページ</a></li>
                <li> <a href="profile.php">プロフィール</a></li>
                <li> <a href="newbook.php">蔵書登録</a></li>
                <li> <a href="search.php">蔵書検索</a></li>
                  <li><a href="login.php">ログイン</a></li>
                <li><a href="logout.php">ログアウト</a></li>
            </ul>
        </div>
    </header>

    <main>
       <div class="top_image">
        <h1>プロフィール</h1>
        <?php
        //PDO
        mb_internal_encoding("utf8");
        $pdo=new PDO("mysql:dbname=14_work;host=localhost;","root","");
        if(!empty($_POST)) {
        $stmt=$pdo->query("select*from login_user where id = '".$_POST['resultid1']."'");
        $row=$stmt->fetch();
        }
        ?>
        
        <table>
            <form method="post" class="main" action="update_confirm.php" 　name="form" id="form" onsubmit="return !! (check() & check2() & check3()& check4()& check5()& check7()& check8()& check9()& check10()& check10())">

                <div>
                    <label>名前（姓）</label>
                    <br>
                    <input type="text" class="text" pattern="^[ぁ-ん一-龠ー]*$" size="35" maxlength="10" id="family_name" name="family_name" value="<?php if(!empty($_POST['family_name'])){echo $_POST['family_name'];}else{echo $row['family_name'];}?>">
                    <br>
                </div>
                <p style="color:#FF0000" id="family_name_msg"></p>


                <div>
                    <label>名前（名）</label>
                    <br>
                    <input type="text" class="text" pattern="^[ぁ-ん一-龠ー]*$" size="35" maxlength="10" id="last_name" name="last_name" value="<?php if(!empty($_POST['last_name'])){echo $_POST['last_name'];}else{echo $row['last_name'];}?>">
                </div>
                <p style="color:#FF0000" id="last_name_msg"></p>


                <div>
                    <label>ニックネーム</label>
                    <br>
                    <input type="text" pattern="[\u30A1-\u30F6]*" class="text" size="35" maxlength="10" id="nick_name" name="nick_name" value="<?php if(!empty($_POST['nick_name'])){echo $_POST['nick_name'];}else{echo $row['nick_name'];}?>">
                </div>
                <p style="color:#FF0000" id="nick_name_msg"></p>

                <div>
                    <label>メールアドレス</label>
                    <br>
                    <input type="email" class="text" size="100" maxlength="100" id="mail" name="mail" value="<?php if(!empty($_POST['mail'])){echo $_POST['mail'];}else{echo $row['mail'];}?>">
                </div>
                <p style="color:#FF0000" id="mail_msg"></p>

                <div>
                    <label>パスワード</label>
                    <br>
                    <p>セキュリティのため表示できません。変更する場合のみ入力してください。</p>
                    <input type="password" pattern="^[0-9a-zA-Z]*$" class="text" size="35" maxlength="10" id="password" name="password" value="<?php if(!empty($_POST['password'])){echo $_POST['password'];}?>">
                </div>
                <p style="color:#FF0000" id="password_msg"></p>

                <div>
                    <label>性別</label>
                    <br>
                    <input type="radio" id="0" name="gender" value="0" <?php if(empty($_POST['gender'])) { if($row['gender']== "0" ){ echo 'checked';}} else{ if($_POST['gender']== "0" ){ echo 'checked';}}?> />
                    <label for="0">男</label>

                    <input type="radio" id="1" name="gender" value="1" <?php if(empty($_POST['gender'])) { if($row['gender']== "1" ){ echo 'checked';}} else{ if($_POST['gender']== "1" ){ echo 'checked';}}?> />
                    <label for="1">女</label>
                    
                     <input type="radio" id="2" name="gender" value="2" <?php if(empty($_POST['gender'])) { if($row['gender']== "2" ){ echo 'checked';}} else{ if($_POST['gender']== "2" ){ echo 'checked';}}?> />
                    <label for="2">未選択</label>

                </div>


                <div>
                    <label>郵便番号</label>
                    <br>
                    <input type="text" pattern="^[0-9]*$" class="text" size="35" maxlength="7" id="postal_code" name="postal_code" value="<?php if(!empty($_POST['postal_code'])){echo $_POST['postal_code'];}else{echo $row['postal_code'];}?>">
                </div>
                <p style="color:#FF0000" id="postal_code_msg"></p>
               

                <div>

                    <label>住所（都道府県）</label>
                    <br>
                    <select class="dropdown" id="prefecture" name="prefecture">
                        <option value=""></option>
                        <option value="北海道" data-pref-id="01" <?php if(empty($_POST['prefecture'])){if( $row['prefecture'] === "北海道" ){ echo 'selected'; } }else{if( $_POST['prefecture'] === "北海道" ){ echo 'selected'; }}?>>北海道</option>
                        <option value="青森県" data-pref-id="02" <?php if(empty($_POST['prefecture'])){if( $row['prefecture'] === "青森県" ){ echo 'selected'; } }else{if( $_POST['prefecture'] === "青森県" ){ echo 'selected'; }} ?>>青森県</option>
                        <option value="岩手県" data-pref-id="03" <?php if(empty($_POST['prefecture'])){if( $row['prefecture'] === "岩手県" ){ echo 'selected'; } }else{if( $_POST['prefecture'] === "岩手県" ){ echo 'selected'; }}?>>岩手県</option>
                        <option value="宮城県" data-pref-id="04" <?php if(empty($_POST['prefecture'])){if( $row['prefecture'] === "宮城県" ){ echo 'selected'; } }else{if( $_POST['prefecture'] === "宮城県" ){ echo 'selected'; } }?>>宮城県</option>
                        <option value="秋田県" data-pref-id="05" <?php if(empty($_POST['prefecture'])){if( $row['prefecture'] === "秋田県" ){ echo 'selected'; } }else{if( $_POST['prefecture'] === "秋田県" ){ echo 'selected'; }} ?>>秋田県</option>
                        <option value="山形県" data-pref-id="06" <?php if(empty($_POST['prefecture'])){if( $row['prefecture'] === "山形県" ){ echo 'selected'; } }else{if( $_POST['prefecture'] === "山形県" ){ echo 'selected'; }} ?>>山形県</option>
                        <option value="福島県" data-pref-id="07" <?php if(empty($_POST['prefecture'])){if( $row['prefecture'] === "福島県" ){ echo 'selected'; } }else{if( $_POST['prefecture'] === "福島県" ){ echo 'selected'; } }?>>福島県</option>
                        <option value="茨城県" data-pref-id="08" <?php if(empty($_POST['prefecture'])){if( $row['prefecture'] === "茨城県" ){ echo 'selected'; } }else{if( $_POST['prefecture'] === "茨城県" ){ echo 'selected'; }} ?>>茨城県</option>
                        <option value="栃木県" data-pref-id="09" <?php if(empty($_POST['prefecture'])){if( $row['prefecture'] === "栃木県" ){ echo 'selected'; } }else{if( $_POST['prefecture'] === "栃木県" ){ echo 'selected'; }}?>>栃木県</option>
                        <option value="群馬県" data-pref-id="10" <?php if(empty($_POST['prefecture'])){if( $row['prefecture'] === "群馬県" ){ echo 'selected'; } }else{if( $_POST['prefecture'] === "群馬県" ){ echo 'selected'; }}?>>群馬県</option>
                        <option value="埼玉県" data-pref-id="11" <?php if(empty($_POST['prefecture'])){if( $row['prefecture'] === "埼玉県" ){ echo 'selected'; } }else{if( $_POST['prefecture'] === "埼玉県" ){ echo 'selected'; }}?>>埼玉県</option>
                        <option value="千葉県" data-pref-id="12" <?php if(empty($_POST['prefecture'])){if( $row['prefecture'] === "千葉県" ){ echo 'selected'; } }else{if( $_POST['prefecture'] === "千葉県" ){ echo 'selected'; }}?>>千葉県</option>
                        <option value="東京都" data-pref-id="13" <?php if(empty($_POST['prefecture'])){if( $row['prefecture'] === "東京都" ){ echo 'selected'; } }else{if( $_POST['prefecture'] === "東京都" ){ echo 'selected'; }} ?>>東京都</option>
                        <option value="神奈川県" data-pref-id="14" <?php if(empty($_POST['prefecture'])){if( $row['prefecture'] === "神奈川県" ){ echo 'selected'; } }else{if( $_POST['prefecture'] === "神奈川県" ){ echo 'selected'; }} ?>>神奈川県</option>
                        <option value="新潟県" data-pref-id="15" <?php if(empty($_POST['prefecture'])){if( $row['prefecture'] === "新潟県" ){ echo 'selected'; } }else{if( $_POST['prefecture'] === "新潟県" ){ echo 'selected'; }}?>>新潟県</option>
                        <option value="富山県" data-pref-id="16" <?php if(empty($_POST['prefecture'])){if( $row['prefecture'] === "富山県" ){ echo 'selected'; } }else{if( $_POST['prefecture'] === "富山県" ){ echo 'selected'; } }?>>富山県</option>
                        <option value="石川県" data-pref-id="17" <?php if(empty($_POST['prefecture'])){if( $row['prefecture'] === "石川県" ){ echo 'selected'; } }else{if( $_POST['prefecture'] === "石川県" ){ echo 'selected'; }}?>>石川県</option>
                        <option value="福井県" data-pref-id="18" <?php if(empty($_POST['prefecture'])){if( $row['prefecture'] === "福井県" ){ echo 'selected'; } }else{if( $_POST['prefecture'] === "福井県" ){ echo 'selected'; }}?>>福井県</option>
                        <option value="山梨県" data-pref-id="19" <?php if(empty($_POST['prefecture'])){if( $row['prefecture'] === "山梨県" ){ echo 'selected'; } }else{if( $_POST['prefecture'] === "山梨県" ){ echo 'selected'; }}?>>山梨県</option>
                        <option value="長野県" data-pref-id="20" <?php if(empty($_POST['prefecture'])){if( $row['prefecture'] === "長野県" ){ echo 'selected'; } }else{if( $_POST['prefecture'] === "長野県" ){ echo 'selected'; }} ?>>長野県</option>
                        <option value="岐阜県" data-pref-id="21" <?php if(empty($_POST['prefecture'])){if( $row['prefecture'] === "岐阜県" ){ echo 'selected'; } }else{if( $_POST['prefecture'] === "岐阜県" ){ echo 'selected'; } }?>>岐阜県</option>
                        <option value="静岡県" data-pref-id="22" <?php if(empty($_POST['prefecture'])){if( $row['prefecture'] === "静岡県" ){ echo 'selected'; } }else{if( $_POST['prefecture'] === "静岡県" ){ echo 'selected'; }} ?>>静岡県</option>
                        <option value="愛知県" data-pref-id="23" <?php if(empty($_POST['prefecture'])){if( $row['prefecture'] === "愛知県" ){ echo 'selected'; } }else{if( $_POST['prefecture'] === "愛知県" ){ echo 'selected'; } }?>>愛知県</option>
                        <option value="三重県" data-pref-id="24" <?phpif(empty($_POST['prefecture'])){if( $row['prefecture'] === "三重県" ){ echo 'selected'; } }else{if( $_POST['prefecture'] === "三重県" ){ echo 'selected'; }} ?>>三重県</option>
                        <option value="滋賀県" data-pref-id="25" <?php if(empty($_POST['prefecture'])){if( $row['prefecture'] === "滋賀県" ){ echo 'selected'; } }else{if( $_POST['prefecture'] === "滋賀県" ){ echo 'selected'; }}?>>滋賀県</option>
                        <option value="京都府" data-pref-id="26" <?php if(empty($_POST['prefecture'])){if( $row['prefecture'] === "京都府" ){ echo 'selected'; } }else{if( $_POST['prefecture'] === "京都府" ){ echo 'selected'; } }?>>京都府</option>
                        <option value="大阪府" data-pref-id="27" <?php if(empty($_POST['prefecture'])){if( $row['prefecture'] === "大阪府" ){ echo 'selected'; } }else{if( $_POST['prefecture'] === "大阪府" ){ echo 'selected'; } }?>>大阪府</option>
                        <option value="兵庫県" data-pref-id="28" <?php if(empty($_POST['prefecture'])){if( $row['prefecture'] === "兵庫県" ){ echo 'selected'; } }else{if( $_POST['prefecture'] === "兵庫県" ){ echo 'selected'; }}?>>兵庫県</option>
                        <option value="奈良県" data-pref-id="29" <?php if(empty($_POST['prefecture'])){if( $row['prefecture'] === "奈良県" ){ echo 'selected'; } }else{if( $_POST['prefecture'] === "奈良県" ){ echo 'selected'; } }?>>奈良県</option>
                        <option value="和歌山県" data-pref-id="30" <?php if(empty($_POST['prefecture'])){if( $row['prefecture'] === "和歌山県" ){ echo 'selected'; } }else{if( $_POST['prefecture'] === "和歌山県" ){ echo 'selected'; } }?>>和歌山県</option>
                        <option value="鳥取県" data-pref-id="31" <?php if(empty($_POST['prefecture'])){if( $row['prefecture'] === "鳥取県" ){ echo 'selected'; } }else{if( $_POST['prefecture'] === "鳥取県" ){ echo 'selected'; }}?>>鳥取県</option>
                        <option value="島根県" data-pref-id="32" <?php if(empty($_POST['prefecture'])){if( $row['prefecture'] === "島根県" ){ echo 'selected'; } }else{if( $_POST['prefecture'] === "島根県" ){ echo 'selected'; }}?>>島根県</option>
                        <option value="岡山県" data-pref-id="33" <?php if(empty($_POST['prefecture'])){if( $row['prefecture'] === "岡山県" ){ echo 'selected'; } }else{if( $_POST['prefecture'] === "岡山県" ){ echo 'selected'; }} ?>>岡山県</option>
                        <option value="広島県" data-pref-id="34" <?php if(empty($_POST['prefecture'])){if( $row['prefecture'] === "広島県" ){ echo 'selected'; } }else{if( $_POST['prefecture'] === "広島県" ){ echo 'selected'; }}?>>広島県</option>
                        <option value="山口県" data-pref-id="35" <?php if(empty($_POST['prefecture'])){if( $row['prefecture'] === "山口県" ){ echo 'selected'; } }else{if( $_POST['prefecture'] === "山口県" ){ echo 'selected'; }}?>>山口県</option>
                        <option value="徳島県" data-pref-id="36" <?php if(empty($_POST['prefecture'])){if( $row['prefecture'] === "徳島県" ){ echo 'selected'; } }else{if( $_POST['prefecture'] === "徳島県" ){ echo 'selected'; }}?>>徳島県</option>
                        <option value="香川県" data-pref-id="37" <?php if(empty($_POST['prefecture'])){if( $row['prefecture'] === "香川県" ){ echo 'selected'; } }else{if( $_POST['prefecture'] === "香川県" ){ echo 'selected'; }}?>>香川県</option>
                        <option value="愛媛県" data-pref-id="38" <?php if(empty($_POST['prefecture'])){if( $row['prefecture'] === "愛媛県" ){ echo 'selected'; } }else{if( $_POST['prefecture'] === "愛媛県" ){ echo 'selected'; }} ?>>愛媛県</option>
                        <option value="高知県" data-pref-id="39" <?php if(empty($_POST['prefecture'])){if( $row['prefecture'] === "高知県" ){ echo 'selected'; } }else{if( $_POST['prefecture'] === "高知県" ){ echo 'selected'; } }?>>高知県</option>
                        <option value="福岡県" data-pref-id="40" <?php if(empty($_POST['prefecture'])){if( $row['prefecture'] === "福岡県" ){ echo 'selected'; } }else{if( $_POST['prefecture'] === "福岡県" ){ echo 'selected'; } }?>>福岡県</option>
                        <option value="佐賀県" data-pref-id="41" <?php if(empty($_POST['prefecture'])){if( $row['prefecture'] === "佐賀県" ){ echo 'selected'; } }else{if( $_POST['prefecture'] === "佐賀県" ){ echo 'selected'; }} ?>>佐賀県</option>
                        <option value="長崎県" data-pref-id="42" <?php if(empty($_POST['prefecture'])){if( $row['prefecture'] === "長崎県" ){ echo 'selected'; } }else{if( $_POST['prefecture'] === "長崎県" ){ echo 'selected'; }}?>>長崎県</option>
                        <option value="熊本県" data-pref-id="43" <?php if(empty($_POST['prefecture'])){if( $row['prefecture'] === "熊本県" ){ echo 'selected'; } }else{if( $_POST['prefecture'] === "熊本県" ){ echo 'selected'; }} ?>>熊本県</option>
                        <option value="大分県" data-pref-id="44" <?php if(empty($_POST['prefecture'])){if( $row['prefecture'] === "大分県" ){ echo 'selected'; } }else{if( $_POST['prefecture'] === "大分県" ){ echo 'selected'; }}?>>大分県</option>
                        <option value="宮崎県" data-pref-id="45" <?php if(empty($_POST['prefecture'])){if( $row['prefecture'] === "宮崎県" ){ echo 'selected'; } }else{if( $_POST['prefecture'] === "宮崎県" ){ echo 'selected'; }}?>>宮崎県</option>
                        <option value="鹿児島県" data-pref-id="46" <?php if(empty($_POST['prefecture'])){if( $row['prefecture'] === "鹿児島県" ){ echo 'selected'; } }else{if( $_POST['prefecture'] === "鹿児島県" ){ echo 'selected'; }} ?>>鹿児島県</option>
                        <option value="沖縄県" data-pref-id="47" <?php if(empty($_POST['prefecture'])){if( $row['prefecture'] === "沖縄県" ){ echo 'selected'; } }else{if( $_POST['prefecture'] === "沖縄県" ){ echo 'selected'; } }?>>沖縄県</option>
                    </select>
                </div>
                <p style="color:#FF0000" id="prefecture_msg"></p>

                <div>
                    <label>住所（市区町村）</label>
                    <br>
                    <input type="text" class="text" pattern="^[　ー０-９ぁ-んァ-ヶｱ-ﾝﾞﾟ一-龠ー]*$" size="35" maxlength="10" id="address_1" name="address_1" value="<?php if(!empty($_POST['address_1'])){echo $_POST['address_1'];}else{echo $row['address_1'];}?>">
                </div>
                <p style="color:#FF0000" id="address_1_msg"></p>

                <div>
                    <label>住所（番地）</label>
                    <br>
                    <input type="text" class="text" pattern="^[　ー０-９ぁ-んァ-ヶｱ-ﾝﾞﾟ一-龠ー]*$" size="100" maxlength="100" id="address_2" name="address_2" value="<?php if(!empty($_POST['address_2'])){echo $_POST['address_2'];}else{echo $row['address_2'];}?>">
                </div>
                <p style="color:#FF0000" id="address_2_msg"></p>

             
                <div>
                    <input type='hidden' value='<?php echo $_POST["resultid1"];?>' name='resultid1' id='resultid1'>
                    <input type="submit" class="submit" value="確認する">
                </div>

            </form>




        </table>
        </div>
    </main>

</body>

</html>
