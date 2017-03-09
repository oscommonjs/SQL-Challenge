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
  <style type="text/css">
.head-info {
  padding: 5px 0;
  text-align: center;
  font-weight: 600;
  font-size: 2em;
  color: #fff;
  background: #23232e;
  height: 50px;
	border-top-left-radius: 10px;
	-webkit-border-top-left-radius: 10px;
	-moz-border-top-left-radius: 10px;
	-o-border-top-left-radius: 10px;
	border-top-right-radius: 10px;
	-webkit-border-top-right-radius: 10px;
	-moz-border-top-right-radius: 10px;
	-o-border-top-right-radius: 10p
}
input[type="text"] {
	  width: 70%;
	  padding: 1em 2em 1em 3em;
	  color: #9199aa;
	  font-size: 18px;
	  outline: none;
	  background: url(../images/adm.png) no-repeat 10px 15px;
	  border: none;
	  font-weight: 100;
	  border-bottom: 1px solid#484856;
	  margin-top: 2em;
}
 input[type="password"]{
	  width: 70%;
	  padding: 1em 2em 1em 3em;
	  color: #dd3e3e;
	  font-size: 18px;
	  outline: none;
	  background: url(../images/key.png) no-repeat 10px 23px;
	  border: none;
	  font-weight: 100;
	  border-bottom: 1px solid#484856;
	  margin-bottom: 3em;
 }
.key {
   background: url(../images/pass.png) no-repeat 447px 17px;
}
input[type="submit"]{
  font-size: 30px;
  color: #fff;
  outline: none;
  border: none;
  background: #3ea751;
  width: 100%;
  padding: 18px 0;
  border-bottom-left-radius: 15px;
	-webkit-border-bottom-left-radius: 15px;
	-moz-border-bottom-left-radius: 15px;
	-o-border-bottom-left-radius: 15px;
	border-bottom-right-radius: 15px;
	-webkit-border-bottom-right-radius: 15px;
	-moz-border-bottom-right-radius: 15px;
	-o-border-bottom-right-radius: 15px;
	cursor: pointer;
}
input[type="submit"]:hover {
	background: #ff2775;
  border-bottom-left-radius: 15px;
	-webkit-border-bottom-left-radius: 15px;
	-moz-border-bottom-left-radius: 15px;
	-o-border-bottom-left-radius: 15px;
	border-bottom-right-radius: 15px;
	-webkit-border-bottom-right-radius: 15px;
	-moz-border-bottom-right-radius: 15px;
	-o-border-bottom-right-radius: 15px;
  	transition: 1s all;
	-webkit-transition: 1s all;
	-moz-transition: 1s all;
	-o-transition: 1s all;
}
label.lbl-1 {
  background: #6756ea;
  width: 20px;
  height: 20px;
  display: block;
  float: right;
  border-radius: 50%;
  margin: 16px 10px 0px 0px;
}
label.lbl-2 {
  background: #ea569a;
  width: 20px;
  height: 20px;
  display: block;
  float: right;
  border-radius: 50%;
   margin: 16px 10px 0px 0px;
}
label.lbl-3 {
  background: #f1c85f;
  width: 20px;
  height: 20px;
  display: block;
  float: right;
  border-radius: 50%;
  margin: 16px 10px 0px 0px;
}	
  </style>
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
  					</ul>
					</nav>
  			</div>
  		</div>
  	</div>
  	<div class="container">
  		<div class="col-xs-6 col-sm-6 col-md-6">
  		<div class="login-form">
  			<div class="close"></div>
  			<div class="head-info">
  				<label class="lbl-1"></label>
  				<label class="lbl-2"></label>
          <label class="lbl1-3"></label>
  			</div>
  			<div class="close"></div>
  			<div class="avyar">
  				<img src="">
  			</div>
  			<form action="login.php" method="post">
  				<input type="text" class="text" name="username" value="usernmae" onfocus="this.value = '';">
  				<div class="key">
  					<input type="password" name="usernmae" value="password" onfocus="this.value = '';">
  				</div>
  				<div class="signin">
  					<input type="submit" value="Login">
  				</div>
  			</form>
  		</div>
  	</div>
  	</div>
  	<div class="container">

  		  		
  	</div>
  	<br>
		<br>
  	<div class="container text-center">
			<a href="#" class="btn btn-info " role="button">About</a>
		</div>
</html>