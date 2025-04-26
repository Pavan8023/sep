const translations = {
    en: {
        title: "National Talent Search Portal",
        home: "Home",
        centres: "Centres",
        "check-eligibility": "Check Eligibility",
        discipline: "Discipline",
        process: "Process",
        contact: "Contact Us",
        login: "Login",
        register: "Register",
        faq: "FAQ",

        // Middle Contact Section
        "contact-title": "📞 Contact Us",
        "contact-platform": "Sports Eligibility Platform",
        "contact-address": "Head Office Nipani High Court side (Parvati Corner), Akkol Road, Nipani - 591237",
        "contact-email": "If you have any feedback, grievance, or are not satisfied, please email to:",
        "contact-email-id": "<strong>sep.elgbt@gmail.com</strong>",
        "contact-helpline": "<span class='icon'>☎️</span><strong>Helpline Number:</strong><br><br>9322108023,<br>7090319002",
        
        // Footer Contact Section
        "footer-contact-title": "📞 Contact Us",
        "footer-contact-platform-name": "Sports Eligibility Platform",
        "footer-contact-office-address": "Head Office Nipani High Court side (Parvati Corner), Akkol Road, Nipani - 591237",
        "footer-contact-email-text": "If you have any feedback, grievance, or are not satisfied, please email to:",
        "footer-contact-email-id": "<strong>sep.elgbt@gmail.com</strong>",
        
        // Footer Locate Us
        "footer-locate": "📍 Locate Us",
    },
    hi: {
        title: "राष्ट्रीय प्रतिभा खोज पोर्टल",
        home: "मुखपृष्ठ",
        centres: "केंद्र",
        "check-eligibility": "पात्रता जाँचें",
        discipline: "अनुशासन",
        process: "प्रक्रिया",
        contact: "संपर्क करें",
        login: "लॉगिन",
        register: "रजिस्टर करें",
        faq: "सामान्य प्रश्न",

        // Middle Contact Section
        "contact-title": "📞 संपर्क करें",
        "contact-platform": "स्पोर्ट्स एलिजिबिलिटी पोर्टल",
        "contact-address": "मुख्यालय निपाणी हाई कोर्ट साइड (पार्वती कॉर्नर), अक्कोल रोड, निपाणी - 591237",
        "contact-email": "यदि आपके पास कोई प्रतिक्रिया, शिकायत है, या आप संतुष्ट नहीं हैं, तो कृपया ईमेल करें:",
        "contact-email-id": "<strong>sep.elgbt@gmail.com</strong>",
        "contact-helpline": "<span class='icon'>☎️</span><strong>हेल्पलाइन नंबर:</strong><br><br>9322108023,<br>7090319002",
        
        // Footer Contact Section
        "footer-contact-title": "📞 संपर्क करें",
        "footer-contact-platform-name": "स्पोर्ट्स एलिजिबिलिटी पोर्टल",
        "footer-contact-office-address": "मुख्यालय निपाणी हाई कोर्ट साइड (पार्वती कॉर्नर), अक्कोल रोड, निपाणी - 591237",
        "footer-contact-email-text": "यदि आपके पास कोई प्रतिक्रिया, शिकायत है, या आप संतुष्ट नहीं हैं, तो कृपया ईमेल करें:",
        "footer-contact-email-id": "<strong>sep.elgbt@gmail.com</strong>",

        // Footer Locate Us
        "footer-locate": "📍 हमें ढूंढें",
    }
};

// Function to change language
function changeLanguage(lang) {
    for (const id in translations[lang]) {
        const element = document.getElementById(id);
        if (element) {
            element.innerHTML = translations[lang][id];
        }
    }
}


// Toggle navigation menu
function toggleMenu() {
    var nav1 = document.querySelector(".nav1");
    var nav2 = document.querySelector(".nav2");

    nav1.classList.toggle("active");
    nav2.classList.toggle("active");
}

// Function to show loader and navigate to another page
function navigateWithLoader(url) {
    document.getElementById("loader").style.display = "flex"; // Show loader

    setTimeout(() => {
        window.location.href = url; // Navigate to new page
    }, 1500);
}

// Hide loader after page load
window.addEventListener("load", () => {
    document.getElementById("loader").style.display = "none"; // Hide loader
});

// Function to toggle fullscreen contact section
function toggleFullScreen() {
    const container = document.querySelector('.contact-container');
    container.classList.toggle('fullscreen1');
}


// Title styling
let titleElement = document.getElementById("title");
if (titleElement) {
    titleElement.style.color = "red";
    titleElement.style.fontSize = "1.6rem";
    titleElement.style.fontWeight = "bold";
}
