<!DOCTYPE>
<html>
	<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>xss-1</title>
  <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body>
  	<div class="container">
  		<!-- 页头 -->
  		<div class="row">

  			<div class="col-xs-6 col-sm-6 col-md-6">
  				<div class="page-header">
  					<h1>SQL-Challeng-setdb</h1>
  				</div>
  			</div>	
  			<div class="col-xs-6 col-mx-6 col-md-6">
  				<nav arial-label="Page navigation">
  					<ul class="pagination">
        			<li><a href="#">数据库设置</a></li>
        			<li><a href="#">数据库操作</a></li>
  					</ul>
  				</nav>
  			</div>
  		</div>
		</div>
		<div class="container text-conter">
<?php 

include("sql-connect.php");

//连接数据库
$con = mysql_connect($host,$dbusername,$dbpassword);
if(!$con) {
	echo "连接失败：" . mysql_error();}

//对数据库进行操作
$sql1 = "DROP DATABASE IF EXISTS chanllenge";
if(mysql_query($sql1)) {
		echo "删除SQLChallenge成功";
		echo "<br>";}
	else {
		echo  mysql_error();
		echo "<br>";}
$sql2 = "CREATE DATABASE `challenge` CHARACTER SET `gbk`";
if(mysql_query($sql2)) {
	echo "成功创建数据库";
	echo "<br>";}
	else {
		echo mysql_error();
		echo "<br>";}
$sql3 = "CREATE TABLE challenge.users (id int(3) NOT NULL AUTO_INCREMENT, username varchar(20) NOT NULL, password varchar(20) NOT NULL, PRIMARY KEY (id))";
if(mysql_query($sql3)) {
	echo "成功写入字段";
	echo "<br>";}
	else {
		echo mysql_error();
		echo "<br>";} 
$sql4="INSERT INTO challenge.users (id, username, password) VALUES ('1', 'kevin', 'Kevin'), ('2', 'angle', 'angle'''), ('3', 'Miss', 'miss')";		
if(mysql_query($sql4)) {
	echo "成功写入数据";
	echo "<br>";}
	else {
		echo mysql_error();
		echo "<br>";}
$sql5 = "CREATE TABLE challenge.emails
				(
				id int(3)NOT NULL AUTO_INCREMENT,
				email_id varchar(30) NOT NULL,
				PRIMARY KEY (id)
				)";
if(mysql_query($sql5)) {
	echo "成功创建新的数据表";
	echo "<br>";}
	else {
		echo mysql_error();
		echo "<br>";}	
$sql6="INSERT INTO `challenge`.`emails` (id, email_id) VALUES ('1', 'Dumb@dhakkan.com'), ('2', 'Angel@iloveu.com'), ('3', 'Dummy@dhakkan.local'), ('4', 'secure@dhakkan.local'), ('5', 'stupid@dhakkan.local'), ('6', 'superman@dhakkan.local'), ('7', 'batman@dhakkan.local'), ('8', 'admin@dhakkan.com')";
if(mysql_query($sql6)) {
	echo "成功写入数据";
	echo "<br>";}
	else {
		echo mysql_error();
		echo "<br>";}

?>
		</div>
		<br>
		<br>
		<div class="container text-center">
			<a href="#" class="btn btn-info " role="button">About</a>
		</div>
		<br>
		<br>
	</body>

</html>