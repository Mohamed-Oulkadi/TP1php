<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tproduit";
/* try {
 $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username, $password);
 // set the PDO error mode to exception
 $conn->setAttribute(PDO::ATTR_ERRMODE,
PDO::ERRMODE_EXCEPTION);
 // sql to create table
$sql = "CREATE TABLE produit (
 id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
 Pnom VARCHAR(50) NOT NULL,
 couleur VARCHAR(20) NOT NULL,
 poids VARCHAR(50),
 prix INT(5)
 )";
 // use exec() because no results are returned
 $conn->exec($sql);
 echo "Table produit created successfully";
} catch(PDOException $e) {
 echo $sql . "<br>" . $e->getMessage();
}
$conn = null; */
?>

<?php
// insertion des produits
/* $servername = "localhost";
$username = "root";
$password = "";
$dbname = "tproduit";

$pnom = "ecran";
$couleur = "gray";
$poids = 7;
$prix = 500;

try {
 $conn = new PDO("mysql:host=$servername;dbname=$dbname",
$username, $password);
 $conn->setAttribute(PDO::ATTR_ERRMODE,
PDO::ERRMODE_EXCEPTION);
 $stmt = $conn->prepare("INSERT INTO produit (Pnom , couleur, poids , prix) VALUES (:pnom, :couleur, :poids, :prix)");

 $stmt->bindParam('pnom',$pnom);
 $stmt->bindParam('couleur',$couleur);
 $stmt->bindParam('poids',$poids);
 $stmt->bindParam('prix',$prix);

 $stmt->execute();
 // set the resulting array to associative
 $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
 
//  print_r($result);
} catch(PDOException $e) {
 echo "Error: " . $e->getMessage();
}
 */
?>

<?php
$servername = "localhost";
$username = "root";
$password = "";
try {
 $conn = new
PDO("mysql:host=$servername;dbname=tproduit", $username,
$password);
 // set the PDO error mode to exception
 $conn->setAttribute(PDO::ATTR_ERRMODE,
PDO::ERRMODE_EXCEPTION);
 echo "Connected successfully";
} catch(PDOException $e) {
 echo "Connection failed: " . $e->getMessage();
}
?>


<!-- Sélectionner tous le contenu de la table -->
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tproduit";
try {
 $conn = new PDO("mysql:host=$servername;dbname=$dbname",
$username, $password);
 $conn->setAttribute(PDO::ATTR_ERRMODE,
PDO::ERRMODE_EXCEPTION);
 $stmt = $conn->prepare("SELECT * FROM produit");
 $stmt->execute();
 // set the resulting array to associative
 $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
 
//  print_r($result);
} catch(PDOException $e) {
 echo "Error: " . $e->getMessage();
}

?>

<!-- Sélectionner les produits dont le prix est supérieur à 300DH et ordonner les par prix -->
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tproduit";
try {
 $conn = new PDO("mysql:host=$servername;dbname=$dbname",
$username, $password);
 $conn->setAttribute(PDO::ATTR_ERRMODE,
PDO::ERRMODE_EXCEPTION);
 $stmt = $conn->prepare("SELECT * FROM produit WHERE prix>300 ORDER BY prix ");
 $stmt->execute();
 // set the resulting array to associative
 $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
 
//  print_r($result);
} catch(PDOException $e) {
 echo "Error: " . $e->getMessage();
}
?>

<!-- Afficher le nom et la couleurs des produits dont le poids est inferieur à 5 Kg et ordonner les par prix. -->
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tproduit";
try {
 $conn = new PDO("mysql:host=$servername;dbname=$dbname",
$username, $password);
 $conn->setAttribute(PDO::ATTR_ERRMODE,
PDO::ERRMODE_EXCEPTION);
 $stmt = $conn->prepare("SELECT * FROM produit WHERE poids < 5 ORDER BY prix ");
 $stmt->execute();
 // set the resulting array to associative
 $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
 
//  print_r($result);
} catch(PDOException $e) {
 echo "Error: " . $e->getMessage();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

   <div class="container">
     
     <h1>Produits : </h1>

     
     <table class="table table-bordered">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nom</th>
                <th>Couleur</th>
                <th>Poids</th>
                <th>Prix</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($result as $value): ?>
            <tr>
                <?php foreach($value as $key): ?>
                    <td><?php echo $key ?></td>
                <?php endforeach; ?>
            </tr>
            <?php endforeach; ?>
        </tbody>
     </table>
     </div>
</body>
</html>