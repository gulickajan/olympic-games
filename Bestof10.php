<?php
    require_once "MyPDO.php";
    require_once "Config.php";

    $config = new Config();
    $myPdo = new MyPDO("mysql:host=localhost; dbname=olymp_hry", $config->getUsername(), $config->getPassword());

    try
    {
        $stmt1 = $myPdo->query("SELECT person.name, person.surname, position.person_id, COUNT(*) AS medal FROM position JOIN person ON position.person_id = person.id WHERE position.placing = 1 GROUP BY person.name, person.surname, position.person_id ORDER BY medal DESC LIMIT 10");
        $result1 = $stmt1 -> fetchAll(PDO::FETCH_ASSOC);
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
    <title>Najlepsi</title>
    <link rel="stylesheet" href="bootstrap.css">
</head>
<header>
    <h1 class="h1 text-center">Najlepší Športovci</h1>
</header>

<body>
<table class="table table-secondary table-hover sortable">
    <thead>
    <tr>
        <th scope="col">Meno</th>
        <th scope="col">Priezvisko</th>
        <th scope="col">Počet medailí</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($result1 as $item)
    {
        echo "<tr>";
        echo "<td>"."<form method='post' action='Details.php?id=".$item["person_id"]."'>
                              <button href='Details.php' class='btn btn-link'>".$item["name"]."</button>
                         </form>"."</td>";
        echo "<td>".$item["surname"]."</td>";
        echo "<td>".$item["medal"]."</td>";
        echo "</tr>";
    }
    ?>
    </tbody>
</table>
<a href="index.php" class="alert-link m-auto">Späť</a>

</body>
</html>
