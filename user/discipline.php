<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>SEP Portal</title>
	<link rel="shortcut icon" href="/img3/SEP (1).ico">
	<link rel="stylesheet" href="/css/style18.css">
	<link rel="stylesheet" href="/css/responsives7.css">
	<link rel="stylesheet" href="https://fontawesome.com/">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
	 crossorigin="anonymous" referrerpolicy="no-referrer" />

	<style>
		.unique-container.fullscreen {
			width: 100%;
			height: 100%;
			position: fixed;
			top: 0;
			left: 0;
			color: rgb(0, 0, 0);
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

		.toggle-icon.fullscreen {
			color: white;
			font-weight: bolder;
		}

		.toggle-icon:hover {
			transform: scale(1.2);
		}

		.unique-container {
			transition: transform 0.3s ease;
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
                <a href="javascript:void(0);" onclick="navigateWithLoader('main.php')" id="home">Home</a>
                <a href="javascript:void(0);" onclick="navigateWithLoader('/user/centres.php')" id="centres">Centres</a>
                <a onclick="CB()" id="check-eligibility">Check Eligibility</a>
                <a href="javascript:void(0);" onclick="navigateWithLoader('/user/discipline.php')" id="discipline">Discipline</a>
                <a href="javascript:void(0);" onclick="navigateWithLoader('/user/faq.php')" id="faq">FAQ</a>
                <a href="javascript:void(0);" onclick="navigateWithLoader('main.php#process_section')" id="process">Process</a>
                <a href="javascript:void(0);" onclick="navigateWithLoader('/user/contacts2.php')" id="contact">Contact Us</a>
            </div>
            <div class="nav2">
                <h2>Welcome, <?php echo $_SESSION['user']; ?>!</h2>
                    <a href="../user/logout6.php">Logout</a>
            </div>
        </nav>
        <script>
            function CB()
            {
                location.href="payment.php"
            }
        </script>

        <main>
            <div class="unique-container">
                <div class="unique-table-container">
                    <h2>Discipline List</h2>
                    <table>
                        <tr><td class="unique-left">Kabaddi</td><td
                                class="unique-right">Raider, Defender,
                                All-Rounder, Dodging, Hand Touch, Bonus
                                Line</td></tr>
                        <tr><td class="unique-left">Football</td><td
                                class="unique-right">Forward, Midfielder,
                                Defender, Goalkeeper, Dribbling,
                                Passing</td></tr>
                        <tr><td class="unique-left">Chess</td><td
                                class="unique-right">Openings, Middle Game,
                                Endgame, Strategy, Checkmate Patterns</td></tr>
                        <tr><td class="unique-left">Hockey</td><td
                                class="unique-right">Striker, Midfielder,
                                Defender, Goalkeeper, Ball Control,
                                Tackling</td></tr>
                        <tr><td class="unique-left">Basketball</td><td
                                class="unique-right">Point Guard, Shooting
                                Guard, Small Forward, Power Forward, Center,
                                Dribbling</td></tr>
                        <tr><td class="unique-left">Kabaddi</td><td
                                class="unique-right">Super Tackle, Super Raid,
                                Toe Touch, Jumping, Holds</td></tr>
                        <tr><td class="unique-left">Football</td><td
                                class="unique-right">Set Pieces, Pressing,
                                Counterattack, One-Two Passing</td></tr>
                        <tr><td class="unique-left">Chess</td><td
                                class="unique-right">Tactics, Positional Play,
                                Board Vision, Calculation Skills</td></tr>
                        <tr><td class="unique-left">Hockey</td><td
                                class="unique-right">Penalty Corner, Marking,
                                Pressing, Overlapping Runs</td></tr>
                        <tr><td class="unique-left">Basketball</td><td
                                class="unique-right">Rebounding, Fast Break,
                                Isolation Play, Pick and Roll</td></tr>
                    </table>
                    <div class="toggle-icon"
                        onclick="toggleFullScreen()">⤡</div>
                </div>
            </div>
        </main>
        <!-- Loader Container -->
        <div id="loader">
            <div class="spinner"></div>
        </div>

        <footer class="footer">
            <!-- Locate Us Section -->
            <div class="footer-section locate">
                <h3>📍 Locate Us</h3>
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d777.0!2d74.3751572!3d16.4133214!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc0f18a0cebdd8d%3A0x2a05e7a8e51eeafc!2sShri%20Saibaba%20Devasthana%20-%20(Nippani)!5e0!3m2!1sen!2sin!4v1709385678900!5m2!1sen!2sin&t=k&z=18"
                    width="80%"
                    height="200vh"
                    style="border:0;"
                    allowfullscreen
                    loading="lazy">
                </iframe>
            </div>

            <!-- Related Links & Follow Us Section -->
            <div id="f2" class="footer-section links">
                <h3><img src="img3/rel-icon.png" alt><b>Related Links</b></h3>
                <br><hr><br><br>
                <h3>👤 Follow Us</h3>
                <div class="social-icons">
                    <a href="#"><i class="fa-brands fa-facebook"></i></a>
                    <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
                </div>
                <div class="developer">
                    <br><p>Developed By <strong>Threelancer@co.ltd</strong></p>
                </div>
            </div>
            <!-- Contact Us Section -->
            <div class="footer-section contact">
                <h3 id="contact-title">📞 Contact Us</h3>
                <p id="contact-platform">Sports Eligibility Platform</p>
                <p id="contact-address">Head Office Nipani High Court side
                    (Parvati Cornor), Akkol Road, Nipani - 591237</p>
                <p id="contact-email">If you have any feedback, grievance, or
                    are not satisfied, please email to:</p>
                <p
                    id="footer-contact-email-id"><strong>sep.elgbt@gmail.com</strong></p>

            </div>
        </footer>
        <script src="/js/discipline3.js">
    </script>
    </body>
</html>