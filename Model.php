<html>
<head>
	<?php 
		include_once('KeyChain.php');
		include_once('CBManager.php');
		$G = "";
		if(isset($_GET['g'])){
			$G = $_GET['g'];
		}
		$CBM = (new CBDBManager($G));
		$GN =$CBM->SelectGroupName($G);
		$GA =$CBM->SelectGroupWithID($G);
	?>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="favicon.ico" rel="icon" type="image/ico" />
	<title><?php echo $GN;?>模板管理</title>
	<link rel="stylesheet" href="css/style_Table.css" type="text/css">
	<link href="css/style_CB.css" rel="stylesheet" type="text/css">
	<style type="text/css">
    .btn{width:323.5px;padding:0;cursor:pointer;display:inline-block;text-align:center;border:1x solid transparent;-webkit-border-radius:2px;-moz-border-radius:2px;border-radius:2px;height:45px;line-height:30px;font-family:"Microsoft Yahei";font-size:15px;border-color:#4E4949;background:#3E3E3E;color:#fff;}
	.ta{width:100%; height:50%;text-align:left;border:1x solid transparent;-webkit-border-radius:2px;-moz-border-radius:2px;border-radius:2px;height:45px;line-height:30px;font-family:"Microsoft Yahei";font-size:15px;padding:0 15px;border-color:#4E4949;background:#3E3E3E;color:#fff;}
	</style>
</head>

<body>
<div align="center" class="container" style= "font-size:25px;"><?php echo $GN;?>歌单模板管理</div>
<div align="left" class="container">   
	<h2 align="center" style="font-family:Microsoft Yahei;font-size:20px;margin-top: 20px; margin-bottom: 15px;">条目样式</h2>
	<textarea id="Content" name="Content" form="usrform" class = "ta" style="
    height: 100px;
" cols="20" rows="5"><?php echo file_get_contents($GA[$G]['GSLIPath']);?></textarea>
	<h2 align="center" style="font-family:Microsoft Yahei;font-size:20px;margin-top: 20px; margin-bottom: 15px;">列表样式</h2>
	<textarea id="List" name="List" form="usrform" class = "ta" style="
		height: 200px;
	" cols="20" rows="5"><?php echo file_get_contents($GA[$G]['GSLLPath']);?></textarea>
	<!--div class="submit">
		<input type="button" class="btn" style="margin-top: 100px;" onclick="" value="复制歌单" >
		
	</div-->
	
	<div class="submit">
	<form action="http://<?php echo $options['server']; ?>/OCB/CBManager.php?action=updateList&g=<?php echo $G;?>" id="usrform" method="post" enctype="multipart/form-data">
		<input type="submit" class="btn">
	</form>
	<input type="button" class="btn" style="margin-top: 20px;" onclick="window.location.href='index.php<?php echo '?g='.$G;?>'" value="返回首页" >
		
	</div>
</div>
    
</body>
</html>