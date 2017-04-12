<?php include_once "connector.php"; 
    
    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Mark Allen | Front-end Developer and Graphic Designer</title>
        <script src='https://www.google.com/recaptcha/api.js'></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
        <link rel="stylesheet" href="main.css">
    </head>
    <body>
        <header>
            <div class="name-title">
                <h1>Mark Allen</h1>
                <h3>Front-end developer</h3>
            </div>
        </header>
        <article class="cross-background"></article>
        <section>
            <div class="section-inner">
                <article class="profile-picture"></article>
                <div class="block-container">
                    <h2>My Story</h2>
                    <p>I'm Mark, I'm a freelance Front-end developer and Graphic Designer. Welcome to my personal portfolio. I have a range of development and creative skills and can apply them to a variety of projects, which allow me to create high quality, designs and responsive websites.</p>
                </div>
                <div class="block-container">
                    <h2>Follow me</h2> <a href="https://www.instagram.com/dugtrio91/" title="Instagram"><i class="fa fa-instagram fa-3x"></i></a>
                    <a href="https://uk.pinterest.com/markdallen/" title="Pinterest"><i class="fa fa-pinterest fa-3x"></i></a>
                    <a href="https://github.com/DugTrio91" title="GitHub"><i class="fa fa-github fa-3x"></i></a> <a href="https://twitter.com/DugTrio91" title="Twitter"><i class="fa fa-twitter fa-3x"></i></a>
                    <a href="https://www.linkedin.com/in/mark-allen-188950b3/" title="LinkedIn"><i class="fa fa-linkedin fa-3x"></i></a> 
                </div>
            </div>
        </section>
        <article class="skills-section">
            <div class="skills-box">
                <i class="skill-icon fa fa-code"></i>
                <h3>Programming<br>languages</h3>
                <p>HTML5</p>
                <p>CSS3. SASS</p>
                <p>JavaScript</p>
                <p>PHP</p>
            </div>
            <div class="skills-box">
                <i class="skill-icon fa fa-desktop"></i>
                <h3>Graphic<br>design</h3>
                <p>Photoshop</p>
                <p>Illustrator</p>
                <p>InDesign</p>
            </div>
            <div class="skills-box">
                <i class="skill-icon fa fa-file-code-o"></i>
                <h3>Frameworks &amp; <br>Tools</h3>
                <p>jQuery</p>
                <p>Git</p>
                <p>Bootstrap</p>
            </div>
            <div class="skills-box">
                <i class="skill-icon fa fa-cubes"></i>
                <h3>Transferable <br>
                skills</h3>
                <p>Time management</p>
                <p>Team work</p>
                <p>Communication</p>
                <p>Motivation</p>
                
            </div>  
        </article>
        <section class="work-slideshow">
            <div class="section-inner slideshow-container">
                <?php

            $sql = "SELECT * FROM portfolio ORDER BY id ASC";
            $result = mysqli_query($dbconnect, $sql);

            while($row = mysqli_fetch_array($result)){
            
            echo '<div class="work-slides fade">';
                echo '<div class="block-container">';
                    echo '<h2>My Work</h2>';
                    echo '<div class="work-image" style="background: url(' . $row['image'] . ') center no-repeat; background-size: cover";></div>';
                echo '</div>';
            echo '<div class="block-container">';
            echo '<h3>' . $row['title'] . '</h3>';
            echo '<p>' . $row['description'] . '</p>';
            echo '<input class="go-button" onClick="window.location.href=\'' . $row['link'] . '\'" title="' . $row['title'] . '" type="button" value="View" />';
            echo '</div>';
            echo '</div>';
            
            }
        ?> 
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a> 
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
            <div class="dashes">
                        <?php

            $sql = "SELECT * FROM portfolio ORDER BY id ASC";
            $result = mysqli_query($dbconnect, $sql);

            while($row = mysqli_fetch_array($result)){

            echo '<span class="dash"(' . $row['id'] . ')" onclick="currentSlide(' . $row['id'] . ')"></span>';
            }
        ?> </div>
        </section>
        
        <section>
            <div class="section-inner">
                <div class="contact-form">
                    <?php

    $nameErr = "";
    $emailErr = "";
    $messageErr = "";
    $captchaErr = "";

    $errorCount = 0;

    if(isset($_POST["submit"])){
        if(isset($_POST["g-recaptcha-response"]) && !empty($_POST["g-recaptcha-response"])){

            //your site secret key
            $secret = "6LcdTCITAAAAAGDlSR5PqpqFaJePZV9ZBVcEFwmj";
            //get verify response data
            $verifyResponse = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response=".$_POST["g-recaptcha-response"]);
            $responseData = json_decode($verifyResponse);

            if($responseData->success){
                //contact form submission code
                if (empty($_POST["name"])) {
                    $nameErr = "<i class='fa fa-exclamation-circle'></i> Whoops! Please use a valid name";
                    $errorCount++;
                } else {
                    $name = test_input($_POST["name"]);
                }

                if (empty($_POST["email"])) {
                    $emailErr = "<i class='fa fa-exclamation-circle'></i> Whoops! Please use a valid email";
                    $errorCount++;
                } else {
                    $email = test_input($_POST["email"]);
                }

                if (empty($_POST["message"])) {
                    $messageErr = "<i class='fa fa-exclamation-circle'></i> Whoops! Please send a valid message";
                    $errorCount++;
                } else {
                    $message = test_input($_POST["message"]);
                }

                if($errorCount === 0){

                    $to = "contact@markallendesign.co.uk";
                    $subject = "You have a message from a customer";
                    $htmlContent = "
                        <h1>Contact request details</h1>
                        <p><b>Name: </b>".$name."</p>
                        <p><b>Email: </b>".$email."</p>
                        <p><b>Message: </b>".$message."</p>";

                    // Always set content-type when sending HTML email
                    $headers = "MIME-Version: 1.0" . "\r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                    // More headers
                    $headers .= "From:" . $name . " <" . $email . ">\r\n";
                    //send email
                    mail($to, $subject, $htmlContent, $headers);
                    echo "<div class='notification'><i class='fa fa-check-circle'></i> Your contact request was submitted. I will be in touch as soon as possible.</div>";

                }

            } else {
                $captchaErr = "<i class='fa fa-exclamation-circle'></i> Whoops! Robot verification failed. Please try again";
            }

        } else {
            $captchaErr = "<i class='fa fa-exclamation-circle'></i> Whoops! Please click on the reCAPTCHA box.";
        }
    }
?>
                        <h2>Let's talk</h2>
                        <div class="contact-container contact-form">
                            <form action="#contactform" method="post" id="contactform">
                                <input type="text" name="name" placeholder="&#xf2c0;  Name*" />
                                <div class="error">
                                    <?php echo $nameErr;?>
                                </div>
                                <input type="email" name="email" value="" placeholder="&#xf003; Email*" />
                                <div class="error">
                                    <?php echo $emailErr;?>
                            </div>
                            <textarea type="text" name="message" placeholder="&#xf040;  Message*"></textarea>
                            <div class="error">
                                    <?php echo $messageErr;?>
                            </div>
                            <br>
                            <div id="contact-captcha" class="g-recaptcha" data-sitekey="6LcdTCITAAAAAJovQXUZ6K22K0qvhDU8vdGC9uOn"></div>
                            <div class="error">
                                <?php echo $captchaErr;?>
                            </div>
                            <input class="button" type="submit" id="submit" type="button" name="submit" value="Send"> </form>
                    </div>
                </div>
            </div>
        </section>
        <footer>
            <p>Designed &amp; Created by Mark Allen <br> ©2017 Mark Allen. All rights reserved.</p>
        </footer>
    </body>
    <script>
        var slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            var i;
            var slides = document.getElementsByClassName("work-slides");
            var dashes = document.getElementsByClassName("dash");
            if (n > slides.length) {
                slideIndex = 1
            }
            if (n < 1) {
                slideIndex = slides.length
            }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dashes.length; i++) {
                dashes[i].className = dashes[i].className.replace(" active", "");
            }
            slides[slideIndex - 1].style.display = "block";
            dashes[slideIndex - 1].className += " active";
        }
    </script>

    </html>