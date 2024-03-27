<?php session_start();?>

<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../asset/inscreption.css" rel="stylesheet">
  <title>Inscreption</title>
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
        <h2 class="text-3xl mb-4 font-bold       flex flex-col items-center">Update Account</h2>
        <p class="mb-4"> Update</p>
      <form method="POST" action="../Controller/connexion.php">
        <div class="grid grid-cols-2 gap-5">
        <!-- <label >First Name</label> -->
          <!-- <select type="text" name="fname" placeholder="FirstName" class="border border-gray-400 py-1 px-2 w-full" required>
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
        $sql = "SELECT firstname FROM etudiant";
        $result = $conn->query($sql);

        // Afficher les options du select
        if ($result->num_rows > 0) {
          echo "<option '>" . "" . "</option>";
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['firstname'] . "'>" . $row['firstname'] . "</option>";
            }
        } else {
            echo "<option value=''>Aucune donnée trouvée</option>";
        }
        // Fermer la connexion à la base de données
        ?>
          </select> 
          <label >Last Name</label>
          <select type="text" name="lname" placeholder="LastName" id="lname" class="appearance-none border rounded-md border-gray-400 py-1 px-2" required onchange="updateEmail()">>
          <?php
      
        // Requête pour récupérer les données depuis une table (ajustez selon votre base de données)
        $sql = "SELECT lastname FROM etudiant ";
        $result = $conn->query($sql);

        // Afficher les options du select
        if ($result->num_rows > 0) {
          echo "<option '>" . "" . "</option>";
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['lastname'] . "'>" . $row['lastname'] . "</option>";
            }
            $lname = $_POST['lastname'];
        } else {
            echo "<option value=''>Aucune donnée trouvée</option>";
        }
        // Fermer la connexion à la base de données
        $conn->close();
        ?>
          </select> -->
        </div>
        <div class="mt-5">




        <!-- <script>
// Début du code JavaScript
// Fonction qui met à jour l'input email en fonction du nom de famille choisi
function updateEmail() {
  var lname = document.getElementById("lname").value;
  var url = "http://localhost/Hackathon_MVC/Tp_web/src/Model/data.php";

  fetch(url)
    .then(response => {
      if (response.ok) {
        return response.json();
      } else {
        throw new Error("Erreur lors de la requête : " + response.status);
      }
    })
    .then(data => {
      var email = "";
      var skills = "";

      for (var i = 0; i < data.length; i++) {
        if (data[i].lastname == lname) {
          email = data[i].email;
          skills = data[i].skills;
          break;
        }
      }

      return { email, skills }; // Retourner un objet avec les valeurs
    })
    .then(result => {
      document.getElementById("email").value = result.email;
      document.getElementById("skills").value = result.skills;

      console.log(result.email);
    })
    .catch(error => {
      console.error("Erreur lors de la récupération du JSON : " + error);
    });
}

// Fin du code JavaScript
</script> -->





          <input type="email" name="email" id="email" value ="<?php echo $_SESSION['email']; ?>" placeholder="Email" class="border border-gray-400 py-1 px-2 w-full" />
        </div>
        <div class="mt-5">
          <input type="password" name="password" value ="<?php echo $_SESSION["password"]; ?>"  placeholder="Password" class="border border-gray-400 py-1 px-2 w-full" />
          
        </div>
        
        <div class="mt-5">
          <input placeholder="Skills" name ="skills" value ="<?php echo $_SESSION["skills"]; ?>"  id="skills" class="border border-gray-400 py-1 px-2 w-full"></input>
        </div>
        <div class="mt-5">
          <input type="checkbox"  class="border border-gray-400 " />
      <span>
        I accept the <a href="#" class="text-blue-500">Terms of Service</a> and <a href="#" class="text-blue-500">Privacy Policy</a>
      </span>
        </div>
        <div class="mt-6 flex justify-end">
  <button value="Envoyer" type="submit" class="bg-green-500 text-white py-2 px-4 rounded mr-2">Enregistrer</button>
  <button type="button" class="bg-blue-500 text-white py-2 px-4 rounded">Annuler</button>
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