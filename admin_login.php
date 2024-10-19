<?php
include 'conn.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Retrieve user from database
    $sql = "SELECT * FROM Users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();

        // Verify password
        if (password_verify($password, $user['password'])) {
            $_SESSION['admin_username'] = $username;
            $_SESSION['admin_user_id'] = $user['user_id'];
            $_SESSION['role'] = $user['role'];

            header("Location: admin_dashboard.php");
            exit;
        } else {
            $error_message = "Invalid password.";
        }
    } else {
        $error_message = "Invalid username.";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">   
    <style type="text/css">
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
        img {
            position: absolute;
            top: 0;
            left: 0;
            margin: 0;
            margin-top: -70px;
            width: 300px;
            height: auto;
        }
        .content {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .registration-form {
            background: transparent;
            border: 2px solid rgba(255, 255, 255, .2);
            padding: 70px 70px;
            border-radius: 10px;
            box-shadow: 0 0 5px #DAD7CD, 0 0 15px #DAD7CD;
            backdrop-filter: blur(4px);
        }
        .registration-form h2 {
            margin-bottom: 20px;
            text-align: center;
        }
        .registration-form label {
            display: flex;
            margin-bottom: 10px;
        }
        .registration-form input {
            width: 92%;
            margin-bottom: 20px;
            border: 2px solid white;
            border-radius: 5px;
            padding: 10px;
            background-color: transparent;
        }
        .registration-form button {
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
        .registration-form button:hover {
            background-color: #8E9EDF;
            color: #fff;
            box-shadow: 0 0 5px #DAD7CD, 0 0 15px #DAD7CD;
        }
        footer {
            background-color: #8E9EDF;
            color: #fff;
            padding: 6px 0;
            text-align: center;
            width: 100%;
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
    </style>
</head>
<body>
    <img src="pics/1.png">
    <div class="content">
        <form class="registration-form" action="admin_login.php" method="post">
            <h2>Admin Login</h2>
            <?php
            if (isset($error_message)) {
                echo "<p>$error_message</p>";
            }
            ?>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            
            <button type="submit">Login</button>
        </form>
    </div>
    <footer>
        <div class="footer-content">
            <div>
                <h3>About Abolut Therapy</h3>
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
