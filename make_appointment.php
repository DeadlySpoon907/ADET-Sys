<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

include 'conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id'];
    
    if (isset($_POST['make_appointment'])) {
        $date = $_POST['date'];
        $time = $_POST['time'];
        $service = $_POST['service'];


        $checkUserSql = "SELECT * FROM Users WHERE user_id = ?";
        $checkUserStmt = $conn->prepare($checkUserSql);
        $checkUserStmt->bind_param("i", $user_id);
        $checkUserStmt->execute();
        $userResult = $checkUserStmt->get_result();

        if ($userResult->num_rows > 0) {
            $sql = "INSERT INTO Appointments (user_id, date, time, service) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("isss", $user_id, $date, $time, $service);

            if ($stmt->execute()) {
                $appointment_id = $stmt->insert_id;
                echo "Appointment made successfully. Your Appointment ID is: $appointment_id";
            } else {
                echo "Error making appointment: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Error: User ID does not exist.";
        }

        $checkUserStmt->close();
    } elseif (isset($_POST['cancel_appointment'])) {
        $appointment_id = $_POST['appointment_id'];
        $checkAppointmentSql = "SELECT * FROM Appointments WHERE appointment_id = ? AND user_id = ?";
        $checkAppointmentStmt = $conn->prepare($checkAppointmentSql);
        $checkAppointmentStmt->bind_param("ii", $appointment_id, $user_id);
        $checkAppointmentStmt->execute();
        $appointmentResult = $checkAppointmentStmt->get_result();

        if ($appointmentResult->num_rows > 0) {
            $deleteSql = "DELETE FROM Appointments WHERE appointment_id = ?";
            $deleteStmt = $conn->prepare($deleteSql);
            $deleteStmt->bind_param("i", $appointment_id);

            if ($deleteStmt->execute()) {
                echo "Appointment canceled successfully.";
            } else {
                echo "Error canceling appointment: " . $deleteStmt->error;
            }

            $deleteStmt->close();
        } else {
            echo "Error: Appointment ID does not exist.";
        }
        $checkAppointmentStmt->close();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Make Appointment</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: Century Gothic;
        }
        html, body {
            height: 100%;
            margin: 0;
        }
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background-image: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)), url('pics/3.jpg');
            background-size: cover;
            background-position: center;
            color: #fff;
        }
        .content {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .appointment-form {
            background: transparent;
            border: 2px solid rgba(255, 255, 255, .2);
            padding: 50px 50px;
            border-radius: 10px;
            box-shadow: 0 0 5px #DAD7CD, 0 0 15px #DAD7CD;
            backdrop-filter: blur(4px);
        }
        .appointment-form h2 {
            margin-bottom: 20px;
            text-align: center;
        }
        .appointment-form label {
            display: block;
            margin-bottom: 10px;
        }
        .appointment-form input,
        .appointment-form select {
            width: 100%;
            margin-bottom: 20px;
            padding: 10px;
            border: 2px solid white;
            border-radius: 5px;
            background-color: transparent;
            color: #000;
        }
        .appointment-form button {
            width: 100%;
            padding: 10px;
            background-color: transparent;
            color: #fff;
            border: 2px solid white;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.6s ease-out;
            font-size: 18px;
        }
        .appointment-form button:hover {
            background-color: #8E9EDF;
            color: #fff;
            box-shadow: 0 0 5px #DAD7CD, 0 0 15px #DAD7CD;
        }
        footer {
            background-color: #8E9EDF;
            color: #fff;
            padding: 6px 0;
            text-align: center;
            position: relative;
            bottom: 0;
            width: 100%;
            height: 191px;
        }
        footer .footer-content {
            display: flex;
            justify-content: space-around;
            max-width: 1200px;
            margin: auto;
            flex-wrap: wrap;
        }
        footer .footer-content div {
            flex: 1;
            margin: 10px;
        }
        footer .footer-content h3 {
            margin-bottom: 5px;
            font-size: 16px;
        }
        footer .footer-content p,
        footer .footer-content a {
            color: #fff;
            text-decoration: none;
            font-size: 14px;
        }
        footer .footer-content a:hover {
            text-decoration: underline;
        }
        footer .social-media {
            display: flex;
            justify-content: center;
            margin-top: 10px;
        }
        footer .social-media a {
            color: #fff;
            font-size: 18px;
            margin: 0 8px;
            transition: 0.6s ease-out;
        }
        footer .social-media a:hover {
            color: #ddd;
        }
        img {
            position: absolute;
            top: 0;
            left: 0;
            margin: 0;
            margin-top: -70px;
            width: 300px;
            height: auto; 
        }
    </style>
</head>
<body>
    <div class="content">
        <img src="pics/1.png">
        <div class="appointment-form">
            <h2>Make Appointment</h2>
            <form action="make_appointment.php" method="post">
                <label for="date">Date:</label>
                <input type="date" id="date" name="date" required><br>
                
                <label for="time">Time:</label>
                <input type="time" id="time" name="time" required><br>
                
                <label for="service">Service:</label>
                <select id="service" name="service" required>
                    <option value="PMO">Pour a Man One</option>
                    <option value="FCM">Full Course Massages</option>
                    <option value="PMOWS">Pour Me One While Sitting</option>
                    <option value="LSTO">Let's Sit on This One</option>
                </select><br>
                
                <button type="submit" name="make_appointment">Make Appointment</button>
            </form>
            <h2>Cancel Appointment</h2>
            <form action="make_appointment.php" method="post">
                <label for="appointment_id">Appointment ID:</label>
                <input type="number" id="appointment_id" name="appointment_id" required><br>
                
                <button type="submit" name="cancel_appointment">Cancel Appointment</button>
            </form>
        </div>
    </div>
    <footer>
        <div class="footer-content">
            <div>
                <h3>About Abolut Theraphy</h3>
                <p>Forget everything and RELAX, just relax and dont worry about IT... we got it for YOU.</p>
            </div>
            <div>
                <h3>Contact Us</h3>
                <p>Phone: 0505 911 1234/181354112009</p>
                <p>Address: Floor 3, Merk Building, Road 420, New Vegas, Old State</p>
            </div>
        </div>
        <div class="social-media">
            <a href="https://www.facebook.com/ABSOLUT"><i class="fab fa-facebook"></i></a>
            <a href="https://www.instagram.com/absolutvodka/?hl=en"><i class="fab fa-instagram"></i></a>
        </div>
    </footer>
</body>
</html>
