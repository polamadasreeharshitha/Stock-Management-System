<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <title>Profit Details</title>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,400italic,600,600italic|Open+Sans+Condensed:300,300italic,700' rel='stylesheet' type='text/css'>
  <link href="https://assets.mightymerchant.com/bootstrap_332/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://assets.mightymerchant.com/bootstrap_332/css/bootstrap-theme.min.css" rel="stylesheet">
  <link href="https://assets.mightymerchant.com/plug-ins/glyphicons-pro/css/glyphicons.css" rel="stylesheet">
  <link href="https://assets.mightymerchant.com/plug-ins/glyphicons-pro/css/social.css" rel="stylesheet">
  <link href="https://assets.mightymerchant.com/mm-css/mm-framework.css" rel="stylesheet">
  <link href="https://www.mightymerchant.com/css/stylesheet-local-mighty.css" rel="stylesheet">
  <?php
  echo "<link rel='stylesheet' type='text/css' href='style.css' />";
  echo "<link rel='stylesheet' type='text/css' href='font-awesome.css' />";
?>
</head>
<body>
 <header>
 <div class="row">
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
          <li class="dropdown"><a class="dropdown-toggle " href="c.html">Suppliers<b class="caret"></b></a></li>
          <li class="dropdown"><a class="dropdown-toggle " href="d.html">Purchasers<b class="caret"></b></a></li>
          <li class="dropdown"><a class="dropdown-toggle " href="e.html">Stocks<b class="caret"></b></a></li>
          <li><a href="insertuser.php">Add Member</a></li>
          <li><a href="login.php">Logout</a></li>    
        </ul>
      </div>
    </div>
  </nav>
  <div class="container">
  <div class="container mm-columns mm-forms">
  <div class="row"><br><br><br><br><br>

      <div class="col-sm-9">
      <img src="profitloss.jpeg" align="right">
<?php 
$con = mysqli_connect('localhost','root','lenovo','Wholesale');
mysqli_query($con,"drop table sup_amount");
mysqli_query($con,"drop table pur_amount");
mysqli_query($con,"create table sup_amount(month INT,supplier_amount INT)");
mysqli_query($con,"insert into sup_amount(month,supplier_amount) select month,sum(buyer_amount) from stockdate GROUP BY month");
mysqli_query($con,"create table pur_amount(month INT,purchaser_amount INT)");
mysqli_query($con,"insert into pur_amount(month,purchaser_amount) select month,sum(item_amount) from purchasers GROUP BY month");
$a=mysqli_query($con,"select sup_amount.month,sup_amount.supplier_amount,pur_amount.purchaser_amount,pur_amount.purchaser_amount-sup_amount.supplier_amount as profit from pur_amount JOIN sup_amount ON (sup_amount.month=pur_amount.month)");
echo "<table border='1' style='color:#FFA500'>
<tr style='color:#DC143C'>&nbsp;&nbsp;<th>&nbsp;&nbsp;month&nbsp;&nbsp;</th>&nbsp;&nbsp;<th>&nbsp;&nbsp;supplier_amount&nbsp;&nbsp;</th>&nbsp;&nbsp;<th>&nbsp;&nbsp;purchaser_amount&nbsp;&nbsp;</th>&nbsp;&nbsp;<th>&nbsp;&nbsp;&nbsp;&nbsp;profit&nbsp;&nbsp;</th>&nbsp;&nbsp;</tr>&nbsp;&nbsp;";
while($row=mysqli_fetch_array($a)){

$x=$row['month'];
$y=$row['supplier_amount'];
$z=$row['purchaser_amount'];
$p=$row['profit'];
//echo $x."  ".$y."  ".$z."  ".$p."<br>";
echo "<tr>";
echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$x."</td>";
echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$y."</td>";
echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$z."</td>";
echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;".$p."&nbsp;&nbsp;&nbsp;&nbsp;</td>";
echo"</tr>";
}
echo "</table>";
mysqli_query($con,"drop table sup_amount");
mysqli_query($con,"drop table pur_amount");
?>
</div>
</div>
</div></div></div>
</body>
</html>