<?php
require_once('config.php');
//データベースへ接続、テーブルがない場合は作成
try {
  $pdo = new PDO(DSN, DB_USER, DB_PASS);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //catch (Exception $e)はエラーがあったときに括弧内の処理を行う
} catch (Exception $e) {
  echo $e->getMessage() . PHP_EOL;
}

function h($s){
  return htmlspecialchars($s, ENT_QUOTES, 'utf-8');
}

if(!isset($_SESSION)){
session_start();
}


//登録処理
try {
  $email=h($_SESSION['EMAIL']);
  $ans1 = $_POST['ans1'];
  $ans2 = $_POST['ans2'];
  $ans3 = $_POST['ans3'];
  $ans4 = $_POST['ans4'];
  $ans5 = $_POST['ans5'];
  $ans6 = $_POST['ans6'];
  $ans7 = $_POST['q7'];
  $ans8 = $_POST['q8'];
  $ans9 = $_POST['q9'];
  $ans10 = $_POST['q10'];
  $ans11 = $_POST['q11'];
  $ans12 = $_POST['q12'];
  $ans13 = $_POST['q13'];
  $ans14 = $_POST['q14'];
  $ans15 = $_POST['q15'];
  $ans16 = $_POST['q16'];
  $ans17 = $_POST['q17'];


  $stmt = $pdo->prepare("UPDATE myuserdeta SET ans1= :ans1, ans2= :ans2, ans3= :ans3, ans4= :ans4, ans5= :ans5, ans6= :ans6, ans7= :ans7,ans8= :ans8,ans9= :ans9, ans10= :ans10, ans11= :ans11, ans12= :ans12, ans13= :ans13, ans14= :ans14, ans15= :ans15, ans16= :ans16,ans17= :ans17 WHERE email= :email");
  $stmt->bindParam( ':email', $email);
  $stmt->bindParam( ':ans1', $ans1);
  $stmt->bindParam( ':ans2', $ans2);
  $stmt->bindParam( ':ans3', $ans3);
  $stmt->bindParam( ':ans4', $ans4);
  $stmt->bindParam( ':ans5', $ans5);
  $stmt->bindParam( ':ans6', $ans6);
  $stmt->bindParam( ':ans7', $ans7);
  $stmt->bindParam( ':ans8', $ans8);
  $stmt->bindParam( ':ans9', $ans9);
  $stmt->bindParam( ':ans10', $ans10);
  $stmt->bindParam( ':ans11', $ans11);
  $stmt->bindParam( ':ans12', $ans12);
  $stmt->bindParam( ':ans13', $ans13);
  $stmt->bindParam( ':ans14', $ans14);
  $stmt->bindParam( ':ans15', $ans15);
  $stmt->bindParam( ':ans16', $ans16);
  $stmt->bindParam( ':ans17', $ans17);

  $stmt->execute();
  echo "<script type='text/javascript'>alert('入力された値が正常に登録されました。');</script>";
  include_once("Simulationcp.php");
 
/* 
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
//$pdo = null;
//echo $output;
include_once("Simulationcp.php");
return false;
*/
}catch (\Exception $e) {
    echo "<script type='text/javascript'>alert('入力された値の保存に失敗しました。');</script>";
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
  include_once("Simulationcp.php");
  return false;
}
