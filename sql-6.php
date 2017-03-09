<!DOCTYPE>
<html>  
 <body>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>xss-1</title>
  <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 	
 </body>
  <div class="container">
  		<!-- 页头 -->
  		<div class="row">

  			<div class="col-xs-6 col-sm-6 col-md-6">
  				<div class="page-header">
  					<h1>SQl Injection</h1>
  				</div>
  			</div>	
  			<div class="col-xs-6 col-sm-6 col-md-6">
  				<nav aria-label="Page navigation">
    				<ul class="pagination">
   	 	 				<li>
      					<a href="#" aria-label="Previous">
        					<span aria-hidden="true">&laquo;</span>
      					</a>
    					</li>
    					<li><a href="SQL-1.php">1</a></li>
    					<li><a href="SQL-2.php">2</a></li>
    					<li><a href="SQl-3.php">3</a></li>
    					<li><a href="SQl-4.php">4</a></li>
    					<li><a href="SQL-5.php">5</a></li>
    					<li><a href="SQl-6.php">6</a></li>
    					<li><a href="SQl-7.php">7</a></li>
    					<li><a href="SQl-8.php">8</a></li>
    					<li>
     					 	<a href="#" aria-label="Next">
       				 		<span aria-hidden="true">&raquo;</span>
      					</a>
    					</li>
    					<p class="text-center">注入参数 id</p>
  					</ul>
					</nav>
  			</div>
  		</div>
  	</div>
  	<div class="container">
<?php 
//数据库连接
include("sql-connect.php");

//屏蔽mysql错误
ini_set('display_errors', 'off');
error_reporting(E_ALL^E_NOTICE^E_WARNING);

function sqlentities($var) {
	$var = str_replace("select"," ",$var);
	$var = str_replace("sleep"," ",$var);
	$var = str_replace("and"," ",$var);
	$var = str_replace("from"," ",$var);
	$var = str_replace("where"," ",$var);
	$var = str_replace("union"," ",$var);
	
	return $var;
	}

echo "<div class='text-center'>";
if(isset($_GET['id'])) {
	$id = sqlentities($_GET['id']);
	echo "传入的值:id=" .$id;
	echo "<br>";
	 	

$sql_query="SELECT * FROM users WHERE id=$id LIMIT 0,1";
print_r("$sql_query");
echo "<br>";
$result = mysql_query($sql_query);

$arr = mysql_fetch_array($result);

if ($arr) {
	echo "<br>";
	echo "<br>";
	echo "Username: " .$arr['username'];
	echo "<br>";
	echo "Password: " .$arr['password'];
	echo "<br>";}
	else {
		echo "<br>";
		echo "sql查询失败";}
	echo "</div>";
}
?>

  		  		
  	</div>
  	<br>
		<br>
  	<div class="container text-center">
			<a href="#" class="btn btn-info " role="button">About</a>
		</div>
</html>