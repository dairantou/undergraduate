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
<script async src="https://www.googletagmanager.com/gtag/js?id=G-58GYY969ZT"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-58GYY969ZT');
</script>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, user-scalable=yes, maximum-scale=1.0, minimum-scale=1.0">
<title>防災学習支援サイト</title>
<meta name="keywords" content="">
<meta name="description" content="">
<link rel="stylesheet" href="style.css" type="text/css" media="screen">
<!--[if lt IE 9]>
<script src="js/html5.js"></script>
<script src="js/css3-mediaqueries.js"></script>
<![endif]-->
<script src="js/jquery1.7.2.min.js"></script>
<script src="js/script.js"></script>
</head>

<body id="subpage">
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
				<li><a href="toppage.php"><strong>トップページ</strong><span></span></a></li>
				<li><a href="self-help.php"><strong>「自助」とは？</strong><span></span></a></li>
				<li><a href="Learn.php"><strong>学ぶ</strong><span></span></a></li>
				<!--<li><a href="Mypage.php"><strong>マイページ</strong><span>Mypage</span></a></li>-->
				<li><a href="Simulationcp.php"><strong>シミュレーション</strong><span></span></a></li>
				<li class="active last"><a href="Questionnaire-Contact.php"><strong>アンケート/お問い合わせ</strong><span></span></a></li>
				<li><a href="logout.php"><strong>ログアウト</strong><span></span></a></li>
			</ul> 
    </div>
	</div> 
</nav>
<!-- / メインナビゲーション -->

<div class="pc_hide">
		<aside id="sidebar">
		   
			<h3 class="heading">目次</h3>
		<article>
				<ul>
                    <li><a href="#about">本サイトについて</a></li>
                    <li><a href="#contact">お問い合わせ</a></li>
					<li><a href="#questionnaire">アンケート</a></li>
					
				</ul>
		</article>
		
		</aside>
        </div>

<div id="wrapper">
  
  <!-- コンテンツ -->
  <section id="main">

    <section class="content">
		<h3 class="heading" id="about">本サイトについて</h3>
		<article>
			<p>本サイトでは家庭内備蓄品について、学習教材の閲覧やシミュレーションを通して学ぶことができます。家庭内備蓄品についての知識をつけていただき、みなさまの「自助」の準備に少しでも役立てていただければ幸いです。</p>
		</article>
	</section>
	
	
    <section class="content">
    	<h3 class="heading" id="contact">お問い合わせ</h3>
      <article>
			<p>お問い合わせは下記メールアドレスにお願いします。</p>
			<p>メールアドレス：sirayuu0419[at]gmail.com([at]を@に変えてください)</p>
		  </form>
		</article>
	</section>

    <section class="content">
		<h3 class="heading" id="questionnaire">アンケート</h3>
		<article>
			下記リンクより、アンケートにご協力お願いします。<br>
			<a href="https://forms.gle/ATnmZm3mD26PotKv8" target="_blank" rel="noopener noreferrer">アンケートページへ移動</a>
		</article>
	</section>

	</section>
	<!-- / コンテンツ -->

        <div class="mobile_hide">
		<aside id="sidebar">
		   
			<h3 class="heading">目次</h3>
		<article>
				<ul>
                    <li><a href="#about">本サイトについて</a></li>
                    <li><a href="#contact">お問い合わせ</a></li>
					<li><a href="#questionnaire">アンケート</a></li>
					
				</ul>
		</article>
		
		</aside>
        </div>
	
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
			<li><a href="#about">本サイトについて</a></li>
			<li><a href="#contact">お問い合わせ</a></li>
			<li><a href="logout.php">ログアウト</a></li>
		</ul>
		<!-- / 右側 ナビゲーション -->
	</div>
</footer>
	<!-- / フッター -->
	<address>Copyright(c) 2013 Sample Inc. All Rights Reserved. Design by <a href="http://f-tpl.com" target="_blank" rel="nofollow">http://f-tpl.com</a></address>

</body>
</html>