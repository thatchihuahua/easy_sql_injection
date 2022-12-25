<html>
  <meta charset="UTF-8">
  <head>
    <title>Login Page</title>
  </head>
  <body>

<?php
//followings 3 lines are for enabling error display from php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


//connect to database
// change root_password and database_name
$db = new mysqli('localhost', 'root', 'root_password', 'database_name');

// connection check
if (mysqli_connect_error()) {
  die('Fail to make a connection');
}

echo "Success! Connection established \n";

$uid = $_POST['uid'];
$pass = $_POST['password'];
$query = "select email from users where uid='$uid' and passwd='{$pass}'";

$result=mysqli_query($db,$query);

if (mysqli_num_rows($result) == 0) {
  echo "Wrong username or wrong password";
  exit;
}

while ($row = mysqli_fetch_assoc($result)) {
  print('email address : '.$row['email']);
  print('<br>');
}

//end connecion
mysqli_close($db);
?>

  <a href="index.html">Back to Login Page</a>
  </body>
</html>
