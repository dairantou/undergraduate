<?php

function h($s){
  //指定した文字列を安全な形(ENT_QUOTES形式かつ指定した文字コード)に変換
  return htmlspecialchars($s, ENT_QUOTES, 'utf-8');
}

session_start();
//この場面が表示されることはないはずだが念のため記述
//issetは指定した変数がnullじゃないときtrueを返す
if (isset($_SESSION['EMAIL'])) {
  echo 'ようこそ' .  h($_SESSION['EMAIL']) . "さん<br>";
  echo "<a href='toppage.php'>システムの利用はこちら。</a>";
  echo "<a href='logout.php'>ログアウトはこちら。</a>";
  exit;
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>防災学習支援サイト</title>
<link rel="stylesheet" href="stylelogin.css">
<script src="js/jquery1.7.2.min.js"></script>
<script src="js/script.js"></script>
</head>
 <body>
 <div class="form-wrapper">
   <h1>ログイン</h1>
   <form  action="login.php" method="post">
      <label for="email">メールアドレス</label><br>
      <input type="email" name="email" size="66.5"><br><br>
      <label for="password">パスワード</label><br>
      <input type="password" name="password" size="66.5"><br><br>
      <button type="submit">ログイン</button><br>
   </form>
   <h1>新規登録</h1>
   <form action="signUp.php" method="post">
     <label for="email">メールアドレス</label><br>
     <input type="email" name="email" size="66.5"><br><br>
     <label for="password">パスワード</label><br>
     <input type="password" name="password" size="66.5"><br>
     <p>※半角英数字をそれぞれ１文字以上含んだ、８文字以上の文字列</p><br>
     <label for="repassword">パスワード(確認)</label><br>
     <input type="repassword" name="repassword" size="66.5"><br><br>
     <!--<label for="name">ニックネーム</label><br>
     <input type="name" name="name" size="66.5"><br><br>-->
     <button type="submit">新規登録</button><br><br>
     <p>学士研究のため、本システムの利用者を募集しております。<br>登録された個人情報は、研究目的以外の利用はいたしません。</p>
   </form>
</div>
 </body>
</html>
