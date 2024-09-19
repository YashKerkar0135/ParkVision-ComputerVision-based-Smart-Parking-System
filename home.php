<?php  

include 'connect.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
}

?>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SPS</title>
  <link rel="stylesheet" href="home.css">
  <script src="https://kit.fontawesome.com/dd26978ca1.js"crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Include SweetAlert2 CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

  <!-- Include SweetAlert2 JS -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>

</head>
<body>

  <header class="header">
    <div>
    <!-- <img src="logo.png" alt="Park Vision"style="height:90px;width:260px;"> -->
    <!-- <img class="overlay-image"src="logo.png" alt=""> -->
    </div> 
    <!-- <h1 style="color:white">Park Vision</h1> -->
    <input type="checkbox" id="toggle">
    <label for="toggle"><i class="fa fa-bars" aria-hidden="true"style="color:white;font-size:40px"></i></label>
    <nav class="navigation">
      <ul>
        <li class="active"><a href="home.php">Home</a></li>
        <li><a href="booking_form.php">Book Now</a></li>
        <li><a href="#">Account <i class="fas fa-angle-down"></i></a>
               <ul>
               <?php if($user_id == ''){ ?>
                  <li><a href="login.php">Login Now</a></li>
                  <li><a href="registerform.php">Register Now</a></li>
                  <?php } else { ?>
                  <li><a href="user_logout.php" id="logout">Log out</a>
                  </li>
                  <script>
document.getElementById('logout').addEventListener('click', function(event) {
    event.preventDefault(); // Prevent the default link behavior
    
    // Show SweetAlert2 confirmation dialog
    Swal.fire({
        title: 'Log out',
        text: 'Are you sure you want to Log out?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, Log out',
        cancelButtonText: 'Cancel',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            // If user clicks 'Yes, logout', proceed to the logout page
            window.location.href = 'user_logout.php';
        }
    });
});
</script>
                  <?php } ?>
               </ul>
            </li>
      </ul>
    </nav>
  </header>
  <?php

  include 'content.html'
  ?>
 
</body>
</html>