<html>
<head>
	<?php 
		include_once('KeyChain.php');
		include_once('CBManager.php');
		$G = "";
		if(isset($_GET['g'])){
			$G = $_GET['g'];
		}
	?>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?php echo $content[$G]['Group'];?>歌单</title>
	<link rel="stylesheet" href="css/style_Table.css" type="text/css">
	<link href="css/style_CB.css" rel="stylesheet" type="text/css" />
	<style type="text/css">
    .btn{width:323.5px;padding:0;cursor:pointer;display:inline-block;text-align:center;border:1x solid transparent;-webkit-border-radius:2px;-moz-border-radius:2px;border-radius:2px;height:45px;line-height:30px;font-family:"Microsoft Yahei";font-size:15px;border-color:#4E4949;background:#3E3E3E;color:#fff;}
	.ta{width:300px; height:400px;text-align:left;border:1x solid transparent;-webkit-border-radius:2px;-moz-border-radius:2px;border-radius:2px;height:45px;line-height:30px;font-family:"Microsoft Yahei";font-size:15px;padding:0 15px;border-color:#4E4949;background:#3E3E3E;color:#fff;}
	</style>
</head>

<body>

<div id="container">   
	<table class="zebra">
    <caption><?php echo $content[$G]['Group'];?>歌单</caption>
		<thead>
        	<tr>
				<th>歌手称呼</th>
				<th>发布作品</th>
				<th>发布时间</th>
				<th>主页链接</th>
            </tr>
		</thead>
        <tbody>
			<?php
				$scontent = file_get_contents($content[$G]['scontent']);
				$slist = file_get_contents($content[$G]['slist']);
				$date = date("Y-m-d",strtotime("+1 day"));
				$group = $content[$G]['Group'];
				$TodaySongs = (new CBDBManager($G))->GetTodayInfo($G);
				$content = "";
				$totalContent = "";
				$index = 1;
				//str_replace("#DB#",$this->options['database'],$this->options['mainTableFormate']);
				foreach($TodaySongs as $key=>$value){
					switch(preg_replace('|[0-9/]+|','',$key)){
						case 'CBName':
							$content = $scontent;
							$content = str_replace("#Index#",$index,$content);
							
							echo '<tr>
									<td>'.$value.'</td>
									';
							$content = str_replace("#UserName#",$value,$content);
							break;
						case 'CBSong':
							echo '
									<td>'.$value.'</td>
									';
							$content = str_replace("#Song#",$value,$content);
							break;
						case 'CBTime':
							echo '
									<td>'.$value.'</td>
									';
							$content = str_replace("#Time#",$value,$content);
							break;
						case 'CBLink':
							echo '
									<td>'.$value.'</td>
								</tr>';
							$content = str_replace("#Link#",$value,$content);
							break;
						case 'CBPOSTTIME':
							$totalContent = $totalContent.$content;
							$index++;
							break;
						case 'CBPOSTDATE':
							break;
						default:
							break;
					}
				}
				
				$slist = str_replace('#Date#',$date,$slist);
				$slist = str_replace('#Content#',$totalContent,$slist);
				$slist = str_replace('#GroupName#',$group,$slist);
			?>
        </tbody>
	</table>
	<textarea name="yj" class = "ta" style="
    height: 402px;
    width: 532px;
" cols="20" rows="5"><?php echo $slist; ?></textarea>
	<!--div class="submit">
		<input type="button" class="btn" style="margin-top: 100px;" onclick="" value="复制歌单" >
		
	</div-->
	<div class="submit">
		<input type="button" class="btn" style="margin-top: 20px;" onclick="window.location.href='index.php<?php echo '?g='.$G;?>'" value="返回首页" >
		
	</div>
</div>
    
</body>
</html>