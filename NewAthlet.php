<?php
    require_once ("MyPDO.php");
    require_once ("Config.php");
    require_once ("Athlete.php");

    $config = new Config();
    $myPdo = new MyPDO("mysql:host=localhost; dbname=olymp_hry", $config->getUsername(), $config->getPassword());
    $err = array();

    if (isset($_POST["add"])) {
        if (empty($_REQUEST["name"]) && empty($_REQUEST["surname"]) && empty($_REQUEST["birth_day"]) && empty($_REQUEST["birth_place"])
        && empty($_REQUEST["birth_country"]) && empty($_REQUEST["placing"]) && empty($_REQUEST["discipline"]) && empty($_REQUEST["type"])
        && empty($_REQUEST["year"]) && empty($_REQUEST["order"]) && empty($_REQUEST["city"]) && empty($_REQUEST["country"])) {
            $err[] = "Iba polia Dátum smrti, Miesto smrti, Krajina smrti nie sú povinné polia";
        }

        if (count($err) === 0) {
            $newAthlete = new Athlete($myPdo);
            $newAthlete->setName1($_REQUEST["name"]);
            $newAthlete->setSurname($_REQUEST["surname"]);
            $newAthlete->setBirthDay($_REQUEST["birth_day"]);
            $newAthlete->setBirthPlace($_REQUEST["birth_place"]);
            $newAthlete->setBirthCountry($_REQUEST["birth_country"]);
            $newAthlete->setDeathDay($_REQUEST["death_day"]);
            if (empty($_REQUEST["death_day"])) {
                $newAthlete->setDeathDay(null);
            }
            $newAthlete->setDeathPlace($_REQUEST["death_place"]);
            if (empty($_REQUEST["death_place"])) {
                $newAthlete->setDeathPlace(null);
            }
            $newAthlete->setDeathCountry($_REQUEST["death_country"]);
            if (empty($_REQUEST["death_country"])) {
                $newAthlete->setDeathCountry(null);
            }
            $newAthlete->setPlacing($_REQUEST["placing"]);
            $newAthlete->setDiscipline($_REQUEST["discipline"]);
            $newAthlete->setType1($_REQUEST["type"]);
            $newAthlete->setYear($_REQUEST["year"]);
            $newAthlete->setOrder($_REQUEST["order"]);
            $newAthlete->setCity($_REQUEST["city"]);
            $newAthlete->setCountry($_REQUEST["country"]);
            $query1 = $myPdo->query("SELECT person.id FROM person WHERE id = (SELECT MAX(id) FROM person)");
            $maxPersonId = $query1->fetch(PDO::FETCH_ASSOC);
            $query2 = $myPdo->query("SELECT place.id FROM place WHERE id = (SELECT MAX(id) FROM place)");
            $maxPlaceId = $query2->fetch(PDO::FETCH_ASSOC);
            $newAthlete->setPlaceId((int)$maxPlaceId["id"] + 1);
            $newAthlete->setPersonId((int)$maxPersonId["id"] + 1);
            $newAthlete->savePlace();
            $newAthlete->savePerson();
            if (true) {
                $newAthlete->savePosition();
                header("location: UserArea.php");
            }
        }else
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
    <link rel="stylesheet" href="bootstrap.css">
    <title>NewAthlet</title>
</head>
<header>
    <h1 class="h1 text-center">
        Pridanie nového športovca
    </h1>
</header>
<body>
<form action="NewAthlet.php" method="post" class="row g-2" enctype="multipart/form-data">
    <div class="col-md-6">
        <label for="name" class="form-label">Meno</label>
        <input type="text" class="form-control" name="name" id="name">
    </div>
    <div class="col-md-6">
        <label for="surname" class="form-label">Priezvisko</label>
        <input type="text" class="form-control" name="surname" id="surname">
    </div>
    <div class="col-md-6">
        <label for="birth_day" class="form-label">Dátum narodenia</label>
        <input type="text" class="form-control" name="birth_day" id="birth_day" placeholder="yy-mm-dd">
    </div>
    <div class="col-md-6">
        <label for="birth_place" class="form-label">Miesto narodenia</label>
        <input type="text" class="form-control" name="birth_place" id="birth_place">
    </div>
    <div class="col-md-6">
        <label for="birth_country" class="form-label">Krajina narodenia</label>
        <input type="text" class="form-control" name="birth_country" id="birth_country">
    </div>
    <div class="col-md-6">
        <label for="death_day" class="form-label">Dátum smrti</label>
        <input type="text" class="form-control" name="death_day" id="death_day" placeholder="yy-mm-dd">
    </div>
    <div class="col-md-6">
        <label for="death_place" class="form-label">Miesto smrti</label>
        <input type="text" class="form-control" name="death_place" id="death_place">
    </div>
    <div class="col-md-6">
        <label for="death_country" class="form-label">Krajina smrti</label>
        <input type="text" class="form-control" name="death_country" id="death_country">
    </div>
    <div class="col-md-6">
        <label for="placing" class="form-label">Umiestnenie</label>
        <input type="number" class="form-control" name="placing" id="placing" placeholder="11">
    </div>
    <div class="col-md-6">
        <label for="discipline" class="form-label">Disciplína</label>
        <input type="text" class="form-control" name="discipline" id="discipline">
    </div>
    <div class="col-md-6">
        <label for="type" class="form-label">Typ olympiády</label>
        <input type="text" class="form-control" name="type" id="type">
    </div>
    <div class="col-md-6">
        <label for="year" class="form-label">Rok olympiády</label>
        <input type="number" class="form-control" name="year" id="year" placeholder="1984">
    </div>
    <div class="col-md-6">
        <label for="order" class="form-label">Poradie hry</label>
        <input type="number" class="form-control" name="order" id="order" placeholder="11">
    </div>
    <div class="col-md-6">
        <label for="city" class="form-label">Mesto konania</label>
        <input type="text" class="form-control" name="city" id="city">
    </div>
    <div class="col-md-6">
        <label for="country" class="form-label">Krajina konania</label>
        <input type="text" class="form-control" name="country" id="country">
    </div>
    <div class="col-md-6 pt-3 text-end">
        <button type="submit" class="btn btn-primary" name="add">Pridať</button>
    </div>
</form>

<a href="UserArea.php" class="alert-link m-auto">Späť</a>

</body>
<footer>

</footer>
</html>
