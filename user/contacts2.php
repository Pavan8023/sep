<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Contact Us</title>
	<link rel="shortcut icon" href="/img3/SEP (1).ico">
	<link rel="stylesheet" href="/css/style18.css">
	<link rel="stylesheet" href="/css/responsives7.css">
	<link rel="stylesheet" href="https://fontawesome.com/">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
	 crossorigin="anonymous" referrerpolicy="no-referrer" />
	<script src="https://cdn.tailwindcss.com">
	</script>
	<script src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js">
	</script>
	<script>
		tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#ef4444', // red-500
                        secondary: '#000000', // black
                        light: '#ffffff' // white
                    }
                }
            }
        }
	</script>
	<style>
		@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
		body {
			font-family: 'Poppins', sans-serif;
			background-color: #f9f9f9;
		}
	</style>
	<style>
		.contact-container.fullscreen1 {
			width: 100%;
			height: 100%;
			position: fixed;
			top: 0;
			left: 0;
			color: rgb(255, 255, 255);
			border-radius: 0;
			z-index: 1000;
			background-color: #181A1B;
			display: flex;
			flex-direction: column;
			justify-content: center;
			align-items: flex-start;
		}

		.body.fullscreen1 {
			height: 100%;
			width: 100%;
			position: fixed;
			top: 0;
			left: 0;
			color: rgb(255, 255, 255);
			display: flex;
			flex-direction: column;
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

		.contact-container {
			transition: transform 0.3s ease;
		}
	</style>
</head>

<body>

	<header class="header">
		<div class="header-container">
			<div class="logo">
				<img src="/img3/SEP (1).ico" alt="Logo">
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

                <a href="javascript:void(0);"
                    onclick="navigateWithLoader('centres.html')"
                    id="centres">Centres</a>
                <a onclick="CB()" id="check-eligibility">Check Eligibility</a>
                <a href="javascript:void(0);"
                    onclick="navigateWithLoader('discipline.html')"
                    id="discipline">Discipline</a>
                <a href="javascript:void(0);"
                    onclick="navigateWithLoader('faq.php')" id="faq">FAQ</a>
                <a href="javascript:void(0);" onclick="navigateWithLoader('index.php#process_section')" id="process">Process</a>
                <a href="javascript:void(0);"
                    onclick="navigateWithLoader('contacts2.html')"
                    id="contact">Contact Us</a>
            </div>
            <div class="nav2">
                <a href="javascript:void(0);"
                    onclick="navigateWithLoader('login.php')"
                    id="login">Login</a>
                <a href="javascript:void(0);"
                    onclick="navigateWithLoader('register.php')"
                    id="register">Register</a>
            </div>
        </nav>
        <script>
            function CB() {
                alert("Access is blocked until you registered and login");
            }
        </script>

        <main class="bg-light min-h-screen flex items-center justify-center p-4">
            <div class="w-full max-w-2xl bg-white shadow-lg rounded-lg overflow-hidden">
        <!-- Form Header -->
        <div class="bg-primary py-4 px-6">
            <h2 class="text-2xl font-bold text-white">Contact Us</h2>
            <p class="text-white opacity-90">We'd love to hear from you!</p>
        </div>
        
        <!-- Contact Form -->
        <form id="contact-form" class="p-6 space-y-6">
            <!-- Name Field -->
            <div>
                <label for="name" class="block text-sm font-medium text-secondary mb-1">Full Name</label>
                <input 
                    type="text" 
                    id="name" 
                    name="name" 
                    required
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                    placeholder="John Doe">
            </div>
            
            <!-- Email Field -->
            <div>
                <label for="email" class="block text-sm font-medium text-secondary mb-1">Email Address</label>
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    required
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                    placeholder="john@example.com">
            </div>
            
            <!-- Subject Field -->
            <div>
                <label for="subject" class="block text-sm font-medium text-secondary mb-1">Subject</label>
                <input 
                    type="text" 
                    id="subject" 
                    name="subject" 
                    required
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                    placeholder="Regarding...">
            </div>
            
            <!-- Message Field -->
            <div>
                <label for="message" class="block text-sm font-medium text-secondary mb-1">Message</label>
                <textarea 
                    id="message" 
                    name="message" 
                    rows="5"
                    required
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                    placeholder="Your message here..."></textarea>
            </div>
            
            <!-- Submit Button -->
            <div>
                <button 
                    type="submit"
                    class="w-full bg-primary hover:bg-red-600 text-white font-bold py-3 px-4 rounded-md transition duration-300 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-opacity-50">
                    Send Message
                </button>
            </div>
        </form>
        
        <!-- Success Message (Hidden by default) -->
        <div id="success-message" class="hidden p-6 bg-green-50 text-green-800">
            <div class="flex items-center">
                <svg class="h-5 w-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                <span class="font-medium">Your message has been sent successfully!</span>
            </div>
        </div>
    </div>

    <!-- EmailJS Script -->
    <script>
        // Initialize EmailJS with your User ID
        (function() {
            emailjs.init('ENtGKurOyEYjygs7r'); // Replace with your actual User ID
            
            const contactForm = document.getElementById('contact-form');
            const successMessage = document.getElementById('success-message');
            
            contactForm.addEventListener('submit', function(e) {
                e.preventDefault();
                
                // Get form data
                const formData = {
                    name: document.getElementById('name').value,
                    email: document.getElementById('email').value,
                    subject: document.getElementById('subject').value,
                    message: document.getElementById('message').value
                };
                
                // Send email using EmailJS
                emailjs.send('service_8iqyxoe', 'template_berd7yh', formData)
                    .then(function(response) {
                        console.log('SUCCESS!', response.status, response.text);
                        
                        // Show success message
                        contactForm.classList.add('hidden');
                        successMessage.classList.remove('hidden');
                        
                        // Reset form
                        contactForm.reset();
                        
                        // Hide success message after 5 seconds
                        setTimeout(() => {
                            successMessage.classList.add('hidden');
                            contactForm.classList.remove('hidden');
                        }, 5000);
                    }, function(error) {
                        console.log('FAILED...', error);
                        alert('Failed to send message. Please try again later.');
                    });
            });
        })();
    </script>

        </main>
        <!-- Loader Container -->
        <div id="loader">
            <div class="spinner"></div>
        </div>

        <script src="/js/contact6.js">
	</script>

        <footer class="footer">
            <!-- Locate Us Section -->
            <div class="footer-section locate">
                <h3 id="footer-locate">📍 Locate Us</h3>
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
                <h3 id="footer-contact-title">📞 Contact Us</h3>
                <p id="footer-contact-platform-name">Sports Eligibility
                    Platform</p>
                <p id="footer-contact-office-address">Head Office Nipani High
                    Court
                    side (Parvati Corner), Akkol Road, Nipani - 591237</p>
                <p id="footer-contact-email-text">If you have any feedback,
                    grievance,
                    or are not satisfied, please email to:</p>
                <p
                    id="footer-contact-email-id"><strong>sep.elgbt@gmail.com</strong></p>
            </div>

        </footer>

    </body>
</html>