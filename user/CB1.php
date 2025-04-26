<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Eligibility Page</title>
        <link rel="shortcut icon" href="/img3/SEP (1).ico">
        <link rel="stylesheet" href="/css/style18.css">
        <link rel="stylesheet" href="/css/responsives7.css">
        <link rel="stylesheet" href="/css/elgbt.css">
    </head>
    <body>

        <header class="header">
            <div class="header-container">
                <div class="logo">
                    <img src="/img3/SEP (1).png" alt="Logo">
                </div>
                <div class="title" id="title"><h2>National Talent Search Portal</h2></div>
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

    <div class="container">
        <!-- Left Side - Eligibility Form -->
        <div class="left-section">
            <h2>Sports Eligibility Form</h2>

    <form id="eligibilityForm" action="process_form.php" method="POST">
        
        <!-- Personal Details -->
        <fieldset>
            <legend>Personal Details</legend>

            <label for="full_name">Full Name:</label>
            <input type="text" id="full_name" name="full_name" required>

            <label for="dob">Date of Birth:</label>
            <input type="date" id="dob" name="dob" required>

            <label for="age">Age:</label>
            <input type="number" id="age" name="age" min="10" max="50" required>

            <label for="gender">Gender:</label>
            <select id="gender" name="gender" required>
                <option value="" disabled selected>Select Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="mobile">Mobile Number:</label>
            <input type="tel" id="mobile" name="mobile" required>

            <label for="address">Address:</label>
            <textarea id="address" name="address" rows="3" required></textarea>

            <label for="city">City:</label>
            <input type="text" id="city" name="city" required>

            <select name="state" id="state" class="block w-full mt-1 p-2 border border-gray-300 rounded-md">
                <option value="">-- Select State --</option>
                <option value="Punjab">Punjab</option>
                <option value="Uttar Pradesh">Uttar Pradesh</option>
                <option value="Delhi">Delhi</option>
                <option value="Haryana">Haryana</option>
                <option value="Jammu & Kashmir">Jammu & Kashmir</option>
                <option value="Maharashtra">Maharashtra</option>
                <option value="Goa">Goa</option>
                <option value="Gujarat">Gujarat</option>
                <option value="Rajasthan">Rajasthan</option>
                <option value="West Bengal">West Bengal</option>
                <option value="Odisha">Odisha</option>
                <option value="Jharkhand">Jharkhand</option>
                <option value="Bihar">Bihar</option>
                <option value="Karnataka">Karnataka</option>
                <option value="Telangana">Telangana</option>
                <option value="Tamil Nadu">Tamil Nadu</option>
                <option value="Andhra Pradesh">Andhra Pradesh</option>
                <option value="Kerala">Kerala</option>
                <option value="Manipur">Manipur</option>
                <option value="Assam">Assam</option>
                <option value="Mizoram">Mizoram</option>
                <option value="Nagaland">Nagaland</option>
            </select>


            <label for="pincode">Pincode:</label>
            <input type="text" id="pincode" name="pincode" pattern="[0-9]{6}" required>

        </fieldset>

        <!-- Sport Selection -->
        <fieldset>
            <legend>Sport Selection</legend>

            <label for="sport">Select Your Sport:</label>
            <select id="sport" name="sport" required>
                <option value="" disabled selected>Select a Sport</option>
                <option value="Cricket">Cricket</option>
                <option value="Kabaddi">Kabaddi</option>
                <option value="Basketball">Basketball</option>
                <option value="Football">Football</option>
                <option value="Hockey">Hockey</option>
            </select>

        </fieldset>

        <!-- Physical Fitness Details -->
        <fieldset>
            <legend>Physical Fitness Details</legend>

            <label for="height">Height (in cm):</label>
            <input type="number" id="height" name="height" min="100" max="180" required>

            <label for="weight">Weight (in kg):</label>
            <input type="number" id="weight" name="weight" min="30" max="90" required>

        </fieldset>

        <!-- Experience -->
        <fieldset>
            <legend>Experience</legend>

            <label for="level">Level of Participation:</label>
            <select id="level" name="level" required>
                <option value="" disabled selected>Select Level</option>
                <option value="School">School</option>
                <option value="College">College</option>
                <option value="State">State</option>
                <option value="National">National</option>
            </select>

        </fieldset>

        <!-- Declaration & Consent -->
        <fieldset>
            <legend>Declaration & Consent</legend>

            <label>
                <input type="checkbox" name="agree" required> 
                I agree to the <a href="#">Terms & Conditions</a>.
            </label>

            <label>
                <input type="checkbox" name="parent_consent"> 
                I have parental consent (for minors).
            </label>

        </fieldset>

        <button type="submit">Submit</button>
    </form>

        <script>
            document.addEventListener("DOMContentLoaded", function () {
                document.getElementById("eligibilityForm").addEventListener("submit", function (event) {
                    event.preventDefault(); // Always prevent default first
                    
                    var gender = document.getElementById("gender").value;
                    var level = document.getElementById("level").value;
                    var weight = parseFloat(document.getElementById("weight").value);
                    var height = parseFloat(document.getElementById("height").value);
                    var age = parseInt(document.getElementById("age").value);
                    var sport = document.getElementById("sport").value;

                    // Basic validation
                    if (!gender || !sport || !level || isNaN(weight) || isNaN(height) || isNaN(age)) {
                        showModal("Please fill out all fields correctly.");
                        return;
                    }

                    // School level check
                    if (level === "School") {
                        showModal("School athletes are not eligible for state-level centres.");
                        return;
                    }

                    // Sport-specific eligibility checks
                    let isEligible = true;
                    let errorMessage = "";
                    
                    switch (sport) {
                        case "Cricket":
                            if (age < 14) {
                                isEligible = false;
                                errorMessage = "Cricket: Minimum age is 14.";
                            } else if (age > 25) {
                                isEligible = false;
                                errorMessage = "Cricket: Maximum age is 25.";
                            } else if (gender === "Male" && height < 160) {
                                isEligible = false;
                                errorMessage = "Cricket: Male athletes must be at least 160cm tall.";
                            } else if (gender === "Female" && height < 150) {
                                isEligible = false;
                                errorMessage = "Cricket: Female athletes must be at least 150cm tall.";
                            } else if (level !== "State" && level !== "National") {
                                isEligible = false;
                                errorMessage = "Cricket: Only State or National level athletes are eligible.";
                            }
                            break;

                        case "Basketball":
                            if (age < 14) {
                                isEligible = false;
                                errorMessage = "Basketball: Minimum age is 14.";
                            } else if (age > 22) {
                                isEligible = false;
                                errorMessage = "Basketball: Maximum age is 22.";
                            } else if (gender === "Male" && height < 170) {
                                isEligible = false;
                                errorMessage = "Basketball: Male athletes must be at least 170cm tall.";
                            } else if (gender === "Female" && height < 160) {
                                isEligible = false;
                                errorMessage = "Basketball: Female athletes must be at least 160cm tall.";
                            } else if (level !== "College" && level !== "State" && level !== "National") {
                                isEligible = false;
                                errorMessage = "Basketball: Only College, State, or National level athletes are eligible.";
                            } else {
                                let heightMeters = height / 100;
                                let bmi = weight / (heightMeters * heightMeters);
                                if (bmi < 18.5) {
                                    isEligible = false;
                                    errorMessage = "Basketball: BMI is too low. Minimum is 18.5.";
                                } else if (bmi > 24.9) {
                                    isEligible = false;
                                    errorMessage = "Basketball: BMI is too high. Maximum is 24.9.";
                                }
                            }
                            break;

                        case "Football":
                            if (age < 14) {
                                isEligible = false;
                                errorMessage = "Football: Minimum age is 14.";
                            } else if (age > 21) {
                                isEligible = false;
                                errorMessage = "Football: Maximum age is 21.";
                            } else if (gender === "Male" && height < 155) {
                                isEligible = false;
                                errorMessage = "Football: Male athletes must be at least 155cm tall.";
                            } else if (gender === "Female" && height < 150) {
                                isEligible = false;
                                errorMessage = "Football: Female athletes must be at least 150cm tall.";
                            } else if (level !== "State" && level !== "National") {
                                isEligible = false;
                                errorMessage = "Football: Only State or National level athletes are eligible.";
                            }
                            break;

                        case "Hockey":
                            if (age < 14) {
                                isEligible = false;
                                errorMessage = "Hockey: Minimum age is 14.";
                            } else if (age > 24) {
                                isEligible = false;
                                errorMessage = "Hockey: Maximum age is 24.";
                            } else if (gender === "Male" && height < 158) {
                                isEligible = false;
                                errorMessage = "Hockey: Male athletes must be at least 158cm tall.";
                            } else if (gender === "Female" && height < 152) {
                                isEligible = false;
                                errorMessage = "Hockey: Female athletes must be at least 152cm tall.";
                            } else if (level !== "College" && level !== "State" && level !== "National") {
                                isEligible = false;
                                errorMessage = "Hockey: Only College, State, or National level athletes are eligible.";
                            }
                            break;

                        case "Kabaddi":
                            if (age < 15) {
                                isEligible = false;
                                errorMessage = "Kabaddi: Minimum age is 15.";
                            } else if (age > 23) {
                                isEligible = false;
                                errorMessage = "Kabaddi: Maximum age is 23.";
                            } else if (gender === "Male" && weight < 55) {
                                isEligible = false;
                                errorMessage = "Kabaddi: Male athletes must weigh at least 55kg.";
                            } else if (gender === "Female" && weight < 45) {
                                isEligible = false;
                                errorMessage = "Kabaddi: Female athletes must weigh at least 45kg.";
                            } else if (level !== "College" && level !== "State" && level !== "National") {
                                isEligible = false;
                                errorMessage = "Kabaddi: Only College, State, or National level athletes are eligible.";
                            }
                            break;
                    }

                    if (!isEligible) {
                        showModal(errorMessage);
                    } else {
                        // If all conditions are passed, submit the form
                        this.submit();
                    }
                });
            });

            // Modal functions
            function showModal(message) {
                document.getElementById("modalMessage").textContent = message;
                var modal = document.getElementById("errorModal");
                modal.classList.add("show");
            }

            function closeModal() {
                var modal = document.getElementById("errorModal");
                modal.classList.remove("show");
            }
        </script>

        <!-- Custom Modal -->
        <div id="errorModal" class="modal">
            <h3 id="modalMessage"></h3>
            <button onclick="closeModal()">OK</button>
        </div>
        </div>

        <!-- Right Side - Athlete Image & SEP Information -->
        <div class="right-section">
        <div class="info">
            <img src="/img3/sports.png" alt="Athlete" class="athlete-img">
        </div>
            <img src="/img3/all.jpg" alt="Athlete" class="athlete-img">
            <img src="/img3/cricket.jpg" alt="Athlete" class="athlete-img">
            <img src="/img3/football.jpg" alt="Athlete" class="athlete-img">
        </div>
    </div>
        <script src="/js/home5.js"></script>
    </body>
</html>