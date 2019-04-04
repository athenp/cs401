<?php
    
    session_start();

    $sqluser = "bdb3dd3c5ad4b1";
    $sqlpassword = "ec474796";
    $sqldatabase = "heroku_45fb7d407a198a1";

    $post = $_SERVER['REQUEST_METHOD']=='POST';
    if ($post) {
        if(
            empty($_POST['uname'])||
            empty($_POST['pass'])
        ) $empty_fields = true;

        else {
                try {
                    $pdo = new PDO("mysql:host=us-cdbr-iron-east-03.cleardb.net;dbname=".$sqldatabase,$sqluser,$sqlpassword);
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                } catch (PDOException $e) {
                    exit($e->getMessage());
                }
                $st = $pdo->prepare('SELECT * FROM list WHERE user_name=?');
                $st->execute(array($_POST['uname']));
                $r=$st->fetch();
                if($r != null && $r["password"]==$_POST['pass']) {
                    echo $_POST["uname"];
                    echo $_POST["pass"];
                    $_SESSION["uname"] = $_POST["uname"];
                    $_SESSION["pass"] = $_POST["pass"];
                    $_SESSION["fname"] = $r["first_name"];
                    $_SESSION["loggedin"] = true;
                    echo $_SESSION["uname"];
                    echo $_SESSION["pass"];
                    header("Location:success.php");
                    exit;
                } else $login_err = true;
        }
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
                <p>Login</p>
                <?php
                    echo 'Username<br><input type="text" name="uname" value="'.$_POST['uname'].'" placeholder="Username"><br>';
                    echo '<br>Password<br><input type="password" name="pass" value="'.$_POST['pass'].'" placeholder="Password"><br>';
                    if(!empty($login_err)&&$login_err) echo "<span>error: incorrect username or password.</span>";
                    if(!empty($empty_fields)&&$empty_fields) echo "<span>error: field(s) empty.</span>";
                ?>
                <br>
                <input type="submit" id="submit" value="Login"><br><br>
Don't have an account? <a href="signup.php" id="redirect" class="w3-hover-none w3-hover-text-red">[Signup]</a><br><br>
            </form>
        </div>
    </div>
    </body>
</html>
