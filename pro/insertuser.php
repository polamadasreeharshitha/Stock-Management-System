<html>
<head>
  <meta charset="utf-8">
  <title>Add Member Form</title>
  <?php
  echo "<link rel='stylesheet' type='text/css' href='style1.css' />";
  echo "<link rel='stylesheet' type='text/css' href='font-awesome.css' />";
?>
</head>
<body>
  <form action='home.html' method = 'post'>
      <input type='submit' name='submit' value='Home' class='btn-login' />
    </form>
  <div class="loginBox1">
    
    <form method="post" action="signup.php">
      <h2>Sign Up</h2>
      <p>Member Name</p>
      <input type="text" name="username" placeholder="username" required>
      <p>Password</p>
      <input type="password" name="password" placeholder="password" required>
      <p>Address</p>
      <input type="text" name="addr" placeholder="address" required>
      <p>Mobile Number</p>
      <input type="number" name="mobile" placeholder="mobile" required>
      <input type="submit" name="submit" value="Add"/>
    </form>
  </div>
</body>
</html>