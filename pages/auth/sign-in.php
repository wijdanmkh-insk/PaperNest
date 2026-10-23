<?php
    session_start();
    $empty_fields = false;

    $post = $_SERVER['REQUEST_METHOD'] == 'POST';
    if($post){
        if(empty($_POST['user_username']) || empty($_POST['user_password'])){
            $empty_fields = true;
        }else{
            try{
                $dsn = "mysql:host=" . $_ENV['DB_HOST'] . ";dbname=" . $_ENV['DB_NAME'] . ";charset=utf8mb4";
                $user = $_ENV['DB_USER'];
                $pass = $_ENV['DB_PASS'];
                
                $pdo = new PDO($dsn, $user, $pass);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }catch(PDOException $e){
                exit($e->getMessage());
            }

            $st = $pdo->prepare('SELECT * FROM list WHERE username=?');
            $st->execute(array($_POST['user_username']));
            $r = $st->fetch();
            
            $login_status = $r != null && $r["password"] == $_POST['user_password'];
            if($login_status){
                $_SESSION["id"]    = $r["user_id"];
                $_SESSION["role"]  = $r["user_role"];
                $_SESSION["username"] = $_POST["user_username"];
                $_SESSION["firstname"] = $r["user_firstname"];
            }

            if($_SESSION["role"] == "seller"){
                header("Location: ../seller/dashboard.php");
                exit;
            }
            if($_SESSION["role"] == "cust"){
                header("Location: ../customer/dashboard.php");
                exit;
            }
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>PaperNest-Sign Up</title>
        <link rel="stylesheet" href="../../style.css">
    </head>

    <body>
        <main>
            <form method="post" action="?php echo $_SERVER['PHP_SELF'];?">
                <?php 
                    echo 'Username<br><input type="text" name="username" value="'.$_POST['username'].'" placeholder="Username"><br>';
                    echo '<br>Password<br><input type="password" name="password" value="'.$_POST['password'].'" placeholder="Password"><br>';
                    if(!empty($login_err)&&$login_err) echo "<span>Incorrect Username or password.</span>";
                    if(!empty($empty_fields)&&$empty_fields) echo "<span>Enter username and password.</span>";
                    ?>
                    <br>
                    <input type="submit" id="submit" value="Login"><br><br>
                    Don't have a account? <a href="../auth/sign-up.php">SignUp</a>.<br><br>
            </form>
        </main>
    </body>
</html>