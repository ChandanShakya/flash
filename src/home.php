<?php
include_once 'menu.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flash</title>
    <link href="/assets/css/home.css" rel="stylesheet">
    <!-- <script src="home.js"></script> -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>

<body>
    
     
    <section id="parent">
        <section class="first">
            <div class="content">
                <div class="textB">
                    <h2>Unlock your typing POTENTIAL with <span>Flash</span><br> - The key to more efficient typing
                    </h2>
                    <p>Flash is a skill development platform that helps a user to enhance their typing skills. Flash
                        also motivates a user by offering various levels
                        of sentences that a user can type and shows a detailed result on users typing </p>
                    <a href="src/about_us.php">Learn More</a>
                </div>
                <div class="imgB">
                    <img src="/assets/images/bloom-man-with-headphones-is-typing-on-a-laptop.png" class="keyboard">
                </div>
            </div>
        </section>
        <section class="second">
            <img src="/assets/images/wave1.png" class="wave">
        </section>
    </section>
    <section class="services">
        <h2>Services</h2>
        <div class="row">
            <div class="p">
                <img src="/assets/images/test1.png" id="ts">
                <h3>Typing Tests</h3>
                <p>Flash provides timed
                    typing tests to measure your
                    typing speed (in words per minute) and accuracy. You are
                    given a passage or random words to type, and the website evaluates your performance based on speed
                    and accuracy.</p>
            </div>
            <div class="p">
                <img src="/assets/images/perf1.png" id="per">
                <h3>Performance Tracking</h3>
                <p> Flash offers progress tracking
                    features to monitor your
                    improvement over time. It record
                    your typing speed, accuracy,
                    and other metrics during
                    practice sessions and provide reports to
                    track your progress and motivateyou
                    to achieve your goals.</p>
            </div>
            <div class="p">
                <img src="/assets/images/tips1.png">
                <h3>Typing Tips</h3>
                <p>Flash offer typing tips and resources to
                    help you enhance your typing
                    skills. It provide
                    guidance on proper finger
                    placement, typing
                    techniques, and strategies to
                    improve
                    your speed and accuracy.</p>
            </div>
            <div class="p">
                <img src="/assets/images/exe.png" id="ex">
                <h3>Exercises</h3>
                <p>Flash provide training
                    modules and practice exercises
                    to help you improve your typing
                    skills. These exercises often
                    include various typing drills,
                    paragraphs that focus on specific
                    areas, such as speed, accuracy,
                    finger placement, and technique.</p>
            </div>
        </div>
    </section>
    <section id="par">
        <section class="container">
            <h2 class="at">About Us</h2>
            <div id="boxes">
                <div class="box">
                    <div class="icon"><i class="fa fa-circle-info"></i></div>
                    <div class="content2">
                        <h3>Career</h3>
                        <p>A typing speed calculator can impact your career by enhancing your efficiency, productivity, and accuracy in tasks that involve typing.</p>
                    </div>
                </div>
                <div class="box">
                    <div class="icon"><i class="fa fa-bullseye"></i></div>
                    <div class="content2">
                        <h3>Productivity</h3>
                        <p>A typing speed calculator boosts productivity by enabling faster and more efficient task completion.It save time, meet deadlines and handle large workloads. </p>
                    </div>
                </div>
                <div class="box">
                    <div class="icon"><i class="fa fa-book"></i></div>
                    <div class="content2">
                        <h3>Academic</h3>
                        <p>A typing speed calculator can significantly benefit academics by improving efficiency and effectiveness in various academic tasks.</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="lw">
            <img src="/assets/images/wave2.png" class="lwave">
        </section>

    </section>
    <div class="socialm">
        <p>Social Media</p>
        <div class="sm">
            <ul>
                <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                <li><a href="#"><i class="fa-brands fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
            </ul>
        </div>
    </div>
    <footer>
        <div class="roww">
            <div class="g">
                <p class="para">We are glad to have you on our website. Flash is a free site which enables you to unlock your hidden potentials. So, feel 
                    free to use it anytime and enhance your skills.
                </p>
            </div>
            <div class="g">
                <p><b>Contact Us</b></p>
                <p>Kathmandu, Nepal</p>
                <p>+977 9843462125</p>
                <p>Flash@gmail.com</p>
            </div>
            <div class="g" id="di" <?php if (isset($_SESSION['user_id'])) {
                echo 'style="display: none;"';
            } ?>>
                <h5>Sign Up for Free !!</h5>
                <button><a href="src/login.php">Start now <i class="fa fa-arrow-right"></i></a></button>
            </div>

        </div>
    </footer>
</body>

</html>