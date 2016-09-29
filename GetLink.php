<?php
	
	/*$cookieJS = '<script>
	//设置cookie
	function setCookie(cname, cvalue, exdays) {
		var d = new Date();
		d.setTime(d.getTime() + (exdays*24*60*60*1000));
		var expires = "expires="+d.toUTCString();
		document.cookie = cname + "=" + cvalue + "; " + expires;
	}
	//获取cookie
	function getCookie(cname) {
		var name = cname + "=";
		var ca = document.cookie.split(\';\');
		for(var i=0; i<ca.length; i++) {
			var c = ca[i];
			while (c.charAt(0)==\' \') c = c.substring(1);
			if (c.indexOf(name) != -1) return c.substring(name.length, c.length);
		}
		return "";
	}
	//清除cookie  
	function clearCookie(name) {  
		setCookie(name, "", -1);  
	}  
	function checkCookie() {
		var user = getCookie("username");
		if (user != "") {
			alert("Welcome again " + user);
		} else {
			user = prompt("Please enter your name:", "");
			if (user != "" && user != null) {
				setCookie("username", user, 365);
			}
		}
	}</script>';

	$clearJS = 
	'<script>
		var obj = document.getElementsByTagName("*");
		var link = "";
		for (var i=0;i<obj.length;i++){
			if(obj[i].innerText.indexOf("'.$_GET['PSong'].'")==0 && obj[i].nodeName=="A"){
				link = obj[i].getAttribute("href");
				console.log(link);
			}
		}
		document.head.innerHTML = "";
		setCookie("firstlink","http://changba.com"+link, 1000);
		document.body.innerHTML=""+"'.'http://changba.com'.'"+link+"";
		window.location.href = "http://115.159.121.254/OCB/GetLink.php?action=link01";
	</script>';

	$clearJS01 = 
	'<script>
		var link = "";
		setTimeout(function(){
		var obj = document.getElementsByTagName("*");
		
		for (var i=0;i<obj.length;i++){
			if(obj[i].nodeName=="AUDIO"){
				var a = obj[i];
				link = a.src;
				console.log(a.src);
				window.location.href = "http://115.159.121.254/OCB/GetLink.php?action=link02&url="+link;
				break;
			}
		}
		},0);
		//document.head.innerHTML = "";
		//setCookie("link",link, 100);
		//document.body.innerHTML=""+link+"";
		window.location.href = "http://115.159.121.254/OCB/GetLink.php?action=link02&url="+link;
	</script>';*/
	//if(isset($_GET['url'])){echo $_GET['url'];}else
	/*	libxml_use_internal_errors(true) ;
		$doc = new DOMDocument();
		$doc->loadHTMLFile($_GET['PLink']);
		$doc->preserveWhiteSpace = TRUE;
		$doc->formatOutput = TRUE;
		$body = $doc->getElementsByTagName('body')->item(0);
		$xpath = new DOMXPath($doc);
		//xpath 获取元素节点
		$path = "//ul[@class='p pv']";
		$uls = $xpath->query($path,$body);
		//echo $doc->saveHTML($uls->item(0));
		foreach($uls as $ul) {
			$lis = $ul->getElementsByTagName('li');
			foreach($lis as $li) {
				$as = $li->getElementsByTagName('a');
				echo $as ->length.'';
			}
		}*/
	//	include('../simple_html_dom.php'); 
		include("shdm/simple_html_dom.php");
		function startWith($str, $needle) {
			return strripos($str,$needle) === 0;
		}
		$link = '';
		$dom = file_get_html('http://changba.com/u/229780482'); 
		foreach($dom->find('a') as $element) {
			//echo $element->innertext.': '.strchr($element->innertext,'下定决心忘记你').'\n' ;
			if(startWith(trim($element->innertext),'下定决心忘记你')){
				$link = 'http://changba.com'.$element->href;
				break;
			}
		}
		
		//echo $link;
		$curl_info = null;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $link);
		curl_setopt($ch, CURLINFO_FILETIME, 5000);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$notice = curl_exec($ch);//){
		curl_close($ch);
		
		echo $notice;
		$dom = str_get_html($notice); 
		
		foreach($dom->find('audio') as $element) {
			echo $element;
			/*if(startWith(trim($element->innertext),'下定决心忘记你')){
				$link = 'http://changba.com'.$element->href;
				break;
			}*/
		}
		//echo $dom->find('audio')[0]->src;
		
		/*$dom = file_get_html($link); 
		foreach($dom->find('audio') as $element) {
			echo $element->name;*/
			//if(startWith(trim($element->innertext),'下定决心忘记你')){
			//	$link = 'http://changba.com'.$element->href;
			//	break;
			//}
		//}
			//echo $audio->loop；
//		echo strip_tags(file_get_contents('http://changba.com/u/229780482'),'<a>');
		//Header("Location:http://115.159.121.254/OCB/GetLink.php");
	/*else{
		$link =  $_COOKIE['firstlink'];
		//echo $link;
		setcookie("firstlink","OK",time()-1);
		echo file_get_contents($link).$cookieJS.$clearJS01;
	}*/
?>