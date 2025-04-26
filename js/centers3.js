// Translation dictionary (English to Hindi)
const translations = {
    "title": { "en": "National Talent Search Portal", "hi": "राष्ट्रीय प्रतिभा खोज पोर्टल" },
    "home": { "en": "Home", "hi": "मुखपृष्ठ" },
    "centres": { "en": "Centres", "hi": "केंद्र" },
    "check-eligibility": { "en": "Check Eligibility", "hi": "पात्रता जांचें" },
    "discipline": { "en": "Discipline", "hi": "अनुशासन" },
    "faq": { "en": "FAQ", "hi": "सामान्य प्रश्न" },
    "process": { "en": "Process", "hi": "प्रक्रिया" },
    "contact": { "en": "Contact Us", "hi": "संपर्क करें" },
    "login": { "en": "Login", "hi": "लॉगिन" },
    "register": { "en": "Register", "hi": "रजिस्टर करें" },

    // Table Headings
    "table-heading-sr": { "en": "Sr. No.", "hi": "क्रमांक" },
    "table-heading-centres": { "en": "Centres", "hi": "केंद्र" },
    "table-heading-scheme": { "en": "Scheme", "hi": "योजना" },
    "table-heading-region": { "en": "Region", "hi": "क्षेत्र" },
    "table-heading-address": { "en": "Address", "hi": "पता" },
    "table-heading-coach": { "en": "Coach info", "hi": "कोच जानकारी" },

    // Table Data (All 11 rows)
    "centre1": { "en": "NSNIS, Patiala", "hi": "एनएसएनआईएस, पटियाला" },
    "scheme1": { "en": "Centre of Excellence", "hi": "उत्कृष्टता केंद्र" },
    "region1": { "en": "Punjab", "hi": "पंजाब" },
    "address1": { "en": "Sports Authority of India, NSNIS, Patiala-147001", "hi": "भारतीय खेल प्राधिकरण, एनएसएनआईएस, पटियाला-147001" },

    "centre2": { "en": "SAI National Center of Excellence, Lucknow", "hi": "एसएआई राष्ट्रीय उत्कृष्टता केंद्र, लखनऊ" },
    "scheme2": { "en": "National Center of Excellence", "hi": "राष्ट्रीय उत्कृष्टता केंद्र" },
    "region2": { "en": "Uttar Pradesh", "hi": "उत्तर प्रदेश" },
    "address2": { "en": "SAI, Lucknow, Uttar Pradesh", "hi": "एसएआई, लखनऊ, उत्तर प्रदेश" },

    "centre3": { "en": "Major Dhyan Chand National Stadium, New Delhi", "hi": "मेजर ध्यानचंद राष्ट्रीय स्टेडियम, नई दिल्ली" },
    "scheme3": { "en": "National Training Centre", "hi": "राष्ट्रीय प्रशिक्षण केंद्र" },
    "region3": { "en": "Delhi", "hi": "दिल्ली" },
    "address3": { "en": "India Gate, New Delhi, Delhi", "hi": "इंडिया गेट, नई दिल्ली, दिल्ली" },

    "centre4": { "en": "Rajiv Gandhi Sports Complex, Rohtak", "hi": "राजीव गांधी खेल परिसर, रोहतक" },
    "scheme4": { "en": "Training Centre", "hi": "प्रशिक्षण केंद्र" },
    "region4": { "en": "Haryana", "hi": "हरियाणा" },
    "address4": { "en": "Rohtak, Haryana", "hi": "रोहतक, हरियाणा" },

    "centre5": { "en": "Bakshi Stadium, Srinagar", "hi": "बख्शी स्टेडियम, श्रीनगर" },
    "scheme5": { "en": "Training Centre", "hi": "प्रशिक्षण केंद्र" },
    "region5": { "en": "Jammu & Kashmir", "hi": "जम्मू और कश्मीर" },
    "address5": { "en": "Srinagar, Jammu & Kashmir", "hi": "श्रीनगर, जम्मू और कश्मीर" },

    "centre6": { "en": "Shiv Chhatrapati Sports Complex, Pune", "hi": "शिव छत्रपति खेल परिसर, पुणे" },
    "scheme6": { "en": "National Training Centre", "hi": "राष्ट्रीय प्रशिक्षण केंद्र" },
    "region6": { "en": "Maharashtra", "hi": "महाराष्ट्र" },
    "address6": { "en": "Balewadi, Pune, Maharashtra", "hi": "बालेवाड़ी, पुणे, महाराष्ट्र" },

    "centre7": { "en": "Sesa Football Academy, Goa", "hi": "सेसा फुटबॉल अकादमी, गोवा" },
    "scheme7": { "en": "Football Academy", "hi": "फुटबॉल अकादमी" },
    "region7": { "en": "Goa", "hi": "गोवा" },
    "address7": { "en": "Sanquelim & Sirsaim, Goa", "hi": "सांकेलिम और सिरसैम, गोवा" },

    "centre8": { "en": "SAI National Center of Excellence, Gandhinagar", "hi": "एसएआई राष्ट्रीय उत्कृष्टता केंद्र, गांधीनगर" },
    "scheme8": { "en": "National Center of Excellence", "hi": "राष्ट्रीय उत्कृष्टता केंद्र" },
    "region8": { "en": "Gujarat", "hi": "गुजरात" },
    "address8": { "en": "Gandhinagar, Gujarat", "hi": "गांधीनगर, गुजरात" },

    "centre9": { "en": "Sawai Mansingh Stadium, Jaipur", "hi": "सवाई मानसिंह स्टेडियम, जयपुर" },
    "scheme9": { "en": "Training Centre", "hi": "प्रशिक्षण केंद्र" },
    "region9": { "en": "Rajasthan", "hi": "राजस्थान" },
    "address9": { "en": "Jaipur, Rajasthan", "hi": "जयपुर, राजस्थान" },

    "centre10": { "en": "SAI National Center of Excellence, Kolkata", "hi": "एसएआई राष्ट्रीय उत्कृष्टता केंद्र, कोलकाता" },
    "scheme10": { "en": "National Center of Excellence", "hi": "राष्ट्रीय उत्कृष्टता केंद्र" },
    "region10": { "en": "West Bengal", "hi": "पश्चिम बंगाल" },
    "address10": { "en": "Kolkata, West Bengal", "hi": "कोलकाता, पश्चिम बंगाल" },

    "centre11": { "en": "Kalinga Stadium, Bhubaneswar", "hi": "कलिंगा स्टेडियम, भुवनेश्वर" },
    "scheme11": { "en": "Training Centre", "hi": "प्रशिक्षण केंद्र" },
    "region11": { "en": "Odisha", "hi": "ओडिशा" },
    "address11": { "en": "Bhubaneswar, Odisha", "hi": "भुवनेश्वर, ओडिशा" },
    "centre12": { "en": "Tata Football Academy (TFA), Jamshedpur", "hi": "टाटा फुटबॉल अकादमी (टीएफए), जमशेदपुर" },
    "scheme12": { "en": "Football Academy", "hi": "फुटबॉल अकादमी" },
    "region12": { "en": "Jharkhand", "hi": "झारखंड" },
    "address12": { "en": "Jamshedpur, Jharkhand", "hi": "जमशेदपुर, झारखंड" },

    "centre13": { "en": "Patliputra Sports Complex, Patna", "hi": "पाटलिपुत्र स्पोर्ट्स कॉम्प्लेक्स, पटना" },
    "scheme13": { "en": "Training Centre", "hi": "प्रशिक्षण केंद्र" },
    "region13": { "en": "Bihar", "hi": "बिहार" },
    "address13": { "en": "Patna, Bihar", "hi": "पटना, बिहार" },

    "centre14": { "en": "Inspire Institute of Sport (IIS), Bellary", "hi": "इंस्पायर इंस्टीट्यूट ऑफ स्पोर्ट (आईआईएस), बेल्लारी" },
    "scheme14": { "en": "Sports Institute", "hi": "खेल संस्थान" },
    "region14": { "en": "Karnataka", "hi": "कर्नाटक" },
    "address14": { "en": "Bellary, Karnataka", "hi": "बेल्लारी, कर्नाटक" },

    "centre15": { "en": "Gopichand Badminton Academy, Hyderabad", "hi": "गोपीचंद बैडमिंटन अकादमी, हैदराबाद" },
    "scheme15": { "en": "Badminton Academy", "hi": "बैडमिंटन अकादमी" },
    "region15": { "en": "Telangana", "hi": "तेलंगाना" },
    "address15": { "en": "Hyderabad, Telangana", "hi": "हैदराबाद, तेलंगाना" },

    "centre16": { "en": "SDAT Sports Academy, Chennai", "hi": "एसडीएटी स्पोर्ट्स अकादमी, चेन्नई" },
    "scheme16": { "en": "Training Centre", "hi": "प्रशिक्षण केंद्र" },
    "region16": { "en": "Tamil Nadu", "hi": "तमिलनाडु" },
    "address16": { "en": "Chennai, Tamil Nadu", "hi": "चेन्नई, तमिलनाडु" },

    "centre17": { "en": "Dr. YSR Sports School, Kadapa", "hi": "डॉ. वाईएसआर स्पोर्ट्स स्कूल, कडप्पा" },
    "scheme17": { "en": "Sports School", "hi": "खेल विद्यालय" },
    "region17": { "en": "Andhra Pradesh", "hi": "आंध्र प्रदेश" },
    "address17": { "en": "Kadapa, Andhra Pradesh", "hi": "कडप्पा, आंध्र प्रदेश" },

    "centre18": { "en": "GV Raja Sports School, Thiruvananthapuram", "hi": "जीवी राजा स्पोर्ट्स स्कूल, तिरुवनंतपुरम" },
    "scheme18": { "en": "Sports School", "hi": "खेल विद्यालय" },
    "region18": { "en": "Kerala", "hi": "केरल" },
    "address18": { "en": "Thiruvananthapuram, Kerala", "hi": "तिरुवनंतपुरम, केरल" },

    "centre19": { "en": "Mary Kom Regional Boxing Foundation, Imphal", "hi": "मैरी कॉम क्षेत्रीय बॉक्सिंग फाउंडेशन, इम्फाल" },
    "scheme19": { "en": "Boxing Academy", "hi": "मुक्केबाजी अकादमी" },
    "region19": { "en": "Manipur", "hi": "मणिपुर" },
    "address19": { "en": "Imphal, Manipur", "hi": "इम्फाल, मणिपुर" },

    "centre20": { "en": "Iswarati Center for Badminton Learning, Guwahati", "hi": "ईश्वरती सेंटर फॉर बैडमिंटन लर्निंग, गुवाहाटी" },
    "scheme20": { "en": "Badminton Academy", "hi": "बैडमिंटन अकादमी" },
    "region20": { "en": "Assam", "hi": "असम" },
    "address20": { "en": "Guwahati, Assam", "hi": "गुवाहाटी, असम" },

    "centre21": { "en": "Zarkawt Sports Academy, Aizawl", "hi": "जारकावत स्पोर्ट्स अकादमी, आइजोल" },
    "scheme21": { "en": "Sports Academy", "hi": "खेल अकादमी" },
    "region21": { "en": "Mizoram", "hi": "मिज़ोरम" },
    "address21": { "en": "Aizawl, Mizoram", "hi": "आइजोल, मिज़ोरम" },

    "centre22": { "en": "Indira Gandhi Stadium, Kohima", "hi": "इंदिरा गांधी स्टेडियम, कोहिमा" },
    "scheme22": { "en": "Training Centre", "hi": "प्रशिक्षण केंद्र" },
    "region22": { "en": "Nagaland", "hi": "नागालैंड" },
    "address22": { "en": "Kohima, Nagaland", "hi": "कोहिमा, नागालैंड" },
    "contact-title": { "en": "📞 Contact Us", "hi": "📞 संपर्क करें" },
    "contact-platform": { "en": "Sports Eligibility Platform", "hi": "खेल पात्रता मंच" },
    "contact-address": { 
        "en": "Head Office Nipani High Court side (Parvati Corner), Akkol Road, Nipani - 591237", 
        "hi": "प्रधान कार्यालय निपाणी हाई कोर्ट साइड (पार्वती कॉर्नर), अक्कोल रोड, निपाणी - 591237" 
    },
    "contact-email": { 
        "en": "If you have any feedback, grievance, or are not satisfied, please email to:", 
        "hi": "यदि आपके पास कोई प्रतिक्रिया, शिकायत है या आप संतुष्ट नहीं हैं, तो कृपया ईमेल करें:" 
    },
    "contact-email-id": { "en": "<strong>sep.elgbt@gmail.com</strong>", "hi": "<strong>sep.elgbt@gmail.com</strong>" },
    "contact-helpline": { 
        "en": "<span class='icon'>☎️</span><strong>Helpline Number:</strong><br><br>9322108023,<br>7090319002", 
        "hi": "<span class='icon'>☎️</span><strong>हेल्पलाइन नंबर:</strong><br><br>9322108023,<br>7090319002" 
    },

    // Footer Contact Section
    "footer-contact-title": { "en": "📞 Contact Us", "hi": "📞 संपर्क करें" },
    "footer-contact-platform-name": { "en": "Sports Eligibility Platform", "hi": "खेल पात्रता मंच" },
    "footer-contact-office-address": { 
        "en": "Head Office Nipani High Court side (Parvati Corner), Akkol Road, Nipani - 591237", 
        "hi": "प्रधान कार्यालय निपाणी हाई कोर्ट साइड (पार्वती कॉर्नर), अक्कोल रोड, निपाणी - 591237" 
    },
    "footer-contact-email-text": { 
        "en": "If you have any feedback, grievance, or are not satisfied, please email to:", 
        "hi": "यदि आपके पास कोई प्रतिक्रिया, शिकायत है या आप संतुष्ट नहीं हैं, तो कृपया ईमेल करें:" 
    },
    "footer-contact-email-id": { "en": "<strong>sep.elgbt@gmail.com</strong>", "hi": "<strong>sep.elgbt@gmail.com</strong>" }
};


// Function to change the language
function changeLanguage(lang) {
    for (let key in translations) {
        let element = document.getElementById(key);
        if (element) {
            element.innerText = translations[key][lang];
        }
    }
}


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
    let loader = document.getElementById("loader");
    if (loader) loader.style.display = "none";
});


// Function to toggle fullscreen contact section
// function toggleFullScreen() {
//     const container = document.querySelector('.contact-container');
//     container.classList.toggle('fullscreen1');
// }

// Title styling
let titleElement = document.getElementById("title");
if (titleElement) {
    titleElement.style.color = "red";
    titleElement.style.fontSize = "1.6rem";
    titleElement.style.fontWeight = "bold";
}

