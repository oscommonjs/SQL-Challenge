<?php

//数据库设置
$dbusername = 'root';
$dbpassword = '';
$dbname = 'challenge';
$host = '127.0.0.1:3306';

$con = mysql_connect($host,$dbusername,$dbpassword);
if(!$con) {
	echo "数据库连接失败" .mysql_error();
	}
@mysql_select_db($dbname,$con) or die ( "Unable to connect to the database: $dbname");
?>