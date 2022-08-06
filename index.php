<!DOCTYPE html>
<html>
    <head>
        <title> Rodrigo Tallar</title>
        <link rel="stylesheet" type="text/css" href="src/styles/base.css">
        <link rel="stylesheet" type="text/css" href="src/styles/home.css">
        <link rel="stylesheet" type="text/css" href="src/styles/work.css">
        <link rel="stylesheet" type="text/css" href="src/styles/other.css">
        <link rel="stylesheet" type="text/css" href="src/styles/contact.css">
        <link rel="icon" type="image/svg+xml" href="src/img/card-list.svg">
        <link rel="stylesheet" href="https://s.pageclip.co/v1/pageclip.css" media="screen"> <!-- Pageclip -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://kit.fontawesome.com/acb5e52e54.js" crossorigin="anonymous"></script> <!-- iconos -->
        <script src="https://www.google.com/recaptcha/api.js" async defer></script> <!-- reCaptcha -->
    </head>
    <body>
        <nav>
            <a class="item" href="#home">Home</a>
            <a class="item" href="#work">Proyectos</a> 
            <a class="item" href="#others">Others</a>
            <a class="item" href="#contact">Contact</a>
        </nav>

        <section id="home">
            <h1>Rodrigo<span id="tallar">Tallar</span></h1>
            <div id="img-container">
                <img alt="Image could not load" src="img/FotoCV.jpeg" id="pic">
            </div>
            <p id="bio">SIUUUUUUUUUUUUUUUUUUUU</p>
        </section>

        <hr>

        <section id="work">
            <h2>Proyectos</h2>
            <a class="github" href="https://github.com/rtallarr" target="_blank"><i class="fab fa-github"></i> Github</a>
        </section>

        <hr>

        <section id="others">
            <h2>Others</h2>
            <a class="bottom_links" href="Horario/horario.html"><i class="fas fa-calendar-alt"></i> Schedule</a>
            <a class="bottom_links" target="_blank" href="Archivos/CV.pdf"><i class="far fa-address-card"></i> Curriculum Vitae</a>
        </section>

        <hr>

        <section id="contact">
            <h2>Contact</h2>
            <form action="https://send.pageclip.co/O0j1aQ7liYMvel3ayCuqiCXhAK9wJbI3/contact" method="POST">
                <input class="encuesta" name="name" type="text" placeholder="Name">
                <input class="encuesta" type="email" name="_replyto" placeholder="email@example.com" required>
                <textarea class="encuesta" placeholder="Message" name="message"></textarea>
                <div class="g-recaptcha" data-sitekey="6LeOzGogAAAAACHj6SY5jItcjuIWVg_mp6vNVHtT"></div>
                <input class="encuesta" type="submit" value="Send" id="send" name="submit">
            </form>
            <div class="status">
                <?php
                if(isset($_POST['submit'])){
                    $User_name = $_POST['name']
                    $User_mail = $_POST['_replyto']
                    $User_message = $_POST['message']

                    $email_from = 'noreply@tallar.site';
                    $email_subject = "New Form Submission";
                    $email_body = "Name: $User_name.\n".
                                    "Email id: $User_mail.\n".
                                    "User message: $User_message.\n";

                    $to_email = "rtallax@gmail.com"
                    $headers = "From: $email_from \r\n";
                    $headers .= "Reply-To: $User_email\r\n";

                    $secretKey = "6LeOzGogAAAAABHvAcQ2jdemEpdIyjAwmQRGf8sb";
                    $responseKey = $_POST['g-recaptcha-response'];
                    $UserIP = $_SERVER['REOMTE_ADDR'];
                    $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey&remoteip=$UserIP";

                    $response = file_get_contents($url);
                    $response = json_decode($response);

                    if ($response->success){
                        mail($to_email,$email_subject,$email_body,$headers);
                        echo "Message Sent Succesfully";
                    } else {
                        echo "<span>Invalid Captcha, Please Try Again</span>"
                    }
                }
                ?>
            </div>
        </section>

        <footer class="copyright">
            &copy; 2021 Rodrigo Tallar.
        </footer>

    <?php
        if(isset($_POST['submit'])) {

        function CheckCaptcha($userResponse) {
            $fields_string = '';
            $fields = array(
                'secret' => '6LeOzGogAAAAABHvAcQ2jdemEpdIyjAwmQRGf8sb',
                'response' => $userResponse
            );
            foreach($fields as $key=>$value)
            $fields_string .= $key . '=' . $value . '&';
            $fields_string = rtrim($fields_string, '&');

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
            curl_setopt($ch, CURLOPT_POST, count($fields));
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, True);

            $res = curl_exec($ch);
            curl_close($ch);

            return json_decode($res, true);
        }

        $result = CheckCaptcha($_POST['g-recaptcha-response']);

        if ($result['success']) {
            echo "Captcha verified Successfully";
        } else {
            echo '<script>alert("Error Message");</script>';
            }
        }
    ?>

    <script src="https://www.google.com/recaptcha/api.js" async defer></script> <!-- recaptcha -->
    <script src="https://s.pageclip.co/v1/pageclip.js" charset="utf-8"></script> <!-- Pageclip -->

    </body>
</html>