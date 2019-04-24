<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <title>Available Stock List</title>
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
  
  <div class="row">
    <div class="col-sm-9"><br>
<h1 id="hsub" itemprop="name" align="center">Available Stock List</h1>
  <br>
    <table border='2' align="center" style='color:#FFA500'>
      <tr style='color:#DC143C'>
    <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Stock Id &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
    <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Available stock &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
  </tr>
    <?php 
$con = mysqli_connect('localhost','root','lenovo','Wholesale');
#$buyerid = $_POST['buyerid'];
#mysqli_query($con,"delete from buyers where buyerid=$buyerid");
#$sql="select stocks.stockid,item,itemcp,itemsp from stocks JOIN itemprice ON(itemprice.stockid=stocks.stockid)";
$sql = "delimiter $$
        create trigger bs after insert on stockdate for each row begin declare qty int; declare sid int; set qty=new.stockqua; set sid=new.stockid; update available_stock a set a.avail_stock=a.avail_stock+qty where a.stockid=sid ;end$$";
mysqli_query($con,$sql);
$sq="delimiter $$
     create trigger rs after insert on purchasers for each row begin declare qty int; declare sid int; set qty=new.purchase_quantity; set sid=new.stockid; update available_stock a set a.avail_stock=a.avail_stock-qty where a.stockid=sid ;end$$";
mysqli_query($con,$sq);
$s = "SELECT stockid, avail_stock FROM available_stock";
$result = $con->query($s);
if ($result->num_rows > 0) {
    // output data of each row
    
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; " . $row["stockid"] . " </td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; " . $row["avail_stock"] . " </td></tr> " ;
    }
} else {
    echo "0 results";
}

?></table>
<br><br><br>
 
    </div>
   </div>
  
</div>
</body>

</html>
