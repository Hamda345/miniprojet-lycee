
<?php
  include('bdd.php');
  $error = null;
  if(isset($_POST['connect'])) {
      $stmt = $conn->prepare("SELECT * FROM admin WHERE email=:em");
      $stmt->bindParam(':em', $_POST['email']);
      $stmt->execute();

      $userExist = $stmt->fetchObject();
      if($userExist) {
          if(password_verify($_POST['mot_de_passe'], $userExist->mot_de_passe)) {
              session_start();
              $_SESSION['id'] = $userExist->id;
              $_SESSION['nom'] = $userExist->nom;
              header("Location: listeEtud.php");
          } else {
              var_dump("Mot de passe incorrecte!");
          }
      } else{
          var_dump("Compte n'existe pas");
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
           </table>
           <input type="submit" value="Se Connecter" name="connect" class="btn btn-success" align="center">
        </form>
</body>
</html>
