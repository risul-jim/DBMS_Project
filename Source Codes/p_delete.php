<?php
echo " <h1>Displaying Data of Searched Patient</h1>";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital_management";

$connection= mysqli_connect($servername,$username,$password,$dbname);

if($connection==false){
    die("Connection Failed".mysqli_connect_error());
}
else{


   $s_id=$_POST['src'];
   $sql_query="DELETE FROM patient WHERE p_id='$s_id';";

   if(mysqli_query($connection,$sql_query)){
    header("Location:p_delete_done.php");
  }
 else{
    echo mysqli_error($connection);
}
   
   }



?>