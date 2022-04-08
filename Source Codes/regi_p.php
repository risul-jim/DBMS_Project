<?php
echo " <h1>Displaying Data of All Patients</h1>";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital_management";

$connection= mysqli_connect($servername,$username,$password,$dbname);

if($connection==false){
    die("Connection Failed".mysqli_connect_error());
}
else{
    echo "_______________________________________________________________________________________________________";


   $sql_query="SELECT * FROM patient INNER JOIN registration ON patient.p_id=registration.p_id;";
   $result = mysqli_query($connection,$sql_query);
   if(mysqli_num_rows($result)>0){
       while($row=mysqli_fetch_assoc($result)){
        echo "<br>"."Registration ID: " . $row["r_id"]."\x20\x20\x20\x20\x20"."||"."\x20\x20\x20\x20\x20";
        echo "Patient ID: " . $row["p_id"]."\x20\x20\x20\x20\x20"."||"."\x20\x20\x20\x20\x20";   
        echo "Patient Name: " . $row["p_name"]."\x20\x20\x20\x20\x20"."||"."\x20\x20\x20\x20\x20";
        echo "Patient Address: " . $row["p_add"]."\x20\x20\x20\x20\x20"."||"."\x20\x20\x20\x20\x20";
        echo "Ward No: " . $row["w_id"]."\x20\x20\x20\x20\x20"."||"."\x20\x20\x20\x20\x20";
        echo "Registration Date: " . $row["r_date"]."<br>";
        echo "_______________________________________________________________________________________________________";
       }
   }
   
   }



?>