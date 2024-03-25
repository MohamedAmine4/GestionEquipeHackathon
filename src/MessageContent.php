<?php
session_start();
try {
  $connection = new PDO("mysql:host=localhost;dbname=hackathon;port:3306;charset=utf8", 'root', '');
} catch (Exception $e) {
  echo "erreur de connexion $e->$getMessage()";
}
if(!$_SESSION['lastname']){
  header('Location: Login.php');
}

if(isset($_GET['id']) AND !empty($_GET['id'])){
  $id = $_GET['id'];
  $recupUser = $connection->prepare('SELECT * FROM etudiant WHERE id = ?');
  $recupUser->execute(array($id));
  if($recupUser->rowCount() > 0){
    if(isset($_POST['envoyer'])){
      if(!empty($_POST['message'])){
        $message = htmlspecialchars($_POST['message']);
        $insertionMessage = $connection->prepare('INSERT INTO message (message, id_destinataire, id_auteur) VALUES (?, ?, ?)');
        $insertionMessage->execute(array($message,$id,$_SESSION['id']));
      }
    }  }
    else {
      echo "Aucun utilisateur Trouvé";
    }
    

}
else {
  echo "Aucun Identifiant Trouvé";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Private Message</title>
</head>
<body>
  <form action="" method="post">
<textarea name="message" id="" ></textarea>
<br> <br>
<button type="submit" name="envoyer">Envoyer</button>

<section id="message">
  
<?php

  $recupUser = $connection->prepare('SELECT * FROM etudiant WHERE id = ?');
  $recupUser->execute(array($id));
  $user = $recupUser->fetch();
  
  ?>
    <center>  <p style="color: black;"><?php  echo $user['firstname']." ". $user['lastname']?></p> </center>

  <?php

$recupMessage = $connection->prepare('SELECT * FROM message WHERE id_auteur = ? AND id_destinataire = ? OR id_auteur = ? AND id_destinataire = ? ');
$recupMessage->execute(array($_SESSION['id'],$id,$id,$_SESSION['id']));
while($message = $recupMessage->fetch()){

  if( $message['id_auteur'] == $_SESSION['id']){
    ?>
    <p style="color: green;">Vous : <?php echo $message['message'] ?></p>
    <?php
  }
  else {
    $recupUser = $connection->prepare('SELECT * FROM etudiant WHERE id = ?');
    $recupUser->execute(array($message['id_auteur']));
    $user = $recupUser->fetch();
    ?>
    <p style="color: black;"><?php  echo $user['lastname'] . " : " . $message['message'] ?></p>
    <?php
  }
  
}
?>
</section>

  </form>
</body>
</html>