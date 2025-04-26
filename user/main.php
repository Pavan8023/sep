<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: ../index.php");
    exit;
}

// Prevent browser back to cached page after logout
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main page of SEP</title>
    <link rel="shortcut icon" href="/img3/SEP (1).ico">
    <link rel="stylesheet" href="/css/style18.css">
	<link rel="stylesheet" href="/css/responsives7.css"> 
    <link rel="stylesheet" href="https://fontawesome.com/">
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
            integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
    
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
                <a href="javascript:void(0);" onclick="navigateWithLoader('centres.php')" id="centres">Centres</a>
                <a onclick="CB()" id="check-eligibility">Check Eligibility</a>
                <a href="javascript:void(0);" onclick="navigateWithLoader('discipline.php')" id="discipline">Discipline</a>
                <a href="javascript:void(0);" onclick="navigateWithLoader('faq.php')" id="faq">FAQ</a>
                <a href="#process_section" id="process">Process</a>
                <a href="javascript:void(0);" onclick="navigateWithLoader('contacts2.php')" id="contact">Contact Us</a>
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
            <section class="s1">
                <div class="intro">
                    <div class="img">

                    </div>
                    <div class="info1">
                        <h1 id="intro-title">Introduction</h1>
                        <p id="intro-text">The Sports Eligibility Portal (SEP)
                            helps individuals check their eligibility for
                            athletic programs. It provides a simple and quick
                            way to assess whether they meet the required
                            criteria to participate in sports training and
                            events. Users can easily enter their details, get
                            instant results, and take the next steps toward
                            their athletic journey.</p>
                    </div>
                </div>
            </section>

            <section class="s2">
                <div class="info2" title="Frequently Asked Questions">
                    <div class="i2" id="i1">
                        <h2 id="faq-title">FAQ'S</h2>
                    </div>
                    <figure>
                        <img src="img3/faq.png" alt="FAQ Image">
                    </figure>
                    <ul class="faq-list" id="faq-list">
                        <li><p>1. How to apply for a scheme?</p></li>
                        <li><p>2. I am above 21 years. Can I apply for a
                                scheme?</p></li><br>
                        <li><p>3. I could not apply for some schemes. What are
                                schemes I can apply (or) open for
                                application?</p></li>
                        <li><p>For more information <a
                                    href="main.php#faq_section">Click
                                    here</a></p></li>
                    </ul>
                    <a href="main.php#faq_section" class="more-link">More &gt;&gt;</a>
                </div>
                <div class="info2" title="Discipline section">
                    <div class="i2">
                        <h2 class="discipline"
                            id="discipline-title">Discipline</h2>
                    </div>
                    <figure>
                        <img src="img3/disciplines.png" alt>
                    </figure>
                    <p id="discipline-text">SEP provides information about
                        coaches and training facilities covering various sports
                        disciplines. <a href="discipline.html">Click here</a> to view all the
                        disciplines. The disciplines offered vary from Centre to
                        Centre based on coaches and facilities available at each
                        centre.</p>
                </div>
                <div class="info2" title="Centres section">
                    <div class="i3">
                        <h2 class="centres" id="centres-title">Centres</h2>
                    </div>
                    <figure>
                        <img src="img3/centres.png" alt>
                    </figure>
                    <p id="centres-text">SEP gives the list of training centres
                        across the country. The Centres are where the actual
                        training happens. The facilities (hostel, gyms, pools
                        etc) vary from centre to centre. Also, not all
                        disciplines are offered by all centres, and not all
                        schemes are offered by each centre. <a href="centres.html">Click
                            here</a> to view all the centres.</p>
                </div>
            </section>
            <section class="s3" id="process_section">
                <div class="process">
                    <div class="p1">
                        <img src="img3/process.png" alt>
                    </div>
                    <div class="p2">
                        <h1 id="process-title">Process</h1>
                        <p id="process-text">
                            <span>Step 1</span> - Register on the website. You
                            can also register for your ward. Provide accurate
                            details to ensure a smooth application process.
                            <br><br>
                            <span>Step 2</span> - Create your profile with
                            relevant details about your sports background.
                            Mention any previous participation, achievements, or
                            experience to strengthen your profile. <br><br>
                            <span>Step 3</span> - Check your eligibility and
                            proceed with the next steps. Once eligible, you can
                            explore available opportunities and take the next
                            step in your sports journey.
                        </p>
                    </div>
                </div>
            </section>
            <section class="s4" id="faq_section">
                <div class="faq-body">
                    <div class="faq-container">
                        <ul class="faq-list">
                            <p class="faq-title">Frequently Asked Questions</p>
                            <li> 1. How to apply for a
                                    scheme?</li>
                            <li> 2. I am above 21 years. Can I apply
                                    for a
                                    scheme?</li>
                            <li> 3. I could not apply for some
                                    schemes. What
                                    are schemes I can apply (or) open for
                                    application?</li>
                            <li> 4. What are the benefits I’ll get if
                                    I
                                    selected in a scheme?</li>
                            <li> 5. Am I eligible for any
                                    Scheme?</li>
                            <li> 6. How much time will be taken to
                                    process my
                                    application?</li>
                            <li> 7. My son/daughter is less than 11
                                    years
                                    old. Can they be eligible under any
                                    Scheme?</li>
                            <li> 8. My children are minor, can I
                                    apply for
                                    them?</li>
                            <a href="javascript:void(0);" onclick="navigateWithLoader('faq.html')" class="more-link">More &gt;&gt;</a>
                        </ul>
                        <div class="faq-image">
                            <img src="/img3/faq.png" alt="FAQ Image">
                        </div>
                    </div>
                </div>
            </section>
            <!-- Loader Container -->
<div id="loader">
    <div class="spinner"></div>
</div>

        </main>

        <script src="home4.js">
	    </script>
        <script>
            if (window.history && window.history.pushState) {
                    window.history.pushState(null, null, window.location.href);
                    window.onpopstate = function () {
                    window.history.go(1);
                    };
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
            <div class="footer-section links" id="d2">
                <h3><img src="img3/rel-icon.png" alt="Related Icon"><b> Related
                        Links</b></h3>
                <a href="faq.html">FAQs</a>
                <hr>
                <h2>👤 Follow Us</h2>
                <div class="social-icons">
                    <a href="#"><i class="fa-brands fa-facebook"></i></a>
                    <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
                </div>
                <div class="developer">
                    <p>Developed By <strong>Threelancer@co.ltd</strong></p>
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
`