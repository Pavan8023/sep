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
        "contact-title": "📞 Contact Us",
        "contact-platform": "Sports Eligibility Platform",
        "contact-address": "Head Office Nipani High Court side (Parvati Cornor), Akkol Road, Nipani - 591237",
        "contact-email": "If you have any feedback, grievance, or are not satisfied, please email to:",
        "footer-contact-email-id": "<strong>sep.elgbt@gmail.com</strong>",
        "footer-locate": "📍 Locate Us"
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
        "contact-title": "📞 संपर्क करें",
        "contact-platform": "स्पोर्ट्स एलिजिबिलिटी पोर्टल",
        "contact-address": "मुख्यालय निपाणी हाई कोर्ट साइड (पार्वती कॉर्नर), अक्कोल रोड, निपाणी - 591237",
        "contact-email": "यदि आपके पास कोई प्रतिक्रिया, शिकायत है, या आप संतुष्ट नहीं हैं, तो कृपया ईमेल करें:",
        "footer-contact-email-id": "<strong>sep.elgbt@gmail.com</strong>",
        "footer-locate": "📍 हमें ढूंढें"
    }
};

const tableData = {
    en: [
        ["Kabaddi", "Raider, Defender, All-Rounder, Dodging, Hand Touch, Bonus Line"],
        ["Football", "Forward, Midfielder, Defender, Goalkeeper, Dribbling, Passing"],
        ["Chess", "Openings, Middle Game, Endgame, Strategy, Checkmate Patterns"],
        ["Hockey", "Striker, Midfielder, Defender, Goalkeeper, Ball Control, Tackling"],
        ["Basketball", "Point Guard, Shooting Guard, Small Forward, Power Forward, Center, Dribbling"],
        ["Kabaddi", "Super Tackle, Super Raid, Toe Touch, Jumping, Holds"],
        ["Football", "Set Pieces, Pressing, Counterattack, One-Two Passing"],
        ["Chess", "Tactics, Positional Play, Board Vision, Calculation Skills"],
        ["Hockey", "Penalty Corner, Marking, Pressing, Overlapping Runs"],
        ["Basketball", "Rebounding, Fast Break, Isolation Play, Pick and Roll"]
    ],
    hi: [
        ["कबड्डी", "रेडर, डिफेंडर, ऑल-राउंडर, डॉजिंग, हैंड टच, बोनस लाइन"],
        ["फुटबॉल", "फॉरवर्ड, मिडफील्डर, डिफेंडर, गोलकीपर, ड्रिब्लिंग, पासिंग"],
        ["शतरंज", "ओपनिंग्स, मिडिल गेम, एंडगेम, रणनीति, चेकमेट पैटर्न्स"],
        ["हॉकी", "स्ट्राइकर, मिडफील्डर, डिफेंडर, गोलकीपर, बॉल कंट्रोल, टैकलिंग"],
        ["बास्केटबॉल", "पॉइंट गार्ड, शूटिंग गार्ड, स्मॉल फॉरवर्ड, पावर फॉरवर्ड, सेंटर, ड्रिब्लिंग"],
        ["कबड्डी", "सुपर टैकल, सुपर रेड, टो टच, जंपिंग, होल्ड्स"],
        ["फुटबॉल", "सेट पीसेस, प्रेसिंग, काउंटरअटैक, वन-टू पासिंग"],
        ["शतरंज", "टैक्टिक्स, पोजिशनल प्ले, बोर्ड विजन, कैलकुलेशन स्किल्स"],
        ["हॉकी", "पेनल्टी कॉर्नर, मार्किंग, प्रेसिंग, ओवरलैपिंग रन"],
        ["बास्केटबॉल", "रीबाउंडिंग, फास्ट ब्रेक, आइसोलेशन प्ले, पिक एंड रोल"]
    ]
};

// discipline zoomer
function toggleFullScreen() {
    const container = document.querySelector('.unique-container');
    container.classList.toggle('fullscreen');
}


function changeLanguage(lang) {
    // Change general text
    for (const id in translations[lang]) {
        const element = document.getElementById(id);
        if (element) {
            element.innerHTML = translations[lang][id];
        }
    }

    // Translate table dynamically
    const table = document.querySelector(".unique-table-container table");
    if (table) {
        table.innerHTML = `<tr><th id="table-heading">${translations[lang]["table-heading"]}</th><th>Details</th></tr>`;
        tableData[lang].forEach(row => {
            const tr = document.createElement("tr");
            tr.innerHTML = `<td class="unique-left">${row[0]}</td><td class="unique-right">${row[1]}</td>`;
            table.appendChild(tr);
        });
    }
}


function toggleMenu() {
    var nav1 = document.querySelector(".nav1");
    var nav2 = document.querySelector(".nav2");

    nav1.classList.toggle("active");
    nav2.classList.toggle("active");
}

// Loader Spinner
// Function to show loader and then navigate
function navigateWithLoader(url) {
    document.getElementById("loader").style.display = "flex"; // Show loader

    setTimeout(() => {
        window.location.href = url; // Navigate to new page
    }, 1500); // Adjust delay if needed
}

// Hide loader after page load
window.addEventListener("load", () => {
    document.getElementById("loader").style.display = "none"; // Hide loader
});

let titleElement = document.getElementById("title");
if (titleElement) {
    titleElement.style.color = "red";
    titleElement.style.fontSize = "1.6rem";
    titleElement.style.fontWeight = "bold";
}
