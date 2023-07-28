<?php
    require_once ("MyPDO.php");
    require_once ("Config.php");
    require_once ("NewUser.php");

    $config = new Config();
    $myPdo = new MyPDO("mysql:host=localhost; dbname=olymp_hry", $config->getUsername(), $config->getPassword());
    $err = array();
    if (isset($_POST["register"]))
    {
        if (empty($_REQUEST["login"])) { $err[] = "Login je povinné pole"; }
        if (empty($_REQUEST["email"])) { $err[] = "Email je povinné pole"; }
        if (empty($_REQUEST["password"])) { $err[] = "Heslo je povinné pole"; }
        if (count($err) === 0)
        {
            $newUser = new NewUser($myPdo);
            $newUser->setMeno($_REQUEST["name"]);
            $newUser->setPriezvisko($_REQUEST["surname"]);
            $newUser->setPrezivka($_REQUEST["login"]);
            $newUser->setHeslo(md5($_REQUEST["password"]));
            $newUser->setAdresa($_REQUEST["email"]);
            $newUser->save();
            if (true)
            {
                header("location: Login.php");
            }
        } else
        {
            foreach ($err as $item) {
                echo '<a class="text-danger">' . (print_r($item, true)) . '</a>';
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
    <div class="col-12 p-3 text-start">
        <button type="submit" class="btn btn-primary" name="register">Registrovať</button>
    </div>

</form>
<a href="Login.php" class="alert-link">Už som registrovaný</a>

<a href="index.php" class="alert-link">Späť</a>


</body>
</html>
