<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "odevolv";

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Échec de la connexion: " . $conn->connect_error);
}

// Récupérer tous les messages envoyés
$sql = "SELECT id, nom, prenom,  objet, message FROM message";
$result = $conn->query($sql);

// Vérifier si la requête a renvoyé des résultats
if ($result === false) {
    die("Erreur dans la requête SQL : " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages Envoyés</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
</head>
<body>

<main class="container mt-5">
    <h2 class="text-white">Messages Envoyés</h2>
    <table class="table table-bordered table-dark">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prénom</th>
                
                <th>Objet</th>
                <th>Message</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Si des résultats ont été trouvés, les afficher
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["nom"] . "</td>";
                    echo "<td>" . $row["prenom"] . "</td>";
                  
                    echo "<td>" . $row["objet"] . "</td>";
                    echo "<td>" . $row["message"] . "</td>";
                    echo "</tr>";
                }
            } else {
                // Si aucun message n'a été trouvé
                echo "<tr><td colspan='6'>Aucun message envoyé.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</main>

<?php
$conn->close();
?>
</body>
</html>
