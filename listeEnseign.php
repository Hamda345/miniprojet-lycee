<?php
    include("bdd.php");
    session_start();
    if(!isset($_SESSION['nom'])) {
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

        h1 {
            text-align: center;
            font-weight: bold;
        }

        form {
            text-align: center;
            margin-top: 50px;
        }

        table {
            margin: 0 auto;
        }

        td {
            padding: 10px;
        }

        input[type="text"],
        select {
            width: 200px;
        }

        .btn {
            margin-top: 20px;
        }
        </style>
</head>

<body>
        <?php
            $liste = $conn->query("SELECT  id_enseignant, nom_enseignant ,  prenom_enseignant, ecole FROM enseignant");
            $liste_enseignant = $liste->fetchAll();
        ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="navbar-nav">
      <a class="nav-item nav-link active" href="listeEtud.php">Liste des Etudiants <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link active" href="listeMat.php">Liste des Matieres</a>
      <a class="nav-item nav-link active" href="listeNotes.php">Liste des Notes</a>
      <a class="nav-item nav-link active" href="logout.php">Deconnexion</a>
    </div>
</nav>
        <div class="container"></div>
<h1 class="mt-4">Liste des Enseigants:</h1>
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
            <tbody>
<?php
    foreach ($liste_enseignant as $item) {
        echo"<tbody><tr><td>".$item['id_enseignant']."</td><td>".$item['nom_enseignant']."</td><td>".$item['prenom_enseignant']."</td><td>".$item['ecole']."</td><td><a href='supprimerEns.php?dd=$item[0]' style='color: red;'> <svg width='25' height='25' viewBox='0 0 16 16' fill='currentColor' xmlns='http://www.w3.org/2000/svg'><path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z'/><path d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z'/></svg> </a></td></tr></tbody>";
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

