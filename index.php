<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./assets/picsandicons/favicon.png">

    <!-- linking css file named index.css found on assets folder -->
    <link rel="stylesheet" href="./assets/index.css">
    <title>Unigram | Secure and Reliable</title>
</head>

<body>
    <header>
        <div class="logo">
            <h1><img src="./assets/picsandicons/favicon.png" alt="logo" class="mlogo">Unigram</h1>
        </div>

        <ul>
            <li>Features</li>
            <li>Privacy</li>
            <li>Help Center</li>
        </ul>

        <div class="reg">
            <!-- Class mlogin is set in log in so the javascript can listen to event using js script in nav.js -->
            <button class="mlogin">Log In</button>
            <!-- Class reglink is set in log in so the javascript can listen to event using js script in nav.js -->
            <button class="reglink">Register</button>
        </div>
    </header>

    <main>
        <img src="./assets/picsandicons/homepic.png" alt="pic" id="mainpic">
        <!-- <div class="overpic"></div> -->
        <div class="parag">
            <h1>Message Privately</h1>
            <p>Simple, reliable, private messaging with<br> fellow university colleagues<br>all over the country</p><br>
            <button class="regbut">Register</button>
        </div>


        <p>Hang out anytime, anywhere</p>
        <p>Unigram makes it easy and fun to stay close to your favorite people.</p>
    </main>

    <footer>

    </footer>

    <!-- Linking Javascript file called nav which mainly handles event on the site like button clicked -->
    <script src="nav.js"></script>
</body>

</html>