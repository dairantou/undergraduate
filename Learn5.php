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
				<li class="active"><a href="Learn.php"><strong>学ぶ</strong><span></span></a></li>
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
                <li><a href="Learn4.php#other">備蓄品の紹介:その他の生活用品</a></li>
			</ul>
		</article>
		
		</aside>
        </div>

		<section class="content">
            <h3 class="heading" id="eisei">備蓄品の紹介:その他の生活用品</h3>
		  <article>
			<p><b>手回し充電式などのラジオ</b><br><br><img src="images/radio.jpg"><br><br><b>主な販売場所</b><br>ホームセンター、インターネットなど<br><!--<b>目安の保存可能期間</b><br>3~18カ月ほど<br>--><b>説明</b><br>被災時に通信障害が発生してインターネットを用いた情報収集が出来ない場合でも、インターネットに接続する必要がないラジオは貴重な情報源として役に立ちます。また値段が高くなってしまいますが、懐中電灯機能や携帯電話充電機能がついた商品もあります。</p><br>
            <p><b>乾電池</b><br><br><img src="images/denti.jpg"><br><br><b>主な販売場所</b><br>コンビニ、ドラックストア、ホームセンター、インターネットなど<br><!--<b>目安の保存可能期間</b><br>2~3年間ほど<br>--><b>説明</b><br>携帯電話用充電器や懐中電灯など様々な用途で使用されるので多めに備蓄しておきましょう。また乾電池には使用期限があるため、すでに備蓄をしている人も電池本体などに記載されている使用期限を確認しておきましょう。</p><br>
			<p><b>軍手</b><br><br><img src="images/gunte.jpg"><br><br><b>主な販売場所</b><br>ドラックストア、ホームセンター、インターネットなど<br><!--<b>目安の保存可能期間</b><br>2~3年間ほど<br>--><b>説明</b><br>被災時にはガラス片や落下して破損した物の片付けなど素手のままでは危険な作業をしなければならない可能性があります。耐熱性や耐刃性にすぐれた軍手を選ぶとよいでしょう。</p><br>
            <p><b>ポリ袋</b><br><img src="images/pori.jpg"><br><b>主な販売場所</b><br>コンビニエンスストア、ドラックストア、コンビニ、ホームセンター、インターネットなど<br><!--<b>目安の保存可能期間</b><br>3ヶ月~1年間ほど<br>--><b>説明</b><br>ジッパー付きの袋は防臭性に優れているのでゴミが入った袋をさらにポリ袋にいれることで匂いの防止になります。またポリ袋は調理にも用いることが出来ます、フライパンや鍋を使わずにポリ袋に食材をいれて調理するレシピはインターネット上にたくさん公開されているので興味があれば調べてみてください。</p><br>
            <p><b>給水袋</b><br><br><img src="images/waterbag.jpg"><br><br><b>主な販売場所</b><br>ホームセンター、インターネットなど<br><!--<b>目安の保存可能期間</b><br>3~18カ月ほど<br>--><b>説明</b><br>断水時に給水車から水を運ぶのに重宝します。特にリュック型になっている給水袋は水を背負って運べるため、運搬の負担が減ってオススメです。</p><br>
            <br><br>
			
            <ul class="pageNav01">
                <li><a href="Learn4.php">&laquo; 前</a></li>
                <li><a href="Learn.php">1</a></li>
				<li><a href="Learn2.php">2</a></li>
                <li><a href="Learn3.php">3</a></li>
				<li><a href="Learn4.php">4</a></li>
                <li><span>5</span></li>
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
                <li><a href="Learn4.php#other">備蓄品の紹介:その他の生活用品</a></li>
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