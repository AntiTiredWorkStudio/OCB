<?php
$options = [
	'server' => '115.159.121.254',
    'user'  => 'konglf2112',
    'password'  => '3226460036',
	'database' => 'CBDB' ,
	'mainTable' => 'CBTableOthers',
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
$content = [
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
	];
?>