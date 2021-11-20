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
	<div class="logo_name">
	<?php
	echo '<span>ようこそ' .  h($_SESSION['NAME']) . "さん</span>";
	?>
	</div>
	<br><br>
	<div class="logo_logout">
	<a href='logout.php'>ログアウトはこちら</a>
	</div>
	<!-- / ロゴ -->
</header>

<!-- メインナビゲーション -->
<nav id="mainNav">
	<div class="inner">
  	<a class="menu" id="menu"><span>MENU</span></a>
		<div class="panel">   
			<ul>
				<li><a href="toppage.php"><strong>トップページ</strong><span>Top</span></a></li>
				<li class="active"><a href="self-help.php"><strong>「自助」とは？</strong><span>What's self-help</span></a></li>
				<li><a href="Learn.php"><strong>学ぶ</strong><span>Learn</span></a></li>
				<li><a href="Mypage.php"><strong>マイページ</strong><span>Mypage</span></a></li>
				<li><a href="Simulationcp.php"><strong>シミュレーション</strong><span>Simulationcp</span></a></li>
				<li class="last"><a href="Questionnaire-Contact.php"><strong>アンケート/お問い合わせ</strong><span>Questionnaire/Contact</span></a></li>
				</ul> 
    </div>
	</div> 
</nav>
<!-- / メインナビゲーション -->

<div id="wrapper">
  
  <!-- コンテンツ -->
	<section id="main">
  
  	<!-- メイン画像 -->
		<div id="mainBanner">
			<img src="images/mainImg2.jpg" width="680" height="140" alt="">
    	<div class="slogan">
				<h2>「自助」ってなんだ？</h2>
				<p>災害の被害を小さくするために大切な「自助」という考え方とは?<br>「自助」と家庭内備蓄品の関連性を学んでいきます。</p>
			</div>
		</div>
		<!-- / メイン画像 -->

        <div class="pc_hide">
		<aside id="sidebar">
		   
			<h3 class="heading">目次</h3>
		<article>
				<ul>
					<li><a href="#self-help">「自助」とは？</a></li>
					<li><a href="#self-help&bitiku">「自助」と家庭内備蓄品</a></li>
				</ul>
		</article>        
		</aside>
        </div>

		<section class="content">
			<h3 class="heading" id="self-help">「自助」とは?</h3>
		  <article>
			<p><img src="images/self-help.jpg"><br>わが国では地震が多発しており、首都直下型地震や南海トラフ巨大地震の発生も危惧されています。大地震が発生したときには、電気・ガス・水道・通信といったライフラインが停止してしまい日常生活に大きな混乱や支障が生じる可能性があります。			
				一方、防災白書(2012)＊1によると、防災対策には、地域住民が自らを災害から守る<b>「自助」</b>、地域社会が互いを助け合う「共助」、国や自治体等の行政による施策の「公助」があり、最も基本となるのは個人による対策の<b>「自助」</b>であるとされています。
				すなわち、災害時には消防隊等の救助の手は全被災者に届くわけでなく、減災対策で被害を最小限に抑えるためには、一人一人が日常生活において防災意識を高く持つことが必要となります。 
				したがって、以上のライフラインが復旧するまでの間、国や地方自治体などによる支援物資の提供などの公的支援「公助」が期待されますが、道路等ががれきで塞がれるなどの理由により
				流通が機能せず、「公助」が遅れてしまう恐れがあります。よって、<b>震災による被害をできるだけ少なくするためには、「公助」が来るまでの間、一人一人が自らの命を自らで守る「自助」が重要</b>とされています。</p>
				<hr>
				＊1 ：防災白書(2012)　内閣府(2012)「平成24年度版防災白書」,p230<br>
			</article>
	
			<h3 class="heading" id="self-help&bitiku">「自助」と家庭内備蓄品</h3>
		  <article>
			<p><b>「自助」</b>に取り組むための行動の1つに家庭内に震災時に役立つ備蓄品を確保しておくというものがあります。「公助」が来るまでは、その時家庭内にあるものだけで生活しなければならないため、<b>日常から被災時に役立つ家庭内備蓄品を確保しておくことが重要</b>です。よって震災が多い日本に住む私たちが、家庭内備蓄品について学ぶことの意義は大きいと考えられます。<br><br>本サイトでは家庭内備蓄品について学ぶことができます。家庭内備蓄品について学んでいただき、みなさまの<b>「自助」</b>の準備に少しでも役立てていただければ幸いです。</p>
			</article>
		</section>
		</section>
		<!-- / コンテンツ -->

        <div class="mobile_hide">
		<aside id="sidebar">
		   
			<h3 class="heading">目次</h3>
		<article>
				<ul>
					<li><a href="#self-help">「自助」とは？</a></li>
					<li><a href="#self-help&bitiku">「自助」と家庭内備蓄品</a></li>
				</ul>
		</article>
		
        
		<h3 class="heading">アンケートのお願い</h3>
		<article>
			<ul>
				<li>本システムの利用後、アンケート評価にご協力お願いいたします。(一度のみ回答お願いします。)</li>
				<li><a href="https:" target="_blank" rel="noopener noreferrer">アンケートページへ(回答時間2分半)</a></li>
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
			<li><a href="Questionnaire-Contact.php#about">本サイトについて</a></li>
			<li><a href="Questionnaire-Contact.php#contact">お問い合わせ</a></li>
			<li><a href="logout.php">ログアウト</a></li>
		</ul>
		<!-- / 右側 ナビゲーション -->
	</div>
</footer>
	<!-- / フッター -->
	<address>Copyright(c) 2013 Sample Inc. All Rights Reserved. Design by <a href="http://f-tpl.com" target="_blank" rel="nofollow">http://f-tpl.com</a></address>

</body>
</html>