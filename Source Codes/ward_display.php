<?php
echo " <h1>Displaying Doctors Information</h1>";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital_management";

$connection= mysqli_connect($servername,$username,$password,$dbname);

if($connection==false){
    die("Connection Failed".mysqli_connect_error());
}
else{
    echo "_______________________________";


   $sql_query="SELECT * FROM ward;";
   $result = mysqli_query($connection,$sql_query);
   if(mysqli_num_rows($result)>0){
       while($row=mysqli_fetch_assoc($result)){
        echo "<br>"."Ward ID: " . $row["w_id"]."\x20\x20\x20\x20\x20"."||"."\x20\x20\x20\x20\x20"."\x20\x20\x20\x20\x20"."\x20\x20\x20\x20\x20";   
        echo "Ward Name: " . $row["w_name"]."\x20\x20\x20\x20\x20"."<br>";
        echo "_______________________________";
       
   }
   
}
}



?>