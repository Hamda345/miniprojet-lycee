<?php
    include("bdd.php");
    session_start();
    if(!isset($_SESSION['id_enseignant'])) {
        header("Location:index.php");
    }
?>
<!DOCTYPE html>
<html>

<head>
    <title>Liste des Etudiants</title>
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
    $liste = $conn->query("SELECT id_etudiant, nom_etudiant, prenom_etudiant, ecole, age FROM etudiant");
    $liste_etudiant = $liste->fetchAll();
    ?>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="navbar-nav">
            <a class="nav-item nav-link active" href="listeMat_ens.php">Liste des Matieres</a>
            <a class="nav-item nav-link active" href="listeNotes_ens.php">Liste des Notes</a>
            <a class="nav-item nav-link active" href="logout.php">Deconnexion</a>
        </div>
    </nav>

    <div class="container">
        <h1 class="mt-4">Liste des étudiants</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>École</th>
                    <th>Âge</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($liste_etudiant as $item) {
                    echo "<tr><td>" . $item['id_etudiant'] . "</td><td>" . $item['nom_etudiant'] . "</td><td>" . $item['prenom_etudiant'] . "</td><td>" . $item['ecole'] . "</td><td>" . $item['age'] . "</td></tr>";
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

