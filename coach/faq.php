<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>SEP Portal</title>
	<link rel="shortcut icon" href="/img3/SEP (1).ico">
	<link rel="stylesheet" href="/css/style18.css">
	<link rel="stylesheet" href="/css/responsives4.css">
	<link rel="stylesheet" href="https://fontawesome.com/">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
	 crossorigin="anonymous" referrerpolicy="no-referrer" />
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f5f5f5;
			margin: 0;
			padding: 0;
		}

		.faq-section {
			width: 80%;
			margin: 20px auto;
			background: white;
			padding: 20px;
			border-radius: 8px;
			box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
		}

		.faq-title {
			background: #d32f2f;
			color: white;
			padding: 10px;
			margin: 0;
			border-radius: 5px 5px 0 0;
			text-align: left;
		}

		.faq-box {
			background: #f0f0f0;
			margin: 10px 0;
			padding: 15px;
			border-radius: 5px;
		}

		.faq-heading {
			font-weight: bold;
		}

		.faq-content {
			margin-top: 5px;
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
                <a href="main.php#process_section" id="process">Process</a>
                <a href="javascript:void(0);" onclick="navigateWithLoader('/user/contacts2.php')" id="contact">Contact Us</a>
            </div>
            <div class="nav2">
                <h2>Welcome, <?php echo $_SESSION['user']; ?>!</h2>
                    <a href="../user/logout6.php">Logout</a>
            </div>
        </nav>

        <div class="faq-section">
            <h2 class="faq-title">Frequently Asked Questions</h2>

            <div class="faq-box">
    <div class="faq-heading">Question: How to apply for a scheme?</div>
    <div class="faq-content">Answer: Register by entering basic details. After registration, log in, update your profile, and apply.</div>
</div>

<div class="faq-box">
    <div class="faq-heading">Question: Am I eligible for any scheme?</div>
    <div class="faq-content">Answer: Check eligibility by entering your details in the "Check Eligibility" link on the homepage.</div>
</div>

<div class="faq-box">
    <div class="faq-heading">Question: I am above 21 years. Can I apply?</div>
    <div class="faq-content">Answer: Eligibility criteria vary by scheme. Check the scheme guidelines on the homepage.</div>
</div>

<div class="faq-box">
    <div class="faq-heading">Question: My child is under 11 years. Are they eligible?</div>
    <div class="faq-content">Answer: Check their eligibility using the "Check Eligibility" link on the homepage.</div>
</div>

<div class="faq-box">
    <div class="faq-heading">Question: Can I apply for my minor children?</div>
    <div class="faq-content">Answer: Yes, register yourself on the portal and apply on their behalf.</div>
</div>

<div class="faq-box">
    <div class="faq-heading">Question: How long does application processing take?</div>
    <div class="faq-content">Answer: HQ forwards applications within a month. Training Centres process them in another month. Selection trials follow, and results are reviewed by Regional Centres. Selected candidates get call letters within a month.</div>
</div>

<div class="faq-box">
    <div class="faq-heading">Question: Where can I find details on sports disciplines?</div>
    <div class="faq-content">Answer: Check the "Disciplines" section on the portal.</div>
</div>

<div class="faq-box">
    <div class="faq-heading">Question: How can I contact the Sports Eligibility Platform?</div>
    <div class="faq-content">Answer: Visit the "Contact Us" section for details on HQ, regional, and training centres.</div>
</div>


        </div>
        <!-- Loader Container -->
        <div id="loader">
            <div class="spinner"></div>
        </div>

        <script>
            function CB()
            {
                location.href="payment.php"
            }
        </script>
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
        <script src="/js/home5.js"></script>
    </body>
</html>