<?php
    $servername="localhost";
    $username="root";
    $dbpassword="";
    $dbname="users_login";

    $conn=mysqli_connect($servername,$username,$dbpassword,$dbname);
     
    if(!$conn){
        die("invalid");
    }
    
   
    if(isset($_POST['email']))
    {

      $x=$_POST['email'];
      $y=$_POST['pass'];
    }
    
    else
    {
      $x=0;$y=1;
    }
    //  $z=password_hash($y,PASSWORD_DEFAULT);
       
      $temp="SELECT * FROM users WHERE email='$x'";
      $res=mysqli_query($conn,$temp);

      if(mysqli_num_rows($res)>0){
          while($row=mysqli_fetch_assoc($res)){
             if(password_verify($y,$row['password'])){
   
                  header("Location:./index.html");

             }
             else{
               
                $counter=1;
                // echo("<div>wrong password</div>");
             }
          }
      }
      else
      {
        if(isset($_POST['email']))
        {

          echo "user not found!";
        }
      }

      
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"> 
     <link rel="stylesheet" href="login.css">
</head>
<body>
    

     <section class="login">
          <div class="login_box">
               <div class="left">
                    <div class="top_link"><a href="register.html"><img src="https://drive.google.com/u/0/uc?id=16U__U5dJdaTfNGobB_OpwAJ73vM50rPV&export=download" alt="">Register</a></div>
                    <div class="contact">
                         <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

                              <h3>SIGN IN</h3>
                              <input type="email" placeholder="E-mail" name="email" required>
                              <input type="password" placeholder="Password" name="pass" id="pass" required>
                              <!-- <div id="contact1">sdfdsf</div> -->
                              <button class="submit" >LET'S GO</button>

                              
                         </form>

                         <div class="error-container">

                              <div class="email-error" id="email-error">
                                   <p>wrong password</p>
                                   <button class="btn" onClick="close_email()">X</button>
                              </div>
                              
                         </div>
                         
                    </div>
               </div>
               <div class="right">
                    <div class="right-text">
                         <img src="images/dogi.jpg">
                    </div>
                    <div class="right-inductor"><img src="https://lh3.googleusercontent.com/fife/ABSRlIoGiXn2r0SBm7bjFHea6iCUOyY0N2SrvhNUT-orJfyGNRSMO2vfqar3R-xs5Z4xbeqYwrEMq2FXKGXm-l_H6QAlwCBk9uceKBfG-FjacfftM0WM_aoUC_oxRSXXYspQE3tCMHGvMBlb2K1NAdU6qWv3VAQAPdCo8VwTgdnyWv08CmeZ8hX_6Ty8FzetXYKnfXb0CTEFQOVF4p3R58LksVUd73FU6564OsrJt918LPEwqIPAPQ4dMgiH73sgLXnDndUDCdLSDHMSirr4uUaqbiWQq-X1SNdkh-3jzjhW4keeNt1TgQHSrzW3maYO3ryueQzYoMEhts8MP8HH5gs2NkCar9cr_guunglU7Zqaede4cLFhsCZWBLVHY4cKHgk8SzfH_0Rn3St2AQen9MaiT38L5QXsaq6zFMuGiT8M2Md50eS0JdRTdlWLJApbgAUqI3zltUXce-MaCrDtp_UiI6x3IR4fEZiCo0XDyoAesFjXZg9cIuSsLTiKkSAGzzledJU3crgSHjAIycQN2PH2_dBIa3ibAJLphqq6zLh0qiQn_dHh83ru2y7MgxRU85ithgjdIk3PgplREbW9_PLv5j9juYc1WXFNW9ML80UlTaC9D2rP3i80zESJJY56faKsA5GVCIFiUtc3EewSM_C0bkJSMiobIWiXFz7pMcadgZlweUdjBcjvaepHBe8wou0ZtDM9TKom0hs_nx_AKy0dnXGNWI1qftTjAg=w1920-h979-ft" alt="">
                  </div>
               </div>
          </div>
     </section>
</body>

<script>
  
  var x=<?php echo "$counter" ?>;
  console.log(x);

  if(x==1)
  {
    var disp=document.getElementById("email-error");
    disp.style.display="block";
  }


  function close_email()
  {
    disp.style.display="none";
  }
      
  </script>
</html>