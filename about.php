
<?php include('partials-front/menu.php'); ?>

<?php 
    if(isset($_SESSION['order']))
    {
        echo $_SESSION['order'];
        unset($_SESSION['order']);
    }
?>

<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css" rel="stylesheet" />
<link rel="stylesheet" href="styles.css" />

<link rel="stylesheet" href="style/css/fontawesome.min.css">

<title>Empathy Wellness Center</title>

</head>
<body>
<header>
    <div class="section__container header__container">
        <div class="header__content">
            <h1>About Care Nurturing Compassionate</h1>
            <p><i>
            Welcome to Empathy Wellness Center
			where compassion meets care.<p> 
			Our mission is simple yet profound:
			to provide nurturing support for all those navigating the complex journey of caregiving. 
			With a team dedicated to understanding your unique needs, 
			we offer a sanctuary of empathy and healing. </p>
			<p>Whether you're a caregiver seeking respite or a loved one in need of assistance, 
			our inclusive approach ensures that everyone feels valued and supported. Together, 
			let's embark on a path of empowerment and wellness, 
			one filled with compassion and understanding.
          </b></i>
        </div>
        <div class="header__formm">
            <form>
                <img src="assets/abouts.jpg" alt="about" />
            </form>
        </div>
    </div>
</header>

<style>
header {
    background-image: linear-gradient(
        to right,
        rgba(30, 144, 255, 0.8),   /* Sapphire blue */
        rgba(173, 216, 230, 0.7)   /* Light sky blue at lower opacity */
    ),
    url("assets/header2.jpg");
    background-position: center center;
    background-size: cover;
    background-repeat: no-repeat;
}

.nav__logo {
    display: flex;
    align-items: center;
    text-decoration: none;
}

.nav__logo img {
    height: 50px;
    width: auto;
    margin-right: 10px;
    animation: blink 2s linear infinite;
}

@keyframes blink {
    0%, 100% {
        opacity: 1;
    }
    50% {
        opacity: 0;
    }
}

.header__formm {
    width: 100%;
    max-width: 350px;
}

.header__formm form {
    display: grid;
    gap: 1rem;
    padding: 2rem;
    background-color: var(--white);
    border-radius: 1px;
    box-shadow: 5px 5px 20px rgba(0, 0, 0, 0.2);
}

.header__formm input {
    padding: 1rem;
    outline: none;
    border: none;
    font-size: 1rem;
    color: var(--primary-color);
    background-color: var(--primary-color-light);
    border-radius: 5px;
}

.header__formm input::placeholder {
    color: var(--primary-color);
}

.formm__btn {
    background-color: var(--primary-color);
    transition: 0.3s;
}

.formm__btn:hover {
    background-color: var(--primary-color-dark);
}

.header__formm h4 {
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--primary-color);
}
</style>


<section class="section__container about__container">
    <div class="about__content">
        <h2 class="section__header">About Us</h2>
        <p>
            Empathy Wellness Center is a refuge for those traversing the complexities of caregiving. 
            Our team is deeply attuned to the challenges inherent in this journey, offering a compassionate sanctuary where understanding reigns supreme. 
            We recognize that each caregiver's experience is unique, which is why we prioritize personalized support tailored to your individual needs. 
            Whether you're seeking respite care or guidance on navigating the caregiving landscape, we're here to offer a helping hand and a listening ear.
        </p>
        <p>
            At Empathy Wellness Center, inclusivity is woven into the fabric of everything we do. 
            We embrace diversity and strive to create an environment where everyone feels valued and supported. 
            Our commitment to fostering a sense of belonging extends to both caregivers and care recipients alike. 
            No matter your background or circumstances, you'll find a warm and welcoming community here.
        </p>
        <p>
            Together, let's embark on a journey of empowerment and healing. 
            At Empathy Wellness Center, we're dedicated to walking alongside you every step of the way, offering comfort, guidance, and compassion as you navigate the challenges of caregiving.
        </p>
    </div>
    <div class="about__image">
        <img src="assets/about.jpg" alt="about" />
    </div>
</section>

<footer class="footer">
    <div class="section__container footer__container">
        <div class="footer__col">
            <h3>Health<span>Care</span></h3>
            <p>Empathy Wellness Center: Compassionate care for all on the caregiving journey. Welcome to a sanctuary of support and healing.</p>
        </div>
        <div class="footer__col">
            <ul>
                <h4>About Us</h4>
                <li><a href="index.blade.php">Home</a></li>
                <li><a href="about.blade.php">About Us</a></li>
                <li><a href="giver.blade.php">Services</a></li>
            </ul>
        </div>
        <div class="footer__col">
            <h4>Social Contact Us</h4>
            <li><i class="ri-instagram-line">Empathi@</i></li>
            <li><i class="ri-facebook-fill">EmpathyWellnesscare</i></li>
            <li><i class="ri-heart-fill"></i></li>
            <li><i class="ri-twitter-fill">EmpathyWellnesscare.123</i></li>
        </div>
        <div class="footer__col">
            <h4>Contact Us</h4>
            <p><i class="ri-map-pin-2-fill"></i> 13, Kurunegala, Colombo road</p>
            <p><i class="ri-mail-fill"></i> EmpathyWellness@care.com</p>
            <p><i class="ri-phone-fill"></i> 0702019784</p>
        </div>
    </div>
    <div class="footer__bar">
        <div class="footer__bar__content">
            <div class="footer__socials">
                <span><i class="ri-instagram-line"></i></span>
                <span><i class="ri-facebook-fill"></i></span>
                <span><i class="ri-heart-fill"></i></span>
                <span><i class="ri-twitter-fill"></i></span>
            </div>
        </div>
    </div>
</footer>
</body>
</html>