<?php
require_once('config.php');
//データベースへ接続
try {
  $pdo = new PDO(DSN, DB_USER, DB_PASS);
  //エラーがあったときにcatch (Exception $e)の処理を行う
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
  echo $e->getMessage() . PHP_EOL;
}
//POSTのValidate。メールアドレスとして妥当かどうか判断している
if (!$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  echo "<script type='text/javascript'>alert('有効なメールアドレスを入力してください。');</script>";
  //セッション変数のクリア
$_SESSION = array();
//セッションクッキーも削除
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}
//セッションクリア
@session_destroy();

//echo $output;
include_once("index.php");
return false;
}



//パスワードが確認用と一致しているか確認
if(!strstr($_POST['password'],$_POST['repassword'])){
  echo "<script type='text/javascript'>alert('確認用パスワードが一致しません。');</script>";
  //セッション変数のクリア
$_SESSION = array();
//セッションクッキーも削除
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}
//セッションクリア
@session_destroy();

//echo $output;
include_once("index.php");
return false;
}

//パスワードの正規表現
if (preg_match('/\A(?=.*?[a-z])(?=.*?\d)[a-z\d]{8,100}+\z/i', $_POST['password'])) {
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
} else {
  echo "<script type='text/javascript'>alert('パスワードは半角英数字をそれぞれ1文字以上含んだ8文字以上で設定してください。');</script>";
  //セッション変数のクリア
$_SESSION = array();
//セッションクッキーも削除
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}
//セッションクリア
@session_destroy();

//echo $output;
include_once("index.php");
return false;
}
//登録処理
try {
  $sex = $_POST['sex'];
  $age = $_POST['age'];
  $stmt = $pdo->prepare("insert into myuserdeta(email, password, sex, age) value(?, ?, ?, ?)");
  $stmt->execute([$email, $password, $sex, $age]);
  echo "<script type='text/javascript'>alert('新規アカウントが正常に登録されました。');</script>";
  //セッション変数のクリア
$_SESSION = array();
//セッションクッキーも削除
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}
//セッションクリア
@session_destroy();

//echo $output;
include_once("index.php");
return false;

}catch (\Exception $e) {
    echo "<script type='text/javascript'>alert('登録済みのメールアドレスが入力されています。');</script>";
    //セッション変数のクリア
  $_SESSION = array();
  //セッションクッキーも削除
  if (ini_get("session.use_cookies")) {
      $params = session_get_cookie_params();
      setcookie(session_name(), '', time() - 42000,
          $params["path"], $params["domain"],
          $params["secure"], $params["httponly"]
      );
  }
  //セッションクリア
  @session_destroy();
  
  //echo $output;
  include_once("index.php");
  return false;
}
