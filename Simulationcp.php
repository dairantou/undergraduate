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

//function h($s){
//  return htmlspecialchars($s, ENT_QUOTES, 'utf-8');
//}

if(!isset($_SESSION)){
session_start();
}

// SELECT文を変数に格納
//php内のsqlで変数を使うときは..でつなぐ。例　"SELECT * FROM テーブル名 WHERE  カラム名 = '".変数名."'";
//$sql = "SELECT * FROM UserDeta WHERE  email = '".h($_SESSION['EMAIL'])."'";
$sql = "SELECT * FROM UserDeta WHERE  email = '".$_SESSION['EMAIL']."'";
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
<title>防災学習支援サイト-シミュレーション</title>
<meta name="keywords" content="">
<meta name="description" content="">
<link rel="stylesheet" href="style.css?v=1.0" type="text/css" media="screen">
<!--[if lt IE 9]>
<script src="js/html5.js"></script>
<script src="js/css3-mediaqueries.js"></script>
<![endif]-->
<script src="js/jquery1.7.2.min.js"></script>
<script src="js/script.js"></script>
<script src="simjs.js"></script>
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
	//echo '<span>ようこそ<br>' . $_SESSION['NAME'] . "さん</span>";
	?>-->
	</div>
	<!--<br><br>
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
				<li><a href="Learn.php"><strong>家庭内備蓄品の紹介</strong><span></span></a></li>
				<!--<li><a href="Mypage.php"><strong>マイページ</strong><span>Mypage</span></a></li>-->
				<li class="active"><a href="Simulationcp.php"><strong>シミュレーション</strong><span></span></a></li>
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
			<img src="images/mainimg3.jpg" width="680" height="140" alt="">
    	<div class="slogan">
				<div class="mobile_hide">
				<h2>自宅避難時生活シミュレーション</h2>
				<p>あなたの家庭の備蓄状況で、自宅避難時にどのような生活を送れるかを調べましょう。</p>
				</div>

				<div class="pc_hide">
				<div id="learn-slogan">
				<h2>自宅避難時生活シミュレーション</h2>
				<p>あなたの家庭の備蓄状況で、自宅避難時に<br>どのような生活を送れるかを調べましょう。</p>
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
				<li><a href="#scenario">備蓄状況の入力</a></li>
				<li><a href="#result">採点結果</a></li>
				<li><a href="#result">フィードバックコメント</a></li>
			</ul>
	</article>
	</div>
    
    <section class="content">
    	<h3 class="heading" id="scenario">備蓄状況の入力</h3>
      <article>
			
			<p><br>家族構成、家庭内備蓄品の備蓄状況を入力することで、自身の備蓄状況について採点結果とフィードバックを得ることができます。<br><br>以下の17問の質問に答えて、自身の備蓄状況で自宅避難時に問題なく生活できるかどうかシミュレーションしてみましょう。<br><br>"入力を保存をする"というボタンを押すと、入力状況が保存されるため次回以降は変更箇所のみの入力で済みます。</p><br>

			<form action="Simulationcp-Register.php" method="post">
			<dt>Q1.現在何人で暮らしていますか？</dt>
			<dd>
			<?php
			echo "<input type='tel' id='q1' name='ans1' maxlength='4' style='text-align:right;width:50px;' value=".$row['ans1']."><label for='q1'>[人]</label><br>"
			?>
			<br>
			</dd>

            <dt>Q2.飲料水を何L備蓄していますか？備蓄していない場合は0と入力してください。</dt>
			<dd>
			<?php
			echo "<input type='tel' id='q2' name='ans2' maxlength='4' style='text-align:right;width:50px;' value=".$row['ans2']."><label for='q2'>[L]</label><br>"
			?>
			<br>
			</dd>
			

            <dt>Q3.非常食を何食分備蓄していますか？備蓄していない場合は0と入力してください。</dt>
			<dd>
			<?php
			echo "<input type='tel' id='q3' name='ans3' maxlength='4' style='text-align:right;width:50px;' value=".$row['ans3']."><label for='q3'>[食分]</label><br>"
			?>
			<br>
			</dd>

			<dt>Q4.ウェットボディタオルを何回分備蓄していますか？備蓄していない場合は0と入力してください。</dt>
			<dd>
			<?php
			echo "<input type='tel' id='q4' name='ans4' maxlength='4' style='text-align:right;width:50px;' value=".$row['ans4']."><label for='q4'>[回分]</label><br>"
			?>
			<br>
			</dd>

            <dt>Q5.歯磨き用ウェットティッシュを何回分備蓄していますか？備蓄していない場合は0と入力してください。</dt>
			<dd>
			<?php
			echo "<input type='tel' id='q5' name='ans5' maxlength='4' style='text-align:right;width:50px;' value=".$row['ans5']."><label for='q5'>[回分]</label><br>"
			?>
			<br>
			</dd>

            <dt>Q6.簡易トイレを何回分備蓄していますか？備蓄していない場合は0と入力してください。</dt>
			<dd>
			<?php
			echo "<input type='tel' id='q6' name='ans6' maxlength='4' style='text-align:right;width:50px;' value=".$row['ans6']."><label for='q6'>[回分]</label><br>"
			?>
			<br>
			</dd>

					<dt>Q7.トイレットペーパーを備蓄していますか？</dt>
					<dd>
					  <?php
					  if($row['ans7']==1){
						echo "<label><input type='radio' name='q7' value='1' checked>はい</label>
						<label><input type='radio' name='q7' value='0'>いいえ</label><br>";
					  }else{
						echo "<label><input type='radio' name='q7' value='1'>はい</label>
						<label><input type='radio' name='q7' value='0' checked>いいえ</label><br>";
					  }
					  ?>
					  
					</dd>
					<br>
                    <dt>Q8.ティッシュペーパーを備蓄していますか？</dt>
					<dd>
					<?php
					  if($row['ans8']==1){
						echo "<label><input type='radio' name='q8' value='1' checked>はい</label>
						<label><input type='radio' name='q8' value='0'>いいえ</label><br>";
					  }else{
						echo "<label><input type='radio' name='q8' value='1'>はい</label>
						<label><input type='radio' name='q8' value='0' checked>いいえ</label><br>";
					  }
					  ?>
					</dd>
					<br>
                    <dt>Q9.救急箱を備蓄していますか？</dt>
					<dd>
					<?php
					  if($row['ans9']==1){
						echo "<label><input type='radio' name='q9' value='1' checked>はい</label>
						<label><input type='radio' name='q9' value='0'>いいえ</label><br>";
					  }else{
						echo "<label><input type='radio' name='q9' value='1'>はい</label>
						<label><input type='radio' name='q9' value='0' checked>いいえ</label><br>";
					  }
					  ?>
					</dd>
					<br>
                    <dt>Q10.カセットコンロ・カセットボンベをセットで備蓄していますか？</dt>
					<dd>
					<?php
					  if($row['ans10']==1){
						echo "<label><input type='radio' name='q10' value='1' checked>はい</label>
						<label><input type='radio' name='q10' value='0'>いいえ</label><br>";
					  }else{
						echo "<label><input type='radio' name='q10' value='1'>はい</label>
						<label><input type='radio' name='q10' value='0' checked>いいえ</label><br>";
					  }
					  ?>
					</dd>
					<br>
                    <dt>Q11.携帯電話用充電器を備蓄していますか？</dt>
					<dd>
					<?php
					  if($row['ans11']==1){
						echo "<label><input type='radio' name='q11' value='1' checked>はい</label>
						<label><input type='radio' name='q11' value='0'>いいえ</label><br>";
					  }else{
						echo "<label><input type='radio' name='q11' value='1'>はい</label>
						<label><input type='radio' name='q11' value='0' checked>いいえ</label><br>";
					  }
					  ?>
					</dd>
					<br>
                    <dt>Q12.懐中電灯を備蓄していますか？</dt>
					<dd>
					<?php
					  if($row['ans12']==1){
						echo "<label><input type='radio' name='q12' value='1' checked>はい</label>
						<label><input type='radio' name='q12' value='0'>いいえ</label><br>";
					  }else{
						echo "<label><input type='radio' name='q12' value='1'>はい</label>
						<label><input type='radio' name='q12' value='0' checked>いいえ</label><br>";
					  }
					  ?>
					</dd>
					<br>
                    <dt>Q13.手回し充電式などのラジオを備蓄していますか？</dt>
					<dd>
					<?php
					  if($row['ans13']==1){
						echo "<label><input type='radio' name='q13' value='1' checked>はい</label>
						<label><input type='radio' name='q13' value='0'>いいえ</label><br>";
					  }else{
						echo "<label><input type='radio' name='q13' value='1'>はい</label>
						<label><input type='radio' name='q13' value='0' checked>いいえ</label><br>";
					  }
					  ?>
					</dd>
					<br>
                    <dt>Q14.乾電池を備蓄していますか？</dt>
					<dd>
					<?php
					  if($row['ans14']==1){
						echo "<label><input type='radio' name='q14' value='1' checked>はい</label>
						<label><input type='radio' name='q14' value='0'>いいえ</label><br>";
					  }else{
						echo "<label><input type='radio' name='q14' value='1'>はい</label>
						<label><input type='radio' name='q14' value='0' checked>いいえ</label><br>";
					  }
					  ?>
					</dd>
					<br>
                    <dt>Q15.軍手を備蓄していますか？</dt>
					<dd>
					<?php
					  if($row['ans15']==1){
						echo "<label><input type='radio' name='q15' value='1' checked>はい</label>
						<label><input type='radio' name='q15' value='0'>いいえ</label><br>";
					  }else{
						echo "<label><input type='radio' name='q15' value='1'>はい</label>
						<label><input type='radio' name='q15' value='0' checked>いいえ</label><br>";
					  }
					  ?>
					</dd>
					<br>
                    <dt>Q16.ポリ袋を備蓄していますか？</dt>
					<dd>
					<?php
					  if($row['ans16']==1){
						echo "<label><input type='radio' name='q16' value='1' checked>はい</label>
						<label><input type='radio' name='q16' value='0'>いいえ</label><br>";
					  }else{
						echo "<label><input type='radio' name='q16' value='1'>はい</label>
						<label><input type='radio' name='q16' value='0' checked>いいえ</label><br>";
					  }
					  ?>
					</dd>
					<br>
                    <dt>Q17.給水袋を備蓄していますか？</dt>
					<dd>
					<?php
					  if($row['ans17']==1){
						echo "<label><input type='radio' name='q17' value='1' checked>はい</label>
						<label><input type='radio' name='q17' value='0'>いいえ</label><br>";
					  }else{
						echo "<label><input type='radio' name='q17' value='1'>はい</label>
						<label><input type='radio' name='q17' value='0' checked>いいえ</label><br>";
					  }
					  ?>
					</dd>
					<br>
                
					
				  </dl>  
				  <br>

				</dl>  
				<br>
				<button type="submit">入力した値を保存する</button><br><br>
				</form>
				<a href="#result"><input type="button" value="結果を表示する" onclick="saiten('q1','q2','q3','q4','q5','q6','q7','q8','q9','q10','q11','q12','q13','q14','q15','q16','q17');"/></a>
					</article>

			    <h3 class="heading" id="result">採点結果</h3>
		  		<article>
				<p><div id="score"></div></p>
				</article>

				<h3 class="heading">フィードバックコメント</h3>
		  		<article>
				<p><div id="div2"></div></p>
				<p><div id="div3"></div></p>
				<p><div id="div4"></div></p>
				<p><div id="div5"></div></p>
				<p><div id="div6"></div></p>
				<p><div id="div7"></div></p>
				<p><div id="div8"></div></p>
				<p><div id="div9"></div></p>
				<p><div id="div10"></div></p>
				<p><div id="div11"></div></p>
				<p><div id="div12"></div></p>
				<p><div id="div13"></div></p>
				<p><div id="div14"></div></p>
				<p><div id="div15"></div></p>
				<p><div id="div16"></div></p>
				<p><div id="div17"></div></p>
				</article>		

		</article>
	</section>
	</section>
	<!-- / コンテンツ -->
	
	<div class="mobile_hide">
	<aside id="sidebar">
       
		<h3 class="heading">目次</h3>
    <article>
			<ul>
				<li><a href="#scenario">備蓄状況の入力</a></li>
				<li><a href="#result">採点結果</a></li>
				<li><a href="#result">フィードバックコメント</a></li>
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