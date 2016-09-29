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
	<title><?php echo $GN;?>歌单</title>
	<link rel="stylesheet" href="css/style_Table.css" type="text/css">
	<link href="css/style_CB.css" rel="stylesheet" type="text/css">
	<style type="text/css">
    .btn{width:323.5px;padding:0;cursor:pointer;display:inline-block;text-align:center;border:1x solid transparent;-webkit-border-radius:2px;-moz-border-radius:2px;border-radius:2px;height:45px;line-height:30px;font-family:"Microsoft Yahei";font-size:15px;border-color:#4E4949;background:#3E3E3E;color:#fff;}
	.ta{width:100%; height:50%;text-align:left;border:1x solid transparent;-webkit-border-radius:2px;-moz-border-radius:2px;border-radius:2px;height:45px;line-height:30px;font-family:"Microsoft Yahei";font-size:15px;padding:0 15px;border-color:#4E4949;background:#3E3E3E;color:#fff;}
	</style>
</head>

<body>

<div align="left" class="container">   
	<table class="zebra">
    <caption><?php echo $GN;?>歌单</caption>
		<thead>
        	<tr>
				<th>歌手</th>
				<th>作品</th>
				<th>时间</th>
				<th>链接</th>
            </tr>
		</thead>
        <tbody>
			<?php
				include_once('Encryption.php');
				$buttonTemplate = '<div class="submit">
		<input type="button" class="btn" style="margin-top: 20px;" onclick="window.location.href=\'#GET#\'" value="#btContent#" ></div>';
				$buttonList = "";
				$eachButton = "";
				$scontent = file_get_contents($GA[$G]['GSLIPath']);
				$slist = file_get_contents($GA[$G]['GSLLPath']);
				$date = date("Y-m-d",strtotime("+1 day"));
				$group = $GA[$G]['GName'];
				$TodaySongs = (new CBDBManager($G))->GetTodayInfo($G);
				$content = "";
				$totalContent = "";
				$index = 1;
				//str_replace("#DB#",$this->options['database'],$this->options['mainTableFormate']);
				foreach($TodaySongs as $key=>$value){
					$eachButton = $buttonTemplate;
					switch(preg_replace('|[0-9/]+|','',$key)){
						case 'CBName':
							$content = $scontent;
							$content = str_replace("#Index#",$index,$content);
							$buttonList = $buttonList.str_replace('#btContent#','删除:'.$value,$buttonTemplate);
							$buttonList = str_replace('#GET#','CBManager.php?action=delete&g='.$G.'&p='.sha1($value),$buttonList);
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
									<td><a href="'.$value.'">'.$value.'</a></td>
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
	<div class="submit">
		<input type="button" id="copy_btn" data-clipboard-action="copy" data-clipboard-target="#fe_text" class="btn" style="margin-top: 20px; margin-bottom: 10px;" value="复制歌单" >
	</div>
	<textarea id="fe_text" name="yj" class = "ta" style="
    height: 402px;
" cols="20" rows="5"><?php echo $slist; ?></textarea>
	<!--div class="submit">
		<input type="button" class="btn" style="margin-top: 100px;" onclick="" value="复制歌单" >
		
	</div-->
	<div class="submit">
		<input type="button" class="btn" style="margin-top: 20px;" onclick="window.location.href='index.php<?php echo '?g='.$G;?>'" value="返回首页" >
		<?php echo $buttonList;?>
	</div>

</div>
    
</body>
</html>
	<script src="scripts/clip/jquery.js"></script>   
	<script src="scripts/clip/clipboard.min.js"></script>   
	<script type="text/javascript">
	 $(document).ready(function(){    
        var targetText=$("#fe_text").text();    
        var clipboard = new Clipboard('#copy_btn');    
    
        clipboard.on('success', function(e) {    
            console.info('Action:', e.action);    
            console.info('Text:', e.text);    
            console.info('Trigger:', e.trigger);    
            alert("复制成功");    
    
            e.clearSelection();    
        });    
    });    
	</script>