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

        $p_id=$_POST['p_id'];
        $p_name=$_POST['p_name'];
        $p_add=$_POST['p_add'];
        $w_id=$_POST['w_id'];

        $myquery="INSERT INTO patient(p_id,p_name,p_add,w_id) VALUES('$p_id',' $p_name','$p_add','$w_id')";

        if(mysqli_query($connection,$myquery)){
           header("Location:p_done.php");
         }
        else{
           echo mysqli_error($connection);
      }
}

?>