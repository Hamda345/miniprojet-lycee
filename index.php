<?php
  include('bdd.php');
  $error = null;
  if(isset($_POST['connect'])) {
    if(isset($_POST['choix'])) {
    if ($_POST['choix'] == 'Enseignant') {
      $stmt = $conn->prepare("SELECT * FROM enseignant WHERE email=:em and nom_enseignant=:nm");
      $stmt->bindParam(':em', $_POST['email']);
      $stmt->bindParam(':nm', $_POST['nom']);
      $stmt->execute();

      $userExist = $stmt->fetchObject();
      if($userExist) {
          if(password_verify($_POST['mot_de_passe'], $userExist->mot_de_passe)) {
              session_start();
              $_SESSION['id_enseignant'] = $userExist->id_enseignant;
              $_SESSION['nom_enseignant '] = $userExist->nom_enseignant;
              header("Location: listeNotes_ens.php");
          } else {
              var_dump("Mot de passe incorrecte!");
          }
      } else{
          var_dump("Compte n'existe pas");
      }
        }
        if ($_POST['choix'] == 'Etudiant') {
                 
         $stmt = $conn->prepare("SELECT * FROM etudiant WHERE email=:em and nom_etudiant=:nm");
         $stmt->bindParam(':em', $_POST['email']);
         $stmt->bindParam(':nm', $_POST['nom']);
         $stmt->execute();

         $userExist = $stmt->fetchObject();
         if($userExist) {
          if(password_verify($_POST['mot_de_passe'], $userExist->mot_de_passe)) {
              session_start();
              $_SESSION['id_etudiant'] = $userExist->id_etudiant;
              $_SESSION['nom_etudiant'] = $userExist->nom_etudiant;
              header("Location: listeNotes_etud.php");
          } else {
              var_dump("Mot de passe incorrecte!");
          }
      } else{
          var_dump("Compte n'existe pas");
      }
        }
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Connexion Admin</title>
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
<body>
        <h1 align="center" class="font-weight:bold;">Saisir vos coordonnés</h1>
        <form action="" method="post" align="center">
            <table align="center">
                <tr><td><label>Nom :</label></td><td> <input type="text" name="nom"
                    required="required"> </td></tr>
                <tr><td><label>E-mail:</label></td><td> <input type="text" name="email"
                    required="required"> </td></tr>
                <tr><td><label>Mot de Passe:</label></td><td> <input type="password" name="mot_de_passe"
                    required="required"> </td></tr>
                <tr><td><label>Vous êtes: </label></td><td><select name="choix" required> <option value="Etudiant">Etudiant</option> <option value="Enseignant">Enseignant</option> </select> </td></tr>
           </table>
            <div  style="margin-right: 50%;">
                <input type="submit" value="Se Connecter" name="connect" class="btn btn-success">
            </div>
        </form>
</body>
</html>
