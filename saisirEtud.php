
<?php
include("bdd.php");
session_start();
if(!isset($_SESSION['nom'])) {
    header("Location:index.php");
}
if (isset($_POST['ajouter'])) {
    $nom_etudiant = $_POST['nom_etudiant'];
    $prenom_etudiant = $_POST['prenom_etudiant'];
    $ecole = $_POST['ecole'];
    $age = $_POST['age'];

    if ($_POST['choix'] == 'Ajouter') {
        $req = "insert into etudiant(nom_etudiant, prenom_etudiant, ecole, age) values($nom_etudiant, $prenom_etudiant, $ecole, $age)";
    } else{
        $req = "update etudiant set nom_etudiant = $nom_etudiant, prenom_etudiant = $prenom_etudiant, ecole = $ecole, age = $age where id_etudiant = $id_etudiant and  nom_etudiant = $nom_etudiant";
    }
    $stmt = $conn->exec($req);

    if(!$stmt) {
        echo "Probleme d'insertion ...".$conn->errorInfo();
    }else {
        echo "<script>alert('ajout avec succés');</scrscript>";
    }
}
?>
<!DOCTYPE html>
<html>

    <head>
        <title>Liste des Notes</title>
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
        <div class="container">
            <h1 class="font-weight-bold">Saisir les coordonées de l'étudiant</h1>
            <form action="" method="post">
                <table class="table">
                    <tr>
                        <td><label>ID Etudiant:</label></td>
                        <td><input type="text" name="id_etudiant" required="required" class="form-control"></td>
                    </tr>
                    <tr>
                        <td><label>Nom Etudiant</label></td>
                        <td><input type="text" name="nom_etudiant" required="required" class="form-control"></td>
                    </tr>
                    <tr>
                        <td><label>Prenom Etudiant</label></td>
                        <td><input type="text" name="prenom_etudiant" required="required" class="form-control"></td>
                    </tr>
                    <tr>
                        <td><label>Ecole</label></td>
                        <td><input type="text" name="ecole" required="required" class="form-control"></td>
                    </tr>
                    <tr>
                        <td><label>Age</label></td>
                        <td><input type="text" name="age" required="required" class="form-control"></td>
                    </tr>
                    <tr>
                        <td><label>Choisir:</label></td>
                        <td>
                            <select name="choix" required class="form-control">
                                <option value="Modifier">Modifier</option>
                                <option value="Ajouter">Ajouter</option>
                            </select>
                        </td>
                    </tr>
                </table>
                <input type="submit" value="Ajouter" name="ajouter" class="btn btn-success">
            </form>

            <a href="listeEtud.php" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z"/>
            </svg>Retourner </a>
        </div>
    </body>

</html>

