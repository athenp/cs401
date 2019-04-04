<?php
    session_start();

    $sqluser = "bdb3dd3c5ad4b1";
    $sqlpassword = "ec474796";
    $sqldatabase = "heroku_45fb7d407a198a1";

    $post = $_SERVER['REQUEST_METHOD']=='POST';

    if ($post) {
        if(
            empty($_POST['uname'])||
            empty($_POST['fname'])||
            empty($_POST['lname'])||
            empty($_POST['email'])||
            empty($_POST['pass'])||
            empty($_POST['repass'])
        ) $empty_fields = true;

        else {
            $unmatch = preg_match('/^[A-Za-z][A-Za-z0-9_]{3,}$/', $_POST['uname']);
            $fnmatch = preg_match('/^[A-Za-z]+$/', $_POST['fname']);
            $lnmatch = preg_match('/^[A-Za-z]+$/', $_POST['lname']);
            $emmatch = preg_match('/^[A-Za-z_0-9]+@[A-Za-z]+.[A-Za-z]+$/', $_POST['email']);
            $pmatch = preg_match('/.{5,}/',$_POST['pass']);
            $peq = $_POST['pass']==$_POST['repass'];
            if($unmatch&&$fnmatch&&$lnmatch&&$emmatch&&$pmatch&&$peq) {
                try {
                    $pdo = new PDO("mysql:host=us-cdbr-iron-east-03.cleardb.net;dbname=".$sqldatabase,$sqluser,$sqlpassword);
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                } catch (PDOException $e) {
                    exit($e->getMessage());
                }
                $st = $pdo->prepare('SELECT * FROM list WHERE user_name=?');
                $st->execute(array($_POST['uname']));
                $uname_err = $st->fetch() != null;
                $st = $pdo->prepare('SELECT * FROM list WHERE email=?');
                $st->execute(array($_POST['email']));
                $email_err = $st->fetch() != null;
                if(!$uname_err&&!$email_err) {
                    $stmt = 'INSERT INTO list(user_name,first_name,last_name,email,password) VALUES (?,?,?,?,?)';
                    $pdo->prepare($stmt)->execute(array(
                        $_POST['uname'],
                        $_POST['fname'],
                        $_POST['lname'],
                        $_POST['email'],
                        $_POST['pass']
                    ));
                    $_SESSION["uname"] = $_POST["uname"];
                    $_SESSION["pass"] = $_POST["pass"];
                    $_SESSION["fname"] = $_POST["fname"];
                    header("Location:success.php");
                    exit;
                }
            }
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
                <p>Signup</p>
                <?php
                    echo 'Username<br><input type="text" name="uname" value="'.$_POST['uname'].'" placeholder="Username"><br>';
                    if($post&&!$empty_fields&&!$unmatch) echo '<span>error: username contains illegal character(s). valid username characters include: alphabet characters, numbers, and underscores(_). usernames must begin with a letter. usernames cannot be less than 4 characters long.<br></span>';
                    if(!empty($uname_err)&&$uname_err) echo '<span>error: username taken.</span>';
                    echo '<br>Name<br><input type="text" name="fname" value="'.$_POST['fname'].'" placeholder="First Name"><br>';
                    echo '<input type="text" name="lname" value="'.$_POST['lname'].'" placeholder="Last Name"><br>';
                    if($post&&!$empty_fields&&!($lnmatch&&$fnmatch)) echo '<span>error: name contains a non-alphabet character.<br></span>';
                    echo '<br>Email<br><input type="text" name="email" value="'.$_POST['email'].'" placeholder="email@example.com"><br>';
                    if(!empty($email_err)&&$email_err) echo '<span>error: email already registered.</span>';
                    if($post&&!$empty_fields&&!$emmatch) echo '<span>error: email not of format example@site.domain<br></span>';
                    echo '<br>Password<br><input type="password" name="pass" placeholder="Password"><br>';
                    echo '<input type="password" name="repass" placeholder="Verify Password">';
                    if($post&&!$empty_fields&&!$pmatch) echo '<span>error: password less than 5 characters long.</span>';
                    if($post&&!$empty_fields&&$pmatch&&!$peq) echo '<span>error: passwords do not match.</span><br>';
                    if($post &&$empty_fields) echo "<br><span>error: all fields not completed.</span><br>";
                ?>
                <br>
                <br>
                <input type="submit" id="submit" value="Signup"><br><br>
                Already have an account? <a href="login.php" id="redirect" class="w3-hover-none w3-hover-text-red">[Login]</a><br><br>
            </form>
        </div>
    </div>
    </body>
</html>
