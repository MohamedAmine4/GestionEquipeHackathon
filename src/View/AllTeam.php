<?php session_start();?>

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
  <title>All team</title>
</head>
<body>
<?php
  // Inclure le footer
  include('navbar.php');
  ?>
<div class="min-h-screen py-40 bg-center bg-no-repeat bg-cover bg-fixed bg-gray-700 bg-blend-multiply" style="background-image: url('https://flowbite.s3.amazonaws.com/docs/jumbotron/conference.jpg');">
  <div class="container mx-auto">
  <div class="flex flex-col lg:flex-row w_8/12 bg-white rounded-xl mx-auto shadow-lg overflow-hidden">
    <div class="w-full lg:w-1/2 flex flex-col items-center h-full bg-gray-700 relative" style="background-image: url(../images/hackathon_flou.png); background-size: cover; background-repeat: no-repeat; background-position: center; height: 650px;">

  <div class="w-full h-full flex flex-col items-center justify-center" style="position: relative; z-index: 1;">
    <!-- Votre contenu centré ici -->
    <div class="w-full h-full " style="background-image: url(../images/hackathon.png); background-size: center; background-repeat: no-repeat; background-position: center; height: 650px;">
      <!-- Image ou contenu que vous voulez centrer -->
    </div>
  </div>
</div>
      <div class="w-full lg:w-1/2 py-16 px-12 ">
        <h2 class="text-3xl mb-4 font-bold font-mono flex flex-col items-center ">All TEAM</h2>
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

            
        </div>
        <div class="mt-5 grid grid-cols-2 gap-5">
      <?php
      $conn->close();
      ?>
        </div>
        <div class="mt-6  ">
        <div class="flex mt-4 md:mt-6">
          
    <div value="Envoyer" type="submit" class="bg-white text-red py-2 px-4 rounded" style="width: 70%;"></div>

    <button value="Envoyer" type="button" class="bg-blue-500 text-red py-2 px-6 rounded " style="width: 30%;"><a href="Home.php">Back</a></button>
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
      var urlequipe = "http://localhost/Hackathon_MVC/Tp_web/src/Model/equipedata.php";
      var url = "http://localhost/Hackathon_MVC/Tp_web/src/Model/lienequipedata.php";
      var urletudiant = "http://localhost/Hackathon_MVC/Tp_web/src/Model/data.php";
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
              etudiantesname.push(dataEtudiants[i].firstname);
            }
          }

          document.getElementById("namet").value = nameequipe;
          document.getElementById("l3").value = etudiantesname[0] + " " + etudiantesname[1];
          document.getElementById("m1").value = etudiantesname[2] + " " + etudiantesname[3];
          document.getElementById("m2").value = etudiantesname[4] + " " + etudiantesname[5];
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