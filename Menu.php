<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="favicon.ico" rel="icon" type="image/ico" />
    <link rel="stylesheet" href="css/style_gpl.css" type="text/css" media="all">
    <title>群组列表</title>
</head>
<body>
<div class="example">
	<form action="http://<?php include_once('KeyChain.php');echo $options['server']; ?>/OCB/CBManager.php?action=creategrp" method="post"enctype="multipart/form-data">
							<div class="lable">
		                     	<input type="text" class="submit" id="GroupName" name="GroupName" value="群组名称" onfocus="if (this.value == '群组名称')this.value = '';" onblur="if (this.value == '') {this.value = '群组名称';}" >
							</div>
							
								 <div class="submit">
									<input type="submit" style="margin-top: 10px;" value="建立群组" >
								</div>
							 </form>
</div>
<div class="example">
    <ul class="nav">
        <li><a href="#">群组快捷通道</a>
            <ul class="subs">
			<?php
				include("KeyChain.php");
				foreach($content as $key=>$value){
					echo '<li><a href="index.php?g='.$key.'">'.$value['Group'].'</a></li>';
				}
			?>
            </ul>
        </li>
    </ul>
    <div style="clear:both"></div>
</div>
</body>
</html>