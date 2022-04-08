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
    echo"||Connection Successful with Ward Table||";
    echo "<br>";
    echo "<br>";

        $w_id=$_POST['w_id'];
        $w_name=$_POST['w_name'];

        $myquery="INSERT INTO ward(w_id,w_name) VALUES('$w_id','$w_name')";

        if(mysqli_query($connection,$myquery)){
           header("Location:w_done.php");
         }
        else{
           echo mysqli_error($connection);
      }
}

?>