<?php
$server = "localhost";    
$user = "root";           
$pass = "";               
$database = "parking_sys";    

$conn = mysqli_connect($server, $user, $pass, $database);

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $txtDate0=$_POST['txtDate0'];
    $status=$_POST['status'];
    $plate=$_POST['plate'];
    $number=$_POST['number'];
    $model=$_POST['model'];
    $txtDate1=$_POST['txtDate1'];
    $txtDate2=$_POST['txtDate2'];
    $selectedParkingSpot=$_POST['selectedParkingSpot'];

    $insert = "INSERT INTO booking (name, email, gender, DOB, status, plate, number, model, startDate, endDate, parkingSpot) VALUES ('$name', '$email', '$gender', '$txtDate0','$status','$plate','$number','$model','$txtDate1','$txtDate2','$selectedParkingSpot')";

    $query = mysqli_query($conn, $insert);

    if (!$query) {
        echo "MySQL error: " . mysqli_error($conn);
    }

    if ($query) {
        ?>
        <script>
        swal({
            title: "Success",
            text: "Booked Successfully",
            icon: "success"
        });
        </script>
        <?php
    } else {
        ?>
        <script>
        swal({
            title: "Failed",
            text: "Not Booked",
            icon: "error"
        });
        </script>
        <?php
    }
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name=$_POST['name'];
    $email=$_POST['email'];
    $selectedParkingSpot=$_POST['selectedParkingSpot']; 
    $model=$_POST['model'];
    $plate=$_POST['plate'];
    $txtDate1=$_POST['txtDate1'];
    $txtDate2=$_POST['txtDate2'];

    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'parkvision620@gmail.com';  
        $mail->Password = 'tqwrdtojjvirmbaf';  
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('parkvision620@gmail.com');
        $mail->addAddress($email);

        $mail->isHTML(true);

        $mail->Subject = "Booking Confirmation";
     
        $mail->Body = "Dear $name,<br><br>
        Thank you for choosing our parking service. We're pleased to inform you that your parking spot has been successfully booked.<br><br>
        Here are the details of your booking:<br><br>
        - Name: $name<br>
        - Parking Spot Number: $selectedParkingSpot<br>
        - Vehicle model name: $model<br>
        - Vehicle Plate Number: $plate<br>
        - Duration of Booking: $txtDate1 to $txtDate2<br><br>
        Please make sure to arrive on time and park in your designated spot.<br><br>
        We appreciate your business and hope you have a pleasant experience with us.<br><br>
        Best regards,<br>
        Park Vision";

        $mail->send();
        echo "<script>alert('Booking confirmation email sent successfully!'); window.location = 'home.php';</script>";
        exit;
    } catch (Exception $e) {
        echo "<script>alert('Failed to send booking confirmation email.');</script>";
    }
}

?>
