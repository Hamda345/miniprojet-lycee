
<?php
    include("bdd.php");
    session_start();
    if(!isset($_SESSION['nom'])) {
        header("Location:loginAdmin.php");
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Liste des Matieres</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <style>
            body {
                font-family: "Times New Roman", Times, serif;
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size: cover;
                }
            input{
                margin-top:15px;
                margin-left:10px;
            }
        </style>
</head>
        <?php
            $liste = $conn->query("SELECT  id_matiere, nom_matiere , id_enseignant FROM matiere");
            $liste_matiere = $liste->fetchAll();
        ?>

<body class="body">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="navbar-nav">
      <a class="nav-item nav-link active" href="listeEtud.php">Liste des Etudiants <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="listeEnseign.php">Liste des Enseignants</a>
      <a class="nav-item nav-link" href="listeNotes.php">Liste des Notes</a>
      <a class="nav-item nav-link" href="logout.php">Deconnexion</a>
    </div>
</nav>
<h1>Liste des Matières:</h1>
<table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nom Matiere</th>
                    <th>ID Ensiegnant</th>
                </tr>
            </thead>
<?php
    foreach ($liste_matiere as $item) {
        echo"<tbody><tr><td>".$item['id_matiere']."</td><td>".$item['nom_matiere']."</td><td>".$item['id_enseignant']."</td><td><a href='supprimerMat.php?dd=$item[0]'>Supprimer</a><a href='modifierMat.php'> Modifer</a></td></tr></tbody>";
    }
    echo"</tbody>";
?>
</table>
</body>
</html>
