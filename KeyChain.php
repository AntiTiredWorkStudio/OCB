<?php
$options = [
	'server' => '115.159.121.254',
    'user'  => 'konglf2112',
    'password'  => '3226460036',
	'database' => 'CBDB' ,
	'mainTable' => 'CBTableOthers',
	'groupTable' => 'CBGroups',
	'mainTableFormate' => 'CREATE TABLE #DB#.#TB# 
							(`CBName` VARCHAR(32) NOT NULL ,
							 `CBSong` VARCHAR(32) NOT NULL ,
							 `CBTime` VARCHAR(15) NOT NULL ,
							 `CBLink` VARCHAR(128) NOT NULL ,
							 `CBPOSTTIME` TIME NOT NULL ,
							 `CBPOSTDATE` DATE NOT NULL ,
							 `CBGroup` VARCHAR(32) NOT NULL,
							 `CBCName` VARCHAR(128) NOT NULL
							 ) ENGINE = InnoDB DEFAULT CHARSET=UTF8;',
	'groupTableFormate' => 'CREATE TABLE `cbgroups` (
  `GID` varchar(32) NOT NULL,
  `GName` varchar(32) NOT NULL,
  `GEnrollLink` varchar(128) NOT NULL,
  `GSignLink` varchar(128) NOT NULL,
  `GRule` varchar(360) NOT NULL,
  `GSLLPath` varchar(128) NOT NULL,
  `GSLIPath` varchar(128) NOT NULL,
  `GPOSTTIME` time NOT NULL,
  `GPOSTDATE` date NOT NULL,
  `GDayMax` int(11) NOT NULL DEFAULT \'5\',
  `GDurMax` int(11) NOT NULL DEFAULT \'3\'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;',
	'tcc' => 'SqlTable.txt',
	'key' => 'cbword',
	'defaultSongList'=>'#Date#
	#GroupName#歌单
	 #Content#
	签到:
	http://changba.com/s/
	报名:
	http://changba.com/s/',
	'defaultSongItem'=>'#Index#:
	*#UserName#
	*《#Song#》
	*#Time#
	*#Link#
	
	'
	];
/*$content = [
	'10001'=>[
		'Group' => '自由联盟',
		'DayMax' => 5,
		'DurMax' => 3,
		'slist' => 'sources/ListModule.txt',
		'scontent' => 'sources/ContentModule.txt'
		],
	'10002'=>[
		'Group' => '尽情的嗨尽情的唱',
		'DayMax' => 5,
		'DurMax' => 3,
		'slist' => 'sources/ListModule_10002.txt',
		'scontent' => 'sources/ContentModule_10002.txt'
		],
	'10003'=>[
		'Group' => '友谊之帆',
		'DayMax' => 5,
		'DurMax' => 3,
		'slist' => 'sources/ListModule_10003.txt',
		'scontent' => 'sources/ContentModule_10003.txt'
		],
	'10004'=>[
		'Group' => '天涯绝情谷',
		'DayMax' => 5,
		'DurMax' => 3,
		'slist' => 'sources/ListModule_10003.txt',
		'scontent' => 'sources/ContentModule_10003.txt'
		]
		,
		'10005'=>[
		'Group' => '北京之家',
		'DayMax' => 5,
		'DurMax' => 3,
		'slist' => 'sources/ListModule_10005.txt',
		'scontent' => 'sources/ContentModule_10005.txt'
		]
		//#NEWGROUP#
		
		
		
	];*/
?>