<?php
    require_once "MyPDO.php";
    require_once "Config.php";

    $config = new Config();
    $myPdo = new MyPDO("mysql:host=localhost; dbname=olymp_hry", $config->getUsername(), $config->getPassword());

    try
    {
        $stmt = $myPdo->query("SELECT person.name, person.surname, place.year, place.country, place.type, position.discipline, position.id FROM position INNER JOIN place ON position.place_id = place.id INNER JOIN person ON position.person_id = person.id");
        $result = $stmt -> fetchAll(PDO::FETCH_ASSOC);
    }
    catch (PDOException $e)
    {
        echo "Error: ".$e->getMessage();
    }

    if (isset($_POST["deleteButton"]))
    {
        $id = $_GET["id"];
        $myPdo->run("DELETE FROM position WHERE position.id = $id");
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
        <script src="sorttable.js"></script>
        <title>Zadanie1</title>
    </head>
    <header>
        <h1 class="text-center h1 px-2">Olypijske hry</h1>
        <nav class="navbar navbar-expand-sm bg-body-tertiary">
            <div class="container-fluid">
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav me-auto mb-lg-0">
                        <li class="nav-item">
                            <a href="index.php" class="nav-link active">Odhlásiť</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="container-fluid">
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav me-auto mb-lg-0">
                        <li class="nav-item">
                            <a href="NewAthlet.php" class="nav-link active">Pridať Športovca</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <body>
    <table class="table table-secondary table-hover sortable">
        <thead>
        <tr>
            <th scope="col" class="sorttable_nosort">Meno</th>
            <th scope="col">Priezvisko</th>
            <th scope="col">Rok</th>
            <th scope="col" class="sorttable_nosort">Miesto</th>
            <th scope="col">Typ</th>
            <th scope="col" class="sorttable_nosort">Disciplína</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($result as $item)
        {
            echo "<tr>";
            echo "<td>".$item["name"]."</td>";
            echo "<td>".$item["surname"]."</td>";
            echo "<td>".$item["year"]."</td>";
            echo "<td>".$item["country"]."</td>";
            echo "<td>".$item["type"]."</td>";
            echo "<td>".$item["discipline"]."</td>";
            echo "<td><form action='UserArea.php?id=".$item["id"]."'method='post'>
                          <button type='submit' class='btn btn-danger' name='deleteButton'>Vymazať</button>
                      </form>
                  </td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>





    </body>
    <footer>

    </footer>
    </html>
