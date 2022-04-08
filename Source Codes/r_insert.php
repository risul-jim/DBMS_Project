<?php
echo " <h1>Insert Data into Database</h1>";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital_management";

$connection= new mysqli($servername,$username,$password,$dbname);

if($connection==false){
    die("Connection Failed".mysqli_connect_error());
}
else{
    echo"||Connection Successful with Registration Table||";
    echo "<br>";
    echo "<br>";

        $p_id=$_POST['p_id'];
        $w_id=$_POST['w_id'];
        $r_date=$_POST['r_date'];

        $myquery="INSERT INTO registration(p_id,w_id,r_date) VALUES('$p_id','$w_id','$r_date')";

        if(mysqli_query($connection,$myquery)){
           header("Location:r_done.php");
         }
        else{
           echo mysqli_error($connection);
      }
}

?>