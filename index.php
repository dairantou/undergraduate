<?php

function h($s){
  //指定した文字列を安全な形(ENT_QUOTES形式かつ指定した文字コード)に変換
  return htmlspecialchars($s, ENT_QUOTES, 'utf-8');
}

session_start();
//ログアウトせずブラウザバックしたときに表示される
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
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-QFC60G6Q9F"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-QFC60G6Q9F');
</script>
<meta charset="UTF-8" name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=yes">
<title>防災学習支援サイト-ログイン</title>
<link rel="stylesheet" href="style2.css">
<script src="js/jquery1.7.2.min.js"></script>
<script src="js/script.js"></script>
</head>
 <body>
 <div class="form-wrapper">
   <h1>ログイン</h1>
   <form  action="login.php" method="post">
      <label for="email">メールアドレス</label><br>
      <input type="email" name="email" style="width:100%"><br><br>
      <label for="password">パスワード</label><br>
      <input type="password" name="password" style="width:100%"><br><br>
      <button type="submit">ログイン</button><br>
   </form>
   <h1>新規登録</h1>
   <form action="signUp.php" method="post">
     <label for="email">メールアドレス</label><br>
     <input type="email" name="email" style="width:100%"><br><br>
     <label for="password">パスワード</label><br>
     <input type="password" name="password" style="width:100%"><br>
     <p>※半角英数字をそれぞれ１文字以上含んだ、８文字以上の文字列</p><br>
     <label for="repassword">パスワード(確認)</label><br>
     <input type="password" name="repassword" style="width:100%"><br><br>
     <label for="sex">性別</label><br>
     <label><input type='radio' name='sex' value='male'>男性</label><br>
     <label><input type='radio' name='sex' value='female'>女性</label><br><br>
     <label for="age">年齢</label><br>
     <select name="age"><br><br>
     <option value="10s">10代</option>
     <option value="20s">20代</option>
     <option value="30s">30代</option>
     <option value="40s">40代</option>
     <option value="50s">50代</option>
     <option value="60over">60代以上</option>
     </select><br><br>
     <button type="submit">新規登録</button><br><br>
     <p>学士研究のため、本システムの利用者を募集しております。<br>登録された個人情報は、研究目的以外の利用はいたしません。</p>
   </form>
</div>
 </body>
</html>
