<?php
$buyer_id=$_POST['buyer_id'];
$buyer_name=$_POST['buyer_name'];
$buyer_addr=$_POST['buyer_addr'];
$stock_id=$_POST['stock_id'];
$buyer_number=$_POST['buyer_number'];
$link=@mysqli_connect("localhost","root","lenovo","Wholesale");
$link->begin_transaction();
echo $buyer_id;
echo $buyer_name;
echo $buyer_addr;
echo $stock_id;
echo $buyer_number;

$result=mysqli_query($link,"select buyerid from buyers");
while($row=$result->fetch_assoc())
{
if($row['buyerid']!=$buyer_id)
{
mysqli_query($link,"insert into buyers(buyerid,buyername,buyeraddr,stockid,contact_no) values($buyer_id,'$buyer_name','$buyer_addr',$stock_id,$buyer_number)");
$link->commit();
}
}
?>

