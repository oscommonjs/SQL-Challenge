<?php 
//数据库连接
include("sql-connect.php");
/*
//屏蔽mysql错误
ini_set('display_errors', 'off');
error_reporting(E_ALL^E_NOTICE^E_WARNING);
*/
function collect_data(){   
	$sql = "select * from users";  
	$result = mysql_query($sql);   
	$colum= mysql_fetch_array($result);  
  return colum;  
}  

echo "<div class='text-center'>";
$username=$_POST['username'];  
$password=$_POST['password'];  
if($name == "")  
{   
    echo "请填写用户名<br>";  
     echo"<script type='text/javascript'>alert('请填写用户名');location='sql-8.php';  
            </script>";         
}  
elseif($password == "")  
{  
     //echo "请填写密码<br><a href='login.php'>返回</a>";  
    echo"<script type='text/javascript'>alert('请填写密码');location='sql-8.php';</script>";    
}  
else  
{   
    $colum=collect_data();  
     if(($colum['username'] == $username) && ($colum['password'] == $password))  
        {  
         //echo "验证成功！<br>";  
            echo"<script type='text/javascript'>alert('登陆成功');</script>";  
         }             
     else  
         //echo "密码错误<br>";  
        echo"<script type='text/javascript'>alert('密码错误');</script>";  
     //echo "<a href='login.php'>返回</a>";  
 }
?>
