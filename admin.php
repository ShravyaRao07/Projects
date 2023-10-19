<!DOCTYPE html>

<?php
session_start();
include("config.php");
?>
<html lang="en">

<head>
<style>
		/*@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');*/
{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins" , sans-serif;
}
body{
  min-height: 100vh;
  width: 600px;
  position: relative;
  left: 200px;
  display: flex;
  align-items: center;
  justify-content: center;
  background:none;
  background-image:url(reg.jpg) ;
  background-repeat: no-repeat;
  background-size:cover;
  padding: 30px;
}
.body .p{
  position: relative;
  bottom: 200px;
  left: 700px;
  font-size: 20px;
}
.containerr{
  position: relative;
  max-width: 650px;
  width: 100%;
  border: none;
  background: none;
  padding: 40px 30px;
  box-shadow: 0 5px 10px rgba(0,0,0,0.2);
  perspective: 2700px;
  

}



.containerr .signup-formm{
  width: calc(200% / 2 );
}
.forms .form-content .titlee{
  position: relative;
  font-size: 24px;
  font-weight: 500;
 
}

 .titlee{
  color: black;
  font-size: 40px;
  position: relative;
  left: 70px;
  
}

.signup-formm .input-boxess{
  margin-top: 30px;
}
.signup-formm .input-boxx{
  display: flex;
  align-items: center;
  height: 50px;
  width: 100%;
  margin: 10px 0;
  position: relative;
  
}
.signup-formm .input-boxx input{
  height: 100%;
  width: 100%;
  outline: none;
  border: none;
  padding: 0 30px;
  color:  black;
  font-size: 16px;
  font-weight: 500;
  border-bottom: 2px solid rgba(0,0,0,0.2);
  transition: all 0.3s ease;
  background :transparent;
}
.signup-formm .input-boxx input::placeholder{
  color: rgb(63, 63, 63);
  cursor: text;
  font-size: 15px;
  

}
.signup-formm.input-boxx input:focus,
.signup-formm .input-boxx input:valid{
  border-color: wheat;
}
.signup-formm .input-boxx i{
  position: absolute;
  color: black;
  font-size: 17px;
}
.signup-formm .textt{
  font-size: 18px;
  font-weight: 500;
  
}
.signup-formm .textt a{
  text-decoration: none;
  color: black;
 
}
.signup-formm .textt a:hover{
  text-decoration: underline;
  color: #fff;
}
.signup-formm .button{
  color: #fff;
  margin-top: 40px;
}
.signup-formm .button input{
  color: black;
  font-weight: bolder;
  background:white;
  border-radius: 6px;
  padding: 0;
  cursor: pointer;
  transition: all 0.4s ease;
}
.signup-formm .button input:hover{
  background: red;
}
.signup-formm label{
  color: black;
  /*cursor: pointer; */
}
.signup-formm label:hover{
	color: black;
	text-decoration: underline;
  
  

}

.signup-formm .sign-up-textt{
  text-align: center;
  margin-top: 25px;
}


	</style>

	<?php include("head.php");?>

</head>

<body>

<?php include("top_nav.php"); ?>

    

<?php

if(isset($_POST['signup'])){
	$name      = $_POST['name'];
	$email     = $_POST['email'];
	$password  = $_POST['password'];
	$confirm   = $_POST['confirm'];
	$reg       = "/^[a-zA-Z ]+$/";
	
	$errors    = array();
	if(empty($name)){
		$errors['name_error'] = "Name is required";
	} else if(!preg_match($reg, $name)){
		$errors['name_error'] = "Only Characters are allowed";
		$name = "";
	}

	if(empty($email))
	{
		$errors['email_error'] = "Email is required!";
	}else
	{
		$Email_check = $con->query("SELECT email FROM login WHERE email = '$email'");
		if($Email_check->num_rows >1)
		{

			$errors['email_error'] = "Sorry this email is already exist";
			$email = "";
		}
		else
		{
			
		}
	}
	if(empty($password))
	{
		$errors['password_error'] = "Password is required";
	}
	else if(strlen($password) < 6)
	{
		$errors['password_error'] = "Your password is too short";
		$password = "";
	}
	if(empty($confirm))
	{
		$errors['confirm_error'] = "Confirm password is required";
	}
	else if($confirm != $password)
	{
		$errors['confirm_error'] = "Please confirm your password!";
		$confirm = "";
	}
	if(!empty($name) && !empty($email) && !empty($password) && !empty($confirm))
	{
		
		$Query = $con->query("INSERT INTO login (name,email,password) VALUES ('$name','$email','$password')");
		if($Query)
		{
			header("location:log.php?signup_success='Your acccount is successfully created!'");
		}
		else
		{
			echo "<script>alert('Sorry query not work')</script>";
		}
		
	}

}

 ?>

<!DOCTYPE html>
<!-- Coding by CodingLab | www.codinglabweb.com-->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Login and Registration Form </title>
    <link rel="stylesheet" href="css/user/regst.css">
    <!-- Fontawesome CDN Link -->
    <script src="https://kit.fontawesome.com/cdd3068599.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
   </head>
<body>
	
	
</div>
  <div class="containerr">
    <div class="signup-formm">
          <div class="titlee">SIGNUP</div>
		  <div class="form-groupp">
        <form action="" method= "POST">
							<?php 
                            if(isset($errors)): ?>
                            <?php foreach($errors as $error_show): ?>
                            	<ul>
                            		<li id="res" style="color:black">
									<?php echo $error_show; ?></li>
                            	</ul>
                            <?php endforeach; ?>
                        <?php endif; ?>
							</div>
            <div class="input-boxess">
              <div class="input-boxx">
                <i class="fas fa-userr"></i>
                <input type="text" name="name" placeholder="Enter your name" required>
              </div>
              <div class="input-boxx">
                <i class="fas fa-envelopee"></i>
                <input type="text" name="email" placeholder="Enter your email" required>
              </div>
              <div class="input-boxx">
                <i class="fas fa-lockk"></i>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
              </div>
              <div class="input-boxx">
                <i class="fas fa-lockk"></i>
                <input type="text" name="confirm" placeholder="confirm your password" required>
              </div>
	
              
              
              
              
              

              <div class="button input-boxx">
                <input type="submit" name="signup" value="Sumbit">
              </div>
              <div class="textt sign-up-textt">Already have an account? <a href ="log.php">Login now</a></div>
			  
            </div>
      </form>
      
    </div>
    </div>
    </div>
  </div>
</body>
</html>


        <!-- Footer 
       <?php include"footer.php";?> -->
  
        </div>
      
  
</body>

</html>
