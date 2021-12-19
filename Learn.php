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
<title>防災学習支援サイト-学習1</title>
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
				<li class="last"><a href="Questionnaire-Contact.php"><strong>アンケート</strong><span></span></a></li>
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
			<img src="images/mainimg2.jpg?v=1.0" width="680" height="140" alt="">
    	<div class="slogan">
				<div class="mobile_hide">
				<h2>家庭内備蓄品の紹介</h2>
				<p>被災時に自宅避難で必要となる家庭内備蓄品を紹介します。</p>
				</div>

				<div class="pc_hide">
				<div id="learn-slogan">
				<h2>家庭内備蓄品の紹介</h2>
				<p>被災時に自宅避難で必要となる家庭内備蓄品を<br>紹介します。</p>
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
				<li><a href="#atfirst">はじめに</a></li>
				<li><a href="#insyoku">備蓄品の紹介:飲食物</a></li>
				<li><a href="Learn3.php#eisei">備蓄品の紹介:衛生用品</a></li>
                <li><a href="Learn4.php#other">備蓄品の紹介:その他の生活用品</a></li>
			</ul>
		</article>
		
		</aside>
        </div>

		<section class="content">
			<h3 class="heading" id="atfirst">はじめに</h3>
		  <article>
			<p><a href="self-help.php#self-help&bitiku"><b>「自助」とは？</b></a>のページでは日常から被災時に役立つ家庭内備蓄品を確保しておくことの重要性を学習しました。このページでは、具体的にどのような家庭内備蓄品が必要なのかを飲食物・衛生用品・その他の生活用品の3つのジャンルに分けて説明していきます。大規模災害発生時にむけて、これらの家庭内備蓄品を<b>1週間分</b>確保することが望ましいとされていることも覚えておいてください。</p>
            </article>

            <h3 class="heading" id="insyoku">備蓄品の紹介:飲食物</h3>
		  <article>
			<p><b>飲料水</b><br><img src="images/water.jpg"><br><b>主な販売場所</b><br>スーパー、ドラックストア、コンビニ、ホームセンター、インターネットなど<br><!--<b>目安の保存可能期間</b><br>2Lペットボトルで2,3年が目安。また、主にインターネットで購入できる長期保存に適した保存水は普通の飲料水より値段が高いですが、5~15年ほど保存できます。 <br>--><b>説明</b><br>人間が生命維持に必要な水分量は年齢や体重、生活活動レベルによって異なりますが1人1日3Lが目安量です。ペットがいる家庭は追加でペットの分の飲料水も確保しておきましょう。</p><br>
            <p><b>レトルトご飯</b><br><img src="images/rice.jpg"><br><b>主な販売場所</b><br>スーパー、ドラックストア、コンビニ、ホームセンター、インターネットなど<br><!--<b>目安の保存可能期間</b><br>6カ月~1年間ほど<br>--><b>説明</b><br>レトルトご飯は電子レンジで調理されることが多いですが、実は湯煎でも調理できるので停電時でも暖かいご飯を食べることができます。</p><br>
            <p><b>レトルト食品</b><br><img src="images/retoruto.jpg"><br><b>主な販売場所</b><br>スーパー、ドラックストア、コンビニ、ホームセンター、インターネットなど<br><!--<b>目安の保存可能期間</b><br>3~18カ月間ほど<br>--><b>説明</b><br>湯煎をするだけで食べられます。種類によって保存可能期間がかなり変わるので、個々の商品に記載された賞味期限をきちんと確認するようにしましょう。</p><br>
            
            <br><br>
			
            <ul class="pageNav01">
                <li><span>1</span></li>
                <li><a href="Learn2.php">2</a></li>
                <li><a href="Learn3.php">3</a></li>
                <li><a href="Learn4.php">4</a></li>
				<li><a href="Learn5.php">5</a></li>
                <li><a href="Learn2.php">次 &raquo;</a></li>
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
				<li><a href="#atfirst">はじめに</a></li>
				<li><a href="#insyoku">備蓄品の紹介:飲食物</a></li>
				<li><a href="Learn3.php#eisei">備蓄品の紹介:衛生用品</a></li>
                <li><a href="Learn4.php#other">備蓄品の紹介:その他の生活用品</a></li>
			</ul>
		</article>
		
		<h3 class="heading">アンケートのお願い</h3>
		<article>
			<ul>
				<li>本システムの利用後、アンケート評価にご協力お願いいたします。(一度のみ回答お願いします。)</li>
				<li><a style="color:#f2a64b;font-weight: bold;" href="https://forms.gle/ATnmZm3mD26PotKv8" target="_blank" rel="noopener noreferrer">アンケートページへ移動(Google フォーム)</a></li>
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