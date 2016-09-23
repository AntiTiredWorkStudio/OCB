<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<?php 
		include("CBManager.php");
		?>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="OCB/favicon.ico" rel="icon" type="image/ico" />
    <link rel="stylesheet" href="css/style_gpl.css" type="text/css" media="all">
    <title>群组列表</title>
</head>
<body>
<h3>创建群组:</h3>
<div class="example">
	<form action="http://<?php include_once('KeyChain.php');echo $options['server']; ?>/OCB/CBManager.php?action=creategrp" id="grpcreate" method="post"enctype="multipart/form-data">
							<div class="lable">
		                     	<input type="text" class="submit" id="GroupName" name="GroupName" value="群组名称" onfocus="if (this.value == '群组名称')this.value = '';" onblur="if (this.value == '') {this.value = '群组名称';}"  style="width:80%;margin-top: 10px;">
								<input type="text" class="submit" id="EnrollLink" name="EnrollLink" value="报名处链接" onfocus="if (this.value == '报名处链接')this.value = '';" onblur="if (this.value == '') {this.value = '报名处链接';}"  style="width:80%;margin-top: 10px;">
								<input type="text" class="submit" id="SignLink" name="SignLink" value="签到处链接" onfocus="if (this.value == '签到处链接')this.value = '';" onblur="if (this.value == '') {this.value = '签到处链接';}"  style="width:80%;margin-top: 10px;">
								<!--input type="text" class="submit" id="Rule" name="Rule" value="群规" onfocus="if (this.value == '群规')this.value = '';" onblur="if (this.value == '') {this.value = '群规';}" -->
								<textarea form="grpcreate" id="Rule" name="Rule" class = "submit" style="width:80%;height: 300px;margin-top: 10px;" cols="20" rows="5" >暂时没有群规</textarea>
							</div>
							
								 <div class="submit">
									<input type="submit" style="margin-top: 10px;" value="建立群组" >
								</div>
							 </form>
							 
</div>
<h3>群组快捷链接:</h3>
<div class="example">
	<?php
		//include("CBManager.php");
		$issafe = ConfirmIPIsSafe(GetIP());
		if($issafe){
			$content = (new KeyChainManager())->GetGroupInfo(15);
			foreach($content as $key=>$value){
				echo '<span><a href="index.php?g='.$key.'">'.$value['GName'].'</a> </span>';
			}
		}
	?>
    <div style="clear:both"></div>
</div>
<?php 
	if(isset($_GET['action'])){
		if($_GET['action'] == 'search'){
			$ID = (new CBDBManager(0))->SearchGID($_POST['search']);
			echo '<h3>搜索结果:</h3>';
			if($ID){
				echo '<div class="example"><a href=index.php?g='.$ID.'>'.$_POST['search'].'</a></div>';
			}else{
				echo '<div class="example"><h4>没有找到群组!</h4></div>';
			}
		}
	}
?>
<h3>群组搜索:</h3>
<div class="example">
	<form action="http://<?php include_once('KeyChain.php');echo $options['server']; ?>/OCB/Menu.php?action=search" id="grpsearch" method="post"enctype="multipart/form-data">
		<div class="lable">
		    <input type="text" class="submit" id="search" name="search" value="群组名称" onfocus="if (this.value == '群组名称')this.value = '';" onblur="if (this.value == '') {this.value = '群组名称';}"  style="width:80%;margin-top: 10px;">
		</div>				
		<div class="submit">
			<input type="submit" style="margin-top: 10px;" value="搜索群组" >
		</div>
	 </form>
</div>

</body>
</html>