<?php
include_once('KeyChain.php');
include_once('CBManager.php');
	$G = "";
	if(isset($_GET['g'])){
		$G = $_GET['g'];
	}
	$CBM = (new CBDBManager($G));
	$GN =$CBM->SelectGroupName($G);
?>

<html>
<head>
		<meta charset="utf-8">
		<link href="css/style_CB.css" rel="stylesheet" type="text/css" />
		<link href="favicon.ico" rel="icon" type="image/ico" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php echo $GN;?>歌曲报名处</title>
		<script type="application/x-javascript"> 
			addEventListener(
				"load", function() { 
							setTimeout(hideURLbar, 0); 
									}, false);
			function hideURLbar(){ window.scrollTo(0,1); } 
		
		</script>
		
</head>
 
<body>
	<div class="main" style="margin-top: 0px;">
				 <h2><?php echo $GN;?>歌曲报名处</h2>
				 <form action="http://<?php echo $options['server']; ?>/OCB/CBManager.php?action=takein&<?php echo 'g='.$G; ?>" method="post"enctype="multipart/form-data">
							<div class="lable">
		                     	<input type="text" class="text" id="User" name="User" value="你的称呼" onfocus="if (this.value == '你的称呼')this.value = '';" onblur="if (this.value == '') {this.value = '你的称呼';}" >

		                     	<input type="text" class="text" id="Song" name="Song" value="歌曲名称" onfocus="if (this.value == '歌曲名称')this.value = '';" onblur="if (this.value == '') {this.value = '歌曲名称';}">
		                    </div>
		                    <div class="clear"> </div>
		                    <div class="lable-2">
		                    <input type="text" class="text" id="Time" name="Time" value="发歌时间" onfocus="if (this.value == '发歌时间')this.value = '';" onblur="if (this.value == '') {this.value = '发歌时间';}">
		                     <input type="text" class="text" id="Link" name="Link" value="主页链接" onfocus="if (this.value == '主页链接')this.value = '';" onblur="if (this.value == '') {this.value = '主页链接';}">
							</div>
							<div class="clear"> </div>
							
								 <div class="submit">
									<input type="submit" style="margin-top: 10px;" onclick="myFunction()" value="报名" >
								</div>
									<div class="clear"> </div>
							 <div class="submit">
									<input type="button" class="btn" style="margin-top: 20px;" onclick="window.location.href='index.php<?php echo '?g='.$G;?>'" value="返回首页" >
									<style type="text/css">
    .btn{width:323.5px;padding:0;cursor:pointer;display:inline-block;text-align:center;border:1x solid transparent;-webkit-border-radius:2px;-moz-border-radius:2px;border-radius:2px;height:45px;line-height:30px;font-family:"Microsoft Yahei";font-size:15px;padding:0 15px;border-color:#EC0000;background:#FF6B6B;color:#fff;}
</style>
								</div>
							 </form>
		<!-----//end-main---->
		</div>
		 <!-----start-copyright---->
   					<div class="copy-right">
						<p> <a href="http://www.cssmoban.com/" target="_blank" title="模板之家"></a></p> 
					</div>
				<!-----//end-copyright---->
	 
</body>
</html>
