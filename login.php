<?php
session_start();
include("db.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = trim($_POST['pass']);

    if (!empty($email) && !empty($password)) {
        // Fetch user data by email only
        $stmt = $con->prepare("SELECT * FROM users WHERE Email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if user exists
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            // Verify hashed password
            if (password_verify($password, $row['Password'])) {
                $_SESSION['user'] = $email;
                header("Location: /user/main.php");
                exit;
            } else {
                echo "<script>alert('Invalid email or password'); window.location.href='login.php';</script>";
            }
        } else {
            echo "<script>alert('Invalid email or password'); window.location.href='login.php';</script>";
        }
    } else {
        echo "<script>alert('Please fill in all fields'); window.location.href='login.php';</script>";
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="shortcut icon" href="/img3/SEP (1).ico">
    <link rel="stylesheet" href="/css/style18.css">
	<link rel="stylesheet" href="/css/responsives7.css">
    <style>
        /* Full-screen mode */
        .login_form.fullscreen {
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

        /* Toggle icon */
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

        .toggle-icon.fullscreen {
            color: white;
            font-weight: bolder;
        }

        .toggle-icon:hover {
            transform: scale(1.2);
        }

        .login_form.fullscreen h1 {
            color: white;
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
    <div class="img"></div>
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
        <div class="intro">
            <form class="login_form" method="post" action="">
                <h1>Login User</h1>
                <input type="email" name="email" class="field" placeholder="Enter your registered email" required>
                <input type="password" name="pass" class="field" placeholder="Enter your password" required>
                <div class="btnfld">
                    <button type="submit" class="btn" href="javascript:void(0);" onclick="navigateWithLoader()">Login</button>
                    <button type="reset" class="btn">Clear</button>
                </div>
                <div style="margin-top: 20px;">
                    <a href="google-login.php">
                        <img src="https://developers.google.com/identity/images/btn_google_signin_light_normal_web.png" 
                            alt="Sign in with Google">
                    </a>
                </div>

                <p>Don't Have an Account? <a href="javascript:void(0);" onclick="navigateWithLoader('register.php')" id="register">Register Here</a></p>
                <div class="toggle-icon" onclick="toggleFullScreen()">⤡</div>
            </form>
        </div>
    </section>
    <!-- Loader Container -->
<div id="loader">
    <div class="spinner"></div>
</div>

</main>
<script>
function CB(){
    alert("Access is Blocked Until You Register And Login");
}

// Toggle full-screen mode for the login form
function toggleFullScreen() {
    const formContainer = document.querySelector('.login_form');
    formContainer.classList.toggle('fullscreen');
}
</script>
    <script src="/js/home5.js"></script>

</body>
</html>
