


<!DOCTYPE html>
<?php
session_start();
include("config.php");
?>
<html lang="en">

<head>

	<?php include("head.php");?>

</head>

<body>
    <?php

include("top_nav.php"); 
if(isset($_POST['login']))
{
    
    $email = $_POST['email'];
    $password = $_POST['password'];
    $error = array();
    $sql="SELECT * FROM login WHERE email='$email' and  password='$password'";
    $result=mysqli_query($con, $sql);
    if(mysqli_num_rows($result) >0 )
    {
        $row = mysqli_fetch_array($result);
        if($row['usertype'] == "admin")
        {
            
            $_SESSION['admin_id'] = $row['id'];
            $_SESSION['email'] = $row['email'];
            header("location:admin_inbox.php");
        }
        elseif($row['usertype'] == "user")
        {
          $_SESSION['id'] = $row['id'];
          $_SESSION['email'] = $row['email'];
          header("location:index.php");
        }
        
   }
   else
        {
          echo "<script>alert('incorrect email or password')</script> ";
        }
  
}

$msg='';
?>

 

<!DOCTYPE html>

<html lang="en">

<head>
<style>
    

    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Poppins" , sans-serif;
      }
      body{
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background: none;
        padding: 30px;
        background-image: url(log.jpg);
        background-repeat: no-repeat;
        background-size:cover;
      }
      .containerr{
      position: relative;
      max-width: 650px;
      width: 100%;
      background: none;
      padding: 40px 30px;
      box-shadow: 0 5px 10px rgba(0,0,0,0.2);
      perspective: 2700px;
    }
      .containerr .formss{
        height: 100%;
        width: 100%;
        background: none;
      }
      .containerr .form-contentt{
        display: flex;
        align-items: center;
        justify-content: space-between;
      }
    .form-contentt .login-formm{
      width: calc(100% / 2 - 25px);
    }
    .formss .form-contentt .titlee{
      position: relative;
      font-size: 30px;
      font-weight: 500;
      left: 150px;
      color: black;
      font-style: oblique;
      
    }
    .formss .form-contentt .titlee:before{
      
      position: absolute;
      left: 0;
      bottom: 0;
      height: 3px;
      width: 25px;
      background: goldenrod;
    }
    .formss .signup-formm  .titlee:before{
        width: 20px;
      }
      .formss .form-contentt .input-boxess{
        margin-top: 30px;
      }
      .formss .form-contentt .input-boxx{
        display: flex;
        align-items: center;
        height: 50px;
        width: 100%;
        margin: 10px 0;
        position: relative;
        
      }
      .form-contentt .input-boxx input{
        height: 100%;
        width: 68%;
        outline: none;
        border: none;
        padding: 0 30px;
        font-size: 16px;
        color:  white;
        font-weight: 500;
        
        border-bottom: 1px solid goldenrod;
        border-left: 1px solid goldenrod;
        border-right:1px solid goldenrod;
        border-top: 1px solid goldenrod;
        border-radius: 10px 10px 10px 10px;
        transition: all 0.3s ease;
        background :transparent;
      }
      
      .form-contentt .input-boxx i{
        position: absolute;
    
        
        color: goldenrod;
        font-size: 17px;
    
      }
      
    .formss .form-contentt .textt{
        font-size: 14px;
        font-weight: 500;
        color: #fff;
      }
      .formss .form-contentt .textt a{
        text-decoration: none;
      }
      .formss .form-contentt .text a:hover{
        text-decoration: underline;
      }
      .formss .form-contentt .button{
        color: #fff;
        margin-top: 40px;
      }
      .formss .form-contentt .button input{
        color: black;
        font-weight: bolder;
        font-size: 23px;
        background: none;
        
        padding: 0;
        cursor: pointer;
        transition: all 0.4s ease;
      }
      .formss .form-contentt .button input:hover{
        background: red;
      }
      .formss .form-contentt label{
        color: goldenrod;
        cursor: pointer;
      }
      .formss .form-contentt label:hover{
        text-decoration: underline;
      }
      .textt a{
        color: goldenrod;
        font-size: 18px;
      }
      .formss .form-contentt .login-text
      {
        text-align: center;
        margin-top: 25px;
      }
      .form-contentt .login-formm{
        width: 100%;
      }
      </style>
    

    <meta charset="UTF-8">

    <title>Document</title>

    <script src="https://kit.fontawesome.com/cdd3068599.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/user/logst.css">

</head>

<body>

 

<div class="containerr">

   

    <div class="formss">

        <div class="form-contentt">

          <div class="login-formm">

            <div class="titlee">Login</div>

          <form action="" method ="POST">

            <div class="input-boxess">

              <div class="input-boxx">

                <i class="fas fa-envelopee"></i>
                
                <input type="email" name="email" placeholder="Enter your email" autofocus required>

              </div>

              <div class="input-boxx">

                <i class="fa-solid fa-lockk"></i>

                <input type="password" name="password" placeholder="Enter your password" required>

              </div>

             

              <div class="button input-boxx">

                <input type="submit" name="login" value="Submit" ></div>

                

               <br><br>

               <div id="resultt" style="color: goldenrod;"><?php echo $msg?></div>

               <br><br>

                <div class="textt sign-up-textt">Don't have an account? <a href = "admin.php">Signup now</div>

               

               

               

            </div>

        </form>

      </div>

               

    </div>

  </div>

  <?php include"footer.php";?>

</body>

</html>

 

 


 

