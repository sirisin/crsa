<html>
<body>
  <?php
  $servername = 'localhost';
  $username = 'pavan';
  $password = '';
  $dbname = 'campus';

  // Create connection
   $conn = mysqli_connect($servername, $username, $password, $dbname) or die("connection first step error");
  // Check connection
   if(!$conn)
   {
     die("Connection failed: " . mysqli_connect_error());
   }

   //variables
   $name = $_POST["firstname"];
   $studentpass = $_POST["password"];
   $mobno = $_POST["mobile"];
   $gender = $_POST["gender"];
   $email = $_POST["email"];
   $address = $_POST["address"];
   $sslc = $_POST["SSLC"];
   $hsc = $_POST["HSC"];
   $cgpa = $_POST["cgpa"];
   $languages = $_POST["lang"];
   $intern = $_POST["intern"];
   $preferred = $_POST["country"];

   //insert query
   $sql = "insert into students (name,mobile_no,gender,email,address,sslc,hsc,cgpa,languages,internships,preferred_loc,password,applied_job,company_applied) values ('$name',$mobno,'$gender','$email','$address',$sslc,$hsc,$cgpa,'$languages','$intern','$preferred','$studentpass','null','null');";
   //returns results
   $result = mysqli_query($conn, $sql);
   
   /*foreach($_REQUEST as $value){
    ("values in request array are :".$value)."<br>";}*/
    
   if($result)
   {
      echo "Registered successfully" ;
      //echo "<a style='margin-left: 10%;' href=http://localhost/index.php.html>BACK</a>" ;
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
