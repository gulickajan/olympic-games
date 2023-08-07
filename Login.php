<?php
    require_once ("MyPDO.php");
    require_once ("Config.php");
    require_once ("NewUser.php");

    $config = new Config();
    $myPdo = new MyPDO("mysql:host=localhost; dbname=olymp_hry", $config->getUsername(), $config->getPassword());
    $err = array();

    if (isset($_POST["prihlasit"]))
    {
        if (count($err) === 0) {
            $name = $_REQUEST["login"];
            $password = md5($_REQUEST["password"]);
            $query = $myPdo->query("SELECT users.password FROM users WHERE users.login = '$name'");
            $resultPass = $query->fetch(PDO::FETCH_ASSOC);
            if ($resultPass["password"] !== $password) {
                echo '<a class="text-danger">Zlá kombinácia hesla a mena</a>';

            } else
            {
                header("location: UserArea.php");
            }
        }
    }
?>

<!doctype html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="bootstrap.css">
</head>
<header>
    <h1 class="h1 text-center">Login</h1>
</header>

<body>
<form action="Login.php" id="myForm" class="row-cols-2 g-2" method="post" enctype="multipart/form-data">
    <div class="col-md-2">
        <label for="userLogin" class="form-label">Login</label>
        <input type="text" class="form-control" name="userLogin" id="userLogin">
    </div>
    <div class="col-md-2">
        <label for="userPassword" class="form-label">Heslo</label>
        <input type="text" class="form-control" name="userPassword" id="userPassword">
    </div>
    <div class="col-md-2 gap-2 pt-3">
        <button type="submit" class="btn btn-primary" name="prihlasit">Prihlásiť</button>
        <a class="btn btn-dark" href="Register.php">Registrovať</a>
    </div>
</form>

<a href="index.php" class="alert-link m-auto">Späť</a>
</body>

<footer>

</footer>
</html>
