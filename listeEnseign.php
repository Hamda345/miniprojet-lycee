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
    <title>Liste des Ensiengants</title>
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
            $liste = $conn->query("SELECT  id_enseignant, nom_enseignant ,  prenom_enseignant, ecole FROM enseignant");
            $liste_enseignant = $liste->fetchAll();
        ?>

<body class="body">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="navbar-nav">
      <a class="nav-item nav-link active" href="listeEtud.php">Liste des Etudiants <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="listeMat.php">Liste des Matieres</a>
      <a class="nav-item nav-link" href="listeNotes.php">Liste des Notes</a>
      <a class="nav-item nav-link" href="logout.php">Deconnexion</a>
    </div>
</nav>
<h1>Liste des Enseigants:</h1>
<table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Ecole</th>
                    <th>Action</th>
                </tr>
            </thead>
<?php
    foreach ($liste_enseignant as $item) {
        echo"<tbody><tr><td>".$item['id_enseignant']."</td><td>".$item['nom_enseignant']."</td><td>".$item['prenom_enseignant']."</td><td>".$item['ecole']."</td><td><a href='supprimerEnseig.php?dd=$item[0]'>Supprimer</a><a href='modifierEnseig.php'> Modifer</a></td></tr></tbody>";
    }
    echo"</tbody>";
?>

</table>
</body>
</html>
