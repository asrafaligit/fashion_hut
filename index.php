<?php extract($_POST);
?>
  <head>
   
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script >    
      src="https://kit.fontawesome.com/64d58efce2.js"
       
      crossorigin="anonymous"
    </script> 
    <link rel="stylesheet" href="style.css" />
    <title>Sign in & Sign up Form</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form method="post" class="sign-in-form" action="#">
            <h2 class="title">Sign in</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Username" name="txtnameu" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" name="txtpassu"/>
             </div>
            <button type="submit" name="submit1"  class="btn solid"> Login </button>
            <?php
                    $found=false;
                    //FOR LOGIN 
                    if(isset($submit1) )
                    {    
                        $conn3 = new mysqli("localhost", "root", "", "fashionhut");
                        // Check connection
                        if ($conn3->connect_error) {
                            die("Connection failed: " . $conn3->connect_error);
                        }

                        $uname = $_POST['txtnameu'];
                        session_start();
                        $_SESSION['uname']=$uname;
                        $pass = $_POST['txtpassu'];
                        if(($uname == 'admin')&&($pass=='admin123')){
                          header("Location: adminhome.php");
                        }

                        $sql3 = "SELECT * FROM entry_detail";
                        $result3 = $conn3->query($sql3);

                        while($row = $result3->fetch_assoc()) 
                        {

                            if( $row["username"]==$txtnameu &&  $row["password"]==$txtpassu )
                            {    
                                $found=true;
                                setcookie( 'user_name' , $row['username'] );
                                setcookie( 'user_email' , $row['email'] );
                                header("Location:frontpage.php");  //redirect
                            }                           
                        } 
                        if($found==false)
                            echo '<p class="db" style="border:solid;border-color:red;padding:4px;"> Invalid Username/Password!!! </p> '; 
                        $conn3->close(); 
                    }
                     
            ?>
            </form>
          

           <form class="sign-up-form" action="#" method="post">
            <h2 class="title">Sign up</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Username" name="newusername" />
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" placeholder="Email" name="newemail" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" name="newpassword" />
            </div>
            <button type="submit" name="submit12" class="btn"> Sign-up </button>

            <?php
            $register=false;
            if(isset($submit12))
            {  
                $conn2 = new mysqli("localhost", "root", "", "fashionhut");
                // Check connection
                if ($conn2->connect_error) {
                    die("Connection failed: " .$conn2->connect_error);
                }
            $sql2 = "INSERT INTO entry_detail(username,email,password) VALUES('$newusername','$newemail','$newpassword');";
            if ($conn2->query($sql2) === TRUE) {
                $register=true;
                echo '<script>alert("Registration Successfull ! ") </script>'; 
            }
                // else {  echo '<p class="db" style="border:solid;border-color:red;padding:8pt;"> Error in Registration !!! </p> '; 
                
             $conn2->close();
            }   
       ?>
            
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>FASHION HUT</h3>
            <p>
              CREATE YOUR ACCOUNT NOW !!!
            </p>
            <button class="btn transparent" id="sign-up-btn">
              Sign up
            </button>
          </div>
          <img src="img/log.svg" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>YOU HAVE AN ACCOUNT ??</h3>
            <p>
                LOGIN HERE !!
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Sign in
            </button>
          </div>
          <img src="img/register.svg" class="image" alt="" />
        </div>
      </div>
    </div>
    <script src="app.js"></script>
  </body>
</html>
