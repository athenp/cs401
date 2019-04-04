<?php
    session_start();
    
    $sqluser = "bdb3dd3c5ad4b1";
    $sqlpassword = "ec474796";
    $sqldatabase = "heroku_45fb7d407a198a1";
?>
<!DOCTYPE html>
<html>
    <head>
        <link href="style.css" rel="stylesheet" />
        <link href="ESF.png" rel="shortcut icon" />
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <title>Stupid test website</title>
        <meta charset="utf-8"/>
        <meta name="description" content="A bunch of dumb shit"/>
        <meta name="keywords" content="dumb,stupid,bullshit"/>
    </head>
    
    <body>
    <div class="w3-sidebar w3-bar-block w3-black" style="width:15%;right:0">
        <div id="sidebar-elements">
            <a href="./home.php" class="w3-bar-item w3-button w3-hover-none w3-hover-text-red">[Home]</a>
            <a href="./about.php" class="w3-bar-item w3-button w3-hover-none w3-hover-text-red">[About]</a>
            <a href="./latestissue.php" class="w3-bar-item w3-button w3-hover-none w3-hover-text-red">[Latest Issue]</a>
            <a href="./pastissues.php" class="w3-bar-item w3-button w3-hover-none w3-hover-text-red">[Past Issues]</a>
            <a href="./artists.php" class="w3-bar-item w3-button w3-hover-none w3-hover-text-red">[Artists]</a>
            <a href="./staff.php" class="w3-bar-item w3-button w3-hover-none w3-hover-text-red">[Staff]</a>
            <a href="./submissions.php" class="w3-bar-item w3-button w3-hover-none w3-hover-text-red">[Submissions]</a>
            <a href="./login.php" class="w3-bar-item w3-button w3-hover-none w3-hover-text-red">[Login]</a>
            <a href="./shop.php" class="w3-bar-item w3-button w3-hover-none w3-hover-text-red">[Shop]</a>
            <a href="./donate.php" class="w3-bar-item w3-button w3-hover-none w3-hover-text-red">[Donate]</a><br><br><br><br>
            <div id="loggedin" class="w3-bar-item">
                <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                    echo "Logged in as:";
                    echo "<br>";
                    echo $_SESSION["fname"].' (@'.$_SESSION["uname"].').';
                    echo "<br>";
                    echo '<a href="./loggedout.php" class="w3-hover-none w3-hover-text-red">[Logout?]</a>';
                }?>
            </div>
        </div>
    </div>
        <div id="content">
            <a href="./home.php">
                <img class="logo" src="./aplogo.png" alt="logo" width="20%" height="10%"/>
            </a>
            <h1>Artist Pages Go Here</h1>
            <div id="artist-images">
                <img class="artist-image" src="./BlackBox.jpeg" alt="artist1"/>
                <img class="artist-image2" src="./BlackBox.jpeg" alt="artist2"/>
                <img class="artist-image3" src="./BlackBox.jpeg" alt="artist3"/>
            </div>
            <div id="artist-about">
                <div id="artist1">
                    <p>sampletextsampletextsampletextsampletextsampletextsampletext
                    sampletextsampletextsampletextsampletextsampletextsampletext
                    sampletextsampletextsampletextsampletextsampletextsampletext</p>
                </div>
                <div id="artist2">
                    <p>sampletextsampletextsampletextsampletextsampletextsampletext
                    sampletextsampletextsampletextsampletextsampletextsampletext
                    sampletextsampletextsampletextsampletextsampletextsampletext</p>
                </div>
            </div>
        </div>
        
    </body>
</html>
