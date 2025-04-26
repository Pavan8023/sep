<?php
session_start();
include("db.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Retrieve form data
    $name = trim($_POST['name']);
    $num = trim($_POST['number']);
    $date = trim($_POST['date']);
    $email = trim($_POST['email']);
    $password = trim($_POST['pass']);

    if (!empty($name) && !empty($num) && !empty($email) && !empty($password) && !empty($date)) {
        // Check if email or number already exists in the database
        $checkQuery = "SELECT * FROM users WHERE Email = ? OR Number = ?";
        $stmt = $con->prepare($checkQuery);
        $stmt->bind_param("ss", $email, $num);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Duplicate email or number
            echo "<script type='text/javascript'> alert('Email or Number already exists. Please use different details.') </script>";
        } else {
            // Hash the password before storing
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Insert new user
            $insertQuery = "INSERT INTO users (Name, Number, date, Email, Password) VALUES (?, ?, ?, ?, ?)";
            $insertStmt = $con->prepare($insertQuery);
            $insertStmt->bind_param("sssss", $name, $num, $date, $email, $hashedPassword);

            if ($insertStmt->execute()) {
                echo "<script type='text/javascript'> alert('Successfully Registered You can login now'); window.location ='login.php'; </script>";
                exit;
            } else {
                echo "<script type='text/javascript'> alert('Error in registration. Please try again.') </script>";
            }
        }
    } else {
        echo "<script type='text/javascript'> alert('Please Enter some valid details') </script>";
    }
} else {
    // Reset the form submission session variable on page load
    unset($_SESSION['form_submitted']);
}
?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Register Page</title>
        <link rel="shortcut icon" href="/img3/SEP (1).ico">
        <link rel="stylesheet" href="/css/style18.css">
	<link rel="stylesheet" href="/css/responsives7.css">
    </head>
    <style>
        /* Full-screen mode */
        .register.fullscreen {
            width: 100%;
            height: 100%;
            position: fixed;
            top: 0;
            left: 0;
            color: white;
            border-radius: 0;
            z-index: 1000;
            background-color: #181A1B;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .toggle-icon {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 2rem;
            color: red;
            font-weight: bolder;
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .toggle-icon.fullscreen{
            color: white;
            font-weight: bolder;
        }

        .register.fullscreen h1{
            color: white;
        }

        .toggle-icon:hover {
            transform: scale(1.2);
        }

        </style>
    </head>
    
    <body>
    <header class="header">
            <div class="header-container">
                <div class="logo">
                    <img src="/img3/SEP (1).png" alt="Logo">
                </div>
                <div class="title" id="title"><h2>National Talent Search
                        Portal</h2></div>
                <div class="logo1">
                    <img src="/img3/sai_new_logo.jpg" alt="logo">
                </div>
                <div class="language-dropdown">
                    <select onchange="changeLanguage(this.value)">
                        <option value="en">English</option>
                        <option value="hi">हिन्दी</option>
                    </select>
                </div>
            </div>
        </header>
    <nav>
        <span class="menu-toggle" onclick="toggleMenu()">&#9776;</span>
        <div class="img">
            
        </div>
        <div class="nav1">
                <a href="javascript:void(0);" onclick="navigateWithLoader('index.php')" id="home">Home</a>
                <a href="javascript:void(0);" onclick="navigateWithLoader('centres.html')" id="centres">Centres</a>
                <a onclick="CB()" id="check-eligibility">Check Eligibility</a>
                <a href="javascript:void(0);" onclick="navigateWithLoader('discipline.html')" id="discipline">Discipline</a>
                <a href="javascript:void(0);" onclick="navigateWithLoader('faq.php')" id="faq">FAQ</a>
                <a href="javascript:void(0);" onclick="navigateWithLoader('index.php#process_section')" id="process">Process</a>
                <a href="javascript:void(0);" onclick="navigateWithLoader('contacts2.html')" id="contact">Contact Us</a>
            </div>
            <div class="nav2">
                <a href="javascript:void(0);" onclick="navigateWithLoader('login.php')" id="login">Login</a>
                <a href="javascript:void(0);" onclick="navigateWithLoader('register.php')" id="register">Register</a>
            </div>

    </nav>
    
        <main>
            <section class="s1">
                <div class="rgs_intro">
                    <form class="register" method="post" action="">
                        <h1>New User</h1>
                        <input type="text" name="name" class="field" placeholder="Enter your full name">
                        <input type="number" name="number" class="field" placeholder="Enter your number">
                        <input type="date" name="date" class="field" id="date" placeholder="Select Date">
                        <input type="email" name="email" class="field" placeholder="Enter your email">
                        <input type="password" name="pass" class="field" placeholder="Set your password">
                        <div class="btnfld">
                            <button type="submit" value="submit" class="btn" href="javascript:void(0);" onclick="navigateWithLoader()">Submit</button>
                            <button type="reset" value="reset" class="btn">Clear</button>
                        </div>
                        <p>Already Have an Account?<a href="javascript:void(0);" onclick="navigateWithLoader('login.php')" id="login">Login Here</a></p>
                        <div class="toggle-icon" onclick="toggleFullScreen()">⤡</div>
                    </form>
                </div>
            </section>
            <!-- Loader Container -->
<div id="loader">
    <div class="spinner"></div>
</div>
    <script src="/js/home5.js"></script>
        </main>
        <script>
            function CB(){
                alert("Access is Blocked Until You Registered And Login")
            }

            function toggleFullScreen() {
            const formContainer = document.querySelector('.register');
            formContainer.classList.toggle('fullscreen');
            }
        </script>
    </body>
</html>