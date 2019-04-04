<?php

    session_start();

    $sqluser = "bdb3dd3c5ad4b1";
    $sqlpassword = "ec474796";
    $sqldatabase = "heroku_45fb7d407a198a1";

    try {
        $pdo = new PDO("mysql:host=us-cdbr-iron-east-03.cleardb.net;dbname=".$sqldatabase,$sqluser,$sqlpassword);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        exit($e->getMessage());
    }
    $st = $pdo->prepare('SELECT * FROM list WHERE user_name=?');
    $st->execute(array($_SESSION["uname"]));
    if(($r=$st->fetch())==null||($r["password"]!=$_SESSION["pass"])) {
        header("Location:login.php");
        exit;
    }
    if ($_SERVER['REQUEST_METHOD']=='POST') {
    	session_destroy();
        header("Location:login.php");
        exit;
    }
?>

<!DOCTYPE HTML>
<html>
    <head>
        <link href="loginstyle.css" rel="stylesheet" />
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
    <div id="stuff">
        <div id="box">
            <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                <p>Logged In</p><br>
                Welcome <?php echo $_SESSION["fname"].' (@'.$_SESSION["uname"].').';?><br><br>
                <input type="submit" id="submit" name="submit" value="Logout"><br><br>
            </form>
        </div>
    </div>
    </body>
</html>
