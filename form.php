<?php

    $servername = "localhost";
	$username = "root";
	$password="";
	$dbname="animal";
	$city= ucfirst($_POST['city']);

	$to="kushagrasahu276@gmail.com";
	$subject="asf";
	$message="asdf";
	$from="manishagpt324@gmail.com";
	$headers="From :$from";


	mail($to,$subject,$message,$headers);

	$conn = mysqli_connect($servername, $username, $password, $dbname);
	if(!$conn){
		echo "Error";
	}
	else{
		echo "Connection Established"."<br>";

		
	
		$sql = "SELECT email FROM ngos where city='$city'";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
			//   echo ("name:" . $row["name"]."email:".$row["email"]."phoneNUM:". $row["phno"]."city:".$row["city"]."<br>");
				 echo($row['email']."<br>");
				 
			}
			// echo('<script>alert("asdf");</script>');
		  } else {
			echo "0 results";
		  }

	}

    // if($_SERVER['REQUEST_METHOD']=='POST'){
    //     $a = $b = $c = $d = "";
    //     $a = $_POST["name"];
    //     $b = $_POST["email"];
    //     $c = $_POST["phno"];
    //     $d = $_POST["city"];

    //     echo "$a.<br>";	
    //     echo "$b.<br>";
    //     echo "$c.<br>";
    //     echo "$d.<br>";

	// // $temp = "INSERT INTO feedback(name, mail, subject, message) VALUES ('$a', '$b', '$c', '$d')";

	// mysqli_query($conn, $temp) or die("Query Failed");
	// echo "<script type='text/javascript'>alert('Data Submitted'</script>";

	mysqli_close($conn);
        
?>