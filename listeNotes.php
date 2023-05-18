<?php
include("bdd.php");
session_start();
if(!isset($_SESSION['id'])) {
    header("Location:index.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Liste des Notes</title>
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
        $liste = $conn->query("SELECT  id_etudiant, id_matiere , examen, control_contenu FROM note");
        $liste_notes = $liste->fetchAll();
        ?>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="listeEtud.php">Liste des Etudiants <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link active" href="listeEnseign.php">Liste des Enseignants</a>
                <a class="nav-item nav-link active" href="listeMat.php">Liste des Matierès</a>
                <a class="nav-item nav-link active" href="logout.php">Deconnexion</a>
            </div>
        </nav>
        <div class="container">
            <h1 class="mt-4">Liste des Notes</h1>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID Etudiant</th>
                        <th>ID Matière</th>
                        <th>Examen</th>
                        <th>Contrôle Contenu</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($liste_notes as $item) {
                    echo"<tbody><tr><td>".$item['id_etudiant']."</td><td>".$item['id_matiere']."</td><td>".$item['examen']."</td><td>".$item['control_contenu']."</td><td><a href='supprimerNote.php?dd=$item[0]' onClick='return confirm(\"Supprimer ?\")'>Supprimer</a></td></tr></tbody>";
                    }
                    ?>
                </tbody>
            </table>

            <a href="saisirNote_admin.php" class="btn btn-outline-primary">Ajouter ou Modifier <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
            </svg></a>
        </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>

</html>

