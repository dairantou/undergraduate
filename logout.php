<?php
session_start();
$output = '';
if (isset($_SESSION["EMAIL"])) {
  $output = 'Logoutしました。';
  //include_once("index.php");
} else {
  $output = 'SessionがTimeoutしました。';
}
//セッション変数をクリア
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