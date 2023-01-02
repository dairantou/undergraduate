const onlyNumbers = n => {
    return n.replace(/[０-９]/g,s => String.fromCharCode(s.charCodeAt(0) - 65248)).replace(/\D/g,'');
}

function check(name1,name2,name3,name4,name5,name6){
	
	if(document.getElementById(name1).value ==""){
		alert('Q1が未入力です');
		return false;
	}

	if(document.getElementById(name2).value ==""){
		alert('Q2が未入力です');
		return false;
	}

	if(document.getElementById(name3).value ==""){
		alert('Q3が未入力です');
		return false;
	}

	if(document.getElementById(name4).value ==""){
		alert('Q4が未入力です');
		return false;
	}

	if(document.getElementById(name5).value ==""){
		alert('Q5が未入力です');
		return false;
	}

	if(document.getElementById(name6).value ==""){
		alert('Q6が未入力です');
		return false;
	}
	return true;
}


function saiten(name1,name2,name3,name4,name5,name6,name7,name8,name9,name10,name11,name12,name13,name14,name15,name16,name17){

	var score=100;
	if(!check(name1,name2,name3,name4,name5,name6)){

		/*入力されていない項目があった時、採点結果とフィードバックコメントを削除*/ 
		var doc= document.getElementById("score");  
		doc.innerHTML= "";

		for(var i=2;i<18;i++){
		var div="div"+i;
			doc= document.getElementById(div);  
			doc.innerHTML= "";
		}
		

		return;
	}


	var radios1=parseFloat(document.getElementById(name1).value);
	var radios2=parseFloat(document.getElementById(name2).value);
	var radios3=parseFloat(document.getElementById(name3).value);
	var radios4=parseFloat(document.getElementById(name4).value);
	var radios5=parseFloat(document.getElementById(name5).value);
	var radios6=parseFloat(document.getElementById(name6).value);

	//var a=document.search_form.q.value;
  //if(a=="")
	//if(radios1==0||radios1==""){
	if(radios1==0){
		alert('Q1には1以上の数値を入力してください');
		/*点数とコメント削除*/ 
		var doc= document.getElementById("score");  
		doc.innerHTML= "";

		for(var i=2;i<18;i++){
		var div="div"+i;
			doc= document.getElementById(div);  
			doc.innerHTML= "";
		}
		return;
	}

	//飲料水
	var need=radios1*21;
	var more=need-radios2;
	var day=parseInt(radios2/(radios1*3));

	if(radios2<need){
	var lostscore=7-day;
	score-=lostscore;
	var doc= document.getElementById("div2");  
	doc.innerHTML= "<br><b>飲料水（-"+lostscore+"点）</b><br>「飲料水の備蓄が約"+day+"日分（1人1日3Lの消費を仮定）しかないため、断水が続くとに水分補給やお湯を用いる非常食の調理が出来なくなるおそれがあります。あと"+more+"Lあれば推奨される1週間分の備蓄量を確保できます。」";
	}else{
	var doc= document.getElementById("div2");  
	doc.innerHTML= "";	
	}

	//非常食
	var need=radios1*21;
	var more=need-radios3;
	var day=parseInt(radios3/(radios1*3));

	if(radios3<need){
	var lostscore=7-day;
	score-=lostscore;
	var doc= document.getElementById("div3");  
	doc.innerHTML= "<br><b>非常食（-"+lostscore+"点）</b><br>「非常食の備蓄が約"+day+"日分（1人1日3食分の消費を仮定）しかないため、物流の機能停止などで新たに食料を入手できない場合に満足な食事が出来ず栄養失調になってしまうおそれがあります。あと"+more+"食分あれば推奨される1週間分の備蓄量を確保できます。」";
	}else{
	var doc= document.getElementById("div3");  
	doc.innerHTML= "";	
	}

	//ウェットボディタオル
	var need=radios1*7;
	var more=need-radios4;
	var day=parseInt(radios4/radios1);

	if(radios4<need){
	var lostscore=7-day;
	score-=lostscore;
	var doc= document.getElementById("div4");  
	doc.innerHTML= "<br><b>ウェットボディタオル（-"+lostscore+"点）</b><br>「ウェットボディタオルの備蓄が約"+day+"日分（1人1日1回分の消費を仮定）しかないため、ウェットボディタオルを使いきったときにガスの停止や断水が続いていると、体を拭いて清潔に保つことができなくなるおそれがあります。あと"+more+"回分あれば推奨される1週間分の備蓄量を確保できます。」";
	}else{
	var doc= document.getElementById("div4");  
	doc.innerHTML= "";	
	}

	//歯磨き用ウェットティッシュ
	var need=radios1*14;
	var more=need-radios5;
	var day=parseInt(radios5/(radios1*2));

	if(radios5<need){
	var lostscore=7-day;
	score-=lostscore;
	var doc= document.getElementById("div5");  
	doc.innerHTML= "<br><b>歯磨き用ウェットティッシュ（-"+lostscore+"点）</b><br>「歯磨き用ウェットティッシュの備蓄が約"+day+"日分（1人1日2回分の消費を仮定）しかないため、歯磨き用ウェットティッシュを使いきったときに断水が続いていると、歯を清潔に保つことができなくなるおそれがあります。あと"+more+"回分あれば推奨される1週間分の備蓄量を確保できます。」";
	}else{
	var doc= document.getElementById("div5");  
	doc.innerHTML= "";	
	}

	//簡易トイレ
	var need=radios1*35;
	var more=need-radios6;
	var day=parseInt(radios6/(radios1*5));

	if(radios6<need){
	var lostscore=7-day;
	score-=lostscore;
	var doc= document.getElementById("div6");  
	doc.innerHTML= "<br><b>簡易トイレ（-"+lostscore+"点）</b><br>「簡易トイレの備蓄が約"+day+"日分（1人1日5回分の消費を仮定）しかないため、簡易トイレを使いきったときに断水などで水洗トイレが使えない情況が続いていると、家庭内でトイレをするのを我慢しなければならなくなるおそれがあります。あと"+more+"回分あれば推奨される1週間分の備蓄量を確保できます。」";
	}else{
	var doc= document.getElementById("div6");  
	doc.innerHTML= "";	
	}

	//トイレットペーパー
	var radios7 = document.getElementsByName(name7);
	for(var i=0; i<radios7.length; i++){
		if (radios7[i].checked) {
		  //選択されたラジオボタンのvalue値を取得する
		  var flag=radios7[i].value;
		  break;
		}
	  }
	if(flag==0){
	score-=6;
	var doc= document.getElementById("div7");  
	doc.innerHTML= "<br><b>トイレットペーパー（-6点）</b><br>「トイレットペーパーが備蓄されていないため、トイレの使用時などふき取る作業に支障がでるおそれがあります。」";	
	}else{
	var doc= document.getElementById("div7");  
	doc.innerHTML= "";	
	}

	//ティッシュペーパー
	var radios8 = document.getElementsByName(name8);
	for(var i=0; i<radios8.length; i++){
		if (radios8[i].checked) {
		  //選択されたラジオボタンのvalue値を取得する
		  var flag=radios8[i].value;
		  break;
		}
	  }
	if(flag==0){
	score-=6;
	var doc= document.getElementById("div8");  
	doc.innerHTML= "<br><b>ティッシュペーパー（-6点）</b><br>「ティッシュペーパーが備蓄されていないため、断水で水が使えない場面で汚れたお皿を拭くなどのふき取る作業ができなくなってしまうというおそれがあります。」";	
	}else{
	var doc= document.getElementById("div8");  
	doc.innerHTML= "";	
	}

	//救急箱
	var radios9 = document.getElementsByName(name9);
	for(var i=0; i<radios9.length; i++){
		if (radios9[i].checked) {
		  //選択されたラジオボタンのvalue値を取得する
		  var flag=radios9[i].value;
		  break;
		}
	  }
	if(flag==0){
	score-=6;
	var doc= document.getElementById("div9");  
	doc.innerHTML= "<br><b>救急箱（-6点）</b><br>「救急箱が備蓄されていないため、被災時に怪我をしたときに家庭で応急手当ができなくなってしまうおそれがあります。」";	
	}else{
	var doc= document.getElementById("div9");  
	doc.innerHTML= "";	
	}
	

	//カセットコンロ・カセットボンベ
	var radios10 = document.getElementsByName(name10);
	for(var i=0; i<radios10.length; i++){
		if (radios10[i].checked) {
		  //選択されたラジオボタンのvalue値を取得する
		  var flag=radios10[i].value;
		  break;
		}
	  }
	if(flag==0){
	score-=6;
	var doc= document.getElementById("div10");  
	doc.innerHTML= "<br><b>カセットコンロ・カセットボンベ（-6点）</b><br>「カセットコンロ・カセットボンベが備蓄されていないため、電気やガスが止まると火を用いる調理ができなくなるおそれがあります。」";	
	}else{
	var doc= document.getElementById("div10");  
	doc.innerHTML= "";	
	}

	//携帯電話用充電器
	var radios11 = document.getElementsByName(name11);
	for(var i=0; i<radios11.length; i++){
		if (radios11[i].checked) {
		  //選択されたラジオボタンのvalue値を取得する
		  var flag=radios11[i].value;
		  break;
		}
	  }
	if(flag==0){
	score-=6;
	var doc= document.getElementById("div11");  
	doc.innerHTML= "<br><b>携帯電話用充電器（-6点）</b><br>「携帯電話用充電器が備蓄されていないため、停電時に携帯電話の充電が出来ず、家族との連絡や情報取集ができなくなるおそれがあります。」";	
	}else{
	var doc= document.getElementById("div11");  
	doc.innerHTML= "";	
	}

	//懐中電灯
	var radios12 = document.getElementsByName(name12);
	for(var i=0; i<radios12.length; i++){
		if (radios12[i].checked) {
		  //選択されたラジオボタンのvalue値を取得する
		  var flag=radios12[i].value;
		  break;
		}
	  }
	if(flag==0){
	score-=6;
	var doc= document.getElementById("div12");  
	doc.innerHTML= "<br><b>懐中電灯（-6点）</b><br>「懐中電灯が備蓄されていないため、夜に地震が発生し停電になってしまった時に、ガラス片や落下して破損した物が床に散乱している可能性があるなかで暗闇のまま活動しなければならないおそれがあります。」";	
	}else{
	var doc= document.getElementById("div12");  
	doc.innerHTML= "";	
	}

	//手回し充電式などのラジオ
	var radios13 = document.getElementsByName(name13);
	for(var i=0; i<radios13.length; i++){
		if (radios13[i].checked) {
		  //選択されたラジオボタンのvalue値を取得する
		  var flag=radios13[i].value;
		  break;
		}
	  }
	if(flag==0){
	score-=6;
	var doc= document.getElementById("div13");  
	doc.innerHTML= "<br><b>手回し充電式ラジオ（-6点）</b><br>「手回し充電式などのラジオが備蓄されていないため、通信障害が発生しインターネットが使えない時に情報源がなくなってしまうおそれがあります。」";	
	}else{
	var doc= document.getElementById("div13");  
	doc.innerHTML= "";	
	}

	//乾電池
	var radios14 = document.getElementsByName(name14);
	for(var i=0; i<radios14.length; i++){
		if (radios14[i].checked) {
		  //選択されたラジオボタンのvalue値を取得する
		  var flag=radios14[i].value;
		  break;
		}
	  }
	if(flag==0){
	score-=6;
	var doc= document.getElementById("div14");  
	doc.innerHTML= "<br><b>乾電池（-6点）</b><br>「乾電池が備蓄されていないため、懐中電灯や携帯電話用充電器などの備蓄品を持っていても動力を確保できず使用できないおそれがあります。」";	
	}else{
	var doc= document.getElementById("div14");  
	doc.innerHTML= "";	
	}

	
	//軍手
	var radios15 = document.getElementsByName(name15);
	for(var i=0; i<radios15.length; i++){
		if (radios15[i].checked) {
		  //選択されたラジオボタンのvalue値を取得する
		  var flag=radios15[i].value;
		  break;
		}
	  }
	if(flag==0){
	score-=6;
	var doc= document.getElementById("div15");  
	doc.innerHTML= "<br><b>軍手（-6点）</b><br>「軍手が備蓄されていないため、ガラス片や落下して破損した物の片付けなどをする際に安全に作業できないおそれがあります。」";	
	}else{
	var doc= document.getElementById("div15");  
	doc.innerHTML= "";	
	}

	//ポリ袋
	var radios16 = document.getElementsByName(name16);
	for(var i=0; i<radios16.length; i++){
		if (radios16[i].checked) {
		  //選択されたラジオボタンのvalue値を取得する
		  var flag=radios16[i].value;
		  break;
		}
	  }
	if(flag==0){
	score-=6;
	var doc= document.getElementById("div16");  
	doc.innerHTML= "<br><b>ポリ袋（-6点）</b><br>「ポリ袋が備蓄されていないため、生ごみなど匂いが出るごみが発生したときの処理に支障が出るおそれがあります。」";	
	}else{
	var doc= document.getElementById("div16");  
	doc.innerHTML= "";	
	}

	//給水袋
	var radios17 = document.getElementsByName(name17);
	for(var i=0; i<radios17.length; i++){
		if (radios17[i].checked) {
		  //選択されたラジオボタンのvalue値を取得する
		  var flag=radios17[i].value;
		  break;
		}
	  }
	if(flag==0){
	score-=6;
	var doc= document.getElementById("div17");  
	doc.innerHTML= "<br><b>給水袋（-6点）</b><br>「給水袋が備蓄されていないため、断水時に給水車から水を運ぶときに必要な労力が増えてしまうおそれがあります。」";	
	}else{
	var doc= document.getElementById("div17");  
	doc.innerHTML= "";	
	}

	if(score==-1){
		score=0;
	}	

	//点数表示
	if(score>=90){
	var doc= document.getElementById("rating");  
	doc.innerHTML= "秀（Excellent）";
	var doc= document.getElementById("score");  
	doc.innerHTML= "あなたの家庭の備蓄状況は100点満点中<b>"+score+"点</b>です。<br>";
	var doc= document.getElementById("scoreco");
	doc.innerHTML= "<br>「自助」の意識をしっかり持っていることが伺える素晴らしい備蓄状況です。備蓄品の消費期限や使用期限に気をつけて、このまま良い備蓄情況を維持できるように頑張ってください。"
	}else if(score>=80){
	var doc= document.getElementById("rating");  
	doc.innerHTML= "優（Very good）";
	var doc= document.getElementById("score");  
	doc.innerHTML= "あなたの家庭の備蓄状況は100点満点中<b>"+score+"点</b>です。<br>";
	var doc= document.getElementById("scoreco");
	doc.innerHTML= "<br>次は90点を目標にフィードバックコメントを参考にして備蓄状況を改善していきましょう。"
	}else if(score>=70){
	var doc= document.getElementById("rating");  
	doc.innerHTML= "良（Good）";
	var doc= document.getElementById("score");  
	doc.innerHTML= "あなたの家庭の備蓄状況は100点満点中<b>"+score+"点</b>です。<br>";
	var doc= document.getElementById("scoreco");
	doc.innerHTML= "<br>次は80点を目標にフィードバックコメントを参考にして備蓄状況を改善していきましょう。"
	}else if(score>=60){
	var doc= document.getElementById("rating");  
	doc.innerHTML= "可（Passing）";
	var doc= document.getElementById("score");  
	doc.innerHTML= "あなたの家庭の備蓄状況は100点満点中<b>"+score+"点</b>です。<br>";
	var doc= document.getElementById("scoreco");
	doc.innerHTML= "<br>次は70点を目標にフィードバックコメントを参考にして備蓄状況を改善していきましょう。"
	}else{
	var doc= document.getElementById("rating");  
	doc.innerHTML= "不可（Failing）";
	var doc= document.getElementById("score");  
	doc.innerHTML= "あなたの家庭の備蓄状況は100点満点中<b>"+score+"点</b>です。<br>";
	var doc= document.getElementById("scoreco");
	doc.innerHTML= "<br>まずは60点を目標にフィードバックコメントを参考にして備蓄状況を改善していきましょう。"	
	}

	
	

	

  }


  
