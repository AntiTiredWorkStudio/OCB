<!DOCTYPE HTML>
<?php 
	include_once('KeyChain.php');
	$G = "";
	if(isset($_GET['g'])){
		$G = $_GET['g'];
	}else{
		$G = '10001';
	}
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gbk" />
<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0"/>
<meta name="apple-mobile-web-app-capable" content="yes"/>
<meta name="apple-mobile-web-app-status-bar-style" content="black">

<link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/splash/splash-icon.png">
<link rel="apple-touch-startup-image" href="images/splash/splash-screen.png" 			media="screen and (max-device-width: 320px)" />  
<link rel="apple-touch-startup-image" href="images/splash/splash-screen_402x.png" 		media="(max-device-width: 480px) and (-webkit-min-device-pixel-ratio: 2)" /> 
<link rel="apple-touch-startup-image" sizes="640x1096" href="images/splash/splash-screen_403x.png" />
<link rel="apple-touch-startup-image" sizes="1024x748" href="images/splash/splash-screen-ipad-landscape" media="screen and (min-device-width : 481px) and (max-device-width : 1024px) and (orientation : landscape)" />
<link rel="apple-touch-startup-image" sizes="768x1004" href="images/splash/splash-screen-ipad-portrait.png" media="screen and (min-device-width : 481px) and (max-device-width : 1024px) and (orientation : portrait)" />
<link rel="apple-touch-startup-image" sizes="1536x2008" href="images/splash/splash-screen-ipad-portrait-retina.png"   media="(device-width: 768px)	and (orientation: portrait)	and (-webkit-device-pixel-ratio: 2)"/>
<link rel="apple-touch-startup-image" sizes="1496x2048" href="images/splash/splash-screen-ipad-landscape-retina.png"   media="(device-width: 768px)	and (orientation: landscape)	and (-webkit-device-pixel-ratio: 2)"/>

<title><?php echo $content[$G]['Group'];?>首页</title>

<link href="styles/style.css"     		rel="stylesheet" type="text/css">
<link href="styles/framework.css" 		rel="stylesheet" type="text/css">
<link href="styles/owl.carousel.css" 	 rel="stylesheet" type="text/css">
<link href="styles/owl.theme.css" 		rel="stylesheet" type="text/css">
<link href="styles/swipebox.css"		 rel="stylesheet" type="text/css">
<link href="styles/colorbox.css"		 rel="stylesheet" type="text/css">


<script type="text/javascript" src="scripts/jquery.js"></script>
<script type="text/javascript" src="scripts/jqueryui.js"></script>
<script type="text/javascript" src="scripts/owl.carousel.min.js"></script>
<script type="text/javascript" src="scripts/jquery.swipebox.js"></script>
<script type="text/javascript" src="scripts/colorbox.js"></script>
<script type="text/javascript" src="scripts/snap.js"></script>
<script type="text/javascript" src="scripts/contact.js"></script>
<script type="text/javascript" src="scripts/custom.js"></script>
<script type="text/javascript" src="scripts/framework.js"></script>
<script type="text/javascript" src="scripts/framework.launcher.js"></script>


</head>
<body>

<div id="preloader">
	<div id="status">
    	<p class="center-text">
			正在载入内容...
            <em>加载速度取决于您的网速!</em>
        </p>
    </div>
</div>

<div class="top-deco"></div>

<div class="landing-page">
	<a class="landing-logo" href="#">
    	<img src="images/misc/logo.png" alt="img">
    </a>
	<div class="landing-logo" align="center" style="font-family: STKaiti;font-size: 32px;"><?php include('KeyChain.php'); echo $content[$G]['Group'];?></div>
    
    <div class="decoration"></div>
      
     
    <div class="landing-navigation">
    <div class="landing-navigation-tablet-top-adjustment"></div> 
    	<a href="#">
        	<img class="nav-icon" src="images/icons/misc/home.png" alt="img">
            <div class="nav-overlay"></div>
        	<img class="nav-image" src="images/general-nature/1s.jpg" alt="img">
            <em>主页</em>
        </a>
    	<a href="CB.php<?php echo '?g='.$G; ?>">
        	<img class="nav-icon" src="images/icons/misc/infoabout.png" alt="img">
            <div class="nav-overlay"></div>
        	<img class="nav-image" src="images/general-nature/3s.jpg" alt="img">
            <em>报名歌单</em>
        </a>
    	<a href="Table.php<?php echo '?g='.$G; ?>">
        	<img class="nav-icon" src="images/icons/settings/cog4.png" alt="img">
            <div class="nav-overlay"></div>
        	<img class="nav-image" src="images/general-nature/2s.jpg" alt="img">
            <em>查看歌单</em>
        </a>
    	<a href="Model.php<?php echo '?g='.$G; ?>">
        	<img class="nav-icon" src="images/icons/electrical/camera.png" alt="img">
            <div class="nav-overlay"></div>
        	<img class="nav-image" src="images/general-nature/4s.jpg" alt="img">
            <em>歌单编辑</em>
        </a>
    	<a href="Player.php<?php echo '?g='.$G; ?>">
        	<img class="nav-icon" src="images/icons/media/image2.png" alt="img">
            <div class="nav-overlay"></div>
        	<img class="nav-image" src="images/general-nature/5s.jpg" alt="img">
            <em>每周精选</em>
        </a>
    	<a href="#">
        	<img class="nav-icon" src="images/icons/misc/mail.png" alt="img">
            <div class="nav-overlay"></div>
        	<img class="nav-image" src="images/general-nature/6s.jpg" alt="img">
            <em>群组介绍</em>
        </a>
        <div class="clear"></div>
        <div class="landing-navigation-tablet-bottom-adjustment"></div> 
    </div>
    
  
    <div class="decoration"></div>
    
    <div class="footer">
    
    	<div class="socials">
            <a href="#" class="twitter-icon"></a>
            <a href="#" class="google-icon"></a>
            <a href="#" class="facebook-icon"></a>
        </div>
        <div class="clear"></div>
        <p class="copyright">
        	COPYRIGHT 2015.<br>
            ALL RIGHTS RESERVED
        </p>
        
    </div>  
</div>

<div style="height:28px;"></div>
<div class="bottom-deco"></div>


</body>
</html>