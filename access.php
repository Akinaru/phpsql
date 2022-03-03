<?php

    $root = 'root';
    $pass = '';
    $dbname= 'grandeurs_physique';
    $table = 'grandeurs';

    $temperature = $_POST['temperature'];
    $luminosite = $_POST['luminosite'];
    $humidite = $_POST['humidite'];


    try {

        
        $db = new PDO('mysql:host=localhost;dbname=' . $dbname, $root, $pass);

        $result = $db->query('SELECT COUNT(*) AS num_rows FROM '.$table);

        $numRows = $result->fetchColumn();

        if($numRows == 0){ //TABLE VIDE
            $query = $db->prepare("INSERT INTO $table (temperature, luminosite, humidite) VALUES(:temperature, :luminosite, :humidite) ");
    
            $query->bindParam(':temperature', $temperature);
            $query->bindParam(':luminosite', $luminosite);
            $query->bindParam(':humidite', $humidite);
            $query->execute();
            echo 'Valeur enregistrée. ';

        }else{ // TABLE NON VIDE
            $query = $db->prepare("UPDATE $table SET temperature = :temperature, luminosite = :luminosite, humidite = :humidite WHERE ID = 1");
    
            $query->bindParam(':temperature', $temperature);
            $query->bindParam(':luminosite', $luminosite);
            $query->bindParam(':humidite', $humidite);
            $query->execute();
            echo 'Valeur modifiée. ';
        }

        echo getTemp($db) . '°C / '. getLum($db) . 'lux / ' . getHum($db) . ' %';

    } catch (PDOException $e) {
        echo 'Erreur: ' . $e->getMessage();
    }

 function getTemp($db){
    $query = $db->query("SELECT * FROM grandeurs WHERE ID = 1");
    $result = $query->fetch(PDO::FETCH_ASSOC);
    return $result['temperature'];
 }

 function getLum($db){
    $query = $db->query("SELECT * FROM grandeurs WHERE ID = 1");
    $result = $query->fetch(PDO::FETCH_ASSOC);
    return $result['luminosite'];
 }

 function getHum($db){
    $query = $db->query("SELECT * FROM grandeurs WHERE ID = 1");
    $result = $query->fetch(PDO::FETCH_ASSOC);
    return $result['humidite'];
 }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="index.php">
		<div class="btn">
			<button class="btn-submit" type="submit" name="submit">Retour</button>
		</div>
    </form>
</body>
</html>

<!-- UPDATE jeux_video SET prix = 10, nbre_joueurs_max = 32 WHERE ID = 51 -->