<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php 
		include_once('KeyChain.php');
		$G = "";
		if(isset($_GET['g'])){
			$G = $_GET['g'];
		}
	?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

<link href="css/style_CB.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/smusic.css"/>

<style type="text/css">
    .btn{width:323.5px;padding:0;cursor:pointer;display:inline-block;text-align:center;border:1x solid transparent;-webkit-border-radius:2px;-moz-border-radius:2px;border-radius:2px;height:45px;line-height:30px;font-family:"Microsoft Yahei";font-size:15px;padding:0 15px;border-color:#EC0000;background:#FF6B6B;color:#fff;}
</style>
<title><?php echo $content[$G]['Group'];?>周精选</title>

</head>
<body>
<div class="grid-music-container f-usn">
    <div class="m-music-play-wrap">
        <div class="u-cover"></div>
        <div class="m-now-info">
            <h1 class="u-music-title"><strong>标题</strong><small>歌手</small></h1>
            <div class="m-now-controls">
                <div class="u-control u-process">
                    <span class="buffer-process"></span>
                    <span class="current-process"></span>
                </div>
                <div class="u-control u-time">00:00/00:00</div>
                
            </div>
            <div class="m-play-controls">
                <a class="u-play-btn prev" title="上一曲"></a>
                <a class="u-play-btn ctrl-play play" title="暂停"></a>
                <a class="u-play-btn next" title="下一曲"></a>
            </div>
            <div class="m-play-controls">
                <a class="u-play-btn mode mode-list current" title="列表循环"></a>
                <a class="u-play-btn mode mode-random" title="随机播放"></a>
                <a class="u-play-btn mode mode-single" title="单曲循环"></a>
            </div>
        </div>
    </div>
    <div class="f-cb">&nbsp;</div>
    <div class="m-music-list-wrap"></div>
	
	<div class="submit">
		<input type="button" class="btn" style="margin-top: 20px;" onclick="window.location.href='index.php<?php echo '?g='.$G;?>'" value="返回首页" >
	</div>
	
</div>


<script type="text/javascript" src="scripts/smusic.min.js"></script>
<script type="text/javascript">
var musicList = [
	{
		title : '月半小夜曲',
		singer : '呆萌萌',
		cover  : 'images/Maroon5.jpg',
		src    : 'http://upuwmp3.changba.com/userdata/userwork/352/658808352.mp3'
	},
	{
		title : '我的歌声里',
		singer : '呆萌萌',
		cover  : 'images/yangcong.jpg',
		src    : 'http://upuwmp3.changba.com/userdata/userwork/385/633255385.mp3'
	},	
	{
		title : '后来',
		singer : '呆萌萌',
		cover  : 'images/yangcong.jpg',
		src    : 'http://upuwmp3.changba.com/userdata/userwork/406/712189406.mp3'
	},
	{
		title : '今天你要嫁给我',
		singer : '呆萌萌&Michael',
		cover  : 'images/yangcong.jpg',
		src    : 'http://upuwmp3.changba.com/userdata/userwork/285/756930285.mp3'
	}
];
new SMusic({
	musicList:musicList
});
</script>

</body>
</html>