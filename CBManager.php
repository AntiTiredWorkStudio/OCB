<?php
include_once('KeyChain.php');
$G = "";
if(isset($_GET['g'])){
	$G = $_GET['g'];
}


include_once('Encryption.php');

if(isset($_GET['action'])){
	switch($_GET['action']){
		case 'takein':
			new TakeIn();
			break;
		case 'initDB':
			(new CBDBManager($G))->InitTable();
			break;
		case 'updateList':
			(new SongListManager($_POST['Content'],$_POST['List'],$G))->UpdateSongList();
			break;
		case 'delete':
			new DeleteItem((new CBDBManager($G))->DeleteItem($_GET['p'],$G));
			break;
		case 'creategrp':
			(new KeyChainManager())->CreateGroup($_POST['GroupName']);
			break;
		case 'fixed':
			(new CBDBManager($G))->FixedSha1();
			break;
		default:
			break;
	}
}
class WeekPlayer{
	
}
class KeyChainManager{
	function CreateGroup($groupName){
		include("KeyChain.php");
		$index = 0;
		foreach($content as $key=>$value){
			$index = $key;
		}
		$index++;
		echo $index.':'.$groupName;
		$ocontent = file_get_contents('KeyChain.php');
		$ncontent = str_replace('//#NEWGROUP#',',
		\''.$index.'\'=>[
		\'Group\' => \''.$groupName.'\',
		\'DayMax\' => 5,
		\'DurMax\' => 3,
		\'slist\' => \'sources/ListModule_'.$index.'.txt\',
		\'scontent\' => \'sources/ContentModule_'.$index.'.txt\'
		]
		//#NEWGROUP#
		',$ocontent);
		file_put_contents('sources/ListModule_'.$index.'.txt',$options['defaultSongList']);
		file_put_contents('sources/ContentModule_'.$index.'.txt',$options['defaultSongItem']);
		file_put_contents('KeyChain.php',$ncontent);
	}
	function KeyChainManager(){
		
	}
}

class SongListManager{
	var $c = '';
	var $l = '';
	var $g = '';
	var $co = '';
	function SongListManager($_content,$list,$groupID){
		include('KeyChain.php');
		$this->c=$_content;
		$this->l=$list;
		$this->g=$groupID;
//		if(isset($content))
		$this->co=$content;
		//echo $_content.$list.$groupID;//.$content;
	}
	
	function UpdateSongList(){
		file_put_contents($this->co[$this->g]['scontent'],$this->c);
		file_put_contents($this->co[$this->g]['slist'],$this->l);
		new CWaitJS('报名结果','index.php','修改成功');
	}
}

class CWaitJS{
	var $WJ = '
			var secs = 3; //倒计时的秒数 
			var URL="#Page#?g=#GET#";
			Load(URL);
			function Load(url){
				URL = url;
				for(var i=secs;i>=0;i--) 
				{ 
					window.setTimeout("doUpdate(" + i + ")", (secs-i) * 1000); 
				} 
			}
			function doUpdate(num) 
			{ 
				document.getElementById("ShowDiv").innerHTML = "将在"+num+"秒后自动跳转到主页" ;
				if(num == 0) { window.location = URL; }
			}';
	function GetWaitJS($linkPage){
		$result = str_replace('#GET#',$_GET['g'],$this->WJ);
		return str_replace('#Page#',$linkPage,$result);
	}
	function CWaitJS($title,$linkPage,$resultContent){
		echo '<html>
				<title>'.$title.'</title>
				<body>
				<ShowDiv id=\'ShowDiv\'></ShowDiv>
				</br>
				<a href=\''.$linkPage.'?g='.$_GET['g'].'\'>如果页面未响应请点击此处返回</a>
				<script language="javascript">alert("'.$resultContent.'");';
		echo $this->GetWaitJS($linkPage);
		echo '</script>
				</body>
				</html>';
	}
}

class TakeIn{
	var $defaultValue = [
		'User' => '你的称呼',
		'Song' => '歌曲名称',
		'Time' => '发歌时间',
		'Link' => '主页链接'
	];
	var $waitJS = '
			var secs = 3; //倒计时的秒数 
			var URL="index.php?g=#GET#";
			Load(URL);
			function Load(url){
				URL = url;
				for(var i=secs;i>=0;i--) 
				{ 
					window.setTimeout("doUpdate(" + i + ")", (secs-i) * 1000); 
				} 
			}
			function doUpdate(num) 
			{ 
				document.getElementById("ShowDiv").innerHTML = "将在"+num+"秒后自动跳转到主页" ;
				if(num == 0) { window.location = URL; }
			}';
	function GetWaitJS(){
		return str_replace('#GET#',$_GET['g'],$this->waitJS);
	}
			
	function TakeIn(){
		$user = $_POST['User'];
		$Song = $_POST['Song'];
		$Time = $_POST['Time'];
		$Link = $_POST['Link'];
		$TakeInResult = true;
		session_start();
		echo '<html>
				<title>报名结果</title>
				<body>
				<ShowDiv id=\'ShowDiv\'></ShowDiv>
				</br>
				<a href=\'index.php?g='.$_GET['g'].'\'>如果页面未响应请点击此处返回</a>
				<script language="javascript">';
		if($user == "" || $user == $this->defaultValue['User']){
			
			echo 'alert("用户名不能为空");'.$this->GetWaitJS();
			$TakeInResult = false;
		}else
		if($Song == "" || $Song == $this->defaultValue['Song']){
			echo 'alert("歌曲不能为空");'.$this->GetWaitJS();
			$TakeInResult = false;
		}else
		if($Link == "" || $Link == $this->defaultValue['Link']){
			echo 'alert("主页链接不能为空");'.$this->GetWaitJS();
			$TakeInResult = false;
		}else
		if($Time == "" || $Time == $this->defaultValue['Time']){
			$Time = "未公布";
		}
		$Items = [
			'CBName' => $user,
			'CBSong' => $Song,
			'CBTime' => $Time,
			'CBLink' => $Link
		];
		
		$Condition = [
			'CBName' => $_POST['User'],
			'CBPOSTDATE' => 'CURRENT_DATE()',
			'CBGroup' => $_GET['g']
		];
		if($TakeInResult){
			$CBDM = new CBDBManager($_GET['g']);
			$count = 
				$CBDM->GetTodaySongCount($_GET['g']);
			//echo($count);
			if(isset($_SESSION['OnTakein'.sha1($user)]) && $_SESSION['OnTakein'.sha1($user)] == sha1($_POST['User'])){
				echo 'alert("报的太快啦！");'.$this->GetWaitJS();
			}else
			if($count>=5){
				echo 'alert("今天报名人数已经达到'.$count.'人，请明天再来吧");'.$this->GetWaitJS();
			}else
			if(!($CBDM->SelectConditionItems($Condition))){
				$_SESSION['OnTakein'.sha1($user)] = sha1($_POST['User']);
				if($CBDM->InsertElement(
					$Items,$_GET['g']
				)){
					echo 'alert("报名成功");'.$this->GetWaitJS();
					//Header("Location: CB.html"); 
				}
			}else{
				echo 'alert("报名失败，您已在三天内报过名了");'.$this->GetWaitJS();
			}
		}
		echo '</script>
				</body>
				</html>';
	}
}

class DeleteItem{
	function DeleteItem($result){
		if($result){
			new CWaitJS('删除结果','Table.php','删除成功');
		}else{
			new CWaitJS('删除结果','Table.php','删除失败');
		}
	}
}

class CBDBManager{
	
	var $options = [
    'user'  => "konglf2112",
    'password'  => '3226460036',
	'database' => 'CBDB' ,
	'mainTable' => 'CBTable',
	'mainTableFormate' => 'CREATE TABLE #DB#.#TB# 
							(`CBName` VARCHAR(32) NOT NULL ,
							 `CBSong` VARCHAR(32) NOT NULL ,
							 `CBTime` VARCHAR(15) NOT NULL ,
							 `CBLink` VARCHAR(128) NOT NULL ,
							 `CBPOSTTIME` TIME NOT NULL ,
							 `CBPOSTDATE` DATE NOT NULL ,
							 `CBGroup` VARCHAR(32) NOT NULL
							 ) ENGINE = InnoDB DEFAULT CHARSET=UTF8;',
	'tcc' => 'SqlTable.txt'
	];
	var $todayCount;
	
	function DeleteItem($CBN,$grp){
		$link = $this->DBLink();
		$sql = "delete from cbtableothers where CBPOSTDATE=CURRENT_DATE() AND CBCName='".$CBN."'". "AND CBGroup='".$grp."'";
		//echo $sql;
		$result = mysql_query($sql,$link);
		
		if(isset($_SESSION['OnTakein'.$CBN]) && $_SESSION['OnTakein'.$CBN] == $CBN){
			//setcookie('OnTakein'.$CBN,'',time()-1);
			unset($_SESSION['OnTakein'.$CBN]);
		}
		
		return $result;
	}
	
	function GetCreateTableCommand(){
		$result = str_replace("#DB#",$this->options['database'],$this->options['mainTableFormate']);
		$result = str_replace("#TB#",$this->options['mainTable'],$result);
		return $result;
	}
	
	function GetTodaySongCount($grp){
		$link = $this->DBLink();
		$sql = "select count(*) as value from cbtableothers where CBPOSTDATE=CURRENT_DATE() AND CBGroup='".$grp."'";
		$result = mysql_query($sql,$link);
		return mysql_fetch_array($result)[0];
	}
	
	function SelectConditionItems($Conditions){
		$sql = "select * from ".$this->options['mainTable']." where "; 
		foreach($Conditions as $key => $value)    
		{
			if($Conditions['CBGroup'] != $value){
				$sql = $sql.$key.'=\''.$value.'\' and ';
			}else{
				$sql = $sql.$key.'='.$value;
			}
		}
		$con = $this->DBLink();
		$result = mysql_query($sql,$con);
		//if($result){
		//	$result = mysql_fetch_array($result);
		//}
		return mysql_num_rows($result);
	}
	
	function ExistTable($tableName){
		$con = $this->DBLink();
		$result =mysql_fetch_row(mysql_query("SHOW TABLES LIKE '".$tableName."' ",$con));
		mysql_close($con);
		if($result==1){
			return true;
		}else{
			return false;
		}
	}
	
	function InsertElement($Items,$grp){
		$sql = "INSERT INTO `".$this->options['mainTable']."` (`CBName`, `CBSong`, `CBTime`, `CBLink`, `CBPOSTTIME`, `CBPOSTDATE`, `CBGroup`, `CBCName`) 
		VALUES (
			'".$Items['CBName']."',
			'".$Items['CBSong']."',
			'".$Items['CBTime']."',
			'".$Items['CBLink']."',
			CURRENT_TIME(),
			CURRENT_DATE(),
			'".$grp."','".sha1($Items['CBName'])."'
		)";
		
		$con = $this->DBLink();
		$result = mysql_query($sql,$con);
		mysql_close($con);
		if($result){
			return true;
		}else{
			return false;
		}
	}
	function GetTodayInfo($grp){
		$link = $this->DBLink();
		$sql = 'SELECT * FROM `'.$this->options['mainTable'].'` WHERE CBPOSTDATE=CURRENT_DATE() AND CBGroup="'.$grp.'"';
		
		$result = mysql_query($sql,$link);
		$result_arr = array();
		$userNum = 0;
		while($row = mysql_fetch_array($result)){
			foreach($row as $key=>$value){
				if(!is_numeric($key)){
					$result_arr[$key.$userNum] = $value;
				}else{
					if($key == 0){
						$userNum++;
					}
				}
			}
		}
		$this->todayCount = $userNum;
		mysql_close($link);
		return $result_arr;
	}
	
	function FixedSha1(){
		$link = $this->DBLink();
		$sql = 'SELECT `CBName` FROM `'.$this->options['mainTable'].'` WHERE 1';
		echo $sql;
		$result = mysql_query($sql,$link);
		while($row = mysql_fetch_array($result)){
			foreach($row as $key=>$value){
				echo $key.'=>'.$value;
				$ssql = 'UPDATE `cbtableothers` SET `CBCName`="'.sha1($value).'" WHERE `CBName`="'.$value.'"';
				mysql_query($ssql,$link);
			}
		}
		echo 'finished';
		mysql_close($link);
	}
	
	function GetLastdayInfo($grp){
		$link = $this->DBLink();
		$sql = 'SELECT * FROM `'.$this->options['mainTable'].'` WHERE CBPOSTDATE=(CURRENT_DATE()-1) AND CBGroup="'.$grp.'"';
		
		$result = mysql_query($sql,$link);
		$result_arr = array();
		$userNum = 0;
		while($row = mysql_fetch_array($result)){
			foreach($row as $key=>$value){
				if(!is_numeric($key)){
					$result_arr[$key.$userNum] = $value;
				}else{
					if($key == 0){
						$userNum++;
					}
				}
			}
		}
		$this->todayCount = $userNum;
		mysql_close($link);
		return $result_arr;
	}
	function DBLink(){
		$con = mysql_connect("localhost",$this->options['user'],$this->options['password']);
		mysql_set_charset('utf8');
		if($con){
			mysql_select_db($this->options['database']);
		}
		return $con;
	}
	
	function InitTable(){
		if(!$this->ExistTable($this->options['mainTable'])){
			$link = $this->DBLink();
			mysql_query($this->GetCreateTableCommand(),$link);
			mysql_close($link);
		}
	}
	
	var $G = "";
	
	function CBDBManager($grp){
		include('KeyChain.php');
		$this->options = $options;
		$G = $grp;
		$con = $this->DBLink();
		if (!$con)
		  {
		  die('Could not connect: ' . mysql_error());
		  }

		if (mysql_query("CREATE DATABASE ".$this->options['database'],$con))
		  {
		  echo "Database created";
		  }
		else
		  {
			  if(mysql_errno() != 1007){
				echo "Can not creating database: " . mysql_errno();
			  }
		  }

		mysql_close($con);
	}
}

?>