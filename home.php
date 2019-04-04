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
        <title>Authentic and Permanent</title>
        <meta charset="utf-8"/>
        <meta name="description" content="A posthuman art magazine for technological determinists."/>
        <meta name="keywords" content="Art"/>
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
            <div id="header"><h1>Authentic and Permanent</h1></div>
            <div id="abbreviation"><h1>HP.2</h1></div>
            <div id="home-right">
                <div id="issue-num"><p>ISSUE 1.0</p></div>
                <div id="issue-title"><p>AESTHETIC COM-PUTING</p></div>
            </div>
            <p>
            The inaugural collection goes retro-futuristic. <em>AESTHETIC COMPUTING</em> meta analytically explores the history of design using computer graphics through modern computer generated art.
            <br>..
            <br>.
            <br>....
            <br>.
            <br>...
            <br>..
            <br>......
            <br>...
            <div id="img">
                <img class="mainart" src="./imagemain.png" alt="teapot"/>
            </div>
            <br>
            <div id="date-footer">HP.2.February/ISSUE 1.0</div>
            </p>
        </div>
        
    </body>
</html>

