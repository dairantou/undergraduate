<?php

require_once('config.php');
//データベースへ接続、テーブルがない場合は作成
try {
  $pdo = new PDO(DSN, DB_USER, DB_PASS);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $pdo->exec("create table if not exists userDeta(
      id int not null auto_increment primary key,
      email varchar(255) unique,
      password varchar(255) ,
      created timestamp not null default current_timestamp
    )");
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

// SELECT文を変数に格納
//php内のsqlで変数を使うときは..でつなぐ。例　"SELECT * FROM テーブル名 WHERE  カラム名 = '".変数名."'";
$sql = "SELECT * FROM UserDeta WHERE  email = '".h($_SESSION['EMAIL'])."'";

// SQLステートメントを実行し、結果を変数に格納
$stmt = $pdo->query($sql);
 
// foreach文で配列の中身を一行ずつ出力
foreach ($stmt as $row);

?>


<!DOCTYPE html>
<html dir="ltr" lang="ja">
<head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-QFC60G6Q9F"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-QFC60G6Q9F');
</script>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, user-scalable=yes, maximum-scale=1.0, minimum-scale=1.0">
<title>防災学習支援サイト-トップページ</title>
<meta name="keywords" content="">
<meta name="description" content="">
<link rel="stylesheet" href="style.css?v=1.0" type="text/css" media="screen">
<!--[if lt IE 9]>
<script src="js/html5.js"></script>
<script src="js/css3-mediaqueries.js"></script>
<![endif]-->
<script src="js/jquery1.7.2.min.js"></script>
<script src="js/script.js"></script>
</head>

<body>
<header id="header">
	<h1>防災学習支援サイト</h1>
  <!-- ロゴ -->
	<div class="logo">
		<a href="toppage.php">家庭内備蓄品について学ぼう</a>
	</div>
	<!--<div class="logo_name">
	<?php
	//echo '<span>ようこそ' .  h($_SESSION['NAME']) . "さん</span>";
	?>
	</div>
	<br><br>
	<div class="logo_logout">
	<a href='logout.php'>ログアウトはこちら</a>
	</div>-->
	<!-- / ロゴ -->
</header>

<!-- メインナビゲーション -->
<nav id="mainNav">
	<div class="inner">
  	<a class="menu" id="menu"><span>MENU</span></a>
		<div class="panel">   
    	<ul>
    		<li class="active"><a href="toppage.php"><strong>トップページ</strong><span></span></a></li>
				<li><a href="self-help.php"><strong>「自助」とは？</strong><span></span></a></li>
				<li><a href="Learn.php"><strong>家庭内備蓄品の紹介</strong><span></span></a></li>
				<!--<li><a href="Mypage.php"><strong>マイページ</strong><span>Mypage</span></a></li>-->
				<li><a href="Simulationcp.php"><strong>シミュレーション</strong><span></span></a></li>
				<li class="last"><a href="Questionnaire-Contact.php"><strong>アンケート</strong><span></span></a></li>
				<li><a href="logout.php"><strong>ログアウト</strong><span></span></a></li>
			</ul>   
    </div>
	</div> 
</nav>
<!-- / メインナビゲーション -->
  
<div id="wrapper">
  
  <!-- メイン画像 -->
	<div id="mainBanner">
		<img src="images/mainimg.jpg" alt="">
    <div class="slogan">
			<h2 style="position: relative;top: 13px;">家庭内備蓄品について学べるサイトです</h2>
		</div>
	</div>
	<!-- / メイン画像 -->

  <!-- 3カラム -->
  <section class="gridWrapper">
		<article class="grid">
      <div class="box">
				<img src="images/study.jpg" width="260" height="113" alt="">
				<h3 id="box-h3-left">「自助」とは？</h3>
				<p>災害の被害を小さくするために大切な「自助」という考え方とは?「自助」と家庭内備蓄品の関連性を説明します。</p>
				<p class="readmore"><a href="self-help.php">詳細を確認する</a></p>
      </div>
		</article>
		<article class="grid">
			<div class="box">
      	<img src="images/study.jpg" width="260" height="113" alt="">
				<h3>家庭内備蓄品の紹介</h3>
				<p>被災時に自宅避難で必要となる家庭内備蓄品を紹介します。</p><br><br>
				<p class="readmore"><a href="Learn.php">詳細を確認する</a></p>
      </div>
		</article>
	
	</article>
	<article class="grid">
		<div class="box">
	  <img src="images/simyu.jpg" width="260" height="113" alt="">
			<h3>自宅避難時生活シミュレーション</h3>
			<p>あなたの家庭の備蓄状況で自宅避難時にどのような生活を送れるのかを調べましょう。</p><br>
			<p class="readmore"><a href="Simulationcp.php">詳細を確認する</a></p>
  </div>
	</article>
	</section>
	<!-- / 3カラム -->
  
</div>
 
<!-- フッター -->
<footer id="footer">
	<div class="inner">
  	<!-- 左側 -->
		<div id="info" class="grid">
			<!-- ロゴ -->
			<div class="logo">
				<a href="toppage.php">家庭内備蓄品について学ぼう<br /></a>
			</div>
			<!-- / ロゴ -->
		</div>  
		<!-- / 左側 -->
		<!-- 右側 ナビゲーション -->
		<ul class="footnav">
			<li><a href="Questionnaire-Contact.php#about">本サイトについて</a></li>
			<li><a href="Questionnaire-Contact.php#contact">お問い合わせ</a></li>
			<li><a href="logout.php">ログアウト</a></li>
		</ul>
		<!-- / 右側 ナビゲーション -->
	</div>
</footer>
	<!-- / フッター -->
	<address id=copyright>Copyright(c) 2021 家庭内備蓄品について学ぼう All Rights Reserved. Design by <a href="http://f-tpl.com" target="_blank" rel="nofollow">http://f-tpl.com</a></address>

</body>
</html>