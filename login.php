<?php

include 'connect.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
} else {
   $user_id = '';
}

if(isset($_POST['submit'])) {

   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING); 
   $pass = sha1($_POST['pass']);
   $pass = filter_var($pass, FILTER_SANITIZE_STRING); 

   $select_users = $conn->prepare("SELECT * FROM `users` WHERE email = ? AND password = ? LIMIT 1");
   $select_users->execute([$email,$pass]);
   $row = $select_users->fetch(PDO::FETCH_ASSOC);

   if($select_users->rowCount() > 0) {
         setcookie('user_id', $row['id'], time() + 60*60*24*30, '/');
         header('location:home.php');
         exit(); 
   } else {
      $warning_msg[] = 'Incorrect email or password!';
   }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login</title>

   <link rel="stylesheet" href="login.css">
   <style>
        body {
            background-image: url('registerlogin.avif');
            background-size: cover; 
            background-repeat: no-repeat; 
            background-attachment: fixed; 
        }
    </style>
</head>
<body>

<section class="form-container">

   <form action="" method="post">
      <h3>Welcome back!</h3>
      <div class="inputBox">
      <input type="email" id="email" name="email" required maxlength="50" autocomplete="off">
      <span>Email</span>
      </div>
      <br>
      <div class="inputBox">
      <input type="password" id="password" name="pass" required maxlength="20">
      <span>Password</span>
      </div>
      <input type="submit" value="Login now" name="submit" class="btn" id="login_btn">
      <p>don't have an account? <a href="registerform.php">register now</a></p>
   </form>

</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<?php include 'message.php'; ?>

</body>
</html>
