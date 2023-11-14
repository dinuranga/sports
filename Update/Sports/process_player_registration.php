<?php
include 'db_config.php';

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Collect data from the form
$FirstName = $_POST['FirstName'];
$LastName = $_POST['LastName'];
$password = $_POST['Password'];
$DateOfBirth = $_POST['DateOfBirth'];
$Gender = $_POST['Gender'];
$Email = $_POST['Email'];
$PhoneNumber = $_POST['PhoneNumber'];
$Address = $_POST['Address'];
$EmergencyContactName = $_POST['EmergencyContactName'];
$EmergencyContactNumber = $_POST['EmergencyContactNumber'];
$MedicalConditions = $_POST['MedicalConditions'];
$RegistrationNo = $_POST['RegistrationNo'];

// Insert data into the players table
$sql = "INSERT INTO players (Password,FirstName, LastName,DateOfBirth, Gender, Email, PhoneNumber, Address, EmergencyContactName, EmergencyContactNumber, MedicalConditions, RegistrationNo)
            VALUES ('$password', '$FirstName', '$LastName', '$DateOfBirth', '$Gender', '$Email', '$PhoneNumber', '$Address', '$EmergencyContactName', '$EmergencyContactNumber', '$MedicalConditions', '$RegistrationNo')";

if ($conn->query($sql) === TRUE) {
    $playerID = $conn->insert_id; // Get the PlayerID of the newly inserted player

    // Handle multiple sports selections
    if (isset($_POST['Sports']) && is_array($_POST['Sports'])) {
        foreach ($_POST['Sports'] as $sportID) {
            $insertPlayerSportSQL = "INSERT INTO player_sports (PlayerID, SportID) VALUES ('$playerID', '$sportID')";
            if ($conn->query($insertPlayerSportSQL) !== TRUE) {
                echo "Error inserting sports: " . $conn->error;
            }
        }
    }

    echo "Player registered successfully.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// get the last CoachID from the coaches table
$result = $conn->query("SELECT MAX(PlayerID) AS lastPlayerID FROM players");

$row = $result->fetch_assoc();

$loginID = $row['lastPlayerID'];

$registeredDateTime = date('Y-m-d H:i:s');

// Close the database connection
$conn->close();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();
    $mail->Host       = 'smtp.office365.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'sportsmgtsystem@outlook.com';
    $mail->Password   = 'Maleesha32';
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;

    $mail->setFrom('sportsmgtsystem@outlook.com', 'Sports Management System');
    $mail->addAddress("$Email", "$FirstName");

    // Check connection
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
            <p><strong>Your Player ID:</strong> <span style='font-size: 1.3rem;'>$loginID</span></p>
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

header('location: player_registration.php');
