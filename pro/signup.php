<?php 
$con = mysqli_connect('localhost','root','lenovo','Wholesale');
$uname=$_POST['username'];
$password=$_POST['password'];
$phone=$_POST['mobile'];
$addr=$_POST['addr'];
$result=mysqli_query($con,"select * from login where user='$uname'");
$row=$result->fetch_assoc();
$a=mysqli_query($con,"select * from login where user='$uname' and password='$password' and mobile_no=$phone and address='$addr'");
#echo "Helloworld".mysqli_num_rows($a);
if(mysqli_num_rows($a)==0){
mysqli_query($con,"insert into login(user,password,mobile_no,address) values('$uname','$password',$phone,'$addr')");
}
if(mysqli_num_rows($a)>0){
	echo "Already Logined In";
	header('Location: /pro/insertuser.php');
	
}
if(sizeof($row)==0){
       
   header('Location: /pro/login.php');
  }
  
?>