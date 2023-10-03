<?php
session_start();
if (!isset($_SESSION['SESSION_EMAIL'])) {
    header("Location: index.php");
    die();
}

include 'config.php';

$query = mysqli_query($conn, "SELECT * FROM users WHERE email='{$_SESSION['SESSION_EMAIL']}'");

if (mysqli_num_rows($query) > 0) {
    $row = mysqli_fetch_assoc($query);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scholarship Portal</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

        * {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
        }

        html {
            scroll-behavior: smooth;
        }

        #Navbar {
            display: flex;
            align-items: center;
            /* justify-content: center; */
            position: fixed;
            width: 100%;
            height: 60px;
            background-color: #c1004a;
            color: white;
            z-index: 1;
        }

        /* #Navbar::before {
            content: "";
            background-color: white;
            position: absolute;
            height: 100%;
            width: 100%;
            z-index: -1;
            opacity: 0.1;
        } */

        #Navbar ul {
            display: flex;
        }

        #Navbar ul li {
            /* text-decoration: none; */
            list-style: none;
            font-size: 1.1rem;
            margin: 0px 5px 0px 5px;
            padding: 0px 15px 0px 15px;
            border-radius: 25px;
        }

        #Navbar ul li:hover {
            color: rgb(172, 26, 26);
            background-color: white;
            cursor: pointer;
        }

        .btn1 a {
            color: white;
            text-decoration: none;
            cursor: pointer;
            font-size: 1.1rem;
            margin: 0px 5px 0px 5px;
            padding: 0px 15px 0px 15px;
            border-radius: 25px;
        }

        .btn1 a:hover {
            color: rgb(172, 26, 26);
            background-color: white;
            cursor: pointer;
        }

        .btn {
            position: absolute;
            right: 0;
        }

        .btn a {
            color: white;
            text-decoration: none;
            cursor: pointer;
            font-size: 1.1rem;
            margin: 0px 5px 0px 5px;
            padding: 0px 15px 0px 15px;
            border-radius: 25px;
        }

        .btn a:hover {
            color: rgb(172, 26, 26);
            background-color: white;
            cursor: pointer;
        }

        .banner img {
            margin-top: 65px;
            width: 100%;
        }

        .apply {
            display: flex;
            justify-content: center;
            margin-left: 15px;
            margin-right: 15px;
        }

        .apply a {
            text-decoration: none;
            color: white;
            font-size: 1.5rem;
            background-color: #c1004a;
            border-radius: 50px;
            padding-left: 10px;
            padding-right: 10px;
        }

        .apply a:hover {
            cursor: pointer;
            color: #c1004a;
            border: 2px solid #c1004a;
            background-color: white;
        }

        .newClass {
            display: flex;
            justify-content: center;
            margin-top: 30px;
        }

        .roll {
            display: flex;
            align-items: center;
            font-size: 19px;
            margin-left: 20px;
            margin-right: 20px;
            margin-top: 40px;
        }

        #mark {
            background-color: #dac6ce;
        }

        #news {
            padding-left: 10px;
            padding-right: 10px;
            background-color: #c1004a;
            color: white;
        }

        .cont {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            font-size: 30px;
            margin-top: 40px;
        }

        #about-container {
            margin-top: 40px;
        }

        #about-container h1 {
            font-size: 30px;
            text-align: center;
        }

        #about {
            display: flex;
            margin: 20px 50px 0px 50px;
            align-items: center;
            justify-content: space-evenly;
        }

        #about .box {
            width: 100%;
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            /* border: 2px solid brown; */
            /* border-radius: 20px; */
            padding: 0px 20px;
            font-size: large;
        }

        #about .box img {
            height: 250px;
            width: 350px;
            margin: 0px 30px 0px 30px;
        }

        #service-container {
            margin-top: 60px;
            display: flex;
            color: white;
            flex-direction: column;
            height: 420px;
            justify-content: center;
            align-items: center;
            padding: 0px 100px;
            font-size: large;
            text-align: center;
        }

        #service-container::before {
            content: "";
            position: absolute;
            background: url(images/test4.jpg) no-repeat center top/cover;
            height: 450px;
            width: 100%;
            z-index: -1;
            opacity: 0.95;
            filter: brightness(20%);
        }

        #service-container h1 {
            font-size: 30px;
            text-align: center;
            margin-top: 2.5px;
        }

        #service .box {
            padding-left: 40px;
            padding-right: 40px;
            margin-top: 20px;
        }

        #gallery-container {
            margin-top: 40px;
            text-align: center;
        }

        #gallery-container h1 {
            font-size: 30px;
        }

        #gallery {
            display: flex;
            margin: 0px 50px 0px 50px;
            align-items: center;
            justify-content: space-evenly;
        }

        #gallery .box {
            width: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            border: 2px solid brown;
            border-radius: 20px;
            padding: 0px 20px 23px 20px;
            font-size: large;
            margin: 15px;
        }

        #gallery .box img {
            height: 250px;
            width: 350px;
            margin: 30px 30px 20px 30px;
        }
    </style>
</head>

<body>
    <nav id="Navbar">
        <ul>
            <li><a href="#home"></a>Home</li>
            <li><a href="#about-container"></a>About Us</li>
            <li><a href="#service-container"></a>Services</li>
            <li><a href="#gallery-container"></a>Gallery</li>
        </ul>
        <div class="btn1">
            <a href="allScholar.html">All Scholarships</a>
        </div>
        <div class="btn">
            <a href="logout.php">Logout</a>
        </div>
    </nav>

    <div class="banner">
        <img src="images/scholar.jpg" alt="">
    </div>

    <div class="roll">
        <div id="news">Latest</div>
        <marquee id="mark" direction="left">
            Application deadline extended! HDFC Badhte Kadam Scholarship 2022-23 - Open for students of Class 11-12 | Undergraduate courses (general and professional)
        </marquee>
    </div>

    <div class="cont">
        <p>INDIA'S LARGEST SCHOLARSHIP PLATFORM</p>
        <p>Making Education Affordable</p>
    </div>

    <div class="newClass">
        <div class="apply">
            <a href="regCheck.php">Register</a>
        </div>

        <div class="apply">
            <a href="apply.php">Apply Now</a>
        </div>
    </div>

    <section id="about-container">
        <h1 class="h-primary-center">About Us</h1>
        <div id="about">
            <div class="box">
                <img src="images/students.jpg" alt="">
                <p>A large segment of India’s potential workforce is unemployable. With 76.04% literacy rate and an increasing number of dropouts failing to enrol or complete any form of higher education, the situation is worrying. Financial constraints, lack of know-how about education funding schemes are some of the some of the key contributors to this effect.</br>

                Our Scholarship portal, since 2011, is endeavouring to bridge the gap between scholarship providers and scholarship seekers. As India’s largest scholarship listing portal, we help more than 1 million students by connecting the right scholarships with the right students. Backed by its robust scholarship search engine, it is the only platform in the country that allows both seekers and scholarship providers to access curated scholarship information across the globe.</p>
            </div>
        </div>
    </section>

    <section id="service-container">
        <h1 class="h-primary-center">Services</h1>
        <div id="service">
            <div class="box">
                
                <p><li>We provide career development courses to students at minimum cost</li></br></p>
                <p><li>Learn about Emerging Careers of the Future like: Cyber Security, Gaming, Criminology, Life Coaching, Mentalist, Sports Management, Pet Grooming, Digital Marketing, Artificial Intelligence, Sound Engineering, Rural Management, Merchant Navy, Corporate Training, Health & Wellness</li></br></p>
                <p><li>Explore each career option through the following angles:
                    What is the career about?
                    Who should go for it?
                    Future Prospects?
                    Possible Modes of Working?
                    Required Educational Journey?
                    Colleges & Universities offering the stream?
                    Popular Myths surrounding the career?</li></br>
                </p>
                <p><li>
                    And the bonus - get your queries resolved real time by International Career Experts by being a part of VIP Telegram group</li></br>
                </p>
                <p></li>
                    Full refund policy with No questions asked upto 7 day</li></br>
                </p>
            </div>
        </div>
    </section>


    <section id="gallery-container">
        <h1 class="h-primary-center">Gallery</h1>
        <div id="gallery">
            <div class="box">
                <img src="images/test1.jpg" alt="">
                <h2 class="h-secondary-center">Ashok Kumar</h2>
                <p>After starting my post-graduation studies, I also began providing tuitions to the neighborhood children to meet my educational expenses. But I was still unable to pay the college fee of Rs. 50,000 per annum with my humble income. While looking for ways to overcome this situation, I came across this scholarship portal. With the help of this portal, I applied for HDFC Bank Educational Crisis Scholarship Support and won a scholarship amount.</p>
            </div>

            <div class="box">
                <img src="images/test2.jpg" alt="">
                <h2 class="h-secondary-center">Ajay Raj</h2>
                <p>While the educational expenses of us two siblings was always a concern for my father, it grew even more serious after the lockdown happened. Nevertheless, I kept studying and searching for a scholarship rigorously. That's when I got to know about this portal and was able to apply for the Fullerton India Scholarship . The application process was smooth and I even got selected! I was awarded with an amount of Rs. 40,000 with the help of which I paid my coaching fees</p>
            </div>

            <div class="box">
                <img src="images/test3.jpg" alt="">
                <h2 class="h-secondary-center">Disha Shetty</h2>
                <p>I worked hard to get admission in Manipal College of Health Professions. However, paying the colossal fee of INR 1,60,000 per year was out of the question for my family. Right then, I came to know about this Scholarship portal. I visited the portal and applied for Dr BR & CR Shetty Scholarship for Academic Excellence. Sooner than I could expect, I got an approval call and won a scholarship amount of INR 60,000! Thankyou so much!</p>
            </div>
        </div>
    </section>

</body>

</html>