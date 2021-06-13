<html>
<link rel="stylesheet" href="s1.css" type="css">
<body>
  <?php //if(isset($_POST["submit"])) :
    ?>
  <?php
   $servername = 'localhost';
   $username = 'pavan';
   $password = '';
   $dbname = 'campus';

  // Create connection
   $conn = mysqli_connect($servername, $username, $password, $dbname) or die("connection failed");


   global $studentname ;
   global $studentpass ;
   if(isset($_POST["textname"]))
   {
    $studentname = $_POST["textname"];
   }
   if(isset($_POST["pass"]))
   {
    $studentpass = $_POST["pass"];
   }
   else
   {
     # code...
     $studentpass = "null" ;
   }
  
   $sql = "SELECT name,password FROM students where name='$studentname' and password='$studentpass'";
   $result = mysqli_query($conn, $sql);

  
   if(mysqli_num_rows($result) > 0)
   {
     echo "Welcome $studentname<br />" ;
     $sql2 = "SELECT * FROM company;";
     $result2 = mysqli_query($conn, $sql2);
     if(mysqli_num_rows($result2))
     {
       echo "<style>table, th, td {
 border: 1px solid black;</style>" ;
       echo "<table>" ;
       echo "<th>Name</th>"   ;
       echo "<b style='color:blue;'>Company Details</b><br />" ;
       echo "<tbody>" ;
       echo "<th>Name</th>   <th>Post Job</th>  <th>Salary</th>  <th>GPA</th>  <th>Email</th> </b><br />" ;
       while($row = mysqli_fetch_assoc($result2))
       {
         echo "<tr><td> &nbsp "  . $row["name"] . " &nbsp </td>" ;
         echo " &nbsp <td>"  . $row["post_job"] . " &nbsp</td>" ;
         echo " &nbsp <td>"  . $row["salary"] . " &nbsp</td>" ;
         echo " &nbsp <td>"  . $row["eligibility_criteria"] . " &nbsp</td>" ;
         echo " &nbsp <td>"  . $row["email"] . " &nbsp</td></tr> <br />" ;
       }
       echo "</tbody>" ;
       echo "</table>" ;
       echo "<form method='post' action='studentapplyjob.php'>
               <input type='text' name='stud' placeholder='Enter your name' />
               <input type='text' name='company' placeholder='Enter company'/>
               <input type='text' name='job' placeholder='Enter your preferred job'/>
               <button type='submit' value='submit'>SUBMIT</button>
            </form>" ;
       echo "<a style='margin-left: 5%;' href='index.php.html'>LOGOUT</a>";
     }
     else
     {
        echo "No companies have applied" ;
        echo "<a style='margin-left: 5%;' href='index.php'>LOGOUT</a>";
        //echo "<a style='margin-left: 5%;' href=http://localhost/index.php.html>LOGOUT</a>";
     }
   }
   else
   {
      echo "<center><h1>Invalid Username or Password</h1></center>" ;
      //echo "<a style='margin-left: 10%;' href=http://localhost/campus.html>BACK</a>" ;
      echo "<center><a href='index.php'>BACK</a></center>";
   }
   mysqli_close($conn);
   ?>

</body>
</html>
