<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('partials-front/menu.php'); ?>

    <!-- Meta Tags -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Empathy Wellness Center</title>

    <!-- CSS Links -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="styles.css" />

    <!-- Tawk.to Script -->
    <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
            var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
            s1.async=true;
            s1.src='https://embed.tawk.to/66372d639a809f19fb2d8549/1ht3oilbt';
            s1.charset='UTF-8';
            s1.setAttribute('crossorigin','*');
            s0.parentNode.insertBefore(s1,s0);
        })();
    </script>
</head>
<body>
    <?php 
        if(isset($_SESSION['order'])) {
            echo $_SESSION['order'];
            unset($_SESSION['order']);
        }
    ?>

    <header>
        <nav class="section__container nav__container fill">
            <!-- Navigation content goes here -->
        </nav>
        <div class="section__container header__container">
            <div class="header__content">
                <h1><strong>Nurturing Compassionate Care</strong></h1>
                <p><i>
                    Welcome to Empathy Wellness Center where compassion meets care.
                    Our mission is simple yet profound: to provide nurturing support for all those navigating the complex journey of caregiving. 
                    With a team dedicated to understanding your unique needs, we offer a sanctuary of empathy and healing.
                    Whether you're a caregiver seeking respite or a loved one in need of assistance, 
                    our inclusive approach ensures that everyone feels valued and supported. Together, 
                    let's embark on a path of empowerment and wellness, one filled with compassion and understanding.
                </b></i>
            </div>
            <div class="header__form">
                <form>
                    <img src="images/header5.jpg" alt="about" />
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
            url("assets/header.jpg");
            background-position: center center;
            background-size: cover;
            background-repeat: no-repeat;
        }

        @keyframes blink {
            0%, 10% {
                opacity: 1;
            }
            50% {
                opacity: 0;
            }
        }
    </style>

    <section class="section__container service__container">
        <div class="service__header">
            <div class="service__header__content">
                <h2 class="section__header">Our Special service</h2>
                <p>Beyond simply providing medical care, our commitment lies in delivering unparalleled service tailored to your unique needs.</p>
            </div>
        </div>
        <div class="service__grid">
            <div class="service__card">
                <span><i class="ri-microscope-line"></i></span>
                <h4>Laboratory Test</h4>
                <p>Accurate Diagnostics, Swift Results: Experience top-notch Laboratory Testing at our facility.</p>
            </div>
            <div class="service__card">
                <span><i class="ri-percent-line"></i></span>
                <h4>Carement</h4>
                <p>Our thorough assessments and expert evaluations help you stay proactive about your health.</p>
            </div>
            <div class="service__card">
                <span><i class="ri-user-line"></i></span>
                <h4>24 Hours Service</h4>
                <p>Experience comprehensive oral care with Dentistry. Trust us to keep your smile healthy and bright.</p>
            </div>
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
                <ul>
                    <li><i class="ri-instagram-line"></i> Empathi@</li>
                    <li><i class="ri-facebook-fill"></i> EmpathyWellnesscare</li>
                    <li><i class="ri-heart-fill"></i></li>
                    <li><i class="ri-twitter-fill"></i> EmpathyWellnesscare.123</li>
                </ul>
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
