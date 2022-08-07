<?php

    $servername = "localhost";
	$username = "root";
	$password="";
	$dbname="animal";

	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// if(!$conn){
	// 	echo "Error";
	// }
	// else{
	// 	echo "Connection Established"."<br>";
	// }

    if($_SERVER['REQUEST_METHOD']=='POST'){
        $a = $b = $c = $d = "";
        $a = $_POST["name"];
        $b = $_POST["phno"];
        $c = $_POST["city"];
        $d = $_POST["message"];
        $e = $_POST["image"];

        // echo "$a.<br>";
        // echo "$b.<br>";
        // echo "$c.<br>";
        // echo "$d.<br>";
        echo "$e";

	$temp = "INSERT INTO contact(name, phno, city, message, image) VALUES ('$a', '$b', '$c', '$d', '$e')";

	mysqli_query($conn, $temp) or die("Query Failed");
	echo "<script type='text/javascript'>alert('Data Submitted'</script>";
}
	mysqli_close($conn);

?>