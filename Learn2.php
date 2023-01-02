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
<title>防災学習支援サイト-学習2</title>
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
				<li><a href="Learn.php#atfirst">はじめに</a></li>
				<li><a href="Learn.php#insyoku">備蓄品の紹介:飲食物</a></li>
				<li><a href="Learn3.php#eisei">備蓄品の紹介:衛生用品</a></li>
                <li><a href="Learn4.php#other">備蓄品の紹介:その他の生活用品</a></li>
			</ul>
		</article>
		
		</aside>
        </div>

		<section class="content">
            <h3 class="heading" id="insyoku">備蓄品の紹介:飲食物</h3>
		  <article>
			<p><b>フリーズドライ食品</b><br><img src="images/freze.jpg"><br><b>主な販売場所</b><br>スーパー、ドラックストア、コンビニ、ホームセンター、インターネットなど<br><!--<b>目安の保存可能期間</b><br>1年間ほど <br>--><b>説明</b><br>少量のお湯で汁物やトンカツなどのおかずを作ることができます。特に汁物は食欲がないときでも食べやすいのでおすすめです。</p><br>
            <p><b>缶詰</b><br><img src="images/kan.jpg"><br><b>主な販売場所</b><br>スーパー、ドラックストア、コンビニ、ホームセンター、インターネットなど<br><!--<b>目安の保存可能期間</b><br>2~3年間ほど<br>--><b>説明</b><br>主菜系の缶詰は調理せずにおかずにでき、果物等の缶詰からはビタミンなどを摂取できます。また缶切りの用意も忘れないようにしましょう。</p><br>
            <p><b>乾麵・即席麺</b><br><img src="images/noodle.jpg"><br><b>主な販売場所</b><br>スーパー、ドラックストア、コンビニ、ホームセンター、インターネットなど<br><!--<b>目安の保存可能期間</b><br>3ヶ月~1年間ほど<br>--><b>説明</b><br>お湯さえあれば、温かい麵類が食べられます。特にカップ麺は容器をそのまま器として使えるので、洗い物が少なくすみ便利です。</p><br>
            <p><b>栄養補助食品</b><br><img src="images/eiyou.jpg"><br><b>主な販売場所</b><br>スーパー、ドラックストア、コンビニ、ホームセンター、インターネットなど<br><!--<b>目安の保存可能期間</b><br>3~18カ月ほど<br>--><b>説明</b><br>被災時の食事はインスタント食品などが多くなり栄養が偏りががちです。栄養補助食品は不足しがちな栄養素を調理の手間なく簡単に摂取できます。</p><br>
            <br><br>
			
            <ul class="pageNav01">
                <li><a href="Learn.php">&laquo; 前</a></li>
                <li><a href="Learn.php">1</a></li>
				<li><span>2</span></li>
                <li><a href="Learn3.php">3</a></li>
                <li><a href="Learn4.php">4</a></li>
				<li><a href="Learn5.php">5</a></li>
                <li><a href="Learn3.php">次 &raquo;</a></li>
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
				<li><a style="color:#f2a64b;font-weight: bold;" href="https://forms.gle/yHkhbVW8QXhectiG6" target="_blank" rel="noopener noreferrer">アンケートページへ移動(Google フォーム)</a></li>
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
	<address>Copyright(c) 2021 山本佳世子研究室 All Rights Reserved. Design by <a href="http://f-tpl.com" target="_blank" rel="nofollow">http://f-tpl.com</a></address>

</body>
</html>