<?php
echo " <h1>Displaying Data of Registered Patients</h1>";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital_management";

$connection= mysqli_connect($servername,$username,$password,$dbname);

if($connection==false){
    die("Connection Failed".mysqli_connect_error());
}
else{
    echo "_____________________________________________________________________";


   $sql_query="SELECT * FROM patient;";
   $result = mysqli_query($connection,$sql_query);
   if(mysqli_num_rows($result)>0){
       while($row=mysqli_fetch_assoc($result)){
        echo "<br>"."Patient ID: " . $row["p_id"]."\x20\x20\x20\x20\x20"."||"."\x20\x20\x20\x20\x20";   
        echo "Patient Name: " . $row["p_name"]."\x20\x20\x20\x20\x20"."||"."\x20\x20\x20\x20\x20";
        echo "Patient Address: " . $row["p_add"]."\x20\x20\x20\x20\x20"."||"."\x20\x20\x20\x20\x20";
        echo "Ward No: " . $row["w_id"]."<br>";
        echo "_____________________________________________________________________";
       }
   }
   
   }



?>