
<?php 
if (isset($_POST["submit"])){

  ?>
    <script>
      window.location.href = "Inscreption.php";
    </script>
  <?php 
}

?>
<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="./equipe.css" rel="stylesheet">
  <title>ADD Teams</title>
</head>
<body>
<div class="min-h-screen py-40 bg-center bg-no-repeat bg-[url('https://flowbite.s3.amazonaws.com/docs/jumbotron/conference.jpg')] bg-gray-700 bg-blend-multiply">
  <div class="container mx-auto">
    <div class="flex flex-col lg:flex-row w_8/12 bg-white rounded-xl mx-auto shadow-lg overflow-hidden">
    <div class="w-full lg:w-1/2 flex flex-col items-center h-full bg-gray-700 relative" style="background-image: url(images/hackathon_flou.png); background-size: cover; background-repeat: no-repeat; background-position: center; height: 650px;">

  <div class="w-full h-full flex flex-col items-center justify-center" style="position: relative; z-index: 1;">
    <!-- Votre contenu centré ici -->
    <div class="w-full h-full " style="background-image: url(images/hackathon.png); background-size: center; background-repeat: no-repeat; background-position: center; height: 650px;">
      <!-- Image ou contenu que vous voulez centrer -->
    </div>
  </div>
</div>
      <div class="w-full lg:w-1/2 py-16 px-12 ">
        <h2 class="text-3xl mb-4 font-bold font-mono flex flex-col items-center ">ADD A TEAM</h2>
        <p class="mb-4 flex flex-col items-center font-mono text-gray-400"> Hackathon Team</p>
      <form method="POST" action="connexion.php">
      <div class="mt-5 grid grid-cols-2 gap-5">
      <label class="font-mono text-gray-400" style="font-size: 20px;" >Existing Team</label>
          <select type="text" name="teamexisting" placeholder="FirstName" class="border border-gray-400 py-1 px-2 w-full" >
          <?php
        // Connexion à la base de données
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "hackathon";
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Vérifier la connexion
        if ($conn->connect_error) {
            die("La connexion à la base de données a échoué : " . $conn->connect_error);
        }

        // Requête pour récupérer les données depuis une table (ajustez selon votre base de données)
        $sql = "SELECT * FROM equipe ";
        $result = $conn->query($sql);

        // Afficher les options du select
        if ($result->num_rows > 0) {
          echo "<option '>" . "" . "</option>";
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['id'] . "'>" . $row['teamname'] . "</option>";
            }
        } else {
            echo "<option value=''>Aucune donnée trouvée</option>";
        }
      
        ?>
          </select> 
      </div>
        <div class="mt-5 grid grid-cols-2 gap-5">

            <label class="font-mono text-gray-400" style="font-size: 20px;">Team Name</label>
            <input type="text" name="Teamname" placeholder="Team Name" class="appearance-none border rounded-md border-gray-400  px-2 w-full h-10"  />
        </div>
        <div class="mt-5 grid grid-cols-2 gap-5">
        <label class="font-mono text-gray-400" style="font-size: 20px;">L3 Student</label>
          <select type="text" name="l3name" placeholder="FirstName" class="border border-gray-400 py-1 px-2 w-full" required>
          <?php

        // Requête pour récupérer les données depuis une table (ajustez selon votre base de données)
        $sql = "SELECT * FROM etudiant WHERE class='l3' ";
        $result = $conn->query($sql);

        // Afficher les options du select
        if ($result->num_rows > 0) {
          echo "<option '>" . "" . "</option>";
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['id'] . "'>" . $row['lastname'] . "</option>";
            }
        } else {
            echo "<option value=''>Aucune donnée trouvée</option>";
        }
        // Fermer la connexion à la base de données
        ?>
          </select> 
          <label class="font-mono text-gray-400" style="font-size: 20px;" >M1 Student</label>
          <select type="text" name="m1name" placeholder="LastName" id="lname" class="border border-gray-400 py-1 px-2" required >
          <?php
      
        // Requête pour récupérer les données depuis une table (ajustez selon votre base de données)
        $sql = "SELECT * FROM etudiant WHERE class='M1'";
        $result = $conn->query($sql);

        // Afficher les options du select
        if ($result->num_rows > 0) {
          echo "<option '>" . "" . "</option>";
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['id'] . "'>" . $row['lastname'] . "</option>";
            }
            $lname = $_POST['lastname'];
        } else {
            echo "<option value=''>Aucune donnée trouvée</option>";
        }
        // Fermer la connexion à la base de données
        
        ?>
          </select>
          <label class="font-mono text-gray-400" style="font-size: 20px;">M2 Student</label>
          <select type="text" name="m2name" placeholder="LastName" id="lname" class="border border-gray-400 py-1 px-2" required >
          <?php
      
        // Requête pour récupérer les données depuis une table (ajustez selon votre base de données)
        $sql = "SELECT * FROM etudiant WHERE class='M2'";
        $result = $conn->query($sql);

        // Afficher les options du select
        if ($result->num_rows > 0) {
          echo "<option '>" . "" . "</option>";
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['id'] . "'>" . $row['lastname'] . "</option>";
            }
            $lname = $_POST['lastname'];
        } else {
            echo "<option value=''>Aucune donnée trouvée</option>";
        }
        // Fermer la connexion à la base de données
        $conn->close();
        ?>
          </select>
        </div>
        <div class="mt-6  ">
        <div class="mt-6 flex justify-end">
  <button value="Envoyer" type="submit" class="bg-green-500 text-white py-2 px-4 rounded mr-2">ADD Team</button>
  <button type="button" class="bg-blue-500 text-white py-2 px-4 rounded">Annuler</button>
</div>
</div>
      </form>
      </div>
  
  </div>
  </div>
</div>
<?php
  // Inclure le footer
  include('footer.php');
  ?>
</body>



</html>