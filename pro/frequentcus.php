<html>
<head>
	<title>Frequent Customers</title>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,400italic,600,600italic|Open+Sans+Condensed:300,300italic,700' rel='stylesheet' type='text/css'>
  <link href="https://assets.mightymerchant.com/bootstrap_332/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://assets.mightymerchant.com/bootstrap_332/css/bootstrap-theme.min.css" rel="stylesheet">
	<link href="https://assets.mightymerchant.com/plug-ins/glyphicons-pro/css/glyphicons.css" rel="stylesheet">
	<link href="https://assets.mightymerchant.com/plug-ins/glyphicons-pro/css/social.css" rel="stylesheet">
	<link href="https://assets.mightymerchant.com/mm-css/mm-framework.css" rel="stylesheet">
	<link href="https://www.mightymerchant.com/css/stylesheet-local-mighty.css" rel="stylesheet">
		<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
 <header>
	Stockwave
    <div class="container hidden-print">
      <div class="row">
				<div class="col-sm-6 col-md-4">
					<div id="logo"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQrQc6gPdXkE6oxVyQKdLa3YQ0QCG6eoylkiP3JvXDtKPZynNU21g" class="img-responsive" alt="Stockwave delivers everything you need to sell your products online including a flexible shopping cart, an easy to use site manager, credit card payment processing, PayPal payment integration - plus we top it off with personal service."></div>
				</div>
				<div class="col-sm-6 col-md-8 hidden-xs">
					<div class="tagline"><p>Wholesale Purchases</p></div>
				</div>
			</div>
		</div>
  </header>
	<nav class="navbar navbar-default" role="navigation">
 		<div class="container">
			<div class="collapse navbar-collapse top-nav-collapse">
				<ul class="nav navbar-nav">
					<li><a href="home.html">Home</a></li>
					<li class="dropdown"><a class="dropdown-toggle " href="b.html">Item List<b class="caret"></b></a></li>
					<li class="dropdown"><a class="dropdown-toggle " href="a.html">Customers<b class="caret"></b></a></li>
					<li class="dropdown"><a class="dropdown-toggle " href="c.html">Buyers<b class="caret"></b></a></li>
					<li class="dropdown"><a class="dropdown-toggle " href="d.html">Purchasers<b class="caret"></b></a></li>
					<li class="dropdown"><a class="dropdown-toggle " href="e.html">Stocks<b class="caret"></b></a></li>
					<li><a href="inseruser.php">Add Member</a></li>
					<li><a href="login.php">Logout</a></li>		
				</ul>
			</div>
		</div>
	</nav>
	<div class="container">
		<div class="row"><br><br><br><br>
			

<?php 
$con = mysqli_connect('localhost','root','lenovo','Wholesale');
mysqli_query($con,"drop table cus_count");
mysqli_query($con,"create table cus_count(cusid INT,count INT)");
mysqli_query($con,"insert into cus_count(cusid,count) select cusid,count(cusid) from purchasers GROUP BY cusid");

$a=mysqli_query($con,"select cus_count.cusid,customers.cusname,customers.cusaddr,customers.cusphone from cus_count JOIN customers ON (cus_count.cusid=customers.cusid) where cus_count.count>4");
echo "<table border='1' style='color:#FFA500'>
<tr style='color:#DC143C'><th>&nbsp;&nbsp;&nbsp;&nbsp;customerid&nbsp;&nbsp;&nbsp;&nbsp;</th><th>&nbsp;&nbsp;&nbsp;&nbsp;customername&nbsp;&nbsp;&nbsp;&nbsp;</th><th>&nbsp;&nbsp;&nbsp;&nbsp;customeraddress&nbsp;&nbsp;&nbsp;&nbsp;</th><th>&nbsp;&nbsp;&nbsp;&nbsp;contact_no&nbsp;&nbsp;&nbsp;&nbsp;</th></tr>";
while($row=mysqli_fetch_array($a)){

$x=$row['cusid'];
$y=$row['cusname'];
$z=$row['cusaddr'];
$p=$row['cusphone'];
//echo $x."  ".$y."  ".$z."  ".$p."<br>";
echo "<tr>";
echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$x."</td>";
echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$y."</td>";
echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;".$z."</td>";
echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;".$p."</td>";
echo"</tr>";
}
echo "</table>";
mysqli_query($con,"drop table cus_count");

?></div></div>
</body>
</html>







