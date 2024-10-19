<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salon Booking System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Century Gothic, sans-serif;
        }
        body, html {
            height: 100%;
        }
        header {
            background-image: url('pics/3.jpg');
            height: 100vh;
            background-size: cover;
        }
        .main img {
            position: absolute;
            top: 0;
            left: 0;
            margin-top: -70px;
            width: 300px;
            height: auto;
        }
        nav ul {
            float: right;
            list-style-type: none;
            margin-top: 20px;
        }
        nav ul li {
            display: inline-block;
        }
        nav ul li a {
            text-decoration: none;
            color: #fff;
            padding: 5px 20px;  
            border: 1px solid #fff;
            transition: 0.6s ease-out;
        }
        nav ul li a:hover,
        nav ul li.active a {
            background-color: #fff;
            color: #000;
        }
        .title {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
        }
        .title h1 {
            color: #fff;
            font-size: 100px;
            font-family: 'Brush Script MT', cursive;
        }
        .title p {
            color: #fff;
            font-size: 20px;
        }
        .btn {
            border: 1px solid #fff;
            padding: 10px 30px;
            text-decoration: none;
            transition: 0.6s ease-out;
        }
        .btn:hover {
            background-color: #fff;
            color: #000;
        }
        .dropdown {
            position: relative;
            display: inline-block;
        }
        .dropdown .dropbtn {
            color: #000;
            font-size: 16px;
            padding: 5px 20px;  
            border: 1px solid #fff;
            transition: 0.6s ease-out;
        }
        .dropdown-content {
            display: none;
            position: absolute;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
            background-color: rgba(0,0,0,0.7);
        }
        .dropdown-content a {
            color: #fff;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            transition: 0.6s ease-out;
        }
        .dropdown-content a:hover {
            background-color: #fff;
            color: #000;
        }
        .dropdown:hover .dropdown-content {
            display: block;
        }
        .gallery {
            padding: 50px 0;
            text-align: center;
            background-color: #B2BFF3;
        }
        .gallery h2 {
            margin-bottom: 20px;
            font-size: 36px;
            color: #333;
            font-family: 'Brush Script MT', cursive;
        }
        .gallery .images {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            max-width: 1200px;
            margin: auto;
        }
        .gallery .images img {
            max-height: 300px;
            max-width: 400px;
            margin: 10px;
            transition: transform 0.3s ease;
            border: 2px solid #fff;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .gallery .images img:hover {
            transform: scale(1.1);
        }
        footer {
            background-color: #8E9EDF;
            color: #fff;
            padding: 20px 0;
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
            margin-bottom: 10px;
            font-size: 18px;
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
        @media (max-width: 768px) {
            .title h1 {
                font-size: 60px;
            }
            .title p {
                font-size: 16px;
            }
            nav ul {
                float: none;
                text-align: center;
            }
            nav ul li {
                display: block;
            }
            .gallery .images img {
                width: 100%;
                margin: 5px 0;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="main">
            <img src="pics/1.png" alt="SkinFab Spa Logo">
            <nav>
                <ul>
                    <li><a href="landing_page.php">Home</a></li>
                    <li><a href="services.php">Services</a></li>
                    <li class="active"><a href="#gallery">Gallery</a></li>
                    <li class="dropdown">
                        <button class="dropbtn">Account Login</button>
                        <div class="dropdown-content">
                            <a href="registration.php">Registration</a>
                            <a href="login.php">User Login</a>
                            <a href="admin_login.php">Admin Login</a>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="title">
            <h1>Absolut Theraphy</h1>
            <p>"One bottle at a time, it will eventually go off."</p>
        </div>
    </header>
    <section id="gallery" class="gallery">
        <h2>Gallery</h2>
        <div class="images">
            <img src="pics/2.png">
            <img src="pics/4.png">
            <img src="pics/5.jpg">
            <img src="pics/6.jpg">
            <img src="pics/7.jpg">
        </div>
    </section>
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
        <div class="social-media">
            <a href="https://www.facebook.com/ABSOLUT"><i class="fab fa-facebook"></i></a>
            <a href="https://www.instagram.com/absolutvodka/?hl=en"><i class="fab fa-instagram"></i></a>
        </div>
    </footer>
</body>
</html>
