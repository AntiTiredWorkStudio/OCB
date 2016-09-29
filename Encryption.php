<?php
	$SafeList = ['115.159.121.254','117.100.88.67','127.0.0.1'];
	function ConfirmIPIsSafe($IP){
		$SafeList = $GLOBALS['SafeList'];
		for($x=0;$x<count($SafeList);$x++){
			if($IP == $SafeList[$x]){
				return true;
			}
		}
		echo '<html><head></head><body><h1>您访问的功能超过了你的权限。</h1></body></html>';
		
		return false;
	}
	function GetIP(){
	 if(!empty($_SERVER["HTTP_CLIENT_IP"])){
	  $cip = $_SERVER["HTTP_CLIENT_IP"];
	 }
	 elseif(!empty($_SERVER["HTTP_X_FORWARDED_FOR"])){
	  $cip = $_SERVER["HTTP_X_FORWARDED_FOR"];
	 }
	 elseif(!empty($_SERVER["REMOTE_ADDR"])){
	  $cip = $_SERVER["REMOTE_ADDR"];
	 }
	 else{
	  $cip = "无法获取！";
	 }
	 return $cip;
	}
	function encrypt($data, $key)
	{
		$char = '';
		$str = '';
		$key	=	md5($key);
		$x		=	0;
		$len	=	strlen($data);
		$l		=	strlen($key);
		for ($i = 0; $i < $len; $i++)
		{
			if ($x == $l) 
			{
				$x = 0;
			}
			$char .= $key{$x};
			$x++;
		}
		for ($i = 0; $i < $len; $i++)
		{
			$str .= chr(ord($data{$i}) + (ord($char{$i})) % 256);
		}
		return utf8_encode($str);
	}
	
	
	function decrypt($data, $key)
	{
		$char = '';
		$str = '';
		$key = md5($key);
		$x = 0;
		$data = utf8_decode($data);
		$len = strlen($data);
		$l = strlen($key);
		for ($i = 0; $i < $len; $i++)
		{
			if ($x == $l) 
			{
				$x = 0;
			}
			$char .= substr($key, $x, 1);
			$x++;
		}
		for ($i = 0; $i < $len; $i++)
		{
			if (ord(substr($data, $i, 1)) < ord(substr($char, $i, 1)))
			{
				$str .= chr((ord(substr($data, $i, 1)) + 256) - ord(substr($char, $i, 1)));
			}
			else
			{
				$str .= chr(ord(substr($data, $i, 1)) - ord(substr($char, $i, 1)));
			}
		}
		return $str;
	}
?>