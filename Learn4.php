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
<title>防災学習支援サイト-学習4</title>
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
				<li class="active"><a href="Learn.php"><strong>家庭内備蓄品の紹介</strong><span></span></a></li>
				<!--<li><a href="Mypage.php"><strong>マイページ</strong><span>Mypage</span></a></li>-->
				<li><a href="Simulationcp.php"><strong>シミュレーション</strong><span></span></a></li>
				<li class="last"><a href="Questionnaire-Contact.php"><strong>アンケート/お問い合わせ</strong><span></span></a></li>
				<li><a href="logout.php"><strong>ログアウト</strong><span></span></a></li>
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
			<img src="images/mainimg2.jpg" width="680" height="140" alt="">
    	<div class="slogan">
				<div class="mobile_hide">
				<h2>家庭内備蓄品にはどんなものがあるの？</h2>
				<p>被災時に自宅避難で必要となる家庭内備蓄品について学んでいきます。</p>
				</div>

				<div class="pc_hide">
				<div id="learn-slogan">
				<h2>家庭内備蓄品にはどんなものがあるの？</h2>
				<p>被災時に自宅避難で必要となる家庭内備蓄品について<br>学んでいきます。</p>
				</div>
				</div>
		</div>
	</div>
		<!-- / メイン画像 -->

        <div class="pc_hide">
		<aside id="sidebar">
		   
			<h3 class="heading">目次</h3>
		<article>
            <ul>
				<li><a href="Learn.php#atfirst">はじめに</a></li>
				<li><a href="Learn.php#insyoku">備蓄品の紹介:飲食物</a></li>
				<li><a href="Learn3.php#eisei">備蓄品の紹介:衛生用品</a></li>
                <li><a href="#other">備蓄品の紹介:その他の生活用品</a></li>
			</ul>
		</article>
		
		</aside>
        </div>

		<section class="content">
            <h3 class="heading" id="eisei">備蓄品の紹介:衛生用品</h3>
		  <article>
			<p><b>トイレットペーパー</b><br><img src="images/toipe.jpg"><br><b>主な販売場所</b><br>ドラックストア、ホームセンター、インターネットなど<br><!--<b>目安の保存可能期間</b><br>1年間ほど <br>--><b>説明</b><br>簡易トイレを使用する時だけでなく、ティッシュペーパーと同様に水が使えない場面で汚れたお皿を拭くのに用いるなど様々な用途で使うことができます。トイレットペーパーもほとんどの家庭にあると思いますが、災害に備えて多めに備蓄しておきましょう。</p><br>
            <p><b>救急箱</b><br><br><img src="images/box.jpg"><br><br><b>主な販売場所</b><br>ドラックストア、ホームセンター、インターネットなど<br><!--<b>目安の保存可能期間</b><br>3~18カ月ほど<br>--><b>説明</b><br>被災時に怪我をした場合に備え、ばんそうこうやガーゼ、包帯、消毒液、ピンセットといった応急手当用品の入った救急箱を用意しておきましょう。</p>
			
          </article>

		  <h3 class="heading" id="other">備蓄品の紹介:その他の生活用品</h3>
		  <article>
			<p><b>カセットコンロ・カセットボンベ</b><br><img src="images/konro.jpg"><img src="images/bonbe.jpg"><br><br><b>主な販売場所</b><br>ホームセンター、インターネットなど<br><!--<b>目安の保存可能期間</b><br>1年間ほど <br>--><b>説明</b><br>カセットコンロがあれば電気やガスが止まっている場合でも火を用いた調理やお湯を沸かすことができます。燃料であるカセットボンベも忘れずにセットで備蓄しておきましょう。またカセットボンベには約6~7年の使用期限があるのですでにカセットボンベを備蓄している人も使用期限をしておきましょう。</p><br>
            <p><b>携帯電話用充電器</b><br><br><img src="images/charge.jpg"><br><br><b>主な販売場所</b><br>コンビニエンスストア、ホームセンター、インターネットなど<br><!--<b>目安の保存可能期間</b><br>2~3年間ほど<br>--><b>説明</b><br>携帯電話を充電出来ずに使用不可能になってしまうと、家族との連絡や情報取集に支障が出るおそれがあります。また携帯電話充電器の中でも乾電池を用いて充電出来るタイプの商品は乾電池さえ用意してあれば回数を気にせず充電できるのでオススメです。</p><br>
            <p><b>懐中電灯</b><br><br><img src="images/light.jpg"><br><br><b>主な販売場所</b><br>ホームセンター、インターネットなど<br><!--<b>目安の保存可能期間</b><br>1年間ほど <br>--><b>説明</b><br>夜に地震が発生し停電になってしまった時に、ガラス片や落下して破損した物が床に散乱している可能性があるなかで懐中電灯を用いずに暗闇のまま歩き回るのは大変危険です。また懐中電灯にはアルコールランプやロウソクと違って誤って倒しても火災が発生する危険性がないという利点もあります。</p><br>
            <br><br>
			
            <ul class="pageNav01">
                <li><a href="Learn3.php">&laquo; 前</a></li>
                <li><a href="Learn.php">1</a></li>
				<li><a href="Learn2.php">2</a></li>
                <li><a href="Learn3.php">3</a></li>
				<li><span>4</span></li>
				<li><a href="Learn5.php">5</a></li>
                <li><a href="Learn5.php">次 &raquo;</a></li>
                </ul>
          </article>
		</section>
		</section>
		<!-- / コンテンツ -->

        <div class="mobile_hide">
		<aside id="sidebar">
		   
			<h3 class="heading">目次</h3>
		<article>
            <ul>
				<li><a href="Learn.php#atfirst">はじめに</a></li>
				<li><a href="Learn.php#insyoku">備蓄品の紹介:飲食物</a></li>
				<li><a href="Learn3.php#eisei">備蓄品の紹介:衛生用品</a></li>
                <li><a href="#other">備蓄品の紹介:その他の生活用品</a></li>
			</ul>
		</article>
		
		<h3 class="heading">アンケートのお願い</h3>
		<article>
			<ul>
				<li>本システムの利用後、アンケート評価にご協力お願いいたします。(一度のみ回答お願いします。)</li>
				<li><a style="color:#f2a64b;font-weight: bold;" href="https://forms.gle/ATnmZm3mD26PotKv8" target="_blank" rel="noopener noreferrer">アンケートページへ(Google フォーム)</a></li>
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
	<address>Copyright(c) 2021 家庭内備蓄品について学ぼう All Rights Reserved. Design by <a href="http://f-tpl.com" target="_blank" rel="nofollow">http://f-tpl.com</a></address>

</body>
</html>