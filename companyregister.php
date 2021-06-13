<?php

//database connection
$servername = 'localhost';
$username = 'pavan';
$password = '';
$dbname = 'campus';


//$conn = mysqli_connect($servername, $username, $password, $dbname) or die("connection first step error");
$conn = mysqli_connect($servername, $username, $password, $dbname) or die("connection first step error");
// Check connection
 if(!$conn)
 {
   die("Connection failed: " . mysqli_connect_error());
 }

$name = $_POST['name'] ;
$pass = $_POST['password'] ;
$job = $_POST['post_job'];
$salary = $_POST['salary'];
$criteria = $_POST['eligibility_criteria'];
$email=$_POST['email'] ;


//query

$sql = "INSERT INTO `company`(`name`, `password`, `post_job`, `salary`, `eligibility_criteria`, `email`) VALUES ('$name','$pass','$job','$salary','$criteria','$email');";
$result = mysqli_query($conn, $sql);
    
   if($result)
   {
      echo "Registered successfully" ;
      echo "<a style='margin-left: 10%;' href='./index.php'>BACK</a>" ;

   }
   else
   {
      echo "Error in registration" ;
      echo $conn->error;
      echo "<a style='margin-left: 10%;' href='./index.php'>BACK</a>" ;
   }
   mysqli_close($conn);
   ?>
</body>
</html>




>?