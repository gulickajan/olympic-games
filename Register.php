<?php
    require_once ("MyPDO.php");
    require_once ("Config.php");
    require_once ("NewUser.php");

    $config = new Config();
    $myPdo = new MyPDO("mysql:host=localhost; dbname=olymp_hry", $config->getUsername(), $config->getPassword());
    $err = array();
    if (isset($_POST["register"]))
    {
        if (count($err) === 0)
        {
            $newUser = new NewUser($myPdo);
            $newUser->setMeno($_REQUEST["name"]);
            $newUser->setSurname($_REQUEST["surname"]);
            $newUser->setLogin($_REQUEST["login"]);
            $newUser->setPassword(md5($_REQUEST["password"]));
            $newUser->setAdress($_REQUEST["email"]);
            $newUser->save();
            if (true)
            {
                header("location: Login.php");
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
    <title>Register</title>
    <link rel="stylesheet" href="bootstrap.css">
</head>
<header>
    <h1 class="h1 text-center">Registrovanie</h1>
</header>
<body>

<form action="Register.php" class="row g-6" method="post" enctype="multipart/form-data">
    <div class="col-md-6">
        <label for="name" class="form-label">Meno</label>
        <input type="text" class="form-control" name="name" id="name">
    </div>
    <div class="col-md-6">
        <label for="surname" class="form-label">Priezvisko</label>
        <input type="text" class="form-control" name="surname" id="surname">
    </div>
    <div class="col-md-6">
        <label for="login" class="form-label">Login</label>
        <input type="text" class="form-control" name="login" id="login">
    </div>
    <div class="col-md-6">
        <label for="password" class="form-label">Heslo</label>
        <input type="password" class="form-control" name="password" id="password">
    </div>
    <div class="col-md-6">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" name="email" id="email">
    </div>
    <div class="col-12 pt-3 gap-2">
        <button type="submit" class="btn btn-primary" name="register">Registrovať</button>
        <a href="Login.php" class="btn btn-dark">Už som registrovaný</a>
    </div>

</form>
</body>

<footer>
    <a href="index.php" class="alert-link">Späť</a>
    <script src="script.js"></script>
</footer>
</html>
