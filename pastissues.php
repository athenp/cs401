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
            <h1>Past Issues</h1>
            <br>
            <br>
            <br>
            <div class="issues">
                <table>
                    <tr>
                        <td>
                            Collection 1 <br>
                            <a href="./oops.php" id="pastissues" class="w3-hover-none w3-hover-text-red">[Issue 1.0]</a><br>
                            <a href="./oops.php" id="pastissues" class="w3-hover-none w3-hover-text-red">[Issue 1.1]</a><br>
                            <a href="./oops.php" id="pastissues" class="w3-hover-none w3-hover-text-red">[Issue 1.2]</a><br>
                            <a href="./oops.php" id="pastissues" class="w3-hover-none w3-hover-text-red">[Issue 1.3]</a><br>
                            <a href="./oops.php" id="pastissues" class="w3-hover-none w3-hover-text-red">[Issue 1.4]</a><br>
                            <a href="./oops.php" id="pastissues" class="w3-hover-none w3-hover-text-red">[Issue 1.5]</a><br>
                            <a href="./oops.php" id="pastissues" class="w3-hover-none w3-hover-text-red">[Issue 1.6]</a><br>
                            <a href="./oops.php" id="pastissues" class="w3-hover-none w3-hover-text-red">[Issue 1.7]</a><br>
                            <a href="./oops.php" id="pastissues" class="w3-hover-none w3-hover-text-red">[Issue 1.8]</a><br>
                            <a href="./oops.php" id="pastissues" class="w3-hover-none w3-hover-text-red">[Issue 1.9]</a><br>
                        </td>
                        <td>
                            Collection 2 <br>
                            <a href="./oops.php" id="pastissues" class="w3-hover-none w3-hover-text-red">[Issue 2.0]</a><br>
                            <a href="./oops.php" id="pastissues" class="w3-hover-none w3-hover-text-red">[Issue 2.1]</a><br>
                            <a href="./oops.php" id="pastissues" class="w3-hover-none w3-hover-text-red">[Issue 2.2]</a><br>
                            <a href="./oops.php" id="pastissues" class="w3-hover-none w3-hover-text-red">[Issue 2.3]</a><br>
                            <a href="./oops.php" id="pastissues" class="w3-hover-none w3-hover-text-red">[Issue 2.4]</a><br>
                            <a href="./oops.php" id="pastissues" class="w3-hover-none w3-hover-text-red">[Issue 2.5]</a><br>
                            <a href="./oops.php" id="pastissues" class="w3-hover-none w3-hover-text-red">[Issue 2.6]</a><br>
                            <a href="./oops.php" id="pastissues" class="w3-hover-none w3-hover-text-red">[Issue 2.7]</a><br>
                            <a href="./oops.php" id="pastissues" class="w3-hover-none w3-hover-text-red">[Issue 2.8]</a><br>
                            <a href="./oops.php" id="pastissues" class="w3-hover-none w3-hover-text-red">[Issue 2.9]</a><br>
                        </td>
                        <td>
                            Collection 3 <br>
                            <a href="./oops.php" id="pastissues" class="w3-hover-none w3-hover-text-red">[Issue 3.0]</a><br>
                            <a href="./oops.php" id="pastissues" class="w3-hover-none w3-hover-text-red">[Issue 3.1]</a><br>
                            <a href="./oops.php" id="pastissues" class="w3-hover-none w3-hover-text-red">[Issue 3.2]</a><br>
                            <a href="./oops.php" id="pastissues" class="w3-hover-none w3-hover-text-red">[Issue 3.3]</a><br>
                            <a href="./oops.php" id="pastissues" class="w3-hover-none w3-hover-text-red">[Issue 3.4]</a><br>
                            <a href="./oops.php" id="pastissues" class="w3-hover-none w3-hover-text-red">[Issue 3.5]</a><br>
                            <a href="./oops.php" id="pastissues" class="w3-hover-none w3-hover-text-red">[Issue 3.6]</a><br>
                            <a href="./oops.php" id="pastissues" class="w3-hover-none w3-hover-text-red">[Issue 3.7]</a><br>
                            <a href="./oops.php" id="pastissues" class="w3-hover-none w3-hover-text-red">[Issue 3.8]</a><br>
                            <a href="./oops.php" id="pastissues" class="w3-hover-none w3-hover-text-red">[Issue 3.9]</a><br>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </body>
</html>
