<?php
    require_once "MyPDO.php";
    require_once "Config.php";

    $config = new Config();
    $myPdo = new MyPDO("mysql:host=localhost; dbname=olymp_hry", $config->getUsername(), $config->getPassword());
    $id = ($_GET["id"]);
    try
    {
        $stmt = $myPdo->query("SELECT person.name, person.surname, person.birth_day, person.birth_place, person.birth_country, person.death_day, person.death_place, person.death_country, place.year, place.country, place.type, position.discipline FROM position INNER JOIN place ON position.place_id = place.id INNER JOIN person ON position.person_id = person.id WHERE person.id = $id");
        $result = $stmt -> fetchAll(PDO::FETCH_ASSOC);
    }
    catch (PDOException $e)
    {
        echo "Error: ".$e->getMessage();
    }
?>

<!doctype html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Details</title>
    <link rel="stylesheet" href="bootstrap.css">

</head>
<header>
    <h1>Detaily Osoby</h1>
</header>

<a href="index.php" class="alert-link">Späť</a>

<body>
    <table class="table table-secondary table-hover sortable">
        <thead>
        <tr>
            <th scope="col">Meno</th>
            <th scope="col">Priezvisko</th>
            <th scope="col">Birth Day</th>
            <th scope="col">Birth Place</th>
            <th scope="col">Birth Country</th>
            <th scope="col">Death Day</th>
            <th scope="col">Death Place</th>
            <th scope="col">Death Country</th>
            <th scope="col">Rok</th>
            <th scope="col">Miesto</th>
            <th scope="col">Typ</th>
            <th scope="col">Disciplína</th>
        </tr>
        </thead>
        <tbody>
                <?php
                foreach ($result as $item)
                {
                    echo "<tr>";
                    echo "<td>".$item["name"]."</td>";
                    echo "<td>".$item["surname"]."</td>";
                    echo "<td>".$item["birth_day"]."</td>";
                    echo "<td>".$item["birth_place"]."</td>";
                    echo "<td>".$item["birth_country"]."</td>";
                    echo "<td>".$item["death_day"]."</td>";
                    echo "<td>".$item["death_place"]."</td>";
                    echo "<td>".$item["death_country"]."</td>";
                    echo "<td>".$item["year"]."</td>";
                    echo "<td>".$item["country"]."</td>";
                    echo "<td>".$item["type"]."</td>";
                    echo "<td>".$item["discipline"]."</td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
</body>
<footer>

</footer>
</html>