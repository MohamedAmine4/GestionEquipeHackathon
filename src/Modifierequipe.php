
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
  <link href="./modifierequipe.css" rel="stylesheet">
  <title>Modify team</title>
</head>
<body>
<div class="min-h-screen py-40 bg-center bg-no-repeat bg-cover bg-fixed bg-gray-700 bg-blend-multiply" style="background-image: url('https://flowbite.s3.amazonaws.com/docs/jumbotron/conference.jpg');">
  <div class="container mx-auto">
    <div class="flex flex-col lg:flex-row w_8/12 bg-white rounded-xl mx-auto shadow-lg overflow-hidden">
      <div class="w-full lg:w-1/2 flex flex-col items-center h-full bg-gray-700" style="background-image: url(images/hackathon.png); background-size:auto; background-repeat: no-repeat; background-position: center; height: 650px;">
      <h1 class="text-3xl mb-3 py-14 font-bold font-mono">Welcome</h1>  
      </div>
      <div class="w-full lg:w-1/2 py-16 px-12 ">
        <h2 class="text-3xl mb-4 font-bold font-mono flex flex-col items-center ">Modify A TEAM</h2>
        <p class="mb-4 flex flex-col items-center font-mono text-gray-400"> Hackathon Team</p>
      <form method="POST" action="modifyTeam.php">
      <div class="mt-5 grid grid-cols-2 gap-5">
      <label class="font-mono text-gray-400" style="font-size: 20px;" >Exesting Team</label>
          <select type="text" name="teamexisting"  id="teamexistingid" placeholder="FirstName" class="border border-gray-400 py-1 px-2 w-full" required onchange="updateTeam()">
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
            $idteam= $_POST['id'];
        } else {
            echo "<option value=''>Aucune donnée trouvée</option>";
        }
      
        ?>
        
          </select> 
      </div>
      <div class="mt-5 grid grid-cols-2 gap-5">
      <input type="text" name="m2" id="namet" value="Team name" disabled>
        <input type="text" name="l3" id="l3" value="l3" disabled>
        <input type="text" name="m1" id="m1" value="m1" disabled>
        <input type="text" name="m2" id="m2" value="m2" disabled>
      </div>
        <div class="mt-5 grid grid-cols-2 gap-5">

            <label class="font-mono text-gray-400" style="font-size: 20px;">Team Name</label>
            <input type="text" name="Teamname" placeholder="Team Name" id="teamnam" class="appearance-none border rounded-md border-gray-400  px-2 w-full h-10"  />
        </div>
        <div class="mt-5 grid grid-cols-2 gap-5">
        <label class="font-mono text-gray-400" style="font-size: 20px;">L3 Student</label>
          <select type="text" name="l3name" placeholder="FirstName" class="border border-gray-400 py-1 px-2 w-full"   required>
        
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
        <div class="flex mt-4 md:mt-6">
          
    <button value="Envoyer" type="submit" class="bg-green-500 text-red py-2 px-4 rounded" style="width: 50%;">Modify Team</button>

    <button value="Envoyer" type="button" class="bg-blue-500 text-red py-2 px-6 rounded " style="width: 50%;">Back</button>
</div>
</div>
      </form>
      </div>
  
  </div>
  </div>
</div>
<script>
// Début du code JavaScript
function updateTeam() {
  var teamidequipe = document.getElementById("teamexistingid").value;
  var nameequipe = "";
  var urlequipe = "http://localhost/web_php/Tp_web/src/equipedata.php";
  var url = "http://localhost/web_php/Tp_web/src/lienequipedata.php";
  var urletudiant = "http://localhost/web_php/Tp_web/src/data.php";
  var etudiantesID = [];
  var etudiantesname = [];

  fetch(urlequipe)
    .then(response => response.json())
    .then(data => {
      for (var i = 0; i < data.length; i++) {
        if (data[i].id == teamidequipe) {
          nameequipe = data[i].teamname;
        }
      }
    })
    .then(() => fetch(url))
    .then(response => response.json())
    .then(data => {
      for (var i = 0; i < data.length; i++) {
        if (data[i].teamID == teamidequipe) {
          etudiantesID.push(data[i].etudaintID);
        }
      }
    })
    .then(() => fetch(urletudiant))
    .then(response => response.json())
    .then(dataEtudiants => {
      for (var i = 0; i < dataEtudiants.length; i++) {
        if (dataEtudiants[i].id == etudiantesID[0] || dataEtudiants[i].id == etudiantesID[1] || dataEtudiants[i].id == etudiantesID[2]) {
          etudiantesname.push(dataEtudiants[i].lastname);
        }
      }

      document.getElementById("namet").value = nameequipe;
      document.getElementById("l3").value = etudiantesname[0];
      document.getElementById("m1").value = etudiantesname[1];
      document.getElementById("m2").value = etudiantesname[2];
      document.getElementById("teamnam").value = nameequipe;
    })
    .catch(error => console.error("Erreur lors de la récupération du JSON : " + error));
}

// Fin du code JavaScript
</script>
<?php
  // Inclure le footer
  include('footer.php');
  ?>
</body>



</html>