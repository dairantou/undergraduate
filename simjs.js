function saiten(name1,name2,name3,name4,name5,name6,name7,name8,name9,name10,name11,name12,name13,name14,name15,name16,name17){

	var score=100;
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
	doc.innerHTML= "・飲料水の備蓄が約"+day+"日分(1人1日3Lの消費を仮定)しかないため、断水が続くとに水分補給やお湯を用いる非常食の調理が出来なくなるおそれがあります。あと"+more+"Lあれば推奨される1週間分の備蓄量を確保できます。(-"+lostscore+"点)";
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
	doc.innerHTML= "・非常食の備蓄が約"+day+"日分(1人1日3食分の消費を仮定)しかないため、物流の機能停止などで新たに食料を入手できない場合に満足な食事が出来ず栄養失調になってしまうおそれがあります。あと"+more+"食分あれば推奨される1週間分の備蓄量を確保できます。(-"+lostscore+"点)";
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
	doc.innerHTML= "・ウェットボディタオルの備蓄が約"+day+"日分(1人1日1回分の消費を仮定)しかないため、ウエットボディタオルを使いきったときにガスの停止や断水が続いていると、体を拭いて清潔に保つことができなくなるおそれがあります。あと"+more+"回分あれば推奨される1週間分の備蓄量を確保できます。(-"+lostscore+"点)";
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
	doc.innerHTML= "・歯磨き用ウェットティッシュの備蓄が約"+day+"日分(1人1日2回分の消費を仮定)しかないため、歯磨き用ウェットティッシュを使いきったときに断水が続いていると、歯を清潔に保つことができなくなるおそれがあります。あと"+more+"回分あれば推奨される1週間分の備蓄量を確保できます。(-"+lostscore+"点)";
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
	doc.innerHTML= "・簡易トイレの備蓄が約"+day+"日分(1人1日5回分の消費を仮定)しかないため、簡易トイレを使いきったときに断水などで水洗トイレが使えない情況が続いていると、家庭内でトイレをするのを我慢しなければならなくなるおそれがあります。あと"+more+"回分あれば推奨される1週間分の備蓄量を確保できます。(-"+lostscore+"点)";
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
	doc.innerHTML= "・トイレットペーパーが備蓄されていないため、トイレの使用時などふき取る作業に支障がでるおそれがあります。(-6点)";	
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
	doc.innerHTML= "・ティッシュペーパーが備蓄されていないため、断水で水が使えない場面で汚れたお皿を拭くなどのふき取る作業ができなくなってしまうというおそれがあります。(-5点)";	
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
	doc.innerHTML= "・救急箱が備蓄されていないため、被災時に怪我をしたときに家庭で応急手当ができなくなってしまうおそれがあります。(-6点)";	
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
	doc.innerHTML= "・カセットコンロ・カセットボンベが備蓄されていないため、電気やガスが止まると火を用いる調理ができなくなるおそれがあります。(-6点)";	
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
	doc.innerHTML= "・携帯電話用充電器が備蓄されていないため、停電時に携帯電話の充電が出来ず、家族との連絡や情報取集ができなくなるおそれがあります。(-6点)";	
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
	doc.innerHTML= "・懐中電灯が備蓄されていないため、夜に地震が発生し停電になってしまった時に、ガラス片や落下して破損した物が床に散乱している可能性があるなかで暗闇のまま活動しなければならないおそれがあります。(-6点)";	
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
	doc.innerHTML= "・手回し充電式などのラジオが備蓄されていないため、通信障害が発生しインターネットが使えない時に情報源がなくなってしまうおそれがあります。(-6点)";	
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
	doc.innerHTML= "・乾電池が備蓄されていないため、懐中電灯や携帯電話用充電器などの備蓄品を持っていても動力を確保できず使用できないおそれがあります。(-6点)";	
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
	score-=5;
	var doc= document.getElementById("div15");  
	doc.innerHTML= "・軍手が備蓄されていないため、ガラス片や落下して破損した物の片付けなどをする際に安全に作業できないおそれがあります。(-6点)";	
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
	doc.innerHTML= "・ポリ袋が備蓄されていないため、生ごみなど匂いが出るごみが発生したときの処理に支障が出るおそれがあります。(-6点)";	
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
	doc.innerHTML= "・給水袋が備蓄されていないため、断水時に給水車から水を運ぶときに必要な労力が増えてしまうおそれがあります。(-6点)";	
	}else{
	var doc= document.getElementById("div17");  
	doc.innerHTML= "";	
	}

	//点数表示
	var doc= document.getElementById("score");  
	doc.innerHTML= "あなたの家庭の備蓄状況は100点満点中"+score+"点です。";

	//100点の場合
	if(score==100){
	var doc= document.getElementById("div2");  
	doc.innerHTML= "あなたの家庭の素晴らしい備蓄情況から「自助」の意識をしっかり持っていることが伺えます。備蓄品の消費期限や使用期限に気をつけてこのまま良い備蓄情況を維持できるように頑張ってください。";
	}

  }


  
