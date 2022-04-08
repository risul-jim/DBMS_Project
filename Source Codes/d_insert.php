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
    echo"||Connection Successful with Customer Table||";
    echo "<br>";
    echo "<br>";

        $d_id=$_POST['d_id'];
        $d_name=$_POST['d_name'];
        $d_add=$_POST['d_add'];
        $w_id=$_POST['w_id'];

        $myquery="INSERT INTO doctor(d_id,d_name,d_add,w_id) VALUES('$d_id',' $d_name','$d_add','$w_id')";

        if(mysqli_query($connection,$myquery)){
           header("Location:d_done.php");
         }
        else{
           echo mysqli_error($connection);
      }
}

?>