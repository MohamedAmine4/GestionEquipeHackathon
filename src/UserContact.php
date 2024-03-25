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
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>All Users</title>
</head>
<body>
  <?php
    $recupUser=$connection->query('SELECT * FROM etudiant ');
    ?>
    <?php
    $users = $recupUser->fetchAll();
    ?>
    <select style="width:50%" onchange="location = this.value;">
    <?php
    foreach($users as $user){
      if($user['class']=="l3")
      echo "<option value='chat.php?id=" . $user['id'] . "'>" . $user['firstname'] ." ". $user['lastname'] . "</option>";
    }
    ?>
    </select>
    <br/>
    <br/>

    <select style="width:50%" onchange="location = this.value;">
    <?php
    foreach($users as $user){
      if($user['class']=="m1")
      echo "<option value='chat.php?id=" . $user['id'] . "'>" . $user['firstname'] ." ". $user['lastname'] . "</option>";
    }
    ?>
    </select>
    <br/>
    <br/>

    <select style="width:50%" onchange="location = this.value;">
    <?php
    foreach($users as $user){
      if($user['class']=="m2")
      echo "<option value='chat.php?id=" . $user['id'] . "'>" . $user['firstname'] ." ". $user['lastname'] . "</option>";
    }
    ?>
    </select>
</body>
</html>
