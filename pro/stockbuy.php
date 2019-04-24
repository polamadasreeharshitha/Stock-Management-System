<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <title>Add Stock Details Form</title>
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
  <div class="row">
    <div class="col-sm-9">
<h1 id="hsub" itemprop="name">Add Stock Details Form</h1>
  <div class="well mtl">
 <form method="post" action="stockbuy.php">
 	<input type="hidden" name="purchaserform" value="addpurchaserform">
          <legend>Add Stock Details</legend>
        <div class="form-group">
            <label for="Stock_id">Stock_id</label>
 			<input type="number" class="form-control input-sm" name="stockid" placeholder="stock_id">
 		</div>
 		<div class="form-group">
            <label for="Stock_quantity">Stock_quantity</label>
 			<input type="number" class="form-control input-sm" name="quantity" placeholder="stock_quantity">
 		</div>
 		<div class="form-group">
            <label for="Year">Year</label>
 	        <input type="number" class="form-control input-sm" name="year" placeholder="year">
 	    </div>
 	    <div class="form-group">
            <label for="Month">Month</label>
 			<input type="number" class="form-control input-sm" name="month" placeholder="month">
 		</div>
 		<div class="form-group">
            <label for="Day">Day</label>
 			<input type="number" class="form-control input-sm" name="day" placeholder="day">
 		</div>
 	<input type="reset" value="Reset" class="btn btn-primary">
 	<input type="submit" value="SUBMIT" class="btn btn-primary">
 </form>
 </div>
    </div>
   </div>
  <span class="totop"><a href="#"><span class="glyphicon glyphicon-chevron-up"></span></a></span>
</div>
</div>
<?php 
$con = mysqli_connect('localhost','root','lenovo','Wholesale');
$stock_id = $_POST['stockid'];
$stock_quantity = $_POST['quantity'];
$year = $_POST['year'];
$month = $_POST['month'];
$day = $_POST['day'];

#mysqli_query($con,"insert into stockdate(stockid,stockqua,year,month,day) values($stock_id,$stock_quantity,$year,$month,$day)");
#mysqli_query($con,"update stockdate set stockdate.buyer_amount=(select stocks.itemcp from stocks where stockdate.stockid=stocks.stockid)");
#mysqli_query($con,"update stockdate set stockdate.buyer_amount=stockdate.buyer_amount * stockdate.stockqua");
mysqli_query($con,"insert into stockdate(stockid,stockqua,year,month,day) values($stock_id,$stock_quantity,$year,$month,$day)");
mysqli_query($con,"update stockdate set stockdate.buyer_amount=(select stocks.itemcp from stocks where stockdate.stockid=stocks.stockid) where stockdate.stockid=$stock_id and stockdate.day=$day and stockdate.month=$month and stockdate.year=$year");
mysqli_query($con,"update stockdate set stockdate.buyer_amount=(stockdate.buyer_amount * stockdate.stockqua) where stockdate.stockid=$stock_id and stockdate.day=$day and stockdate.month=$month and stockdate.year=$year");

?>
</body>
</htsml>

