<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register for Course</title>
    <link rel="stylesheet" href="style.css">

    <style>
        body {
            font-family: 'Times New Roman', Times, serif, sans-serif;
            margin: 0 30rem;
            padding: 0;
            align-items: center;
            justify-content: center;
            height: 100vh; /* Ensure full viewport height */
            background-color: #009579;
        }

        .main {
            left: 10px;
            text-align: center;
            padding: 0px;
        }

        .container {
            height: 500px;
            width: 550px;
            margin: 15px;
            padding: 0px;
            border: 2px solid black;
            text-align: center;
            border-radius: 15px;
            box-shadow: 5px 5px 20px rgba(0, 0, 0, 0.6);
            background-color: whitesmoke;
        }

        input {
            width: 120px;
            height: 30px;
            border: 0px solid black;
            border-radius: 4px;
            text-align: start;
            padding: 6px;
            box-shadow: 0 12px 5px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease;
        }
        

        label {}

        .name {
            bottom: px;
            margin: 50px;
            border-radius: 4px;
            display: flex;
            justify-content: space-evenly;
        }

        .he {
            margin-top: -10px;
            display: flex;
            justify-content: space-evenly;
        }

        .Gender {
            height: 44px;
            width: 120px;
        }

        .Gender1 {
            margin: 0px;
            border-radius: 4px;
            display: flex;
            justify-content: space-evenly;
        }

        .Courses {
            height: 44px;
            width: 180px;
            margin: 25px 92px;
            border-radius: 4px solid black;
        }

        select {
            border-radius: 0px solid black;
            height: 25%;
        }

        button {
            margin-top: 55px;
            background-color: #009579;
            text-align: center;
            width: 140px;
            height: 50px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 1);
            color: whitesmoke;
        }

        .alert,
        .success {
            width: 400px;
            text-align: center;
            position: absolute;
            top: 600px;
            right: 60%;
            transform: translatex(-50%);
            color: whitesmoke;
            padding: 8px 0;
        }

        .alert {
            background-color: red;
        }

        .success {
            background-color: green;
        }

        .footer {
            width: 100%;
            height: 120px;
            color: solid black;
        }
    </style>
</head>

<body>
    <div class="main">
        <h2>Course Registration</h2> <span> fill out the form carefully for Registration</span>
    </div>
    <br>
    <br>
    <div class="container">
        <form action="" method="post">
            <br>
            <span>Student Information</span><br>
            <div class="name">
                <label for="Firstname"></label>
                <input type="text" name="FirstName" class="Firstname" placeholder="First name" required>

                <label for="Middlename"></label>
                <input type="text" name="MiddleName" class="Middlename" placeholder="Middle name" required>

                <label for="Lastname"></label>
                <input type="text" name="LastName" class="Lastname" placeholder="Last name" required>
            </div>

            <br>
            <div class="Gender1">
                <select class="Gender" name="Gender" id="PleaseSelect" required>
                    <option value="" disables selected hidden style >Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
                <label for="Phone_number"></label>
                <input type="text" class="PhoneNumber" name="PhoneNumber" placeholder="Phone Number" required>
                <label for="Email"></label>
                <input type="Email" class="Email" name="Email" placeholder="Email" required>
            </div>
            <div class="Courses">
                <label for="Courses"></label><br>
                <select class="Courses" id="courseSelect" name="Courses" required>
                    <option value="" disabled selected hidden id="courseSelect">Please choose the course</option>
                    <option value="Data science" class="Data_science">Data Science</option>
                    <option value='Python' class="Python">Python</option>
                    <option value='Java developer' class="Java_developer">Java developer</option>
                    <option value='Web Developer' class="Web_developer">Web Developer</option>
                </select>
            </div>
            <div class="button">
                <button id="btn" type="submit" name="submit" value="submit">Register for Course</button>
            </div>
        </form>
    </div>

    <script>
                // JavaScript to handle the placeholder behavior
                document.getElementById('courseSelect').addEventListener('change', function () {
            // Remove the placeholder option when a real option is selected
            if (this.value !== '') {
                this.querySelector('option[value=""][disabled]').remove();
            }
        });
        // JavaScript to handle the placeholder behavior
        document.getElementById('courseSelect').addEventListener('change', function () {
            // Remove the placeholder option when a real option is selected
            if (this.value !== '') {
                this.querySelector('option[value=""][disabled]').remove();
            }
        });
    </script>
</body>
</html>

<?php
// Your PHP code for processing the form goes here
?>

<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['submit'])) {
    $FirstName = $_POST['FirstName'];
    $MiddleName = $_POST['MiddleName'];
    $LastName = $_POST['LastName'];
    $Gender = $_POST['Gender'];
    $PhoneNumber = $_POST['PhoneNumber'];
    $Email = $_POST['Email'];
    $Courses = $_POST['Courses'];

    // Load Composer's autoloader
    require 'phpmailer/Exception.php';
    require 'phpmailer/PHPMailer.php';
    require 'phpmailer/SMTP.php';

    // Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();                                        // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                  // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                               // Enable SMTP authentication
        $mail->Username   = 'Sahilkundak2303@gmail.com';       // SMTP username
        $mail->Password   = 'wwpmfqkhhkknivpx';                 // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;        // Enable implicit TLS encryption
        $mail->Port       = 465;                               // TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        // Recipients
        $mail->setFrom('sahilkundak2303@gmail.com', 'Sahil');
        $mail->addAddress('Sahillesnar143@gmail.com', 'Sahil Lesnar'); // Add a recipient

        // Content
        $mail->isHTML(true);                                   // Set email format to HTML
        $mail->Subject = 'Course Registration';
        $mail->Body    = "Sender Name - $FirstName <br> Sender Email - $Email <br> Phone Number- $PhoneNumber <br>  Gender - $Gender <br> Coourse - $Courses";

        $mail->send();
        echo "<div class='success'>Message Has been Sent!</div>";
    } catch (Exception $e) {
        echo "<div class='alert'>Registration Failed</div>";
    }

    // Connect to MySQL database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "database_course";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if the user with the same email and course is already registered
    $checkSql = "SELECT * FROM registration WHERE Email='$Email' AND Courses='$Courses'";
    $result = $conn->query($checkSql);

    if ($result->num_rows > 0) {
        echo "<div class='alert'>You are already registered for the same course with this email.</div>";
    } else {
        // Insert data into the database
        $sql = "INSERT INTO registration (FirstName, MiddleName, LastName, Gender, PhoneNumber, Email, Courses)
                VALUES ('$FirstName', '$MiddleName', '$LastName', '$Gender','$PhoneNumber' ,'$Email', '$Courses')";

        if ($conn->query($sql) === TRUE) {
            // Send confirmation email to the registered user
            try {
                $mail->clearAddresses();
                $mail->addAddress($Email, $FirstName . ' ' . $LastName); // Use the user's email from the form

                $mail->Subject = 'Course Registration Confirmation';
                $mail->Body    = "Dear $FirstName, <br><br>
                                  Thank you for registering for the $Courses course. We have received your information and will contact you shortly.<br><br>
                                  Best Regards,<br>
                                  Your Organization Name";

                $mail->send();
                echo "<div class='success'>Thanks for Registration. We will contact you shortly! Confirmation email sent.</div>";
            } catch (Exception $e) {
                echo "<div class='alert'>Registration Successful, but confirmation email could not be sent. Please contact us for further details.</div>";
            }
        } else {
            echo "<div class='alert'>Error: " . $sql . "<br>" . $conn->error . "</div>";
        }
    }

    $conn->close();
}
?>
