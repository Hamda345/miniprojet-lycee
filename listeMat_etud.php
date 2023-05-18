<?php
    include("bdd.php");
    session_start();
    if(!isset($_SESSION['id_etudiant'])) {
        header("Location:index.php");
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Liste des Matières</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <style>
        body {
            font-family: "Times New Roman", Times, serif;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }
        input {
            margin-top: 15px;
            margin-left: 10px;
        }
    </style>
</head>

<body>
    <?php
    $liste = $conn->query("SELECT id_matiere, nom_matiere, id_enseignant FROM matiere");
    $liste_matiere = $liste->fetchAll();
    ?>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="navbar-nav">
            <a class="nav-item nav-link active" href="listeEtud_etud.php">Liste des Etudiants <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="listeNotes_etud.php">Liste des Notes</a>
            <a class="nav-item nav-link" href="logout.php">Deconnexion</a>
        </div>
    </nav>

    <div class="container">
        <h1 class="mt-4">Liste des Matières</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nom Matière</th>
                    <th>ID Enseignant</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($liste_matiere as $item) {
                    echo "<tr><td>" . $item['id_matiere'] . "</td><td>" . $item['nom_matiere'] . "</td><td>" . $item['id_enseignant'] . "</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>

</html>

