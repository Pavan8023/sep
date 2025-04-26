<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sports Training Centres</title>
	<link rel="shortcut icon" href="/img3/SEP (1).ico">
	<link rel="stylesheet" href="/css/style18.css">
	<link rel="stylesheet" href="/css/responsives4.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
	 crossorigin="anonymous" referrerpolicy="no-referrer">
</head>

<body class="body3">
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
        <script>
            function CB()
            {
                location.href="payment.php"
            }
        </script>
        <div class="custom-table-container">
            <table class="custom-table">
                <thead>
                    <tr>
                        <th id="table-heading-sr">Sr. No.</th>
                        <th id="table-heading-centres">Centres</th>
                        <th id="table-heading-scheme">Scheme</th>
                        <th id="table-heading-region">Region</th>
                        <th id="table-heading-address">Address</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td id="centre1">NSNIS, Patiala</td>
                        <td id="scheme1">Centre of Excellence</td>
                        <td id="region1">Punjab</td>
                        <td id="address1">Sports Authority of India, NSNIS,
                            Patiala-147001</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td id="centre2">SAI National Center of Excellence,
                            Lucknow</td>
                        <td id="scheme2">National Center of Excellence</td>
                        <td id="region2">Uttar Pradesh</td>
                        <td id="address2">SAI, Lucknow, Uttar Pradesh</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td id="centre3">Major Dhyan Chand National Stadium, New
                            Delhi</td>
                        <td id="scheme3">National Training Centre</td>
                        <td id="region3">Delhi</td>
                        <td id="address3">India Gate, New Delhi, Delhi</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td id="centre4">Rajiv Gandhi Sports Complex,
                            Rohtak</td>
                        <td id="scheme4">Training Centre</td>
                        <td id="region4">Haryana</td>
                        <td id="address4">Rohtak, Haryana</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td id="centre5">Bakshi Stadium, Srinagar</td>
                        <td id="scheme5">Training Centre</td>
                        <td id="region5">Jammu & Kashmir</td>
                        <td id="address5">Srinagar, Jammu & Kashmir</td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td id="centre6">Shiv Chhatrapati Sports Complex,
                            Pune</td>
                        <td id="scheme6">National Training Centre</td>
                        <td id="region6">Maharashtra</td>
                        <td id="address6">Balewadi, Pune, Maharashtra</td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td id="centre7">Sesa Football Academy, Goa</td>
                        <td id="scheme7">Football Academy</td>
                        <td id="region7">Goa</td>
                        <td id="address7">Sanquelim & Sirsaim, Goa</td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td id="centre8">SAI National Center of Excellence,
                            Gandhinagar</td>
                        <td id="scheme8">National Center of Excellence</td>
                        <td id="region8">Gujarat</td>
                        <td id="address8">Gandhinagar, Gujarat</td>
                    </tr>
                    <tr>
                        <td>9</td>
                        <td id="centre9">Sawai Mansingh Stadium, Jaipur</td>
                        <td id="scheme9">Training Centre</td>
                        <td id="region9">Rajasthan</td>
                        <td id="address9">Jaipur, Rajasthan</td>
                    </tr>
                    <tr>
                        <td>10</td>
                        <td id="centre10">SAI National Center of Excellence,
                            Kolkata</td>
                        <td id="scheme10">National Center of Excellence</td>
                        <td id="region10">West Bengal</td>
                        <td id="address10">Kolkata, West Bengal</td>
                    </tr>
                    <tr>
                        <td>11</td>
                        <td id="centre11">Kalinga Stadium, Bhubaneswar</td>
                        <td id="scheme11">Training Centre</td>
                        <td id="region11">Odisha</td>
                        <td id="address11">Bhubaneswar, Odisha</td>
                    </tr>
                    <tr>
                        <td>12</td>
                        <td id="centre12">Tata Football Academy (TFA), Jamshedpur</td>
                        <td id="scheme12">Football Academy</td>
                        <td id="region12">Jharkhand</td>
                        <td id="address12">Jamshedpur, Jharkhand</td>
                    </tr>
                    <tr>
                        <td>13</td>
                        <td id="centre13">Patliputra Sports Complex, Patna</td>
                        <td id="scheme13">Training Centre</td>
                        <td id="region13">Bihar</td>
                        <td id="address13">Patna, Bihar</td>
                    </tr>
                    <tr>
                        <td>14</td>
                        <td id="centre14">Inspire Institute of Sport (IIS), Bellary</td>
                        <td id="scheme14">Sports Institute</td>
                        <td id="region14">Karnataka</td>
                        <td id="address14">Bellary, Karnataka</td>
                    </tr>
                    <tr>
                        <td>15</td>
                        <td id="centre15">Gopichand Badminton Academy, Hyderabad</td>
                        <td id="scheme15">Badminton Academy</td>
                        <td id="region15">Telangana</td>
                        <td id="address15">Hyderabad, Telangana</td>
                    </tr>
                    <tr>
                        <td>16</td>
                        <td id="centre16">SDAT Sports Academy, Chennai</td>
                        <td id="scheme16">Training Centre</td>
                        <td id="region16">Tamil Nadu</td>
                        <td id="address16">Chennai, Tamil Nadu</td>
                    </tr>
                    <tr>
                        <td>17</td>
                        <td id="centre17">Dr. YSR Sports School, Kadapa</td>
                        <td id="scheme17">Sports School</td>
                        <td id="region17">Andhra Pradesh</td>
                        <td id="address17">Kadapa, Andhra Pradesh</td>
                    </tr>
                    <tr>
                        <td>18</td>
                        <td id="centre18">GV Raja Sports School, Thiruvananthapuram</td>
                        <td id="scheme18">Sports School</td>
                        <td id="region18">Kerala</td>
                        <td id="address18">Thiruvananthapuram, Kerala</td>
                    </tr>
                    <tr>
                        <td>19</td>
                        <td id="centre19">Mary Kom Regional Boxing Foundation, Imphal</td>
                        <td id="scheme19">Boxing Academy</td>
                        <td id="region19">Manipur</td>
                        <td id="address19">Imphal, Manipur</td>
                    </tr>
                    <tr>
                        <td>20</td>
                        <td id="centre20">Iswarati Center for Badminton Learning, Guwahati</td>
                        <td id="scheme20">Badminton Academy</td>
                        <td id="region20">Assam</td>
                        <td id="address20">Guwahati, Assam</td>
                    </tr>
                    <tr>
                        <td>21</td>
                        <td id="centre21">Zarkawt Sports Academy, Aizawl</td>
                        <td id="scheme21">Sports Academy</td>
                        <td id="region21">Mizoram</td>
                        <td id="address21">Aizawl, Mizoram</td>
                    </tr>
                    <tr>
                        <td>22</td>
                        <td id="centre22">Indira Gandhi Stadium, Kohima</td>
                        <td id="scheme22">Training Centre</td>
                        <td id="region22">Nagaland</td>
                        <td id="address22">Kohima, Nagaland</td>
                    </tr>
                </tbody>
            </table>

        </div>
        <!-- Loader Container -->
        <div id="loader">
            <div class="spinner"></div>
        </div>
        <footer class="footer">
            <div class="footer-section locate" id="footer-locate">
                <h3 id="locate-title">📍 Locate Us</h3>
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d777.0!2d74.3751572!3d16.4133214!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc0f18a0cebdd8d%3A0x2a05e7a8e51eeafc!2sShri%20Saibaba%20Devasthana%20-%20(Nippani)!5e0!3m2!1sen!2sin!4v1709385678900!5m2!1sen!2sin&t=k&z=18"
                    width="80%"
                    height="200vh"
                    style="border:0;"
                    allowfullscreen
                    loading="lazy">
                </iframe>
            </div>
            <div class="footer-section links" id="footer-links">
                <h3 id="related-links-title">📌 Related Links</h3>
                <h3 id="follow-us-title">👤 Follow Us</h3>
                <div class="social-icons" id="social-icons">
                    <a href="#"><i class="fa-brands fa-facebook"></i></a>
                    <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
                </div>
                <div class="developer" id="developer-info">
                    <p id="developer-text">Developed By <strong>Threelancer@co.ltd</strong></p>
                </div>
            </div>
            <div class="footer-section contact" id="footer-contact">
                <h3 id="contact-title">📞 Contact Us</h3>
                <p id="contact-platform">Sports Eligibility Platform</p>
                <p id="contact-address">Head Office Nipani High Court side (Parvati Corner), Akkol
                    Road, Nipani - 591237</p>
                <p id="contact-email-text">If you have any feedback, grievance, or are not satisfied,
                    please email to:</p>
                <p id="contact-email"><strong>sep.elgbt@gmail.com</strong></p>
            </div>
        </footer>
        
        <script src="/js/centers3.js"></script>
    </body>
</html>