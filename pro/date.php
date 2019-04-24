<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <title>Customer Details on a given Date Form</title>
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
<h1 id="hsub" itemprop="name">Customer Details on a given date Form</h1>
  <div class="well mtl">
 <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
 	<input type="hidden" name="purchaserform" value="purchaserform">
          <legend>Customer Details on a given Date</legend>
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
<div class="container">
  <div class="container mm-columns mm-forms">
  <div class="row">
    
<div class="col-sm-9">

    <?php 
    #echo "<h2>Your Output:</h2>";
$con = mysqli_connect('localhost','root','lenovo','Wholesale');
$year = $_POST['year'];
$month = $_POST['month'];
$day = $_POST['day'];
#$buyerid = $_POST['buyerid'];
#mysqli_query($con,"delete from buyers where buyerid=$buyerid");
#$sql="select stocks.stockid,item,itemcp,itemsp from stocks JOIN itemprice ON(itemprice.stockid=stocks.stockid)";
$sql = "SELECT cusid, stockid, purchase_quantity, year, month, day, item_amount FROM purchasers where year=$year and month=$month and day=$day";
$result = $con->query($sql);
if ($result->num_rows > 0) {
    // output data of each row

    echo "<table border='1' style='color:#FFA500'>
      <tr style='color:#DC143C'>
    <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Customer Id &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
    <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Stock Id &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
    <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Purchaser Quantity &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
    <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Date &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
    <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Item Amount &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
  </tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; " . $row["cusid"] . " </td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $row["stockid"] . " </td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; " . $row["purchase_quantity"] . " </td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; " . $row["day"] . "-" . $row["month"]. "-" . $row["year"] . " &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ".$row['item_amount'] . "</td></tr>";
    }
} else {
    #echo "0 results";
}
$res = mysqli_query($con,"SELECT SUM(item_amount) AS value_sum FROM purchasers where year=$year and month=$month and day=$day"); 
$row = mysqli_fetch_assoc($res); 
$sum = $row['value_sum'];
#$a = "SELECT SUM(item_amount) FROM purchasers where year=2018 and month=2 and day=26";
#$r = $con->query($a);
echo "<tr><td></td><td></td><td></td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Total:</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$sum</td></tr>";
$con->close();
echo "<br>";
echo "</table>";
echo "<br><br><br><br>";
#$con = mysqli_connect('localhost','root','lenovo','Wholesale');
#$cus_id = $_POST['cusid'];
#$stock_quantity = $_POST['quantity'];
#$year = $_POST['year'];
#$month = $_POST['month'];
#$day = $_POST['day'];

#mysqli_query($con,"insert into stockdate(stockid,stockqua,year,month,day) values($stock_id,$stock_quantity,$year,$month,$day)");
#mysqli_query($con,"update stockdate set stockdate.buyer_amount=(select stocks.itemcp from stocks where stockdate.stockid=stocks.stockid)");
#mysqli_query($con,"update stockdate set stockdate.buyer_amount=stockdate.buyer_amount * stockdate.stockqua");
#mysqli_query($con,"select * from cutomers where cusid=$cusid");
#mysqli_query($con,"update stockdate set stockdate.buyer_amount=(select stocks.itemcp from stocks where stockdate.stockid=stocks.stockid) where stockdate.stockid=$stock_id and stockdate.day=$day and stockdate.month=$month and stockdate.year=$year");
#mysqli_query($con,"update stockdate set stockdate.buyer_amount=(stockdate.buyer_amount * stockdate.stockqua) where stockdate.stockid=$stock_id and stockdate.day=$day and stockdate.month=$month and stockdate.year=$year");

?></div></div></div></div>

</body>
</htsml>

