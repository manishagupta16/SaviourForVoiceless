
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <title>Saviour For Voiceless</title>
      <link rel="stylesheet" href="mystyle.css">
      <!-- bootstrap cdn link -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   </head>
   <body>
      <div class="container">
         <div class="row">
            <div class="col-md-4 offset-md-4 mail-form">
               <h2 class="text-center">
                  Send Message
               </h2>
               <p class="text-center">
                  Send mail to every NGO in your respective city
               </p>
               <!-- starting php code -->
               <?php

                        $servername="localhost";
                        $username="root";
                        $dbpassword="";
                        $dbname="animal";

                        $recipient = "";

                        $conn=mysqli_connect($servername,$username,$dbpassword,$dbname);


                        if(!$conn){
                        die("invalid");
                        }

                       

                  //first we leave this input field blank
                 
                  //if user click the send button
                  if(isset($_POST['send'])){
                      //access user entered data
                     // $recipient = $_POST['email'];
                        $selectOption = $_POST['citylist'];

                     
                        $temp="SELECT DISTINCT email FROM ngos WHERE city='$selectOption'";
                        $qexecute=mysqli_query($conn,$temp) or die("error occuered mail");

                        // $row
                       
                        

                     
                        // $recipient=$row[0];

                     $subject = $_POST['subject'];
                     $message = $_POST['message'];
                     $sender = "From: manishagpt324@gmail.com";
                     //if user leave empty field among one of them
                     if(empty($subject) || empty($message)){
                         ?>
                         <!--  -->
               <!-- display an alert message if one of them field is empty -->
               <div class="alert alert-danger text-center">
                  <?php echo "All inputs are required!" ?>
               </div>
               <?php
                  }
                  else{
                     
                     while($row = mysqli_fetch_array($qexecute))
                     {
                        
                        // echo();
                        

                      // PHP function to send mail
                     if(mail($row['email'], $subject, $message, $sender)){
                      ?>
               <!-- display a success message if once mail sent sucessfully -->
               <div class="alert alert-success text-center">
                  <?php echo "Your mail successfully sent to ". $row['email'];?>
               </div>
               <?php
                  $recipient = "";
                  }else{
                   ?>
               <!-- display an alert message if somehow mail can't be sent -->
               <div class="alert alert-danger text-center">
                  <?php echo "Failed while sending your mail!" ?>
               </div>
               <?php
                  }
                  }//else blockkkk enb
                  }

                  }
                  ?> <!-- end of php code -->
               <form action="mail.php" method="POST">
                 <div class="form-group">
                 <select name="citylist" id="citylist" style="width:100%;border-radius:5px;padding:8px 0px;border-color:lightgrey;">
                 <?php
                        $servername="localhost";
                        $username="root";
                        $dbpassword="";
                        $dbname="animal";

                        $conn=mysqli_connect($servername,$username,$dbpassword,$dbname);


                        if(!$conn){
                        die("invalid");
                        }

                        $citye="SELECT DISTINCT city FROM ngos";
                        $cityq=mysqli_query($conn,$citye) or die("error occuered mail");

                        while($row = mysqli_fetch_array($cityq))
                        {

                             echo ("name:" . $row["name"]."email:".$row["email"]."phoneNUM:". $row["phno"]."city:".$row["city"]."<br>");
                             echo("<option value='$row[city]'>".$row['city'].'</option>');     
                        }
                 ?>


                 </select>

                 </div>






                  <div class="form-group">
                     <input class="form-control" name="subject" type="text" placeholder="Subject">
                  </div>
                  <div class="form-group">
                     
                     <textarea cols="30" rows="5" class="form-control textarea" name="message" placeholder="Compose your message.."></textarea>
                  </div>
                  <div class="form-group">
                     <input class="form-control button btn-primary" type="submit" name="send" value="Send" placeholder="Subject">
                  </div>
               </form>
            </div>
         </div>
      </div>
   </body>
</html>