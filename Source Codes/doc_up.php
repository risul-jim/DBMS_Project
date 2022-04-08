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


   $u_id=$_POST['d_id'];
   $d_name=$_POST['d_name'];
   $d_add=$_POST['d_add'];
   $sql_query="UPDATE doctor SET d_name='$d_name',`d_add`='$d_add' WHERE d_id=$u_id";

   if(mysqli_query($connection,$sql_query)){
    header("Location:doc_up_done.php");
  }
 else{
    echo mysqli_error($connection);
}
   
   }



?>