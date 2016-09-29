<?php
	
	$cookieJS = '<script>
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
	</script>';
	if(isset($_GET['url'])){echo $_GET['url'];}else
	if(!isset($_GET['action']) && $_COOKIE['firstlink']==null){
	echo file_get_contents($_GET['PLink']).$cookieJS.$clearJS;
		//Header("Location:http://115.159.121.254/OCB/GetLink.php");
	}else{
		$link =  $_COOKIE['firstlink'];
		//echo $link;
		setcookie("firstlink","OK",time()-1);
		echo file_get_contents($link).$cookieJS.$clearJS01;
	}
?>