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
   $sql_query="SELECT * FROM patient WHERE p_id='$s_id';";
   $result = mysqli_query($connection,$sql_query);
   if(mysqli_num_rows($result)>0){
       while($row=mysqli_fetch_assoc($result)){
        echo "Name: " . $row["p_name"]. "<br>";
        echo "Address: " . $row["p_add"]. "<br>";
        echo "Ward No: " . $row["w_id"];
       }
   }
   
   }



?>