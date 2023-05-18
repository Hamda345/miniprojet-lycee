<?php
include("bdd.php");
if (isset($_POST['ajouter'])) {
    $id_etudiant = $_POST['id_etudiant'];
    $id_matiere = $_POST['id_matiere'];
    $examen = $_POST['examen'];
    $control_contenu = $_POST['control_contenu'];

    if ($_POST['choix'] == 'Ajouter') {
        $req = "insert into note(id_etudiant, id_matiere, examen, control_contenu) values($id_etudiant, $id_matiere, $examen, $control_contenu)";
    } else{
        $req = "update note set examen = $examen, control_contenu = $control_contenu where id_etudiant = $id_etudiant and id_matiere = $id_matiere";
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
        <h1 class="font-weight-bold">Saisir les notes des étudiants</h1>
        <form action="" method="post">
            <table class="table">
                <tr>
                    <td><label>ID Etudiant:</label></td>
                    <td><input type="text" name="id_etudiant" required="required" class="form-control"></td>
                </tr>
                <tr>
                    <td><label>ID Matiere:</label></td>
                    <td><input type="text" name="id_matiere" required="required" class="form-control"></td>
                </tr>
                <tr>
                    <td><label>Examen:</label></td>
                    <td><input type="text" name="examen" required="required" class="form-control"></td>
                </tr>
                <tr>
                    <td><label>Control Contenu:</label></td>
                    <td><input type="text" name="control_contenu" required="required" class="form-control"></td>
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
        <a href="listeNotes_ens.php" class="btn btn-primary">Retourner</a>
    </div>
</body>

</html>

