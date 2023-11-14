<?php
include 'db_config.php';

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Collect data from the form
$FirstName = $_POST['FirstName'];
$LastName = $_POST['LastName'];
$Password = $_POST['Password'];
$ConfirmPassword = $_POST['ConfirmPassword'];
$DateOfBirth = $_POST['DateOfBirth'];
$Gender = $_POST['Gender'];
$Email = $_POST['Email'];
$PhoneNumber = $_POST['PhoneNumber'];
$Address = $_POST['Address'];
$Specialty = $_POST['Specialty'];
$Certifications = $_POST['Certifications'];
$Sports = $_POST['Sports'];

// Check if the password and confirm password match
if ($Password !== $ConfirmPassword) {
    echo "<script>alert('Passwords are not matched!')</script>";
    echo "<script>window.location.href='coach_registration.php'</script>";
    exit();
}

// Insert data into the "coaches" table
$sql = "INSERT INTO coaches (FirstName, LastName, Password, DateOfBirth, Gender, Email, PhoneNumber, Address, Specialty, Certifications)
        VALUES ('$FirstName', '$LastName', '$Password', '$DateOfBirth', '$Gender', '$Email', '$PhoneNumber', '$Address', '$Specialty', '$Certifications')";

if ($conn->query($sql) === TRUE) {
    $coachID = $conn->insert_id;

    // Handle multiple sports selections
    if (isset($Sports) && is_array($Sports)) {
        foreach ($Sports as $sportID) {
            $insertCoachSportSQL = "INSERT INTO coach_sports (CoachID, SportID) VALUES ('$coachID', '$sportID')";
            if ($conn->query($insertCoachSportSQL) !== TRUE) {
                echo "Error inserting sports: " . $conn->error;
            }
        }
    }

    echo "Coach registered successfully.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// get the last CoachID from the coaches table
$result = $conn->query("SELECT MAX(CoachID) AS lastCoachID FROM coaches");
$row = $result->fetch_assoc();
$loginID = $row['lastCoachID'];

// Close the database connection
$conn->close();

$registeredDateTime = date('Y-m-d H:i:s');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();
    $mail->Host       = 'smtp.office365.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'sportsmgtsystem@outlook.com';
    $mail->Password   = 'Maleesha32';
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;

    $mail->setFrom('sportsmgtsystem@outlook.com', 'Sports Management System');
    $mail->addAddress("$Email", "$FirstName");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $registeredDateTime = date('Y-m-d H:i:s');

    // Content of the email
    $mail->isHTML(true);
    $mail->Subject = 'Successfully Registered ';
    $mail->Body = "
        <html>
        <body>
            <h1 style='color: #333;'>Your Login Information</h1>
            <p><strong>Your Coach ID:</strong> <span style='font-size: 1.3rem;'>$loginID</span></p>
            <p><strong>Email Address:</strong> $Email</p>
            <p><strong>Mobile Phone:</strong> $PhoneNumber</p><br>
            <p><strong>Registered Date:</strong> $registeredDateTime</p>
            <p style='color: #777; font-size: 14px;'>This is an automated message. Please do not reply.</p>
        </body>
        </html>
    ";

    // Set the "noreply" address for replies
    $mail->addReplyTo('noreply@example.com', 'No Reply');

    $mail->send();
    echo '<script>alert("Email has been sent successfully.")</script>';
} catch (Exception $e) {
    echo "<script>alert('Error sending email: {$mail->ErrorInfo}')</script>";
}


header('location: login.php');
