<?php 
        $root = 'root';
        $pass = '';
        $dbname= 'grandeurs_physique';
        $table = 'grandeurs';
    $db = new PDO('mysql:host=localhost;dbname=' . $dbname, $root, $pass);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
		*{
			background-color: rgb(70, 70, 70);
			color: white;
		}
	</style>
</head>
<body>

	<form method="POST" action="access.php">
		<div class="temperature">
			<span class="text-login">Température</span>
			<input type="number" name="temperature" placeholder="Enter temp">

		</div>
		<div class="luminosite">
			<span class="text-login">Luminosité</span>
			<input type="number" name="luminosite" placeholder="Enter lum">
		</div>
		<div class="humidite">
			<span class="text-login">Humidité</span>
			<input type="number" name="humidite" placeholder="Enter hum">
		</div>

		<div class="btn">
			<button class="btn-submit" type="submit" name="submit">Envoyer</button>
		</div>
	</form>

	<h1>Température: 
        <?php 
            $query = $db->query("SELECT * FROM grandeurs WHERE ID = 1");
            $result = $query->fetch(PDO::FETCH_ASSOC);
            echo $result['temperature'];
            
        ?>
    </h1>
	
	<h1>Luminosité: 
    <?php 
            $query = $db->query("SELECT * FROM grandeurs WHERE ID = 1");
            $result = $query->fetch(PDO::FETCH_ASSOC);
            echo $result['luminosite'];
            
        ?>
    </h1>
	<h1>Humidité: 
    <?php 
            $query = $db->query("SELECT * FROM grandeurs WHERE ID = 1");
            $result = $query->fetch(PDO::FETCH_ASSOC);
            echo $result['humidite'];
            
        ?>
    </h1>


</body>
</html>
